<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table ='videos';

    // Relacion de uno a muchos

    public function comments(){

        return $this->hasMany('App\Comment');
    }

    //Relacion de Muchos a uno

     public function user(){

        return $this->belongso('App\User','user_id');
     }
}
