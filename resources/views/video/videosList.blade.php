
<!-- ------------------------------------------------------------ -->
<!-- MUESTRO UNA LISTA DE LOS VIDEOS PAGINADOS  -->
<div id="video-list">
@if(count($videos)>=1)
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
        <p class="card-text">{{$video->description}}</p>
        <p class="card-text"><small class="text-muted">{{\FormatTime::LongTimeFilter($video->created_at)}}</small></p>
        <p class="card-text"><small class="text-muted">{{$video->user->name.''.$video->user->surname}}</small></p>
      


      <!-- BOTONES DE ACCION -->
      <a href="{{route('detailVideo',['video_id'=>$video->id])}}" class="btn btn-success">Ver</a>
      @if (Auth::check() && Auth::user()->id==$video->user->id)
      <a href="{{route('videoEdit',['video_id'=>$video->id])}}" class="btn btn-warning">Editar</a>
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
@else
<div class="alert alert-warning">No hay videos actualmente</div>
@endif


{{$videos->links()}}