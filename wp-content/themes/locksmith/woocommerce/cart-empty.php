<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version    2.5.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

?>

<p class="cart-empty"><?php esc_html__( 'Your cart is currently empty.', 'locksmith' ) ?></p>

<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<p class="return-to-shop"><a class="button wc-backward" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html__( 'Return To Shop', 'locksmith' ) ?></a></p>