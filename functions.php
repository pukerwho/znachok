<?php
include('inc/enqueues.php');
// require_once get_template_directory() . '/inc/TGM/example.php';

function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support('woocommerce');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/product-meta.php';
}

require_once get_template_directory() . '/inc/woocommerce-functions/znachok-functions.php';

function znachok_scripts() {
    wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/css/tailwind.css', false, time() );
    wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/build/css/swiper.css', false, time() );
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/css/styles.css', false, time() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/js/all.js', '','',true);
};
add_action( 'wp_enqueue_scripts', 'znachok_scripts' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

register_nav_menus( array(
    'head_menu' => 'Меню в шапке',
    'lang_header' => 'Lang Header'
) );

//CARBON FIELDS + WPML
function crb_get_i18n_suffix() {
    $suffix = '';
    if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
        return $suffix;
    }
    $suffix = '_' . ICL_LANGUAGE_CODE;
    return $suffix;
}

function crb_get_i18n_theme_option( $option_name ) {
    $suffix = crb_get_i18n_suffix();
    return carbon_get_theme_option( $option_name . $suffix );
}