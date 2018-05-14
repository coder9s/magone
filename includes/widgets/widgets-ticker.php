<?php

function magone_widget_ticker_display( $args, $instance, $widget_id, $widget_declaration ) {
	echo magone_article_box('ticker', $instance, 'widget_call');
}