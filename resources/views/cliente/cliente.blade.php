@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <hr>
            <a href="{{route('vista_crear_cliente')}}">            
                <button class="button is-success">Agregar cliente</button>
                </a>
                <hr>
            <h1 class="is-size-1">Clientes existentes</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                         
                            <th>#</th>
                            <th>RUC</th>
                            <th>NOMBRE CLIENTE</th>
                            <th>DIRECCION</th>
                            <th>CORREO</th>
                            <th>TELÉFONO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($cliente as $cliente)
                            <tr>
                                <td>{{$contador = $contador + 1}}</td>
                                <td>{{$cliente->ruc_c}}</td>
                                <td>{{$cliente->nombre_c}}</td>
                                <td>{{$cliente->direccion_c}}</td>
                                <td>{{$cliente->correo_c}}</td>
                                <td>{{$cliente->telefono_c}}</td>
                                <td>
                                    <a href="{{ route('edit_cliente', $cliente->id_cliente)}}" class="button is-warning">Editar</a>
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
