<?php

function magone_widget_image_quote_display( $args, $instance, $widget_id, $widget_declaration ) {
	if (isset($instance['image'])) {
		$instance['magone_before_title'] = '<div class="item-thumbnail quote-background">';
		
		
		
		$img_id = magone_get_attachment_id_from_src($instance['image']);
		if (!$img_id) {
			$instance['magone_before_title'] .= '<img alt="'.esc_attr__('Quote Widget Background', 'magone').'" src="'.esc_url($instance['image']).'"/>';
		} else {
			$instance['magone_before_title'] .= wp_get_attachment_image($img_id);
		}
		
		$instance['magone_before_title'] .= '</div>';
	}
	magone_widget_common_header('Image misc image quote', $instance);		
	?>	
	<div class="quote-icon"><i class="fa fa-quote-left"></i></div>
	<?php if (isset($instance['content'])): ?>
	<div class="quote-content"><?php echo $instance['content']; ?></div>
	<?php endif; ?>
	
	<?php if (isset($instance['author'])): ?>
	<div class="quote-author"> - <?php echo $instance['author']; ?></div>
	<?php endif;?>
	<div class="clear"></div>
	
	<?php
	magone_widget_common_footer();
}