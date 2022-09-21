@extends("maestra")
@section("titulo", "Mantenimientos")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <hr>
            <a href="mantenimientos/crear">            
                <button class="button is-success">Agregar mantenimiento</button>
                </a>
                <hr>
            <h1 class="is-size-1">Mantenimientos activos</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                         
                            <th>#</th>
                            <th>MOTIVO DE INGRESO</th>
                            <th>DETALLE DE ARTICULOS</th>
                            <th>EMPLEADO ASIGNADO</th>
                            <th>ESTADO DE MANTENIMIENTO</th>
                            <th>CLIENTE</th>
                            <th>FECHA DE INGRESO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($mantenimiento as $mantenimiento)
                            <tr>
                                <td>{{$contador = $contador + 1}}</td>
                                <td>{{$mantenimiento->motivo_ingreso}}</td>
                                <td>{{$mantenimiento->detalle_articulo_mantenimiento}}</td>
                                <td>{{$mantenimiento->nombres_empleado}}</td>
                                <td>{{$mantenimiento->estado_mantenimiento}}</td>
                                <td>{{$mantenimiento->nombre_c}}</td>
                                <td>{{$mantenimiento->created_at}}</td>
                                <td>
                                    <a href="{{ route('estado_mantenimiento_vista', $mantenimiento->id_mantenimientos)}}" class="button is-warning"> Cambiar estado</a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        @verbatim
                      
   
           
             
    
            @endverbatim
            
            <br>
        </div>
        
    </div>
    
</div>
<script src="{{url("/js/articulos/agregar.js?q=") . time()}}"></script>
@endsection
