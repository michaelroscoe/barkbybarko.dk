<?php

add_filter('stylesheet', function ($stylesheet) {
    return dirname($stylesheet);
});

add_action('after_switch_theme', function () {
    $stylesheet = get_option('stylesheet');
    if (basename($stylesheet) !== 'templates') {
        update_option('stylesheet', $stylesheet . '/templates');
    }
});

add_action('customize_render_section', function ($section) {
    if ($section->type === 'themes') {
        $section->title = wp_get_theme(basename(__DIR__))->display('Name');
    }
}, 10, 2);

$theme_includes  = [
    'src/theme-setup.php'
];

$backend_includes = [
    'src/modules/add-custom-post-type.php',   
    'src/modules/remove-update-footer.php',    
    'src/modules/remove-dashboard-items.php',
    'src/modules/remove-update-notice.php',
    'src/modules/remove-emoji-icons.php',
    'src/modules/remove-meta-boxes.php',
    'src/modules/remove-help-tabs.php',
    'src/modules/remove-howdy.php',
    'src/modules/remove-menu-items.php',
    'src/modules/remove-singular-support.php',
    'src/modules/remove-toolbar-items.php',
    'src/modules/remove-user-roles.php',
    'src/modules/remove-user-schemes.php',
    'src/modules/update-wp-head.php',
    'src/modules/update-footer-label.php'
];

$includes = array_merge($theme_includes, $backend_includes);

array_walk($includes, function ($file) {
    if (!locate_template($file, true, true)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'barko'), $file), E_USER_ERROR);
    }
});