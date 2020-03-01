@extends('plantillas.plantilla')
@section('titulo')
    Store
@endsection
@section('cabecera')
    Gestión de Categorias
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class='alert alert-success my-3'>{{$text}}</p>
@endif
<div class="m-3 p-5" style="border:1px solid gray; border-radius: 0.4em;">

<a href="{{route('categorias.create')}}" class="btn btn-outline-success mb-4 fa fa-floppy-o fa"></a>
<table class="table table-hover mt-2">
    <thead class="thead" style="background-color:  #bbbbbb ">
      <tr style="text-align:center">
        <th scope="col">Detalles</th>
        <th scope="col" class="align-middle">Nombre</th>
        <th scope="col" class="align-middle">Descripcion</th>
        <th scope="col" class="align-middle">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cat as $item)
        <tr style="text-align:center">
            <th scope="row">
            <a href="{{route('categorias.show', $item)}}" style="text-decoration:none" class="btn btn-outline-primary fa fa-clipboard fa mt-3"></a>
            </th>
            <td class="align-middle">{{$item->nombre}}</td>
            <td class="align-middle">{{$item->descripcion}}</td>
            <td class="align-middle">
                <form name="borrar" method="post" action="{{route('categorias.destroy', $item)}}">
                  @csrf
                  @method('DELETE')
                <a href="{{route('categorias.edit', $item)}}" class="btn btn-outline-warning fa fa-edit fa"></a>
                <button type="submit" value="borrar" class="btn btn-outline-danger fa fa-trash fa"onclick="return confirm('¿Está seguro que desea borrar: {{$item->nombre}}?')" ></button>
                </form>
                </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <p class="mt-5"><b>Mostrando: {{$cat->count()}} de un total de {{$cat->total()}} categorias.</b></p>
  {{$cat->appends(Request::except('page'))->links()}}
</div>
@endsection
