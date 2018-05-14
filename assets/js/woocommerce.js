jQuery(function($){
	// toggle show / hide mini cart when click
	$('#cart-toggle').click(function () {
		if ($(this).is('.active')) {
			$(this).removeClass('active');
			$('.woo-mini-cart-very-right').stop().slideUp();
		} else {
			$(this).addClass('active');
			$('.woo-mini-cart-very-right').stop().slideDown();
		}
	});
});