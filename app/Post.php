<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function deleteMedia($post){
        $oldFileName=public_path('images/posts/'.$post->image);
        //Storage::delete($oldFileName);
        File::delete($oldFileName);
    }
}
