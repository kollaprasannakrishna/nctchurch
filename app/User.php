<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    public function hasRole($role){
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
    }

    public function emails(){
        return $this->hasMany('App\Email');
    }
    public function getId()
    {
        return $this->id;
    }

    public function deleteAll(){
        foreach ($this->posts() as $post){
            $post->tags()->detach();
        }
        $this->posts()->delete();
    }
}
