<?php

namespace App\Http\Controllers;

use App\Member;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Exception;

class MemberController extends Controller
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
            $members=Member::orderBy('firstname','asc')->paginate(10);
        return view('controlPanel.members.index')->with('members',$members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$members=Member::all();
        $positions=Position::all();
        $pos=array();
        foreach ($positions as $position){
            $pos[$position->id]=$position->title;
        }
        return view('controlPanel.members.create')->with('positions',$pos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'address1'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'state'=>'required',
            'phone'=>'required',
        ]);
        $member=new Member();
        $member->firstname=$request->firstname;
        $member->lastname=$request->lastname;
        $member->email=$request->email;
        $member->address1=$request->address1;
        $member->address2=$request->address2;
        $member->city=$request->city;
        $member->zip=$request->zip;
        $member->state=$request->state;
        $member->phone=$request->phone;
        try{
            $member->save();
        }catch (Exception $ex){
           // $request->session()->flash('failure',$ex->getCode());
            if($ex->getCode() == 23000){
                $request->session()->flash('failure','Duplicate Emails, can\'t be created');
            }

            return redirect()->back();
        }


        if(isset($request->positions)){
            $member->positions()->sync($request->positions,false);
        }else{
            $member->positions()->sync(array(),false);
        }
        $request->session()->flash('success','Member created successfully');

        return redirect()->route('members.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member=Member::find($id);
        $positions=Position::all();
        $pos=array();
        foreach ($positions as $position){
            $pos[$position->id]=$position->title;
        }
        return view('controlPanel.members.edit')->with('member',$member)->with('positions',$pos);

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
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'address1'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'state'=>'required',
            'phone'=>'required',
        ]);
        $member=Member::find($id);
        $member->firstname=$request->firstname;
        $member->lastname=$request->lastname;
        $member->email=$request->email;
        $member->address1=$request->address1;
        $member->address2=$request->address2;
        $member->city=$request->city;
        $member->zip=$request->zip;
        $member->state=$request->state;
        $member->phone=$request->phone;

        $member->save();

        if(isset($request->positions)){
            $member->positions()->sync($request->positions,true);
        }else{
            $member->positions()->sync(array(),true);
        }
        $request->session()->flash('success','Address Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member=Member::find($id);
        $member->positions()->detach();
        $member->groups()->detach();
        $member->emails()->detach();
        $member->delete();
        \Session::flash('success', 'Deleted Successfully.');

        return redirect()->route('members.create');
    }

    public function import(Request $request){
        $this->validate($request,[
            'member_excel' => 'required',
        ]);

        try {
            Excel::load(Input::file('member_excel'), function ($reader) {


                foreach ($reader->toArray() as $row) {
                    $member=new Member();
                    $member->firstname=$row['firstname'];
                    $member->lastname=$row['lastname'];
                    $member->email=$row['email'];
                    $member->address1=$row['address1'];
                    $member->address2=$row['address2'];
                    $member->city=$row['city'];
                    $member->state=$row['state'];
                    $member->zip=$row['zip'];
                    $member->phone=$row['phone'];

                    $member->save();
                    $member->positions()->sync(array(2),true);

                    //Member::firstOrCreate($row);
                }
                //$results = $reader->get();

            });
            \Session::flash('success', 'Users uploaded successfully.');
            return redirect(route('members.create'));
        } catch (\Exception $e) {
            \Session::flash('failure', $e->getMessage());
            return redirect(route('members.create'));
        }
    }
}
