<?php
/**
 * Motu Theme Customizer
 *
 * @package Motu
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('motu_customize_register')) :

function motu_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/active-callback.php';
	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/layout.php';
	require get_template_directory() . '/inc/customizer/preloader.php';
	require get_template_directory() . '/inc/customizer/date-ticker-header.php';
	require get_template_directory() . '/inc/customizer/header.php';
	require get_template_directory() . '/inc/customizer/repeater.php';
	require get_template_directory() . '/inc/customizer/pagination.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/single.php';
	require get_template_directory() . '/inc/customizer/footer.php';

	$wp_customize->get_section( 'colors' )->panel = 'theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','motu');
	$wp_customize->get_section( 'title_tagline' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'theme_general_settings';
    

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'motu_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'motu_customize_partial_blogdescription',
		) );
	}
	
	$motu_default = motu_get_default_theme_options();
	$wp_customize->add_setting('logo_width_range',
	    array(
	        'default'           => $motu_default['logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'motu_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('logo_width_range',
	    array(
	        'label'       => esc_html__('Logo With', 'motu'),
	        'description'       => esc_html__( 'Define logo size min-200 to max-700 (step-20)', 'motu' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
				           'min'   => 200,
				           'max'   => 700,
				           'step'   => 20,
			        	),
	    )
	);
	// Theme Options Panel.
	$wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'motu' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'motu' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'motu' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'theme_template_pannel',
		array(
			'title'      => esc_html__( 'Template Settings', 'motu' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Motu_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Motu_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Motu Pro', 'motu' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'motu' ),
				'pro_url'  => esc_url('https://www.themeinwp.com/theme/motu-pro/'),
				'priority'  => 1,
			)
		)
	);

}

endif;
add_action( 'customize_register', 'motu_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('motu_customizer_scripts')) :

    function motu_customizer_scripts(){   
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('motu-customizer', get_template_directory_uri() . '/assets/lib/custom/css/customizer.css');
        wp_enqueue_script('motu-customizer', get_template_directory_uri() . '/assets/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('motu_customizer_ajax_nonce');
        wp_localize_script( 
		    'motu-customizer', 
		    'motu_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'motu_customizer_scripts');
add_action('customize_controls_init', 'motu_customizer_scripts');

/**
 * Customizer Enqueue scripts and styles.
 */
function motu_customizer_repearer(){   
	
	wp_enqueue_style('motu-repeater', get_template_directory_uri() . '/assets/lib/custom/css/repeater.css');
    wp_enqueue_script('motu-repeater', get_template_directory_uri() . '/assets/lib/custom/js/repeater.js', array('jquery','customize-controls'), '', 1);

    $motu_post_category_list = motu_post_category_list();

    $cat_option = '';

    if( $motu_post_category_list ){
	    foreach( $motu_post_category_list as $key => $cats ){
	    	$cat_option .= "<option value='". esc_attr( $key )."'>". esc_html( $cats )."</option>";
	    }
	}

    wp_localize_script( 
        'motu-repeater', 
        'motu_repeater',
        array(
            'optionns'   => "
            				<option value='main-banner'>". esc_html__('Slider With Tile Block','motu')."</option>
            				<option value='banner-video-block'>". esc_html__('Banner with Video Block','motu')."</option>
            				<option value='banner-blocks-1'>". esc_html__('Slider & Tab Block','motu')."</option>
            				<option value='latest-posts-blocks'>". esc_html__('Latest Posts Block','motu')."</option>
            				<option selected='selected' value='tiles-blocks'>". esc_html__('Tiles Block','motu')."</option>
        					<option value='advertise-blocks'>". esc_html__('Advertise Block','motu')."</option>
            				<option value='home-widget-area'>". esc_html__('Widgets Area Block','motu')."</option
        					<option value='you-may-like-blocks'>". esc_html__('You May Like Block','motu')."</option>",
           	'categories'   => $cat_option,
            'new_section'   =>  esc_html__('New Section','motu'),
            'upload_image'   =>  esc_html__('Choose Image','motu'),
            'use_image'   =>  esc_html__('Select','motu'),
         )
    );

    wp_localize_script( 
        'motu-customizer', 
        'motu_customizer',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
         )
    );
}

add_action('customize_controls_enqueue_scripts', 'motu_customizer_repearer');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('motu_customize_partial_blogname')) :

	function motu_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('motu_customize_partial_blogdescription')) :

	function motu_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function motu_customize_preview_js() {
	wp_enqueue_script( 'motu-customizer-preview', get_template_directory_uri() . '/assets/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'motu_customize_preview_js' );