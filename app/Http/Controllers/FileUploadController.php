<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Input;
use Log;
use Illuminate\Http\Request;
use Image;
use File;
use Validator;
use Illuminate\Support\Facades\Storage;
use GrahamCampbell\Flysystem\Facades\Flysystem;


class FileUploadController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    public function imageUpload(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'featured_image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
//
//        if ($validator->passes()) {
//
//            $input = $request->all();
//            $input['featured_image1'] = time().'.'.'jpg';
//            Log::info($input['featured_image1']);
//            //$request->image->getClientOriginalExtension()
//            $request->image->move(public_path('test'), $input['featured_image1']);
//
//            AjaxImage::create($input);
//
//            return response()->json(['success'=>'done']);
//        }
//
//        return response()->json(['error'=>$validator->errors()->all()]);
//        }
        if($request->hasFile('featured_image1')){
            $image=$request->file('featured_image1');
            $filename='new_audio' . '.'.$image->getClientOriginalExtension();
            $location=public_path('images/hello');
            File::makeDirectory($location, $mode = 0777, true, true);
            //dd($location);

            $request->file('featured_image1')->move($location, $filename);
            //Image::make($image)->resize(800,400)->save($location);


        }
        return redirect()->back();
    }

}
