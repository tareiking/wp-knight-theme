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

	/**
	 * Add default image sizes
	 */
	add_image_size( 'folio-isotope', 360, 270, true );
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
	wp_enqueue_style( 'tk-knight-style', get_stylesheet_uri(), array( 'bootstrap' ) );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.0.3' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array(), '3.0.3' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array( 'bootstrap', 'responsive' ), '3.0.3' );
	wp_enqueue_style( 'google-fonts', tk_knight_get_google_fonts(), array(), null );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css', null, '4.1.0' );

	wp_enqueue_script( 'tk-knight-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tk-knight-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'tk-scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'tk-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true );
	wp_enqueue_script( 'tk-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'tk-wow', get_template_directory_uri() . '/js/wow.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'tk-classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery', 'tk-wow' ), '1.0', true );
	wp_enqueue_script( 'tk-knight-main', get_template_directory_uri() . '/js/main.js', array( 'tk-classie', 'tk-isotope', 'tk-easing', 'tk-scrolltofixed' ), '1.0', true );

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

/**
 * Load Custom Meta Boxes file.
 */
require get_template_directory() . '/inc/custom-meta-boxes.php';

function tk_knight_filter_folio(){

	$args = array(
		'posts_per_page'       => 5,
		'ignore_sticky_posts'  => 'true',
		'orderby'              => 'count',
	);

	return $args;

}

add_filter( 'tk_knight_filter_portfolio_query', 'tk_knight_filter_folio' );

/**
 * Hide editor for showcase page template
 *
 */
add_action( 'admin_init', 'tk_knight_hide_editor' );

function tk_knight_hide_editor() {

	if ( ! class_exists( 'CMB2' ) )
		return; // if we don't have custom meta boxes, we have no method of data entry

	// If we aren't editing a post, then we shouldn't bother
	if ( isset ( $_GET[ 'post' ] ) ) {
		$post_id = $_GET[ 'post' ];
	} elseif ( isset( $_GET[ 'post_ID' ] ) ) {
		$post_id = $_GET[ 'post_ID' ];
	} else {
		return;
	}

	$template_file = get_post_meta( $post_id, '_wp_page_template', true );

	if( $template_file == 'templates/showcase.php' ){
		remove_post_type_support( 'page', 'editor' );
	}

}