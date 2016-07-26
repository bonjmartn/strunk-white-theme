<?php

// Include Scripts and CSS

function strunk_theme_styles() {

	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/css/font-awesome-4.5.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'strunk_theme_styles');

function strunk_theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', 'false' );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', 'false' );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');
}

add_action( 'wp_enqueue_scripts', 'strunk_theme_js');


// Add WP Basic Features Support

function strunk_setup() {

	// Add Support for Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add Menu Support
	add_theme_support ( 'menus' );

	// Add Thumbnails Support
	add_theme_support( 'post-thumbnails' );

	// Add Support for Flexible Title Tag
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'strunk_setup' );


// Check for Front Page being used

function strunk_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'strunk_filter_front_page_template' );

// Add Support for WooCommerce

add_action( 'after_setup_theme', 'strunk_woocommerce_support' );
function strunk_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add Support for Google Fonts

function strunk_google_fonts() {
  $query_args = array(
    'family' => 'Lora:400,700,400italic,700italic|Droid+Serif:400,400italic,700,700italic|Playfair+Display:400,400italic,700,700italic|Libre+Baskerville:400,400italic,700|Alegreya:400,400italic,700,700italic|Josefin+Slab:400,400italic,700,700italic|Open+Sans:400,700,700italic,400italic|Lato:400,400italic,700,700italic',
    'subset' => 'latin,latin-ext',
  );
  wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}         
add_action('wp_enqueue_scripts', 'strunk_google_fonts');

// Content Width Requirement

function strunk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strunk_content_width', 800 );
}
add_action( 'after_setup_theme', 'strunk_content_width', 0 );

// MENUS!

function strunk_register_theme_menus() {

	register_nav_menus (
		array (
			'header-menu' => __( 'Header Menu', 'strunk-and-white-free')
	));
}

// Register Menus

add_action ( 'init', 'strunk_register_theme_menus');

// WIDGETS!

require_once get_template_directory() . '/inc/widgets.php';

// Include CTA Bar Widget

require_once get_template_directory() . '/inc/ctabar-widget.php';

// Include Social Widget

require_once get_template_directory() . '/inc/social-widget.php';

// Include About Box Widget

require_once get_template_directory() . '/inc/aboutbox-widget.php';

// THEME CUSTOMIZER!

require_once get_template_directory() . '/inc/wp-customize-image-reloaded.php';

require_once get_template_directory() . '/inc/theme-customizer.php';

// Replaces the excerpt "more" text with a link

function strunk_excerpt_more($more) {
    global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'strunk_excerpt_more');

// Filter the except length to 75 characters.

function strunk_custom_excerpt_length( $length ) {
    return 75;
}
add_filter( 'excerpt_length', 'strunk_custom_excerpt_length', 999 );

?>