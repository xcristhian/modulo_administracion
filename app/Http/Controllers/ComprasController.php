<?php

namespace App\Http\Controllers;
use App\Proveedor;
use App\Producto;
use App\Compras;
use App\DetalleCompras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    private $Proveedor = null;
    public function __CONSTRUCT(){
        $this->Proveedor = new Proveedor();
    }

    public function vista_agregar_compra(){
        return view('compras.mostrarcompra');
    }


    public function findProveedor(Request $req ){
        return $this->Proveedor
                    ->findByruc_proveedor($req->input('q'));
    }

    public function vista_mostrar_compra(){
        $sql = 'SELECT c.id_compras, p.nombre_p, c.n_factura_compra FROM compras c LEFT JOIN proveedors p ON c.id_proveedor = p.id_proveedor ORDER BY c.id_compras';
        $compra = DB::select($sql);
        return view('compras.compra', compact('compra'));
    }

    public function vista_detalle_compra($id){
        $contador=0;
        $sql = 'SELECT c.id_compras, p.nombre_producto, d.cantidad, d.precio_compra, d.total FROM compras c LEFT JOIN detalle_compra d ON c.id_compras = d.id_compras LEFT JOIN producto p ON p.id_producto = d.id_producto where c.id_compras='.$id.' ORDER BY c.id_compras';
        $detalle = DB::select($sql);
        return view('compras.detalle', compact('contador','detalle'));
    }

    public function guardar_compra(Request $request){
        $compra = new Compras;
        $compra->id_proveedor = $request->input('proveedor');
        $compra->n_factura_compra = $request->input('n_factura_compra');
        $compra->save();

     
        ///////OBTENEMOS EL ÚLTIMO ID DE VENTA PARA PODERLO UTILIZAR EN EL DETALLE DE VENTA
        $sql_id_compra = 'Select id_compras from compras order by id_compras DESC LIMIT 1';
        $temp_id = DB::select($sql_id_compra);
        foreach ($temp_id as $temp_id){
                $id_v = $temp_id->id_compras;
        }

        $a = $request->all();
        $temp_tam = sizeof($a['price']);
        $tamanio = $temp_tam - 1;
        $contador = 0;
        for ($i = 0; $i <= $tamanio; $i++) {
            $detalle_compra = new DetalleCompras;
            $detalle_compra->id_compras = $id_v;
            $detalle_compra->id_producto = $a['id_producto'][$i];
            $detalle_compra->cantidad= $a['quantity'][$i];
            $detalle_compra->precio_compra= $a['price'][$i];
            $detalle_compra->total= $a['total'][$i];
            $detalle_compra->save();
        }
        return back()->with('Compraregistrada','Compra registrada');


    }
}
