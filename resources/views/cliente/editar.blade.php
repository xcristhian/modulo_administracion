@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('clienteModificado'))
            <div class="alert alert-success">
                {{ session('clienteModificado')}}
            </div>
            @endif
            <h1 class="is-size-1">Editar cliente</h1>
            <hr>
            @foreach ($cliente as $cliente)
            <form action="{{ route('editar_cliente', $cliente->id_cliente)}}" method="POST" role="form">
                {{csrf_field()}} @method('PATCH')
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Ruc</label>
                            <div class="control">
                                <input placeholder="El nombre del producto" name="ruc_c" maxlength="13"
                                       class="input" type="text" value="{{$cliente->ruc_c}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input placeholder="La marca del producto" name="nombre_c"
                                       class="input" type="text" value="{{$cliente->nombre_c}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Dirección</label>
                            <div class="control">
                                <input placeholder="Modelo del producto" name="direccion_c"
                                       class="input" type="text" value="{{$cliente->direccion_c}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Correo</label>
                            <div class="control">
                                <input placeholder="Categoría del producto" name="correo_c"
                                       class="input" type="text" value="{{$cliente->correo_c}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Teléfono</label>
                            <div class="control">
                                <input placeholder="Descripcion del producto" name="telefono_c" maxlength="10"
                                       class="input" type="text" value="{{$cliente->telefono_c}}">
                            </div>
                        </div>
                </div>
                                 <button class="button is-success" type="submit">Editar</button>
                               
                                 
                                       
                        
               
           
        </form>
        @endforeach
        <a href="{{ route("vista_mostrar_cliente") }}">
            <button class="button is-warning" type="button">Atrás</button>
        </a>
    </div>
</div>
@endsection
