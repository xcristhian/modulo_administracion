@extends("maestra")
@section("layouts.app")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('proveedor_registrado'))
            <div class="alert alert-success">
                {{ session('proveedor_registrado')}}
            </div>
            @endif
            <h1 class="is-size-1">Registrar Proveedor</h1>
            
            <hr>
            <form action="proveedor" method="POST" role="form">
                {{csrf_field()}}
            <div class="columns">
                <div class="column">
                    
                    <nav class="panel">
                        <div class="panel-block">
                            <p class="control">
                                <label class="label">Empresa</label>
                                <input   class="input" type="text" name="nombre_p" required
                                       placeholder= "Nombre de cliente">
                            </p>
                        </div>
                        <nav class="panel">
                            <div class="panel-block">
                                <p class="control">
                                    <label class="label">Ruc</label>
                                    <input   class="input" type="text" name="ruc_p" required maxlength="13"
                                           placeholder= "#RUC o #CÉDULA">
                                </p>
                            </div>
                            <nav class="panel">
                                <div class="panel-block">
                                    <p class="control">
                                        <label class="label">Dirección:</label>
                                        <input   class="input" type="text" name="direccion_p" required
                                               placeholder= "Dirección del cliente">
                                    </p>
                                </div>
                                <nav class="panel">
                                    <div class="panel-block">
                                        <p class="control">
                                            <label class="label">Correo:</label>
                                            <input   class="input" type="email" name="correo_p" required
                                                   placeholder= "Ingresar correo">
                                        </p>
                                    </div>
                                    <nav class="panel">
                                        <div class="panel-block">
                                            <p class="control">
                                                <label class="label">Teléfono:</label>
                                                <input   class="input" type="text" name="telefono_p" required maxlength="10"
                                                       placeholder= "Ingresar su número de teléfono">
                                            </p>
                                        </div>
                                
                    
                        
                            
                        @verbatim
                          
               
 
             
                <button class="button is-success" type="submit">Guardar</button>
                
            @endverbatim
            <br>
        </form>
        <a href="{{ route("vista_mostrar_proveedor") }}">
            <button class="button is-warning" type="button">Atrás</button>
        </a>
        </div>
    </div>
</div>
@endsection
