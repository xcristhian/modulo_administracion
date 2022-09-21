@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            @if(session('mantenimientoActualizado'))
            <div class="notification is-primary">
                {{ session('mantenimientoActualizado')}}
            </div>
            @endif
            <h1 class="is-size-1">Cambiar estado de mantenimiento</h1>
            <hr>
            @foreach ($mantenimiento as $mantenimiento)
            <form action="{{ route('cambiar_estado_mantenimiento', $mantenimiento->id_mantenimientos)}}" method="POST" role="form">
                {{csrf_field()}} @method('PATCH')
                <hr><br>
                <div class="field is-horizontal">
                 
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Motivo de ingreso</label>
                            <div class="control">
                                <input name="motivo_ingreso" 
                                       class="input" type="text" value="{{$mantenimiento->motivo_ingreso}}" readonly>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Fecha de ingreso</label>
                            <div class="control">
                                <input  name="created_at"
                                       class="input" type="text" value="{{$mantenimiento->created_at}}" readonly>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Estado</label>
                            <div class="select is-primary">
                                <select name="estado_mantenimiento">
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="PENDIENTE" selected>PENDIENTE</option>
                                    <option value="FINALIZADO">FINALIZADO</option>
                                </select>
                            </div>
                        </div>
                        
                  
                </div>
                                 <button class="button is-success" type="submit">Cambiar estado</button>
        </form>
        @endforeach
        <a href="{{ route("mantenimiento") }}">
            <button class="button is-warning" type="button">Atrás</button>
        </a>
    </div>
</div>
<script src="{{url("/js/articulos/agregar.js?q=") . time()}}"></script>
@endsection
