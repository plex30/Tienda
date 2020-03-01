@extends('plantillas.plantilla')
@section('titulo')
Crear Articulos
@endsection
@section('Cabecera')
Crear Articulos
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
    <div class="card-header" style="text-align:center"><b>Crear Articulo</b></div>
    <div class="card-body">
    <form name="crear" action="{{route('articulos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre" id="nom" >
            </div>
            <div class="col">
                <label for="pre" class="col-form-label">Precio</label>
                <input type="text" name="precio" class="form-control"  value="{{old('precio')}}"placeholder="Precio" id="precio" >
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="sto" class="col-form-label">Stock</label>
            <input type="text" name="stock" class="form-control" value="{{old('stock')}}" placeholder="Stock" id="stock" >
            </div>
            <div class="col">
                <label for="imagen" class="col-form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control p-1"  id="imagen" accept="image/*">
            </div>
            <div class="col">
                <label for="cat" class="col-form-label">Categoria</label>
                <select name="cat_id" class="form-control">
                    @foreach ($categorias as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Crear" class="btn btn-success">
                <input type="reset" value="Borrar" class="btn btn-danger">
            <a href="{{route('articulos.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
@endsection

