<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p>Har du fået tilbudt et speciel tilbud i forbindelse med din oprettelse, vil denne blive leveret inden for den angivende tidshorisont.</p>
<p><b>  Herunder finder du dine loginoplysninger:</b></p>

<ul>
    <li><?php printf( __( 'Dit brugernavn er: %s', 'woocommerce' ), esc_html( $blogname ), esc_html( $user_login ) ); ?></li>
    <li>Dit password er selvvalgt</li>
</ul>

<p><?php printf( __( 'You can access your account area to view your orders and change your password here: %s.', 'woocommerce' ), make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); ?></p>

<p>Bark by barko er en online hundeskole, hvor du kan få hjælp, søge viden, eller blot blive inspireret i en lang række emner som omhandler både træning, tricks, pleje og generel omgang med menneskets bedste ven. Hundeskolen tager også fat i en række adfærdsproblemer, og gør dig klogere på hundens generelle adfærd.</p>
<small><em>Såfremt du ønsker at stoppe dit medlemskab efter den oplyste prøveperiode, skal du aktivt selv afmelde dette under <a href="<?php the_field( 'global_account_url', 'options'); ?>">’Min konto’</a> på <a href="<?= esc_url(home_url('/')); ?>">www.barkbybarko.dk</a> inden næste fornyelse.</em></small>


<?php do_action( 'woocommerce_email_footer', $email );
