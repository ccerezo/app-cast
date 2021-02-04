<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function bodega() {
        return $this->belongsTo('App\Models\Bodega');
    }

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function color() {
        return $this->belongsTo('App\Models\Color');
    }

    public function linea() {
        return $this->belongsTo('App\Models\Linea');
    }

    public function marca() {
        return $this->belongsTo('App\Models\Marca');
    }

    public function modelo() {
        return $this->belongsTo('App\Models\Modelo');
    }

    public function talla() {
        return $this->belongsTo('App\Models\Talla');
    }
}
