<?php
/**
 * Fashify functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fashify
 */

if ( ! function_exists( 'fashify_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fashify_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Fashify, use a find and replace
	 * to change 'fashify' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fashify', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 54,
		'width'       => 192,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'fashify-thumb-default', 676, 483, true );
	add_image_size( 'fashify-thumb-layout2', 321, 229, true );
	add_image_size( 'fashify-thumb-layout3', 280, 220, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fashify' ),
		'footer'  => esc_html__( 'Footer', 'fashify' ),
		'social'  => esc_html__( 'Social Links', 'fashify' ),
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
	add_theme_support( 'custom-background', apply_filters( 'fashify_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'fashify_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fashify_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fashify_content_width', 640 );
}
add_action( 'after_setup_theme', 'fashify_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fashify_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fashify' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fashify' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'fashify' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'fashify' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'fashify_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fashify_scripts() {

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/font-awesome/font-awesome.min.css', array(), '4.5' );

	wp_enqueue_style( 'fashify-style', get_stylesheet_uri() );
	// Add extra styling to patus-style
   		$primary   = get_theme_mod( 'primary_color', '#f75357' );
        $secondary = get_theme_mod( 'secondary_color', '#444' );
        $custom_css = "
                a{color: #{$secondary}; }
				.entry-meta a,
				.main-navigation a:hover,
				.main-navigation .current_page_item > a,
				.main-navigation .current-menu-item > a,
				.main-navigation .current_page_ancestor > a,
				.widget_tag_cloud a:hover,
				.social-links ul a:hover::before,
                a:hover
				 {
					 color : {$primary};
				 }
				button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"]{
                    background: {$primary};
					border-color : {$primary};
                }
				.widget_tag_cloud a:hover { border-color : {$primary};}
                .main-navigation a,
				h2.entry-title a,
				h1.entry-title,
				.widget-title,
				.footer-staff-picks h3
				{
                	color: {$secondary};
                }
                button:hover, input[type=\"button\"]:hover,
				input[type=\"reset\"]:hover,
				input[type=\"submit\"]:hover {
                        background: {$secondary};
						border-color: {$secondary};
                }";
	wp_add_inline_style( 'fashify-style', $custom_css );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'fashify-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fashify-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fashify_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/custom-header.php';

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
