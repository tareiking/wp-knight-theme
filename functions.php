<?php
/**
 * WP Knight Theme functions and definitions
 *
 * @package WP Knight Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tk_knight_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tk_knight_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Knight Theme, use a find and replace
	 * to change 'tk-knight' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tk-knight', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tk-knight' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tk_knight_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tk_knight_setup
add_action( 'after_setup_theme', 'tk_knight_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tk_knight_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tk-knight' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tk_knight_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tk_knight_scripts() {
	wp_enqueue_style( 'tk-knight-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts', tk_knight_get_google_fonts(), array(), null );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css', null, '4.1.0' );

	wp_enqueue_script( 'tk-knight-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tk-knight-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tk_knight_scripts' );

/**
 * Enqueue scripts and styles
 */
function tk_knight_admin_scripts() {
	wp_enqueue_style( 'google-fonts', tk_knight_get_google_fonts(), array(), null );

}
add_action( 'admin_enqueue_scripts', 'tk_knight_admin_scripts' );

/**
 * Add Google Fonts (phew, there are a lot in this design)
 *
 * Whenever we use our custom fonts, we will remove WordPress default opens sans
 */
function tk_knight_get_google_fonts(){
	wp_deregister_style( 'open-sans' );

	$font_url = add_query_arg( 'family', urlencode( 'Montserrat:400,700|Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' ), "//fonts.googleapis.com/css" );

	return $font_url;
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
