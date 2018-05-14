<?php

function magone_widget_one_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('one', $instance, 'widget_call');
}