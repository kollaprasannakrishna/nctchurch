<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function sermons(){
        return $this->hasMany('App\Sermon');
    }
    public function events(){
        return $this->hasMany('App\Event');
    }
}
