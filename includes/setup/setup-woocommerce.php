<?php
add_filter( 'woocommerce_breadcrumb_home_url', 'magone_woocommerce_breadcrumb_home_url' );
function magone_woocommerce_breadcrumb_home_url() {
	return get_permalink( wc_get_page_id ( 'shop' ) );
}

add_filter( 'is_woocommerce', 'magone_is_woocommerce' );
function magone_is_woocommerce( $is_woocommerce ) {
	if (is_cart() || is_checkout()) {
		return true;
	}
	
	return $is_woocommerce;
}