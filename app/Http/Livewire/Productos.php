<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Productos extends Component
{
    public $searchTerm;
    public $productos;
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->productos = Producto::where('descripcion', 'ilike', $searchTerm)->get();
        return view('livewire.productos');
        //return view('productos.index', compact('productos'));
        //return view('productos.index');
    }
}
