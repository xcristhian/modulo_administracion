@extends("maestra")
@section("layouts.app")
@section("titulo", "Compras")
@section("contenido")
@if(session('Compraregistrada'))
<div class="alert alert-success">
    {{ session('Compraregistrada')}}
</div>
@endif
<form action="{{ route('guardar_compra')}}" method="POST" role="form">
    {{csrf_field()}}
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <h1 class="is-size-1">Registrar Compra</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <nav class="panel">
                        <div class="panel-block">
                            <p class="control">
                                <label class="label">Proveedor</label>
                                <input   class="input" type="text" id="nombre_p" value=""
                                       placeholder= "Nombre proveedor">
                            </p>
                        </div>
                        <nav class="panel">
                            <div class="panel-block">
                                <p class="control">
                                    <label class="label">Ruc</label>
                                    <input   class="input" type="text" id="ruc_p"
                                           placeholder= "RUC">
                                           <input class="input" type="text" name="proveedor" id="proveedor">
                                </p>
                            </div>
                            <nav class="panel">
                                <div class="panel-block">
                                    <p class="control">
                                        <label class="label">Factura de compra:</label>
                                        <input   class="input" type="text" name="n_factura_compra"
                                               placeholder= "N# de factura con la que se realizo la compra">
                                    </p>
                                </div>
                            
                               
                    
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <table class="table table-bordered table-hover" id="invoiceItem">	
                                            <tr>
                                                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                                <th width="38%"></th>
                                                <th width="38%">Nombre Producto</th>
                                                <th width="15%">Cantidad</th>
                                                <th width="15%">Precio de Compra</th>								
                                                <th width="15%">Total</th>
                                            </tr>							
                                            <tr>
                                                <td><input class="itemRow" type="checkbox"></td>
                                                <td><input type="text" name="id_producto[]" id="id_producto_1" class="form-control" autocomplete="on"></td>			
                                                <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="on"></td>			
                                                <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="on"></td>
                                                <td><input type="text" name="price[]" id="price_1" class="form-control" value="" autocomplete="on" placeholder="PRECIO"></td>
                                                <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="on"></td>
                                            </tr>						
                                        </table>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <button class="button is-danger" id="removeRows" type="button">- Borrar</button>
                                        <button class="button is-primary" id="addRows" type="button">+ Agregar Más</button>
                                    </div>
                                    </div> 
                            
                        @verbatim
                          
               
                <hr><hr>
                <button class="button is-success">Guardar</button>
            @endverbatim
            <br>
        </div>
    </form>
    </div>
</div>

<script src="/js/jquery2.1.4.min.js"></script>
<script src="/js/jquery.easy-autocomplete.min.js"></script>

<script src="{{url("/js/articulos/agregar.js?q=") . time()}}"></script>
<script src="{{url('bower_components/riot/riot.min.js')}}"></script>
<script src="{{url('bower_components/riot/riotcompiler.min.js')}}"></script>
<script src="{{url("/js/factura.js")}}"></script>
<link rel="stylesheet" href="{{asset('bower_components/EasyAutocomplete/dist/easy-autocomplete.min.css')}}">

<script>
    function baseUrl(url){
        return '{{url('')}}/'+url;
    }
</script>

<script>

    $(document).ready(function(){
        var options2 = {
    url: function(q) {
            return baseUrl('api/ventas/findProducto?q=' + q);
        },
    
        getValue: "nombre_producto",
        list: {
            onClickEvent: function(){
                var b= $("#productName_1").getSelectedItemData();
                $("#price_1").val(b.precio_venta);
                $("#id_producto_1").val(b.id_producto);
                //document.getElementById("#nombre_c").setAttribute();
              }
        }
}
        var options = {
        url: function(q) {
            return baseUrl('api/compras/findProveedor?q=' + q);
        },
    
        getValue: "ruc_p",
        list: {
            onClickEvent: function(){
                var e = $("#ruc_p").getSelectedItemData();
                $("#nombre_p").val(e.nombre_p);
                $("#proveedor").val(e.id_proveedor);
                //document.getElementById("#nombre_c").setAttribute();
            
 
         
            }
        }
        
    };
    $("#ruc_p").easyAutocomplete(options);
    $("#productName_1").easyAutocomplete(options2);
    });
    </script>




<script src="{{url("/js/articulos/agregar.js?q=") . time()}}"></script>
@endsection
