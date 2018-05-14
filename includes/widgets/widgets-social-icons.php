<?php

function magone_widget_social_icons( $args, $instance, $widget_id, $widget_declaration) {
	$instance = magone_set_widget_instance($instance, $widget_declaration);
	magone_widget_common_header('LinkList social_icons linklist', $instance);	
	
	global $magone_social_icon_list;
	
	if (count($magone_social_icon_list)):
	?><ul><?php
		foreach ($magone_social_icon_list as $key => $value) : 
			if (empty($instance[$key])) {
				continue;
			}
		?><li><a href="<?php echo esc_url($instance[$key]); ?>" title="<?php echo esc_attr($key) ?>" class="social-icon <?php echo esc_attr($key) ?>" target="_blank"><i class="fa fa-<?php echo esc_attr($key) ?>"></i></a></li><?php
		endforeach; 
	?></ul><div class="clear"></div><?php 
	endif;
	
	magone_widget_common_footer();
}