<?php if (!get_theme_mod('hide_header_social_icons')) : ?>							
	<?php global $customize_social_icon_list;
	if (count($customize_social_icon_list)):?>						
		<div class="header-social-icons">						
			<ul>
			<?php 
			foreach ($customize_social_icon_list as $key => $value) : ?>
				<li><a href="<?php echo esc_url($value); ?>" title="<?php echo esc_attr($key) ?>" class="social-icon <?php echo esc_attr($key) ?>" target="_blank"><i class="fa fa-<?php echo esc_attr($key) ?>"></i></a></li>
			<?php endforeach; ?>
			</ul>
			<div class="clear"></div>
		</div>
	<?php endif; ?>							
<?php endif;