<?php
function magone_widget_facebook_page( $args, $instance, $widget_id, $widget_declaration) {
	$instance = magone_set_widget_instance($instance, $widget_declaration);
	magone_widget_common_header('HTML', $instance);	
	
	static $fb_page_id = 0;
	
	echo '<div class="fb-page-raw" id="fb-page-'.$fb_page_id.'"'.
			'data-href="'.esc_attr(esc_url($instance['href'])).'" '.
			'data-width="'.esc_attr($instance['width']).'" '.
			'data-height="'.esc_attr($instance['height']).'" '.
			'data-adapt-container-width="'.esc_attr($instance['adapt-container-width']? 'true': 'false').'" '.
			'data-show-facepile="'.esc_attr($instance['show-facepile']? 'true': 'false').'" '.
			'data-small-header="'.esc_attr($instance['small-header']? 'true': 'false').'" '.
			'data-hide-cover="'.esc_attr($instance['hide-cover']? 'true': 'false').'" '.
			'data-show-posts="'.esc_attr($instance['show-posts']? 'true': 'false').'" '.
			'></div>';
	magone_widget_common_footer();
	$fb_page_id++;
}