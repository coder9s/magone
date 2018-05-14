<?php
do_action('sneeit_setup_menu_locations', array(	
	'top-menu' => esc_html__('Top Menu', 'magone'),
	'main-menu' => esc_html__('Main Menu', 'magone'),
));

// add extra menu fields
$magone_menu_fields = array(
	'enable_mega' => array(
		'label' => esc_html__('Enable Mega Menu', 'magone'),
		'type' => 'checkbox',
		'default' => false,
		'depth' => 0 /*display specific for depth level 0 */
	),
	'show_hide_for_users' => array(
		'label' => esc_html__('Show / Hide Menu for Users', 'magone'),
		'type' => 'select',
		'default' => '',
		'choices' => array(
			'' => esc_html__('Show for All Users', 'magone'),
			'logged-in' => esc_html__('Show for Logged in Users only', 'magone'),
			'logged-out' => esc_html__('Show for Logged out Users only', 'magone'),
		),
	),
	'color' => array(
		'label' => esc_html__('Menu Item Text Color', 'magone'),
		'type' => 'color'
	),
	'menu_icon' => array(
		'label' => wp_kses(
			sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('https://fortawesome.github.io/Font-Awesome/icons/')),
			array(
				'a' => array(
					'href' => array(),
					'target' => array()
				)
			)
		)
	),
);

do_action('sneeit_setup_menu_fields', $magone_menu_fields);

// class for mega content
add_filter( 'nav_menu_css_class', 'magone_nav_menu_css_class', 10, 4);
function magone_nav_menu_css_class($classes, $item, $args, $depth) {
	if (get_post_meta($item->ID, 'enable_mega', true) && $depth == 0) {
		array_push($classes, 'menu-item-mega');
		if ($item->object == 'category') {
			array_push($classes, 'menu-item-mega-label');
			array_push($classes, 'menu-item-mega-category');
		} else {
			array_push($classes, 'menu-item-mega-link');
		}
	}
	$show_hide_for_users  = get_post_meta($item->ID, 'show_hide_for_users', true);
	if ('logged-in' == $show_hide_for_users) {
		array_push($classes, 'menu-item-show-when-logged-in');
	}
	if ('logged-out' == $show_hide_for_users) {
		array_push($classes, 'menu-item-show-when-logged-out');
	}
	
	return $classes;
}


add_filter( 'nav_menu_link_attributes', 'magone_filter_function_name', 10, 3 );
function magone_filter_function_name( $atts, $item, $args) {
	if (get_post_meta($item->ID, 'enable_mega', true) && $item->object == 'category') {
		$atts['data-id'] = esc_attr($item->object_id);
	}
	if (get_post_meta($item->ID, 'menu_icon', true)) {
		$atts['data-icon'] = esc_attr(get_post_meta($item->ID, 'menu_icon', true));
	}
	if (get_post_meta($item->ID, 'color', true)) {
		if (!isset($atts['style'])) {
			$atts['style'] = '';
		}
		$atts['style'] .= esc_attr('color:'.get_post_meta($item->ID, 'color', true).';');
	}
    return $atts;
}