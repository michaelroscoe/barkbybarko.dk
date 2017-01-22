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
get_header(); ?>

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
    
<?php get_footer(); ?>