<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getBlogPage(){
        return view('pages.blog');
    }

    public function getContactPage(){
        return view('pages.contact');
    }
    public  function getSingleBlog(){
        return view('pages.singleBlog');
    }
}
