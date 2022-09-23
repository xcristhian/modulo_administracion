<?php

namespace App\Http\Controllers;
use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function proveedor(){
        return view('proveedor.mostrarproveedor');
    }

    public function vista_mostrar_proveedor(){
        $contador = 0;
        $proveedor = Proveedor::all();
        return view('proveedor.proveedor', compact('proveedor', 'contador'));
    }

    public function vista_crear_proveedor(){
        return view('proveedor.crear');
    }

    public function guardar(Request $request){
       
//
        $proveedor = new Proveedor;
        $proveedor->nombre_p = $request->input('nombre_p');
        $proveedor->ruc_p = $request->input('ruc_p');
        $proveedor->direccion_p = $request->input('direccion_p');
        $proveedor->correo_p = $request->input('correo_p');
        $proveedor->telefono_p = $request->input('telefono_p');
        $proveedor->save();

        return back()->with('proveedor_registrado','Proveedor registrado');
    }


    public function edit_proveedor($id){
        $proveedor = Proveedor::all()->where('id_proveedor', $id);
        return view('proveedor.editar', compact('proveedor'));
    }

    public function editar_proveedor(Request $request, $id){
        $datos_proveedor = request()->except((['_token', '_method']));
        Proveedor::where('id_proveedor', '=', $id)->update($datos_proveedor);
        return back()->with('proveedorModificado','Proveedor modificado');

    }
}
