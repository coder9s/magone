<?php

function magone_shortcode_list_display( $atts = array(), $content = "" ) {
	return magone_article_box('list', $atts, $content);
}