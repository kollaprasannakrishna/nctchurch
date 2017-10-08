<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public function positions(){
        return $this->belongsToMany('App\Position');
    }
    public function groups(){
        return $this->belongsToMany('App\Group');
    }
    public function emails(){
        return $this->belongsToMany('App\Email');
    }
}
