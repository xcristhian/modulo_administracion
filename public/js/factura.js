 $(document).ready(function(){

	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});

	



	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		
		var htmlRows = '';
		
		//document.write(contar);
		
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';  
		htmlRows += '<td><input type="text" name="id_producto[]" id="id_producto_'+count+'" class="form-control" autocomplete="off" style="visibility:hidden" required></td>';	        
		htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off" required></td>';	
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off" required></td>';   		
		htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off" required></td>';		 
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" readonly required></td>';          
		htmlRows += '</tr>';
		
		//
		//"#" + id
		
		
		$('#invoiceItem').append(htmlRows);
		/////////////////////////////////////
		var temp_price = "price_"+count;
		var temp_id = "id_producto_"+count;
		
		precio_obtener_price = document.getElementById(temp_price);
		precio_obtener_id = document.getElementById(temp_id);
		var options2 = {
			
			url: function(q) {
					return baseUrl('api/ventas/findProducto?q=' + q);
				},
			
				getValue: "nombre_producto",
				list: {
					onClickEvent: function(){
						var b= $("#productName_"+count).getSelectedItemData();
                		$(precio_obtener_price).val(b.precio_venta);
						$(precio_obtener_id).val(b.id_producto);
					  }
				}
		
		}
		selector = document.getElementsByName('productName[]');
		$(selector).easyAutocomplete(options2);
		///////////////////////
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {
			$('#amountDue').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				dataType: "json",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response.status == 1) {
						$('#'+id).closest("tr").remove();
					}
				}
			});
		} else {
			return false;
		}
	});
	
});	

function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount));	
	var taxRate = $("#taxRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		$('#taxAmount').val(taxAmount);
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount);
		$('#totalAftertax').val(subTotal);		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {		
			$('#amountDue').val(subTotal);
		}
	}
}

 