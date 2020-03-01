@extends('plantillas.plantilla')
@section('titulo')
Vendedores
@endsection
@section('cabecera')
Información
@endsection
@section('contenido')
<span class="clearfix"></span>
<div class="card bg-light mt-5 mx-auto" style="max-width: 48rem;" >
<div class="card-header text-center"><b>{{$vendedor->nombre}}</b></div>
<div class="card-body" style="font-size: 1.1em">
    <h5 class="card-title text-center">ID: {{($vendedor->id)}}</h5>
    <p class="card-text">
    <p><b>Nombre: </b> {{$vendedor->nombre}}</p>
    <p><b>Telefono: </b> {{$vendedor->telefono}}</p>
    <p><b>Direccion: </b>{{$vendedor->direccion}}</p>
    <p><b>Mail: </b>{{$vendedor->mail}}</p>
    <a href="{{route('vendedors.index')}}" class="mt-3 float-left btn btn-success mt-5">Volver</a>
</div>

</div>
@endsection
