
<hr>
<h4>Comentarios</h4>
<hr>
@if(session('message'))

<div class="alert alert-success" role="alert">

{{session('message')}}
</div>

@endif


@if(Auth::check())
<form class="col-md-4" action="{{url('/comment')}}" method="post">
@csrf

<input type="hidden" name="video_id" value="{{$video->id}}" required>

<p>

<textarea name="body" class="form-control" cols="30" rows="4" required></textarea>
</p>
<input type="submit" value="Comentar" class="btn btn-success">
</form>
@endif
<br>
<hr>

@if(isset($video->comments))
<div id="comments-list">
@foreach($video->comments as $comment)
<div>
<!--//////////////////////////////////////  -->


<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"> Comentario hecho por <strong>{{$comment->user->name.' '.$comment->user->surname}}</strong></h5>
        <small>{{\FormatTime::LongTimeFilter($comment->created_at)}}</small>
        <p class="card-text">{{$comment->body}}</p>

        <!-- ////////////////////////////////////// -->
        @if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id ))
 <!-- Botón en HTML (lanza el modal en Bootstrap) -->

<a href="#victorModal{{$comment->id}}" role="button" class="btn btn-sm btn-primary " data-toggle="modal">Eliminar comentario</a>

  <!-- Modal / Ventana / Overlay en HTML -->
  <div id="victorModal{{$comment->id}}" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">¿Estás seguro?</h4>
              </div>
              <div class="modal-body">
                  <p>¿Seguro que quieres borrar este comentario?</p>
                  <p class="text-dark"><small>{{$comment->body}}</small></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <a href="{{url('/delete-comment/'.$comment->id)}}" type="button" class="btn btn-danger">Eliminar</a>
              </div>
          </div>
      </div>
  </div>
  
 @endif
      </div>
    </div>
  </div>

 



</div>
<br>
@endforeach
</div>
@endif