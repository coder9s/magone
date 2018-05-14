<?php

function magone_widget_list_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('list', $instance, 'widget_call');
}