@extends('layouts.app')


@section('content')


<div class="container">
<!-- MUESTRO UNA  ALERTA DE QUE EL VIDEO SE SUBI CORRECTAMENTE -->
@if(session('message'))

<div class="alert alert-success" role="alert">

{{session('message')}}
</div>

@endif

@include('video.videosList')


<!-- fin de class container  -->
</div>

@endsection



