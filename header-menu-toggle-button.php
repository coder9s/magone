<?php if (has_nav_menu( 'main-menu' )) : ?>
<a id="main-menu-toggle" class="main-menu-toggle header-button toggle-button active">
	<span class="inner">
		<i class="fa fa-bars color"></i> 
		<span><?php esc_html_e('MENU', 'magone'); ?></span>
	</span>
	<span class="arrow border"></span>
</a>
<a id="main-menu-toggle-mobile" class="main-menu-toggle header-button toggle-button mobile">
	<span class="inner">
		<i class="fa fa-bars color"></i> 
		<span><?php esc_html_e('MENU', 'magone'); ?></span>
	</span>
	<span class="arrow border"></span>
</a>
<?php endif;