<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente(){
     
            $cliente = Cliente::all();
            return view('cliente.mostrarcliente');
    }

    public function vista_mostrar_cliente(){
        $contador = 0;
        $cliente = Cliente::all();
        return view('cliente.cliente', compact('cliente', 'contador'));
    }

    public function vista_crear_cliente(){
        return view('cliente.crear');
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

    public function edit_cliente($id){
        $cliente = Cliente::all()->where('id_cliente', $id);
        return view('cliente.editar', compact('cliente'));
    }

    public function editar_cliente(Request $request, $id){
        $datos_cliente = request()->except((['_token', '_method']));
        Cliente::where('id_cliente', '=', $id)->update($datos_cliente);
        return back()->with('clienteModificado','Cliente modificado');

    }


}
