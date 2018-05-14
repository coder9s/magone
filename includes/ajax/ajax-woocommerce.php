<?php
function magone_get_current_cart_info() {
    global $woocommerce;

    if ( get_option( 'woocommerce_tax_display_cart' ) == 'excl' || $woocommerce->customer->is_vat_exempt() ) {
        $subtotal = $woocommerce->cart->subtotal_ex_tax;
    }
    else {
        $subtotal = $woocommerce->cart->subtotal;
    }

    $items = 0;

    if (get_theme_mod( 'minicart-total-items' ) ) {
        foreach ( $woocommerce->cart->get_cart() as $item ) {
            $items += $item['quantity'];
        }
    }
    else {
        $items = count( $woocommerce->cart->get_cart() );
    }

    return array(
        $items,
        $subtotal,
        get_woocommerce_currency_symbol()
    );
}

function magone_add_to_cart_success_ajax( $datas ) {
    global $woocommerce;

    list( $cart_items, $cart_subtotal, $cart_currency ) = magone_get_current_cart_info();

	// auto update mini cart number
    $datas['#cart-toggle .mini-cart-number-item'] = '<span class="mini-cart-number-item">(<strong>' . $cart_items . '</strong>)</span>';
	
    return $datas;
}
add_filter( 'add_to_cart_fragments', 'magone_add_to_cart_success_ajax' );
