@extends('plantillas.plantilla')
@section('titulo')
Actualizar Articulos
@endsection
@section('Cabecera')
Actualizar Articulos
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
    <div class="card-header" style="text-align:center"><b>Actualizar Articulo</b></div>
    <div class="float-left ml-3">
        <img src="{{asset($articulo->imagen)}}" width="80vw" height="80vh" class="rounded-circle mr-2">
    </div>
    <div class="card-body">
    <form name="edit" action="{{route('articulos.update', $articulo)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$articulo->nombre}}"  id="nom" >
            </div>
            <div class="col">
                <label for="pre" class="col-form-label">Precio</label>
                <input type="text" name="precio" class="form-control"  value="{{$articulo->precio}}" id="precio" >
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="sto" class="col-form-label">Stock</label>
            <input type="text" name="stock" class="form-control" value="{{$articulo->stock}}" id="stock" >
            </div>
            <div class="col">
                <label for="imagen" class="col-form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control p-1"  id="imagen" accept="image/*">
            </div>
            <div class="col">
                <label for="cat" class="col-form-label">Categoria</label>
                <select name="cat_id" class="form-control">
                    @foreach ($categorias as $item)
                     @if($articulo->cat_id==$item->id)
                        <option value="{{$item->id}}"selected>{{$item->nombre}}</option>
                     @else
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                     @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Actualizar" class="btn btn-success">
                <input type="reset" value="Borrar" class="btn btn-danger">
            <a href="{{route('articulos.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
@endsection
