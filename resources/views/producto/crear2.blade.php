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
                                <input placeholder="El nombre del producto" name="nombre_producto"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Marca</label>
                            <div class="control">
                                <input placeholder="La marca del producto" name="marca_producto"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Modelo</label>
                            <div class="control">
                                <input placeholder="Modelo del producto" name="modelo_producto"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Categoria</label>
                            <div class="control">
                                <input placeholder="Categoría del producto" name="categoria_producto"
                                       class="input" type="text">
                            </div>
                        </div>
                        
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Descripción</label>
                            <div class="control">
                                <textarea placeholder="Describe el producto" cols="30" name="descripcion_producto"
                                          rows="6" class="textarea"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                                 <button class="button is-success" type="submit">Guardar</button>
                                       
                        
               
           
        </form>
       
    </div>
</div>
<script src="{{url("/js/articulos/agregar.js?q=") . time()}}"></script>
@endsection
