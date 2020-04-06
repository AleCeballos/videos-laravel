@extends('layouts.app')

@section('content')
<div class="container col-xl-3">

<h2>Editar {{$video->title}}</h2>
<div class="row ">

<hr>
<br> 
<form action="{{route('updateVideo',['video_id'=>$video->id])}}" method="post" enctype="multipart/form-data" class="col-lg-12">
@csrf


@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif


<div class="form-group">
<label for="title">Título</label>
<input type="text" class="form-control" id="title" name="title" value="{{$video->title}}">
</div>


<div class="form-group">
<label for="description">Descripción</label>
<textarea class="form-control" id="description" name="description" value="" cols="30" rows="4">{{$video->description}}
</textarea>
</div>

<div class="form-group">
<label for="image">Miniatura</label>
@if(Storage::disk('images')->has($video->image))
<img id="imagenMiniatura" class="img-thumbnail" src="{{url('/miniatura/'.$video->image)}}" alt="imagenDelVideo">
@endif
<input type="file" class="form-control" id="image" name="image">
</div>

<div class="form-group">
  <!-- VIDEO -->
  <video controls id="video-player">

<source src="{{route('fileVideo',['filename'=>$video->video_path])}}"> 
Tu navegador no es compatible con html5
</video>
<label for="video">Archivo de video</label>
<input type="file" class="form-control" id="video" name="video">
</div>

<button type="submit" class="btn btn-success">Editar video</button>


</form>


</div>
</div>


@endsection