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
            wp_register_style( 'google_font_stack', 'https://fonts.googleapis.com/css?family=Lato:300,400,700%7CRoboto+Slab:300,400,700', array(), null, 'all' );
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

// https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
// Declare WooCommerce Setup
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



// Register a new image size.
// https://developer.wordpress.org/reference/functions/add_image_size/
add_image_size( 'video-placeholder-sm', 360, 202, true ); // hard crop mode
add_image_size( 'video-placeholder-lg', 720, 405, true ); // hard crop mode



function wc_ninja_remove_password_strength() {
    if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
        wp_dequeue_script( 'wc-password-strength-meter' );
    }
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );

// Remove “Category:”, “Tag:”, “Author:” from the_archive_title
// http://wordpress.stackexchange.com/questions/179585/remove-category-tag-author-from-the-archive-title
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
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

    global $post;
    if ( get_field( 'landingpage_add_order_comments', $post->ID ) ) :
         $label = get_field('landingpage_order_comment_label', $post->ID);
         $placeholder = get_field('landingpage_order_comment_placeholder', $post->ID);
         $fields['order']['order_comments']['label'] = $label;
         $fields['order']['order_comments']['placeholder'] = $placeholder;
    endif;


    $fields['account']['account_password']['label'] = 'Ønsket adgangskode';
     

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


// Limit search to post type
// http://www.wpbeginner.com/wp-tutorials/how-to-limit-search-results-for-specific-post-types-in-wordpress/
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('video'));
    }
return $query;
}

add_filter('pre_get_posts','searchfilter');

// https://wordpress.org/support/topic/how-to-remove-the-shopping-cart-icon-below-the-header/?replies=5
add_action( 'init', 'woa_remove_header_cart' );
 function woa_remove_header_cart() {
     remove_action( 'storefront_header', 'storefront_header_cart', 60 );
 }




    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'barko'),
        'primary_navigation_logged_in' => __('Primary Navigation Logged In', 'barko'),
        'footer_navigation_primary' => __('Footer Navigation Primary', 'barko'),
        'footer_navigation_secondary' => __('Footer Navigation Secondary', 'barko')
    ]);




    add_filter('nav_menu_css_class', 'custom_css_attribute_filter', 100, 1);
    add_filter('nav_menu_item_id', 'custom_css_attribute_filter', 100, 1);
    add_filter('page_css_class', 'custom_css_attribute_filter', 100, 1);

    function custom_css_attribute_filter($var) {
      return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
    }



    // Adds Twitter Bootstrap classes for responsive oembeds
    function bootstrap_wrap_oembed( $html ){
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        return'<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>'; 
    }
    add_filter( 'embed_oembed_html','bootstrap_wrap_oembed',10,1);




/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
    }
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            if ( $args->has_children )
                $class_names .= ' dropdown';
            if ( in_array( 'current-menu-item', $classes ) )
                $class_names .= ' active';
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
            $output .= $indent . '<li' . $id . $value . $class_names .'>';
            $atts = array();
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';
            // If item has_children add atts to a.
            if ( $args->has_children && $depth === 0 ) {
                $atts['href']           = '#';
                $atts['data-toggle']    = 'dropdown';
                $atts['class']          = 'dropdown-toggle';
                $atts['aria-haspopup']  = 'true';
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }
            $item_output = $args->before;
            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if ( ! empty( $item->attr_title ) )
                $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
                $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {
            extract( $args );
            $fb_output = null;
            if ( $container ) {
                $fb_output = '<' . $container;
                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';
                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';
                $fb_output .= '>';
            }
            $fb_output .= '<ul';
            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';
            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';
            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
            $fb_output .= '</ul>';
            if ( $container )
                $fb_output .= '</' . $container . '>';
            echo $fb_output;
        }
    }
}



    // Adds an options page for Advanced Custom Fields (Can have multiple)
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));

    }





 /**
  * Add product to cart on page load
  */
function add_product_to_cart() {
    if ( ! is_admin() ) {
        
        $product_type = get_field( 'landingpage_product_type');
            if ( $product_type == 'single_product' ) :
            $product_id =  get_field( 'landingpage_product_id');
            $variation_id = 0; // Set to 0 if no variation
            
            if ( empty( $product_id ) ) {
                return;
            }
            // Get WC Cart
            $cart = WC()->cart;

            // Empty WC Cart before adding items
            $cart->empty_cart();
            
            // Get WC Cart items
            $cart_items = $cart->get_cart();
            // Check if product is already in cart
            if ( 0 < count( $cart_items ) ) {
                foreach ( $cart_items as $cart_item_key => $values ) {
                    $_product = $values['data'];
                    // Product is already in cart, bail
                    if ( $_product->id == $product_id ) {
                        return;
                    }
                }
            }
            // Add product to cart
            $cart->add_to_cart( $product_id, 1, $variation_id );

            // Calculate totals
            $cart->calculate_totals();
            
            // Save cart to session
            $cart->set_session();
            
            // Maybe set cart cookies
            $cart->maybe_set_cart_cookies();
        endif;
    }
}
add_action( 'template_redirect', 'add_product_to_cart' );
