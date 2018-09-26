<?php

define('THEME_ROOT', get_stylesheet_directory_uri());
define('THEME_PATH', get_stylesheet_directory());
define('IMAGES', THEME_ROOT . '/dist/img');
define('IMAGES_PATH', THEME_PATH . '/dist/img');
define('DIST', THEMEROOT . '/dist');
define('DIST_PATH', THEMEPATH . '/dist');
define('THEME_PREFIX', 'wordpress-elixir');

require_once('includes/WP_Bootstrap_Navwalker.php');

class WordPressElixirTheme
{
    private static $self = false;

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'wp_enqueue_scripts']);
        add_action('init', [$this, 'menus_image_sizes']);
        add_action('after_setup_theme', [$this, 'theme_support']);
    }

    public static function getInstance()
    {
        if (!self::$self) {
            self::$self = new self();
        }
        return self::$self;
    }

    /*
    * Opt the theme into WordPress controlled title tags
    * By opting into this feature the <title> element should be left out of <head>
    * @since 4.1
    */
    public static function theme_support()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }

    public static function wp_enqueue_scripts()
    {
        wp_enqueue_script(THEME_PREFIX.'-scripts', DIST . '/app.js', [], filemtime(DIST_PATH.'/app.js'));
        wp_enqueue_style(THEME_PREFIX.'-styles', DIST . '/app.css', [], filemtime(DIST_PATH.'/app.css'));
    }

    public static function menus_image_sizes()
    {
        register_nav_menus([
            'navigation-menu' => 'Navigation Menu'
        ]);

        //Fullscreen image
        add_image_size('fullscreen', 1920, 1080);
    }

    public static function image($id, $size='', $icon='', $attr=[])
    {
        $img = wp_get_attachment_image($id, $size, $icon, $attr);
        $img = preg_replace('/(width|height)="\d*"\s/', "", $img);
        return $img;
    }
}

WordPressElixirTheme::getInstance();
