<?php
/**
 * Description: Single Video Template
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
get_template_part('partials/module', 'header');

// vars video
$video_title = get_field( 'single_video_title' ); 
$video_content = get_field( 'single_video_content' );
$video_oembed = get_field( 'single_video_oembed' );
$video_date = get_the_date(); 

// vars ad
$ad = get_field( 'global_single_video_ad', 'options' ); 
$ad_size = 'large';
$ad_url = get_field( 'global_single_ad_url', 'options' ); 

// vars relations
$posts_tiltle = get_field( 'single_video_related_title'); 
$posts = get_field( 'single_video_related' );

?>

<div class="section section-gray section-video">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                      <?php echo $video_oembed; ?>
                  </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-7">
                <?php if ( $video_title ) : ?>
                    <h1 class="h4"><?php echo $video_title; ?></h1>
                <?php else: ?>
                    <h1 class="h4"><?php the_title(); ?></h1>
                <?php endif ;?>
                <p><?php echo $video_date; ?><?php the_tags( __( ' | Tags: ', 'barko' ), ', ', '' ); ?> </p>
            </div>
            
            <div class="col-md-5 text-right">
                    <p class="h4"><?php _e('Kategori: ', 'barko'); ?> <?php the_category( ', ' ); ?></p>
                    <?php edit_post_link( __( 'Rediger video', 'barko' ), '<p>', '</p>'); ?>
             </div>

        </div>
    </div>
</div>

<div class="section section-default section-tabs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="tab-container">

                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab"><?php _e( 'Videoinformation', 'barko' ); ?></a></li>
                  </ul>

                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="information">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $video_content; ?>
                                <?php if( $video_content ) : echo $video_content; else:  _e( 'Ingen videoinformation endnu', 'barko' ); edit_post_link( __( 'Rediger video', 'barko' ), '<p>', '</p>'); endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php if ( $ad ) : ?>
                                    <a href="<?php echo $ad_url; ?>"><?php echo wp_get_attachment_image( $ad, $ad_size,  false, array( 'class' => 'img-responsive ad-aside' ) ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>                        
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php if( $posts ): ?>
    <div class="section section-info section-related">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="h4"><?php if( $posts_title ) : echo $posts_title; else:  _e( 'Relaterede videoer', 'barko' ); endif; ?></p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <?php 
                    foreach( $posts as $post):
                        setup_postdata($post);
                        get_template_part('partials/single', 'video-related'); 
                    endforeach;
                ?>
            </div>
        </div>
    </div>
<?php wp_reset_postdata(); endif; ?>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>