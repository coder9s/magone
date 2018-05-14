<?php

function magone_shortcode_grid_display( $atts = array(), $content = "" ) {
	return magone_article_box('grid', $atts, $content);
}