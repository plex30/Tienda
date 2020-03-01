<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use App\Vendedor;
use Illuminate\Support\Facades\Storage;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $categoria_id = $request->get('categoria_id');
        $precio=$request->get('precio');
        $articulos=Articulo::orderBy('nombre')->buscarCategoria($categoria_id)->buscarPrecio($precio)->paginate(2);
        return view('articulos.index', compact('articulos', 'categorias', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::orderBy('nombre')->get();
        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        $datos = $request->validated();

        $articulo = new Articulo;
        $articulo->nombre = $datos['nombre'];
        $articulo->precio = $datos['precio'];
        $articulo->stock = $datos['stock'];
        $articulo->cat_id = $datos['cat_id'];
        if (isset($datos['imagen'])) {
            $file = $datos['imagen'];
            $nom = 'imagen/'.time() .'_'. $file->getClientOriginalName();
            Storage::disk('public')->put($nom, \File::get($file));
            $articulo->imagen = "img/$nom";
        }
        $articulo->save();
        return redirect()->route('articulos.index')->with('mensaje', 'Articulo Creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {

        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('articulos.edit', compact('articulo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloRequest $request, Articulo $articulo)
    {
        $datos = $request->validated();
        $articulo->nombre = $datos['nombre'];
        $articulo->precio = $datos['precio'];
        $articulo->stock = $datos['stock'];
        if (isset($datos['imagen'])) {
            $file = $datos['imagen'];
            $nom = 'imagen/'.time() .'_'. $file->getClientOriginalName();
            Storage::disk('public')->put($nom, \File::get($file));
            if (basename($articulo->imagen)!='default.jpg') {
                unlink($articulo->imagen);
            }
            $articulo->imagen = "img/$nom";
        }
        $articulo->update();
        return redirect()->route('articulos.index')->with('mensaje', 'Articulo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $imagen = $articulo->imagen;
        if(basename($imagen)!='default.jpg'){
            unlink(($imagen));
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with('mensaje', 'Articulo Borrado');
    }

    public function aVenta(Articulo $articulo){
        $vendedores = Vendedor::orderBy('nombre')->get();
        return view('articulos.aVenta', compact('vendedores', 'articulo'));
    }

    public function anadirVenta(Request $request){
        $id = $request->articulo_id;
        $cantidad = $request->cantidad;
        $fecha = $request->fecha;
        $articulo = Articulo::find($id);
        $articulo->vendedores()->attach([$request->vendedor_id =>["cantidad" => $cantidad, "fecha_venta" => $fecha]]);
        return redirect()->route('articulos.show', $articulo)->with('mensaje', 'Venta Añadida');
    }
}
