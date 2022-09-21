<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    public function findByruc($q){
        return $this->where('ruc_c','like',"%$q%")
                    ->get();
    }
    
}
