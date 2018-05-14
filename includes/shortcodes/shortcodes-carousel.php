<?php

function magone_shortcode_carousel_display( $atts = array(), $content = "" ) {
	return magone_article_box('carousel', $atts, $content);
}