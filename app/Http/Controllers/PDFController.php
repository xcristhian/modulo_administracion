<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDF(){
        $pdf = \PDF::loadview('prueba');
        return $pdf->download('mantenimiento.pdf');

    }

    public function download()
{
    $data = [
        'titulo' => 'Styde.net'
    ];

    $pdf = \PDF::loadView('prueba', $data);

    return $pdf->download('archivo.pdf');
}
    
}
