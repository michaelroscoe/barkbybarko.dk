<?php
/**
 * Description: Post Archive
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

<div class="section section-default section-archive">
    <div class="container">
        <div class="row">

            <?php get_template_part('partials/snippet', 'archive-header'); ?>

            <div class="col-md-8">
                <div class="row">
                    <?php get_template_part('partials/snippet', 'archive-count'); ?>
                    <div class="col-md-12">
                        <hr>
                        <?php
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'partials/single', 'video-excerpt' );
                                endwhile;
                                get_template_part('partials/snippet', 'archive-navigation');
                            endif;
                        ?>
                    </div>
                </div>
            </div>

            <?php get_template_part('partials/module', 'aside'); ?>
            
        </div>
    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>