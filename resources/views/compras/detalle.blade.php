@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <hr>
            <h1 class="is-size-1">Detalle de venta</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                         
                            <th>#</th>
                            <th>ID COMPRA</th>
                            <th>PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalle as $detalle)
                            <tr>
                                <td>{{$contador = $contador + 1}}</td>
                                <td>{{$detalle->id_compras}}</td>
                                <td>{{$detalle->nombre_producto}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{$detalle->precio_compra}}</td>
                                <td>{{$detalle->total}}</td>
                               
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        @verbatim
                      
   
           
             
                       
            @endverbatim
            <a href="{{ route("vista_mostrar_compra") }}">
                <button class="button is-warning" type="button">Atrás</button>
            </a>
            <br>
        </div>
        
    </div>
    
</div>
@endsection
