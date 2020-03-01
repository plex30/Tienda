<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cat = Categoria::orderBy('id')->paginate(2);
        return view('categorias.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $datos = $request->validated();
        $categoria = new Categoria;
        $categoria->nombre = $datos['nombre'];
        $categoria->descripcion = $datos['descripcion'];

        $categoria->save();
        return redirect()->route('categorias.index')->with('mensaje', 'Categoria Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $datos = $request->validated();
        $categoria->nombre = $datos['nombre'];
        $categoria->descripcion = $datos['descripcion'];

        $categoria->update();
        return redirect()->route('categorias.index')->with('mensaje', 'Categoria Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('mensaje', 'Categoria Borrada');
    }
}
