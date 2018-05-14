<?php
global $MagOne_Article_Common_Fields;
$archive_design_fields = array();
$archive_design_fields['archive_page_design_style'] = array(
	'label' => esc_html__('Archive Page Design Style', 'magone'), 
	'type' => 'select', 
	'default' => 'blogging',
	'choices' => array( 
		'blogging' => esc_html__('Blogging', 'magone'),
		'one' => esc_html__('One Column', 'magone'),					
		'two' => esc_html__('Two Columns', 'magone'),
		'three' => esc_html__('Three Columns', 'magone'),
		'list' => esc_html__('List', 'magone'),
	)
);

$archive_design_fields['archive_main_color'] = array(
	'label' => esc_html__('Archive Page Main Color', 'magone'), 
	'type' => 'color'
);
$archive_design_fields['show_comment'] = $MagOne_Article_Common_Fields['show_comment'];
$archive_design_fields['show_author'] = $MagOne_Article_Common_Fields['show_author'];
$archive_design_fields['show_date'] = $MagOne_Article_Common_Fields['show_date'];
$archive_design_fields['meta_item_order'] = $MagOne_Article_Common_Fields['meta_item_order'];
$archive_design_fields['number_cates'] = $MagOne_Article_Common_Fields['number_cates'];
$archive_design_fields['snippet_length'] = $MagOne_Article_Common_Fields['snippet_length'];
$archive_design_fields['thumbnail_height'] = $MagOne_Article_Common_Fields['thumbnail_height'];
$archive_design_fields['show_format_icon'] = $MagOne_Article_Common_Fields['show_format_icon'];
$archive_design_fields['thumb_bg_color'] = $MagOne_Article_Common_Fields['thumb_bg_color'];
$archive_design_fields['rainbow_thumb_bg'] = $MagOne_Article_Common_Fields['rainbow_thumb_bg'];


$box_width = get_theme_mod('box_width');
if (!$box_width || !is_numeric($box_width)) {
	$box_width = 0;
}
$box_width = (int) $box_width;
$max_logo_width = $box_width - 728 - 40;

