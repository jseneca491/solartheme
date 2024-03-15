<?php
include_once( get_theme_file_path() . '/wp-essentials.php' );
?>

<?php if( file_exists( get_stylesheet_directory().'/jedi-apprentice/jedi-apprentice-import.php' ) && !defined('JEDI_APPRENTICE_PATH') ) {include_once( get_stylesheet_directory().'/jedi-apprentice/jedi-apprentice-import.php' );} ?><?php

if (!defined('ABSPATH')) {

    die();

}
if ( ! class_exists( 'DCTSolar_License_Theme' ) ) {
    require_once( get_stylesheet_directory() . '/lib/dctsolar-license.php' );
}
if (  class_exists('DCTSolar_License_Theme') ) {
     $DCTSolar_lib = new DCTSolar_License_Theme( __FILE__, '4387386', '1.0.1', 'theme', 'https://divi-childthemes.com/', 'DIVI Solar' );
}

/**

* dct_enqueue_css

* dct_enqueue_admin

* Extra Theme Tabs Options

*/

/* Hook */

add_action('wp_enqueue_scripts', 'dct_enqueue_css');

add_action('admin_enqueue_scripts', 'dct_enqueue_admin', 9999);

/* Include Config */

include_once(get_stylesheet_directory() . '/extra-options/config.php');

/* Add Default Parent Css */

function dct_enqueue_css()

{

    wp_enqueue_style('parent-style', get_template_directory_uri(). '/style.css');

    wp_enqueue_style('carousel-style', get_stylesheet_directory_uri().'/assets/css/owl.carousel.min.css');

    wp_enqueue_style('carousel-theme-style', get_stylesheet_directory_uri().'/assets/css/owl.theme.min.css');

    wp_enqueue_script('dct-carousel', get_stylesheet_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '', true);

    wp_enqueue_script('dct-custom', get_stylesheet_directory_uri().'/assets/js/dctcustom.js', array('jquery'), '', true);

}

function dct_enqueue_admin()

{

	wp_enqueue_style('dct-custom-admin', get_stylesheet_directory_uri().'/assets/css/admin.css');

	if ( ! wp_style_is( 'epanel-style', 'enqueued' ) ) {

		wp_enqueue_style('dct-epanel-css', get_template_directory_uri().'/epanel/css/panel.css');

	}

}

/* Include Extra Options */

include get_stylesheet_directory() . '/extra-options/modules.php';

/* Include Admin One Click Options */

include get_stylesheet_directory() . '/extra-options/admin/dct-panel.php';

/* Add Front-Site Css And JS */

add_action('wp_enqueue_scripts', 'dct_enqueue_css');

/* Add Admin Css And JS */

add_action('admin_enqueue_scripts', 'dct_enqueue_admin', 9999);

/* Admin footer modification */

function dct_footer_opt()

{

    ?> 

    <style type="text/css">

        :root {

            --color-1: <?php echo esc_attr(et_get_option('divi_DCT_color_palette_01', '#ee212b'));  ?>;

            --color-2: <?php echo esc_attr(et_get_option('divi_DCT_color_palette_02', '#082c4b'));  ?>;

        }

    </style>

    <?php

    include get_stylesheet_directory(). '/extra-options/opt.php';

}

add_action('wp_footer', 'dct_footer_opt');

function custom_theme_setup() {
    add_theme_support('post-thumbnails');
    if (function_exists('add_image_size')) {
        add_image_size('blog_thumb', 447, 228, true);
    }
}
add_action('after_setup_theme', 'custom_theme_setup');