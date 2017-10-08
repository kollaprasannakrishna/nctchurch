<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use File;
use Log;

class PostController extends Controller
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
        $posts=Post::orderBy('id','desc')->paginate(10);
        return view('controlPanel.blog.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('controlPanel.blog.create')->with('categories',$categories)->with('tags',$tags);
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
            'title'=>'required|max:255',
            'body'=>'required|min:10',
            'slug'=>'required|min:5|max:225',
            'category_id'=>'required|integer',
            'feature_image'=>'sometimes|image'

        ));


        $post=new Post();

        $post->title=$request->title;
        $post->body=$request->body;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        if($request->hasFile('featured_image')){
            $image=$request->file('featured_image');
            $filename=$request->slug.time().".".$image->getClientOriginalExtension();
            $small_filename=$request->slug.time()."300x300.".$image->getClientOriginalExtension();
            $directory='images/posts/';
            File::makeDirectory($directory, $mode = 0777, true, true);
            $location=public_path('images/posts/'.$filename);
            $small_location=public_path('images/posts/'.$small_filename);

            Image::make($image)->resize(800,400)->save($location);
            Image::make($image)->resize(300,300)->save($small_location);

//            $filename=time().'.'.$image->getClientOriginalExtension();
//            $location=public_path('blogImage/'.$filename);
//
//            //$audioLocation=public_path('blogImage');
//
//            Image::make($image)->resize(800,400)->save($location);
            //$image->move($audioLocation,$filename);
            $post->image=$filename;
            $post->small_image=$small_filename;
        }
        $post->status=$request->save;

        $request->user()->posts()->save($post);

        if(isset($request->tags)){
            $post->tags()->sync($request->tags,false);
        }else{
            $post->tags()->sync(array(),false);
        }

        $request->session()->flash('success','Post create Sucessfully');

        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('controlPanel.blog.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }
        $categories=Category::all();
        $tags=Tag::all();
        $cat=array();
        $tagsArr=array();
        foreach ($categories as $category){
            $cat[$category->id]=$category->name;
        }
        foreach ($tags as $tag){
            $tagsArr[$tag->id]=$tag->name;
        }

        return view('controlPanel.blog.edit')->with('post',$post)->with('categories',$cat)->with('tags',$tagsArr);
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

        $post=Post::find($id);
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }

        $old_slug=$post->slug;

        if($old_slug == $request->slug){
            $this->validate($request,array(
                'title'=>'required|max:255',
                'body'=>'required|min:10',
                'category_id'=>'required|integer',
                'featured_image'=>'image'
            ));
        }else{
            $this->validate($request,array(
                'title'=>'required|max:255',
                'body'=>'required|min:10',
                'slug'=>'required|min:5|max:225|unique:posts,slug',
                'category_id'=>'required|integer',
                'featured_image'=>'image'
            ));
            $post->slug=$request->slug;
        }
        if($request->hasFile('featured_image')){
//            $image=$request->file('featured_image');
//            $filename=time().'.'.$image->getClientOriginalExtension();
//
//            $location=public_path('blogImage/'.$filename);
//
//            Image::make($image)->resize(800,400)->save($location);


            $image=$request->file('featured_image');
            $filename=$request->slug.time().".".$image->getClientOriginalExtension();
            $small_filename=$request->slug.time()."300x300.".$image->getClientOriginalExtension();
            $location=public_path('images/posts/'.$filename);
            $small_location=public_path('images/posts/'.$small_filename);
            Image::make($image)->resize(800,400)->save($location);
            Image::make($image)->resize(300,300)->save($small_location);
            $oldFileName=public_path('images/posts/'.$post->image);
            $small_odlFileName=public_path('images/posts/'.$post->small_image);
            $post->image=$filename;
            $post->small_image=$small_filename;

            //Storage::delete($oldFileName);
            File::delete($oldFileName);
            File::delete($small_odlFileName);
        }
        $post->status=$request->save;
        $post->title=$request->title;
        $post->body=$request->body;

        $post->category_id=$request->category_id;

        $request->user()->posts()->save($post);

        if(isset($request->tags)){
            $post->tags()->sync($request->tags,true);
        }else{
            $post->tags()->sync(array(),true);
        }

        $request->session()->flash('success','Post Updated Sucessfully');

        return redirect()->route('posts.show',$post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $post=Post::find($id);

        if(Auth::user() != $post->user) {
            return redirect()->back();
        }
        $oldFileName=public_path('images/posts/'.$post->image);
        $small_oldFileName=public_path('images/posts/'.$post->small_image);
        File::delete($oldFileName);
        File::delete($small_oldFileName);
        $post->tags()->detach();

        $post->delete();

        $request->session()->flash('success','Post Deleted Sucessfully');

        return redirect()->route('posts.index');
    }

    public function getDelete($id){
        $post=Post::find($id);

        return view('controlPanel.blog.delete')->with('post',$post);
    }
}
