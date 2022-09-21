@extends("maestra")
@section("layouts.app")
@section("titulo", "Ventas")
@section("contenido")
@if(session('Ventaregistrada'))
<div class="alert alert-success">
    {{ session('Ventaregistrada')}}
</div>
@endif
<form action="{{ route('guardar_venta')}}" method="POST" role="form">
    {{csrf_field()}}
<div class="container" id="app">
    <div class="columns">
        <div class="column">
            <h1 class="is-size-1">Registrar Venta</h1>
            
            <hr>
            <div class="columns">
                <div class="column">
                    
                    <nav class="panel">
                        <div class="panel-block">
                            <p class="control">
                                <label class="label">Nombre</label>
                                <input   class="input" type="text" readonly value="" id="nombre_c"
                                       placeholder= "Nombre de cliente">
                            </p>
                        </div>
                        <nav class="panel">
                            <div class="panel-block">
                                <p class="control">
                                    <label class="label">Ruc/Cédula</label>
                                    <input   class="input" type="text" id="ruc_c"
                                           placeholder= "#RUC o #CÉDULA">
                                           <input   class="input" type="text" name="cliente" id="cliente" placeholder= "ID_CLIENTE"  style="visibility:hidden">
                                           
                                </p>
                            </div>
                            
                            <nav class="panel">
                                <div class="panel-block">
                                    <p class="control">
                                        <label class="label">Factura de venta:</label>
                                        <input   class="input" type="text" id="n_factura_venta" name="n_factura_venta"
                                               placeholder= "N# de factura con la que se realizo la venta">
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
                                                <th width="15%">Precio</th>								
                                                <th width="15%">Total</th>
                                            </tr>							
                                            <tr>
                                                <td><input class="itemRow" type="checkbox"></td>
                                                <td><input type="text" name="id_producto[]" id="id_producto_1" class="form-control" autocomplete="on"  style="visibility:hidden"></td>			
                                                <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="on"></td>			
                                                <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="on"></td>
                                                <td><input type="text" name="price[]" id="price_1" class="form-control" value="" autocomplete="on" placeholder="PRECIO"></td>
                                                <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="on" readonly></td>
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
                                        <br><br>



                                        <div class="field is-horizontal">
                                        <div class="columns">
                                            <div class="column">
                                                
                                                <nav class="panel">
                                                    <div class="panel-block">
                                                            <label>Subtotal:</label>
                                                            <div class="panel-block">$</div>
                                                            <input value="" type="number" step="0.01" class="input" name="subTotal" id="subTotal" placeholder="Subtotal">
                                                            </div>
                                                            <div class="panel-block">
                                                    </div>   
                                                
                                                        <div class="panel-block">
                                                            <label>%IMP:</label>
                                                                    <input value="12" step="0.01" type="number" class="input" name="taxRate" id="taxRate" readonly>
                                                               
                                                        </div>
                                                        <div class="panel-block">
                                                            <label>IVA:</label>
                                                            <div>$</div>
                                                            <input value="" type="number" step="0.01" class="input" name="taxAmount" id="taxAmount" placeholder="Monto de Impuesto">
                                                        </div>
                                                        <div class="panel-block">
                                                            <label>Total:</label>
                                                            <div>$</div>
                                                            <input value="" type="number" step="0.01" class="input" name="totalAftertax" id="totalAftertax" placeholder="Total">
                                                        </div>
                                                        <div class="panel-block">
                                                            <label>Cantidad pagada:</label>
                                                            <div>$</div>
                                                            <input value="0" type="number" step="0.01" class="input" name="amountPaid" id="amountPaid" placeholder="Cantidad pagada">
                                                        </div>
                                                        <div class="panel-block">
                                                            <label>Cantidad debida:</label>
                                                            <div>$</div>
                                                            <input value="" type="number" step="0.01" class="input" name="amountDue" id="amountDue" placeholder="Cantidad debida">
                                                        </div>
                                                    </nav>
                                     


                            
                        @verbatim
                          
               
                        
                            
    
                
           
             <br><br>
                <button class="button is-success">Guardar</button>
            @endverbatim
            <br>
        </div>
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
                console.log(b);
                //document.getElementById("#nombre_c").setAttribute();
              }
        }
}
        var options = {
        url: function(q) {
            return baseUrl('api/ventas/findClient?q=' + q);
        },
    
        getValue: "ruc_c",
        list: {
            onClickEvent: function(){
                var e = $("#ruc_c").getSelectedItemData();
                $("#nombre_c").val(e.nombre_c);
                $("#cliente").val(e.id_cliente);
                //document.getElementById("#nombre_c").setAttribute();
              }
        }
    };
    $("#ruc_c").easyAutocomplete(options);
    $("#productName_1").easyAutocomplete(options2);
    });
    </script>
    
    
@endsection
