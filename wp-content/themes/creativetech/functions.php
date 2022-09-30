<?php
/**
 * creativetech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creativetech
 */

if ( ! defined( 'creativetech_version' ) ) {
	// Replace the version number of the theme on each release.
	define( 'creativetech_version', '1.1.3' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function creativetech_setup() {

	load_theme_textdomain( 'creativetech', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );

	/* Custom Logo Width */
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 290,
		'flex-height' => true,
		'flex-width' => true
	) );

	add_editor_style();

	/* Custom Background*/
	add_theme_support( 'custom-background');
	
 	/* Post Thumbnail*/
	add_theme_support( 'post-thumbnails' );
	add_image_size('creativetech-small-thumbnail', 180, 120, true);
	add_image_size('creativetech-square-thumbnail', 80, 80, true);
	
	/* Register Menus */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'creativetech' ),
		)
	);

	/* Adde Theme Support */
	add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'creativetech_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    
}
add_action( 'after_setup_theme', 'creativetech_setup' );

function creativetech_patterns() {
	/* Register Pattern */
	register_block_pattern(
		'creativetech-title',
		array(
			'title'         => __( 'Creativetech Title', 'creativetech' ),
			'description'   => __( 'This is Creativetech Pattern', 'creativetech' ),
			'content'       => '<h2><center>This is Creativetech Theme</center></h2>',
			'categories'    => array( 'text', 'creativetech' ),
			'keywords'      => array( 'cta', 'creativetech'),
			'viewportWidth' => 400,
		)
	);
}
add_action( 'init', 'creativetech_patterns' );
/* Widgets */
function creativetech_widgets_init() {
	/** Blog Sidebar */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'creativetech' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'creativetech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	/** Footer Widgets */
	register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'creativetech' ),
        'id'            => 'footer-widget-first-column',
        'description'   => __( 'Footer Column 1', 'creativetech' ),
        'before_widget' => '<li id="%1$s" class="widget-title %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'creativetech' ),
        'id'            => 'footer-widget-second-column',
        'description'   => __( 'Footer Column 2', 'creativetech' ),
        'before_widget' => '<li id="%1$s" class="widget-title %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'creativetech' ),
        'id'            => 'footer-widget-third-column',
        'description'   => __( 'Footer Column 3', 'creativetech' ),
        'before_widget' => '<li id="%1$s" class="widget-title %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Column 4', 'creativetech' ),
        'id'            => 'footer-widget-fourth-column',
        'description'   => __( 'Footer Column 4', 'creativetech' ),
        'before_widget' => '<li id="%1$s" class="widget-title %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'creativetech_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function creativetech_scripts() {
	wp_enqueue_style( 'creativetech-style', get_stylesheet_uri(), array(), creativetech_version );
	wp_style_add_data( 'creativetech-style', 'rtl', 'replace' );
	require_once get_theme_file_path( 'inc/webfont-loader.php' );
	wp_enqueue_style(
		'creativetech-poppins',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Poppins&display=swap' ),
		array(),
		'1.0'
	);
	wp_enqueue_style(
		'creativetech-oswald',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Oswald&display=swap' ),
		array(),
		'1.0'
	);
	wp_enqueue_style( 'creativetech-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'creativetech-custom-css', get_template_directory_uri() . '/assets/css/custom.css', array(), creativetech_version );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'creativetech-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), creativetech_version, true );
	wp_enqueue_script( 'creativetech-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), creativetech_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creativetech_scripts' );


require_once dirname( __FILE__ ) . '/inc/required-plugins.php';
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