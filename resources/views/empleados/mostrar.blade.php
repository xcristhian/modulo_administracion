@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('empleadoEliminado'))
            <div class="alert alert-success">
                {{ session('empleadoEliminado')}}
            </div>
            @endif
            <h1 class="is-size-1">Empleados:</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    <a href="{{route ('vista_crear_empleado')}}" class="button is-success"> Añadir</a>
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cédula</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleados)
                      
                            <tr>
                                <td>{{$contador = $contador + 1}}</td>
                                <td>{{$empleados->nombres_empleado}}</td>
                                <td>{{$empleados->apellidos_empleado}}</td>
                                <td>{{$empleados->cedula_empleado}}</td>
                                <td>{{$empleados->direccion_empleado}}</td>
                                <td>{{$empleados->correo_empleado}}</td>
                                <td>{{$empleados->created_at}}</td>
                                <td>
        
                                    <a href="{{ route('editar_empleado', $empleados->id_empleados)}}" class="button is-warning">Editar</a>
                                    <form action="{{ route('delete_empleado', $empleados->id_empleados)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Seguro quiere eliminar el producto?');" class="button is-danger">
                                        Eliminar
                                        </button>
                                    </form>
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
