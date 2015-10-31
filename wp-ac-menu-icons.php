<?php

/*
  Plugin Name: WP AC Menu Icons
  Plugin URI: https://github.com/ambercouch/wp_save_tweets
  Description: SVG Icons for WprdPress custom menus.
  Version: 0.1
  Author: Richie Ambercouch
  Author URI: http://ambercouch.co.uk
 */

//filter the menu output
add_filter('wp_nav_menu_objects', 'icon_menu', 10, 2);

function icon_menu($sorted_menu_objects, $args)
{
    foreach ($sorted_menu_objects as $menu_object) {
        if (substr($menu_object->description, 0, 5) === "#icon") {
            $class = strtolower(str_replace('#', '', $menu_object->description));
            $menu_object->title = '<div class="menu__icon"><svg preserveAspectRatio="none" class="' . $class . ' icon--svg"><use class="icon__use--hover-off"  xlink:href="' . $menu_object->description . '" /><use class="icon__use--hover-on"  xlink:href="' . $menu_object->description . '--rgb" /></svg></div><span class="menu__title">' . $menu_object->title . '</span>';
        }
    }
    return $sorted_menu_objects;
}