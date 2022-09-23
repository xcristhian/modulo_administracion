<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function categoria(){
        $categoria = Categoria::all();
        $contador = 0;
        return view('categoria.mostrar', ['categoria'=> $categoria], compact('contador'));
    }

    public function show(){
        return view('categoria.crear');
    }

    public function store(CategoriaRequest $request){

        $categoria = new Categoria;
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->save();
        return view('categoria.crear');
     

        return 'Completado';
    }

    public function delete_categoria($id){
        
        $sql = 'SELECT COUNT(*) as "cuenta" FROM producto p where p.categoria_producto ='.$id;
        $temp = DB::select($sql);

        $cuenta = $temp;
        foreach($cuenta as $cuenta){
        $cuenta_total = intval($cuenta->cuenta);
        }
       

        
        if ($cuenta_total == 0) {
            Categoria::where('id_categoria','like','%'.$id.'%')->delete();
            return back()->with('categoriaEliminada', 'Categoria eliminado');
        } elseif ($cuenta_total > 0) {
            return back()->with('categoriaNoEliminada', 'Error - No se puede eliminar la categoria por el motivo de estar relacionada con productos existentes');
        }

/*
        
 
         return back()->with('categoriaEliminada', 'Categoria eliminado');*/
     }

    public function edit_categoria($id){
        $categoria = Categoria::all()->where('id_categoria', $id);
        return view('categoria.editar', compact('categoria'));
    }

    public function edit_categ(Request $request, $id){
        $datos_categoria = request()->except((['_token', '_method']));
        Categoria::where('id_categoria', '=', $id)->update($datos_categoria);
        return back()->with('categoriaModificada','Categoria Modificada');

    }

    public function consultar_categoria(Request $req){
        return 'AAAAAAAAAAAAAAAAAAAAAAAAAAAA';
    }

}
