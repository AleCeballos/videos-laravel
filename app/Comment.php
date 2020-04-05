<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

   protected $table = 'comments';

//Relacion de Muchos a uno

public function user(){

    return $this->belongsTo('App\User','user_id');
 }


 //para borrar comentarios de video segun la utenticacion
 public function video(){

   return $this->belongsTo('App\Video','video_id');
}

}
