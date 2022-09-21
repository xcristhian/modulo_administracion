<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente(){
     
            $cliente = Cliente::all();
            return view('cliente.mostrarcliente', ['cliente'=> $cliente]);
    }
    public function guardar(Request $request){
       

        $articulo = new cliente;
        $articulo->ruc_c = $request->input('ruc_cliente');
        $articulo->nombre_c = $request->input('nombre_cliente');
        $articulo->direccion_c = $request->input('direccion_cliente');
        $articulo->correo_c = $request->input('correo_cliente');
        $articulo->telefono_c = $request->input('telefono_cliente');
        $articulo->save();

        return back()->with('cliente_registrado','Cliente registrado');
        
        

    }


}
