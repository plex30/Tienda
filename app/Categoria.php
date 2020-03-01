<?php

namespace App;
use App\Articulo;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function articulos(){
        return $this->hasMany(Articulo::class);
    }
}
