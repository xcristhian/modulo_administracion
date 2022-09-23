@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <hr>
            <a href="{{route('vista_crear_proveedor')}}">            
                <button class="button is-success">Agregar proveedor</button>
                </a>
                <hr>
            <h1 class="is-size-1">Proveedores existentes</h1>
            
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
                            @foreach ($proveedor as $proveedor)
                            <tr>
                                <td>{{$contador = $contador + 1}}</td>
                                <td>{{$proveedor->ruc_p}}</td>
                                <td>{{$proveedor->nombre_p}}</td>
                                <td>{{$proveedor->direccion_p}}</td>
                                <td>{{$proveedor->correo_p}}</td>
                                <td>{{$proveedor->telefono_p}}</td>
                                <td>
                                    <a href="{{ route('edit_proveedor', $proveedor->id_proveedor)}}" class="button is-warning">Editar</a>
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
