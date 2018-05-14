jQuery(function($){
	function magone_bbp_input_placeholder(field, text) {
		if (field.val() == '') {
			field.val(text);
		}

		field.on('blur', function () {
			if ($(this).val() == '') {
				$(this).val(text);
			}
		});
		field.on('focus', function () {
			if ($(this).val() == text) {
				$(this).val('');
			}
		});
	}
	/* custom search form */
	magone_bbp_input_placeholder($('#bbp-search-form #bbp_search'), magone_bbp.text.search_form_placeholder);
	
	
	$('#bbp_search_submit').replaceWith('<button id="bbp_search_submit" class="bbp_search_submit_custom" type="submit"><i class="fa fa-search"></i></button>');
	
	
	/* custom breadcrumb */
	$('#bbpress-forums .bbp-breadcrumb p a').first().html('<i class="fa fa-home"></i>').show();
	
	/* quote on search page */
	$('#bbpress-forums #bbp-search-results div.bbp-topic-content, #bbpress-forums #bbp-search-results div.bbp-reply-content').each(function(){
		$(this).prepend('<i class="fa fa-quote-left"></i> ');		
	});
	
	/* form for creating */
	
	
});