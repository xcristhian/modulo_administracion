@extends("maestra")
@section("titulo", "Guías de Remisión")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <h1 class="is-size-1">Generar Guía de Remisión</h1>
            
            <hr>
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE CLIENTE</th>
                    <th>N#FACTURA</th>
                    <th>FECHA Y HORA</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($venta as $venta)
                   
                    <tr>
                        <td>{{$contador = $contador + 1}}</td>
                        <td>{{$venta->nombre_c}}</td>
                        <td>{{$venta->n_factura_venta}}</td>
                        <td>{{$venta->created_at}}</td>
                       
                    
                        <td>
                            <a href="{{ route('buscar_pdf', $venta->id_venta)}}" class="button is-warning"> Generar PDF</a>
                        </td>
                        
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
                           
                      
                               
                    
                        
                            
                       
                          
    <hr><hr>
   
             
  
            
            <br>
        </div>
        
    </div>
    
</div>
@endsection
