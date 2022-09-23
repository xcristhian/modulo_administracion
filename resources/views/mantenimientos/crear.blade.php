@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <h1 class="is-size-1">Agregar mantenimiento</h1>
            <hr>
            <form action="{{route('crear_mantenimiento')}}" method="POST" role="form">
               
                {{csrf_field()}}
                
                <div class="field is-horizontal">
                  
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Motivo de ingreso</label>
                            <div class="control">
                                <input placeholder="Daño o error" name="motivo_ingreso" style="WIDTH: 700px; HEIGHT: 98px" required
                                size=32 class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Artículos ingresados</label>
                            <div class="control">
                                <input placeholder="Los artículos que el cliente deja para mantenimiento" name="articulo_mantenimiento"
                                       class="input" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Empleado asignado:</label>
                            <div class="control">
                                <select class="input" name="mostrar_empleado" id="mostrar_empleado">
                                    @foreach ($empleados as $empleados)
                                        <option value="{{$empleados->id_empleados}}">{{$empleados->nombres_empleado}} {{$empleados->apellidos_empleado}}</option>/
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Cliente mantenimiento</label>
                            <div class="control">
                                <input placeholder="Cédula o Ruc" name="ruc_c" id="ruc_c" required maxlength="13"
                                       class="input" type="text">
                                       <input  name="nombre_c" id="nombre_c"  class="input" type="text" disabled required>
                                       <input  name="id_cliente" id="id_cliente"  class="input" type="text" style="visibility:hidden" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="column">
                        <div class="field">
                            
                            </div>
                        </div>
                    </div>
                </div>
                                 
                  </div>                     
                        
                <button class="button is-success" type="submit">Guardar</button>
                <a href="{{ route("mantenimiento") }}">
                    <button class="button is-warning" type="button">Atrás</button>
                </a>
           
        </form>
       
    </div>
    
</div>
<script src="/js/jquery2.1.4.min.js"></script>
<script src="/js/jquery.easy-autocomplete.min.js"></script>
<script src="{{url('bower_components/riot/riot.min.js')}}"></script>
<script src="{{url('bower_components/riot/riotcompiler.min.js')}}"></script>

<link rel="stylesheet" href="{{asset('bower_components/EasyAutocomplete/dist/easy-autocomplete.min.css')}}">


<script src="{{url("/js/factura.js")}}"></script>
<script>
    function baseUrl(url){
        return '{{url('')}}/'+url;
    }
</script>
<script>

    $(document).ready(function(){
        var options = {
        url: function(q) {
            return baseUrl('api/ventas/findClient?q=' + q);
        },
    
        getValue: "ruc_c",
        list: {
            onClickEvent: function(){
                var e = $("#ruc_c").getSelectedItemData();
                console.log(e);
                $("#nombre_c").val(e.nombre_c);
                $("#id_cliente").val(e.id_cliente);
                //document.getElementById("#nombre_c").setAttribute();
              }
        }
    };
    $("#ruc_c").easyAutocomplete(options);
    });
    </script>
    
    
@endsection

