@extends('plantillas.plantilla')
@section('titulo')
Articulos
@endsection
@section('cabecera')
Información
@endsection
@if ($text=Session::get('mensaje'))
    <p class='alert alert-info my-3 ml-5 mr-5'>{{$text}}</p>
@endif
@section('contenido')
<span class="clearfix"></span>
<div class="card bg-light mt-5 mx-auto" style="max-width: 48rem;" >
<div class="card-header text-center"><b>{{$articulo->nombre}}</b></div>
<div class="card-body" style="font-size: 1.1em">
    <h5 class="card-title text-center">ID:{{($articulo->id)}}</h5>
    <p class="card-text">
    <div class="float-right mb-4"><img src="{{asset($articulo->imagen)}}" width="160px" heght="160px" class="rounded-circle"></div>
    <p><b>Nombre:</b> {{$articulo->nombre}}</p>
    <p><b>Precio:</b> {{$articulo->precio}}</p>
    <p><b>Stock:</b>{{$articulo->stock}}</p>
    <a href="{{route('articulos.aVenta', $articulo)}}" class=" float-left btn btn-warning mr-2 mt-5">Añadir Venta</a>
    <a href="{{route('articulos.index')}}" class="mt-3 float-left btn btn-success mt-5">Volver</a>
</div>

</div>
@endsection
