<?php

function magone_widget_three_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('three', $instance, 'widget_call');
}