@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
          
            <h1 class="is-size-1">Bodega:Productos</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($producto as $producto)
                      
                            <tr>
                                <td>{{$contador = $contador + 1}}</td>
                                <td>{{$producto->nombre_producto}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>{{$producto->created_at}}</td>
                                <td>
        
                                    <a href="{{ route('registrar_serie', $producto->id_producto)}}" class="button is-dark">Añadir Serie</a>
                                    <a href="{{ route('listar_serie', $producto->id_producto)}}" class="button is-dark">Ver series</a>
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
<script src="{{url("/js/articulos/agregar.js?q=") . time()}}"></script>
@endsection
