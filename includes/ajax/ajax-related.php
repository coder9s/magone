<?php
function magone_related_callback() {
	$count = magone_get_server_request('count');
	$post_id = magone_get_server_request('id');
	magone_related_post((int) $count, (int) $post_id);
	die();
}
if (is_admin()) :
	add_action( 'wp_ajax_nopriv_magone_related', 'magone_related_callback' );
	add_action( 'wp_ajax_magone_related', 'magone_related_callback' );
endif;// is_admin for ajax