<?php

function magone_shortcode_sidebar_display( $atts = array(), $content = "" ) {
	if (!isset($atts['id'])) {
		$atts['id'] = 'sidebar';
	}	
	ob_start();	
	do_action('sneeit_display_sidebar', array(
		'id' => $atts['id'],
		'class' => 'section main-sidebar'
	));

	return ob_get_clean();
}