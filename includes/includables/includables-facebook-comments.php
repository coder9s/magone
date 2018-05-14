<div class="facebook-comments comments">
    <a class="facebook-comments-title comments-title" href="javascript:void(0)" data-target=".facebook-comments">
        <?php esc_html_e('FACEBOOK:', 'magone'); ?> 
		<span class="color">
			<fb:comments-count href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), 'facebook_comment_count', true); ?></fb:comments-count>
		</span>		
    </a>
    <div class="facebook-comments-inner comments-inner">
		<div id="jsid-comment-facebook-plugin" class="fb-comments fb_iframe_widget" data-numposts="5" data-colorscheme="light" data-width="0" data-height="600" fb-xfbml-state="rendered"></div>		
		<div class="hide ajax-comment-count" data-system="facebook" data-id="<?php the_ID(); ?>"><fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count></div>		
    </div>
</div>
