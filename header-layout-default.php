<?php 
$header_desktop_ads = get_theme_mod('header_ads');
$header_mobile_ads = get_theme_mod('header_mobile_ads');
$header_ads = '';
if (wp_is_mobile() && $header_mobile_ads) {
	$header_ads = $header_mobile_ads;
} else if (!wp_is_mobile() && $header_desktop_ads) {
	$header_ads = $header_desktop_ads;
}

if ($header_ads || has_nav_menu( 'top-menu' )):	?>
<div class="top-bar<?php 
	if (has_nav_menu( 'top-menu' )) {
		echo ' has-menu';
	}
?>">
	<?php if ($header_ads) : ?>

		<div class="header-ads">
			<?php echo do_shortcode($header_ads); ?>				
		</div>
		<div class="clear"></div>
	
	<?php endif; ?>
		
	<?php if (has_nav_menu( 'top-menu' )) : ?>
		<?php get_header('top-menu'); ?>
	<?php endif; ?>
	
	
	<div class="clear"></div>		
</div>	
<?php endif; ?>
				
<div class="section shad header-bg" id="header-section">
	<div class="widget header no-title" id="header-content">
		<?php
		get_header('menu-toggle-button');
		magone_blog_title();
		get_header( 'woocommerce' );		
		get_header('search-toggle-button');
		?>
		
		<?php
		get_header( 'social-icons'); 
		?>
		<div class="clear"></div>
	</div><!-- #header-content -->

	<?php get_header('main-menu'); ?>

	<div class="clear"></div>
</div> <!-- #header-section -->



			