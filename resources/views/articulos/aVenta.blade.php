@extends('plantillas.plantilla')
@section('titulo')
    Store
@endsection
@section('cabecera')
<b style="color:gray; text-align:center">Venta de Articulos</b>
@endsection
@section('contenido')
<form name="venta" action="{{route('articulos.anadirVenta')}}" method="post">
    @csrf
<input type="hidden" name="articulo_id" value="{{$articulo->id}}">
<b class="mt-5" style="color:gray;">Listado de Vendedores: (Selecciona el vendedor que ha hecho la venta)</b>
<select name="vendedor_id" class="form-control" multiple>
    @foreach ($vendedores as $item)
    <option value="{{$item->id}}">{{$item->nombre}}</option>
    @endforeach
</select>

<p class="mt-4"><b style="color:gray;">Cantidad:</b></p>
<div class="col-sm-2">
<input type="number"  name="cantidad" class="form-control" value="cantidad" max="50" min="0" required>
</div>
<p class="mt-4"><b style="color:gray; text-align:center">Fecha Venta:</b></p>
<div class="col-sm-2">
<input type="date"  name="fecha" class="form-control" required>
</div>

    <div class="mt-3 form-group row">
        <input type="submit" value="Añadir" class="btn btn-warning  ml-4 mr-2">
    <a href="{{route('articulos.show', $articulo)}}" class="btn btn-danger">Volver</a>
    </div>
</form>
@endsection

