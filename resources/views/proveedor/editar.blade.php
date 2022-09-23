@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('proveedorModificado'))
            <div class="alert alert-success">
                {{ session('proveedorModificado')}}
            </div>
            @endif
            <h1 class="is-size-1">Editar proveedor</h1>
            <hr>
            @foreach ($proveedor as $proveedor)
            <form action="{{ route('editar_proveedor', $proveedor->id_proveedor)}}" method="POST" role="form">
                {{csrf_field()}} @method('PATCH')
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Ruc</label>
                            <div class="control">
                                <input placeholder="El nombre del producto" name="ruc_p" maxlength="13"
                                       class="input" type="text" value="{{$proveedor->ruc_p}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input placeholder="La marca del producto" name="nombre_p"
                                       class="input" type="text" value="{{$proveedor->nombre_p}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Dirección</label>
                            <div class="control">
                                <input placeholder="Modelo del producto" name="direccion_p"
                                       class="input" type="text" value="{{$proveedor->direccion_p}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Correo</label>
                            <div class="control">
                                <input placeholder="Categoría del producto" name="correo_p"
                                       class="input" type="text" value="{{$proveedor->correo_p}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Teléfono</label>
                            <div class="control">
                                <input placeholder="Descripcion del producto" name="telefono_p" maxlength="10"
                                       class="input" type="text" value="{{$proveedor->telefono_p}}">
                            </div>
                        </div>
                </div>
                                 <button class="button is-success" type="submit">Editar</button>
                               
                                 
                                       
                        
               
           
        </form>
        @endforeach
        <a href="{{ route("vista_mostrar_proveedor") }}">
            <button class="button is-warning" type="button">Atrás</button>
        </a>
    </div>
</div>
@endsection
