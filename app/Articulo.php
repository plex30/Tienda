<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Articulo extends Model
{
    protected $fillable = ['nombre', 'cantidad', 'precio', 'stock', 'imagen', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class)
        ->withDefault(['nombre'=>'Sin categoria']);
    }

    public function vendedores(){
        return $this->belongsToMany("App\Vendedor")->withPivot('fecha_venta', 'cantidad')->withTimestamps();
    }

    public function scopeBuscarPrecio($query, $v){
        switch ($v) {
            case '1':
                return $query->where('precio', '<', 50);
                break;
            case '2':
                return $query->where('precio', '<', 100)->where('precio', '>', 49);
                break;
            case '3':
                return $query->where('precio', '>', 99);
            break;
            case '4':
                return $query->where('precio', '>', 1);
                break;
        }
    }

    public function scopeBuscarCategoria($query, $v){
        if ($v == '%') {
            return $query->where('categoria_id', 'like', $v)->orWhereNull('categoria_id');
        }
        if ($v=='-1') {
            return $query->whereNull('categoria_id');
        }
        if (!isset($v)) {
            return $query->where('categoria_id', 'like', '%')->orWhereNull('categoria_id');
        }
        return $query->where('categoria_id', $v);
    }
}
