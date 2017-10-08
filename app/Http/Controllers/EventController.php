<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Event;
use App\FundraisingEvent;
use App\Venue;
use Illuminate\Http\Request;
use Image;
use File;

class EventController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $events=Event::orderBy('date','desc')->paginate(10);
        return view('controlPanel.events.index')->with('events',$events);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        date_default_timezone_set("America/New_York");
        //dd(date("Y-m-d H:i:s"));
        $y=date('Y');
        $m=date('m');
        $eventModel=new Event();
        $events=Event::all();
        foreach ($events as $event){
            if($event->type == 'weekly') {
                while ($event->date < date("Y-m-d H:i:s")) {
                    $getNextDate = $eventModel->getNextDay($event->day, $event->date);

                    $event->date = $getNextDate;

                    $event->save();
                }
            }elseif ($event->type == 'monthly'){

                $result_dates=array();
                $result_dates=$eventModel->getMonthly($y,$m,$event->day,$event);

               // dd($result_dates);
                if(empty($result_dates)){
                    $monthInc=$m+1;
                    $result_dates=$eventModel->getMonthly($y,$monthInc,$event->day,$event);

                    $event->date=$result_dates[0];
                    $event->save();
                }else{
                    $event->date=$result_dates[0];
                    $event->save();
                }

            }else if($event->type == 'special'){
                if($event->date <= date("Y-m-d H:i:s")){
                    //dd(date("Y-m-d H:i:s"));
                 $event->active="NO";
                    $event->save();
                }else{
                    $event->active="YES";
                    $event->save();
                }
            }
        }
        $venues=Venue::all();
        return view('controlPanel.events.create')->with('events',$events)->with('venues',$venues);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $this->validate($request,array(
            'name'=>'required|max:255',
            'date'=>'required|date',
            'time'=>'Required',
            'venue_id'=>'Required',
            'type'=>'Required',
            'day'=>'required',
            'description'=>'Required',
            'feature_image'=>'sometimes|image'
        ));
        $DateconvertToPHP=str_replace('/','-',$request->date);
        //$DateconvertToPHP=date("d M,Y",strtotime($request->date));
        $mysqlDate=date("Y-m-d H:i:s",strtotime($DateconvertToPHP));

        //dd($mysqlDate);



        $timeToPhp=strtotime($request->time);
        $mysqlTime=date("H:i:s",$timeToPhp);
        $event=new Event();
        if($request->has('monthsDay')) {
            $str = implode(",", $request->monthsDay);
            $event->monthsDay=$str;
        }
        if($request->hasFile('featured_image')){

            $image=$request->file('featured_image');
            $filename=$request->name.time().".".$image->getClientOriginalExtension();
            $directory='images/events/';
            File::makeDirectory($directory, $mode = 0777, true, true);
            $location=public_path('images/events/'.$filename);

            Image::make($image)->resize(400,400)->save($location);

            $event->image=$filename;
        }
        $event->active="YES";

        $event->name=$request->name;
        $event->date=$mysqlDate;
        $event->time=$mysqlTime;
        $event->venue_id=$request->venue_id;
        $event->type=$request->type;
        $event->day=$request->day;
        $event->description=$request->description;


        $request->user()->events()->save($event);

        if($request->has('donation')){
            $fundraisingEvent=new FundraisingEvent();


            $fundraisingEvent->goal=$request->goal;

            $fundraisingEvent->reached=0.00;

            $event->fundraisingEvent()->save($fundraisingEvent);

        }

        $request->session()->flash('success','Event Created Successfully');

        return redirect()->route('events.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event=Event::find($id);

        return view('controlPanel.events.show')->with('event',$event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event=Event::find($id);
        $venues=Venue::all();
        $ven=array();
        foreach ($venues as $venue){
            $ven[$venue->id]=$venue->name;
        }
        return view('controlPanel.events.edit')->with('event',$event)->with('venues',$ven);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,array(
            'name'=>'required|max:255',
            'date'=>'required|date',
            'time'=>'Required',
            'venue_id'=>'Required',
            'type'=>'Required',
            'day'=>'required',
            'description'=>'Required'
        ));
        $DateconvertToPHP=str_replace('/','-',$request->date);

        $mysqlDate=date("Y-m-d H:i:s",strtotime($DateconvertToPHP));



        $timeToPhp=strtotime($request->time);
        $mysqlTime=date("H:i:s",$timeToPhp);
        $event=Event::find($id);
        if($request->has('monthsDay')) {
            $str = implode(",", $request->monthsDay);
            $event->monthsDay=$str;
        }

        if($request->hasFile('featured_image')){
            $image=$request->file('featured_image');
            $filename=$request->name.time().".".$image->getClientOriginalExtension();
            $location=public_path('images/events/'.$filename);
            Image::make($image)->resize(400,400)->save($location);
            $oldFileName=public_path('images/events/'.$event->image);

            $event->image=$filename;

            //Storage::delete($oldFileName);
            File::delete($oldFileName);
        }

        if($request->has('donation')){

            if(FundraisingEvent::where('event_id',$id)->first()){
                $fundraisingEvent=FundraisingEvent::where('event_id',$id);
            }else{
                $fundraisingEvent=new FundraisingEvent();
            }


            $fundraisingEvent->goal=$request->goal;

            $fundraisingEvent->reached=0.00;

            $event->fundraisingEvent()->save($fundraisingEvent);

        }else{
            //dd(FundraisingEvent::where('event_id',$id)->first());
            if(FundraisingEvent::where('event_id',$id)->first()) {
                $fundraisingEvent = FundraisingEvent::where('event_id' , $id);

                 //dd($fundraisingEvent);
                $event->fundraisingEvent()->delete($fundraisingEvent);
            }
        }
        $event->active="YES";
        $event->name=$request->name;
        $event->date=$mysqlDate;
        $event->time=$mysqlTime;
        $event->venue_id=$request->venue_id;
        $event->type=$request->type;
        $event->day=$request->day;
        $event->description=$request->description;


        $request->user()->events()->save($event);

        $request->session()->flash('success','Event Created Successfully');

        return redirect()->route('events.show',$event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $event=Event::find($id);
        $eventName=$event->name;
        if((FundraisingEvent::where('event_id',$id)->first() != null) && (Donation::where('event_id',$id)->first() == null)){
            $fundraisingEvent=FundraisingEvent::where('event_id',$id);
            $event->fundraisingEvent()->delete($fundraisingEvent);
        }else{

        }
        $event->delete();

        $request->session()->flash('success',$eventName.' Event Deleted Successfully');

        return redirect()->route('events.create');

    }
    public function getDelete($id){
        $event=Event::find($id);
        return view('controlPanel.events.delete')->with('event',$event);
    }

}
