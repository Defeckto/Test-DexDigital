<?php


if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('procare_setup')) :

    function procare_setup()
    {

        load_theme_textdomain('loadoctor-blog', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'loadoctor-blog'),
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        add_theme_support(
            'custom-background',
            apply_filters(
                'procare_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}


add_action('after_setup_theme', 'procare_setup');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu()
{
    register_nav_menu('header', 'header_menu');
    register_nav_menu('footer', 'footer_menu');
    add_theme_support('title-tag');
}

function mythem_enqueue_style()
{
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_style('style-main', get_template_directory_uri() . '/assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'mythem_enqueue_style');

function scripts_theme()
{
    // // <!-- script.js --> 
    wp_enqueue_script('scripts-main', get_template_directory_uri() . '/assets/js/main.js');
}




add_shortcode('quote', 'shortcode_quote');
function shortcode_quote($atts, $content, $tag)
{
    return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
}
