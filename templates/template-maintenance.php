<?php
/**
 * Template name: Maintenance Template 
 *
 * @package Barko
 * @subpackage barkobark.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher, hello@mikkeltschentscher.dk
 * @link https://mikkeltschentscher.dk
 *
 */
__( 'Maintenance Template ', 'barko' );

get_header();?>

<main class="container container-splash">
  <section class="row">
    <article class="col-md-12">
      <header>
        <h1><?php _e( 'Kommer Snart', 'barko' ); ?></h1>
      </header>
      <p class="lead"><?php _e( 'Vi lancerer d. 1. marts 2017. Vi glæder os til at byde dig velkommen', 'barko' ); ?></p>
    </article>
  </section>
</main>

<?php get_footer(); ?>