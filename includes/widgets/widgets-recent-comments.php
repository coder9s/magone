<?php

function magone_widget_recent_comments_display( $args, $instance, $widget_id, $widget_declaration ) {
	if (!isset($instance['count']) || !is_numeric($instance['count'])) {
		$instance['count'] = 5;
	}
	$query_args = array(
		'number' => (int) $instance['count'],
		'status' => 'approve',
		'type'		=>	'comment'
	);
	
	if (isset($instance['exclude_authors']) && $instance['exclude_authors']) {		
		$query_args['author__not_in'] = $instance['exclude_authors'];
	}
	$comments = get_comments($query_args);	
	magone_widget_common_header('Label list label feed fix-height none-icon', $instance, $args);
	

	if ($comments) {
		foreach ($comments as $index => $comment) {
			$post_id = $comment->comment_post_ID;
			
			echo 
			'<div class="shad item item-'.$index.' table">'.
				'<div class="tr">'.
					'<div class="td">'.
						'<h2 class="item-title">'.
							'<a href="'.esc_url(get_permalink($post_id).'#comment-'.$comment->comment_ID).'">								<span class="meta-item meta-item-author">'.$comment->comment_author.': </span> '.
								' <span class="title-name">'.$comment->comment_content.'</span>'.
							'</a>'.
						'</h2>'.
						'<span class="meta-item meta-item-date">'.
							sprintf( esc_html__( '%s ago', 'magone' ), 
								human_time_diff( 
									strtotime($comment->comment_date), 
									current_time( 'timestamp' ) 
								) 
							).
						'</span>'.
					'</div>'.
					'<div class="td item-readmore">'.
						'<a href="'.esc_url(get_permalink($post_id).'#comment-'.$comment->comment_ID).'">'.
							'<i class="fa fa-angle-right"></i>'.
						'</a>'.
					'</div>'.
				'</div>'.
			'</div>';
		}
	} else {
		esc_html_e('Not found any comments', 'magone');
	}
	
	magone_widget_common_footer();
}