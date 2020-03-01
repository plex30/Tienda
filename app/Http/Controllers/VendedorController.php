<?php

namespace App\Http\Controllers;

use App\Vendedor;
use Illuminate\Http\Request;
use App\Http\Requests\VendedorRequest;
use Illuminate\Support\Facades\Storage;
class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre=$request->get('nombre');
        $vendedores = Vendedor::orderBy('nombre')->buscarNombre($nombre)->paginate(3);
        return view('vendedors.index', compact('vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendedores = Vendedor::orderBy('nombre')->get();
        return view('vendedors.create', compact('vendedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendedorRequest $request)
    {
        $datos = $request->validated();
        $vendedor = new Vendedor;
        $vendedor->nombre = $datos['nombre'];
        $vendedor->telefono = $datos['telefono'];
        $vendedor->direccion = $datos['direccion'];
        $vendedor->mail = $datos['mail'];
        $vendedor->save();
        return redirect()->route('vendedors.index')->with('mensaje', 'Vendedor Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedor)
    {
        return view('vendedors.show', compact('vendedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedor)
    {
        return view('vendedors.edit', compact('vendedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(VendedorRequest $request, Vendedor $vendedor)
    {
        $datos = $request->validated();
        $vendedor->nombre = $datos['nombre'];
        $vendedor->telefono = $datos['telefono'];
        $vendedor->direccion = $datos['direccion'];
        $vendedor->mail = $datos['mail'];
        $vendedor->update();
        return redirect()->route('vendedors.index')->with('mensaje', 'Vendedor Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedors.index')->with('mensaje', 'Vendedor Borrado');
    }



}
