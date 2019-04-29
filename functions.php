<?php
/**
 * TeamWPUGPH functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TeamWPUGPHTheme
 */

require get_template_directory() . '/inc/defines.php';
require get_template_directory() . '/inc/custom-settings.php';

if ( ! function_exists( 'teamwpugph_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function teamwpugph_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on teamwpugph, use a find and replace
		 * to change 'teamwpugph' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'teamwpugph', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'teamwpugph' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Strong Blue', 'teamwpugph' ),
				'slug'  => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name'  => __( 'Lighter Blue', 'teamwpugph' ),
				'slug'  => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name'  => __( 'Very Light Gray', 'teamwpugph' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'Very Dark Gray', 'teamwpugph' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
		) );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'teamwpugph_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function teamwpugph_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'teamwpugph_content_width', 640 );
}
add_action( 'after_setup_theme', 'teamwpugph_content_width', 0 );

/**
 * Register Google Fonts
 */
function teamwpugph_fonts_url() {
	$fonts_url = '';

	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Noto Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$notoserif = esc_html_x( 'on', 'Noto Serif font: on or off', 'teamwpugph' );

	if ( 'off' !== $notoserif ) {
		$font_families = array();
		$font_families[] = 'Noto Serif:400,400italic,700,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/**
 * Enqueue scripts and styles.
 */
function teamwpugph_scripts() {

	if (defined('WP_DEBUG') && true === WP_DEBUG) {

		$mainstyles		= '/style.css';
		$blockstyles 	= '/css/blocks.css';
		
		$uikitjs		= '/lib/uikit/dist/uikit.js';
		$uikiticonsjs	= '/lib/uikit/dist/uikit-icons.js';

	} else {

		$mainstyles		= '/style.min.css';
		$blockstyles 	= '/css/blocks.css';

		$uikitjs		= '/lib/uikit/dist/js/uikit.min.js';
		$uikiticonsjs	= '/lib/uikit/dist/js/uikit-icons.min.js';

	}

	wp_enqueue_style( 'teamwpugph-style', get_stylesheet_directory_uri() . $mainstyles );
	wp_enqueue_style( 'teamwpugph-blocks-style', get_stylesheet_directory_uri() . $blockstyles );
	wp_enqueue_style( 'teamwpugph-fonts', teamwpugph_fonts_url() );

	wp_enqueue_script( 'uikit', get_stylesheet_directory_uri() . $uikitjs, array(), '3.1.2', false );
	wp_enqueue_script( 'uikit-icons', get_stylesheet_directory_uri() . $uikiticonsjs, array(), '3.1.2', false );
}
add_action( 'wp_enqueue_scripts', 'teamwpugph_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/custom-menu.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
