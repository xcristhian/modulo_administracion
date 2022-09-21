<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Producto;
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
       
       return view('producto.crear');
      
    }


    public function store_producto(ProductoRequest $request){

        $producto = new Producto;
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->marca_producto = $request->input('marca_producto');
        $producto->modelo_producto = $request->input('modelo_producto');
        $producto->categoria_producto = $request->input('categoria_producto');
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

       Producto::where('id_producto','like','%'.$id.'%')->delete();

        return back()->with('usuarioEliminado', 'Producto eliminado');
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
