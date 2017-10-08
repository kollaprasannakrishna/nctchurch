<?php

namespace App\Http\Controllers;

use App\Group;
use App\Member;
use Illuminate\Http\Request;
use DB;
class AddmemberController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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
        $members_name=Member::all();


        $group=Group::find($id);

        $members=DB::table('members')->
            select('members.id','members.firstname')
            ->join('group_member','group_member.member_id','=','members.id')
            ->join('groups','group_member.group_id','=','groups.id')
            ->where(['groups.id' => $group->id])->get();
        $mem_tags=array();

        $mem_array=$members->toJson();
        $data = json_decode($mem_array);
        //dd($data);
        foreach ($members_name as $mem){
            $count=0;
            foreach ($data as $d){

                if($mem->id == $d->id) {
                    //dd($d->id);
                    $count++;
                    break;

                }
            }
            if($count != 1) {
                $mem_tags[$mem->id] = $mem->firstname;
            }

        }
       // dd($mem_tags);

        return view('controlPanel.groups.addMembers.addMembers')->with('group',$group)->with('members',$members)->with('member_names',$mem_tags);
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
        $group=Group::find($id);
        if(isset($request->members)){
            $group->members()->sync($request->members,false);
        }else{
            $group->members()->sync(array(),false);
        }
        return redirect()->route('addmembers.edit',$group->id);
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
        $member->groups()->detach();

        return redirect()->back();
    }
}
