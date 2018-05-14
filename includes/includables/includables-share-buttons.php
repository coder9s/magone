<div class='post-section post-share-buttons'>
	<h4 class='post-section-title'>
		<i class="fa fa-share-alt"></i> <?php esc_html__( 'SHARE:', 'magone' ); ?>
	</h4>
	<div class='post-share-buttons-holder'>
		<?php if (!magone_is_IE()) : ?>
		<!--[if !IE]> -->
		<?php if (!get_theme_mod('custom_sharing_button_code')) : ?>
		<<?php echo 'scr'.'ipt'; ?> type="text/javascript">var addthis_config = addthis_config||{};addthis_config.data_track_addressbar = false;addthis_config.data_track_clickback = false;</<?php echo 'scr'.'ipt'; ?>><<?php echo 'scr'.'ipt'; ?> type="text/java<?php echo 'scr'.'ipt'; ?>" src="//s7.addthis.com/js/300/addthis_widget.j<?php echo 's'; ?>#pubid=ra-4f98ab455ea4fbd4" async="async"></<?php echo 'scr'.'ipt'; ?>><div class="addthis_sharing_toolbox"></div>
		<?php else: 		
			echo do_shortcode(get_theme_mod('custom_sharing_button_code'));
		endif; ?>
		
		<!-- <![endif]-->
		
		<?php else: ?>

		<div class="ie-sharing-buttons">
			<a href="<?php echo esc_url('https://twitter.com/share?url='. get_the_permalink().'&amp;amp;text=Simple%20Share%20Buttons&amp;amp;hashtags=simplesharebuttons');?>" target="_blank">
				<img src="<?php echo esc_url(MAGONE_THEME_URL_IMAGES .'ie-share-twiiter.png');?>" alt="<?php esc_attr_e('Twitter', 'magone');?>" />
			</a>		

			<a href="<?php echo esc_url('https://www.facebook.com/sharer.php?u='.get_the_permalink());?>" target="_blank">
				<img src="<?php echo esc_url(MAGONE_THEME_URL_IMAGES.'ie-share-facebook.png');?>" alt="<?php esc_attr_e('Facebook', 'magone');?>" />
			</a>							    

			<a href="<?php echo esc_url('https://plus.google.com/share?url='.get_the_permalink()); ?>" target="_blank">
				<img src="<?php echo esc_url(MAGONE_THEME_URL_IMAGES.'ie-share-google-plus.png');?>" alt="<?php esc_attr_e('Google', 'magone');?>" />
			</a>							    

			<a href="<?php echo esc_url('https://pinterest.com/pin/create/button/?url='.get_the_permalink()); ?>">
				<img src="<?php echo esc_url(MAGONE_THEME_URL_IMAGES.'ie-share-pinterest.png');?>" alt="<?php esc_attr_e('Pinterest', 'magone');?>" />
			</a>

		</div>
		
		<?php endif; ?>

	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>