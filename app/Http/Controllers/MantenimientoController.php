<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mantenimientos;
use App\Empleados;
use App\Http\Requests\MantenimientoRequest;
use Illuminate\Support\Facades\DB;
class MantenimientoController extends Controller
{
    public function mantenimiento(){
        //$mantenimiento = Mantenimientos::all();
        $contador = 0;
        $empleados = Empleados::all();
        $sql = 'SELECT o.id_mantenimientos,o.motivo_ingreso, o.detalle_articulo_mantenimiento, a.nombres_empleado, o.estado_mantenimiento, b.nombre_c, o.created_at FROM mantenimientos o LEFT JOIN empleados a ON o.empleado_asignado = a.id_empleados LEFT JOIN clientes b ON o.cliente_mantenimiento = b.id_cliente';
        $mantenimiento = DB::select($sql);

        return view('mantenimientos.mostrarmantenimiento', ['mantenimiento'=> $mantenimiento], compact('contador'));
    }

    public function vista_crear_mantenimiento(){
        $empleados = Empleados::all();
        return view('mantenimientos.crear', compact('empleados'));
    }
    

    public function crear(Request $request){

        $mantenimiento = new Mantenimientos;
        $mantenimiento->motivo_ingreso = $request->input('motivo_ingreso');
        $mantenimiento->detalle_articulo_mantenimiento = $request->input('articulo_mantenimiento');
        $mantenimiento->empleado_asignado = $request->input('mostrar_empleado');
        $mantenimiento->estado_mantenimiento = "ACTIVO";
        $mantenimiento->cliente_mantenimiento = $request->input('id_cliente');
        $mantenimiento->save();
       
        return back()->with('mantenimientoCreado','Mantenimiento creado');

    }

    public function estado_mantenimiento_vista($id){
        $mantenimiento = Mantenimientos::all()->where('id_mantenimientos', $id);
        return view('mantenimientos.estado', compact('mantenimiento'));
    }

    public function cambiar_estado_mantenimiento(Request $request, $id){
        $datos_mantenimiento = request()->except((['_token', '_method']));
        Mantenimientos::where('id_mantenimientos', '=', $id)->update($datos_mantenimiento);
        return back()->with('mantenimientoActualizado','Mantenimiento Actualizado');
    }
    
}
