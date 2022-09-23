@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <h1 class="is-size-1">Agregar producto</h1>
            <hr>
            <form action="store_producto" method="POST" role="form">
                {{csrf_field()}}
                
                <div class="field is-horizontal">
                  
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input placeholder="El nombre del producto" name="nombre_producto" required
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Marca</label>
                            <div class="control">
                                <input placeholder="La marca del producto" name="marca_producto" required
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Modelo</label>
                            <div class="control">
                                <input placeholder="Modelo del producto" name="modelo_producto" required
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Categoria</label>
                            <div class="control">
                                <select class="input" name="mostrar_categoria" id="mostrar_categoria">
                                    @foreach ($categoria as $categoria)
                                        <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Cantidad</label>
                            <div class="control">
                                <input placeholder="Categoría del producto" name="cantidad" required
                                       class="input" type="text">
                            </div>
                        </div>
                        
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Descripción</label>
                            <div class="control">
                                <textarea placeholder="Describe el producto" cols="30" name="descripcion_producto" required
                                          rows="6" class="textarea"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                                 <button class="button is-success" type="submit">Guardar</button>
                                       
                        
               
           
        </form>
        <a href="{{ route("producto_1") }}">
            <button class="button is-warning" type="button">Atrás</button>
        </a>
    </div>
</div>
@endsection
