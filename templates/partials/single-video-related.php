<?php
/**
 * Description: Single Video Related Post
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Barko
 * @subpackage barkbybarko.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher
 * @link https://mikkeltschentscher.dk
 */

// vars
$video_title = get_field( 'single_video_title' ); 
$video_content = get_field( 'single_video_content' );
$video_oembed = get_field( 'single_video_oembed' );
$video_placeholder = get_field( 'single_video_placeholder' );
$video_placeholder_standard = get_field( 'global_video_placeholder', 'options' );
$video_placeholder_size = 'video-placeholder-lg';
$video_date = get_the_date(); 
?>

<div class="col-md-3">
    <?php if ( $video_placeholder ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <figure class="featured-image">
                <?php echo wp_get_attachment_image( $video_placeholder, $video_placeholder_size,  false, array( 'class' => 'img-responsive img-placeholder' ) ); ?>
            </figure>
        </a>
    <?php elseif ( $video_oembed ) : ?>
        <div class="embed-responsive embed-responsive-16by9">
            <?php echo $video_oembed; ?>
        </div>
    <?php else : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <figure class="featured-image">
                <?php echo wp_get_attachment_image( $video_placeholder_standard, $video_placeholder_size,  false, array( 'class' => 'img-responsive img-placeholder' ) ); ?>
             </figure>
        </a>
    <?php endif; ?>
    
    <?php edit_post_link( __( 'Rediger video', 'barko' ), '<small>', '</small>'); ?>

    <?php if ( $video_title ) : ?>
        <h2 class="h4"><?php echo $video_title; ?></h2>
    <?php else: ?>
        <h2 class="h4"><?php the_title(); ?></h2>
    <?php endif ;?>
    <p><?php echo $video_date; ?><?php the_tags( __( ' | Tags: ', 'barko' ), ', ', '' ); ?> </p>

</div>