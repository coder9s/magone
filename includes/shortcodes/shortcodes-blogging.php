<?php

function magone_shortcode_blogging_display( $atts = array(), $content = "" ) {
	return magone_article_box('blogging', $atts, $content);
}