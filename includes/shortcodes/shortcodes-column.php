<?php

function magone_shortcode_column_display( $atts, $content = "" ) {
	extract(
		shortcode_atts(
			array(
				'class' => 100,
				'width' => 100,
				'padding_left' => 0,
				'padding_right' => 0,
				'disable_responsive' => false,
				'sticky_inside' => false,
			),
			$atts
		)
	);
		
	if ($class) {
		$class = ' '.$class;
	}
	if ($disable_responsive) {
		$class .= ' disable-responsive';
	} else {
		$class .= ' active-responsive';
	}
	if ($sticky_inside) {
		$class .= ' sticky-inside';
	} else {
		$class .= ' no-sticky';
	}
	
	$html = '<div class="column'.$class.'" sty'.'le="width:'.$width.'%"><div class="column-inner" st'.'yle="padding-left: '.$padding_left.'px; padding-right: '.$padding_right.'px;">'.do_shortcode($content).'</div></div>';
	return $html;
}