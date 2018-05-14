<?php

function magone_widget_complex_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('complex', $instance, 'widget_call');
}