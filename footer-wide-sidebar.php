<?php 
$sidebar = ''; 

// process for woocommerce first
if (function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	if ( is_shop() ){
		$sidebar = get_theme_mod( 'shop_footer_sidebar' );
	}	
	elseif ( is_product() ) {
		$sidebar = get_theme_mod( 'product_footer_sidebar' );		
	}
	else {
		$sidebar = get_theme_mod( 'archive_product_footer_sidebar' );		
	}
}
// or process with normal pages
else {
	if ( is_home() || is_front_page() ) {
		$sidebar = get_theme_mod('home_footer_sidebar');		
	} 
	elseif ( is_page() ) {
		$sidebar = get_theme_mod('page_footer_sidebar');		
	} 
	elseif ( is_single() ) {
		$sidebar = get_theme_mod('article_footer_sidebar');		
	}
	else {
		$sidebar = get_theme_mod('archive_footer_sidebar');				
	}
}


if ( $sidebar ) {
	if ( ! function_exists( 'sneeit_framework' ) && is_active_sidebar( $sidebar )) {	
		dynamic_sidebar( $sidebar );
	} 
	else {
		do_action( 'sneeit_display_sidebar', array(
			'id'    => $sidebar,
			'class' => 'section footer-wide',
		) );
	}
}




?>			
<div class="clear"></div>