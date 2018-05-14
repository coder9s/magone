<?php
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() && !is_cart() && !is_checkout()) : ?>
<div class="woo-mini-cart">
	<?php
		list( $cart_items, $cart_subtotal, $cart_currency ) = magone_get_current_cart_info();		
	?>	
	<a class="header-button toggle-button no-mobile" id="cart-toggle" href="javascript:void(0)">
		<span class="inner">
			<span><?php esc_html_e('CART', 'magone'); ?></span>
			<?php 
			echo '<span class="mini-cart-number-item">';
			if ( $cart_items ) {
				echo '(<strong>' . $cart_items . '</strong>)';
			}
			echo '</span>';
			?> 
			<i class="fa fa-shopping-cart color"></i>
			<span class="arrow border"></span>
		</span>
	</a>
	<a id="cart-toggle-mobile" class="header-button toggle-button mobile" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
		<span class="inner">
			<i class="fa fa-shopping-cart color"></i> 			
		</span>
	</a>
	
	<div class="woo-mini-cart-very-right">	
		<div id="magone-mini-cart">
			<div id="magone-mini-cart-widget">
				<?php the_widget('WC_Widget_Cart'); ?>
			</div>
		</div>
	</div>
</div>
<?php 
endif;