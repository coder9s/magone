<?php
function magone_save_comment_count_callback() {	
	$id = magone_get_server_request('id');
	$count = magone_get_server_request('count');
	$system = magone_get_server_request('system');
	
	echo '['.$id.']['.$count.']['.$system.']';
	update_post_meta((int) $id, $system.'_comment_count', $count);
	echo get_post_meta($id, $system.'_comment_count', true);
	
	die();
}
if (is_admin()) :
	add_action( 'wp_ajax_nopriv_magone_save_comment_count', 'magone_save_comment_count_callback' );
	add_action( 'wp_ajax_magone_save_comment_count', 'magone_save_comment_count_callback' );
endif;// is_admin for ajax