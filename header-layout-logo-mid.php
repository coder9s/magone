<div class="top-bar<?php
	if ( has_nav_menu( 'top-menu' ) ) {
		echo ' has-menu';
	}
?>">
	<?php get_header('top-menu'); ?>
	<?php get_header('search-toggle-button'); ?>
	<?php get_header('social-icons'); ?>

	<div class="clear"></div>		
</div>
<div class="top-page-wrapper auto-height">
	<div class="table">
		<div class="tr">

	
		<?php 
		$header_desktop_ads = get_theme_mod('header_ads');
		$header_mobile_ads = get_theme_mod('header_mobile_ads');
		$header_ads = '';
		if (wp_is_mobile() && $header_mobile_ads) {
			$header_ads = $header_mobile_ads;
		} else if (!wp_is_mobile() && $header_desktop_ads) {
			$header_ads = $header_desktop_ads;
		}
		if ($header_ads):	?>
			<div id="top-page-logo" class="td">
				<?php magone_blog_title(); ?>
			</div>
			<div class="td">
				<div class="header-ads">
					<?php echo do_shortcode($header_ads); ?>				
					<div class="clear"></div>
				</div>				
			</div>
			
		<?php else: ?>
			<div id="top-page-logo">
				<?php magone_blog_title(); ?>
			</div>
		<?php endif; ?>

		</div>
	</div>
</div><!-- end of .auto-height.top-page-wrapper -->
<div class="clear"></div>


<div class="section shad header-bg" id="header-section">
	<div class="widget header no-title" id="header-content">
		<?php 
		get_header('menu-toggle-button');
		get_header( 'woocommerce' );
		?>
						
	</div><!-- end of #header-content -->

	<?php get_header('main-menu'); ?>

	<div class="clear"></div>
</div>


			