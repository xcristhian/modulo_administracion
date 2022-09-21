<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function tituloInvertido(){
        return strrev($this->titulo);
    }
    public function producto_by_name($q){
        return $this->where('nombre_producto','like',"%$q%")
                    ->get();
    }
    
}
