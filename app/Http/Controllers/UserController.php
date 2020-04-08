<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //para captura de datos
use App\Http\Requests; 

use Iluminate\Support\Facades\DB; //para metodos de Base de datos
use Iluminate\Support\Facades\Storage; //Para guardar archivos
use Symfony\Component\HttpFoundation\Response; //para respuestas

use App\User; //modelo de usuario
use App\Video; //modelo de videos
use App\Comment; //modelo  de comentarios

class UserController extends Controller
{
    //canal de usuario

    public function channel($user_id){

        $user= User::find($user_id);//condesguimos el usuario por id

        if(!is_object($user)){

            return redirect()->route('home');
        }

        $videos = Video::where('user_id',$user_id)->paginate(5);


        return view('user.channel',array(

       'user' =>$user,
       'videos'=>$videos

        ));
    }
}
