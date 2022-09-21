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
            <h1 class="is-size-1">Series por producto</h1>
            <hr>
            <h1 class="is-size-3">Producto seleccionado</h1>
            <label class="label">Id</label>
            <input name="id_producto" class="input" type="text" value="{{$ide}}" disabled style="WIDTH: 250px; HEIGHT: 30px">
        
            
            <br><br>
           
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead>
                <tr>
                    <th>Id_serie</th>
                    <th>Número de serie</th>
                    <th>Bodega</th>
                    <th>Registrado</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($serie as $serie)
              
                    <tr>
                        <td>{{$contador = $contador + 1}}</td>
                        <td>{{$serie->numero_serie}}</td>
                        <td>{{$serie->bodega}}</td>
                        <td>{{$serie->created_at}}</td>
                        
                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <a href="{{ route("serie") }}">
                <button class="button is-warning" type="button">Atrás</button>
            </a>
            </div>
</div>
@endsection
