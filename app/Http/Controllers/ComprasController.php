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
    public function compras(){
        return view('compras.mostrarcompra');
    }
    public function findProveedor(Request $req ){
        return $this->Proveedor
                    ->findByruc_proveedor($req->input('q'));
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
