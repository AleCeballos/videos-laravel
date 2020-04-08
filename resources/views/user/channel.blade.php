@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
 
              <div class="card-header">
                    <div> 
                         <h2 class="ml-3">Busqueda: {{$user->name.''.$user->surname}}</h2>
                    </div>
    
              </div>
              <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      
                     <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                    </blockquote>
             </div>
    </div>

 
           @include('video.videosList') <!-- muestra un listado de los videos que le paso desde el controlador -->


  <!-- fin de class container  -->
</div>


@endsection