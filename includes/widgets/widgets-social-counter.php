<?php

function magone_widget_social_counter( $args, $instance, $widget_id, $widget_declaration) {
	static $widget_id_counter = 0;
	$widget_id .= ('-'.$widget_id_counter);
	$widget_id_counter++;	
	$args['widget_id'] = $widget_id;
	
	$instance = magone_set_widget_instance($instance, $widget_declaration);	
	magone_widget_common_header('LinkList social_counter linklist', $instance, $args);	
	
	// get from cache first	
	$cache = get_transient(MAGONE_SOCIAL_COUNT_CACHE_KEY.'-'.$args['widget_id']);	
	
	if ($cache && !current_user_can('manage_options')) :		
		echo $cache;	
	else:
	?>
	<div class="data hide">
		<?php foreach ( $instance as $name => $url ) :
			if (strpos($name, '_url') === false) {
				continue;
			}
			
			if ($url) : ?>
				<span class="value" data-key="<?php echo esc_attr(str_replace('_url', '', $name)); ?>" data-url="<?php echo esc_attr($url); ?>"></span>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<div class="loader"><?php esc_html_e('Loading...', 'magone'); ?></div>
	<?php
	endif;
	
	magone_widget_common_footer();
}