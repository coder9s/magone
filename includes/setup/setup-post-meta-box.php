<?php

// post-meta-box without handle or action will call shortcode as default
$magone_post_meta_box_fields = array(
	'extra_content' => array(
		'title' => esc_html__('Extra Content', 'magone'),
		'fields' => array(
			'sub_title' => array(
				'label' => esc_html__('Sub Title', 'magone'),
			)
		)
	),
	'page_layout' => array(
		'title' => esc_html__('Page Layout', 'magone'),
		'description' => esc_html__('Select suitable page layout options for your page.', 'magone'),
		'fields' => array(
			'sidebar_layout' => array(
				'label' => esc_html__('Sidebar Layout', 'magone'),
				'description' => esc_html__('You can select "Full Width" to manage sidebars by your columns in page builder', 'magone'),
				'type' => 'visual',
				'default' => '', 
				'choices' => array(		
					'' => '<img src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-default.png').'" title="'.  esc_attr__('Default', 'magone').'"/>',
					'full' => '<img src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_attr__('Full Width', 'magone').'"/>',
					'right' => '<img src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_attr__('Right Side', 'magone').'"/>',
					'left' => '<img src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_attr__('Left Side','magone').'"/>',
				)
			),
			'sidebar_name' => array(
				'label' => esc_html__('Sidebar Name', 'magone'),
				'description' => esc_html__('Only affect if your sidebar position has a sidebar.', 'magone'),
				'type' => 'sidebar',
				'defaut' => '',
				'choices' => array(
					'' => esc_html__('Default', 'magone')
				)
			),
			'content_layout' => array(
				'label' => esc_html__('Content Layout (Page Template)', 'magone'),
				'description' => esc_html__('If you want to show page builder layout, select "Content Only"', 'magone'),
				'type' => 'select',
				'default' => '', 
				'choices' => array(					
					'' => esc_html__('Post (Title and Content)', 'magone'),
					'content_only' => esc_html__('Builder (Content Only)', 'magone')
				)
			),
		) 
	),
	'extra_feature' => array(
		'title'   => esc_html__('Extra Data for Feature Box', 'magone'),
		'context' => 'side',
		'fields'  => array(
			'feature_video_url' => array(
				'label'       => esc_html__('Video / Audio Embedded Code', 'magone'),
				'description' => esc_html__('Use this emebedded code as feature box instead of using feature image. If Youtube or Vimeo, only URL is also OK', 'magone'),
				'type'        => 'textarea',
			),
			'feature_caption' => array(
				'label'       => esc_html__('Caption for Feature Box', 'magone'),
				'description' => esc_html__('This caption will be show on the bottom right conner of feature box (regardless image or video or audio)', 'magone'),
				'type'        => 'textarea',
			),
		)
	),
);

do_action('sneeit_setup_post_meta_box', $magone_post_meta_box_fields);

