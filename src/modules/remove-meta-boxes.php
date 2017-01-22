<?php 
/**
 * Remove unused meta boxes
*/
if (!current_user_can('update_core')) {
    add_action('admin_menu', function () {
        remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
        remove_meta_box( 'commentsdiv', 'post', 'normal' );
    });
}