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
        $request->validate([
            'codigo' => 'required'
        ]);
        $productos = $request->all();
        //return $productos;
        $colores = Color::all();
        foreach($colores as $color) {
            $color_id[] = $color->id;
        }
        //return $color_id;
        $lista = array();
        $k = 0;
        for($i = 0; $i < count($productos['tallas']); $i++){
            for($j = 0; $j < count($color_id); $j++){
                $indice_color = 0;
                //if(is_null($productos['stock'][$k])){
                    $p = new Producto();
                    $p->codigo = $productos['codigo'];
                    $p->bodega_id = $productos['bodega_id'];
                    $p->marca_id = $productos['marca_id'];
                    $p->modelo_id = $productos['modelo_id'];
                    $p->linea_id = $productos['linea_id'];
                    $p->categoria_id = $productos['categoria_id'];
                    $p->talla_id = $productos['tallas'][$i];
                    $p->color_id = $color_id[$j];
                    $p->stock = $productos['stock'][$k]+0;
                    //array_push($lista,$p);
                    $lista[] = $p;
                    $k++;
                /*} else {
                    $lista[] = 'vacio';
                }*/
                $indice_color++;
            }
        }
        return $lista;
        //return $p;
        //return $request->all();
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
