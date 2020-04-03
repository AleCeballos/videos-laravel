<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

   protected $table = 'comments';

//Relacion de Muchos a uno

public function user(){

    return $this->belongso('App\User','user_id');
 }
}
