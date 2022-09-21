@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('Empleadoingresado'))
            <div class="alert alert-success">
                {{ session('Empleadoingresado')}}
            </div>
            @endif
            <h1 class="is-size-1">Agregar empleado</h1>
            <hr>
            <form action="{{route('crear_empleado')}}" method="POST" role="form">
                {{csrf_field()}}
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Nombres</label>
                            <div class="control">
                                <input  name="nombres_empleado" placeholder="Ingresar nombres completos"
                                       class="input" type="text" >
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Apellidos</label>
                            <div class="control">
                                <input  name="apellidos_empleado" placeholder="Ingresar apellidos completos"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Cédula</label>
                            <div class="control">
                                <input name="cedula_empleado" placeholder="Ingresar cédula"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Dirección empleado</label>
                            <div class="control">
                                <input name="direccion_empleado" placeholder="Ingresar dirección"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Correo</label>
                            <div class="control">
                                <input name="correo_empleado" placeholder="Ingresar correo."
                                       class="input" type="text">
                            </div>
                        </div>
                   
                    
                        
                  
                </div>
                                 
                               
                                 
                </div>                    
                        
                <button class="button is-success" type="submit">Guardar</button>
                <a href="{{ route("empleados") }}">
                    <button class="button is-warning" type="button">Atrás</button>
                </a>
        </form>
               
           
       
       
    </div>
</div>
@endsection
