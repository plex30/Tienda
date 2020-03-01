@extends('plantillas.plantilla')
@section('titulo')
    Store
@endsection
@section('cabecera')
    Store
@endsection
@section('contenido')
<div class="btn-group mr-2" style="display: flex;" role="group" aria-label="Basic example">
    <a href="{{route('articulos.index')}}" class="btn btn-secondary" style="background-color: #fff000; color: #6a6a6a "><b>Gestionar Articulos</b></a>
    <a href="{{route('vendedors.index')}}" class="btn btn-secondary "style="background-color: #fff000; color: #6a6a6a "><b>Gestionar Vendedores</b></a>
    <a href="{{route('categorias.index')}}" class="btn btn-secondary "style="background-color: #fff000; color: #6a6a6a "><b>Gestionar Categorias</b></a>
    </div>
@endsection
