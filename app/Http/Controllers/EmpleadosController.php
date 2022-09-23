<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
use Illuminate\Support\Facades\DB;
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
        
        $sql = 'SELECT COUNT(*) as "cuenta" FROM mantenimientos m where m.empleado_asignado ='.$id;
        $temp = DB::select($sql);

        $cuenta = $temp;
        foreach($cuenta as $cuenta){
        $cuenta_total = intval($cuenta->cuenta);
        }

        if ($cuenta_total == 0) {
            Empleados::where('id_empleados','like','%'.$id.'%')->delete();
            return back()->with('empleadoEliminado', 'Empleado eliminado');
        } elseif ($cuenta_total > 0) {
            return back()->with('empleadoNoEliminada', 'Error - No se puede eliminar el empleado por el motivo de estar relacionada con mantenimientos existentes');
        }
       /* Empleados::where('id_empleados','like','%'.$id.'%')->delete();
 
         return back()->with('empleadoEliminado', 'Empleado eliminado');*/
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
