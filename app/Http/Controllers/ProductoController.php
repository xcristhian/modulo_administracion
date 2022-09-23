<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Producto;
use App\Categoria;
use Illuminate\Support\Facades\DB;
class ProductoController extends Controller
{
    public function index(){
       $producto = Producto::all();
       $contador = 0;
       return view('producto.mostrar', ['producto'=> $producto], compact('contador'));
        //return view('producto.crear');
    }
    public function show(){

        return view('producto.mostrar');
        
    }

    public function producto(){
        $producto = Producto::all();
       $contador = 0;
       return view('producto.mostrar', ['producto'=> $producto], compact('contador'));
      
    }

    public function vista_crear_producto(){
       
       $categoria = Categoria::all();

       return view('producto.crear', compact('categoria'));
      
    }


    public function store_producto(ProductoRequest $request){

        $producto = new Producto;
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->marca_producto = $request->input('marca_producto');
        $producto->modelo_producto = $request->input('modelo_producto');
        $producto->categoria_producto = $request->input('mostrar_categoria');
        $producto->descripcion_producto = $request->input('descripcion_producto');
        $producto->cantidad = $request->input('cantidad');
        $producto->precio_venta = 0;
        $producto->precio_compra = 0;
        $producto->save();
       
        return back()->with('usuarioModificado','Usuario modificado');

    }
    public function update_producto(){
        return 'Hola';
    }
    public function delete_producto($id){
       // Producto::destroy($id_producto);
       $sql = 'SELECT COUNT(*) as "cuenta" FROM detalle_venta v INNER JOIN detalle_compra c where v.id_producto = '.$id.' OR c.id_producto ='.$id;
       $temp = DB::select($sql);

       $cuenta = $temp;
       foreach($cuenta as $cuenta){
       $cuenta_total = intval($cuenta->cuenta);
       }

       if ($cuenta_total == 0) {
           Producto::where('id_producto','like','%'.$id.'%')->delete();
           return back()->with('productoEliminado', 'Producto eliminado');
       } elseif ($cuenta_total > 0) {
           return back()->with('productoNoEliminada', 'Error - No se puede eliminar el producto por el motivo de estar relacionada con compra/ventas existentes');
       }


       //Producto::where('id_producto','like','%'.$id.'%')->delete();

       // return back()->with('usuarioEliminado', 'Producto eliminado');
    }

    public function edit_producto($id){
        $producto = Producto::all()->where('id_producto', $id);
        return view('producto.editar', compact('producto'));
    }

    public function edit_p(Request $request, $id){
        $datos_producto = request()->except((['_token', '_method']));
        Producto::where('id_producto', '=', $id)->update($datos_producto);
        return back()->with('productoModificado','Producto modificado');

    }




}
