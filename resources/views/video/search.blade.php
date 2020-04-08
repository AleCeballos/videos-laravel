

@extends('layouts.app')


@section('content')


<div class="container">

<div class="card">
 
  <div class="card-header">
  <div>
<h2 class="ml-3">Busqueda: {{$search}}</h2>
</div>
    <!-- ----------------------------- -->
<div class="">

  
 <div>
    <form class="" action="{{url('/buscar/'.$search)}}">
 <select name="filter" class="form-control col-md-2"> 
<option value="new">Mas nuevos primero</option>
<option value="old">Mas antiguos primero</option>
<option value="alfa">De la 'A' a la 'Z'</option>
</select>
<button type="submit " value="Ordenar" class="btn btn-success mt-2"  >Ordenar</button>
</form>
  </div>
</div>
<!-- -------------------------------- -->
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>

<!-- --------------------------- -->
<div class="row">





<!-- fin de class row -->
</div>




@include('video.videosList')


<!-- fin de class container  -->
</div>

@endsection
