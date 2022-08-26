<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDF(){
        $pdf = \PDF::loadview('prueba');
        return $pdf->download('mantenimiento.pdf');

    }
}
