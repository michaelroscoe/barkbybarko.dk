<?php
/**
 * Description: 
 *
 * @package Barko
 * @subpackage barkobark.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher, hello@mikkeltschentscher.dk
 * @link https://mikkeltschentscher.dk
 *
 */

// Add registered styles to the theme
add_action('wp_enqueue_scripts', function () {
            wp_register_style( 'google_font_stack', 'http://fonts.googleapis.com/css?family=Lato:300,400,700%7CRoboto+Slab:300,400,700', array(), null, 'all' );
	wp_enqueue_style( 'google_font_stack' );

            wp_register_style( 'main',  get_template_directory_uri() .'/dist/styles/main.css', array(), null, 'all' );
	wp_enqueue_style( 'main' );
});


// Add registered scripts to the theme
add_action('wp_enqueue_scripts', function () {

       wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery',  get_template_directory_uri() .'/dist/scripts/jquery.min.js', array(), null, 'all' );
        wp_enqueue_script( 'jquery' );


        wp_register_script( 'main',  get_template_directory_uri() .'/dist/scripts/main.min.js', array('jquery'), null, 'all' );
        wp_enqueue_script( 'main' );

});


// Remove Product Images
// http://wpsites.net/web-design/remove-woocommerce-single-thumbnail-images-from-product-details-page/
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


// Remove checkout fields
// https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    // unset($fields['order']['order_comments']);
    return $fields;
}
 

// Downloadables
// http://stackoverflow.com/questions/38666414/how-to-disable-downloadable-product-functionality-in-woocommerce
function cheapmaal_woocommerce_account_menu_items_callback($items) {
    unset( $items['downloads'] );
    return $items;
}
add_filter('woocommerce_account_menu_items', 'cheapmaal_woocommerce_account_menu_items_callback', 10, 1);




// Removes Scripts and styles from Woocommerce
function clean_woocommere_assets() {
    // Remove the generator tag
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
    // Unless we're in the store, remove all the cruft!
    if ( ! is_woocommerce() && ! is_cart()  ) {
        wp_dequeue_style( 'woocommerce_frontend_styles' );
        wp_dequeue_style( 'woocommerce-general');
        wp_dequeue_style( 'woocommerce-layout' );
        wp_dequeue_style( 'woocommerce-smallscreen' );
        wp_dequeue_style( 'woocommerce_fancybox_styles' );
        wp_dequeue_style( 'woocommerce_chosen_styles' );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_dequeue_style( 'woocommerce-one-page-checkout' );
        wp_dequeue_style( 'select2' );
        // wp_dequeue_script( 'wc-add-payment-method' );
        // wp_dequeue_script( 'wc-lost-password' );
        wp_dequeue_script( 'wc_price_slider' );
        // wp_dequeue_script( 'wc-single-product' );
        // wp_dequeue_script( 'wc-add-to-cart' );
        // wp_dequeue_script( 'wc-cart-fragments' );
        // wp_dequeue_script( 'wc-credit-card-form' );
        // wp_dequeue_script( 'wc-checkout' );
        // wp_dequeue_script( 'wc-add-to-cart-variation' );
        // wp_dequeue_script( 'wc-single-product' );
        // wp_dequeue_script( 'wc-cart' );
        // wp_dequeue_script( 'wc-chosen' );
        // wp_dequeue_script( 'woocommerce' );
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
        // wp_dequeue_script( 'jquery-blockui' );
        // wp_dequeue_script( 'jquery-placeholder' );
        // wp_dequeue_script( 'jquery-payment' );
        wp_dequeue_script( 'fancybox' );
        wp_dequeue_script( 'jqueryui' );
    }
}
add_action( 'wp_enqueue_scripts', 'clean_woocommere_assets', 99 );


// Skip cart and go to checkout
// http://stackoverflow.com/questions/38666414/how-to-disable-downloadable-product-functionality-in-woocommerce
add_filter('add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
 global $woocommerce;
 $checkout_url = $woocommerce->cart->get_checkout_url();
 return $checkout_url;
}


// https://wordpress.org/support/topic/how-to-remove-the-shopping-cart-icon-below-the-header/?replies=5
add_action( 'init', 'woa_remove_header_cart' );
 function woa_remove_header_cart() {
     remove_action( 'storefront_header', 'storefront_header_cart', 60 );
 }

