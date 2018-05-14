<?php
global $MagOne_Article_Fields;

$MagOne_Shortcodes = array(
	'declarations' => array(
		'slides' => array(
			'title' => esc_html__('Slider Article Box', 'magone'), 
			'icon' => 'dashicons-slides', 
			'display_callback' => 'magone_shortcode_slider_display',
			'fields'  => $MagOne_Article_Fields['slider']
		),
		'sticky' => array(
			'title' => esc_html__('Sticky Article Box', 'magone'), 
			'icon' => 'dashicons-star-filled', 		
			'display_callback' => 'magone_shortcode_sticky_display', 
			'fields' => $MagOne_Article_Fields['sticky']
		),
		'complex' => array(
			'title' => esc_html__('Complex Article Box', 'magone'), 
			'icon' => 'dashicons-welcome-widgets-menus', 		
			'display_callback' => 'magone_shortcode_complex_display', 
			'fields' => $MagOne_Article_Fields['complex']
		),
		'one' => array(
			'title' => esc_html__('One Column Article Box', 'magone'), 
			'icon' => 'dashicons-archive', 		
			'display_callback' => 'magone_shortcode_one_display', 
			'fields' => $MagOne_Article_Fields['one']
		),
		'two' => array(
			'title' => esc_html__('Two Columns Article Box', 'magone'), 
			'icon' => 'fa-th-large ', 		
			'display_callback' => 'magone_shortcode_two_display', 
			'fields' => $MagOne_Article_Fields['two']
		),
		'three' => array(
			'title' => esc_html__('Three Columns Article Box', 'magone'), 
			'icon' => 'fa-th', 		
			'display_callback' => 'magone_shortcode_three_display', 
			'fields' => $MagOne_Article_Fields['three']
		),
		'carousel' => array(
			'title' => esc_html__('Carousel Article Box', 'magone'), 
			'icon' => 'dashicons-image-flip-horizontal', 		
			'display_callback' => 'magone_shortcode_carousel_display', 
			'fields' => $MagOne_Article_Fields['carousel']
		),
		'blogging' => array(
			'title' => esc_html__('Blogging Article Box', 'magone'), 
			'icon' => 'dashicons-feedback', 		
			'display_callback' => 'magone_shortcode_blogging_display', 
			'fields' => $MagOne_Article_Fields['blogging']
		),
		'simple_one' => array(
			'title' => esc_html__('Simple One Article Box', 'magone'), 
			'icon' => 'dashicons-align-center', 		
			'display_callback' => 'magone_shortcode_simple_one_display', 
			'fields' => $MagOne_Article_Fields['simple-one']
		),
		'ticker' => array(
			'title' => esc_html__('Ticker Article Box', 'magone'), 
			'icon' => 'dashicons-migrate', 		
			'display_callback' => 'magone_shortcode_ticker_display', 
			'fields' => $MagOne_Article_Fields['ticker']
		),
		'list' => array(
			'title' => esc_html__('List Article Box', 'magone'), 
			'icon' => 'fa-list', 		
			'display_callback' => 'magone_shortcode_list_display', 
			'fields' => $MagOne_Article_Fields['list']
		),
		'grid' => array(
			'title' => esc_html__('Grid Article Box', 'magone'), 
			'icon' => 'dashicons-schedule', 		
			'display_callback' => 'magone_shortcode_grid_display', 
			'fields' => $MagOne_Article_Fields['grid']
		),


		/*/////////////////////////////////////////////////*/
		'sidebar' => array(
			'display_callback' => 'magone_shortcode_sidebar_display',
			'icon' => 'dashicons-editor-table',
			'fields' => array(
				'id' => array(
					'label' => esc_html__('Select Sidebar', 'magone'), 
					'type' => 'sidebar', 
					'default' => 'sidebar'
				)
			)
		),
		
		// content shortcodes
		'dropcap' => array(
			'title' => esc_html__('Dropcap', 'magone'), 
			'display_callback' => 'magone_shortcode_dropcap_display',		
			'icon' => 'fa-adn'
		),
		'btn' => array(
			'title' => esc_html__('Button', 'magone'), 
			'display_callback' => 'magone_shortcode_button_display',
			'icon' => 'fa-square',
			'fields' => array(
				'url' => array(
					'label' => esc_html__('Button Link', 'magone'), 
					'type' => 'url', 
					'default' => ''
				),
				'text' => array(
					'label' => esc_html__('Button text', 'magone'), 
					'type' => 'content',
				),
				'text_color' => array(
					'label' => esc_html__('Text Color', 'magone'), 
					'type' => 'color', 
					'default' => '#000000'
				),
				'bg_color' => array(
					'label' => esc_html__('Background Color', 'magone'), 
					'type' => 'color', 
					'default' => '#ffffff'
				),
				'icon' => array(
					'label' => esc_html__('Button Icon', 'magone'), 				
					'description' => wp_kses(
						sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('http://fortawesome.github.io/Font-Awesome/icons/')),
						array(
							'a' => array(
								'href' => array(),
								'target' => array()
							)
						)
					)
				),
				'icon_position' => array(
					'label' => esc_html__('Button Icon Postion', 'magone'), 				
					'type' => 'select', 
					'default' => 'start',
					'choices' => array(
						'start' => esc_html__('At start of button', 'magone'),
						'end' => esc_html__('At end of button', 'magone'),
					)
				),
				'size' => array(
					'label' => esc_html__('Button Size', 'magone'),
					'type' => 'select', 
					'default' => '14',
					'choices' => array(
						'8' => esc_html__('Smallest', 'magone'),
						'10' => esc_html__('Small', 'magone'),
						'14' => esc_html__('Normal', 'magone'),
						'18' => esc_html__('Large', 'magone'),
						'24' => esc_html__('Largest', 'magone'),
					)
				),
				'id' => array(
					'label' => esc_html__('Button ID', 'magone')
				),
				'target' => array(
					'label' => esc_html__('Open in New Window', 'magone'),
					'type' => 'checkbox', 
					'default' => false
				),
			)
		),
		'message' => array(
			'title' => esc_html__('Message Box', 'magone'), 
			'display_callback' => 'magone_shortcode_message_display',
			'icon' => 'fa-bullhorn',
			'fields' => array(
				'title' => array(
					'label' => esc_html__('Title', 'magone'), 
				),
				'title_color' => array(
					'label' => esc_html__('Title Color', 'magone'), 
					'type' => 'color', 
					'default' => '#000000'
				),
				'title_bg' => array(
					'label' => esc_html__('Title Background Color', 'magone'), 
					'type' => 'color', 
					'default' => '#dddddd'
				),
				'title_icon' => array(
					'label' => esc_html__('Title Icon', 'magone'), 				
					'description' => wp_kses(
						sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('http://fortawesome.github.io/Font-Awesome/icons/')),
						array(
							'a' => array(
								'href' => array(),
								'target' => array()
							)
						)
					)
				),
				'message_content' => array(
					'label' => esc_html__('Content', 'magone'), 
					'type' => 'content',
				),
				'content_color' => array(
					'label' => esc_html__('Content Color', 'magone'), 
					'type' => 'color', 
					'default' => '#000000'
				),
				'content_bg' => array(
					'label' => esc_html__('Content Background Color', 'magone'), 
					'type' => 'color', 
					'default' => '#ffffff'
				),			
				'id' => array(
					'label' => esc_html__('Message Box ID', 'magone')
				)
			)
		),
		'tabs' => array(
			'title' => esc_html__('Tabs', 'magone'), 
			'display_callback' => 'magone_shortcode_tabs_display',
			'icon' => 'dashicons-index-card',
			'fields' => array(				
				'id' => array(
					'label' => esc_html__('ID of the whole tab box', 'magone')
				),
				'style' => array(
					'label' => esc_html__('Tab Design Style', 'magone'),
					'type' => 'select', 
					'choices' => array(
						'' => esc_html__('Horizontal', 'magone'),
						'v' => esc_html__('Verizontal', 'magone'),
					),
				),
			),
			'nested' => array(
				'tab' => array(
					'title' => esc_html__('Tab', 'magone'),
					'display_callback'  => 'magone_shortcode_tab_display',
					'fields' => array(
						'title' => array(
							'title' => esc_html__('Tab Title', 'magone'),
						),
						'tab_content' => array(
							'title' => esc_html__('Tab Content', 'magone'),
							'type' => 'content'
						)
					)
				)
			)
		),
		'accordions' => array(
			'title' => esc_html__('Accordions', 'magone'), 
			'display_callback' => 'magone_shortcode_accordions_display',
			'icon' => 'exerpt-view',
			'fields' => array(
				'id' => array(
					'label' => esc_html__('ID of the whole accordion box', 'magone')
				),
				'multiple_open' => array(
					'label' => esc_html__('Allow open multiple panels', 'magone'),
					'type' => 'checkbox',
					'default'  => false
				),
				'close_all' => array(
					'label' => esc_html__('Close all accordions at beginning', 'magone'),
					'type' => 'checkbox',
					'default'  => false
				)
			),
			'nested' => array(
				'accordion' => array(
					'title' => esc_html__('Accordion', 'magone'),
					'display_callback' => 'magone_shortcode_accordion_display',
					'fields' => array(
						'title' => array(
							'title' => esc_html__('Accordion Title', 'magone'),
						),
						'accordion_content' => array(
							'title' => esc_html__('Accordion Content', 'magone'),
							'type' => 'content'
						)
					)
				),				
			)
		),
		'lock' => array(
			'title' => esc_html__('Lock Content', 'magone'), 
			'display_callback' => 'magone_shortcode_lock_display',
			'icon' => 'dashicons-lock'
		),
		'text' => array(
			'title' => esc_html__('Text Content', 'magone'), 
			'display_callback' => 'magone_shortcode_text_display',
			'icon' => 'dashicons-media-text',
			'fields' => array(
				'text_format' => array(
					'title' => esc_html__('Not auto add format tags (p, shortcodes)', 'magone'),
					'type' => 'checkbox'
				),
				'text_content' => array(
					'title' => esc_html__('Your Content', 'magone'),
					'type' => 'content'
				)
			)
		),	
		'contact' => array(
			'title' => esc_html__('Contact', 'magone'), 
			'display_callback' => 'magone_shortcode_contact_display',
			'icon' => 'dashicons-email-alt',
			'fields' => array(	
				'target_email' => array(
					'label' => esc_html__('Target Email. Blank mean using Admin email', 'magone'),
					'type' => 'email'
				),
				'enable_url' => array(
					'label' => esc_html__('Enable URL field', 'magone'),
					'type' => 'checkbox',
					'default'  => false
				)
			)
		),
		
		'column' => array(
			'display_callback' => 'magone_shortcode_column_display',
			'fields' => array(
				'class' => array(
					'label' => esc_html__('Class', 'magone')
				),
				'width' => array(
					'label' => esc_html__('Column width in percent (%)', 'magone'), 
					'type' => 'number', 
					'default' => 100
				),
				'padding_left' => array(
					'label' => esc_html__('Inner Padding Left', 'magone'), 
					'description' => esc_html__('Add inner space from left of this column in pixels.', 'magone'),
					'type' => 'range', 
					'max' => 50,
					'default' => 0
				),
				'padding_right' => array(
					'label' => esc_html__('Inner Padding Right', 'magone'), 
					'description' => esc_html__('Add inner space from right of this column in pixels.', 'magone'),
					'type' => 'range', 
					'max' => 50,
					'default' => 0
				),
				'disable_responsive' => array(
					'label' => esc_html__('Disable Responsive', 'magone'), 
					'description' => esc_html__('Do not go full in mobile, keep it as what it is', 'magone'),
					'type' => 'checkbox', 
					'default' => false
				),
				'sticky_inside' => array(
					'label' => esc_html__('Sticky Inside Content', 'magone'), 
					'description' => esc_html__('Sticky inside content when mouse scrolling', 'magone'),
					'type' => 'checkbox', 
					'default' => false
				),
			)
		),
	)
);


do_action('sneeit_setup_shortcodes', $MagOne_Shortcodes);