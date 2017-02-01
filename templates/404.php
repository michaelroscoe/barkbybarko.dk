<?php
/**
 * Description: 404 Templates
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barko
 * @subpackage barkbybarko.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher
 * @link https://mikkeltschentscher.dk
 *
 */
get_header();
get_template_part('partials/module', 'header'); ?>

<div class="section section-default">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="brand"><?php _e( 'Fejl 404 - Siden kunne ikke findes', 'barko' ); ?></h1>
                <p class="lead"><?php _e( 'Den side, du leder efter, eksisterer desværre ikke længere', 'barko' ); ?>.</p>
                <a class="btn btn-primary" href="<?= esc_url(home_url('/')); ?>" title="Gå tilbage til forsiden"><?php _e( 'Gå tilbage til forside', 'barko' ); ?>n</a>
            </div>
        </div>
    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>