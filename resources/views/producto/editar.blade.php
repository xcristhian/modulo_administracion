@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('productoModificado'))
            <div class="alert alert-success">
                {{ session('productoModificado')}}
            </div>
            @endif
            <h1 class="is-size-1">Editar producto</h1>
            <hr>
            @foreach ($producto as $producto)
            <form action="{{ route('edit_p', $producto->id_producto)}}" method="POST" role="form">
                {{csrf_field()}} @method('PATCH')
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input placeholder="El nombre del producto" name="nombre_producto"
                                       class="input" type="text" value="{{$producto->nombre_producto}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Marca</label>
                            <div class="control">
                                <input placeholder="La marca del producto" name="marca_producto"
                                       class="input" type="text" value="{{$producto->marca_producto}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Modelo</label>
                            <div class="control">
                                <input placeholder="Modelo del producto" name="modelo_producto"
                                       class="input" type="text" value="{{$producto->modelo_producto}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Categoria</label>
                            <div class="control">
                                <input placeholder="Categoría del producto" name="categoria_producto"
                                       class="input" type="text" value="{{$producto->categoria_producto}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Precio de venta</label>
                            <div class="control">
                                <input placeholder="Descripcion del producto" name="precio_venta"
                                       class="input" type="text" value="{{$producto->precio_venta}}">
                            </div>
                        </div>
                   
                    
                        <div class="field">
                            <label class="label">Precio compra</label>
                            <div class="control">
                                <input placeholder="Descripcion del producto" name="precio_compra"
                                       class="input" type="text" value="{{$producto->precio_compra}}">
                            </div>
                        </div>
                    
                   
                        <div class="field">
                            <label class="label">Stock</label>
                            <div class="control">
                                <input placeholder="Descripcion del producto" name="cantidad"
                                       class="input" type="text" value="{{$producto->cantidad}}">
                            </div>
                        </div>
                        
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Descripción</label>
                            <div class="control">
                                <input placeholder="Descripcion del producto" name="descripcion_producto"
                                       class="input" type="text" value="{{$producto->descripcion_producto}}">
                            </div>
                        </div>
                    </div>
                    
                        
                  
                </div>
                                 <button class="button is-success" type="submit">Editar</button>
                               
                                 
                                       
                        
               
           
        </form>
        @endforeach
        <a href="../">
            <button class="button is-warning" type="submit">Atrás</button>
        </a>
    </div>
</div>
@endsection
