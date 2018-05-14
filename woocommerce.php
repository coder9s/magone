<?php 
get_header(); 

if ( ! is_shop() ) {
	$woocommerce_breadcrumb = array(
		'delimiter'   => '<span>&#47;</span>',
		'wrap_before' => '<nav class="post-breadcrumb woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
		'wrap_after'  => '</nav>',
		'before'      => '<span class="breadcrumb-item">',
		'after'       => '</span>',
		'home'        => esc_html__( 'Shop', 'magone' ),
	);	
		
	woocommerce_breadcrumb( $woocommerce_breadcrumb );
}

?>
	
	<?php if ( have_posts() ) :	
		woocommerce_content();		
	endif;
	?>
		
<?php get_footer(); ?>