<?php

/**
 * Remove singular post type support
 * @link https://developer.wordpress.org/reference/hooks/admin_init/
 * @link https://developer.wordpress.org/reference/functions/remove_post_type_support/
 */

add_action('admin_init', function () {
        // Posts
        remove_post_type_support('post', 'editor');
        remove_post_type_support('post', 'author');
        remove_post_type_support('post', 'thumbnail');
        remove_post_type_support('post', 'excerpt');
        remove_post_type_support('post', 'trackbacks');
        remove_post_type_support('post', 'custom-fields');
        remove_post_type_support('post', 'comments');
        
        // Pages
        // remove_post_type_support('page', 'editor');
        remove_post_type_support('page', 'author');
        remove_post_type_support('page', 'thumbnail');
        // remove_post_type_support('page', 'page-attributes');
        remove_post_type_support('page', 'custom-fields');
        remove_post_type_support('page', 'comments');
        remove_post_type_support('page', 'revisions');
});
