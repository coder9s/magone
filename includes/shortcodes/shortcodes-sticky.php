<?php

function magone_shortcode_sticky_display( $atts = array(), $content = "" ) {
	return magone_article_box('sticky', $atts, $content);
}