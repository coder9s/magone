<?php
function magone_widget_social_counter_callback() {	
	$block_id = magone_get_server_request('block_id');	
	
	$social_list = array(
		'twitter' => array( 'followers', esc_html__('Followers', 'magone'), esc_html__('Follow', 'magone')), 
		'facebook' => array( 'likes', esc_html__('Likes', 'magone'), esc_html__('Like', 'magone')),
		'google_plus' => array( 'followers', esc_html__('Followers', 'magone'), esc_html__('Follow', 'magone')), 
		'instagram' => array( 'followers', esc_html__('Followers', 'magone'), esc_html__('Follow', 'magone')), 
		'pinterest' => array( 'followers', esc_html__('Followers', 'magone'), esc_html__('Follow', 'magone')), 
		'behance' => array( 'followers', esc_html__('Followers', 'magone'), esc_html__('Follow', 'magone')),
		'youtube' => array( 'subscribers', esc_html__('Subscribers', 'magone'), esc_html__('Subscribe', 'magone')),
	);
	
	if (defined('PHP_VERSION_ID')) {
		$social_list['linkedin'] = array( 'connections', esc_html__('Connections', 'magone'), esc_html__('Connect', 'magone'));
	}
	
	$social_url = array();
	foreach ($social_list as $key => $value) :
		$social_url[$key] = magone_get_server_request($key);
	endforeach;
	
	$index = 0;
	// output as HTML
	ob_start(); 
	foreach ($social_list as $key => $value) : ?>
		<?php if ($social_url[$key]) : 
		$counter = 	apply_filters('sneeit_number_'.$key.'_'.$value[0], $social_url[$key]);
		if ($counter == -1) {			
			continue;
		}
		?>

		<a class="social-counter item-<?php echo esc_attr($index); ?> <?php echo esc_attr(str_replace('_', '-', $key)); ?> <?php echo esc_attr(str_replace('_', '-', $key)); ?>-color" href="<?php echo esc_url($social_url[$key]); ?>" target="_blank">
			<span class="icon"><i class="fa fa-<?php echo esc_attr(str_replace('_', '-', $key)); ?>"></i></span>
			<span class="count"><?php echo esc_html($counter); ?></span>
			<span class="text"><?php echo esc_html($value[1]); ?></span>
			<span class="button">
				<span class="<?php echo esc_attr(str_replace('_', '-', $key)); ?>-bg rad2"><?php echo esc_html($value[2]); ?><span class="go"><i class="fa fa-angle-right"></i></span></span>
			</span>
			<span class="clear"></span>
		</a>
		<div class="clear"></div>
		<?php $index++;?>
		<?php endif; ?>
	<?php endforeach;
	$value = ob_get_clean();
	
	// save to cache
	set_transient(MAGONE_SOCIAL_COUNT_CACHE_KEY.'-'.$block_id, $value, MAGONE_SOCIAL_COUNT_CACHE_TIMEOUT);
	
	echo $value;
	die();
}
if (is_admin()) :
	add_action( 'wp_ajax_nopriv_magone_widget_social_counter', 'magone_widget_social_counter_callback' );
	add_action( 'wp_ajax_magone_widget_social_counter', 'magone_widget_social_counter_callback' );
endif;// is_admin for ajax