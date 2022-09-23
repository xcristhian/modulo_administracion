@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <hr>
            <a href="{{route ('vista_agregar_compra')}}">            
                <button class="button is-success">Crear compra</button>
                </a>
                <hr>
            <h1 class="is-size-1">Compras registradas</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                         
                            <th>IDENTIFICADOR</th>
                            <th>NOMBRE DE PROVEEDOR</th>
                            <th>NUMERO DE FACTURA</th>
                            <th>DETALLE</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($compra as $compra)
                            <tr>
                                <td>{{$compra->id_compras}}</td>
                                <td>{{$compra->nombre_p}}</td>
                                <td>{{$compra->n_factura_compra}}</td>
                                
                                <td>
                                    <a href="{{ route('vista_detalle_compra', $compra->id_compras)}}" class="button is-warning">Mostrar detalle</a>
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
