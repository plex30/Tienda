<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = ['nombre', 'telefono', 'direccion', 'mail'];

    public function articulo(){
        return $this->belongsToMany('App\Articulo')->withPivot('fecha_venta', 'cantidad');
    }

    public function scopebuscarNombre($query, $v){

        return $query->where('nombre', 'like', "%$v%");
    }
}
