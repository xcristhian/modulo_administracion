@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('cliente_registrado'))
            <div class="alert alert-success">
                {{ session('cliente_registrado')}}
            </div>
            @endif
            <h1 class="is-size-1">Registrar Cliente</h1>
            
            <hr>
            <form action="cliente" method="POST" role="form">
                {{csrf_field()}}
                <div class="columns">
                <div class="column">
                    
                    <nav class="panel">
                        <div class="panel-block">
                            <p class="control">
                                <label class="label">Cliente</label>
                                <input   class="input" type="text" name="nombre_cliente" required
                                       placeholder= "Nombre de cliente">
                            </p>
                        </div>
                        <nav class="panel">
                            <div class="panel-block">
                                <p class="control">
                                    <label class="label">Ruc/Cédula</label>
                                    <input   class="input" type="text" name="ruc_cliente" required maxlength="13"
                                           placeholder= "#RUC o #CÉDULA">
                                </p>
                            </div>
                            <nav class="panel">
                                <div class="panel-block">
                                    <p class="control">
                                        <label class="label">Dirección:</label>
                                        <input   class="input" type="text" name="direccion_cliente" required
                                               placeholder= "Dirección del cliente">
                                    </p>
                                </div>
                                <nav class="panel">
                                    <div class="panel-block">
                                        <p class="control">
                                            <label class="label">Correo:</label>
                                            <input   class="input" type="email" name="correo_cliente" required
                                                   placeholder= "Ingresar correo">
                                        </p>
                                    </div>
                                    <nav class="panel">
                                        <div class="panel-block">
                                            <p class="control">
                                                <label class="label">Teléfono:</label>
                                                <input   class="input" type="text" name="telefono_cliente" required maxlength="10"
                                                       placeholder= "Ingresar su número de teléfono">
                                            </p>
                                        </div>
                                
                                        <button class="button is-success" type="submit">Guardar</button>
                        
                                        <a href="{{ route("vista_mostrar_cliente") }}">
                                            <button class="button is-warning" type="button">Atrás</button>
                                        </a>
                        @verbatim
                          
               
 
             
                
            @endverbatim
            
        </form>
        </div>
    </div>
</div>
@endsection
