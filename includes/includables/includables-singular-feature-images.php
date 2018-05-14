<?php
$feature_video_url = get_post_meta($p->id, 'feature_video_url', true);

if ($feature_video_url) {
	// if feature video url is actually video embedded code
	if ( strpos( $feature_video_url, '<' ) !== false && strpos( $feature_video_url, '>' ) !== false ) {
		// do some thing here to process embedded code if need
	}
	// only vimeo url
	else if ( strpos( $feature_video_url, 'vimeo' ) !== false ) {
		$feature_video_url = apply_filters( 'sneeit_get_vimeo_player', $feature_video_url );
	} 
	// only youtube url
	else if ( strpos( $feature_video_url, 'youtube' ) !== false || strpos( $feature_video_url, 'youtu.be' ) !== false ) {
		$feature_video_url = apply_filters( 'sneeit_get_youtube_player', $feature_video_url );
	}
	// just invalid url
	else {
		$feature_video_url = '';
	}
}

if ($feature_video_url || has_post_thumbnail()) :
?>
<p class="post-feature-media-wrapper">
	<?php 
	if ( $feature_video_url ) {
		echo '<span class="post-feature-media">' . $feature_video_url . '</span>';
	}
	else {
		the_post_thumbnail( 'full', array(
			'alt' => $p->title_attr, 
			'title' => $p->title_attr,
		) );
	}
	
	$feature_caption = get_post_meta( $p->id, 'feature_caption', true );
	
	if ( $feature_caption ) {
		echo '<span class="post-feature-caption">' . $feature_caption . '</span>';
	}
	
	?>
</p>

<?php
endif;