<?php

namespace App\Theme;

define('THEME_ROOT', get_stylesheet_directory_uri());
define('THEME_PATH', get_stylesheet_directory());
define('IMAGES', THEME_ROOT . '/dist/img');
define('IMAGES_PATH', THEME_PATH . '/dist/img');
define('DIST', THEME_ROOT . '/dist');
define('DIST_PATH', THEME_PATH . '/dist');
define('THEME_PREFIX', 'wordpress-mix');

require_once('includes/WP_Bootstrap_Navwalker.php');

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\wp_enqueue_scripts');
add_action('init', __NAMESPACE__ . '\menus_image_sizes');
add_action('after_setup_theme', __NAMESPACE__ . '\theme_support');


/*
* Opt the theme into WordPress controlled title tags
* By opting into this feature the <title> element should be left out of <head>
* @since 4.1
*/
function theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function wp_enqueue_scripts()
{
    wp_enqueue_script(THEME_PREFIX.'-scripts', DIST . '/app.js', [], filemtime(DIST_PATH.'/app.js'));
    wp_enqueue_style(THEME_PREFIX.'-styles', DIST . '/app.css', [], filemtime(DIST_PATH.'/app.css'));
}

function menus_image_sizes()
{
    register_nav_menus([
        'navigation-menu' => 'Navigation Menu'
    ]);

    //Fullscreen image
    add_image_size('fullscreen', 1920, 1080);
}