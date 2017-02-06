<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>


<div class="section section-info section-payment-recieved">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
	</div>
</div>

<div class="section section-default">

	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="well well-reciept">

					<?php if ( $order ) : ?>

						<?php if ( $order->has_status( 'failed' ) ) : ?>

							<h1 class="woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></h1>

							<p class="woocommerce-thankyou-order-failed-actions">
								<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
								<?php if ( is_user_logged_in() ) : ?>
									<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
								<?php endif; ?>
							</p>

						<?php else : ?>

							<h1 class="woocommerce-thankyou-order-received title">
								<?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ) ); ?>	
								</h1>

						<?php endif; ?>

						<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
						<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

					<?php else : ?>

						<h1 class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></h1>

					<?php endif; ?>
					
					<p>  Du har modtaget en email indeholdende loginoplysninger til siden her, hvor du under “min konto” altid vil kunne se aktive køb og anden relevant information.  </p>
					<p>Bark by barko er en online hundeskole, hvor du kan få hjælp, søge viden, eller blot blive inspireret i en lang række emner som omhandler både træning, tricks, pleje og generel omgang med menneskets bedste ven. Hundeskolen tager også fat i en række adfærdsproblemer, og gør dig klogere på hundens generelle adfærd.</p>
					<p><a class="btn btn-primary btn-lg" href="#">Kom igang nu. Klik her</a></p>
					<small><em>Såfremt du ønsker at stoppe dit medlemskab efter den oplyste prøveperiode, skal du aktivt selv afmelde dette under ’Min konto’ på www.barkbybarko.dk inden næste fornyelse.</em></small>

 

				</div>
			</div>
		</div>
	</div>
</div>
