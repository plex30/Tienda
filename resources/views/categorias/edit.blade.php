@extends('plantillas.plantilla')
@section('titulo')
Actualizar Categorias
@endsection
@section('Cabecera')
Actualizar Categorias
@endsection
@section('contenido')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $miError)
    <li>{{$miError}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card bg.secondary mt-5">
    <div class="card-header" style="text-align:center"><b>Actualizar Categoria</b></div>
    <div class="card-body">
    <form name="edit" action="{{route('categorias.update', $categoria)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}"  id="nom" >
            </div>
            <div class="col">
                <label for="pre" class="col-form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control"  value="{{$categoria->descripcion}}" id="precio" >
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Actualizar" class="btn btn-success">
                <input type="reset" value="Borrar" class="btn btn-danger">
            <a href="{{route('categorias.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
@endsection
