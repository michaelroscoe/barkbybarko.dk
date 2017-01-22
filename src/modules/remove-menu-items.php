<?php

/**
 * Remove menu items
 * @link https://developer.wordpress.org/reference/hooks/admin_init/
 * @link https://developer.wordpress.org/reference/functions/current_user_can/
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
 */
add_action('admin_init', function () {
        // Posts
        remove_menu_page('edit.php');
        remove_submenu_page('edit.php', 'post-new.php');
        remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
        remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');

        // Comments
       remove_menu_page('edit-comments.php');
});
