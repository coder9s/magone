<?php 
	if ( has_nav_menu( 'top-menu' ) ) : ?>
<a id="top-menu-toggle-mobile" class="top-menu-toggle header-button toggle-button mobile">
	<span class="inner">
		<i class="fa fa-bars color"></i> 
		<span><?php esc_html_e('TOP MENU', 'magone'); ?></span>
	</span>
</a>
<div class="widget page-list menu pagelist top-menu no-title" id="top-menu"><?php
		wp_nav_menu( array(
			'theme_location' => 'top-menu',
			'container' => 'ul'
		));
		?><div class="clear"></div><!--!important-->
</div><?php
	endif;	
	
	