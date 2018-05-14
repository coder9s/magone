<div id="comments">
	<div id="comments-title-tabs">
		<h4 class="post-section-title comments-title-tabs-name comments-title-tab">
			<i class="fa fa-comments"></i> <?php esc_html_e('COMMENTS', 'magone'); ?>
		</h4>
	</div>
	<div class="clear"></div>
	<div class="comments-title-tabs-hr"></div>
	<a name="comments"></a>
	
	<?php if (!get_theme_mod('disable_wordpress_comment') && (comments_open() || get_comments_number())) {
		include MAGONE_THEME_PATH_INCLUDABLES.'includables-wordpress-comments.php';
	} ?>
	
	<?php if (!get_theme_mod('disable_facebook_comment') && comments_open()) {
		include MAGONE_THEME_PATH_INCLUDABLES.'includables-facebook-comments.php';
	} ?>
	
	<?php if (!get_theme_mod('disable_disqus_comment') && comments_open()) { 
		include MAGONE_THEME_PATH_INCLUDABLES.'includables-disqus-comments.php';
	} ?>		
</div><!--#comments-->	
<div class="clear"></div>