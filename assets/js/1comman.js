function cart_update(id)
{
	
	var quantity=$("#quantity"+id).val();
	var price=$("#price"+id).val();
	var single_product_total= quantity * price;
	function number_format(number, decimals, decPoint, thousandsSep){
		decimals = decimals || 0;
		number = parseFloat(number);

		if(!decPoint || !thousandsSep){
			decPoint = '.';
			thousandsSep = ',';
		}

		var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
		var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
		var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
		var formattedNumber = "";

		while(numbersString.length > 3){
			formattedNumber += thousandsSep + numbersString.slice(-3)
			numbersString = numbersString.slice(0,-3);
		}

		return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
	}

var single_product_total=number_format( single_product_total, 0, '.', ',' );

	var path=$("#path").val();
	var url = path +'index.php/page/cart_update';
	datastring='quantity='+ quantity +'&id='+id ;
	
	if(quantity>0)
	{
		$.ajax({
				type: 'POST',
				url: url,
				data: datastring,
				success:function(result)
				{
					var obj = JSON.parse(result);
					$("#qty_total").html(obj.qty);
					$("#amt_total").html("&#8377; "+obj.amt);
					$("#cart_qty_header").html(obj.qty);        
					$("#Cart_Sub_Total").html("&#8377; "+obj.amt);
					$("#Total").html("&#8377; "+obj.amt);
					$("#single_product_total"+id).html("&#8377; "+single_product_total);
					//alert(result);
					//location.reload(); 
					
				}
        });
    }
	
}

