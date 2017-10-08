<?php

namespace App\Http\Controllers;

use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        $users=User::orderBy('name','asc')->paginate(10);
        return view('controlPanel.admin.index')->with('users',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user=User::find($id);
        $roles=Role::all();

        $rol=array();
        foreach ($roles as $role){
            $rol[$role->id]=$role->name;
        }
        return view('controlPanel.admin.edit')->with('user',$user)->with('roles',$rol);
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
        //dd($request);
        $user=User::find($id);
        if($request->active == 'true'){
            $user->active= 1;
        }else {
            $user->active= 0;
        }

        $user->save();
        if(isset($request->roles)){
            $user->roles()->sync($request->roles,true);
        }else{
            $user->roles()->sync(array(),true);
        }
        return redirect()->route('admin.index',$user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user=User::find($id);

        if(Auth::user()->id == $user->id){
            $request->session()->flash('failure','Can\'t delete yourself');

            return redirect()->back();
        }
        $user->roles()->detach();
        $postDelete=new Post();
        foreach ($user->posts as $post){
            $postDelete->deleteMedia($post);
            $post->tags()->detach();
            $post->delete();
        }

        $user->delete();
        $request->session()->flash('success','User delete yourself');
        return redirect()->back();
    }
}
