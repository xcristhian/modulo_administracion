<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Serie;
use Illuminate\Support\Facades\DB;


class SerieController extends Controller
{
    public function serie(){
        $producto = Producto::all();
        $contador = 0;
        return view('serie.mostrarserie', ['producto'=> $producto], compact('contador'));
    }

    public function vista_registrar_serie($id){
        $producto = Producto::all()->where('id_producto', $id);

        $cant_producto = $producto;
        foreach($cant_producto as $cant_producto){
        $cantidad = intval($cant_producto->cantidad);
        }        

        $sql = 'SELECT COUNT(*) as "cuenta" FROM serie where id_producto ='.$id;
        $temp_falta = DB::select($sql);

        $temp_f = $temp_falta;
        foreach($temp_f as $temp_f){
        $serie_existente = intval($temp_f->cuenta);
        }
        $falta = $cantidad - $serie_existente;

        return view('serie.editar', compact('producto', 'temp_falta', 'falta'));
    }

    public function crear_serie(Request $request, $id){

        $serie = new Serie;
        $serie->id_producto = $id;
        $serie->numero_serie = $request->input('numero_serie');
        $serie->bodega = 1;
        
        
        $serie->save();
       
        return back()->with('serieGuardada','Serie registrada con éxito');

    }
    public function listar_serie($id){

        $serie = Serie::all()->where('id_producto', $id);
        $ide = $id;
        $contador = 0;
        return view('serie.listar', compact('serie', 'ide', 'contador'));

    }
}
