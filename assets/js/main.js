/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/
var site_url = $('#siteurl').val();
$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

//~ $( ".add-to-cart" ).on( "click", function() {
	//~ var productid = $(this).attr('id');
	//~ $.ajax({
		//~ type: "POST",
		//~ url: site_url+"index.php/page/cart/",
		//~ data:  {id: productid},
		//~ success: function(res){
			//~ if(res != '')
			//~ {
				//~ $("html, body").animate({ scrollTop: 0 }, "slow");
				//~ data = $.parseJSON(res);
				//~ $('#totalproduct').html(data.totalproduct);
				//~ $('#cart_total').html(data.cart_total);
			//~ }
		//~ }
	//~ });
//~ });

$( document ).ready(function() {
	
		$( "#newsletter" ).submit(function() {			
			var siteurl = $("#hidden_url").val();
			$.ajax({
					type:'POST',
					url:siteurl+'index.php/page/newsletter',
					data: "email="+$("#email_newsletter").val(),
					success:function(result)
					{					
						swal("Thank You!", "You subscribe successfully!", "success");						
					}
			});
			return false;
		});
});
