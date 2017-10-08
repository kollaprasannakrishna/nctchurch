<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    public function venue(){
        return $this->belongsTo('App\Venue');
    }
    public function series(){
        return $this->belongsTo('App\Series');
    }
}
