<?php 
$sidebar = ''; 

// process for woocommerce first
if (function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	if ( is_shop() ){
		$sidebar = get_theme_mod( 'shop_before_content_sidebar' );
	}	
	elseif ( is_product() ) {
		$sidebar = get_theme_mod( 'product_before_content_sidebar' );		
	}
	else {
		$sidebar = get_theme_mod( 'archive_product_before_content_sidebar' );		
	}
}
// or process with normal pages
else {
	if ( is_home() || is_front_page() ) {
		$sidebar = get_theme_mod('home_before_content_sidebar');		
	} 
	elseif ( is_page() ) {
		$sidebar = get_theme_mod('page_before_content_sidebar');		
	} 
	elseif ( is_single() ) {
		$sidebar = get_theme_mod('article_before_content_sidebar');		
	}
	else {
		$sidebar = get_theme_mod('archive_before_content_sidebar');				
	}
}


if ( $sidebar ) {
	if ( ! function_exists( 'sneeit_framework' ) && is_active_sidebar( $sidebar )) {	
		dynamic_sidebar( $sidebar );
	} 
	else {
		do_action( 'sneeit_display_sidebar', array(
			'id'    => $sidebar,
			'class' => 'section before-content',
		) );
	}
}

?>			
<div class="clear"></div>