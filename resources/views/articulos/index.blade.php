@extends('plantillas.plantilla')
@section('titulo')
    Store
@endsection
@section('cabecera')
    Gestión de Articulos
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class='alert alert-success my-3'>{{$text}}</p>
@endif
<div class="m-3 p-5" style="border:1px solid gray; border-radius: 0.4em;">
<a href="{{route('articulos.create')}}" class="btn btn-outline-success mb-4 fa fa-floppy-o fa"></a>
<form action="{{route('articulos.index')}}" name="search" method="get" class="form-inline float-right">
    <label for="categoria" style="color:gray"><b>Buscar por Categoria</b>&nbsp;&nbsp;</label>
    <select name="categoria_id" class="form-control">
        <option value="%">---</option>
        <option value="-1">Sin Categoria</option>
        @foreach ($categorias as $cat)
        @if ($cat->id == $request->categoria_id)
        <option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
        @else
        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
        @endif
        @endforeach
    </select>&nbsp;&nbsp;&nbsp;
    <label for="precio" style="color:gray"><b>Buscar por Precio:</b>&nbsp;&nbsp; </label>
    <select class="form-control" name="precio">
                <option value="4">---</option>
                <option value="1">De 1 a 50</option>
                <option value="2">De 50 a 100</option>
                <option value="3">Mayor que 100</option>
            </select>

        <button type="submit" class="btn btn-outline-secondary fa fa-search fa ml-3"></button>
</form>
<table class="table table-hover mt-2">
    <thead class="thead" style="background-color:  #bbbbbb ">
      <tr style="text-align:center">
        <th scope="col">Detalles</th>
        <th scope="col" class="align-middle">Nombre</th>
        <th scope="col" class="align-middle">Precio</th>
        <th scope="col" class="align-middle">Stock</th>
        <th scope="col" class="align-middle">Imagen</th>
        <th scope="col" class="align-middle">Categoria</th>
        <th scope="col" class="align-middle">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $item)
        <tr style="text-align:center">
            <th scope="row">
            <a href="{{route('articulos.show', $item)}}" style="text-decoration:none" class="btn btn-outline-primary fa fa-clipboard fa mt-3"></a>
            </th>
            <td class="align-middle">{{$item->nombre}}</td>
            <td class="align-middle">{{$item->precio.'€'}}</td>
            <td class="align-middle">{{$item->stock.' Uds'}}</td>
            <td class="align-middle"><img src="{{asset($item->imagen)}}" width="60" height="60" class="img-fluid rounded-circle"></td>
            <td class="align-middle">{{$item->categoria->nombre}}</td>

            <td class="align-middle">
                <form name="borrar" method="post" action="{{route('articulos.destroy', $item)}}">
                  @csrf
                  @method('DELETE')
                <a href="{{route('articulos.edit', $item)}}" class="btn btn-outline-warning fa fa-edit fa"></a>
                <button type="submit" value="borrar" class="btn btn-outline-danger fa fa-trash fa"onclick="return confirm('¿Está seguro que desea borrar: {{$item->nombre}}?')" ></button>
                </form>
                </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <p class="mt-5"><b>Mostrando: {{$articulos->count()}} de un total de {{$articulos->total()}} articulos.</b></p>
  {{$articulos->appends(Request::except('page'))->links()}}
</div>
@endsection
