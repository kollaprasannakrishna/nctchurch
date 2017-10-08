<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Storage;
use File;

class ImagesController extends Controller
{
    public function getEventImages($filename){

        $file=Storage::disk('local')->get($filename);

        return new Response($file,200);
    }

}
