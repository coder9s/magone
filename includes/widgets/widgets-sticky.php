<?php

function magone_widget_sticky_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('sticky', $instance, 'widget_call');
}