do_action('sneeit_review_system', array(
	/* meta box id, also using to save / get data 
	 * optional, default: post-review
	 */
	'id' => 'post-review', 
	
	'title' => esc_html__('Review / Rating Box', 'magone'), /* optional, title for meta box */
	'description' => esc_html__('Input your rating review', 'magone'), /* optional, description for meta box */
		
	'type' => array('star', 'point'), /* optional, default: array('start', 'point', 'percent')  */
	'post_type' => array('post'), /* optional, what post type will support the meta box, default :array('post', 'page')*/
	'context' => 'advance', /*optional, position of metabox (advance, side, normal), default: advance*/
	
	'support' => array('conclusion','visitor'),/*option, what extra features for rating feature, default: array('summary', 'conclusion', 'visitor' ) visitor is mean support visitor rating */
	
	'priority' => 'default', /*optional, order of metabox, default: default*/
	
	'display' => array(
		'hook' => 'magone_display_rating_hook', /* optional, must place hook inside post loop, default: end of the_content */
		'callback' => 'magone_display_rating_box', /*required: HTML review box at your hook*/
		
		/*modify template*/
		'class_star_bar' => '',
		'class_star_bar_top' => 'color',
		'class_star_bar_bottom' => '',
		
		'class_line_bar' => '',
		'class_line_bar_top' => 'bg',
		
		'class_average_value' => '',
		'class_average_value_text' => '',
		'class_average_value_canvas' => 'color',
		'class_average_value_star_bar' => '',
		'class_average_value_star_bar_top' => '',
		'class_average_value_star_bar_bottom' => '',
			
		'class_item' => '',
		'class_item_name' => '',
		'class_item_user' => '',
		'class_item_author' => '',
		'class_item_user_note' => '',
		
		/*text for translate*/
		'text_no_user_vote' => esc_html__('Have no any user vote', 'magone'),
		'text_n_user_votes' => esc_html__('%1$s user %2$s x %3$s', 'magone'),
		'text_vote' => esc_html__('vote', 'magone'),
		'text_votes' => esc_html__('votes', 'magone'),
		
		'text_click_line_rate' => esc_html__('Hover and click above bar to rate', 'magone'),
		'text_click_star_rate' => esc_html__('Hover and click above stars to rate', 'magone'),
		'text_rated' => esc_html__('You rated %s', 'magone'),			
		'text_will_rate' => esc_html__('You will rate %s', 'magone'),
		'text_submitting' => esc_html__('Submitting ...', 'magone'),
		'text_browser_not_support' => esc_html__('Your browser not support user rating', 'magone'),
		'text_server_not_response' => esc_html__('Server not response your rating', 'magone'),
		'text_server_not_accept' => esc_html__('Server not accept your rating', 'magone'),
		
		// backend
		'text_is_product_review' => esc_html__('Is product review?', 'magone'),
		'text_no' => esc_html__('No', 'magone'),
		'text_star' => esc_html__('Star', 'magone'),
		'text_point' => esc_html__('Point', 'magone'),
		'text_percent' => esc_html__('Percent', 'magone'),
		'text_add_star_criteria_for_product' => esc_html__('Add star criteria for this product', 'magone'),
		'text_add_point_criteria_for_product' => esc_html__('Add point criteria for this product', 'magone'),
		'text_add_percent_criteria_for_product' => esc_html__('Add percent criteria for this product', 'magone'),
		'text_criteria_name' => esc_html__('Criteria name', 'magone'),
		'text_criteria_value' => esc_html__('Criteria value', 'magone'),
		'text_1_star' => esc_html__('%s star', 'magone'),
		'text_n_stars' => esc_html__('%s stars', 'magone'),
		'text_n_stars' => esc_html__('%s stars', 'magone'),
		'text_add_new_criteria' => esc_html__('Add New Criteria', 'magone'),
		'text_input_summary' => esc_html__('Input Review Summary', 'magone'),
		'text_input_conclusion' => esc_html__('Input Review Conclusion', 'magone'),
		'text_allow_visitor' => esc_html__('Allow Visitor Review', 'magone'),
		
		'text_n_user_vote_x_score' => esc_html__('%1$s user %2$s x %3$s', 'magone'),
		
		/*decoration*/
		'star_icon' => '&#9733;', /*defaut: &#9733;*/
	)
));

function magone_display_rating_box($review) {	
?><div id="post-review" class="post-review shad"><?php
	?><div class="post-review-main"><?php
		?><div class="post-review-average"><?php
			echo $review['average'];			
			?><div class="clear"></div><?php
			?><div class="post-review-average-label"><?php
				esc_html_e('OVERALL SCORE', 'magone');
			?></div><?php
			?><div class="clear"></div><?php
		?></div><?php /* .post-review-average */ 

		?><div class="post-review-items"><div class="post-review-items-inner"><?php
			echo $review['items'];
			?><div class="clear"></div><?php
		?></div></div><?php
		
		?><div class="clear"></div><?php
	?></div><?php /* post-review-main */

	if ($review['conclusion']):
		?><div class="clear"></div><?php
		?><div class="post-review-conclusion"><?php
			echo $review['conclusion'];
		?></div><?php
	endif;
	?><div class="clear"></div><?php
?></div><?php
}
