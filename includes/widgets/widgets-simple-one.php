<?php

function magone_widget_simple_one_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('simple-one', $instance, 'widget_call');
}