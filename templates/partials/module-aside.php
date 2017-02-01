<?php
/**
 * Description:
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

// vars
$ad = get_field( 'global_single_video_ad', 'barko' ); 
$ad_size = 'large';
$ad_url = get_field( 'global_archive_ad_url', 'barko' ); 

?>

<aside class="col-md-4 aside">

    <?php if ( $ad ) : ?>
        <a href="<?php echo $ad_url; ?>"><?php echo wp_get_attachment_image( $ad, $ad_size,  false, array( 'class' => 'img-responsive ad-aside' ) ); ?></a>
    <?php endif; ?>
                
    <?php $posts = get_posts( array( 'posts_per_page'    => 5, 'post_type'         => 'video' )); if( $posts ): ?>
            <p class="h4"><?php _e( 'Nyeste videoer', 'barko' ); ?></p>
            <ul class="post-list">
                <?php foreach( $posts as $post ): setup_postdata( $post ); $video_date = get_the_date(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <span><?php echo $video_date; ?><?php the_tags( __( ' | Tags: ', 'barko' ), ', ', '' ); ?> </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <ul class="post-list">
        <?php 
            wp_list_categories( 
                array(
                    'child_of'            => 0,
                    'current_category'    => 0,
                    'depth'               => 0,
                    'echo'                => 1,
                    'exclude'             => '',
                    'exclude_tree'        => '',
                    'feed'                => '',
                    'feed_image'          => '',
                    'feed_type'           => '',
                    'hide_empty'          => 1,
                    'hide_title_if_empty' => false,
                    'hierarchical'        => false,
                    'order'               => 'ASC',
                    'orderby'             => 'name',
                    'separator'           => '',
                    'show_count'          => 1,
                    'show_option_all'     => '',
                    'show_option_none'    => __( 'No categories' ),
                    'style'               => 'list',
                    'taxonomy'            => 'category',
                    'title_li' => '<p class="h4">' . __( 'Kategorier: ', 'barko' ) . '</p>',
                    'use_desc_for_title'  => 1,
                )
            ); 
        ?> 
    </ul>

</aside>