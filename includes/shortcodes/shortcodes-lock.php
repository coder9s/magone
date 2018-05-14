<?php
function magone_shortcode_lock_display( $atts = array(), $content = "" ) {	
	if ($content) {
		$ret = 
		'<div class="locked-content white shad">'.
			'<div class="inner">'.
				'<div class="overlay overlay-1 bg"></div>'.
				'<div class="overlay overlay-2 white"></div>'.
				'<i class="color fa fa-lock"></i>'.
				'<h2 class="color locked-content-title">'.esc_html__('THIS CONTENT IS PREMIUM', 'magone').'</h2>'.
				'<h3 class="locked-content-sub-title">'.esc_html__('Please share to unlock', 'magone').'</h3>'.
				'<div class="locked-content-actions">'.
					'<div class="locked-content-action"><div class="fb-like" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div></div>'.
					'<div class="locked-content-action"><a href="'.esc_url('https://twitter.com/share').'" class="twitter-share-button" data-count="vertical">Tweet</a></div>'.
				'</div>'.
				'<div class="clear"></div>'.
			'</div>'.
		'</div>'.
		'<div class="locked-content-data hide">'.do_shortcode($content).'</div>';
		return $ret;	
	}
}
