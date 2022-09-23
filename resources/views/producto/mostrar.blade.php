@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            
            @if(session('productoEliminado'))
            <div class="alert alert-success">
                {{ session('productoEliminado')}}
            </div>
            @endif

            @if(session('productoNoEliminada'))
            <div class="alert alert-success">
                {{ session('productoNoEliminada')}}
            </div>
            @endif
            <h1 class="is-size-1">Producto</h1>
            <a href="{{route('vista_crear_producto')}}" class="button is-success"> Añadir</a>
            <hr> <hr>


            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio de venta</th>
                    <th>Precio de compra</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($producto as $producto)
              
                    <tr>
                        <td>{{$contador = $contador + 1}}</td>
                        <td>{{$producto->nombre_producto}}</td>
                        <td>{{$producto->marca_producto}}</td>
                        <td>{{$producto->modelo_producto}}</td>
                        <td>{{$producto->precio_venta}}</td>
                        <td>{{$producto->precio_compra}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>

                            <a href="{{ route('edit_producto', $producto->id_producto)}}" class="button is-warning"> Editar</a>

                            <form action="{{ route('delete_producto', $producto->id_producto)}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro quiere eliminar el producto?');" class="button is-danger">
                                Eliminar
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
       
    </div>
</div>
<script src="{{url("/js/articulos/agregar.js?q=") . time()}}"></script>
@endsection
