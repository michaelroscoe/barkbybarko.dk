<?php
/**
 * Template Name: Landingpage Template
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
__( 'Landingpage Template ', 'barko' );

get_header();
get_template_part('partials/module', 'header'); 

// vars
$product_type = get_field( 'landingpage_product_type');
$product_id = get_field( 'landingpage_product_id');
$product_ids = get_field( 'landingpage_product_ids');
$add_order_comments = get_field( 'landingpage_add_order_comments');
$order_comment_label = get_field( 'landingpage_order_comment_label');
$order_comment_placeholder = get_field( 'landingpage_order_comment_placeholder');
$add_page_header = get_field( 'landingpage_add_page_header');
$page_title = get_field( 'landingpage_page_title');
$page_subtitle = get_field( 'landingpage_page_subtitle');
$page_description = get_field( 'landingpage_page_description');
$page_video = get_field( 'landingpage_page_video');
$add_page_faqs = get_field( 'landingpage_add_page_faqs');
$faq_title = get_field( 'landingpage_faq_title');
$faqs = get_field( 'landingpage_faqs');
$disclaimer = get_field( 'landingpage_disclaimer' ); ?>

<?php if ( !$add_order_comments ) : ?>
  <style>
    .woocommerce-shipping-fields {
      display:none;
    }
  </style>
<?php endif; ?>


<?php if( $add_page_header ) : ?>

  <div class="section section-base section-product-intro">
      <div class="container">
          <div class="col-md-6">

              <?php if( $page_title ) : ?>
                <h1 class="brand"><?php echo $page_title ?></h1>
              <?php endif; ?>

              <?php if( $page_subtitle ) : ?>
                <h2 class="brand"><?php echo $page_subtitle ?></h2>
              <?php endif; ?>

              <?php if( $page_description )  : ?>
                <?php echo $page_description ?>
              <?php endif; ?>

          </div>
          <div class="col-md-6">
              <div class="embed-responsive embed-responsive-16by9 embed-responsive-asset">
                <?php echo $page_video ?>
            </div>
        </div>
    </div>
  </div>

<?php endif; ?>

<div class="section section-light section-product-info <?php if( $add_page_header ) : ?> section-has-header <?php endif; ?><?php if( $add_page_comments ) : ?> hide-comments <?php endif; ?>">
    <div class="container">
        <div class="row no-gutter">
            <div class="col-md-5 col-lg-6">
                <div class="well well-default">

                <div class="wcopc">
                  
                  <?php the_field( 'landingpage_page_content' ); ?>

                </div>
                 </div>
                      
                <?php if( have_rows('landingpage_faqs') ):  $i = 0; ?>
                  <div class="row hidden-xs hidden-sm">
                        <div class="col-md-12">
                            <div class="panels">
                              <h4 class="h4"><?php the_field('landingpage_faq_title'); ?></h4>
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                      <?php while ( have_rows('landingpage_faqs') ) : the_row(); ?>
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
                </div>
                </div>
                </div>


                <?php if ( have_posts()  ) : ?>
                  <div class="col-md-7 col-lg-6">
                      <div class="well well-info">

                          <?php
                          
                          while ( have_posts() ) : the_post(); 
                            $product_type = get_field( 'landingpage_product_type' );

                            if ( $product_type == 'single_product' ) :

                              $product_id = get_field( 'landingpage_product_id' ); 
                              $shortcode = sprintf(
                                  '[woocommerce_one_page_checkout template="product-single" product_ids="%1$s"]',
                                  $product_id
                              );
                              echo do_shortcode( $shortcode );


                            elseif ( $product_type == 'list_products' ) :

                              $product_ids = get_field( 'landingpage_product_ids' ); 
                              $shortcode = sprintf(
                                  '[woocommerce_one_page_checkout template="product-list" product_ids="%1$s"]',
                                  $product_ids
                              );
                              echo do_shortcode( $shortcode );

                            endif; 
                            
                          endwhile;
                          ?>
                      </div>
                  </div>
                <?php endif ;?>
            </div>
            
            <?php if ( $disclaimer ) : ?>
              <div class="row row-disclaimer">
                <div class="col-md-offset-2 col-md-8 text-center">
                  <p class="small"><?php echo $disclaimer; ?></p>
                </div>
              </div>
            <?php endif ;?>


        </div>
    </div>

    <?php get_template_part('partials/module', 'footer'); ?>
    <?php get_footer(); ?>