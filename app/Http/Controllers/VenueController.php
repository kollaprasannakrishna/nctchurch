<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venues=Venue::all();

        return view('controlPanel.venue.create')->with('venues',$venues);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required',
            'address1'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'state'=>'required',
            'contact'=>'required',
        ]);
        $venue=new Venue();
        $venue->name=$request->name;
        $venue->address1=$request->address1;
        $venue->address2=$request->address2;
        $venue->city=$request->city;
        $venue->zip=$request->zip;
        $venue->state=$request->state;
        $venue->contact=$request->contact;

        $venue->save();
        $request->session()->flash('success','Address created successfully');
        return redirect()->back();
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
        $venue=Venue::find($id);

        return view('controlPanel.venue.edit')->with('venue',$venue);
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
            'name'=>'required',
            'address1'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'state'=>'required',
            'contact'=>'required',
        ]);
        $venue=Venue::find($id);
        $venue->name=$request->name;
        $venue->address1=$request->address1;
        $venue->address2=$request->address2;
        $venue->city=$request->city;
        $venue->zip=$request->zip;
        $venue->state=$request->state;
        $venue->contact=$request->contact;

        $venue->save();
        $request->session()->flash('success','Address Updated successfully');
        return redirect()->route('venue.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $venue=Venue::find($id);

        $venue->delete();
        $request->session()->flash('success','Address Deleted successfully');
        return redirect()->back();
    }
}
