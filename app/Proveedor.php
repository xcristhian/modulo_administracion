<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    public function tituloInvertido(){
        return strrev($this->titulo);
    }
    public function findByruc_proveedor($q){
        return $this->where('ruc_p','like',"%$q%")
                    ->get();
    }
}
