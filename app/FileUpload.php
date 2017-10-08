<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    public $imageNAme;
    public $mp3Name;
    public function setImageName($name){
        $this->imageNAme=$name;
    }
    public function getImageName(){
        return $this->imageNAme;
    }
    public function setMp3Name($name){
        $this->mp3Name=$name;
    }
    public function getMp3Name(){
        return $this->mp3Name;
    }

}
