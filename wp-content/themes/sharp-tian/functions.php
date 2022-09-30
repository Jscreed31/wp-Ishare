<?php
/**
 * sharp-tian functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sharp-tian
 */

if ( ! defined( '_SHARP_TIAN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_SHARP_TIAN_VERSION', '1.0.3' );
}

if ( ! function_exists( 'sharp_tian_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sharp_tian_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sharp-tian, use a find and replace
		 * to change 'sharp-tian' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sharp-tian', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'sharp-tian' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sharp_tian_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'sharp_tian_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $sharp_tian_content_width
 */
function sharp_tian_content_width() {
	$GLOBALS['sharp_tian_content_width'] = apply_filters( 'sharp_tian_content_width', 640 );
}
add_action( 'after_setup_theme', 'sharp_tian_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sharp_tian_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sharp-tian' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sharp-tian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer1', 'sharp-tian' ),
			'id'            => 'footer1',
			'description'   => esc_html__( 'Add widgets here.', 'sharp-tian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer2', 'sharp-tian' ),
			'id'            => 'footer2',
			'description'   => esc_html__( 'Add widgets here.', 'sharp-tian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer3', 'sharp-tian' ),
			'id'            => 'footer3',
			'description'   => esc_html__( 'Add widgets here.', 'sharp-tian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer4', 'sharp-tian' ),
			'id'            => 'footer4',
			'description'   => esc_html__( 'Add widgets here.', 'sharp-tian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer5', 'sharp-tian' ),
			'id'            => 'footer5',
			'description'   => esc_html__( 'Add widgets here.', 'sharp-tian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sharp_tian_widgets_init' );


function sharp_tian_wpdocs_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 600, 350, true );
}
add_action( 'after_setup_theme', 'sharp_tian_wpdocs_setup_theme' );



// Add custom meta box
add_action("add_meta_boxes", "sharp_tian_add_sidebar_meta_box");
function sharp_tian_add_sidebar_meta_box()
{
	$post_types = get_post_type();
    add_meta_box("sharp-tian-meta-box", "Custom Meta Box","sharp_tian_sidebar_meta_box_markup", $post_types, "normal", "high", null);
}
function sharp_tian_sidebar_meta_box_markup($object){
	?>
	<table class="admin_sidebar_select">
		<tr><td><label><h2 class="custom_meta"><?php echo esc_html__( 'Breadcrumb', 'sharp-tian' );?></h2></label></td></tr>
	   	<tr>
	   		<td>
	   			<label for="sharp_tian_breadcrumb_select">
	   				<input type="radio" name="sharp_tian_breadcrumb_select" id="sharp_tian_breadcrumb_select" value="yes" <?php if(get_post_meta($object->ID,'sharp_tian_breadcrumb_select',true)=='yes'){echo "checked";}?>><?php echo esc_html__( 'Yes', 'sharp-tian' );?> 
	   				<input type="radio" name="sharp_tian_breadcrumb_select" id="sharp_tian_breadcrumb_select" value="no" <?php if(get_post_meta($object->ID,'sharp_tian_breadcrumb_select',true)=='no'){echo "checked";}?>><?php echo esc_html__( 'No', 'sharp-tian' );?>
	   			</label>
	   		</td>
	   	</tr>
	   	<tr><td><label><h2 class="custom_meta">Sidebar</h2></label></td></tr>
   		<tr>
	   		<td>
	   			<label for="no_sidebar">		   				
	   				<input type="radio" name="sidebar_select" id="no_sidebar" class="no_sidebar" value="no_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='no_sidebar'){echo "checked";}?>>
		   				<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/full.png' ?>">
		   			</input>
	   			</label>
	   			<label for="left_sidebar">
	   				<input type="radio" name="sidebar_select" id="left_sidebar" class="left_sidebar" value="left_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='left_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/left.png' ?>">
	   				</input>
	   			</label>
	   			<label for="right_sidebar">			   				
	   				<input type="radio" name="sidebar_select" id="right_sidebar" class="right_sidebar" value="right_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='right_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/right.png' ?>">
	   				</input>
	   			</label>			
	   		</td>
	   	</tr>
	</table>
	<?php
}
add_action( 'save_post','sharp_tian_save_sidebar_meta_box_data');
function sharp_tian_save_sidebar_meta_box_data( $post_id ) {
	if(isset($_REQUEST['sharp_tian_breadcrumb_select'])){
		$sharp_tian_breadcrumb_select = sanitize_text_field( wp_unslash($_REQUEST['sharp_tian_breadcrumb_select'] ));
		update_post_meta($post_id,'sharp_tian_breadcrumb_select',$sharp_tian_breadcrumb_select);
	}
	if(isset($_REQUEST['sidebar_select'])){
		$sidebar_select = sanitize_text_field( wp_unslash($_REQUEST['sidebar_select'] ));
		update_post_meta($post_id,'sidebar_select',$sidebar_select);
	}
}

function sharp_tian_breadcrumb_slider(){
	?>
	<div class="breadcrumb_info">
		<div class="breadcrumb_data">
			<section id="breadcrumb-section" class="breadcrumb-area breadcrumb-centerc">
				<div class="breadcrumb-content">
					<div class="breadcrumb-heading">
						<h1><?php  sharp_tian_breadcrumb_title();	?></h1>
					</div>
					<ol class="breadcrumb-list">
						<li>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'sharp-tian' );?></a>
							<?php echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;"; ?>
						</li>
						<li>
							<?php sharp_tian_breadcrumb_title();?>
						</li>
					</ol>
				</div> 
			</section>
		</div>		
	</div>
	<?php
}
/**
 * Enqueue scripts and styles.
 */
