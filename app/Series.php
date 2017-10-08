<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public function sermons(){
        return $this->hasMany('App\Sermon');
    }
}
