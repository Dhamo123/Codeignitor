	function cart_update(id)
	{
		$(".search_loader").show();
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

		var single_product_total=number_format( single_product_total, 2, '.', ',' );

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
						$("#amt_total_cart").html(obj.amt);
						$("#cart_qty_header").html(obj.qty);        
						$("#Cart_Sub_Total").html(obj.amt);
						$("#Total").html(obj.amt);
						$("#single_product_total"+id).html(single_product_total);
						$(".search_loader").hide();
						
					}
			});
		}
	
	}
	
	function wishlist_update(id)
	{
		$(".search_loader").show();
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

		var single_product_total=number_format( single_product_total, 2, '.', ',' );

		var path=$("#path").val();
		var url = path +'index.php/page/wishlist_update';
		datastring='quantity='+ quantity +'&id='+id ;
		//alert(datastring);
		if(quantity>0)
		{
			$.ajax({
					type: 'POST',
					url: url,
					data: datastring,
					success:function(result)
					{
						var obj = JSON.parse(result);
						$("#wishlist_qty_total").html(obj.qty);
						$("#wishlist_amt_total_amt").html(obj.amt);
						$("#wishlist_qty_header").html(obj.qty);        
						$("#wishlist_Sub_Total").html(obj.amt);
						$("#Total").html(obj.amt);
						$("#single_product_total"+id).html(single_product_total);
						$(".search_loader").hide();
						
						
					}
			});
		}
	
	}
	
	function cart(id) {
		var path=$("#path").val();
		var qty=$("#qty").val();
		
		 $("html, body").animate({ scrollTop: 0 }, 600);
          $.ajax({
            type: "POST",
            url: path+"index.php/page/pro_cart_detail/",
            data: "id="+id +'&qty='+qty,
            success: function(data){
				
            	var obj = JSON.parse(data);
            	
            	$("#qty_total").html(obj.qty);
            	$("#amt_total_cart").html(obj.amt);
            	$("#cart_qty_header").html(obj.qty);     
				$(".alert-success").fadeIn(2000);       	
            }
          });
        }
	$(document).ready(function() {
		 $("input[name=user_specification]:radio").change(function () {
			 var user_specification = $(this).val();
			 if(user_specification == "register") {
				 $(".hide_detail_login").show();
				  $(".hide_detail").hide();
			 }
			 
			 if(user_specification == "guest") {
				 $(".hide_detail").show();
				  $(".hide_detail_login").hide();
			 }
		 });
	})
	
	function login_check()
    {	$("#login_loder").show();
		//alert();
		$("#login_error_email").html('');
		var path=$("#path").val();
		var email = document.getElementById('l_email');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email.value)) {
		//sweetAlert('Oops...', 'Please enter a valid email address!', 'error');
		$("#login_error_email").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid email address!</div>');
		$("#login_loder").hide();
		return false;
		}
		$("#login_error_password").html('');
		var l_password = document.getElementById('l_password');
		if(l_password.value.match(/\s/g) || l_password.value== ''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		$("#login_error_password").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid password!</div>');
		$("#login_loder").hide();
		return false;
		}
		
		var email=$('#l_email').val();
		var l_password=$('#l_password').val();
		datastring='email='+ email +'&password='+ l_password ;
		$("#login_message").html('');
		var url = path+'index.php/page/login_check';
		$.ajax({
				type: 'POST',
				url: url,
				data: datastring,
				success:function(result)
				{
					$("#login_loder").hide();
					if(result=='1')
					{
						//swal("Sign in!", "You have to successfully login!", "success");
							 location.reload();
					}
					else if(result=='notverify')
					{
						
						$("#login_message").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please verify your email account !</div>');
						//sweetAlert('Oops...', 'your email or password is worng!', 'error');
					} 
					else
					{
						
						$("#login_message").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>your email or password is worng..!</div>');
					}
					  
				}
        });
	}
	function login_pay_on()
	{
		$(".username").html('');
		var username = document.getElementById('username');
		if($('#username').val()==''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		$(".username").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter name..!</div>');
		return false;
		}
		
		$(".useremail").html('');
		var email = document.getElementById('useremail');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email.value)) {
		$(".useremail").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid email address..!</div>');
		return false;
		}
		
		$(".usercontact").html('');
		var usercontact = /^\d{10}$/; 
		
		if(!$('#usercontact').val().match(usercontact))
		{
			$(".usercontact").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid contact no !</div>');
			return false 
		}
		
		$(".useraddress").html('');
		var useraddress = document.getElementById('useraddress');
		if($('#useraddress').val()==''){
		
		$(".useraddress").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter address..!</div>');
		return false;
		}
		
		$(".usercity").html('');
		var usercity = document.getElementById('usercity');
		if(usercity.value.match(/\s/g) || usercity.value== ''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		$(".usercity").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter city..!</div>');
		return false;
		}
		$(".userpin").html('');
		var userpin = /^\d{6}$/;  
		if(!$('#userpin').val().match(userpin))
		{
			
			$(".userpin").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid pincode!</div>');
			return false ;
		}
		
		var username=$('#username').val();
		var useremail=$('#useremail').val();
		var usercontact=$('#usercontact').val();
		var useraddress=$('#useraddress').val();
		var userpin=$('#userpin').val();
		var usercity=$('#usercity').val();
		var cartID= $('#cartID').val()
		var url =$("#url").val(); 
		var cash_on_url =$("#cash_on_url").val();
		var cash_on=document.getElementById("cash_on").checked;
		var pay_on=document.getElementById("pay_on").checked;
		if(document.getElementById("cash_on").checked)
		{
			var delivery_opt = document.getElementById('cash_on').value;
			//alert(delivery_opt);
		}
		if(document.getElementById("pay_on").checked)
		{
			var delivery_opt = document.getElementById('pay_on').value;
			//alert(delivery_opt);
		}
		datastring='username='+ username +'&useremail='+ useremail +'&usercontact='+ usercontact  +'&useraddress='+ useraddress +'&userpin='+ userpin +'& usercity='+ usercity +'&cartID='+ cartID +'&delivery_opt='+ delivery_opt,
		//alert(datastring);
		//return false;
		$(".search_loader").show();
		$.ajax({
					type:'POST',
					url:url,
					data: datastring,
					success:function(result)
					{
						if(delivery_opt=='cash_on')
						{
							location.href = cash_on_url
						}
						else
						{
							$("#frmPayPal1").submit();
						}
						$(".search_loader").hide();
						
					}
			});
	}
	function guest_pay_on()
	{
		$(".guestname").html('');
		var guestname = document.getElementById('guestname');
		if($('#guestname').val()==''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		$(".guestname").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter name..!</div>');
		return false;
		}
		
		$(".guestemail").html('');
		var email = document.getElementById('guestemail');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email.value)) {
		$(".guestemail").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid email address..!</div>');
		return false;
		}
		
		$(".guestphoneno").html('');
		var guestphoneno = /^\d{10}$/; 
		
		if(!$('#guestphoneno').val().match(guestphoneno))
		{
			$(".guestphoneno").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid contact no !</div>');
			return false 
		}
		
		$(".guestaddress").html('');
		var guestaddress = document.getElementById('guestaddress');
		if($('#guestaddress').val()==''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		$(".guestaddress").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter address..!</div>');
		return false;
		}
		
		$(".guestcity").html('');
		var guestcity = document.getElementById('guestcity');
		if(guestcity.value.match(/\s/g) || guestcity.value== ''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		$(".guestcity").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter city..!</div>');
		return false;
		}
		$(".guestpincode").html('');
		var guestpincode = /^\d{6}$/;  
		if(!$('#guestpincode').val().match(guestpincode))
		{
			
			$(".guestpincode").append('<div class="alert alert-danger alert-dismissable"><span type="button" class="close" data-dismiss="alert" aria-hidden="true">×</span>Please enter a valid pincode!</div>');
			return false ;
		}
		$(".search_loader").show();
		var guestname=$('#guestname').val();
		var guestemail=$('#guestemail').val();
		var guestphoneno=$('#guestphoneno').val();
		var guestaddress=$('#guestaddress').val();
		var guestpincode=$('#guestpincode').val();
		var guestcity=$('#guestcity').val();
		var cartID= $('#cartID').val();
		var url =$("#url").val(); 
		var cash_on_url =$("#cash_on_url").val();
		var cash_on=document.getElementById("cash_on").checked;
		var pay_on=document.getElementById("pay_on").checked;
		if(document.getElementById("cash_on").checked)
		{
			var delivery_opt = document.getElementById('cash_on').value;
			//alert(delivery_opt);
		}
		if(document.getElementById("pay_on").checked)
		{
			var delivery_opt = document.getElementById('pay_on').value;
			//alert(delivery_opt);
		}
		
		datastring='guestname='+ guestname +'&guestemail='+ guestemail +'&guestphoneno='+ guestphoneno  +'&guestaddress='+ guestaddress +'&guestpincode='+ guestpincode +'& guestcity='+ guestcity +'&cartID='+ cartID +'&delivery_opt='+ delivery_opt,
		
		//alert(datastring);
		//return false ;
		$.ajax({
					type:'POST',
					url:url,
					data: datastring,
					success:function(result)
					{
						
						if(delivery_opt=='cash_on')
						{
							location.href = cash_on_url
						}
						else
						{
							$("#frmPayPal1").submit();
						}
						$(".search_loader").hide();
					}
			});
	}
	
	////product detail/////////
	function picZoomer(id)
	{
                $(".product_detail_loader").show();
		$(".zoomContainer").remove();
		var url = $("#hidden_url").val();
		var img=$("#origin_thumd_img"+id).val();
			$.ajax({
					type:'POST',
					url:url+"/index.php/page/change_mainimage",
					data: "img="+img,
					success:function(result)
					{						
						$("#view-product").html(result);
                                                $(".product_detail_loader").hide();
						
					}
			});
		
		
	}
	function picZoomercover(id)
	{
                $(".product_detail_loader").show();
		$(".zoomContainer").remove();
		var img=$("#product_cover"+id).val();		
		var url = $("#hidden_url").val();		
			$.ajax({
					type:'POST',
					url:url+"/index.php/page/change_mainimage",
					data: "img="+img,
					success:function(result)
					{						
						$("#view-product").html(result);
                                                $(".product_detail_loader").hide();
						
					}
			});
		
	}
	function picZoomerlarge()
	{
                $(".product_detail_loader").show();
		$(".zoomContainer").remove();
		var img=$("#product_large").val();
		var url = $("#hidden_url").val();		
			$.ajax({
					type:'POST',
					url:url+"/index.php/page/change_mainimage",
					data: "img="+img,
					success:function(result)
					{						
						$("#view-product").html(result);
                                                $(".product_detail_loader").hide();
						
					}
			});
		
	}
	function add_auestion()
	{
		
		if($('#customername').val()==''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		sweetAlert("Oops...", "Please  enter name...!", "error");
		return false;
		}
		
		var customername = document.getElementById('customername');
		if(customername.value.match(/\s/g) || customername.value== ''){
		sweetAlert("Oops...", "Please  enter valid name...!", "error");
		return false;
		}
		
		if($('#question-email').val()==''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		sweetAlert("Oops...", "Please  enter email...!", "error");
		return false;
		}
		
		var question_email = document.getElementById('question-email');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(question_email.value)) {
		//sweetAlert('Oops...', 'Please enter a valid email address!', 'error');
		sweetAlert("Oops...", "Please  enter valid email...!", "error");
		return false;
		}
			
		if($('#question_phone').val()==''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		sweetAlert("Oops...", "Please  enter phone no...!", "error");
		return false;
		}
		var question_phone = /^\d{10}$/; 
		if(!$('#question_phone').val().match(question_phone))
		{
			sweetAlert("Oops...", "Please  enter valid phone no...!", "error");
			return false ;
		}
			
		if($('#question').val()==''){
		//sweetAlert('Oops...', 'Please enter a valid password !', 'error');
		sweetAlert("Oops...", "Please  enter Query...!", "error");
		return false;
		}
		var customername=$("#customername").val();
		var email=$("#question-email").val();
		var question_phone=$("#question_phone").val();
		var question=$('#question').val();
		datastring='customername='+ customername +'&email='+ email +'&phone='+ question_phone  +'&question='+ question;
		var url =$("#url").val();
		
		$.ajax({
					type:'POST',
					url:url,
					data: datastring,
					success:function(result)
					{
						$("#question-email").val('');
						$("#customername").val('');
						$('#question').val('')
						$("#question_phone").val('');
						swal("Good job!", "Your query has been successfully sent..!", "success");
						
					}
			});
		
	}
	//////////////////wishlist ////////////////////////
	function buy_now(id)
	{
		$(".search_loader").show();
		var url =$("#buy_now_path").val();
		var redirect_path =$("#redirect_path").val();
		datastring='wishlist_id='+ id ,
		$.ajax({
					type:'POST',
					url:url,
					data: datastring,
					success:function(result)
					{
						$(".search_loader").hide();
						window.location.href = redirect_path;
					}
			});
	}
	$(document).ready(function() {
		
        $('.groupOfTexbox').keypress(function (event) {
            return isNumber(event, this)
        });
    });
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode
			//alert(charCode);
        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    

	

