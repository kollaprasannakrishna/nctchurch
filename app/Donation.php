<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function events(){
        return $this->hasOne('App\Event');
    }
}
