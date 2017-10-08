<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function members(){
        return $this->belongsToMany('App\Member');
    }
    public function groups(){
        return $this->belongsToMany('App\Group');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
