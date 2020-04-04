<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table ='videos';

    // Relacion de un video a muchos comentarios

    public function comments(){

        return $this->hasMany('App\Comment');
    }

    //Relacion de Muchos videos a un usuario

     public function user(){

        return $this->belongsTo('App\User','user_id');
     }
}
