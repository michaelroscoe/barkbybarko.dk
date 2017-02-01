<?php
/**
 *  Description:
 *
 *  * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Barko
 * @subpackage barkbybarko.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher
 * @link https://mikkeltschentscher.dk
 */
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <?php echo _x( 'Sorteret efter nyeste først', 'label', 'barko' ); ?>
        </div>
        <div class="col-md-6 text-right">
            <?php 
                $pagenum = $wp_query->query_vars['paged'] < 1 ? 1 : $wp_query->query_vars['paged'];
                $first = ( ( $pagenum - 1 ) * $wp_query->query_vars['posts_per_page'] ) + 1;
                $last = $first + $wp_query->post_count - 1;
                echo "Viser $first - $last af $wp_query->found_posts videoer";
            ?>
        </div>
    </div>
</div>