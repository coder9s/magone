<?php

function magone_widget_carousel_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('carousel', $instance, 'widget_call');
}