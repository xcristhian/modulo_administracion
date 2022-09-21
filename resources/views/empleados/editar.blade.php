@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('empleadoModificado'))
            <div class="alert alert-success">
                {{ session('empleadoModificado')}}
            </div>
            @endif
            <h1 class="is-size-1">Editar empleado</h1>
            <hr>
           
            <hr>
           
            @foreach ($empleado as $empleado)
            <form action="{{ route('guardar_empleado', $empleado->id_empleados)}}" method="POST" role="form">
                {{csrf_field()}} @method('PATCH')
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Nombres</label>
                            <div class="control">
                                <input  name="nombres_empleado"
                                       class="input" type="text" value="{{$empleado->nombres_empleado}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Apellidos</label>
                            <div class="control">
                                <input  name="apellidos_empleado"
                                       class="input" type="text" value="{{$empleado->apellidos_empleado}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Cédula</label>
                            <div class="control">
                                <input name="cedula_empleado"
                                       class="input" type="text" value="{{$empleado->cedula_empleado}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Dirección empleado</label>
                            <div class="control">
                                <input name="direccion_empleado"
                                       class="input" type="text" value="{{$empleado->direccion_empleado}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Correo</label>
                            <div class="control">
                                <input name="correo_empleado"
                                       class="input" type="text" value="{{$empleado->correo_empleado}}">
                            </div>
                        </div>
                   
                    
                        
                  
                </div>
                                 <button class="button is-success" type="submit">Editar</button>
                               
                                 
                                       
                        
               
           
        </form>
        @endforeach
        <a href="{{ route("empleados") }}">
            <button class="button is-warning" type="button">Atrás</button>
        </a>
    </div>
</div>
@endsection
