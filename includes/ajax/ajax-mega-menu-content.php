<?php
function magone_mega_menu_content_callback() {	
	$cate_id = magone_get_server_request('id');
	
	if ($cate_id && is_numeric($cate_id)) {
		$entries = new WP_Query( array(
			'post_status' => 'publish',
			'cat' => (int)$cate_id,
			'post_type' => 'post',
			'posts_per_page'=> 4,
			'ignore_sticky_posts' => 1
		));
		
		$html = '';
		if ($entries->have_posts()) :
				$i = 0;
				while ( $entries->have_posts() ) : $entries->the_post();
				$entry = new MagOne_Article_Item(array(
					'show_format_icon' => true
				));
				$html .= '<div class="item item-'.$i.'">'. $entry->thumbnail('thumbnail', true).$entry->title('a').'<div class="clear"></div></div>';
				$i++;
				endwhile;
				wp_reset_postdata();
		endif;
		echo $html;
	}
	
	die();
}
if (is_admin()) :
	add_action( 'wp_ajax_nopriv_magone_mega_menu_content', 'magone_mega_menu_content_callback' );
	add_action( 'wp_ajax_magone_mega_menu_content', 'magone_mega_menu_content_callback' );
endif;// is_admin for ajax