<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //para captura de datos
use App\Http\Requests; 

use Iluminate\Support\Facades\DB; //para metodos de Base de datos
use Iluminate\Support\Facades\Storage; //Para guardar archivos
use Symfony\Component\HttpFoundation\Response; //para respuestas


use App\Video; //modelo de videos
use App\Comment; //modelo  de comentarios

class VideoController extends Controller
{
    //crear video

    public function createVideo(){
      return view('video.createVideo');

    }

    public function saveVideo(Request $request){
    // validar formulario
    $validatedData = $this->validate($request,[
       'title' => 'required|min:5',
       'description' => 'required',
       'video' => 'mimes:mp4'

    ]);
  
//guarda video

$video = new Video();
$user = \Auth::user();
$video->user_id = $user->id;
$video->title = $request->input('title');
$video->description = $request->input('description');


//subida de la miniatura 
$image = $request->file('image');
if($image){

  $image_path = time().$image->getClientOriginalName(); //conseguimos nombre de la imagen 
  \Storage::disk('images')->put($image_path, \File::get($image)); //la imagen

$video->image = $image_path;
}

  //subida del video

  $video_file = $request->file('video');
  if($video_file){

    $video_path = time().$video_file->getClientOriginalName();
    \Storage::disk('videos')->put($video_path, \File::get($video_file));

    $video->video_path = $video_path;
  }


$video->save(); //para guardar


return redirect()->route('home')->with(array(

"message" => "El video se ha subido correctamente!"

));

  }

  //obtenemos la imagen guardada en images
  public function getImage($filename){

 $file = \Storage::disk('images')->get($filename);
 return new Response ($file, 200);

  }

 //nos permite sacar el detalle del video por id

 public function getVideoDetail($video_id){
$video =Video::find($video_id);

return view('video.detail',array(

  'video' => $video
));
 }
 
  //obtenemos el video
  public function getVideo($filename){

    $file = \Storage::disk('videos')->get($filename);
    return new Response ($file, 200);
   
     }
    
}
