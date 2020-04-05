
<hr>
<h4>Comentarios</h4>
<hr>
@if(session('message'))

<div class="alert alert-success" role="alert">

{{session('message')}}
</div>

@endif



<form class="col-md-4" action="{{url('/comment')}}" method="post">
@csrf

<input type="hidden" name="video_id" value="{{$video->id}}" required>

<p>

<textarea name="body" class="form-control" cols="30" rows="4" required></textarea>
</p>
<input type="submit" value="Comentar" class="btn btn-success">
</form>