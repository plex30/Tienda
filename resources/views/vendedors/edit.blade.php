@extends('plantillas.plantilla')
@section('titulo')
Actualizar Vendedores
@endsection
@section('Cabecera')
Actualizar Vendedores
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
    <div class="card-header" style="text-align:center"><b>Actualizar Vendedor</b></div>
    <div class="card-body">
    <form name="edit" action="{{route('vendedors.update', $vendedor)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$vendedor->nombre}}"  id="nom" >
            </div>
            <div class="col">
                <label for="pre" class="col-form-label">Telefono</label>
                <input type="text" name="telefono" class="form-control"  value="{{$vendedor->telefono}}" id="telefono" >
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="sto" class="col-form-label">Direccion</label>
            <input type="text" name="direccion" class="form-control" value="{{$vendedor->direccion}}" id="direccion" >
            </div>
            <div class="col">
                <label for="pre" class="col-form-label">Mail</label>
                <input type="text" name="mail" class="form-control"  value="{{$vendedor->mail}}" id="mail" >
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Actualizar" class="btn btn-success">
                <input type="reset" value="Borrar" class="btn btn-danger">
            <a href="{{route('vendedors.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
@endsection
