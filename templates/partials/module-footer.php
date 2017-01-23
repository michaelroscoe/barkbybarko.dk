<div class="section section-primary section--footer">
    <div class="container">
        <div class="row row-primary">
            <div class="col-md-7">
                <p class="h4"><?php the_field( 'global_footer_notice', 'options' ); ?></p>
                <p class="small"><?php the_field( 'global_footer_copyright', 'options' ); ?></p>
            </div>
            <div class="col-md-5 text-right">
                <p class="h4"><?php the_field( 'global_email', 'options' ); ?></p>
                <p class="small"><?php the_field( 'global_company', 'options' ); ?>, <?php the_field( 'global_address', 'options' ); ?>, <?php the_field( 'global_zipcode', 'options' ); ?> <?php the_field( 'global_city', 'options' ); ?>. CVR: <?php the_field( 'global_vat', 'options' ); ?></p>
            </div>
        </div>
        <div class="row row-secondary">
            <div class="col-md-8 small">
                 <?php
                    wp_nav_menu( 
                        array(
                          'menu'              => 'Footer Navigation Primary',
                          'theme_location'    => 'footer_navigation_primary',
                          'depth'             => 1,
                          'container'         => 'ul',
                          'container_class'   => '',
                          'container_id'      => '',
                          'menu_class'        => ''
                        )
                    );
                ?>
            </div>
            <div class="col-md-4 small text-right">
                 <?php
                    wp_nav_menu( 
                        array(
                          'menu'              => 'Footer Navigation Secondary',
                          'theme_location'    => 'footer_navigation_secondary',
                          'depth'             => 1,
                          'container'         => 'ul',
                          'container_class'   => '',
                          'container_id'      => '',
                          'menu_class'        => ''
                        )
                    );
                ?>
            </div>
        </div>
    </div>
</div>
