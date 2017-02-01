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

<?php 
    the_posts_pagination( 
        array(
            'prev_text' => '<span>' . __( 'Forrige Side', 'barko' ) . '</span>',
            'next_text' => '<span>' . __( 'Næste Side', 'barko' ) . '</span>',
            'before_page_number' => '<span class="sr-only"></span>',
        )
    );
?>