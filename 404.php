<?php get_header(); ?>
	<div class="widget content-scroll no-title">
		<div class='post-404'>
			<div class='title'>404</div>
			<div class='link'>				
				<a href='<?php echo esc_attr(home_url()); ?>'><i class='fa fa-car'></i> <?php esc_html_e('Back Home', 'magone'); ?></a>
			</div>
		</div>
	</div>
<?php get_footer(); ?>