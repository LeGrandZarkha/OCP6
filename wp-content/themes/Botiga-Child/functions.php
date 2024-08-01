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

// Explication de la fonction
//
// add_filter ajoute un nouveau filtre où wp_nav_menu_items est le nom du filtre et
// add_extra_item_to_nav_menu est la fonction qui est appelée pour traiter le filtre.
// 10 est la priorité du filtre (plus la valeur est basse, plus le filtre est appliqué tôt)
// 2 est le nombre d'arguments que la fonction accepte.
//
// $items contient le contenu actuel du menu de navigation
// $args contient des informations sur le menu en cours de génération comme son nom, etc...
//
// Condition if (is_user_logged_in() && $args->menu == 'menu-header') :
// is_user_logged_in() verifie si l'utilisateur est connecté (si il a une session active)
// $args->menu est une propriété de l'objet $args et qui contient le nom du menu en cours de genration
// Si le nom du menu est égal a 'menu-header' alors elle retourne true, et valide la condition
//
// $items .= '...' ajoute un nouvel élément de menu à la fin du menu actuel, ici donc 'Admin'
//
// Enfin, on concatene get_admin_url() à href=' pour ajouter le lien d'administration wp


add_filter('wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2);

function add_extra_item_to_nav_menu($items, $args)
{
    //die(var_dump($args));
    if (is_user_logged_in() && $args->menu == 'menu-header') {
        $items .= '<li class="menu-item menu-item-type-custom menu-item-object-custom parent botiga-dropdown-li hfe-creative-menu"><a href="' . get_admin_url() . '">Admin</a></li>';
    }
    return $items;
}
