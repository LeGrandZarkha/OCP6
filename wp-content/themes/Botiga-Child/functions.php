<?php

/**
 * Botiga functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Botiga
 */



// Masque l'option d'édition des articles en bas de la page

add_filter('get_edit_post_link', 'my_edit_post_link');
function my_edit_post_link()
{
    return;
}


add_filter('wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2);

function add_extra_item_to_nav_menu($items, $args)
{
    //die(var_dump($args));
    if (is_user_logged_in() && $args->menu == 'menu-header') {
        $items .= '<li class="menu-item menu-item-type-custom menu-item-object-custom parent botiga-dropdown-li hfe-creative-menu"><a href="' . get_admin_url() . '">Admin</a></li>';
    }
    return $items;
}
