<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
class EmpleadosController extends Controller
{
    public function empleados(){
        $empleados = Empleados::all();
        $contador = 0;
        return view('empleados.mostrar', ['empleados'=> $empleados], compact('contador'));
    }

    public function vista_crear_empleado(){
       
        return view('empleados.crear');
    }

    public function delete_empleado($id){
        
 
        Empleados::where('id_empleados','like','%'.$id.'%')->delete();
 
         return back()->with('empleadoEliminado', 'Empleado eliminado');
     }

     public function crear_empleado(Request $request){

        $empleado = new Empleados;
        $empleado->nombres_empleado = $request->input('nombres_empleado');
        $empleado->apellidos_empleado = $request->input('apellidos_empleado');
        $empleado->cedula_empleado = $request->input('cedula_empleado');
        $empleado->direccion_empleado = $request->input('direccion_empleado');
        $empleado->correo_empleado = $request->input('correo_empleado');
        $empleado->save();
       
        return back()->with('Empleadoingresado','Empleado ingresado');

    }


    public function edit_empleado($id){
        $empleado = Empleados::all()->where('id_empleados', $id);
        return view('empleados.editar', compact('empleado'));
    }

    public function guardar_edit(Request $request, $id){
        $datos_empleado = request()->except((['_token', '_method']));
        Empleados::where('id_empleados', '=', $id)->update($datos_empleado);
        return back()->with('empleadoModificado','Empleado modificada');

    }
}
