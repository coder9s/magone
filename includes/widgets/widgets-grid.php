<?php

function magone_widget_grid_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('grid', $instance, 'widget_call');
}