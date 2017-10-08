<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Psy\CodeCleaner\CallTimePassByReferencePass;

class CategoryController extends Controller
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
        $categories=Category::orderBy('id','desc')->paginate(4);
        return view('controlPanel.category.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name'=>'required|max:50'
        ));
        $category=new Category();
        $category->name=$request->name;

        $category->save();
        $request->session()->flash('success','Category Created SuccessFully');

        return redirect()->route('categories.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);

        return view('controlPanel.category.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('controlPanel.category.edit')->with('category',$category);
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
        $category=Category::find($id);
        $this->validate($request,array(
            'name'=>'required|max:50'
        ));

        $category->name=$request->name;

        $category->save();
        $request->session()->flash('success',$category->name.' Category Updated SuccessFully');

        return redirect()->route('categories.create');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $category=Category::find($id);
        if($category->id == 1) {
            $request->session()->flash('failure',$category->name.' Category Can\'t be  deleted');
            return redirect()->route('categories.create');
        }
        foreach ($category->posts as $post) {
            $post = Post::find($post->id);
            $post->category_id = 1;
            $post->save();
        }
        $category->delete();
        $request->session()->flash('success',$category->name.' Category Deleted SuccessFully');
        return redirect()->route('categories.create');


    }
}
