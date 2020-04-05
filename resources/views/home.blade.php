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
        <h5 class="card-title video-title"><a href="{{route('detailVideo',['video_id'=>$video->id])}}">{{$video->title}}</a></h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        <p class="card-text"><small class="text-muted">{{$video->user->name.''.$video->user->surname}}</small></p>
      


      <!-- BOTONES DE ACCION -->
      <a href="" class="btn btn-success">Ver</a>
      @if (Auth::check() && Auth::user()->id==$video->user->id)
      <a href="" class="btn btn-warning">Editar</a>
      <a href="#victorModal{{$video->id}}" role="button" class="btn btn-large btn-danger " data-toggle="modal">Eliminar video</a>

      <!-- //////////////////////// -->
        <!-- Modal / Ventana / Overlay en HTML -->
  <div id="victorModal{{$video->id}}" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">¿Estás seguro?</h4>
              </div>
              <div class="modal-body">
                  <p>¿Seguro que quieres borrar este video?</p>
                  <p class="text-dark"><small>{{$video->title}}</small></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <a href="{{url('/delete-video/'.$video->id)}}" type="button" class="btn btn-danger">Eliminar</a>
              </div>
          </div>
      </div>
  </div>
  
      <!-- /////////////////////// -->
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
    

