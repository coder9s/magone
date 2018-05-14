<?php
function magone_article_box_pagination_callback() {	
	$atts = magone_get_server_request('atts');
	
	$type = magone_get_server_request('type');
	$paged = magone_get_server_request('paged');
	
	global $MagOne_Article_Fields;
	foreach ($MagOne_Article_Fields[$type] as $key => $value) {
		if (!isset($atts[$key])) {
			if (isset($value['default'])) {
				$atts[$key] = $value['default'];
			} else {
				$atts[$key] = '';
			}				
		}
	}
	$cate_ids = array();
	$cates = array();
	
	if ($atts['cates']) {
		if (is_string($atts['cates'])) {
			$cate_ids = explode(',', $atts['cates']);
		} else if ($atts['cates']) {
			$cate_ids = $atts['cates'];
		}

		if (count($cate_ids)) {
			foreach ($cate_ids as $index => $id) {
				$cate_ids[$index] = (int) $id;
				$cates[$index] = get_category((int) $id);		
				$cates[$index]->link = get_category_link((int) $id);
			}
		}
	}
	$atts['paged'] = $paged;
		
	echo magone_article_box_content('ajax', $type, $atts, '', $cate_ids, $cates);
	
	
	
	die();
}
if (is_admin()) :
	add_action( 'wp_ajax_nopriv_magone_article_box_pagination', 'magone_article_box_pagination_callback' );
	add_action( 'wp_ajax_magone_article_box_pagination', 'magone_article_box_pagination_callback' );
endif;// is_admin for ajax