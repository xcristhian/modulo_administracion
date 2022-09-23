@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <hr>
            <a href="{{route('vista_agregar_venta')}}">            
                <button class="button is-success">Crear venta</button>
                </a>
                <hr>
            <h1 class="is-size-1">Ventas registradas</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                         
                            <th>IDENTIFICADOR</th>
                            <th>NOMBRE DE CLIENTE</th>
                            <th>NUMERO DE FACTURA</th>
                            <th>SUBTOTAL</th>
                            <th>IVA</th>
                            <th>TOTAL</th>
                            <th>CANTIDAD ABONADA</th>
                            <th>TOTAL POR PAGAR</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($venta as $venta)
                            <tr>
                                <td>{{$venta->id_venta}}</td>
                                <td>{{$venta->nombre_c}}</td>
                                <td>{{$venta->n_factura_venta}}</td>
                                <td>{{$venta->subtotal}}</td>
                                <td>{{$venta->iva}}</td>
                                <td>{{$venta->total}}</td>
                                <td>{{$venta->cantidad_pagada}}</td>
                                <td>{{$venta->total_debido}}</td>
                                <td>
                                    <a href="{{ route('vista_detalle_venta', $venta->id_venta)}}" class="button is-warning">Mostrar detalle</a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        @verbatim
                      
   
           
             
    
            @endverbatim
            
            <br>
        </div>
        
    </div>
    
</div>
@endsection
