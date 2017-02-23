<?php
/**
 * Description: Header Module
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Barko
 * @subpackage barkbybarko.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher
 * @link https://mikkeltschentscher.dk
 */
?>


  <nav class="navbar navbar-default">
    <div class="container">
    
      <div class="navbar-header">
       <?php if ( !get_field( 'hide_nav', 'options' ) ) : ?>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only"><?php echo _x( 'Åben Navigation', 'label', 'barko' ); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <?php endif ; ?>

       <?php if ( !get_field( 'hide_nav', 'options' ) ) : ?>
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
          <div class="brand-logo"></div>
          </a>
        <?php else: ?>
          <div class="navbar-brand">
          <div class="brand-logo"></div>
          </div>
        <?php endif; ?>
      </div>
  
    <?php if ( !get_field( 'hide_nav', 'options' ) ) : ?>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      

      <?php if ( is_user_logged_in() ) { ?>

      <?php
          wp_nav_menu( array(
            'menu'              => 'Primary Navigation Logged In',
            'theme_location'    => 'primary_navigation_logged_in',
            'depth'             => 1,
            'container'         => 'ul',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
          ?>

       
  <form class="hidden-xs navbar-form navbar-right" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
       <div class="form-group">
              <label class="sr-only" ><?php echo _x( 'Søg efter:', 'label', 'barko' ); ?></label>
              <input type="search" class="form-control"  placeholder="<?php echo esc_attr_x( 'Søg &hellip;', 'placeholder', 'barko' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
          </div>
      <button type="submit" class="btn btn-default" ><span class="sr-only"><?php echo _x( 'Søg', 'submit button', 'barko' ); ?></span><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>


      
  <?php } else { ?>
     <?php
          wp_nav_menu( array(
            'menu'              => 'Primary Navigation',
            'theme_location'    => 'primary_navigation',
            'depth'             => 1,
            'container'         => 'ul',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
          ?>
      
  <?php } ?>

      </div>
      <?php endif; ?>
    </div>
  </nav>