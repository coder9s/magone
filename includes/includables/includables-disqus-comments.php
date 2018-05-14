<div class='disqus-comments comments'>
	<a class='disqus-comments-title comments-title' href='javascript:void(0)' data-target='.disqus-comments'>
		<?php esc_html_e('DISQUS:', 'magone'); ?> 
		<span class="color">
			<span class="disqus-comment-count" data-disqus-identifier="<?php the_ID(); ?>"><?php echo get_post_meta(get_the_ID(), 'disqus_comment_count', true); ?></span>
		</span>
	</a>
	<div class="disqus-comments-inner comments-inner">
		<div id="disqus_thread">
<<?php echo 'scr'.'ipt'; ?>>
var disqus_config = function() {
	this.page.url = '<?php the_permalink(); ?>'; // Replace PAGE_URL with your page's canonical URL variable
	this.page.identifier = <?php the_ID(); ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() {
var d = document, s = d.createElement('script');
s.src = '//<?php echo trim(get_theme_mod('disqus_short_name')); ?>.disqus.com/embed.j<?php echo 's'; ?>';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</<?php echo 'scr'.'ipt'; ?>>
<<?php echo 'scr'.'ipt'; ?> id="dsq-count-scr" src="<?php echo esc_url('https://'.trim(get_theme_mod('disqus_short_name')).'.disqus.com/count.j'.'s'); ?>" async></<?php echo 'scr'.'ipt'; ?>>
		</div>
	</div>
	
	<div class="hide ajax-comment-count" data-system="disqus" data-id="<?php the_ID(); ?>"><span class="disqus-comment-count" data-disqus-identifier="<?php the_ID(); ?>"></span></div>	
</div>
