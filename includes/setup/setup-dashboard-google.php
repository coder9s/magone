<?php
if (function_exists('sneeit_framework') &&
/* since 2.8, we require sneeit 3.1 to work */
defined('SNEEIT_PLUGIN_VERSION') && version_compare(SNEEIT_PLUGIN_VERSION, '3.1', '>=') &&
is_admin()) :
	
	$magone_demo_declarations = array(
		'magone' => array(
			'name' => esc_html__('Mag One', 'magone'), 
			'screenshot' => MAGONE_THEME_URL_IMAGES .'/demo-screenshot-magone.jpg',
			'demo' => 'http://magone.sneeit.com',
			'files' => array(
				// database file
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekclBsM1Nyb2pNQkU&export=download',					

				// media structure
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVeka1lLaTZLNnF5cEU&export=download', 

				// media files
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekR3ZMNDhWUTR3T0k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekYktBMUtSOHdXaU0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVl85bkxnS3JNSk0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekTHJhcEN0ako1OUE&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekMTR0anVyTWRzR1k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVGNycW9kNVV6eG8&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekZ0lRaUpKV2VLTDA&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekd09CN2h2TU9tSzg&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekN3FYblQ0b29CYTQ&export=download',				
			)
		),
		'flatone' => array(
			'name' => esc_html__('Flat One', 'magone'), 
			'screenshot' => MAGONE_THEME_URL_IMAGES .'/demo-screenshot-flatone.jpg',
			'demo' => 'http://magone.sneeit.com/flatone',
			'files' => array(
				// database file
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekb3ZPdW5lajM0YmM&export=download',

				// media structure
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVeka1lLaTZLNnF5cEU&export=download', 

				// media files
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekR3ZMNDhWUTR3T0k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekYktBMUtSOHdXaU0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVl85bkxnS3JNSk0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekTHJhcEN0ako1OUE&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekMTR0anVyTWRzR1k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVGNycW9kNVV6eG8&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekZ0lRaUpKV2VLTDA&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekd09CN2h2TU9tSzg&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekN3FYblQ0b29CYTQ&export=download',
			)
		),
		'newsone' => array(
			'name' => esc_html__('News One', 'magone'), 
			'screenshot' => MAGONE_THEME_URL_IMAGES .'/demo-screenshot-newsone.jpg',
			'demo' => 'http://magone.sneeit.com/newsone',
			'files' => array(
				// database file
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVnZkTU1jdHU1UFk&export=download',

				// media structure
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVeka1lLaTZLNnF5cEU&export=download', 

				// media files
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekR3ZMNDhWUTR3T0k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekYktBMUtSOHdXaU0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVl85bkxnS3JNSk0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekTHJhcEN0ako1OUE&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekMTR0anVyTWRzR1k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVGNycW9kNVV6eG8&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekZ0lRaUpKV2VLTDA&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekd09CN2h2TU9tSzg&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekN3FYblQ0b29CYTQ&export=download',
			)
		),
		'sahione' => array(
			'name' => esc_html__('Sahi One', 'magone'), 
			'screenshot' => MAGONE_THEME_URL_IMAGES .'/demo-screenshot-sahione.jpg',
			'demo' => 'http://magone.sneeit.com/sahione',
			'files' => array(
				// database file
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekTjMzeHdlVkhoTUk&export=download',

				// media structure
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVeka1lLaTZLNnF5cEU&export=download', 

				// media files
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekR3ZMNDhWUTR3T0k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekYktBMUtSOHdXaU0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVl85bkxnS3JNSk0&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekTHJhcEN0ako1OUE&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekMTR0anVyTWRzR1k&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekVGNycW9kNVV6eG8&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekZ0lRaUpKV2VLTDA&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekd09CN2h2TU9tSzg&export=download',
				'https://docs.google.com/uc?authuser=0&id=0B6J4nBUXfVekN3FYblQ0b29CYTQ&export=download',
			)
		),		
	);
	

	$magone_demo_installer = array(
		'menu-title' => esc_html__('Demo Installation', 'magone'), 
		'page-title' => esc_html__('Demo Installation', 'magone'),
		'html-before' => '',
		'html-after' => '',
		'declarations' => $magone_demo_declarations,
	);
	do_action('sneeit_demo_installer', $magone_demo_installer);
	
	$magone_envato_theme_activation = array(
		'menu-title' => esc_html__('Theme Activation', 'magone'), 
		'page-title' => esc_html__('Theme Activation', 'magone'),
	);
	if ( ! apply_filters( 'sneeit_envato_theme_activation_check', 0 ) ) {
		$magone_envato_theme_activation['html-before'] 
			= esc_html__( 'After activating theme, you will get auto update feature!', 'magone' ); 		
	} else {
		$magone_envato_theme_activation['html-before'] 
			= esc_html__( 'You activated the theme successful!', 'magone' );
	}
	do_action('sneeit_envato_theme_activation', $magone_envato_theme_activation);
	do_action('sneeit_envato_theme_auto_update');
		
	do_action( 'sneeit_social_api_key_collector', array(
		'menu-title' => esc_html__('Social API Keys', 'magone'), 
		'page-title' => esc_html__('Social API Keys', 'magone'),
		'html-before' => '',
		'html-after' => '',
		'declarations' => array('youtube' => true),
	));
	
endif;