<?php 

 /**
 * Register custom post type
 * @link https://developer.wordpress.org/reference/hooks/init/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @link https://generatewp.com/post-type/
 */

add_action('init', function () {
    // Set label variables
    $label_plural = 'Videos';
    $label_singular = 'Video';
    $label_description = 'Video Content';
    // Set labels
    $labels = [
        'name'                  => _x($label_plural, 'Post Type General Name', 'barko'),
        'singular_name'         => _x($label_singular, 'Post Type Singular Name', 'barko'),
        'menu_name'             => __($label_plural, 'barko'),
        'name_admin_bar'        => __($label_singular, 'barko'),
        'archives'              => __($label_singular . ' Archives', 'barko'),
        'parent_item_colon'     => __('Parent ' . $label_singular . ':', 'barko'),
        'all_items'             => __('All ' . $label_plural, 'barko'),
        'add_new_item'          => __('Add New ' . $label_singular, 'barko'),
        'add_new'               => __('Add New', 'barko'),
        'new_item'              => __('New ' . $label_singular, 'barko'),
        'edit_item'             => __('Edit ' . $label_singular, 'barko'),
        'update_item'           => __('Update ' . $label_singular, 'barko'),
        'view_item'             => __('View ' . $label_singular, 'barko'),
        'search_items'          => __('Search ' . $label_singular, 'barko'),
        'not_found'             => __('Not found', 'barko'),
        'not_found_in_trash'    => __('Not found in Trash', 'barko'),
        'featured_image'        => __('Featured Image', 'barko'),
        'set_featured_image'    => __('Set featured image', 'barko'),
        'remove_featured_image' => __('Remove featured image', 'barko'),
        'use_featured_image'    => __('Use as featured image', 'barko'),
        'insert_into_item'      => __('Insert into ' . strtolower($label_singular), 'barko'),
        'uploaded_to_this_item' => __('Uploaded to this ' . strtolower($label_singular), 'barko'),
        'items_list'            => __($label_plural . ' list', 'barko'),
        'items_list_navigation' => __($label_plural . ' list navigation', 'barko'),
        'filter_items_list'     => __('Filter ' . strtolower($label_plural) . ' list', 'barko')
    ];
    // Set arguments/config
    $config = [
        'label'                 => __($label_plural, 'barko'),
        'description'           => __($label_description, 'barko'),
        'labels'                => $labels,
        'supports'              => ['title'],
        'rewrite'            => array( 'slug' => 'videoer' ),
        'hierarchical'          => false, 
        'public'                => true,
        'taxonomies'  => array( 'category', 'post_tag' ),
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post'
    ];
    // Register post type
    register_post_type('video', $config);
});


function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'video'
        ));
      return $query;
    }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );