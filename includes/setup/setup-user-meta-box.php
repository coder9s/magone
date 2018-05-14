<?php
global $magone_social_icon_list;
global $user_social_links_fields;
$user_social_links_fields = array();

// attach social icon to customizer declaration
foreach ($magone_social_icon_list as $key => $name) {
	$user_social_links_fields[$key] = array(
		'label' => $name,
		'description' => wp_kses(
			sprintf(__('Input %s Link', 'magone'), '<i class="fa fa-'.$key.'"></i>'),
			array(
				'i' => array('class'=>array())
			)
		)
	);
}



// user-meta-box without handle or action will call shortcode as default
do_action('sneeit_setup_user_meta_box', array(
	'author-social-links' => array(
		'title' => esc_html__('Author Social Links', 'magone'),		
		'fields' => $user_social_links_fields
	),
	
));

