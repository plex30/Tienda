@extends('plantillas.plantilla')
@section('titulo')
Crear Vendedor
@endsection
@section('Cabecera')
Crear Vendedor
@endsection
@section('contenido')
@if ($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $miError)
        <li>{{$miError}}</li>
    @endforeach
</ul>
</div>
@endif
<div class="card bg.secondary mt-5">
    <div class="card-header" style="text-align:center"><b>Crear Vendedor</b></div>
    <div class="card-body">
    <form name="crear" action="{{route('vendedors.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre Completo" id="nom" >
            </div>
            <div class="col">
                <label for="des" class="col-form-label">Telefono</label>
                <input type="text" name="telefono" class="form-control"  value="{{old('telefono')}}"placeholder="Telefono" id="precio" >
            </div>
            <div class="col">
                <label for="des" class="col-form-label">Direccion</label>
                <input type="text" name="direccion" class="form-control"  value="{{old('direccion')}}"placeholder="Direccion" id="precio" >
            </div>
            <div class="col">
                <label for="des" class="col-form-label">Mail</label>
                <input type="text" name="mail" class="form-control"  value="{{old('mail')}}"placeholder="Maial" id="precio" >
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Crear" class="btn btn-success">
                <input type="reset" value="Borrar" class="btn btn-danger">
            <a href="{{route('vendedors.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
@endsection

