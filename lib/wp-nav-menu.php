<?php
// Displays a navigation menu.
// $list_menus = wp_get_nav_menus();
// echo '<pre>';
// print_r($list_menus);                // display all registered themes menus
// echo '</pre>';

wp_nav_menu(array(
    'menu'              => 'Primary',
    // 'theme_location'    => 'Primary',
    'depth'             => 2,                                           // opts - 1 | 2 | 3
    'container'         => 'div',
    // 'container_class'   => 'collapse navbar-collapse',
    // 'container_id'      => 'bs-example-navbar-collapse-1',
    'menu_class'        => 'nav navbar-nav',                            // opts - list-unstyled 
    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
    'walker'            => new WP_Bootstrap_Navwalker(),
));

/* 
 * Add a class in menu's <a> element
 */
// function add_menuclass($ulclass) {
//     return preg_replace('/<a /', '<a class="list-group-item"', $ulclass);
// }
// add_filter('wp_nav_menu','add_menuclass');
