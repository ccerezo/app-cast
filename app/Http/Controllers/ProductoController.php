<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Color;
use App\Models\Linea;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Talla;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineas = Linea::pluck('nombre','id');
        $categorias = Categoria::pluck('nombre','id');
        $tallas = Talla::all();
        $bodegas = Bodega::pluck('nombre','id');
        $marcas = Marca::pluck('nombre','id');
        $modelos = Modelo::pluck('nombre','id');
        $colores = Color::all();
        return view('productos.create', compact('lineas','categorias','tallas','bodegas','marcas','modelos','colores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
