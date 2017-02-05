<?php
/**
 * Template to display a single product as per standard WooCommerce Templates
 *
 * @package WooCommerce-One-Page-Checkout/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$the_post_id = $post->ID;

foreach ( $products as $single_product ) :

	$product      = $single_product;
	$post         = $single_product->post;

	?>
	<div class="opc-single-product">

		<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

			
			<div class="summary entry-summary product-item <?php if ( $product->in_cart ) { echo 'selected'; } ?>">

				

				

					<?php do_action( 'wcopc_single_add_to_cart', $the_post_id ); ?>
				
			

			</div>


		</div>

	</div>
<?php endforeach; ?>

<?php wp_reset_postdata(); ?>
