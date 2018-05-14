<?php

function magone_widget_two_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('two', $instance, 'widget_call');
}