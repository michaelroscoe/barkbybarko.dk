<?php
/**
 * Description: Page Template
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

<?php if ( is_wc_endpoint_url( 'order-received' ) ) : 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
else: ?>

    <div class="section section-default">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();
                        // Include the content
                        the_content();
                        // End of the loop.
                        endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>