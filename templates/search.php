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

            <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <?php if ( have_posts() ) : ?>
                        <h1><?php printf( __( 'Søgeresultater for: %s', 'barko' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1><?php _e( 'Ingen resultater', 'barko' ); ?></h1>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
        </div>

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
                            else: 
                                get_template_part( 'partials/content', 'none' );
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