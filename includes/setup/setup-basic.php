<?php

if ( ! isset( $content_width ) ) {
	/*
	 * $box_width = get_theme_mod('box_width', 1010);
	 * $main_width = get_theme_mod('main_width', 69);
	 * $main_width = $main_width * $box_width / 100;
	 */
	$content_width = 9999;
}

add_action( 'after_setup_theme', 'magone_theme_basic_setup' );
function magone_theme_basic_setup() {	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	// http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	load_theme_textdomain( 'magone', get_template_directory() . '/languages' );

	// http://codex.wordpress.org/Function_Reference/add_editor_style
	add_editor_style( MAGONE_THEME_URL_CSS . 'editor.css' );
	
//	add_theme_support( 'woocommerce' );
	
	// http://codex.wordpress.org/Function_Reference/add_theme_support
	// http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array(/*'aside','gallery', 'link',*/ 'image', /*'quote', 'status',*/ 'video', 'audio',/* 'chat'*/));
	
	add_theme_support( 'title-tag' );
	
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 9999 );	
			
	add_image_size( 'large', 650, 9999 ); 
	add_image_size( 'medium', 400, 9999 );
	add_image_size( 'thumbnail', 250, 9999 );
	
	// Serve scaled images
	if (get_theme_mod('serve-scaled-images', false)) {
		add_image_size( 'scale-050', 50, 9999 );
		add_image_size( 'scale-100', 100, 9999 );
		add_image_size( 'scale-150', 150, 9999 );
		add_image_size( 'scale-200', 200, 9999 );
		add_image_size( 'scale-300', 300, 9999 );
		add_image_size( 'scale-350', 350, 9999 );
		add_image_size( 'scale-450', 450, 9999 );
		add_image_size( 'scale-500', 500, 9999 );
		add_image_size( 'scale-550', 550, 9999 );
	}
		
	// retina if have
	add_image_size( 'retina2x', 800, 9999 );
	add_image_size( 'retina3x', 1200, 9999 );
	add_image_size( 'retina4x', 1600, 9999 );
	add_image_size( 'retina5x', 2000, 9999 );
	add_image_size( 'retina6x', 2400, 9999 );
	
	add_theme_support( 'automatic-feed-links' );
}

// for performance since 2.9
$remove_queries = get_theme_mod('remove-query-strings', false);
if ($remove_queries) {
	add_filter( 'script_loader_src', 'magone_remove_query_strings', 15, 1 );
	add_filter( 'style_loader_src', 'magone_remove_query_strings', 15, 1 );
	function magone_remove_query_strings( $src ){
		if (strpos($src, 'fonts.googleapis.com/css') !== false) {
			return $src;
		}
		$parts = explode( '?', $src );		
		return $parts[0];
	}
}



