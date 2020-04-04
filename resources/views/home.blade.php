@extends('layouts.app')


@section('content')


<div class="container">
<!-- MUESTRO UNA  ALERTA DE QUE EL VIDEO SE SUBI CORRECTAMENTE -->
@if(session('message'))

<div class="alert alert-success" role="alert">

{{session('message')}}
</div>

@endif


<!-- ------------------------------------------------------------ -->
<!-- MUESTRO UNA LISTA DE LOS VIDEOS PAGINADOS  -->
<div id="video-list">
@foreach($videos as $video)


<!-- //TARJETA DE LOS VIDEOS -->
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">


    @if(Storage::disk('images')->has($video->image))
<img id="imagenMiniatura" class="img-thumbnail" src="{{url('/miniatura/'.$video->image)}}" alt="imagenDelVideo">
@endif

    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title video-title"><a href="">{{$video->title}}</a></h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        <p class="card-text"><small class="text-muted">{{$video->user->name.''.$video->user->surname}}</small></p>
      


      <!-- BOTONES DE ACCION -->
      <a href="" class="btn btn-success">Ver</a>
      @if (Auth::check() && Auth::user()->id==$video->user->id)
      <a href="" class="btn btn-warning">Editar</a>
      <a href="" class="btn btn-danger">Eliminar</a>
      @endif
      </div>
    </div>
  </div>
</div>
<!-- ------------------------------------------------------------ -->

<!-- BOTONES DE ACCION -->

@endforeach



{{$videos->links()}}


<!-- fin de class container  -->
</div>

@endsection



            <!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                           
                        </div>
                    @endif

                   <div class="p-3"><h1>You are logged in!</h1> </div> 
                   
                    <ul class="list-group">
  <li class="list-group-item">fsdfsdfsdfsddfs fds</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
                </div>
            </div> -->
    

