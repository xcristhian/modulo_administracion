@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('serieGuardada'))
            <div class="alert alert-success">
                {{ session('serieGuardada')}}
            </div>
            @endif
            <h1 class="is-size-1">Agregar nueva serie</h1>
            <hr>
            @foreach ($producto as $producto)
            <h1 class="is-size-3">Producto seleccionado</h1>
            <label class="label">Id</label>
            <input name="id_producto" class="input" type="text" value="{{$producto->id_producto}}" disabled style="WIDTH: 250px; HEIGHT: 30px">
            <label class="label">Nombre del producto:</label>
            <input name="nombre_producto" class="input" type="text" value="{{$producto->nombre_producto}}" disabled style="WIDTH: 250px; HEIGHT: 30px">
            <label class="label">Stock:</label>
            <input name="stock" class="input" type="text" value="{{$producto->cantidad}}" disabled style="WIDTH: 250px; HEIGHT: 30px">
            <label class="label">Total de series registradas:</label>
            @foreach ($temp_falta as $temp_falta)
            <input name="serie_registrada" class="input" type="text" value="{{$temp_falta->cuenta}}" disabled style="WIDTH: 250px; HEIGHT: 30px">
            <label class="label">N# series por ingresar:</label>
            <input name="faltante" id="faltante" class="input" type="text" value="{{$falta}}" disabled style="WIDTH: 250px; HEIGHT: 30px">
            @endforeach
            @endforeach
            <form action="{{ route('crear_serie', $producto->id_producto)}}" method="POST" role="form">
             
                {{csrf_field()}} 
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Número de serie</label>
                            <div class="control">
                                <input placeholder="Ingrese el número de serie" name="numero_serie" style="WIDTH: 500px; HEIGHT: 30px"
                                       class="input" type="text">
                            </div>
                        </div>
                      
                                 <button class="button is-success" type="submit" id="guardar_serie">Guardar</button>
                               
                      
                                       
                        
               
           
        </form>
        <a href="{{ route("serie") }}">
        <button class="button is-warning" type="button">Atrás</button>
    </a>
    </div>
</div>

@endsection
<script src="/js/jquery2.1.4.min.js"></script>

<script>
    $(document).ready(function () {
        var falta = document.getElementById('faltante').value;
        if (falta == 0) {
                    document.getElementById('guardar_serie').disabled = true;
                } 
     
    });
</script>