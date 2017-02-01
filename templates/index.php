<?php
/**
 * Description: Main Template
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
                        <?php
                            the_archive_title( '<h1>', '</h1>' );
                            the_archive_description( '<p class="lead">', '</p>' );
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <?php get_template_part('partials/snippet', 'post-count'); ?>
                    <div class="col-md-12">
                        <hr>
                        <?php
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'partials/single', 'video-excerpt' );
                                endwhile;
                                the_posts_pagination( array(
                                    'prev_text' => '<span class="sr-only"></span>',
                                    'next_text' => '<span class="sr-only"></span>',
                                    'before_page_number' => '<span class="meta-nav sr-only"></span>',
                                ) );
                            endif;
                        ?>
                    </div>
                    <?php get_template_part('partials/snippet', 'post-count'); ?>
                </div>
            </div>
            <?php get_template_part('partials/module', 'aside'); ?>
        </div>
    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>