add_action( 'wp_enqueue_scripts', 'magone_enqueue_scripts_styles' );
function magone_enqueue_scripts_styles() {
	$header_layout = get_theme_mod('header_layout');
	$min = '';
	if (get_theme_mod('minify-css-js', false)) {
		$min = '.min';
	}
		
	// font-awesome if framework is not available
	if (!function_exists('sneeit_framework')) {
		wp_enqueue_style('font-awesome', MAGONE_THEME_URL_FONTS . 'font-awesome/css/font-awesome.min.css', array(), MAGONE_THEME_VERSION);
	}

	// enqueue style
	wp_enqueue_style( 'magone-style', MAGONE_THEME_URL . '/style'.$min.'.css', array(), MAGONE_THEME_VERSION );

	if (is_rtl()) {
		wp_enqueue_style( 'magone-rtl', MAGONE_THEME_URL_CSS . 'rtl'.$min.'.css', array(), MAGONE_THEME_VERSION );
	}
	
	if ( ! get_theme_mod('disable_responsive') ) {
		wp_enqueue_style( 'magone-responsive', MAGONE_THEME_URL_CSS . 'responsive'.$min.'.css', array(), MAGONE_THEME_VERSION );
		if (is_rtl()) {
			wp_enqueue_style( 'magone-rtl-responisve', MAGONE_THEME_URL_CSS . 'rtl-responsive'.$min.'.css', array(), MAGONE_THEME_VERSION );
		}
	}
	
	wp_enqueue_style( 'magone-print', MAGONE_THEME_URL_CSS . 'print'.$min.'.css', array(), MAGONE_THEME_VERSION, 'print' );
	
	
	wp_enqueue_style( 'magone-ie-8', MAGONE_THEME_URL_CSS . 'ie-8'.$min.'.css', array(), MAGONE_THEME_VERSION );
	wp_style_add_data( 'magone-ie-8', 'conditional', 'lt IE 8' );
	wp_enqueue_style( 'magone-ie-9', MAGONE_THEME_URL_CSS . 'ie-9'.$min.'.css', array(), MAGONE_THEME_VERSION );
	wp_style_add_data( 'magone-ie-9', 'conditional', 'lt IE 9' );

	if ( function_exists('is_woocommerce') && is_woocommerce() ) {
		wp_enqueue_style( 'magone-woocommerce', MAGONE_THEME_URL_CSS . 'woocommerce'.$min.'.css', MAGONE_THEME_VERSION );
		if (!get_theme_mod('disable_responsive')) {
			wp_enqueue_style( 'magone-woocommerce-responsive', MAGONE_THEME_URL_CSS . 'woocommerce-responsive'.$min.'.css', array(), MAGONE_THEME_VERSION );
		}
		
		wp_enqueue_script( 'magone-woocommerce', MAGONE_THEME_URL_JS . 'woocommerce'.$min.'.js', array( 'jquery'), MAGONE_THEME_VERSION, true );
		

		// static style for woocommerce
		$main_color = get_theme_mod( 'main_color' );
		wp_add_inline_style('magone-woocommerce', '
			.woo-mini-cart-very-right {
				border-top-color: ' . $main_color . '!important;
			}
			.widget.woocommerce.widget_shopping_cart .buttons .button.checkout,
			.widget.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
			.widget.woocommerce.widget_price_filter .ui-slider .ui-slider-range,
			.woocommerce-product-search input[type="submit"],
			.woocommerce span.onsale,
			.woocommerce .button.single_add_to_cart_button,
			.woocommerce .button.checkout,
			.woocommerce .button.checkout-button,
			.woocommerce table.shop_table input[name="update_cart"],
			.woocommerce #payment #place_order, .woocommerce-page #payment #place_order,
			.woocommerce #review_form #respond .form-submit input {
				background-color: ' . $main_color . '!important;
			}
			.woocommerce ul.products li.product > a.add_to_cart_button,
			.woocommerce-page ul.products li.product > a.add_to_cart_button,
			.woocommerce .woocommerce-breadcrumb a {
				color: ' . $main_color . '!important;
			}
			.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content {
				border-color: ' . $main_color . '!important;
			}
		');
	}
	
	if ( function_exists('is_bbpress') && is_bbpress() ) {
		wp_enqueue_style( 'magone-bbpress', MAGONE_THEME_URL_CSS . 'bbpress'.$min.'.css', MAGONE_THEME_VERSION );
		$main_color = get_theme_mod( 'main_color' );
		wp_add_inline_style('magone-bbpress', '
			#bbpress-forums a:hover {
				color: ' . $main_color . '!important;
			}
			.subscription-toggle {
				background-color: ' . $main_color . '!important;
			}
		');
		
		
		wp_enqueue_script( 'magone-bbpress', MAGONE_THEME_URL_JS . (is_rtl()?'rtl-':'') . 'bbpress'.$min.'.js', array( 'jquery'), MAGONE_THEME_VERSION, true );
		
		wp_localize_script( 'magone-bbpress', 'magone_bbp', array(
			'text' => array(				
				'search_form_placeholder' => esc_html__('Input Your Keyword Here', 'magone'),
				'title_form_placeholder' => esc_html__('Input Your Title Here', 'magone'),
			),
		));	
	}
	
	
	// inline style
	
	if ($header_layout == 'logo-mid') {
		wp_add_inline_style('magone-style', '
			
		');
	}
	
	wp_enqueue_script('magone-owl', MAGONE_THEME_URL_JS . 'owl'.$min.'.js', array('jquery', 'jquery-ui-tabs', 'jquery-ui-accordion'), MAGONE_THEME_VERSION, true);
	wp_enqueue_script('magone-lib', MAGONE_THEME_URL_JS . 'lib'.$min.'.js', array('jquery', 'jquery-ui-tabs', 'jquery-ui-accordion'), MAGONE_THEME_VERSION, true);
	wp_enqueue_script('magone-main', MAGONE_THEME_URL_JS . 'main'.$min.'.js', array('jquery', 'jquery-ui-tabs', 'jquery-ui-accordion', 'magone-owl', 'magone-lib'), MAGONE_THEME_VERSION, true);		
	add_thickbox();
	if ( is_singular() ) {		
		wp_enqueue_script( "comment-reply" );
	}
	
	
	wp_localize_script( 'magone-lib', 'magone', array(
		'text' => array(
			'No Found Any Posts' => esc_html__('Not Found Any Posts', 'magone'),
			'Tab' => esc_html__('Tab', 'magone'),
			'Copy All Code'  => esc_html__('Copy All Code', 'magone'), 
			'Select All Code' => esc_html__('Select All Code', 'magone'), 
			'All codes were copied to your clipboard' => esc_html__('All codes were copied to your clipboard', 'magone'), 
			'Can not copy the codes / texts, please press [CTRL]+[C] (or CMD+C with Mac) to copy' => esc_html__('Can not copy the codes / texts, please press [CTRL]+[C] (or CMD+C with Mac) to copy', 'magone'),
			'widget_pagination_post_count' => wp_kses(__('<span class="value">%1$s</span> / %2$s POSTS', 'magone'), array('span'=>array('class'=>array()))), 
			'LOAD MORE' => esc_html__('LOAD MORE', 'magone'),
			'OLDER' => esc_html__('OLDER', 'magone'),
			'NEWER' => esc_html__('NEWER', 'magone'),
			'Hover and click above bar to rate' => esc_html__('Hover and click above bar to rate', 'magone'),
			'Hover and click above stars to rate' => esc_html__('Hover and click above stars to rate', 'magone'),
			'You rated %s' => esc_html__('You rated %s', 'magone'),			
			'You will rate %s' => esc_html__('You will rate %s', 'magone'),
			'Submitting ...' => esc_html__('Submitting ...', 'magone'),
			'Your browser not support user rating' => esc_html__('Your browser not support user rating', 'magone'),
			'Server not response your rating' => esc_html__('Server not response your rating', 'magone'),
			'Server not accept your rating' => esc_html__('Server not accept your rating', 'magone'),
		),
		'ajax_url' => admin_url('admin-ajax.php'),
		'is_rtl' => is_rtl(),
		'is_gpsi' => magone_is_gpsi(),
		'facebook_app_id' => get_theme_mod('facebook_comment_app_id'),
		'disqus_short_name' => get_theme_mod('disqus_short_name'),
		'primary_comment_system' => get_theme_mod('primary_comment_system'),
		'disable_wordpress_comment_media' => get_theme_mod('disable_wordpress_comment_media'),
		'sticky_menu' => get_theme_mod('sticky_menu'),
		'locale' => get_locale(),
		'sticky_sidebar_delay' => get_theme_mod('sticky_sidebar_delay', 200),
		'serve_scaled_images' => get_theme_mod('serve-scaled-images', false),
		
	));	
}

if ( magone_is_gpsi() ) {
	wp_deregister_script( 'woocommerce-layout' );
	wp_deregister_script( 'woocommerce-smallscreen' );
	remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
	add_action( 'wp_footer', 'wp_enqueue_scripts' );
}



add_action( 'admin_enqueue_scripts', 'magone_setup_basic_admin_enqueue_scripts', 10, 1);
function magone_setup_basic_admin_enqueue_scripts($hook) {
	if ('post.php' != $hook && 'post-new.php' != $hook) {
		return;
	}
	
	wp_enqueue_style( 'magone-editor', MAGONE_THEME_URL_CSS . '/editor.css', array(), MAGONE_THEME_VERSION );
}


add_action("login_head", "magone_login_logo");
function magone_login_logo() {
	if (get_theme_mod('site_logo')) {
		wp_enqueue_script('magone-login', MAGONE_THEME_URL_JS . 'login.js', array('jquery'), MAGONE_THEME_VERSION, true);
		wp_localize_script( 'magone-login', 'magone_login_js', array(
			'home_url' => get_home_url(),
			'blog_logo_src' => get_theme_mod('site_logo')
		) );
	}	
}
function magone_setup_basic_body_class($classes){
	
	$sidebar_layout = '';

	if ( is_singular() ) {

		global $post;

		if ( is_object( $post ) && isset( $post->ID ) ) {
			$sidebar_layout = get_post_meta( $post->ID, 'sidebar_layout', true );
		}
	}
	
	// in case this is not item page or item sidebar layout is default
	if ( ! $sidebar_layout ) {

		// process for woocommerce first
		if (function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			if ( is_shop() ){				
				$sidebar_layout = get_theme_mod( 'shop_sidebar_layout' );
			}	
			elseif ( is_product() ) {
				$sidebar_layout = get_theme_mod( 'product_sidebar_layout' ) ;
			}
			else {
				$sidebar_layout = get_theme_mod( 'archive_product_sidebar_layout' ) ;
			}
		}
		// process for bbpress
		else if (function_exists( 'is_bbpress' ) && is_bbpress() ) {
			$sidebar_layout = get_theme_mod( 'forum_sidebar_layout' );					
		}
		// or process with normal pages
		else {
			if ( is_home() || is_front_page() ) {
				$sidebar_layout = get_theme_mod('sidebar_layout');
			} 
			elseif ( is_page() ) {
				$sidebar_layout = get_theme_mod('page_sidebar_layout');
			} 
			elseif ( is_single() ) {
				$sidebar_layout = get_theme_mod('article_sidebar_layout') ;
			}
			else {
				$sidebar_layout = get_theme_mod('archive_sidebar_layout');
			}
		}
	} /* end checking sidebar layout of other pages*/

	// if did not set, just use the default
	if ( ! $sidebar_layout ) {
		$sidebar_layout = 'right';
	}

	$classes[] = 'sidebar-' . $sidebar_layout;
	
	// add solid class if wrapper background == box background (white)
	$wrapper_background_color = get_theme_mod('wrapper_background_color');
	if ($wrapper_background_color) {
		$wrapper_background_color = strtolower($wrapper_background_color);
		if ($wrapper_background_color == '#ffffff' ||
			$wrapper_background_color == '#fff' ||
			$wrapper_background_color == 'white') {
			$classes[] = 'solid-wrapper';
		}
	}
	
	$main_menu_background_color = get_theme_mod('main_menu_background_color');
	if ($main_menu_background_color) {
		$main_menu_background_color = strtolower($main_menu_background_color);
		if ($main_menu_background_color == '#ffffff' ||
			$main_menu_background_color == '#fff' ||
			$main_menu_background_color == 'white') {
			$classes[] = 'solid-menu';
		}
	}
	
	$header_full_width = get_theme_mod('header_full_width');
	if ($header_full_width) {
		$classes[] = 'full-width-header';
	}
	
	
	return $classes;
}
add_filter('body_class', 'magone_setup_basic_body_class', 10, 1);

function magone_post_classes( $classes, $class, $post_id ) {
    if (is_single() || is_page()) {
        $classes[] = 'post';
		$classes[] = 'hentry';		
    }
 
    return $classes;
}
add_filter( 'post_class', 'magone_post_classes', 10, 3 );

do_action('sneeit_support_font_awesome');
do_action('sneeit_support_thread_comments');
do_action('sneeit_support_ie_html5');
do_action('sneeit_apply_blogspot_body_class');

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function magone_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'magone_render_title' );
}


