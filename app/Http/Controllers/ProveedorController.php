<?php

namespace App\Http\Controllers;
use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function proveedor(){
        return view('proveedor.mostrarproveedor');
    }
    public function guardar(Request $request){
       

        $proveedor = new Proveedor;
        $proveedor->nombre_p = $request->input('nombre_p');
        $proveedor->ruc_p = $request->input('ruc_p');
        $proveedor->direccion_p = $request->input('direccion_p');
        $proveedor->correo_p = $request->input('correo_p');
        $proveedor->telefono_p = $request->input('telefono_p');
        $proveedor->save();

        return back()->with('proveedor_registrado','Proveedor registrado');
        
        

    }
}
