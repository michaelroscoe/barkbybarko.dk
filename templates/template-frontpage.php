<?php
/**
 * Template Name: Frontpage Template
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
__( 'Frontpage Template ', 'barko' );

get_header();
get_template_part('partials/module', 'header'); ?>


<div class="section section-default">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="brand"><?php the_field( 'frontpage_intro_title' ); ?></h1>
        <h2 class="brand"><?php the_field( 'frontpage_intro_subtitle' ); ?></h2>
        <p><?php the_field( 'frontpage_intro_description' ); ?></p>
        <div class="row">
          <div class="col-md-5">
            <a href="<?php the_field( 'frontpage_intro_btn_url' ); ?>" class="btn btn-block btn-lg btn-primary" title="<?php the_field( 'frontpage_intro_btn_text' ); ?>"><?php the_field( 'frontpage_intro_btn_text' ); ?></a>
          </div>
          <div class="col-md-7">

          <?php if ( $user_ID ) { ?>

        

    <a href="<?php the_field( 'global_account_url', 'options' ); ?>"><?php _e( 'Hej', 'barko' ); ?> <?php global $current_user; get_currentuserinfo(); echo $current_user->user_firstname; ?>&nbsp;<?php echo $current_user->user_lastname;  ?></a>
            <p><?php _e( 'Du er allerede logget ind. ', 'barko' ); ?> <a href="<?php echo wp_logout_url( get_permalink() ); ?>"><?php _e( 'Log ud', 'barko' ); ?></a></p>
<?php } else {   ?>
    <a href="<?php the_field( 'global_login_url', 'options' ); ?>" class="btn btn-lg btn-default"><?php _e( 'Log ind', 'barko' ); ?></a>
<?php } ?>

            
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="embed-responsive embed-responsive-16by9 embed-responsive-asset">
          <?php the_field( 'frontpage_intro_video' ); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section section-primary">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="h1 brand"><?php the_field( 'frontpage_about_title' ); ?></h2>
        <p><?php the_field( 'frontpage_about_description' ); ?></p>
        <a href="<?php the_field( 'frontpage_about_btn_url' ); ?>" class="btn btn-lg btn-default" title="<?php the_field( 'frontpage_about_btn_text' ); ?>"><?php the_field( 'frontpage_about_btn_text' ); ?></a>
      </div>
      <div class="col-md-6">
        <div class="embed-responsive embed-responsive-16by9">
          <?php the_field( 'frontpage_about_video' ); ?>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="section section-default">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <h2 class="h1 brand"><?php the_field( 'frontpage_list_title' ); ?></h2>
        <br>

            <?php if( have_rows('frontpage_list_items') ): ?>
            <ol class="list-questions">
            <?php while ( have_rows('frontpage_list_items') ) : the_row(); ?>

                  <li><?php the_sub_field('list_item'); ?></li>

                <?php endwhile; ?>
             </ol>
            <?php endif; ?>
      </div>
    </div>
  </div>
</div>


<div class="section section-info">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h1 brand text-center"><?php the_field('frontpage_testimonial_title'); ?></h2>
      </div>
      <?php if( have_rows('frontpage_testimonials') ): ?>
        <?php while ( have_rows('frontpage_testimonials') ) : the_row(); ?>
      <div class="col-md-6">
        <div class="well well-lg">
          <div class="row">
            <div class="col-md-4 col-hcard">

            <?php 
              $portrait = get_sub_field( 'portrait', 'options' );
              $portrait_size = 'thumbnail'; 
              echo wp_get_attachment_image( $portrait, $portrait_size,  false, array( 'class' => 'img-responsive img-testimonial' ) ); 
            ?>
             </figure>

              <?php the_sub_field('portrait'); ?>
              <ul class="list-unstyled">
                <li class="text-bold"><?php the_sub_field('name'); ?></li>
                <li><?php the_sub_field('city'); ?></li>
                <li><?php the_sub_field('date'); ?></li>
                <li class="text-muted small"><?php the_sub_field('status'); ?></li>
              </ul>
            </div>
            <div class="col-md-8">
              <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <h4><?php the_sub_field('title'); ?></h4>
              <p><?php the_sub_field('testimonial'); ?></p>
              <p class="text-muted small"><?php the_sub_field('puplished'); ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
       <?php endif; ?>
    </div>
  </div>
</div>


<div class="section section-default">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <h2 class="h1 brand text-center"><?php the_field('frontpage_faq_title'); ?></h2>


<?php if( have_rows('frontpage_faqs') ):  $i = 0; ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          

          
            <?php while ( have_rows('frontpage_faqs') ) : the_row(); ?>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
                <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>"><?php the_sub_field('faq_title'); ?></a></h4>
              </div>
              <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
                <div class="panel-body">
                  <?php the_sub_field('faq_description'); ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; ?>
      

        </div>
 <?php endif; ?>
      </div>
      <div class="col-md-12 text-center">
        <a href="<?php the_field('frontpage_faq_primary_btn_url'); ?>" class="btn btn-lg btn-primary" title="<?php the_field('frontpage_faq_primary_btn_text'); ?>"><?php the_field('frontpage_faq_primary_btn_text'); ?></a>
        <a href="<?php the_field('frontpage_faq_secondary_btn_url'); ?>" class="btn btn-lg btn-default" title="<?php the_field('frontpage_faq_secondary_btn_text'); ?>"><?php the_field('frontpage_faq_secondary_btn_text'); ?></a>
      </div>
    </div>
  </div>
</div>


<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>