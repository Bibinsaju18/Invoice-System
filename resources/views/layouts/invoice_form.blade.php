<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <title>Product Billing</title>
</head>
<style>
  body{
    background:#e1e1e1;
  }
    .container{
    background: white;
    box-shadow: 0px 0px 15px rgb(0 0 0 / 8%);
    padding: 50px;
    margin-top: 50px;
    }
    </style>
<body>


       @yield('content') 

       
</body>
</html>

<Script>
    $(document).ready(function(){
    var i=1;
    $("#add_row").click(function(event){b=i-1;
       event.preventDefault();
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#delete_row").click(function(events){
      events.preventDefault();
 
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#discount').on('keyup change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
            var tax = $(this).find('.tax').val();
            var product_total = qty*price;
            var tax_amount = (tax*product_total)/100;
            var total_with_tax = product_total+tax_amount;
			$(this).find('.total').val(total_with_tax);
            $(this).find('.tax_amount').val(tax_amount);

			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
    tax_sum=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
    $('.tax_amount').each(function() {
        tax_sum += parseInt($(this).val());
    });
    var discount = $('#discount').val();
    $('#total_without_tax').val((total-tax_sum).toFixed(2)); 
	$('#sub_total').val(total.toFixed(2));
	$('#total_amount').val((total-discount).toFixed(2));
}
</Script>