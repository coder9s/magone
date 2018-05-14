<?php
// use inside loop please
function magone_related_post($count = 3, $post_id = null, $style = 'related' /*or break*/) {
	// save post for backup later
	if ($post_id == null) {
		global $post;
		$post_id = $post->ID;
		if ($post_id == null) {
			return;
		}
	}
	

	/*QUERY*/
	// common query
	$args = array (
		'ignore_sticky_posts' => true,
		'posts_per_page' => $count,
		'post_status' => 'publish',
		'order' => 'DESC',
		'orderby' => 'rand',
		'post__not_in' => array($post_id),
	);
	
	// time query
	if (0) {
		$duration = time() - strtotime(get_lastpostdate());
		var_dump($duration);
		$one_day_duration = 24 * 60 * 60;
		if ($duration < 7 * $one_day_duration) {//1 month ago		
			$args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'after' => '1 month ago',
				)
			);
		}
		else if ($duration < 30 * $one_day_duration) {//1 year ago
			$args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'after' => '1 year ago',
				)
			);
		}
	}
	$tags = wp_get_post_tags($post_id, array('fields'  => 'all'));
	$tag_max = -1;
	$tag_id = 0;
	foreach ($tags as $tag) {
		// now we can save data
		if ($tag->count > $tag_max && $tag_max < $count + 1) {
			$tag_max = $tag->count;
			$tag_id = $tag->term_id;
		}
	}

	if ($tag_max >= $count + 1) {		
		$args['tag__in'] = array($tag_id);			
	} 
	/* if has no tag larger than count, we will get categories to check */
	else {
		$cats = wp_get_post_categories($post_id, array('fields' => 'all'));
		$cat_max = -1;
		$cat_id = 0;
		foreach ($cats as $cat) {
			// now we can save data
			if ($cat->count > $cat_max && $cat_max < $count + 1) {
				$cat_max = $cat->count;
				$cat_id = $cat->term_id;
			}
		}

		// found a cat has count > count
		// or not but the max cat > max tag
		if ($cat_max >= $count + 1 || $tag_max < $cat_max) {
			$args['category__in'] = array($cat_id);
		}

		/* if has no cate larger than count, we will pick the biggest count from tag / category */
		else if ($tag_max > 0) {
			$args['tag__in'] = array($tag_id);
		}
	}
	
	$my_query = new WP_Query( $args );

	
	// Show HTML
	if ($my_query->have_posts()) : 
		$post_id = get_the_ID();
		if ($style == 'break') {
			echo '<div class="post-break-links">';
		} else {
			
		}
		
		$counter = 0;
		while ( $my_query->have_posts() ) : $my_query->the_post();			
			if ($style == 'break') {
				echo '<div class="post-break-link"><i class="fa fa-angle-right"></i> <a title="'.esc_attr(get_the_title()).'" href="'.get_permalink().'">'.get_the_title().'</a></div>';
			} else {
				echo '<div class="post-related-item post-related-item-'.$counter.' '.($counter % 2 == 0 ? 'item-two':'').'">
						<a href="'.get_permalink().'" title="'.esc_html__('Click to read', 'magone').'" class="thumbnail item-thumbnail">
							'.magone_get_post_image($post_id, 'full', array(
								'alt' => esc_attr(get_the_title()), 
								'title' => esc_attr(get_the_title())
							)).'
						</a>
						<h3 class="item-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div>';
			}
			$counter++;
		endwhile;
		if ($style == 'break') {
			echo '</div>';
		} else {
			
		}
	else:
		if ($style == 'break') {
			
		} else {
			esc_html_e('Not found any posts', 'magone');
		}
	endif;
	wp_reset_postdata();	
}