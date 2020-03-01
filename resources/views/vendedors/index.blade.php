@extends('plantillas.plantilla')
@section('titulo')
    Store
@endsection
@section('cabecera')
    Gestión de Vendedores
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class='alert alert-success my-3'>{{$text}}</p>
@endif
<div class="m-3 p-5" style="border:1px solid gray; border-radius: 0.4em;">
<a href="{{route('vendedors.create')}}" class="btn btn-outline-success mb-4 fa fa-floppy-o fa"></a>
<form action="{{route('vendedors.index')}}" name="search" method="get" class="form-inline float-right">
<b style="color:gray">Buscar por Nombre:</b> &nbsp;&nbsp;
<input type="text" name="nombre" class="form-control">
<button type="submit" class="btn btn-outline-secondary fa fa-search fa ml-2"></button>
</form>
<table class="table table-hover mt-2">
    <thead class="thead" style="background-color:  #bbbbbb ">
      <tr style="text-align:center">
        <th scope="col" class="align-middle">Detalles</th>
        <th scope="col" class="align-middle">ID</th>
        <th scope="col" class="align-middle">Nombre</th>
        <th scope="col" class="align-middle">Telefono</th>
        <th scope="col" class="align-middle">Direccion</th>
        <th scope="col" class="align-middle">Mail</th>
        <th scope="col" class="align-middle">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($vendedores as $item)
        <tr style="text-align:center">
            <th scope="row">
            <a href="{{route('vendedors.show', $item)}}" style="text-decoration:none" class="btn btn-outline-primary fa fa-clipboard fa "></a>
            </th>
            <td class="align-middle">{{$item->id}}</td>
            <td class="align-middle">{{$item->nombre}}</td>
            <td class="align-middle">{{$item->telefono}}</td>
            <td class="align-middle">{{$item->direccion}}</td>
            <td class="align-middle">{{$item->mail}}</td>

            <td class="align-middle">
                <form name="borrar" method="post" action="{{route('vendedors.destroy', $item)}}">
                  @csrf
                  @method('DELETE')
                <a href="{{route('vendedors.edit', $item)}}" class="btn btn-outline-warning fa fa-edit fa"></a>
                <button type="submit" value="borrar" class="btn btn-outline-danger fa fa-trash fa" onclick="return confirm('¿Está seguro que desea borrar: {{$item->nombre}}?')" ></button>
                </form>
                </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <p class="mt-5"><b>Mostrando: {{$vendedores->count()}} de un total de {{$vendedores->total()}} vendedores.</b></p>
  {{$vendedores->appends(Request::except('page'))->links()}}
  </div>
@endsection
