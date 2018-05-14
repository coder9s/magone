<?php
function magone_widget_slider_display( $args, $instance, $widget_id, $widget_declaration ) {	
	echo magone_article_box('slider', $instance, 'widget_call');
}