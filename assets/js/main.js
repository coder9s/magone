(function ($) {
	/* replace logo */
	if (Magone_Is_Retina) {
		$('img[data-retina!=""]').each(function(){
			$(this).attr('src', $(this).attr('data-retina'));
		});
	}
	
	/*modify facebook fanpage div*/
	$('.fb-page-raw').each(function(){
		if ($(this).attr('data-adapt-container-width') == 'true') {
			var par_w = $(this).parent().width();
					$(this).attr('data-width', par_w);
		}
		
		$(this).removeClass('fb-page-raw').addClass('fb-page');
	});
	
	/*move post break links after more tags*/
	$('.break-link-after-more-tag').appendTo('.post-body-inner span[id*="more-"]').removeClass('hide');

	// fill the js_get
	var js_get = new Object();
	var uri = window.location.search;
	if (uri) {
		uri = uri.substring(1);// remove ?
		var list = uri.split('&');
		for (var i = 0; i < list.length; i++) {
			var l = list[i].split('=');
			if (l.length > 1) {
				js_get[l[0]] = l[1];
			}
			
		}
	}

	if (!magone.is_gpsi) {
		$('body').prepend('<div id="fb-root"></div>');
		// INIT FACEBOOK SDK
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId="+magone.facebook_app_id;
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	}
	
	/*TOP MENU && MAIN MENU*/
	// modify menu structure
	// for child menu
	$('.top-menu > .menu > li, .main-menu > .menu > li').each(function (h) {
		if ($(this).is('.menu-item-has-children')) {
			$(this).find('.sub-menu').wrap('<div class="menu-item-inner"></div>');
		} else if ($(this).is('.menu-item-mega')){
			$(this).append('<div class="menu-item-inner"></div>');
		}
	});
	$('.top-menu > .menu .menu-item-inner, .main-menu > .menu .menu-item-inner').append('<div class="clear"></div>');
	$('.top-menu > .menu .menu-item-has-children > a, .main-menu > .menu .menu-item-has-children > a').append('<span class="arrow"></span>');
	
	// for mega menu
	$('.main-menu > .menu .menu-item-mega > .menu-item-inner').prepend('<div class="menu-mega-content"></div>');	
	$('.main-menu > .menu .menu-item-mega-label .menu-mega-content').append('<div class="loader">Loading...</div>');
	$('.menu .menu-item-mega-label > a').each(function () {		
		$(this).parent().attr('data-id', $(this).attr('data-id'));
	});

	// clone menu for mobile
	$('<div class="main-mobile-menu mobile-menu mobile">'+$('.main-menu').html()+'</div>').insertAfter($('.main-menu'));
	$('.top-bar.has-menu').append($('<div class="top-mobile-menu mobile-menu mobile">'+$('.top-menu').html()+'</div>'));
	$('.mobile-menu .menu-item-mega-label').addClass('loaded');
	$('.mobile-menu .menu-mega-content').remove();
	$('.mobile-menu .sticky-menu-logo').remove();
	

	// fill data for mega label menu
	$('.menu .menu-item-mega-label').hover(function () {
		// load feed if this is not load
		if (!$(this).is('.loaded')) {
			var lister = $(this);
			lister.addClass('loaded');

			$.post(magone.ajax_url, { 
				action: 'magone_mega_menu_content', 
				id: $(this).attr('data-id')
			}).done(function( data ) {								
				if (magone_ajax_error(data)) {
					lister.find('.menu-mega-content').html(magone.text['Not found any posts']);
					lister.addClass('finished');
					return;
				}
				
				lister.find('.menu-mega-content').html(data);
				lister.addClass('finished');
				magone_optimize_thumbnail(lister.find('.menu-mega-content').find('img'));
			});
		}
	});
	
	// show menu icon
	$('.top-menu .menu-item > a, .main-menu .menu-item > a').each(function() {
		var icon = $(this).attr('data-icon');
		if (typeof(icon) != 'undefined' && icon) {			
			if (icon.indexOf('fa-') == -1) {
				icon = 'fa-'+icon;
			}
			$(this).prepend('<i class="fa '+icon+'"></i> ');
		}
	});
	
	// apply menu color

	// toggle show / hide menu when click
	$('#main-menu-toggle').click(function () {
		if ($(this).is('.active')) {
			$(this).removeClass('active');
			$('#header .main-menu').stop().slideUp(300);
		} else {
			$(this).addClass('active');
			$('#header .main-menu').stop().slideDown(300);
		}
	});
	$('#main-menu-toggle-mobile').click(function () {
		if ($(this).is('.active')) {
			$(this).removeClass('active');
			$('#header .main-mobile-menu .menu').stop().slideUp(300);
		} else {
			$(this).addClass('active');
			$('#header .main-mobile-menu .menu').stop().slideDown(300);
		}
	});
	$('#top-menu-toggle-mobile').click(function () {
		if ($(this).is('.active')) {
			$(this).removeClass('active');
			$('#header .top-mobile-menu .menu').stop().slideUp(300);
		} else {
			$(this).addClass('active');
			$('#header .top-mobile-menu .menu').stop().slideDown(300);
		}
	});
	
	
	/*STICKY MENU*/
	var MagOne_Last_Window_Scroll_Top = 0;
	
	function magone_sticky_menu_enable() {
		// process the axis
		var pattern_width = $('#header').width();
		if ($('#header .m1-wrapper .wide').length) {
			pattern_width = $('#header .m1-wrapper .wide').width();
		}
		var menu_height = $('.main-menu').height();
		$('.main-menu').addClass('sticky-menu');
		$('.main-menu').find('ul.menu').css('width', pattern_width+'px').css('height', menu_height+'px');
		if ($('.main-menu-placeholder').length == 0) {
			$('<div class="main-menu-placeholder" style="height:'+menu_height+'px"></div>').insertAfter($('.main-menu'));
		}
	}
	function magone_sticky_menu_disable() {	
		$('.main-menu').removeClass('sticky-menu');
		$('.main-menu').find('ul.menu').css('width', '').css('height', '');
		$('.main-menu-placeholder').remove();
	}
	if (magone.sticky_menu != 'disable' && $(window).width() >= 1010) {
		$('.main-menu > ul.menu').prepend('<li class="menu-item sticky-menu-logo-item"></li>');
		
		
		$('.sticky-menu-logo').appendTo($('.sticky-menu-logo-item'));

		$(window).scroll(function() {    	
			var content_top = $('#header').offset().top + $('#header').height() + 30; 
			
			var window_top = $(window).scrollTop();
			if (window_top > content_top) {
				switch (magone.sticky_menu) {
				case 'up':
					if (window_top < MagOne_Last_Window_Scroll_Top) {
						magone_sticky_menu_enable();
					} else {
						magone_sticky_menu_disable();		
					}
					break;

				case 'down':
					if (window_top > MagOne_Last_Window_Scroll_Top) {
						magone_sticky_menu_enable();
					} else {
						magone_sticky_menu_disable();		
					}
					break;

				default: /*Always*/
					magone_sticky_menu_enable();
					break;
				}	    	
			} else {
				magone_sticky_menu_disable();
			}    	
			MagOne_Last_Window_Scroll_Top = window_top;
		});
	}

	
	/*REMOVE THUMBNAL FOR STICKY SMALL ITEMS*/
	$('.widget.sticky .item-1 .item-thumbnail, .widget.sticky .item-2 .item-thumbnail, .widget.sticky .item-3 .item-thumbnail').removeAttr('style');
	magone_optimize_thumbnail($('.widget .item-thumbnail img'));

	/*ADD EFFECTS FOR SLIDER, TICKER, CAROUSEL*/
	var Owl_Widgets = new Object();
	function magone_enable_owl(widget) {		
		var number_items = 1;
		if (widget.is('.slider')) {
			number_items = widget.find('.widget-content .slider-item').length;
		} else if (widget.is('.ticker')) {
			number_items = widget.find('.widget-content .ticker-item').length;
		} else if (widget.is('.carousel') ){
			number_items = widget.find('.widget-content .carousel-item').length;
		}
		
		if (1 == number_items) {
			return;/*we don't need slider if we have only 1 item*/
		}
		
		
		var data_holder = widget.find('.widget-data');
		if (data_holder.length == 0) {
			return;
		}
		
		
		var widget_id = widget.attr('id');
		var widget_type = data_holder.attr('data-type');
		var options = new Object();
		options['responsive'] = new Object();
		options['responsive'][0] = new Object();
		options['responsive'][499] = new Object();
		options['responsive'][699] = new Object();
		options['responsive'][899] = new Object();

		var items = (widget.is('.slider') ? 1 : 2);
		options['loop'] = true;
		options['nav'] = (data_holder.find('.data-show_nav').length > 0);
		options['dots'] = (widget.is('.ticker') ? false : (data_holder.find('.data-show_dots').length > 0));
		options['autoplay'] = true;
		options['autoplayHoverPause'] = true;
		options['onInitialized'] = function () {
			magone_optimize_thumbnail($('#widget-content-'+widget_id+' .item-thumbnail img'));
		};
		options['navText'] = [			
			'<a class="'+widget_type+'-button '+widget_type+'-button-left" href="javascript:void(0)"><i class="fa fa-angle-left"></i></a>',
			'<a class="'+widget_type+'-button '+widget_type+'-button-right" href="javascript:void(0)"><i class="fa fa-angle-right"></i></a>'
		];

		if (magone.is_rtl) {					
			// set mode to RTL
			options['rtl'] = true;
		}

		if (data_holder.find('.data-column').length && magone_is_number(data_holder.find('.data-column').text())) {
			var columns = Number(data_holder.find('.data-column').text());
			if (columns >= 1) {
				items = columns;
			}
		}

		// animation speed
		if (widget.is('.ticker')) {
			options['slideBy'] = widget.find('.widget-content .ticker-item').length;			
		}
		if (data_holder.find('.data-speed').length && magone_is_number(data_holder.find('.data-speed').text())) {			
			options['autoplayTimeout'] = Number(data_holder.find('.data-speed').text());
			options['autoplaySpeed'] = Math.floor(options['autoplayTimeout'] / 10);
		}

		// init responsive option	
		options['items'] = items;
		options['responsive'][899]['items'] = items;
		options['responsive'][699]['items'] = (items > 3? 3 : items);
		options['responsive'][499]['items'] = (items > 2? 2 : items);
		options['responsive'][0]['items'] = 1;
					
		if (typeof(Owl_Widgets[widget_id]) != 'undefined') {
			widget.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
			widget.find('.owl-stage-outer').children().unwrap();
			Owl_Widgets[widget_id].destroy();
		}
		var widget_content = $('#widget-content-'+widget_id);		
		widget_content.owlCarousel(options);
		Owl_Widgets[widget_id] = widget_content.data('owlCarousel');
	}
	$('.widget.slider, .widget.carousel, .widget.ticker').each(function () {
		magone_enable_owl($(this));
	});

	// widget social counter
	$('.widget.social_counter').each(function () {		
		if ($(this).find('.data .value').length) {
			var widget = $(this);
			var ajax_options = new Object();	
			ajax_options['action'] = 'magone_widget_social_counter';
			ajax_options['block_id'] = widget.attr('id');
			
			$(this).find('.data .value').each(function () {
				ajax_options[$(this).attr('data-key')] = $(this).attr('data-url');				
			});

			$.post(magone.ajax_url, ajax_options).done(function( data ) {								
				if (magone_ajax_error(data)) {
					widget.remove();
					return;
				}
				
				widget.find('.widget-content').html(data);				
			});
		}
		
	});

	// tab widgets
	function magone_tab_list_show(tab_list) {
		// style for tab link width (tab titles)
		var style = '';
		if (tab_list.length) {
			style = ' sty'+'le="width:'+(100/tab_list.length - 0.01)+'%"';
		}
		
		for (var i = 0; i < tab_list.length; i++) {
			if (i == 0) {
				tab_list[0].show();
//				magone_optimize_thumbnail($('#'+tab_list[0].id+' .thumbnail img'));
			} else {
				tab_list[i].hide();
			}
			
			// remake title
			$('#'+tab_list[i].id+' > h2').remove();
			$('#'+tab_list[i].id+' h2.widget-title').remove();
			$('#'+tab_list[i].id+' .feed-widget-header').remove();
			
			var title_code = '';
			for (var j = 0; j < tab_list.length; j++) {
				var tab_link_class = ' class="tab-link';
				if (j == i) {
					tab_link_class += ' active';
				}
				tab_link_class += '"';
				// show / hide tab widget
				var tab_on_click = ' onclick="';
				for (var k = 0; k < tab_list.length; k++) {
					if (k != j) {
						tab_on_click += 'jQuery(\'#'+tab_list[k].id+'\').hide();';
					} else {
						tab_on_click += 'jQuery(\'#'+tab_list[k].id+'\').show();';
					}
				}
				tab_on_click+='"';

				// append title
				title_code += '<a href="#'+tab_list[j].id+'-link"'+tab_link_class+tab_on_click+style+'>\
					<span class="tab-link-inner">'+tab_list[j].title+'\
						<span class="tab-link-arrow"></span>\
					</span>\
				</a>';
			}
			$('#'+tab_list[i].id).prepend('<h2 class="tab-title">'+title_code+'<div class="clear"></div></h2><div class="clear"></div>');
		}
	}

	// collect all tab widgets and apply tab list
	var is_tab = false;
	var tab_index = -1;
	var tab_list = new Array();
	$('.widget').each(function () {
		if ($(this).is('.tab')) {
			if (!is_tab) {
				tab_index++;
				tab_list[tab_index] = new Array();
				is_tab = true;
			}
			widget = $(this);
			widget.id = $(this).attr('id');
			widget.title = '';
			if ($(this).find('.widget-title').length) {
				$(this).find('.widget-title').each(function () {
					if ($(this).find('a').length) {
						widget.title = $(this).find('a').html();
					}
					else {
						widget.title = $(this).html();
					}
				});	
			}
			if (widget.title == '') {
				widget.title = magone.text['Tab'];
			}

			tab_list[tab_index].push(widget);
		} else {
			if (is_tab) {
				is_tab = false;
			}
		}
	});
	
	for (var i = 0; i < tab_list.length; i++) {
		magone_tab_list_show(tab_list[i]);
	}

	$('.tab-link').click(function () {
		var wid_id = $(this).attr('href').replace('-link', '');
		magone_optimize_thumbnail($(wid_id+' .thumbnail img'));
	});

	// related post widget
	function magone_show_related_post(count, id) {
		$.post(magone.ajax_url, {
			action: 'magone_related', 
			id: id,
			count: count
		}).done(function( data ) {								
			if (magone_ajax_error(data)) {				
				return;
			}
			$('.post-related-content').html(data+'<div class="clear"></div>');
			magone_optimize_thumbnail($('.post-related-content .item-thumbnail img'));
		});
	}
	$('.post-related').each(function () {
		var count = $(this).attr('data-count');
		var id = $(this).attr('data-id');
		magone_show_related_post(count, id);
	});
	$('.post-related-random-button').click(function (e) {
		e.preventDefault();
		$('.post-related-content').html('<div class="loader"></div>');
		var count = $(this).attr('data-count');
		var id = $(this).attr('data-id');
		magone_show_related_post(count, id);
	});


	/*comment */
	if (!$('body').is('.woocommerce')) {
		// show comment count under post title for primary comment system	
		$('.'+magone.primary_comment_system+'-comment-counter').show();

		var showing_comment_system = magone.primary_comment_system;

		if ('fb_comment_id' in js_get) {
			showing_comment_system = 'facebook';		
		} else if ('#comment-' in js_get) {
			showing_comment_system = 'disqus';
		}

		// animate effects for comment
		$('#comments').each(function () {
			if ($('.comments').length == 0) {
				$(this).remove();
				return;
			}
			// show primary comment system, also allow switch tabs
			if ($('.'+magone.primary_comment_system+'-comments').length == 0) {
				$('.comments').first().addClass('active');		
			} else {
				$('.'+magone.primary_comment_system+'-comments').addClass('active');
			}

			// create comment tabs
			$('.comments.active .comments-title').addClass('active').appendTo($('#comments-title-tabs'));
			$('.comments .comments-title').appendTo($('#comments-title-tabs'));
			$('#comments-title-tabs .comments-title').addClass('comments-title-tab');
			if (showing_comment_system != magone.primary_comment_system) {
				$('#comments-title-tabs a.active').removeClass('active');
				$('.comments.active').removeClass('active');
				$('#comments-title-tabs a.'+showing_comment_system+'-comments-title').addClass('active');
				$('.'+showing_comment_system+'-comments').addClass('active');
			}

			// switch tabs
			$('#comments-title-tabs a').click(function () {
				if ($(this).is('.active')) {
					return;
				}
				$('#comments-title-tabs a.active, .comments.active').removeClass('active');
				$(this).addClass('active');
				$($(this).attr('data-target')).addClass('active');
			});	
		});

		// save ajax comment count to database
		if ($('.ajax-comment-count').length) {
			var ajax_comment_count_counter = setInterval(function() {
				if ($('.ajax-comment-count').length == 0) {
					clearInterval(ajax_comment_count_counter);
					return;
				}
				$('.ajax-comment-count').each(function () {
					var count = $(this).text();
					if (count == '' || count === null) {
						return;
					}
					if (isNaN(count)) {
						count = count.split(' ')[0];					
					}
					if (isNaN(count)) {
						return;	
					}
					count = Number(count);
					var system = $(this).attr('data-system');
					var id = $(this).attr('data-id');
					$(this).remove();
					$.post(magone.ajax_url, {
						action: 'magone_save_comment_count', 
						id: id,
						count: count,
						system: system
					});
				});
			}, 100);
		}
	}

	// select all for footer share buttons
	$('.post-share-buttons-url').on('focus', function () {
		magone_select_all($(this));
	});

	// blockquote
	$('.content-template blockquote').each(function () {		
		$(this).html('<div class="blockquote-icon"><i class="fa fa-quote-left"></i></div><div class="blockquote-content">'+$(this).html()+'</div>');
	});

	// pre - code box
	var pre_index = 0;
	$('.content-template pre').addClass('code-box');
	$('.content-template .code-box').each(function(){
		$(this).attr('id', 'pre-'+pre_index);
		var pre_header_html = '<div class="clear"></div><div class="pre-header rel">';
		
		if ('execCommand' in document) {
			pre_header_html += '<a href="javascript:void(0)" class="bg copy-all" data-id="'+pre_index+'">'+magone.text['Copy All Code']+'</a> ';
		} else if ('getSelection' in window || 'createTextRange' in document.body) {
			pre_header_html += '<a href="javascript:void(0)" class="bg select-all" data-id="'+pre_index+'">'+magone.text['Select All Code']+'</a> ';		
		}
		pre_header_html += '<div class="clear"></div></div>';
		$(pre_header_html).insertBefore($('#pre-'+pre_index));
		pre_index++;
	});

	$('.pre-header .select-all').click(function(){
		var data_id = $(this).attr('data-id');
		magone_selectText('pre-'+data_id);
	});
	$('.pre-header .copy-all').click(function(){
		$(this).parent().find('.copy-all-message').stop().remove();
		var data_id = $(this).attr('data-id');
		magone_selectText('pre-'+data_id);
		var msg_html = '';	
		var msg_class = '';
		if (document.execCommand("Copy")) {
			msg_html += magone.text['All codes were copied to your clipboard'];
			msg_class = 'success';
		} else {
			msg_html += magone.text['Can not copy the codes / texts, please press [CTRL]+[C] (or CMD+C with Mac) to copy'];
			msg_class = 'error';
		}
		msg_html = '<div class="copy-all-message abs '+msg_class+'">'+msg_html+ '</div>';
		$(msg_html).insertAfter($(this));
		var control = $($(this).parent().find('.copy-all-message'));
		setTimeout(function() {
			if (control.is('.success')) {
				control.fadeOut(2000);
			}
		}, 1000);		
	});

	// gallery
	// gallery tooltip
	$('.post-body .gallery-item').each(function () {
		if ($(this).find('.gallery-caption').length) {
			$(this).attr('title', $.trim($(this).find('.gallery-caption').text()));
		}
	});
	
	// gallery columns
	$('.post-body .gallery').each(function () {
		var gclass = $(this).attr('class');
		if (typeof(gclass) == 'undefined') {
			return;
		}
		var gallery_id = $(this).attr('id');
		if (typeof(gallery_id) == 'undefined')  {
			return;
		}
		gclass = gclass.split(' ');
		var column_number = 1;
		for (var i = 0; i < gclass.length; i++) {
			if (gclass[i].indexOf('gallery-columns-') != -1) {
				column_number = gclass[i].replace('gallery-columns-', '');
				if (isNaN(column_number)) {
					return;
				}
				column_number = Number(column_number);
				break;
			}
		}
		if (column_number <= 1) {
			return;
		}
		gallery_id = gallery_id+'-actived-column';
		var width = 100 / column_number;
		var html = '<div id="'+gallery_id+'" class="'+gclass.join(' ')+'">';
		for (var i = 0; i < column_number; i++) {
			html += '<div class="gallery-column gallery-column-'+i+'" st'+'yle="width: '+width+'%"></div>';
		}
		html += '<div class="clear"></div></div>';
		$(html).insertAfter($(this));

		var gallery_item_index = 0;
		$(this).find('.gallery-item').each(function () {
			$(this).clone().appendTo($('#'+gallery_id+' .gallery-column-'+(gallery_item_index % column_number)));
			gallery_item_index++;
		});
		$(this).remove();
	});

	// gallery thickbox
	$('.post-body .gallery').each(function () {
		if ($(this).find('.gallery-item a').length == 0) {
			return;
		}
		var gallery_id = $(this).attr('id');
		if (typeof(gallery_id) == 'undefined')  {
			return;
		}
		
		// add item caption
		$(this).find('.gallery-item a').each(function () {
			var href = $(this).attr('href');
			if (typeof(href) == 'undefined' || !magone_is_image_src(href)) {
				return;
			}
			var caption = '';
			if ($(this).parents('.gallery-item').find('.gallery-caption').length) {
				$(this).attr('title', $(this).parents('.gallery-item').find('.gallery-caption').text());
			}
			
			$(this).addClass('thickbox').attr('rel', gallery_id);
		});
	});

	// image thickbox
	$('.post-body img').each(function () {
		var parent = $(this).parent();
		if (parent.length && parent.is('a') && !parent.is('.thickbox')) {
			var href = parent.attr('href');
			if (typeof(href) == 'undefined' || !magone_is_image_src(href)) {
				return;
			}

			parent.addClass('thickbox');

			if (parent.parent().is('.wp-caption')) {
				var caption = parent.parent().find('.wp-caption-text');
				if (caption.length) {
					$(parent).attr('title', caption.text());
				}
			}
		}
	});

	// animation to show hide search
	$('.search-form-wrapper .search-text').removeAttr('placeholder');
	$('#search-toggle').click(function () {
		if ($(this).is('.active')) {
			$(this).removeClass('active');			
			$('.search-form-wrapper').stop().fadeOut(100);
		} else {
			$(this).addClass('active');
			$('.search-form-wrapper').stop().fadeIn(100, function () {
				$('.search-form-wrapper .search-text').focus();
			});
		}
	});
	$('.search-form-wrapper .search-form-overlay, .search-form-wrapper .search-form-label').click(function () {
		$('#search-toggle').removeClass('active');
		$('.search-form-wrapper').stop().fadeOut(100);
	});

	// scroll up / jump top button
	$('.scroll-up').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	// article box pagination
	// build pagination buttons
	function magone_feed_widget_pagination_builder(posts_per_page, found_posts, current_page, max_num_pages, button_type) {
		var html = '';		
		posts_per_page = Number(posts_per_page);
		found_posts = Number(found_posts);
		current_page = Number(current_page);
		max_num_pages = Number(max_num_pages);
		var listed = posts_per_page * current_page;
		if (listed > found_posts) {
			listed = found_posts;
		}
		var post_count_text = magone.text.widget_pagination_post_count.replace('%1$s', listed).replace('%2$s', found_posts);
		var post_count_class = '';
		if (current_page == 1) {
			post_count_class = ' text-align-left';
		} else if (current_page == max_num_pages) {
			post_count_class = ' text-align-right';
		}
		post_count_text = '<span class="feed-widget-pagination-info'+post_count_class+'">'+post_count_text+'</span>';
		if (button_type == 'loadmore') {
			if (current_page < max_num_pages) {
				html += '<a href="javascript:void(0)" class="shad white feed-widget-pagination-button feed-widget-pagination-load-more-button" data-paged="'+(current_page+1)+'">'+magone.text['LOAD MORE']+'</a>';
			} else {
				html += post_count_text;
			}
		} else if (button_type == 'nextprev') {
			if (current_page != 1) {
				html += '<a href="javascript:void(0)" class="shad white feed-widget-pagination-button feed-widget-pagination-newer-button" data-paged="'+(current_page-1)+'">'+magone.text['NEWER']+'</a>';	
			}
			html+=post_count_text;
			if (current_page != max_num_pages) {
				html += '<a href="javascript:void(0)" class="shad white feed-widget-pagination-button feed-widget-pagination-older-button" data-paged="'+(current_page+1)+'">'+magone.text['OLDER']+'</a>';	
			}

		} else {			
			for (var i = 1; i <= max_num_pages; i++) {
				var active = '';
				if (i == current_page) {
					active = ' active';
				}
				if (i != 1 && i != max_num_pages && i != current_page &&
					i != current_page - 1 && i != current_page - 2 &&
					i != current_page + 1 && i != current_page + 2) {
					continue;
				}
				html += '<a href="javascript:void(0)" class="shad feed-widget-pagination-button'+active+'" data-paged="'+i+'">'+i+'</a>';

				if (i == 1 && current_page - 3 > 1 ||
					i == current_page + 2 && current_page + 3 < max_num_pages) {
					html += '<span class="feed-widget-pagination-separator feed-widget-pagination-separator-1">...</span>';
				}
			}
			html += post_count_text;
		}
		
		return html;
	}

	// init widget pagination for first show
	$('.feed-widget-pagination').each(function () {		
		var widget_id = $(this).attr('data-widget_id');
		var widget_atts = window['Atts_'+widget_id];
		$(this).html(magone_feed_widget_pagination_builder(
			widget_atts.count,
			widget_atts.found_posts, 
			1, 
			widget_atts.max_num_pages, 
			widget_atts.pagination
		));
	});

	// take action when click pagination button
	function magone_get_item_class(i) {		
		var item_class = 'shad item item-'+i;
		if (i % 2 == 0) {
			item_class += ' item-two';
		}
		if (i % 3 == 0) {
			item_class += ' item-three';
		}
		if (i % 4 == 0) {
			item_class += ' item-four';	
		}
		for (var j = 1; j <= i; j++) {
			item_class += ' than-'+(j-1);
		}
	
		return item_class;
	}
	$(document).on('click', '.feed-widget-pagination-button', function () {
		if ($(this).is('.active')) {
			return;
		}
		var target_paged = $(this).attr('data-paged');
		var button_parent = $(this).parent();
		var widget_id = button_parent.attr('data-widget_id');		
		var widget_atts = window['Atts_'+widget_id];
		var widget_type = button_parent.attr('data-type');
		var widget_content_holder = $('#'+widget_id+' .widget-content');		
		button_parent.html('<i class="fa fa-spinner fa-spin"></i>').addClass('feed-widget-pagination-loading');
		
		$.post(magone.ajax_url, { 
			action: 'magone_article_box_pagination', 
			atts: widget_atts,
			type: widget_type,
			paged: target_paged
		}).done(function( data ) {
			if (!button_parent.is('.feed-widget-pagination-loadmore')) {
				widget_content_holder.html(data);
				magone_scroll_to($('#'+widget_id), 300);
			} else {
				widget_content_holder.append(data);
			}
			
			$(button_parent).html(magone_feed_widget_pagination_builder(
				widget_atts.count,
				widget_atts.found_posts, 
				target_paged,
				widget_atts.max_num_pages, 
				widget_atts.pagination
			)).removeClass('feed-widget-pagination-loading');

			// remake content
			// reindex for all items from two and three
			var index = 0;
			widget_content_holder.find('> .item, > .'+widget_type+'-col .item').each(function () {
				$(this).attr('class', magone_get_item_class(index) + (widget_type == 'list'? ' table': ''));
				index++;
			});

			// columnize for two / three when loading more
			if (button_parent.is('.feed-widget-pagination-loadmore') && (widget_type == 'two' || widget_type == 'three') && $('#'+widget_id).is('.auto-height')) {
				//re-index column
				index = 1;
				widget_content_holder.find('> .'+widget_type+'-col').removeClass('col-1').removeClass('col-2').removeClass('col-3').each(function () {
					$(this).addClass('col-'+index);
					index++;
				});
				// count start point
				var total_col = index;
				var total_item = widget_content_holder.find('> .'+widget_type+'-col .item').length;
				var num_in_col_1 = widget_content_holder.find('> .col-1 .item').length;
				var num_in_col_2 = widget_content_holder.find('> .col-2 .item').length;
				var num_in_col_3 = widget_content_holder.find('> .col-3 .item').length;
				var multiplier = 2;
				var index = multiplier;
				start_adjust = num_in_col_1 + num_in_col_2;				
				if (widget_type == 'three') {
					start_adjust += num_in_col_3;
					multiplier = 3;
					index = multiplier;
					if (num_in_col_3 == num_in_col_1) {
						index = 1;
					}
				} else if (widget_type == 'two') {
					if (num_in_col_2 == num_in_col_1) {
						index = 1;
					}
				}

				// start append
				for (var i = start_adjust; i < total_item; i++) {
					widget_content_holder.find('.item-'+i).appendTo(widget_content_holder.find('.col-'+index));
					index++;
					if (index > multiplier) {
						index = 1;
					}
				}

				// remove waste columns
				for (var i = multiplier+1; i <= total_col; i++) {
					widget_content_holder.find('.col-'+i).remove();
				}
			}

			// optimize thumbnail
			magone_optimize_thumbnail(widget_content_holder.find('.thumbnail img'));
		});
	});

	// quote widget
	magone_optimize_thumbnail($('.widget.quote .item-thumbnail img'));	
	
	// tab shortcode
	$('.shortcode-tab').tabs();
	$('.shortcode-vtab').tabs();

	// accordion shortcode
	$('.shortcode-accordion').each(function(){
		var multiple_open = $(this).attr('data-multiple_open');
		var close_all = $(this).attr('data-close_all');
		
		if (typeof(multiple_open) != 'undefined' && null != multiple_open) {
			var options = new Object();
			options.heightStyle = 'content';
			options.collapsible = true;
			
			if ('on' == multiple_open) {
				options.beforeActivate = function(event, ui) {
					// The accordion believes a panel is being opened
					if (ui.newHeader[0]) {
					   var currHeader  = ui.newHeader;
					   var currContent = currHeader.next('.ui-accordion-content');
					// The accordion believes a panel is being closed
					} else {
					   var currHeader  = ui.oldHeader;
					   var currContent = currHeader.next('.ui-accordion-content');
					}
					// Since we've changed the default behavior, this detects the actual status
					var isPanelSelected = currHeader.attr('aria-selected') == 'true';

					// Toggle the panel's header
					currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));

					// Toggle the panel's content
					currContent.toggleClass('accordion-content-active',!isPanelSelected);
					if (isPanelSelected) {
						currContent.slideUp(); 
					}  else {
						currContent.slideDown();
					}

					return false; // Cancels the default action
				};
			}
			
			if ('on' == close_all) {
				options.active = false;
			}
			
			$(this).accordion(options);
		}
		
	});


	// LOCK SHORTCODE
	function magone_unlock_content_handle(e) {
		if (typeof(e) == 'undefined') {
			return;
		}
		var current_link = window.location.href;
		var share_url = e.url;
		if (share_url && (share_url.indexOf(current_link) != -1 || current_link.indexOf(share_url) != -1)) {
			$('.locked-content').remove();
			$('.locked-content-data').show();
			magone_update_option('unlocked-'+magone_url_to_slug(window.location.hostname + window.location.pathname), 'unlocked');
		}
	}
	if ($('.locked-content').length) {
		// effect for unlock content
		if (magone_get_option('unlocked-'+magone_url_to_slug(window.location.hostname + window.location.pathname)) == 'unlocked') {		
			$('.locked-content').remove();
			$('.locked-content-data').show();
		} else if (!magone.is_gpsi) {
			/* Facebook */
			/***/		
			$(document).ready(function() {
				$.ajaxSetup({ cache: true });
					$.getScript('//connect.facebook.net/'+magone.locale+'/sdk.js', function(){
					FB.init({
						appId : magone.facebook_app_id,
						status : true,
						xfbml : true,
						cookie : false,
						version  : 'v2.5'
					});     
					FB.Event.subscribe('edge.create', function(href, widget) {								
						$.event.trigger({
							type: "unlock_content",
							url: href
						});
					});
					FB.Event.subscribe('comment.create', function(href, widget) {								
						$.event.trigger({
							type: "unlock_content",
							url: href
						});
					});
					FB.Event.subscribe('message.send', function(href, widget) {								
						$.event.trigger({
							type: "unlock_content",
							url: href
						});
					});			
				});
			});

			/***/

			/* Twitter */		
			window.twttr = (function (d,s,id) {
				var t, js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
				js.src="https://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
				return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
			}(document, "script", "twitter-wjs"));
			if (typeof(twttr) != 'undefined') {
				twttr.ready(function (twttr) {
					twttr.events.bind('tweet', function (event) {
						$.event.trigger({
							type: "unlock_content",
							url: event.target.baseURI					
						});
					});
					twttr.events.bind('like', function (event) {
						$.event.trigger({
							type: "unlock_content",
							url: event.target.baseURI					
						});
					});
					twttr.events.bind('follow', function (event) {
						$.event.trigger({
							type: "unlock_content",
							url: event.target.baseURI					
						});
					});
				});
			}
		}
		/* Listen for the pageShared event */	
		$(document).on('unlock_content', function (e) {		
			magone_unlock_content_handle(e);
		});
	} // end lock content efffect
	
	/*comment media replacer*/
	if (!magone.disable_wordpress_comment_media) {
		$('#comments .comment-body a').each(function () {
			var url = $(this).attr('href');
			if (typeof(url) != 'undefined' && url) {
				// replace for youtube
				if (url.indexOf('youtube') != -1 || url.indexOf('youtu.be') != -1) {
					// replace as youtube iframe
					var vid = magone_get_youtube_video_id(url);
					var lid = magone_get_youtube_list_id(url);
					if (vid) {
						var rep_code = '<iframe class="comment-media video youtube" width="640" height="360" src="https://www.youtube.com/embed/'+vid+'?';
						if (lid) {
							rep_code += 'list='+lid;
						} else {
							rep_code += 'rel=0';
						}
						rep_code += '" frameborder="0" allowfullscreen></iframe>';
						$(this).replaceWith(rep_code);
						return;				
					}
				}

				// replace for vimeo
				if (url.indexOf('vimeo') != -1) {
					var vid = magone_et_vimeo_video_id(url);
					if (vid) {
						$(this).replaceWith('<iframe class="comment-media video vimeo" src="https://player.vimeo.com/video/'+vid+'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
						return;
					}
				}

				// replace for images
				if (magone_is_image_src(url)) {
					$(this).replaceWith('<img class="comment-media image" src="'+url+'" alt="comment-image"/>');
					return;
				}
			}
		});	
	}
	
	/*STICKY SIDEBAR*/
	$('.sticky-inside').prepend('<div class="sticky-inside-pad"></div>');
	$(window).scroll(function() {
		if ($('.sticky-inside-pad').length == 0 || $('#content').length == 0) {
			return;
		}
		
		// window info
		var w_top = $(window).scrollTop();
		var w_hei = $(window).height();
		var w_bot = w_top + w_hei;
		
		$('.sticky-inside-pad').each(function() {
			var s_par = $(this).parent();
			if (!s_par.is('.sticky-inside')) {	
				$(this).stop().css('height', 0);
				return;
			}
			var s_ppa = s_par.parent();
			var s_par_top = s_par.offset().top;
			var s_con = $('#content');
			if (s_par.is('.column')) {
				s_con = 0; // reset
							
				// finding which will be the model for stick to
				s_ppa.find('.column.no-sticky').each(function(){
					if (s_par_top == $(this).offset().top) {
						// we will find all column on same level and has a same top
						if (s_con == 0 || s_con.height() < $(this).height()) {
							// also find the max-height one
							s_con = $(this);
						}						
					}
				});	
			}
			
			if (s_con == 0 || s_con.length == 0) {
				$(this).stop().css('height', 0);
				return;
			}
			
			// content info
			var c_top = s_con.offset().top;
			var c_hei = s_con.height();
			var c_bot = c_top + c_hei;
			
			
			// sidebar information
			var s_pad = $(this).height(); // current paddder hei
			var s_top = $(this).offset().top + s_pad;
			var s_hei = s_par.height() - s_pad;
			var s_bot = s_top + s_hei;	
			
			
			if (s_hei >= c_hei || s_ppa.width() <= s_par.width()) { 
				// don't need stick if side hei <= content hei				
				$(this).stop().css('height', 0);
				return;
			}
			
			if (s_hei + s_pad >= c_hei && w_top > s_top) {
				// prevent bounce of first load
				// when height is still not stable
				// because image or iframe loading
				$(this).stop().css('height', (c_hei - s_hei)+'px');
				return;
			}
			
			// couting new height of padder
			var new_pad = s_pad;
			if (w_top <= c_top) {
				// scrolled over top of content
				new_pad = 0; 
			} else if (w_bot >= c_bot ) {
				// scrolled over bot of content
				new_pad = s_pad + c_bot - s_bot; 
			} else if (w_top < s_top) {
				// scrolled over top of sidebar
				new_pad = w_top - c_top;
			} else if (w_bot > s_bot) {
				// scrolled over bot of sidebar
				new_pad = s_pad + w_bot - s_bot - 30; /*30px is padding from bottom*/
			}
			
			// never scroll out of content hei
			if (new_pad + s_hei > c_hei) {
				new_pad = c_hei - s_hei;
			}
			
			// animate the height
			if (new_pad != s_pad) {			
				$(this).stop().animate({
					height: new_pad + 'px'
				}, Number(magone.sticky_sidebar_delay));
			}
		});
	});
	
	
	// optimize post feature video iframe height
	$('.post-feature-media-wrapper iframe').each(function() {
		$(this).css('height', ($(this).width() / 1.8) + 'px');
	});
	$(window).resize(function(){
		$('.post-feature-media-wrapper iframe').each(function() {
			$(this).css('height', ($(this).width() / 1.8) + 'px');
		});
	});
}) (jQuery);