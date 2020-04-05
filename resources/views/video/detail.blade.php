@extends('layouts.app')

@section('content')

<div class=" col-md-6 offset-md-3">
<h2>{{$video->title}}</h2>
<hr>

<div class="col-md-12 pt-0">



<div class="card p-1 pt-0" style="width: 40rem;">
  <!-- VIDEO -->
<video controls id="video-player">

<source src="{{route('fileVideo',['filename'=>$video->video_path])}}"> 
Tu navegador no es compatible con html5
</video>
<div class="card-body">
<!-- DESCRIPCION -->
<div class="card border-0">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p>Subido por <strong>{{$video->user->name.' '.$video->user->surname}}</strong> <span>{{\FormatTime::LongTimeFilter($video->created_at)}}</span></p>
    <p class="card-text">Descripción del video</p>
    <p>{{$video->description}}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<!-- COMENTARIOS -->

@include('video.comments')
</div>
</div>

@endsection