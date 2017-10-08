<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class TagController extends Controller
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
        $tags=Tag::all();

        return view('controlPanel.tags.create')->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        foreach ($request->tags as $tag){
            $tag_new=new Tag();
            $tag_new->name=$tag;

            $tag_new->save();
        }
        }catch (\Exception $e){
            $request->session()->flash('failure',json_encode($request->tags).' contains duplicates');
            return redirect()->route('tags.create');
        }
        $request->session()->flash('success',json_encode($request->tags).'are created successfully');
        return redirect()->route('tags.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag=Tag::find($id);

        return view('controlPanel.tags.show')->with('tag',$tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=Tag::find($id);

        return view('controlPanel.tags.edit')->with('tag',$tag);
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
        $tag=Tag::find($id);
        $old_tag_name=$tag->name;
        if($old_tag_name != $request->name) {
            $this->validate($request, array(
                'name' => 'required|unique:tags'
            ));
            $tag->name=$request->name;
            $tag->save();
        }

        return redirect()->route('tags.create');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $tag=Tag::find($id);
        $tagName=$tag->name;
        $tag->posts()->detach();
        $tag->delete();
        $request->session()->flash('success',$tagName.' Tag Deleted successfully');
        return redirect()->route('tags.create');
    }
}
