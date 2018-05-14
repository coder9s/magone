jQuery(function($){
	$('#login h1 a').each(function(){
		$(this).css('background', 'none');
		$(this).css('width', 'auto');
		$(this).css('height', 'auto');
		$(this).css('text-indent', '0');
		$(this).html('<img src="'+magone_login_js.blog_logo_src+'"/>');
		$(this).attr('href', magone_login_js.home_url);
	});
});


