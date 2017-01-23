<nav class="navbar navbar-default">
  <div class="container">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
        <div class="brand-logo"></div>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    
        <?php
        wp_nav_menu( array(
          'menu'              => 'primary navigation',
          'theme_location'    => 'primary navigation',
          'depth'             => 2,
          'container'         => 'ul',
          'container_class'   => '',
          'container_id'      => '',
          'menu_class'        => 'nav navbar-nav navbar-right',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
        ?>

         <form class="navbar-form navbar-right" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <div class="form-group">
            <label class="sr-only" ><?php echo _x( 'Search for:', 'label', 'skatein' ); ?></label>
            <input class="form-control" type="search"  required placeholder="<?php echo esc_attr_x( 'Skatepark, city or address', 'placeholder', 'skatein' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
          </div>
          <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        
    </div>
  </div>
</nav>