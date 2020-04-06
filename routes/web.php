<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', array(
    'as'=>'home',
    'uses' => 'HomeController@index'
));

//RUTAS DEL CONTROLADOR DE VIDEOS

Route::get('/crear-video',array(
    'as'=>'createVideo',
    'middleware' => 'auth',
    'uses' => 'VideoController@createVideo'

));

 Route::post('/guardar-video',array(
    'as'=>'saveVideo',
     'middleware' => 'auth',
     'uses' => 'VideoController@saveVideo'

 ));


 Route::get('/miniatura/{filename}', array (
'as'=>'imageVideo',
'uses'=>'VideoController@getImage'


 ));

 

 //pagina de detalles de video
 Route::get('/video/{video_id}', array (
    'as'=>'detailVideo',
    'uses'=>'VideoController@getVideoDetail'
    
    
     ));
    

      //traigo el video
 Route::get('/video-file/{filename}', array (
    'as'=>'fileVideo',
    'uses'=>'VideoController@getVideo'
    
    
     ));


     //comentarios
     Route::post('/comment', array (
        'as'=>'comment',
        'middleware' => 'auth',
        'uses'=>'CommentController@store'
        
        
         ));


         
      //eliminar comentario
 Route::get('/delete-comment/{comment_id}', array (
    'as'=>'commentDelete',
    'middleware' => 'auth',
    'uses'=>'CommentController@delete'
    
    
     ));


           //eliminar video
 Route::get('/delete-video/{video_id}', array (
    'as'=>'videoDelete',
    'middleware' => 'auth',
    'uses'=>'VideoController@delete'
    
    
     ));

               //editar video
 Route::get('/editar-video/{video_id}', array (
    'as'=>'videoEdit',
    'middleware' => 'auth',
    'uses'=>'VideoController@edit'
    
    
     ));


     //actualiza
     Route::post('/update-video/{video_id}',array(
        'as'=>'updateVideo',
         'middleware' => 'auth',
         'uses' => 'VideoController@update'
    
     ));