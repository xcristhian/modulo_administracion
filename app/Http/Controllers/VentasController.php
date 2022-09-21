<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Producto;
use App\Venta;
use App\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VentasController extends Controller
{
    private $Cliente = null;
    private $Producto = null;
    public function __CONSTRUCT(){
        $this->Cliente = new Cliente();
        $this->Producto = new Producto();
    }
    public function ventas(){
        return view('ventas.mostrarventa');
    }

    public function guardar_venta(Request $request){

      
        
        $venta = new Venta;
        $venta->id_cliente = $request->input('cliente');
        $venta->n_factura_venta = $request->input('n_factura_venta');
        $venta->subtotal = $request->input('subTotal');
        $venta->iva = $request->input('taxAmount');
        $venta->total = $request->input('totalAftertax');
        $venta->cantidad_pagada = $request->input('amountPaid');
        $venta->total_debido = $request->input('amountDue');
        $venta->save();

     
        ///////OBTENEMOS EL ÚLTIMO ID DE VENTA PARA PODERLO UTILIZAR EN EL DETALLE DE VENTA
        $sql_id_venta = 'Select id_venta from ventas order by id_venta DESC LIMIT 1';
        $temp_id = DB::select($sql_id_venta);
        foreach ($temp_id as $temp_id){
                $id_v = $temp_id->id_venta;
        }

    
        $a = $request->all();
        $temp_tam = sizeof($a['price']);
        $tamanio = $temp_tam - 1;
        $contador = 0;
        for ($i = 0; $i <= $tamanio; $i++) {
            $detalle_venta = new DetalleVenta;
            $detalle_venta->id_venta = $id_v;
            $detalle_venta->id_producto = $a['id_producto'][$i];
            $detalle_venta->cantidad_producto= $a['quantity'][$i];
            $detalle_venta->precio_producto= $a['price'][$i];
            $detalle_venta->total_compra= $a['total'][$i];
            $detalle_venta->save();
        }
      
        
        
       
       return back()->with('Ventaregistrada','Venta registrada');

    }

    public function findClient(Request $req ){
        return $this->Cliente
                    ->findByruc($req->input('q'));
    }

    public function findProducto(Request $req ){
        return $this->Producto
                    ->producto_by_name($req->input('q'));
    }



}