global $customizer_declaration;
$customizer_declaration = array(
	'general' => array(
		'title'  => esc_html__('General Design', 'magone'),
		'icon' => 'admin-site',
		'settings' => array(			
			'box_width' => array(
				'label' => esc_html__('Box Width', 'magone'), 
				'description' => esc_html__('Site box width in pixels', 'magone'), 
				'type' => 'range', 
				'default' => 1010,
				'min'  => 700,
				'max'  => 3600,
				'step' => 10,
				'cssout' => '.m1-wrapper{width:%spx}'.($box_width? '.header-layout-logo-mid .td .blog-title, .header-layout-logo-top .td .blog-title{max-width:'.$max_logo_width.'px!important}':'')
			),
			'main_width' => array(
				'label' => esc_html__('Main Column Width', 'magone'), 
				'description' => esc_html__('Main content column width in PERCENT', 'magone'), 
				'type' => 'range', 
				'default' => 69,
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
				'cssout' => '#content{width:%s%}'
			),
			'side_width' => array(
				'label' => esc_html__('Sidebar Width', 'magone'), 
				'description' => esc_html__('Sidebar width in PERCENT', 'magone'), 
				'type' => 'range', 
				'default' => 31,
				'min'  => 10,
				'max'  => 50,
				'step' => 1,
				'cssout' => '.main-sidebar{width:%s%}'
			),
			'default_post_thumbnail' => array(
				'label' => esc_html__('Default Post Thumbnail', 'magone'),
				'description' => esc_html__('The image src that you want to use for non-thumbnail posts. Leave blank to use random images from internet.', 'magone'), 
				'type' => 'image', 
				'default' => 'https://lorempixel.com/640/300/'
			),
			'thubnail_rainbow_bg_set' => array(
				'label' => esc_html__('Thumbnail Rainbow Background Color Set', 'magone'), 
				'description' => esc_html__('The array of colors which will be use to random for rainbow thumbnail background of article widgets', 'magone'), 
				'default' => "'#292484,#DC4225', '#81AF59,#A83279', '#417711,#DC4225',  '#E0BE00,#FD340F', '#D38312,#002F4B', '#A83279,#292484', '#002F4B,#417711'", 
				
			),
			'disable_scroll_up' => array(
				'label' => esc_html__('Disable Scroll Up', 'magone'), 
				'description' => esc_html__('Disable Scroll Up / Jump Top button', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'disable_responsive'  => array(
				'label' => esc_html__('Disable Responsive', 'magone'), 
				'description' => esc_html__('Disable responsive style', 'magone'), 
				'type' => 'checkbox', 
				'default' => false				
			),
			'view_count_meta_key_name'  => array(
				'label' => esc_html__('View Count Meta Key Name', 'magone'), 
				'description' => esc_html__('Use this to input your own meta key name which use are using to record views for your site', 'magone'), 
				'default' => MAGONE_META_KEY_VIEWS
			),
		)
	),
	'styles' => array(
		'title' => esc_html__('Colors, Fonts, Backgrounds', 'magone'),
		'icon' => 'admin-customizer',
		'settings' => array(
			'main_color' => array(
				'label' => esc_html__('Main Color', 'magone'), 
				'type' => 'color', 
				'default' => '#FF3D00',
				'cssout' => 'a,a:hover,.color {color: %s;}.border {border-color: %s;}.bg {background-color: %s;}.main-menu {border-top: 1px solid %s;}.main-menu ul.sub-menu li:hover > a {border-left: 2px solid %s;}.main-menu .menu-item-mega > .menu-item-inner > .sub-menu {border-top: 2px solid %s;}.main-menu .menu-item-mega > .menu-item-inner > .sub-menu > li li:hover a {border-left: 1px solid %s;}.main-menu ul.sub-menu li:hover > a, .main-menu .menu-item-mega > .menu-item-inner > .sub-menu, .main-menu .menu-item-mega > .menu-item-inner > .sub-menu > li li:hover a {border-color: %s!important;}.header-social-icons ul li a:hover {color: %s;}.owl-dot.active,.main-sidebar .widget.follow-by-email .follow-by-email-submit {background: %s;}#footer .widget.social_icons li a:hover {color: %s;}#footer .follow-by-email .follow-by-email-submit, #mc_embed_signup .button, .wpcf7-form-control[type="submit"], .bbpress [type="submit"] {background: %s!important;}.feed.widget .feed-widget-header, .sneeit-percent-fill, .sneeit-percent-mask {border-color: %s;}.feed.widget.box-title h2.widget-title {background: %s;}.social_counter {color: %s}.social_counter .button {background: %s}'
			),
			'site_text_color' => array(
				'label' => esc_html__('Site Text Color', 'magone'),
				'type' => 'color',
				'default' => '#000000',
				'cssout' => 'body{color:%s}'
			),
			'site_background_color' => array(
				'label' => esc_html__('Site Background Color', 'magone'), 
				'type' => 'color', 
				'default' => '#efefef',
				'cssout' => 'body{background-color:%s}'
			),
			'wrapper_background_color' => array(
				'label' => esc_html__('Wrapper Box Background Color', 'magone'), 
				'type' => 'color', 
				'default' => '#efefef',
				'cssout' => '.m1-wrapper, a.comments-title.active{background:%s}'
			),
			'header_background_color' => array(
				'label' => esc_html__('Header Background Color', 'magone'), 
				'type' => 'color', 
				'default' => '#ffffff', 
				'cssout' => '.header-bg {background-color:%s;}'
			),
			'header_text_color' => array(
				'label' => esc_html__('Header Text Color', 'magone'), 
				'type' => 'color', 
				'default' => '#000000',
				'cssout' => '#header-content, #header-content span, #header-content a {color: %s}'
			),
			'top_menu_text_color' => array(
				'label' => esc_html__('Top Menu Text Color', 'magone'), 
				'type' => 'color', 
				'default' => '#777',
				'cssout' => '.top-menu > ul.menu > li > a{color:%s}'
			),
			'top_menu_text_hover_color' => array(
				'label' => esc_html__('Top Menu Text Color When Hover', 'magone'), 
				'type' => 'color', 
				'default' => '#000000',
				'cssout' => '.top-menu > ul.menu > li:hover > a{color:%s}'
			),
			'top_menu_font' => array(
				'label' => esc_html__('Top Menu Font', 'magone'), 
				'type' => 'font', 
				'default' => 'normal normal 12 Roboto',
				'cssout' => '.top-menu > ul.menu > li > a{font:%s}'
			),
			'main_menu_text_color' => array(
				'label' => esc_html__('Main Menu Text Color', 'magone'), 
				'type' => 'color', 
				'default' => '#777777',
				'cssout' => '.main-menu ul.menu > li > a{color:%s}'
			),
			'main_menu_text_hover_color' => array(
				'label' => esc_html__('Main Menu Text Color When Hover', 'magone'), 
				'type' => 'color', 
				'default' => '#000000',
				'cssout' => '.main-menu ul.menu > li:hover > a{color:%s}'
			),
			'main_menu_background_hover_color' => array(
				'label' => esc_html__('Main Menu Background Color When Hover', 'magone'), 
				'type' => 'color', 
				'default' => '#eee',
				'cssout' => '.main-menu ul.menu > li:hover > a{background:%s}'
			),
			'main_menu_background_color' => array(
				'label' => esc_html__('Main Menu Background Color', 'magone'), 
				'type' => 'color', 
				'default' => '#ffffff',
				'cssout' => '.main-menu {background:%s}'
			),
			'main_menu_current_background' => array(
				'label' => esc_html__('Main Menu Background Color of Current Item', 'magone'), 
				'type' => 'color', 
				'default' => '#ff3d00',
				'cssout' => '.main-menu ul.menu > li.current-menu-item > a {background: %s}'
			),
			'main_menu_current_text_color' => array(
				'label' => esc_html__('Main Menu Text Color of Current Item', 'magone'), 
				'type' => 'color', 
				'default' => '#ffffff',
				'cssout' => '.main-menu ul.menu > li.current-menu-item > a {color:%s}'
			),
			'main_menu_font' => array(
				'label' => esc_html__('Main Menu Font', 'magone'), 
				'type' => 'font', 
				'default' => 'normal normal 13 Roboto',
				'cssout' => '.main-menu > ul.menu > li > a{font:%s}'
			),
			'sub_menu_text_color' => array(
				'label' => esc_html__('Sub Menu Text Color', 'magone'), 
				'type' => 'color', 
				'default' => '#cccccc',
				'cssout' => '.main-menu ul.menu li ul.sub-menu li > a{color:%s}'
			),
			'sub_menu_text_hover_color' => array(
				'label' => esc_html__('Sub Menu Text Hover Color', 'magone'), 
				'type' => 'color', 
				'default' => '#ffffff',
				'cssout' => '.main-menu ul.menu li ul.sub-menu li:hover > a{color:%s}'
			),
			'sub_menu_background_color' => array(
				'label' => esc_html__('Sub Menu Background Color', 'magone'), 
				'type' => 'color', 
				'default' => '#333',
				'cssout' => '.main-menu ul.sub-menu,.main-menu .menu-item-mega-label .menu-item-inner{background:%s}'
			),
			'site_background_image' => array(
				'label' => esc_html__('Site Background Image', 'magone'), 
				'type' => 'image', 
				'default' => '',
				'cssout' => 'body{background-image:url(%s)}'
			),			
			'site_background_image_attachment' => array(
				'label' => esc_html__('Site Background Image Floating Type', 'magone'), 
				'type' => 'select', 
				'default' => 'scroll',
				'cssout' => 'body{background-attachment:%s}',
				'choices'	=>	array(
					'fixed'		=>	esc_html__('Fixed', 'magone'),
					'scroll'	=>	esc_html__('Scroll', 'magone'),
				)
			),
			'site_font' => array(
				'label' => esc_html__('Site Font', 'magone'),
				'type' => 'font',
				'default' => 'normal normal 14px "Roboto"',
				'cssout' => 'body{font:%s}'
			),
			'post_title_font' => array(
				'label' => esc_html__('Post / Article Title Font', 'magone'),
				'type' => 'font',
				'default' => 'normal normal 40px "Roboto"',
				'cssout' => 'h1.post-title{font:%s}'
			),			
			'post_title_color' => array(
				'label' => esc_html__('Post / Article Title Color', 'magone'), 
				'type' => 'color', 
				'default' => '#000',
				'cssout' => 'h1.post-title {color:%s}'
			),
			'post_subtitle_font' => array(
				'label' => esc_html__('Post / Article Sub-Title Font', 'magone'),
				'type' => 'font',
				'default' => 'normal bold 20px "Roboto"',
				'cssout' => '.post-sub-title-wrapper h2 {font:%s}'
			),			
			'post_subtitle_color' => array(
				'label' => esc_html__('Post / Article Sub-Title Color', 'magone'), 
				'type' => 'color', 
				'default' => '#000',
				'cssout' => '.post-sub-title-wrapper h2 {color:%s}'
			),
			'post_body_font' => array(
				'label' => esc_html__('Post / Article Body Font', 'magone'),
				'type' => 'font',
				'default' => 'normal normal 14px "Roboto"',
				'cssout' => '.post-body .post-body-inner {font:%s}'
			),
			'article_widget_title_font' => array(
				'label' => esc_html__('Article Widget Title Font', 'magone'),
				'type' => 'font',
				'default' => 'normal normal 20px "Roboto"',
				'cssout' => '.feed-widget-header .widget-title{font:%s}'
			),
			'article_widget_item_title_font' => array(
				'label' => esc_html__('Font Family for Article Widget Item Title', 'magone'),
				'type' => 'font-family',
				'default' => 'Roboto',
				'cssout' => '.feed.widget h3.item-title {font-family:%s}'
			),
			'sidebar_widget_title_font' => array(
				'label' => esc_html__('Sidebar Widget Font', 'magone'),
				'type' => 'font',
				'default' => 'normal normal 14px "Roboto"',
				'cssout' => '.main-sidebar .widget > h2, .main-sidebar .feed-widget-header, .main-sidebar .feed-widget-header h2{font:%s}'
			)
		)
	),
	'header' => array(
		'title' => esc_html__('Header', 'magone'),
		'icon' => 'welcome-learn-more',
		'settings' => array(
			'site_logo' => array(
				'label' => esc_html__('Site Logo Image', 'magone'),
				'type' => 'image'
			),
			'site_logo_retina' => array(
				'label' => esc_html__('Site Logo Image for Retina Screen', 'magone'),
				'type' => 'image'
			),
			'site_logo_width' => array(
				'label' => esc_html__('Site Logo Width in Pixel', 'magone'),
				'description' => esc_html__('Set to 0 to display auto width', 'magone'),
				'type' => 'number',
				'default' => 150,
				'cssout' => (get_theme_mod('site_logo_width', 150) == 0 ? '.blog-title img {width: auto}' : '.blog-title img {width: %spx}')
			),
			'site_logo_height' => array(
				'label' => esc_html__('Site Logo Height in Pixel', 'magone'),
				'description' => esc_html__('Set to 0 to display auto height', 'magone'),
				'type' => 'number',
				'default' => 30,
				'cssout' => (get_theme_mod('site_logo_height', 30) == 0 ? '.blog-title img {height: auto}' : '.blog-title img {height: %spx}')
			),
			'site_logo_width_mobile' => array(
				'label' => esc_html__('MOBILE Site Logo Width in Pixel', 'magone'),
				'description' => esc_html__('Set to 0 to display auto width', 'magone'),
				'type' => 'number',
				'default' => 150,
				'cssout' => (get_theme_mod('site_logo_width_mobile', 150) == 0 ? '@media screen and (max-width: 89-9px) {.blog-title img {width: auto}}' : '@media screen and (max-width: 899px) {.blog-title img {width: %spx}}')
			),
			'site_logo_height_mobile' => array(
				'label' => esc_html__('MOBILE Site Logo Height in Pixel  for MOBILE', 'magone'),
				'description' => esc_html__('Set to 0 to display auto height', 'magone'),
				'type' => 'number',
				'default' => 30,
				'cssout' => (get_theme_mod('site_logo_height_mobile', 30) == 0 ? '@media screen and (max-width: 899px) {.blog-title img {height: auto}}' : '@media screen and (max-width: 899px) {.blog-title img {height: %spx}}')			   ),
			'header_layout' => array(
				'label' => esc_html__('Header Layout', 'magone'),
				'type' => 'visual',
				'default' => 'default',
				'choices' => array(
					'default' => '<img src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/header-layout-default.png').'"/>',
					'logo-top' => '<img src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/header-layout-logo-top.png').'"/>',
					'logo-mid' => '<img src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/header-layout-logo-mid.png').'"/>',
				)
			),
			'header_full_width'  => array(
				'label' => esc_html__('Display Full Width Header', 'magone'), 
				'description' => esc_html__('Display header full width as screen width', 'magone'), 
				'type' => 'checkbox', 
				'default' => false				
			),
			'header_ads' => array(
				'label' => esc_html__('Header Desktop Ads', 'magone'),
				'type' => 'textarea',
				'default' => ''
			),
			'header_mobile_ads' => array(
				'label' => esc_html__('Header Mobile Ads', 'magone'),
				'type' => 'textarea',
				'default' => ''
			),			
			'hide_header_social_icons'  => array(
				'label' => esc_html__('Hide Header Social Icons', 'magone'), 
				'description' => esc_html__('Hide Social Icons from Header Bar', 'magone'), 
				'type' => 'checkbox', 
				'default' => false				
			),
			'hide_search_icon'  => array(
				'label' => esc_html__('Hide Search Icon', 'magone'), 
				'description' => esc_html__('Hide Social Icons from Header Bar', 'magone'), 
				'type' => 'checkbox', 
				'default' => false				
			),
		)
	),
	'social_links' => array(
		'title' => esc_html__('Social Links', 'magone'),
		'icon' => 'facebook-alt',
		'description' => esc_html__('Social Links for Header and Footer', 'magone'),
		'settings' => array(
		),		
	),
	
	/* SIDEBAR MANAGER */
	'sidebar' => array(
		'title' => esc_html__('Sidebar Manager', 'magone'),
		'icon' => 'dashicons-align-right',
		'sections' => array(
			'general-sidebar-settings' => array(
				'title' => esc_html__( 'General Sidebar Settings', 'magone' ),
				'settings' => array(
					'sticky_sidebar_delay'  => array(
						'label' => esc_html__('Sticky Sidebar Delay', 'magone'), 
						'description' => esc_html__('If you set to ZERO, all sticky sidebars will sticky instantly without animation', 'magone'),
						'type' => 'range',
						'default' => 200, 
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					),
				),
			), /*HOME sidebar*/
			
			'home-sidebar-manager' => array(
				'title' => esc_html__( 'Home / Front Page Sidebar', 'magone' ),
				'settings' => array(
					'home_top_page_sidebar'  => array(
						'label' => esc_html__('Home Top Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very top of home page.', 'magone'),
						'type' => 'sidebar',
						'default' => 'top-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'home_header_sidebar'  => array(
						'label' => esc_html__('Home Header Wide Sidebar', 'magone'), 
						'description' => esc_html__('Select Header Wide Sidebar for Home.', 'magone'),
						'type' => 'sidebar',
						'default' => 'header-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'home_before_content_sidebar'  => array(
						'label' => esc_html__('Home Before Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar before content area.', 'magone'),
						'type' => 'sidebar',
						'default' => '', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'home_after_content_sidebar'  => array(
						'label' => esc_html__('Home After Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar after content area.', 'magone'),
						'type' => 'sidebar',
						'default' => '', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'sidebar_layout' => array(
						'label' => esc_html__('Home Main Sidebar Layout', 'magone'), 
						'description' => esc_html__('Choose Main Sidebar Layout for Home Page', 'magone'),
						'type' => 'visual', 
						'default' => 'right', 
						'choices' => array(					
							'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
							'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
							'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
						)
					),
					'sticky_sidebar'  => array(
						'label' => esc_html__('Home Sticky Sidebar', 'magone'), 
						'description' => esc_html__('Check This to Enable Sticky Sidebar for Home', 'magone'),
						'type' => 'checkbox',
						'default' => 'on',
						'show' => array(
							array('sidebar_layout', '==', 'right'),
							'||',
							array('sidebar_layout', '==', 'left'),
						),
					),
					'home_sidebar'  => array(
						'label' => esc_html__('Home Main Sidebar Name', 'magone'), 
						'description' => esc_html__('Select Main Sidebar for Home.', 'magone'),
						'type' => 'sidebar',
						'default' => 'sidebar', 
						'show' => array(
							array('sidebar_layout', '!=', 'full'),							
						),
					),					
					'home_footer_sidebar'  => array(
						'label' => esc_html__('Home Footer Sidebar', 'magone'), 
						'description' => esc_html__('Select Footer Wide Sidebar for Home.', 'magone'),
						'type' => 'sidebar',
						'default' => 'footer-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'home_bottom_page_sidebar'  => array(
						'label' => esc_html__('Home Bottom Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very bottom of home page', 'magone'),
						'type' => 'sidebar',
						'default' => 'bottom-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
				),
			), /*HOME sidebar*/
			
			'article-sidebar-manager' => array(
				'title' => esc_html__( 'Article / Post Sidebar', 'magone' ),
				'settings' => array(
					'article_top_page_sidebar'  => array(
						'label' => esc_html__('Article / Post Top Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very top of article / post', 'magone'),
						'type' => 'sidebar',
						'default' => 'top-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'article_header_sidebar'  => array(
						'label' => esc_html__('Article / Post Header Wide Sidebar', 'magone'), 
						'description' => esc_html__('Select Header Wide Sidebar for Articles / Posts.', 'magone'),
						'type' => 'sidebar',
						'default' => 'header-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'article_before_content_sidebar'  => array(
						'label' => esc_html__('Article / Post Before Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar before content area.', 'magone'),
						'type' => 'sidebar',
						'default' => 'before-content', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'article_after_content_sidebar'  => array(
						'label' => esc_html__('Article / Post After Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar after content area.', 'magone'),
						'type' => 'sidebar',
						'default' => 'after-content', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'article_sidebar_layout' => array(
						'label' => esc_html__('Article / Post Main Sidebar Layout', 'magone'), 
						'description' => esc_html__('Choose Main Sidebar Layout for Article / Post', 'magone'),
						'type' => 'visual', 
						'default' => 'right', 
						'choices' => array(					
							'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
							'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
							'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
						)
					),					
					'article_sticky_sidebar'  => array(
						'label' => esc_html__('Article / Post Sticky Sidebar', 'magone'), 
						'description' => esc_html__('Check This to Enable Sticky Sidebar for Article / Post', 'magone'),
						'type' => 'checkbox',
						'default' => 'on',
						'show' => array(
							array('article_sidebar_layout', '!=', 'full'),
						),
					),
					'article_sidebar'  => array(
						'label' => esc_html__('Article / Post Main Sidebar', 'magone'), 
						'description' => esc_html__('Select Main Sidebar for Articles / Posts.', 'magone'),
						'type' => 'sidebar',
						'default' => 'sidebar', 
						'show' => array(
							array('article_sidebar_layout', '!=', 'full'),
						),
					),
					'article_footer_sidebar'  => array(
						'label' => esc_html__('Article / Post Footer Sidebar', 'magone'), 
						'description' => esc_html__('Select Footer Wide Sidebar for Articles / Posts.', 'magone'),
						'type' => 'sidebar',
						'default' => 'footer-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'article_bottom_page_sidebar'  => array(
						'label' => esc_html__('Article / Post Bottom Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very bottom of Articles / Posts', 'magone'),
						'type' => 'sidebar',
						'default' => 'bottom-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
				),
			), /* ARTICLE sidebar */
			
			
			'page-sidebar-manager' => array(
				'title' => esc_html__( 'Static Page Sidebar', 'magone' ),
				'settings' => array(
					'page_top_page_sidebar'  => array(
						'label' => esc_html__('Static Page Top Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very top of static page.', 'magone'),
						'type' => 'sidebar',
						'default' => 'top-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'page_header_sidebar'  => array(
						'label' => esc_html__('Static Page Header Sidebar', 'magone'), 
						'description' => esc_html__('Select Header Wide Sidebar for Static Pages.', 'magone'),
						'type' => 'sidebar',
						'default' => 'header-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'page_before_content_sidebar'  => array(
						'label' => esc_html__('Static Page Before Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar before content area.', 'magone'),
						'type' => 'sidebar',
						'default' => '', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'page_after_content_sidebar'  => array(
						'label' => esc_html__('Static Page After Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar after content area.', 'magone'),
						'type' => 'sidebar',
						'default' => '', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'page_sidebar_layout' => array(
						'label' => esc_html__('Static Page Main Sidebar Layout', 'magone'), 
						'description' => esc_html__('Choose Main Sidebar Layout for Static Page', 'magone'),
						'type' => 'visual', 
						'default' => 'right', 
						'choices' => array(					
							'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
							'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
							'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
						)
					),
					'page_sticky_sidebar'  => array(
						'label' => esc_html__('Static Page Sticky Sidebar', 'magone'), 
						'description' => esc_html__('Check This to Enable Sticky Sidebar for Static Page', 'magone'),
						'type' => 'checkbox',
						'default' => 'on',
						'show' => array(
							array('page_sidebar_layout', '!=', 'full'),
						),
					),
					'page_sidebar'  => array(
						'label' => esc_html__('Static Page Main Sidebar', 'magone'), 
						'description' => esc_html__('Select Main Sidebar for Static Page', 'magone'),
						'type' => 'sidebar',
						'default' => 'sidebar', 
						'show' => array(
							array('page_sidebar_layout', '!=', 'full'),
						),
					),
					'page_footer_sidebar'  => array(
						'label' => esc_html__('Static Page Footer Sidebar', 'magone'), 
						'description' => esc_html__('Select Footer Wide Sidebar for Static Page', 'magone'),
						'type' => 'sidebar',
						'default' => 'footer-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						),
					),
					'page_bottom_page_sidebar'  => array(
						'label' => esc_html__('Static Page Bottom Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very bottom of Static Page', 'magone'),
						'type' => 'sidebar',
						'default' => 'bottom-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
				),
			), /*STATIC PAGE sidebar*/
			
			'archive-sidebar-manager' => array(
				'title' => esc_html__( 'Archive Page Sidebar', 'magone' ),
				'settings' => array(
					'archive_top_page_sidebar'  => array(
						'label' => esc_html__('Archive Top Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very top of archive page.', 'magone'),
						'type' => 'sidebar',
						'default' => 'top-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'archive_header_sidebar'  => array(
						'label' => esc_html__('Archive Page Header Sidebar', 'magone'), 
						'description' => esc_html__('Select Header Wide Sidebar for Archive Pages.', 'magone'),
						'type' => 'sidebar',
						'default' => 'header-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						),
					),
					'archive_before_content_sidebar'  => array(
						'label' => esc_html__('Archive Before Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar before content area.', 'magone'),
						'type' => 'sidebar',
						'default' => '', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'archive_after_content_sidebar'  => array(
						'label' => esc_html__('Archive After Content Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar after content area.', 'magone'),
						'type' => 'sidebar',
						'default' => '', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'archive_sidebar_layout' => array(
						'label' => esc_html__('Archive Page Main Sidebar Layout', 'magone'), 
						'description' => esc_html__('Choose Main Sidebar Layout for Archive Page', 'magone'),
						'type' => 'visual', 
						'default' => 'right', 
						'choices' => array(					
							'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
							'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
							'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
						),
					),
					'archive_sticky_sidebar'  => array(
						'label' => esc_html__('Archive Page Sticky Sidebar', 'magone'), 
						'description' => esc_html__('Check This to Enable Sticky Sidebar for Archive Page', 'magone'),
						'type' => 'checkbox',
						'default' => 'on',
						'show' => array(
							array('archive_sidebar_layout', '!=', 'full'),
						),
					),
					'archive_sidebar'  => array(
						'label' => esc_html__('Archive Page Main Sidebar', 'magone'), 
						'description' => esc_html__('Select Main Sidebar for Archive Pages.', 'magone'),
						'type' => 'sidebar',
						'default' => 'sidebar', 
						'show' => array(
							array('archive_sidebar_layout', '!=', 'full'),
						),
					),
					'archive_footer_sidebar'  => array(
						'label' => esc_html__('Archive Page Footer Sidebar', 'magone'), 
						'description' => esc_html__('Select Footer Wide Sidebar for Archive Pages.', 'magone'),
						'type' => 'sidebar',
						'default' => 'footer-wide', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
					'archive_bottom_page_sidebar'  => array(
						'label' => esc_html__('Archive Bottom Page Sidebar', 'magone'), 
						'description' => esc_html__('The sidebar at very bottom of archive page', 'magone'),
						'type' => 'sidebar',
						'default' => 'bottom-page', 
						'choices' => array(
							'' => esc_html__('None / Disable', 'magone')
						)
					),
				)
			), /* ARCHIVE sidebar*/			
		),
		
	),
	'post_content' => array(
		'title' => esc_html__('Post Content', 'magone'), 
		'icon' => 'dashicons-welcome-write-blog',
		'settings' => array(
			'date_format' => array(
				'label' => esc_html__('Date Format', 'magone'), 
				'description' => wp_kses(
					__('You can read about <a target="_blank" href="https://github.com/phstc/jquery-dateFormat#date-and-time-patterns">Date - Time Pattern</a> for more information', 'magone'), 
					array(
						'a' => array(
							'href' => array(),
							'target' => array() 
						)
					)
				),
				'default' => 'MMM dd, yyyy'
			),			
			'feature_image_position' => array(
				'label' => esc_html__('Feature Image Position', 'magone'), 
				'description' => esc_html__('Choose position for feature image or disable it', 'magone'), 
				'type' => 'select', 
				'default' => 'above-title',
				'choices' => array( 
					'disable' => esc_html__('Disable', 'magone'),
					'above-title' => esc_html__('Above Post Title', 'magone'),
					'under-title' => esc_html__('Under Post Title', 'magone'),					
				)
			),			
			'disable_breadcrumb' => array(
				'label' => esc_html__('Disable Breadcrumb', 'magone'), 
				'description' => esc_html__('Check this if you don\'t want show breadcrumb', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'enable_top_share_buttons' => array(
				'label' => esc_html__('Enable Top Share Buttons', 'magone'), 
				'description' => esc_html__('Show share buttons underneath the title', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'disable_sub_title' => array(
				'label' => esc_html__('Disable SubTitle', 'magone'), 
				'description' => esc_html__('Disable subtitle in articles and static pages', 'magone'), 
				'type' => 'checkbox', 
				'default' => true
			),
			'article_show_author' => array(
				'label' => esc_html__('Show Author Meta', 'magone'), 
				'description' => esc_html__('Show / hide author name under post title', 'magone'),
				'type' => 'select', 
				'default' => 'icon',
				'choices' => array(
					'none' => esc_html__('Not show', 'magone'), 
					'name' => esc_html__('Show name only', 'magone'), 
					'icon' => esc_html__('Show name with icon', 'magone'), 
					'avatar' => esc_html__('Show name with avatar', 'magone')
				),
			),
			'article_show_date' => array(
				'label' => esc_html__('Show Date Meta', 'magone'), 
				'description' => esc_html__('Show / hide date / time under post title', 'magone'),
				'type' => 'select', 
				'default' => 'full',
				'choices' => array(
					'none' => esc_html__('Not Show', 'magone'), 
					'full' => esc_html__('Date and Time', 'magone'), 
					'date' => esc_html__('Only Date', 'magone'), 
					'time' => esc_html__('Only Time', 'magone'), 
					'short' => esc_html__('Short Date Time', 'magone'), 
					'pretty' => esc_html__('Pretty Date Time', 'magone')
				)
			),
			'article_meta_item_order' => array(
				'label' => esc_html__('Meta Item Order', 'magone'), 
				'description' => esc_html__('Pick order for meta items: comment, date, author', 'magone'),
				'type' => 'select', 
				'default' => 'a_c_d',
				'choices' => array(
					'c_d_a' => esc_html__('Comment - Date - Author', 'magone'), 
					'c_a_d' => esc_html__('Comment - Author - Date', 'magone'), 
					'a_c_d' => esc_html__('Author - Comment - Date', 'magone'), 
					'a_d_c' => esc_html__('Author - Date - Comment', 'magone'), 
					'd_a_c' => esc_html__('Date - Author - Comment', 'magone'), 
					'd_c_a' => esc_html__('Date - Comment - Author', 'magone'), 					
				)
			),
			'post_ads_code' => array(
				'label' => esc_html__('Post Ads Code Top', 'magone'), 
				'description' => esc_html__('Use this code to show ads on top left of post content.', 'magone'), 
				'type' => 'textarea'
			),
			'post_ads_code_bottom' => array(
				'label' => esc_html__('Post Ads Code Bottom', 'magone'), 
				'description' => esc_html__('Use this code to show ads on bottom left of post content.', 'magone'), 
				'type' => 'textarea'
			),
			'hide_post_excerpt' => array(
				'label' => esc_html__('Hide Post Excerpt', 'magone'), 
				'description' => esc_html__('Hide post excerpt (description) of articles even you inputed when editing the articles', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'disable_auto_excerpt' => array(
				'label' => esc_html__('Disable Auto Excerpt', 'magone'), 
				'description' => esc_html__('Hide excerpt if author did not input, instead of showing auto snippet', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'number_break_links' => array(
				'label' => esc_html__('Number Breaklinks Top', 'magone'), 
				'description' => esc_html__('Maxiumn Number break-links will show in articles above content', 'magone'), 
				'type' => 'select', 
				'default' => 3,
				'choices' => array( 
					'' => esc_html__('Disable', 'magone'),
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'				
				)
			),
			'number_break_links_more' => array(
				'label' => esc_html__('Number Breaklinks Read More', 'magone'), 
				'description' => esc_html__('Maxiumn Number break-links will show in articles after readmore break', 'magone'), 
				'type' => 'select', 
				'default' => '',
				'choices' => array( 
					'' => esc_html__('Disable', 'magone'),
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'				
				)
			),
			'number_break_links_bottom' => array(
				'label' => esc_html__('Number Breaklinks Bottom', 'magone'), 
				'description' => esc_html__('Maxiumn Number break-links will show in articles after content', 'magone'), 
				'type' => 'select', 
				'default' => '',
				'choices' => array( 
					'' => esc_html__('Disable', 'magone'),
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'				
				)
			),
			'display_cate_tag' => array(
				'label' => esc_html__('Categories & Tags', 'magone'), 
				'description' => esc_html__('Show / hide category and tag list in post footer', 'magone'), 
				'type' => 'select', 
				'default' => 'both',
				'choices' => array( 
					'hide' => esc_html__('Hide all', 'magone'),
					'cates' => esc_html__('Only Categories', 'magone'),
					'tags' => esc_html__('Only Tags', 'magone'),
					'both' => esc_html__('Categories & Tags', 'magone'),
				)
			),
			'number_related_posts' => array(
				'label' => esc_html__('Number Related Posts', 'magone'), 
				'description' => esc_html__('Number related posts will show in Recommend Box', 'magone'), 
				'type' => 'select', 
				'default' => 2,
				'choices' => array( 
					'' => esc_html__('Disable', 'magone'),
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'				
				)
			),
			'disable_next_prev_pager' => array(
				'label' => esc_html__('Disable Next / Previous', 'magone'), 
				'description' => esc_html__('Disable Next / Previous Buttons in Article Footer', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'disable_bottom_share_buttons' => array(
				'label' => esc_html__('Disable Bottom Share Buttons', 'magone'), 
				'description' => esc_html__('Disable share buttons at the bottom of post', 'magone'), 
				'type' => 'checkbox',
				'default' => false
			),
			'custom_sharing_button_code' => array(
				'label' => esc_html__('Custom Sharing Button Code', 'magone'), 
				'description' => esc_html__('Use this custom sharing button code instead of default. Leave blank to use default sharing buttons.', 'magone'), 
				'type' => 'textarea'
			),
			'disable_author_box' => array(
				'label' => esc_html__('Disable Author Box', 'magone'), 
				'description' => esc_html__('Check this if you don\'t want show author box', 'magone'), 
				'type' => 'checkbox',
				'default' => false
			),
		)
	),
	'comment' => array(
		'title' => esc_html__('Comment Systems', 'magone'),
		'icon' => 'dashicons-admin-comments',
		'settings' => array(
			'primary_comment_system' => array(
				'label' => esc_html__('Primary Comment System', 'magone'), 
				'description' => esc_html__('Set primary for a comment system to priority showing that system first', 'magone'), 
				'type' => 'select', 
				'default' => 'wordpress',
				'choices' => array( 
					'wordpress' => 'WordPress',
					'facebook' => 'Facebook',
					'disqus' => 'Disqus'
				)
			),
			'disable_wordpress_comment' => array(
				'label' => esc_html__('Disable WordPress Comment', 'magone'), 
				'description' => esc_html__('Now show WordPress comment system on all pages', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'disable_facebook_comment' => array(
				'label' => esc_html__('Disable Facebook Comment', 'magone'), 
				'description' => esc_html__('Now show Facebook comment system on all pages', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			'disable_disqus_comment' => array(
				'label' => esc_html__('Disable Disqus Comment', 'magone'), 
				'description' => esc_html__('Now show Disqus comment system on all pages', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),
			
			'facebook_comment_app_id' => array(
				'label' => esc_html__('Facebook APP ID for Comment System', 'magone'), 
				'description' => esc_html__('You must use your own APP ID to moderate comments.', 'magone'), 
				'type' => 'number', 
				'default' => '403849583055028'
			),
			'disqus_short_name' => array(
				'label' => esc_html__('Disqus Short Name', 'magone'), 
				'description' => esc_html__('Use must use your own Disqus Short Name to moderate comments.', 'magone'), 
				'default' => 'magonetemplate'
			),
			'disable_wordpress_comment_url' => array(
				'label' => esc_html__('Disable WordPress Comment URL', 'magone'), 
				'description' => esc_html__('Not show the comment URL in comment field', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),			
			'disable_wordpress_comment_media' => array(
				'label' => esc_html__('Disable WordPress Comment Media', 'magone'), 
				'description' => esc_html__('Not auto convert image URL to real image HTML tag', 'magone'), 
				'type' => 'checkbox', 
				'default' => false
			),			
		)
	),
	'archive' => array(
		'title' => esc_html__('Archive Page Designs', 'magone'),
		'icon' => 'dashicons-admin-page',
		'description' => esc_html__('Configure Archive Page Designs (Index, Category, Search, Author, ...)', 'magone'), 
		'settings' => $archive_design_fields
	),
	'footer' => array(
		'title' => esc_html__('Footer', 'magone'),
		'icon' => 'fa-paw',
		'description' => esc_html__('Configure settings for site footer', 'magone'), 
		'settings' => array(
			'copyright_1' => array(
				'label' => esc_html__('Footer Copyright Line 1', 'magone'),
				'default' => ('&copy; '.date('Y').' ' . get_bloginfo('blogname') . '. All rights reserved.')
			),
			'copyright_2' => array(
				'label' => esc_html__('Footer Copyright Line 2', 'magone'),
				'default' => 'Designed by <a href="https://themeforest.net/item/magone-responsive-magazine-news-wordpress-theme/14342350?ref=tiennguyenvan">MagOne</a>'
			)
		)
	),
	'custom_code' => array(
		'title' => esc_html__('Custom Code', 'magone'),
		'icon' => 'dashicons-editor-code',
		'description' => esc_html__('Add your custom HTML / JAVASCRIPT / CSS code', 'magone'), 
		'settings' => array(
			'head_html' => array(
				'label' => esc_html__('HTML in Head', 'magone'),
				'description' => esc_html__('Insert your HTML code before "head" tag', 'magone'),
				'type' => 'textarea'
			),
			'head_js' => array(
				'label' => esc_html__('JavaScript in Head', 'magone'),
				'description' => esc_html__("Insert your JavaScript code before 'head' tag. Don't add 'javascript' tag in code, the tag will be generate automatically", 'magone'),
				'type' => 'textarea'
			),
			'head_css' => array(
				'label' => esc_html__('Style CSS in Head', 'magone'),
				'description' => esc_html__("Insert your CSS code before 'head' tag. Don't add 'style' tag in code, the tag will be generate automatically", 'magone'),
				'type' => 'textarea'
			),
			'footer_html' => array(
				'label' => esc_html__('HTML in Footer', 'magone'),
				'description' => esc_html__('Insert your HTML code before close of "body" tag', 'magone'),
				'type' => 'textarea'
			),
			'footer_js' => array(
				'label' => esc_html__('JavaScript code in Footer', 'magone'),
				'description' => esc_html__("Insert your JavaScript code before close of 'body' tag. Don't add 'javascript' tag in code, the tag will be generate automatically", 'magone'),
				'type' => 'textarea'
			),
			'footer_css' => array(
				'label' => esc_html__('Style CSS code in Footer', 'magone'),
				'description' => esc_html__("Insert your CSS code before close of 'body' tag. Don't add 'style' tag in code, the tag will be generate automatically", 'magone'),
				'type' => 'textarea'
			),
		)
	),
	'site_performance' => array(
		'title' => esc_html__('Site Performance', 'magone'),
		'icon' => 'dashicons-clock',
		'description' => esc_html__('Increase your site performance', 'magone'), 
		'settings' => array(
			'serve-scaled-images' => array(
				'label' => esc_html__('Serve Scaled Images', 'magone'), 
				'description' => wp_kses(__('Use smaller image size for faster speed, but a bit blur. You will need to use <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails Plugin</a> to generate more image versions, may be, your hosting will be out of resource.', 'magone'), array(
					'a' => array(
						'href'=>array(),
						'target'=>array(),
					)
				)), 
				'type' => 'checkbox', 
				'default' => false
			),
			'remove-query-strings' => array(
				'label' => esc_html__('Remove Query Strings From Static Resources', 'magone'), 
				'description' => esc_html__('Remove version queries in JavaScript and CSS resource, but when updating theme, the update will come to readers late a bit because their browser caches.', 'magone'),
				'type' => 'checkbox', 
				'default' => false
			),
			'minify-css-js' => array(
				'label' => esc_html__('Minify CSS and JavaScript', 'magone'), 
				'description' => esc_html__('Use compressed version of CSS and JavaScript for loading faster.', 'magone'),
				'type' => 'checkbox', 
				'default' => false
			),
		)
	),
	
	'nav_menus' => array(
		'title' => esc_html__('Menus', 'magone'),
		'icon' => 'fa-bars',
		'sections' => array(
			'nav_menu_design' => array(				
				'title' => esc_html__('Menu Design', 'magone'),
				'settings' => array(
					'sticky_menu' => array(
						'label' => esc_html__('Sticky Menu', 'magone'),
						'description' => esc_html__('Choose Sticky Menu Mode', 'magone'),
						'type' => 'select', 
						'default' => 'up',
						'choices' => array( 
							'disable' => 'Disable',
							'up' => 'Up',
							'down' => 'Down',
							'always' => 'Always'
						)
					),
					'sticky_menu_logo' => array(
						'label' => esc_html__('Sticky Menu Logo', 'magone'),
						'description' => esc_html__('Choose Image Logo to Show in Sticky Menu Mode. Max height 32px', 'magone'),
						'type' => 'image'						
					),
					'sticky_menu_logo_retina' => array(
						'label' => esc_html__('Sticky Menu Logo for Retina Screens', 'magone'),
						'description' => esc_html__('Choose Image Logo to Show in Sticky Menu Mode for Retna Screens. Max height 32px', 'magone'),
						'type' => 'image'					
					),
				)
			)
		)		
	)
); /* end $customizer_declaration */

if ( function_exists( 'is_woocommerce' ) ) {
	
	/* add sidebar manager for woocommerce */
	$woocommerce_header_sidebar_customizer = array(
		'shop-sidebar-manager' => array(
			'title' => esc_html__( 'Shop Sidebar', 'magone' ),
			'settings' => array(
				'shop_top_page_sidebar'  => array(
					'label' => esc_html__('Shop Top Page Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar at very top of shop page.', 'magone'),
					'type' => 'sidebar',
					'default' => 'top-page', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'shop_header_sidebar'  => array(
					'label' => esc_html__('Shop Header Sidebar', 'magone'), 
					'description' => esc_html__('Select Header Wide Sidebar for Shop Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'header-wide', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					),
				),
				'shop_before_content_sidebar'  => array(
					'label' => esc_html__('Shop Before Content Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar before content area.', 'magone'),
					'type' => 'sidebar',
					'default' => '', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'shop_after_content_sidebar'  => array(
					'label' => esc_html__('Shop After Content Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar after content area.', 'magone'),
					'type' => 'sidebar',
					'default' => '', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'shop_sidebar_layout' => array(
					'label' => esc_html__('Shop Main Sidebar Layout', 'magone'), 
					'description' => esc_html__('Choose Main Sidebar Layout for Shop Page', 'magone'),
					'type' => 'visual', 
					'default' => 'right', 
					'choices' => array(					
						'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
						'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
						'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
					),
				),
				'shop_sticky_sidebar'  => array(
					'label' => esc_html__('Shop Sticky Sidebar', 'magone'), 
					'description' => esc_html__('Check This to Enable Sticky Sidebar for Shop Page', 'magone'),
					'type' => 'checkbox',
					'default' => 'on',
					'show' => array(
						array('shop_sidebar_layout', '!=', 'full'),
					),
				),
				'shop_sidebar'  => array(
					'label' => esc_html__('Shop Main Sidebar', 'magone'), 
					'description' => esc_html__('Select Main Sidebar for Shop Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'sidebar', 
					'show' => array(
						array('shop_sidebar_layout', '!=', 'full'),
					),
				),
				'shop_footer_sidebar'  => array(
					'label' => esc_html__('Shop Footer Sidebar', 'magone'), 
					'description' => esc_html__('Select Footer Wide Sidebar for Shop Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'footer-wide', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					),
				),
				'shop_bottom_page_sidebar'  => array(
					'label' => esc_html__('Shop Bottom Page Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar at very bottom of shop page', 'magone'),
					'type' => 'sidebar',
					'default' => 'bottom-page', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
			)
		), /* SHOP sidebar*/
		
		'product-sidebar-manager' => array(
			'title' => esc_html__( 'Product Sidebar', 'magone' ),
			'settings' => array(
				'product_top_page_sidebar'  => array(
					'label' => esc_html__('Product Top Page Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar at very top of product page.', 'magone'),
					'type' => 'sidebar',
					'default' => 'top-page', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'product_header_sidebar'  => array(
					'label' => esc_html__('Product Header Sidebar', 'magone'), 
					'description' => esc_html__('Select Header Wide Sidebar for Product Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'header-wide', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					),
				),
				'product_before_content_sidebar'  => array(
					'label' => esc_html__('Product Before Content Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar before content area.', 'magone'),
					'type' => 'sidebar',
					'default' => '', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'product_after_content_sidebar'  => array(
					'label' => esc_html__('Product After Content Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar after content area.', 'magone'),
					'type' => 'sidebar',
					'default' => '', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'product_sidebar_layout' => array(
					'label' => esc_html__('Product Main Sidebar Layout', 'magone'), 
					'description' => esc_html__('Choose Main Sidebar Layout for Product Page', 'magone'),
					'type' => 'visual', 
					'default' => 'right', 
					'choices' => array(					
						'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
						'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
						'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
					),
				),
				'product_sticky_sidebar'  => array(
					'label' => esc_html__('Product Sticky Sidebar', 'magone'), 
					'description' => esc_html__('Check This to Enable Sticky Sidebar for Product Page', 'magone'),
					'type' => 'checkbox',
					'default' => 'on',
					'show' => array(
						array('product_sidebar_layout', '!=', 'full'),
					),
				),
				'product_sidebar'  => array(
					'label' => esc_html__('Product Main Sidebar', 'magone'), 
					'description' => esc_html__('Select Main Sidebar for Product Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'sidebar', 
					'show' => array(
						array('product_sidebar_layout', '!=', 'full'),
					),
				),
				'product_footer_sidebar'  => array(
					'label' => esc_html__('Product Footer Sidebar', 'magone'), 
					'description' => esc_html__('Select Footer Wide Sidebar for Product Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'footer-wide', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					),
				),
				'product_bottom_page_sidebar'  => array(
					'label' => esc_html__('Product Bottom Page Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar at very bottom of product page', 'magone'),
					'type' => 'sidebar',
					'default' => 'bottom-page', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
			),
		), /* PRODUCT sidebar*/
		
		'archive-product-sidebar-manager' => array(
			'title' => esc_html__( 'Archive Product Sidebar', 'magone' ),
			'settings' => array(
				'archive_product_top_page_sidebar'  => array(
					'label' => esc_html__('Archive Product Top Page Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar at very top of archive product page.', 'magone'),
					'type' => 'sidebar',
					'default' => 'top-page', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'archive_product_header_sidebar'  => array(
					'label' => esc_html__('Archive Product Header Sidebar', 'magone'), 
					'description' => esc_html__('Select Header Wide Sidebar for Archive Product Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'header-wide', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					),
				),
				'archive_product_before_content_sidebar'  => array(
					'label' => esc_html__('Archive Product Before Content Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar before content area.', 'magone'),
					'type' => 'sidebar',
					'default' => '', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'archive_product_after_content_sidebar'  => array(
					'label' => esc_html__('Archive Product After Content Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar after content area.', 'magone'),
					'type' => 'sidebar',
					'default' => '', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
				'archive_product_sidebar_layout' => array(
					'label' => esc_html__('Archive Product Main Sidebar Layout', 'magone'), 
					'description' => esc_html__('Choose Main Sidebar Layout for Archive Product Page', 'magone'),
					'type' => 'visual', 
					'default' => 'right', 
					'choices' => array(					
						'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
						'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
						'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
					),
				),
				'archive_product_sticky_sidebar'  => array(
					'label' => esc_html__('Archive Product Sticky Sidebar', 'magone'), 
					'description' => esc_html__('Check This to Enable Sticky Sidebar for Archive Product Page', 'magone'),
					'type' => 'checkbox',
					'default' => 'on',
					'show' => array(
						array('archive-product_sidebar_layout', '!=', 'full'),
					),
				),
				'archive_product_sidebar'  => array(
					'label' => esc_html__('Archive Product Main Sidebar', 'magone'), 
					'description' => esc_html__('Select Main Sidebar for Archive Product Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'sidebar', 
					'show' => array(
						array('archive-product_sidebar_layout', '!=', 'full'),
					),
				),
				'archive_product_footer_sidebar'  => array(
					'label' => esc_html__('Archive Product Footer Sidebar', 'magone'), 
					'description' => esc_html__('Select Footer Wide Sidebar for Archive Product Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'footer-wide', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					),
				),
				'archive_product_bottom_page_sidebar'  => array(
					'label' => esc_html__('Archive Product Bottom Page Sidebar', 'magone'), 
					'description' => esc_html__('The sidebar at very bottom of archive product page', 'magone'),
					'type' => 'sidebar',
					'default' => 'bottom-page', 
					'choices' => array(
						'' => esc_html__('None / Disable', 'magone')
					)
				),
			)
		), /* ARCHIVE PRODUCT sidebar*/
	);
	
	$customizer_declaration['sidebar']['sections'] = 
			wp_parse_args( $woocommerce_header_sidebar_customizer, $customizer_declaration['sidebar']['sections'] );
}

if ( function_exists( 'is_bbpress' ) ) {
	
	/* add sidebar manager for bppress */
	$bbpress_header_sidebar_customizer = array(
		'forum-sidebar-manager' => array(
			'title' => esc_html__( 'Forum Sidebar', 'magone' ),
			'settings' => array(			
				'forum_sidebar_layout' => array(
					'label' => esc_html__('Forum Main Sidebar Layout', 'magone'), 
					'description' => esc_html__('Choose Main Sidebar Layout for Forum Page', 'magone'),
					'type' => 'visual', 
					'default' => 'right', 
					'choices' => array(					
						'full' => '<img st'.'yle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-full.png').'" title="'.esc_html__('Full Width', 'magone').'"/>',
						'right' => '<img s'.'tyle="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-right.png').'" title="'.esc_html__('Right Side', 'magone').'"/>',
						'left' => '<img styl'.'e="width:80px" src="'.esc_url(MAGONE_THEME_URL_IMAGES.'/sidebar-layout-left.png').'" title="'.esc_html__('Left Side', 'magone').'"/>',
					),
				),
				'forum_sticky_sidebar'  => array(
					'label' => esc_html__('Forum Sticky Sidebar', 'magone'), 
					'description' => esc_html__('Check This to Enable Sticky Sidebar for Forum Page', 'magone'),
					'type' => 'checkbox',
					'default' => 'on',
					'show' => array(
						array('forum_sidebar_layout', '!=', 'full'),
					),
				),
				'forum_sidebar'  => array(
					'label' => esc_html__('Forum Main Sidebar', 'magone'), 
					'description' => esc_html__('Select Main Sidebar for Forum Pages.', 'magone'),
					'type' => 'sidebar',
					'default' => 'sidebar', 
					'show' => array(
						array('forum_sidebar_layout', '!=', 'full'),
					),
				),
				
			)
		), /* FORUM sidebar*/
		
	);
	
	$customizer_declaration['sidebar']['sections'] = 
			wp_parse_args( $bbpress_header_sidebar_customizer, $customizer_declaration['sidebar']['sections'] );
}




global $magone_social_icon_list;
// attach social icon to customizer declaration
foreach ($magone_social_icon_list as $key => $name) {
	$customizer_declaration['social_links']['settings'][$key] = array(
		'label' => $name,
		'description' => sprintf(esc_html__('Input %s Link', 'magone'), '<i class="fa fa-'.$key.'"></i>')
	);
}

do_action('sneeit_setup_customizer', $customizer_declaration);
global $customize_social_icon_list;
$customize_social_icon_list = $magone_social_icon_list;
foreach ($magone_social_icon_list as $key => $name) {
	$value = get_theme_mod($key);
	if ($value) {
		$customize_social_icon_list[$key] = $value;
	} else {
		unset($customize_social_icon_list[$key]);
	}
}

$sneeit_theme_options = array(
	'menu-title' => esc_html__('Theme Options', 'magone'), 
	'page-title' => esc_html__('Theme Options', 'magone'),
	'html-before' => '',
	'html-after' => '',
	'declarations' => $customizer_declaration,
);
do_action('sneeit_theme_options', $sneeit_theme_options);