function sharp_tian_scripts() {
	wp_enqueue_script('jquery', false, array(), false, false);
	wp_enqueue_style( 'sharp-tian-style', get_stylesheet_uri(), array(), _SHARP_TIAN_VERSION );
	wp_style_add_data( 'sharp-tian-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sharp-tian-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _SHARP_TIAN_VERSION, true );
		wp_localize_script( 'sharp-tian-navigation', 'aboutdata', 
				array(
					'about_sec' => esc_attr(get_theme_mod('sharp_tian_diseble')),
				)
     	);
	wp_enqueue_script( 'sharp-tian-owl_slider', get_template_directory_uri() . '/assets/js/owl_slider.js', array(), _SHARP_TIAN_VERSION, true );	
	wp_enqueue_script( 'sharp-tian-owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), _SHARP_TIAN_VERSION, true );	
	wp_enqueue_style( 'sharp-tian-theme-css', esc_url(get_template_directory_uri()).'/assets/css/theme.css' , array(), _SHARP_TIAN_VERSION );
	wp_enqueue_style( 'sharp-tian-fontawesome-css', esc_url(get_template_directory_uri()).'/assets/fontawesome/css/font-awesome.css' , array(), _SHARP_TIAN_VERSION );
	wp_enqueue_style( 'sharp-tian-owl-carousel-min-css', esc_url(get_template_directory_uri()).'/assets/css/owl.carousel.min.css' , array(), _SHARP_TIAN_VERSION );
	wp_enqueue_style( 'sharp-tian-owl-carousel_theme-min-css', esc_url(get_template_directory_uri()).'/assets/css/owl.theme.min.css' , array(), _SHARP_TIAN_VERSION );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sharp_tian_scripts' );

function sharp_tian_admin_script_style() {
	wp_enqueue_style( 'sharp-tian-admin_site-css', esc_url(get_template_directory_uri()).'/assets/css/admin_site.css' , array(), _SHARP_TIAN_VERSION );
	wp_enqueue_script('sharp-tian-alpha-color-picker',	get_template_directory_uri() . '/assets/js/alpha-color-picker.js',array( 'jquery', 'wp-color-picker' ), null,true);
	wp_enqueue_style('sharp-tian-alpha-color-picker',get_template_directory_uri() . '/assets/css/alpha-color-picker.css',array( 'wp-color-picker' ));
	wp_enqueue_style('wp-color-picker' );
    wp_enqueue_script('wp-color-picker-alpha',  get_template_directory_uri() . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
   
    $color_picker_strings = array(
        'clear'            => __( 'Clear', 'sharp-tian' ),
        'clearAriaLabel'   => __( 'Clear color', 'sharp-tian' ),
        'defaultString'    => __( 'Default', 'sharp-tian' ),
        'defaultAriaLabel' => __( 'Select default color', 'sharp-tian' ),
        'pick'             => __( 'Select Color', 'sharp-tian' ),
        'defaultLabel'     => __( 'Color value', 'sharp-tian' ),
    );

    wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
    wp_enqueue_script( 'wp-color-picker-alpha' );  
}
add_action('admin_enqueue_scripts', 'sharp_tian_admin_script_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

require get_template_directory() . '/inc/customizer-control.php';

require get_template_directory() . '/inc/customizer_css.php';

require get_parent_theme_file_path( '/inc/about.php' );

require get_template_directory() . '/inc/customizer-repeater/functions.php';

require get_template_directory() . '/inc/wptt-webfont-loader.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function sharp_tian_main_js() {
    wp_enqueue_script( 'main-js', get_theme_file_uri( '/assets/js/owl_slider.js' ), array(), '1.0', true );
    // Localize the script with new data and pass php variables to JS.
    $main_js_data = array(
        /* FOR LATER USE. */
        'sharp_tian_img_autoplay' => esc_attr(get_theme_mod('sharp_tian_featured_slider_autoplay', 'true')),
        'sharp_tian_img_autoplayspped' => esc_attr(get_theme_mod('sharp_tian_featured_slider_autoplay_speed','1000')),
        'sharp_tian_img_autoplaytime' => esc_attr(get_theme_mod('sharp_tian_featured_slider_autoplay_timeout','5000')),

        'sharp_tian_autoplay' => esc_attr(get_theme_mod('sharp_tian_our_testimonial_slider_autoplay', 'true')),
        'sharp_tian_autoplayspped' => esc_attr(get_theme_mod('sharp_tian_our_testimonial_slider_autoplay_speed','1000')),
        'sharp_tian_autoplaytime' => esc_attr(get_theme_mod('sharp_tian_our_testimonial_autoplay_timeout','5000')),

        'sharp_tian_sponsors_autoplay' => esc_attr(get_theme_mod('sharp_tian_our_sponsors_slider_autoplay', 'true')),
        'sharp_tian_sponsors_autoplayspped' => esc_attr(get_theme_mod('sharp_tian_our_sponsors_slider_autoplay_speed','1000')),
        'sharp_tian_sponsors_autoplaytime' => esc_attr(get_theme_mod('sharp_tian_our_sponsors_autoplay_timeout','5000')),


    );
    wp_localize_script( 'main-js', 'main_vars', $main_js_data );
}
add_action( 'wp_enqueue_scripts', 'sharp_tian_main_js' );
global $contecustomarr;
$contecustomarr = array(
		'options' => array(
			'sharp_tian_contact_info_number' => '04463235323',
			'sharp_tian_email_info_number'  => 'sharp-tian@gmail.com',
			'display_social_icon'  => true,
			'social_icon_section_content'=> json_encode(
				array(
					array(
						'icon_value'     => 'fa-facebook',
						'link'           => '#',
						'id'             => 'customizer_repeater_info_001',					
					),
					array(
						'icon_value'     => 'fa-twitter',
						'link'           => '#',
						'id'             => 'customizer_repeater_info_002',					
					),
					array(
						'icon_value'     => 'fa-linkedin',
						'link'           => '#',
						'id'             => 'customizer_repeater_info_003',					
					),
					array(
						'icon_value'     => 'fa-instagram',
						'link'           => '#',
						'id'             => 'customizer_repeater_info_004',					
					),
				)
			), 
			'featuredimage_slider' => json_encode(
				array(
					array(
						'title'           => esc_html__( ' New Skills', 'sharp-tian' ),
						'text'           => esc_html__( ' Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'sharp-tian' ),
						'link'           => esc_html__( ' #', 'sharp-tian' ),
						'text2'           => esc_html__( ' Button', 'sharp-tian' ),
						'id'              => 'customizer_repeater_slider_001',
					),
				)
			),
			'featured_section_content'=> json_encode(
				array(
					array(
						'icon_value'       => 'fa-cloud',
						'title'           => esc_html__( ' Featured title 1', 'sharp-tian' ),
						'text'           => esc_html__( ' this is featured.', 'sharp-tian' ),
						'id'              => 'customizer_repeater_featured_slider_001',
					),array(
						'icon_value'       => 'fa-facebook',
						'title'           => esc_html__( ' Featured title 2', 'sharp-tian' ),
						'text'           => esc_html__( ' this is featured.', 'sharp-tian' ),
						'id'              => 'customizer_repeater_featured_slider_002',
					),array(
						'icon_value'       => 'fa-twitter',
						'title'           => esc_html__( ' Featured title 3', 'sharp-tian' ),
						'text'           => esc_html__( ' this is featured.', 'sharp-tian' ),
						'id'              => 'customizer_repeater_featured_slider_003',
					),
				)
			),
			'about_main_title' => esc_html__('About Us', 'sharp-tian' ),
			'about_description'  => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sharp-tian' ),
			'about_layout1_title' => esc_html__('Hi, I Am Samantha!', 'sharp-tian' ),
			'about_layout1_subheading' => esc_html__('Owner/Founder, Executive Coach', 'sharp-tian' ),
			'about_layout1_description' => esc_html__('Yes, I Know My Stuff! And Throughout Our Coaching Time, You Will Develop The Tools And Confidence To Take Action. My Way Of Coaching Is To Empower You In Becoming The Leader You Want To Be. You Are Unique And So Your Coaching Should Be Too.', 'sharp-tian' ),
			'about_layout1_button' => esc_html__('Read More', 'sharp-tian' ),
			'our_portfolio_main_title' => esc_html__('Our Portfolio', 'sharp-tian' ),
			'our_portfolio_main_discription' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sharp-tian' ),
			'our_portfolio_section_content' =>  json_encode(
				array(
					array(
					'title'           => esc_html__( 'Free Consulting', 'sharp-tian' ),
					'subtitle'        => esc_html__( 'Business Consulting', 'sharp-tian' ),
					'link'           => '#',
					'icon_value'       => 'fa-facebook-square',
					'id'              => 'customizer_repeater_portofolio_info_001',					
					),array(
						'title'           => esc_html__( 'Best Analysis', 'sharp-tian' ),
						'subtitle'        => esc_html__( 'Financial Analysis', 'sharp-tian' ),
						'link'           => '#',
						'icon_value'       => 'fa-facebook-square',
						'id'              => 'customizer_repeater_portofolio_info_002',					
					),array(
						'title'           => esc_html__( 'Successes Reports', 'sharp-tian' ),
						'subtitle'        => esc_html__( 'Project Reporting', 'sharp-tian' ),
						'link'           => '#',
						'icon_value'       => 'fa-facebook-square',
						'id'              => 'customizer_repeater_portofolio_info_003',					
					),
				)
			),
			'our_team_main_title' => esc_html__('Our Team', 'sharp-tian' ),
			'our_team_main_discription' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sharp-tian' ),
			'our_team_section_content' =>  json_encode(
				array(
					array(
						'title'          => esc_html__( 'Rizon Pet', 'sharp-tian' ),
						'subtitle'       => esc_html__( 'Project Manager', 'sharp-tian' ),
						'link'           => '#',
						'twitter'        => esc_html__( 'https://twitter.com/', 'sharp-tian' ),
						'facebook'       => 'https://www.facebook.com/',
						'linkedin'       => 'https://www.instagram.com/',
						'instagram'      => 'https://www.linkedin.com/feed/',
						'id'             => 'customizer_repeater_team_info_001',					
					),
					array(
						'title'          => esc_html__( 'Glenn Maxwell', 'sharp-tian' ),
						'subtitle'       => esc_html__( 'Project Manager', 'sharp-tian' ),
						'link'           => '#',
						'twitter'        => 'https://twitter.com/',
						'facebook'       => 'https://www.facebook.com/',
						'linkedin'       => 'https://www.instagram.com/',
						'instagram'      => 'https://www.linkedin.com/feed/',
						'id'             => 'customizer_repeater_team_info_002',					
					),
					array(
						'title'          => esc_html__( 'Aaron Finch', 'sharp-tian' ),
						'subtitle'       => esc_html__( 'Manager And Director', 'sharp-tian' ),
						'link'           => '#',
						'twitter'        => 'https://twitter.com/',
						'facebook'       => 'https://www.facebook.com/',
						'linkedin'       => 'https://www.instagram.com/',
						'instagram'      => 'https://www.linkedin.com/feed/',
						'id'             => 'customizer_repeater_team_info_003',					
					),
					array(
						'title'          => esc_html__( 'Christiana Ena', 'sharp-tian' ),
						'subtitle'       => esc_html__( 'Project Manager', 'sharp-tian' ),
						'link'           => '#',
						'twitter'        => 'https://twitter.com/',
						'facebook'       => 'https://www.facebook.com/',
						'linkedin'       => 'https://www.instagram.com/',
						'instagram'      => 'https://www.linkedin.com/feed/',
						'id'             => 'customizer_repeater_team_info_004',					
					),
				)
			),
			'our_testimonial_main_title' => esc_html__('Our Testimonial', 'sharp-tian' ),
			'our_testimonial_main_discription' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sharp-tian' ),
			'our_testimonial_section_content'=> json_encode(
				array(
					array(
						'title'           => esc_html__( 'Rizon Pet', 'sharp-tian' ),
						'subtitle'           => esc_html__( 'New Skills', 'sharp-tian' ),
						'text'           => esc_html__( 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.', 'sharp-tian' ),
						'link'           => esc_html__( ' #', 'sharp-tian' ),
						'id'              => 'customizer_repeater_testimonial_001',
					),array(
						'title'           => esc_html__( 'Glenn Maxwell', 'sharp-tian' ),
						'subtitle'           => esc_html__( 'New Skills', 'sharp-tian' ),
						'text'           => esc_html__( 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.', 'sharp-tian' ),
						'link'           => esc_html__( ' #', 'sharp-tian' ),
						'id'              => 'customizer_repeater_testimonial_002',
					),array(
						'title'           => esc_html__( 'Virat kohli', 'sharp-tian' ),
						'subtitle'           => esc_html__( 'New Skills', 'sharp-tian' ),
						'text'           => esc_html__( 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.', 'sharp-tian' ),
						'link'           => esc_html__( ' #', 'sharp-tian' ),
						'id'              => 'customizer_repeater_testimonial_003',
					),
				)
			),
			'our_sponsors_main_title' => esc_html__('Our Sponsors', 'sharp-tian' ),
			'our_sponsors_main_discription' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sharp-tian' ),
			'our_sponsors_section_content'=> json_encode(
				array(
					array(					
						'link'           => '#',
						'id'              => 'customizer_repeater_sponsors_001',
					),
					array(
						'link'           => '#',
						'id'              => 'customizer_repeater_sponsors_002',
					),
					array(
						'link'           => '#',
						'id'              => 'customizer_repeater_sponsors_003',
					),
					
			    )
			),
		),
 	);
add_theme_support( 'starter-content',$contecustomarr);