global $primary_comment_system;
$primary_comment_system = get_theme_mod('primary_comment_system');

function magone_get_comments_number($count, $post_id) {
	global $primary_comment_system;	
	$comment_number = get_post_meta($post_id, $primary_comment_system.'_comment_count', true);

	if ( is_numeric( $comment_number ) ) {
		return ( (double) $comment_number );
	}

	return $count;
}



add_filter( 'mce_buttons_2', 'magone_setup_basic_mce_buttons_2', 10, 1);
function magone_setup_basic_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'fontselect' ); // Add Font Select
	array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
	return $buttons;
}



add_action( 'admin_enqueue_scripts', 'magone_admin_enqueue_scripts');
function magone_admin_enqueue_scripts() {
	wp_enqueue_style( 'magone-style', MAGONE_THEME_URL_CSS . '/admin.css', array(), MAGONE_THEME_VERSION );
}



add_action('wp_head', 'magone_wp_head');
function magone_wp_head() {
	if ( get_theme_mod( 'head_html' ) ) {
		echo get_theme_mod('head_html');
	}
	if ( get_theme_mod( 'head_css' ) ) {
		echo '<styl'.'e type="t'.'ext/c'.'ss">'.get_theme_mod('head_css').'</st'.'yle>';
	}
	if ( get_theme_mod( 'head_js' ) ) {
		echo '<sc'.'ript type="te'.'xt/jav'.'a'.'scr'.'ipt">'.get_theme_mod('head_js').'</s'.'cript>';
	}
	
	if ( get_theme_mod( 'main_color' ) ) {
		echo '<meta name="theme-color" content="' . get_theme_mod( 'main_color' ) . '" />';
	}
}

add_action('wp_footer', 'magone_wp_footer');
function magone_wp_footer() {
	if ( get_theme_mod('footer_html') ) {
		echo get_theme_mod('footer_html');
	}
	if ( get_theme_mod('footer_css') ) {
		echo '<st'.'yle type="text/cs'.'s">'.get_theme_mod('footer_css').'</st'.'yle>';
	}
	if ( get_theme_mod('footer_js') ) {
		echo '<scr'.'ipt type="text/jav'.'ascr'.'ipt">'.get_theme_mod('footer_js').'</sc'.'ript>';
	}	
}


/* Hook to init */
add_action( 'init', 'magone_editor_background_color' );
 
/**
 * Add TinyMCE Text BgColor Button
 */
function magone_editor_background_color(){
 
    /* Add the button/option in second row */
    add_filter( 'mce_buttons_2', 'magone_editor_background_color_button', 1, 2 ); // 2nd row
}
function magone_editor_background_color_button( $buttons, $id ){
 
    /* Only add this for content editor, you can remove this line to activate in all editor instance */
    if ( 'content' != $id ) return $buttons;
 
    /* Add the button/option after 4th item */
    array_splice( $buttons, 4, 0, 'backcolor' );
 
    return $buttons;
}