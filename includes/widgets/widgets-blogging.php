<?php

function magone_widget_blogging_display( $args, $instance, $widget_id, $widget_declaration ) {		
	echo magone_article_box('blogging', $instance, 'widget_call');
}