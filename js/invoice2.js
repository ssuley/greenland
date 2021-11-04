 $(document).ready(function(){
	$(document).on('click', '#checkAll2', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow2', function() {  	
		if ($('.itemRow2:checked').length == $('.itemRow2').length) {
			$('#checkAll2').prop('checked', true);
		} else {
			$('#checkAll2').prop('checked', false);
		}
	});  
	var count = $(".itemRow2").length;
	$(document).on('click', '#addRows2', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow2" type="checkbox"></td>';          
		htmlRows += '<input type="hidden" name="productCode2[]" id="productCode2_'+count+'" class="form-control" autocomplete="off">';          
		htmlRows += '<td><input type="text" name="productName2[]" id="productName2_'+count+'" class="form-control" autocomplete="off"></td>';	
		/*htmlRows += '<td><input type="hidden" name="unit[]" id="unit_'+count+'" class="form-control unit" autocomplete="off"></td>';	*/
		htmlRows += '<td><input type="number" name="quantity2[]" id="quantity2_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="number" name="price2[]" id="price2_'+count+'" class="form-control price2" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="number" name="total2[]" id="total2_'+count+'" class="form-control total2" autocomplete="off"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem2').append(htmlRows);
	}); 
	$(document).on('click', '#removeRows2', function(){
		$(".itemRow2:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll2').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity2_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price2_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate2", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid2", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax2').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue2').val(totalAftertax);
		} else {
			$('#amountDue2').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice2', function(e){
		e.preventDefault();
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response) {
						$('#'+id).closest("tr").remove();
			
						
					}
				}
			});
		} else {
			return false;
		}
	});
	function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price2_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price2_",'');
		var price = $('#price2_'+id).val();
		var quantity  = $('#quantity2_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total2_'+id).val(parseFloat(total));
		totalAmount += total;			
	});
	$('#subTotal2').val(parseFloat(totalAmount));	
	var taxRate = $("#taxRate2").val();
	var subTotal = $('#subTotal2').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		$('#taxAmount2').val(taxAmount);
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount);
		$('#totalAftertax2').val(subTotal);		
		var amountPaid = $('#amountPaid2').val();
		var totalAftertax = $('#totalAftertax2').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue2').val(totalAftertax);
		} else {		
			$('#amountDue2').val(subTotal);
		}
	}
}

 
	
});	
