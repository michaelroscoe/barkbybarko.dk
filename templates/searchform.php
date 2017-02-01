<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<form class="form-inline" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
     <div class="form-group">
            <label class="sr-only" ><?php echo _x( 'Søg efter:', 'label', 'barko' ); ?></label>
            <input type="search" class="form-control"  placeholder="<?php echo esc_attr_x( 'Søg &hellip;', 'placeholder', 'barko' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </div>
    <button type="submit" class="btn btn-primary" ><span class="sr-only"><?php echo _x( 'Søg', 'submit button', 'barko' ); ?></span><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
