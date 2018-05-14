<?php
global $MagOne_Article_Fields;
$MagOne_Article_Fields_Widgets = $MagOne_Article_Fields;
foreach ($MagOne_Article_Fields_Widgets as $key => $value) {
	unset($MagOne_Article_Fields_Widgets[$key]['title']);
	unset($MagOne_Article_Fields_Widgets[$key]['title_bg_color']);
	unset($MagOne_Article_Fields_Widgets[$key]['title_text_color']);
	unset($MagOne_Article_Fields_Widgets[$key]['title_border_bottom_color']);
}

if (!function_exists('sneeit_framework')) {
	function magone_widgets_init() {
		register_sidebar(array(
			'name' => esc_html__( 'Main Sidebar', 'magone' ),
			'id' => 'sidebar',
			'description' => esc_html__( 'The section on right side. Usually use to add common widgets', 'magone' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
			'after_widget'  => '<div class="clear"></div></div></div>',
			'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
			'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
		));
	}
	add_action( 'widgets_init', 'magone_widgets_init');	
}



do_action('sneeit_setup_sidebars', array(
	'top-page' => array(
		'name' => esc_html__('Top Page', 'magone'),		
		'description'   => esc_html__('The section on very top of page. Above and before everything.', 'magone'),
		'id'			=> 'top-page',
		'class'         => 'clear section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	
	'header-wide' => array(
		'name' => esc_html__('Header Wide', 'magone'),		
		'description'   => esc_html__('The section under the main menu. Usually use to add wide ads.', 'magone'),
		'id'			=> 'header-wide',
		'class'         => 'clear section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	
	'before-content' => array(
		'name' => esc_html__('Before Content', 'magone'),		
		'description'   => esc_html__('The section above content area', 'magone'),
		'id'			=> 'before-content',
		'class'         => 'clear section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	
	'under-post-content' => array(
		'name' => esc_html__('Under Post Content', 'magone'),		
		'description'   => esc_html__('The section below content of article / post.', 'magone'),
		'id'			=> 'under-post-content',
		'class'         => 'clear section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	'after-content' => array(
		'name' => esc_html__('After Content', 'magone'),		
		'description'   => esc_html__('The section below content area.', 'magone'),
		'id'			=> 'after-content',
		'class'         => 'clear section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	'sidebar' => array(
		'name' => esc_html__('Right Sidebar', 'magone'),		
		'description'   => esc_html__('The section on right side. Usually use to add common widgets.', 'magone'),
		'id'			=> 'sidebar',
		'class'         => 'section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	'footer-wide' => array(
		'name' => esc_html__('Footer Wide', 'magone'),		
		'description'   => esc_html__('The wide section before footer. Usually use to add wide ads.', 'magone'),
		'id'			=> 'footer-wide',
		'class'         => 'clear section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	
	'bottom-page' => array(
		'name' => esc_html__('Bottom Page', 'magone'),		
		'description'   => esc_html__('The section on very bottom of page. Below and under everything.', 'magone'),
		'id'			=> 'bottom-page',
		'class'         => 'clear section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	
	'footer-col-1-section' => array(
		'name' => esc_html__('Footer Column 1', 'magone'),		
		'description'   => esc_html__('The first column of footer', 'magone'),
		'id'			=> 'footer-col-1-section',
		'class'         => 'section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	'footer-col-2-section' => array(
		'name' => esc_html__('Footer Column 2', 'magone'),		
		'description'   => esc_html__('The second column of footer', 'magone'),
		'id'			=> 'footer-col-2-section',
		'class'         => 'section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	'footer-col-3-section' => array(
		'name' => esc_html__('Footer Column 3', 'magone'),		
		'description'   => esc_html__('The third column of footer', 'magone'),
		'id'			=> 'footer-col-3-section',
		'class'         => 'section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
	),
	
));
do_action('sneeit_support_custom_sidebars', array(
	'class'         => 'custom-section',
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
	'after_widget'  => '<div class="clear"></div></div></div>',
	'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
	'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">'
));

// widget without handle or action will call shortcode as default
global $magone_social_icon_list;
$magone_social_icon_list_field = array();
foreach ($magone_social_icon_list as $key => $name) {
	$magone_social_icon_list_field[$key] = array(
		'label' => $name,
	);
}
$magone_widget_defines = array(
	'facebook_page' => array(
		'title' => esc_html__('Facebook Fan Page', 'magone'),
		'description' => esc_html__('Facebook Fan Page Box', 'magone'),
		'display_callback' => 'magone_widget_facebook_page',
		'fields' => array(
			'title_icon' => array(
				'label' => esc_html__('Title FontAwesome Icon Code', 'magone'), 
				'description' => wp_kses(
					sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('http://fortawesome.github.io/Font-Awesome/icons/')),
					array(
						'a' => array(
							'href' => array(),
							'target' => array()
						),					
					)
				)
			),
			'href' => array(
				'label' =>esc_html__('Facebook Page URL', 'magone'),
				'type' => 'url',
				'default' => 'https://www.facebook.com/Sneeit-622691404530609/'
			),
			'width' => array(
				'label' => esc_html__('Width in Pixels', 'magone'), 
				'type' => 'range', 
				'min' => 180,
				'max' => 500,
				'default' => 300
			),
			'height' => array(
				'label' => esc_html__('Height in Pixels', 'magone'),
				'type' => 'range',
				'min' => 70,
				'max' => 800,
				'default' => 130
			),
			'adapt-container-width' => array(
				'label' => esc_html__('Adapt to Plugin Container Width', 'magone'),
				'type' => 'checkbox',
				'default' => true
			),
			'show-facepile' => array(
				'label' => esc_html__("Show Friend's Faces", 'magone'),
				'type' => 'checkbox',
				'default' => false
			),
			'small-header' => array(
				'label' => esc_html__('Use Small Header', 'magone'),
				'type' => 'checkbox',
				'default' => false
			),
			'hide-cover' => array(
				'label' => esc_html__('Hide Cover Photo', 'magone'),
				'type' => 'checkbox',
				'default' => false
			),
			'show-posts' => array(
				'label' => esc_html__('Show Page Posts', 'magone'),
				'type' => 'checkbox',
				'default' => false
			)
		)
	),
	'branding' => array(
		'title' => esc_html__('Branding', 'magone'),
		'description' => esc_html__('Show logo and more information about your site', 'magone'),
		'display_callback' => 'magone_widget_branding',
		'fields' => array(
			'title_icon' => array(
				'label' => esc_html__('Title FontAwesome Icon Code', 'magone'), 
				'description' => wp_kses(
					sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('http://fortawesome.github.io/Font-Awesome/icons/')),
					array(
						'a' => array(
							'href' => array(),
							'target' => array()
						),					
					)
				)
			),
			'logo' => array(
				'label' =>esc_html__('Logo Image', 'magone'),
				'type' => 'image',	
			),
			'about' => array(
				'label' =>esc_html__('Short About Bio', 'magone'),
				'type' => 'textarea',
			),
			'address' => array(
				'label' => esc_html__('Address', 'magone'), 
			),
			'phone' => array(
				'label' => esc_html__('Phone Number', 'magone'),
			),
			'email' => array(
				'label' => esc_html__('Contact Email', 'magone'),
			),
		)
	),
	
	'social_icons' => array(
		'title' => esc_html__('Social Icons', 'magone'),
		'description' => esc_html__('List of social icons', 'magone'),
		'display_callback' => 'magone_widget_social_icons',
		'fields' => $magone_social_icon_list_field,
	),
	'feedburner_form' => array(
		'title' => esc_html__('Feedburner Form', 'magone'),
		'description' => esc_html__('Feedburner Form for Newsletters', 'magone'),
		'display_callback' => 'magone_widget_feedbuner_form',
		'fields' => array(
			'title_icon' => array(
				'label' => esc_html__('Title FontAwesome Icon Code', 'magone'), 
				'description' => wp_kses(
					sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('http://fortawesome.github.io/Font-Awesome/icons/')),
					array(
						'a' => array(
							'href' => array(),
							'target' => array()
						),					
					)
				)
			),
			'uri' => array(
				'label' =>esc_html__('Your Feedbuner URI', 'magone'),
				'type' => 'url',
				'default' => 'https://feeds.feedburner.com/sneeit',
				'description' => wp_kses(
					sprintf(__('If you have no, <a href="%s" target="_blank">Create one here</a>', 'magone'), esc_url('https://feedburner.google.com/fb/a/myfeeds')),
					array(
						'a' => array(
							'href' => array(),
							'target' => array()
						),					
					)
				)
			),
			'description' => array(
				'label' => esc_html__('Your Form Description', 'magone'), 
				'type' => 'textarea',
				'default' => 'Subscribe to receive inspiration, ideas, and news in your inbox'
			),
			'placholder_text' => array(
				'label' => esc_html__('Place Holder Text for Email Field', 'magone'), 
				'default' => 'Email address', 
			),
			'submit_text' => array(
				'label' => esc_html__('Text of Submit Button', 'magone'), 
				'default' => 'Submit'
			),
		)
	),
	
	'social_counter' => array(
		'title' => esc_html__('Social Counter', 'magone'),
		'description' => esc_html__('Social Counter with Links', 'magone'),
		'display_callback' => 'magone_widget_social_counter',
		'fields' => array(
			'title_icon' => array(
				'label' => esc_html__('Title FontAwesome Icon Code', 'magone'), 
				'description' => wp_kses(
					sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('https://fortawesome.github.io/Font-Awesome/icons/')),
					array(
						'a' => array(
							'href' => array(),
							'target' => array()
						),					
					)
				)
			),
			'twitter_url' => array(
				'label' => esc_html__('Twitter URL', 'magone'), 
				'type' => 'url',
				'default' => 'https://twitter.com/tiennguyentweet'
			),
			'facebook_url' => array(
				'label' =>esc_html__('Facebook Page URL', 'magone'),
				'type' => 'url',
				'default' => 'https://www.facebook.com/Sneeit-622691404530609/'
			),
			'google_plus_url' => array(
				'label' =>esc_html__('Google Plus URL', 'magone'),
				'type' => 'url',
				'default' => 'https://plus.google.com/u/0/+TienNguyenPlus'
			),
			'instagram_url' => array(
				'label' =>esc_html__('Instagram URL', 'magone'),
				'type' => 'url',
				'default' => 'https://www.instagram.com/envato/'
			),
			'pinterest_url' => array(
				'label' =>esc_html__('Pinterest URL', 'magone'),
				'type' => 'url',
				'default' => 'https://www.pinterest.com/tvnguyen/'
			),
			'behance_url' => array(
				'label' =>esc_html__('Behance Profile URL', 'magone'),
				'type' => 'url',
				'default' => 'https://www.behance.net/tiennguyenvan'
			),
			'youtube_url' => array(
				'label' =>esc_html__('Youtube Channel URL', 'magone'),
				'type' => 'url',
				'default' => 'https://www.youtube.com/channel/UCMwiaL6nKXKnSrgwqzlbkaw'
			),
		)
	),
	'image_quote' => array(
		'title' => esc_html__('Image Quote', 'magone'),
		'description' => esc_html__('Quote box with background', 'magone'),
		'display_callback' => 'magone_widget_image_quote_display',
		'fields' => array(		
			'title_icon' => array(
				'label' => esc_html__('Title FontAwesome Icon Code', 'magone'), 
				'description' => wp_kses(
					sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('https://fortawesome.github.io/Font-Awesome/icons/')),
					array(
						'a' => array(
							'href' => array(),
							'target' => array()
						),					
					)
				)
			),
			'content' => array(
				'label' => esc_html__('Quote Content', 'magone'), 
				'type' => 'textarea',
				'default' => ''
			),
			'author' => array(
				'label' =>esc_html__('Quote Author Name', 'magone'),
				'default' => ''
			),
			'image' => array(
				'label' =>esc_html__('Quote Background Image', 'magone'),
				'type' => 'image',
				'default' => ''
			)
		)
	),
	'recent_comments' => array(
		'title' => esc_html__('MagOne Recent Comments', 'magone'),
		'description' => esc_html__('Quote box with background', 'magone'),
		'display_callback' => 'magone_widget_recent_comments_display',
		'fields' => array(		
			'title_icon' => array(
				'label' => esc_html__('Title FontAwesome Icon Code', 'magone'), 
				'description' => wp_kses(
					sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('https://fortawesome.github.io/Font-Awesome/icons/')),
					array(
						'a' => array(
							'href' => array(),
							'target' => array()
						),					
					)
				)
			),
			'enable_tab' => array(
				'label' => esc_html__('Connect as Tabs', 'magone'), 
				'description' => esc_html__('All consecutive blocks which were enabled this option will be grouped into a tab', 'magone'),
				'type' => 'checkbox', 
				'default' => false
			),
			'count' => array(
				'label' => esc_html__('Count', 'magone'), 
				'type' => 'number',
				'default' => 5
			),
			'exclude_authors' => array(
				'label' =>esc_html__('Exclude Authors', 'magone'),
				'type' => 'users',
			)
		)
	),
	'slides' => array(
		'title' => esc_html__('Article Box: Slider', 'magone'),
		'description' => esc_html__('Show articles as slider', 'magone'),
		'display_callback' => 'magone_widget_slider_display',
		'fields'  => $MagOne_Article_Fields_Widgets['slider']
	),
	'sticky' => array(
		'title' => esc_html__('Artticle Box: Sticky', 'magone'), 
		'description' => esc_html__('Show articles as sticky block', 'magone'), 
		'display_callback' => 'magone_widget_sticky_display', 
		'fields' => $MagOne_Article_Fields_Widgets['sticky']
	),
	'complex' => array(
		'title' => esc_html__('Article Box: Complex', 'magone'), 
		'description' => esc_html__('Show article as complex block', 'magone'), 
		'display_callback' => 'magone_widget_complex_display', 
		'fields' => $MagOne_Article_Fields_Widgets['complex']
	),
	'one' => array(
		'title' => esc_html__('Article Box: One Column', 'magone'), 
		'description' => esc_html__('Show article as one column block', 'magone'), 
		'display_callback' => 'magone_widget_one_display', 
		'fields' => $MagOne_Article_Fields_Widgets['one']
	),
	'two' => array(
		'title' => esc_html__('Article Box: Two Columns', 'magone'), 
		'description' => esc_html__('Show article as two columns block', 'magone'), 
		'display_callback' => 'magone_widget_two_display', 
		'fields' => $MagOne_Article_Fields_Widgets['two']
	),
	'three' => array(
		'title' => esc_html__('Article Box: Three Columns', 'magone'), 
		'description' => esc_html__('Show article as three columns block', 'magone'), 
		'display_callback' => 'magone_widget_three_display', 
		'fields' => $MagOne_Article_Fields_Widgets['three']
	),
	'carousel' => array(
		'title' => esc_html__('Article Box: Carousel', 'magone'), 
		'description' => esc_html__('Show article as carousel block', 'magone'), 
		'display_callback' => 'magone_widget_carousel_display', 
		'fields' => $MagOne_Article_Fields_Widgets['carousel']
	),
	'blogging' => array(
		'title' => esc_html__('Article Box: Blogging', 'magone'), 
		'description' => esc_html__('Show article as blogging block', 'magone'), 
		'display_callback' => 'magone_widget_blogging_display', 
		'fields' => $MagOne_Article_Fields_Widgets['blogging']
	),
	'simple_one' => array(
		'title' => esc_html__('Article Box: Simple One Column', 'magone'), 
		'description' => esc_html__('Show article as simple one column block', 'magone'), 
		'display_callback' => 'magone_widget_simple_one_display', 
		'fields' => $MagOne_Article_Fields_Widgets['simple-one']
	),
	'ticker' => array(
		'title' => esc_html__('Article Box: Ticker', 'magone'), 
		'description' => esc_html__('Show article as ticker block', 'magone'), 
		'display_callback' => 'magone_widget_ticker_display', 
		'fields' => $MagOne_Article_Fields_Widgets['ticker']
	),
	'list' => array(
		'title' => esc_html__('Article Box: List', 'magone'), 
		'description' => esc_html__('Show article as list block', 'magone'), 
		'display_callback' => 'magone_widget_list_display', 
		'fields' => $MagOne_Article_Fields_Widgets['list']
	),
	'grid' => array(
		'title' => esc_html__('Article Box: Grid', 'magone'), 
		'description' => esc_html__('Show article as grid block', 'magone'), 
		'display_callback' => 'magone_widget_grid_display', 
		'fields' => $MagOne_Article_Fields_Widgets['grid']
	)
);

// adjust value
if (defined('PHP_VERSION_ID')) {
	$magone_widget_defines['social_counter']['fields']['linkedin_url'] = array(
		'label' =>esc_html__('Public Linkedin Profile URL', 'magone'),
		'type' => 'url',
		'default' => 'https://vn.linkedin.com/in/tien-nguyen-van-4982736b'
	);
}

do_action('sneeit_setup_widgets', $magone_widget_defines);