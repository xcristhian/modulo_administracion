<?php

namespace App\Http\Controllers;
use App\Venta;
use App\Cliente;
use App\DetalleVenta;
use App\Producto;
use PDF;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuiasController extends Controller
{
    
    public function guias(){
        $venta = Venta::all();
        $contador = 0;

        $sql = 'SELECT o.nombre_c, a.id_venta, a.n_factura_venta, a.created_at FROM clientes o LEFT JOIN ventas a ON o.id_cliente = a.id_cliente';
        $venta = DB::select($sql);

        return view('guias.mostrarguia', ['venta'=> $venta], compact('contador'));
    }

    public function buscar_pdf($id){

    
    $Object = new DateTime();  
    $DateAndTime = $Object->format("d-m-Y h:i:s a");  

    $sql = 'SELECT v.id_venta, v.n_factura_venta, c.nombre_c, c.ruc_c, c.correo_c, c.direccion_c, p.nombre_producto, d.cantidad_producto 
    FROM ventas v LEFT JOIN clientes c ON c.id_cliente = v.id_cliente LEFT JOIN detalle_venta d ON d.id_venta=v.id_venta 
    LEFT JOIN producto p ON p.id_producto=d.id_producto WHERE v.id_venta ='.$id;
    $datos = DB::select($sql);

    $sql_contar = 'SELECT COUNT(*) as "cuenta" FROM ventas v LEFT JOIN detalle_venta d ON v.id_venta = d.id_venta WHERE v.id_venta =' .$id;
    $datos_contar = DB::select($sql_contar);
    
    foreach($datos_contar as $datos_contar){
        $cuenta_producto = intval($datos_contar->cuenta);
        }

    $sql_productor = 'SELECT v.id_venta, p.nombre_producto, d.cantidad_producto FROM ventas v LEFT JOIN clientes c ON c.id_cliente = v.id_cliente LEFT JOIN detalle_venta d ON d.id_venta=v.id_venta LEFT JOIN producto p ON p.id_producto=d.id_producto WHERE v.id_venta =' .$id;
    $datos_productos = DB::select($sql_productor);
        

    $pdf = \PDF::loadview('prueba', compact('datos', 'DateAndTime', 'cuenta_producto', 'datos_productos'));
    return $pdf->download('prueba.pdf');
   

    //var_dump($venta);
    /*foreach ($venta as $venta) {
        var_dump($venta->id_cliente);
        $cliente = Cliente::all()->where('id_cliente', $venta->id_cliente);

        
        $sql = 'SELECT * FROM detalle_venta where id_venta = '.$venta->id_venta;
        $detalle_venta = DB::select($sql);

        var_dump($detalle_venta);*/
       
       
        
    
    /*foreach ($venta as $venta) {
        $cliente = Cliente::all()->where('id_cliente', $venta->id_cliente);
        $sql = 'SELECT * FROM detalle_venta where id_venta = '.$venta->id_venta;
        $detalle_venta = DB::select($sql);

        
        foreach($detalle_venta as $detalle_venta){
            $sql_producto = 'SELECT * FROM producto where id_producto ='.$detalle_venta->id_producto;
            $producto = DB::select($sql_producto);

            $pdf = \PDF::loadview('prueba', compact('venta', 'DateAndTime'));*/
         //  return $pdf->download('prueba.pdf');
           
                    
                   
                    
        //}
       
    }
   
  
    
}
