<?php 
$sidebar = ''; 
$sidebar_layout = '';

if ( is_singular() ) {
	
	global $post;
	
	if ( is_object( $post ) && isset( $post->ID ) ) {
		$sidebar_layout = get_post_meta( $post->ID, 'sidebar_layout', true );

		// save item sidebar name in case the item sidebar layout is left / right / or default
		if ( $sidebar_layout != 'full' ) {	
			$sidebar = get_post_meta($post->ID, 'sidebar_name', true);
		}		
	}
}
// in case this is not item page or item sidebar layout is default
if ( ! $sidebar_layout ) {
	
	// process for woocommerce first
	if (function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		if ( is_shop() ){
			// always check just in case this is not item or item sidebar name is default
			if ( ! $sidebar ) {
				$sidebar = get_theme_mod( 'shop_sidebar' );
			}
			
			$sidebar_layout = get_theme_mod( 'shop_sidebar_layout' );
		}	
		elseif ( is_product() ) {
			if ( ! $sidebar ) {
				$sidebar = get_theme_mod( 'product_sidebar' );
			}
			$sidebar_layout = get_theme_mod( 'product_sidebar_layout' ) ;
		}
		else {
			if ( ! $sidebar ) {
				$sidebar = get_theme_mod( 'archive_product_sidebar' );
			}
			$sidebar_layout = get_theme_mod( 'archive_product_sidebar_layout' ) ;
		}
	}
	// process for bbpress
	else if (function_exists( 'is_bbpress' ) && is_bbpress() ) {		
		// always check just in case this is not item or item sidebar name is default
		if ( ! $sidebar ) {
			$sidebar = get_theme_mod( 'forum_sidebar' );
		}

		$sidebar_layout = get_theme_mod( 'forum_sidebar_layout' );
	}
	// or process with normal pages
	else {
		if ( is_home() || is_front_page() ) {
			if ( ! $sidebar ) {
				$sidebar = get_theme_mod('home_sidebar');
			}
			$sidebar_layout = get_theme_mod('sidebar_layout');
		} 
		elseif ( is_page() ) {
			if ( ! $sidebar ) {
				$sidebar = get_theme_mod('page_sidebar');
			}
			$sidebar_layout = get_theme_mod('page_sidebar_layout');
		} 
		elseif ( is_single() ) {
			if ( ! $sidebar ) {
				$sidebar = get_theme_mod('article_sidebar');
			}
			$sidebar_layout = get_theme_mod('article_sidebar_layout') ;
		}
		else {
			if ( ! $sidebar ) {
				$sidebar = get_theme_mod('archive_sidebar');
			}
			$sidebar_layout = get_theme_mod('archive_sidebar_layout');
		}
	}

} /*end of check sidebar layout of other pages*/

// if did not set, just use the default
if ( ! $sidebar ) {
	$sidebar = 'sidebar';
}
if ( ! $sidebar_layout ) {
	$sidebar_layout = 'right';
}

// counting sticky effect
$sticky_sidebar = false;

// process for woocommerce first
if (function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	if ( is_shop() ){
		$sticky_sidebar = get_theme_mod( 'shop_sticky_sidebar' );
	}	
	elseif ( is_product() ) {
		$sticky_sidebar = get_theme_mod( 'product_sticky_sidebar' );		
	}
	else {
		$sticky_sidebar = get_theme_mod( 'archive_product_sticky_sidebar' );		
	}
}

// process for bbpress
if (function_exists( 'is_bbpress' ) && is_bbpress() ) {
	$sticky_sidebar = get_theme_mod( 'forum_sticky_sidebar' );	
}

// or process with normal pages
else {
	if ( is_home() || is_front_page() ) {
		$sticky_sidebar = get_theme_mod('sticky_sidebar');		
	} 
	elseif ( is_page() ) {
		$sticky_sidebar = get_theme_mod('page_sticky_sidebar');		
	}
	elseif ( is_single() ) {
		$sticky_sidebar = get_theme_mod('article_sticky_sidebar');		
	}
	else {
		$sticky_sidebar = get_theme_mod('archive_sticky_sidebar');				
	}
}

if ( $sidebar_layout == 'left' || $sidebar_layout == 'right' ) {
	if ( ! function_exists( 'sneeit_framework' ) && is_active_sidebar( $sidebar ) ) {	
		dynamic_sidebar( $sidebar );	
	} 
	else {
		do_action( 'sneeit_display_sidebar', array(
			'id'    => $sidebar,
			'class' => 'section main-sidebar'.($sticky_sidebar?' sticky-inside':''),
		) );
	}
}


