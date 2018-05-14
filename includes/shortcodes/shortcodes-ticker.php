<?php

function magone_shortcode_ticker_display( $atts = array(), $content = "" ) {
	return magone_article_box('ticker', $atts, $content);
}