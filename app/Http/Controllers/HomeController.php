<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video; //traigo el modelo
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

     //paginado de videos que van a salir de la base de datos
    //  $videos =DB::table('videos')->paginate(5); con query builder 

    $videos = Video::orderBy('id','desc')->paginate(5);
    

    // dd($videos);



        return view('home',array(
                    'videos'=> $videos,
                      
                    
        ));
      
    }
}
