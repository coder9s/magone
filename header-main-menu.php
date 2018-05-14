<?php 
	if ( has_nav_menu( 'main-menu' ) ) : ?>
<div class="widget page-list menu pagelist main-menu no-title" id="main-menu"><?php
		if (get_theme_mod('sticky_menu_logo')) :?>
			<a href="<?php echo esc_url(home_url());?>" class="sticky-menu-logo">
				<img alt="<?php echo esc_attr(bloginfo('name')); ?>" src="<?php echo esc_attr(get_theme_mod('sticky_menu_logo')); ?>" data-retina="<?php echo esc_attr(get_theme_mod('sticky_menu_logo_retina')); ?>"/>
			</a>
		<?php
		endif;
		wp_nav_menu( array(
			'theme_location' => 'main-menu',
			'container' => 'ul'
		));
		?><div class="clear"></div><!--!important-->
</div><?php
	endif;	
	