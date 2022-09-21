@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <h1 class="is-size-1">Agregar mantenimiento</h1>
            <hr>
            <form action="{{route('crear_mantenimiento')}}" method="POST" role="form">
                {{csrf_field()}}
                
                <div class="field is-horizontal">
                  
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Motivo de ingreso</label>
                            <div class="control">
                                <input placeholder="Daño o error" name="motivo_ingreso" style="WIDTH: 700px; HEIGHT: 98px"
                                size=32 class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Artículos ingresados</label>
                            <div class="control">
                                <input placeholder="Los artículos que el cliente deja para mantenimiento" name="articulo_mantenimiento"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Empleado asignado:</label>
                            <div class="control">
                                <input placeholder="Nombre del empleado asignado" name="nombre_empleado"
                                       class="input" type="text">
                                       <input  name="id_empleado" DISABLED class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Cliente mantenimiento</label>
                            <div class="control">
                                <input placeholder="Cédula o Ruc" name="cliente_mantenimiento"
                                       class="input" type="text">
                                       <input  name="id_cliente" DISABLED class="input" type="text">
                            </div>
                        </div>
                        
                    </div>
                    <div class="column">
                        <div class="field">
                            
                            </div>
                        </div>
                    </div>
                </div>
                                 
                  </div>                     
                        
                <button class="button is-success" type="submit">Guardar</button>
                <a href="{{ route("mantenimiento") }}">
                    <button class="button is-warning" type="button">Atrás</button>
                </a>
           
        </form>
       
    </div>
    
</div>
@endsection
