<article class="row row-video">
    <div class="col-md-6">

        <?php if ( get_field( 'single_video_placeholder' ) ) :
                $image = get_field('single_video_placeholder');
                $size = 'video-placeholder-lg';
        ?>
            <figure class="featured-image">
                <?php echo wp_get_attachment_image( $image, $size,  false, array( 'class' => 'img-responsive img-placeholder' ) ); ?>
            </figure>
        <?php elseif ( get_field( 'single_video_oembed' ) ) : ?>
            <div class="embed-responsive embed-responsive-16by9">
                <?php the_field( 'single_video_oembed' ); ?>
            </div>
        <?php else :  
            $image = get_field('global_video_placeholder', 'options');
            $size = 'video-placeholder-lg';
            echo wp_get_attachment_image( $image, $size,  false, array( 'class' => 'img-responsive img-placeholder' ) );
        endif; ?>

    </div>
    <div class="col-md-6">
        <p class="post-categories">Kategori: <a href="#">Hundeopdragelse</a>, <a href="#">Øvelser</a></p>
        
        <?php if ( get_field( 'single_video_title' ) ) : ?>
            <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_field( 'single_video_title' ); ?></a></h4>
        <?php else: ?>
            <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php endif ;?>

        
        <p class="post-meta">31. oktober 2016 | Niveau: <a href="#">Begynder</a></p>
        <p class="post-description">
            

        </p>
    </div>
</article>