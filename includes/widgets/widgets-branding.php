<?php

function magone_widget_branding( $args, $instance, $widget_id, $widget_declaration) {
	$instance = magone_set_widget_instance($instance, $widget_declaration);
	magone_widget_common_header('Branding', $instance);
	
	if (!empty($instance['logo'])) :
		?><div class="branding-line branding-logo"><?php
			?><a href="<?php echo esc_url(get_home_url()); ?>"><?php
				?><img alt="<?php esc_attr_e('Site Logo', 'magone'); ?>" src="<?php echo esc_url($instance['logo']); ?>"/><?php
			?></a><?php	
		?></div><?php
	endif;
	
	if (!empty($instance['about'])) :
		?><div class="branding-line branding-about"><?php
			echo $instance['about'];
		?></div><?php
	endif;
	
	if (!empty($instance['address'])) :
		?><div class="branding-line branding-address branding-info"><?php
			echo '<i class="fa fa-map-marker"></i> '.$instance['address'];
		?></div><?php
	endif;
	
	if (!empty($instance['phone'])) :
		?><div class="branding-line branding-phone branding-info"><?php
			echo '<i class="fa fa-phone"></i> '.$instance['phone'];
		?></div><?php
	endif;
	
	if (!empty($instance['email'])) :
		?><div class="branding-line branding-email branding-info"><?php
			echo '<i class="fa fa-envelope"></i> '.$instance['email'];
		?></div><?php
	endif;

	magone_widget_common_footer();
}