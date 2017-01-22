<?php
/**
 * Template to display product selection fields in a list
 *
 * @package WooCommerce-One-Page-Checkout/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<p class="h4">Din bestilling</p>
<ul class="list-unstyled" id="checkout-products">
	<?php foreach( $products as $product ) : ?>
	<li class="product-item <?php if ( $product->in_cart ) echo 'selected'; ?>" >
		<?php wc_get_template( 'checkout/add-to-cart/radio.php', array( 'product' => $product ), '', PP_One_Page_Checkout::$template_path );; ?>
		<?php echo $product->get_title(); ?>
	</li>
	<?php endforeach; // end of the loop. ?>
</ul>