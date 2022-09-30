<?php
/**
 * creativetech Theme Customizer
 *
 * @package creativetech
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( !function_exists('creativetech_default_theme_options') ) :
    function creativetech_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'creativetech-footer-copyright'=>esc_html__('Copyright Text 2022','creativetech'),
            'creativetech-back-to-top-option' =>0,  
            'creativetech-display-sidebar-in-pages' =>0,   
        );

        return apply_filters( 'creativetech_default_theme_options', $default_theme_options );
    }
endif;

if ( !function_exists('creativetech_get_theme_options') ) :
    function creativetech_get_theme_options() {

        $creativetech_default_theme_options = creativetech_default_theme_options();
        $creativetech_get_theme_options = get_theme_mod( 'creativetech_theme_options');
        if( is_array( $creativetech_get_theme_options )){
            return array_merge( $creativetech_default_theme_options, $creativetech_get_theme_options );
        }
        else{
            return $creativetech_default_theme_options;
        }

    }
endif;


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function creativetech_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function creativetech_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function creativetech_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function creativetech_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
  
    // Get list of choices from the control associated with the setting.
    $creativetech_select_options = $setting->manager->get_control( $setting->id )->choices;
  
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $creativetech_select_options ) ? $input : $setting->default );
  }
function creativetech_customize_register( $wp_customize ) {

    $default = creativetech_default_theme_options();


	/* Footer Copyright */
	$wp_customize->add_section( 'creativetech-footer-option', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Footer Options', 'creativetech' )
	) );
    $wp_customize->add_setting( 'creativetech_theme_options[creativetech-footer-copyright]', array(
            'capability'        => 'edit_theme_options',
            'default' => $default['creativetech-footer-copyright'],
            'sanitize_callback' => 'wp_kses_post'
        ) );
    $wp_customize->add_control( 'creativetech-footer-copyright', array(
            'label'     => __( 'Copyright Text', 'creativetech' ),
            'description' => __('Your Own Copyright Text', 'creativetech'),
            'section'   => 'creativetech-footer-option',
            'settings'  => 'creativetech_theme_options[creativetech-footer-copyright]',
            'type'      => 'text',
            'priority'  => 10
        ) ); 

    $wp_customize->add_setting( 'creativetech_footer_col_layout', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'creativetech_sanitize_select',
        'default' => 'four',
          ) );
          
    $wp_customize->add_control( 'creativetech_footer_col_layout', array(
        'type' => 'select',
        'section' => 'creativetech-footer-option', // Add a default or your own section
        'label' => __( 'Footer Column Select' , 'creativetech'),
        'description' => __( 'Select Column what you want to display', 'creativetech' ),
        'choices' => array(
            'four' => __( 'Four Columns' , 'creativetech'),
            'three' => __( 'Three Columns' , 'creativetech'),
            'two' => __( 'Two Columns' , 'creativetech'),
            'one' => __( 'One Column' , 'creativetech'),
            ),
    ) );
          
	
    /*Back To Top */    
	$wp_customize->add_section( 'creativetech-back-to-top', array(
        'priority'       => 110,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Back To Top', 'creativetech' )
    ) );
    $wp_customize->add_setting( 'creativetech_theme_options[creativetech-back-to-top-option]', array(
        'capability'        => 'edit_theme_options',
    
        'sanitize_callback' => 'creativetech_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'creativetech-back-to-top-option', array(
        'label'     => __( 'Enable Back to Top', 'creativetech' ),
        'section'   => 'creativetech-back-to-top',
        'settings'  => 'creativetech_theme_options[creativetech-back-to-top-option]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );  
	
    /*Blog Sidebar Options */    
	$wp_customize->add_section( 'creativetech-blog-sidebar', array(
        'priority'       => 110,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Blog Sidebar', 'creativetech' )
    ) );

    $wp_customize->add_setting( 'creativetech-blog-sidebar-option', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'creativetech_sanitize_select',
        'default' => 'right-sidebar',
          ) );
          
    $wp_customize->add_control( 'creativetech-blog-sidebar-option', array(
        'type' => 'select',
        'section' => 'creativetech-blog-sidebar', // Add a default or your own section
        'label' => __( 'Blog Sidebar', 'creativetech' ),
        'description' => __( 'Select Sidebar Layout', 'creativetech' ),
        'choices' => array(
            'right-sidebar' => __( 'Right Sidebar', 'creativetech' ),
            'left-sidebar' => __( 'Left Sidebar', 'creativetech' ),
            'no-sidebar' => __( 'No Sidebar' , 'creativetech'),
            ),
    ) );


    /* Display Sidebar in Pages */
    $wp_customize->add_section( 'creativetech-display-sidebar-in-pages', array(
        'priority'       => 112,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Display Sidebar in Pages', 'creativetech' )
    ) );
    $wp_customize->add_setting( 'creativetech_theme_options[creativetech-display-sidebar-in-pages]', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'creativetech_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'creativetech-display-sidebar-in-pages', array(
        'label'     => __( 'Enable Sidebar in Pages', 'creativetech' ),
        'section'   => 'creativetech-display-sidebar-in-pages',
        'settings'  => 'creativetech_theme_options[creativetech-display-sidebar-in-pages]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) ); 
    
    
}
add_action( 'customize_register', 'creativetech_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function creativetech_customize_preview_js() {
	wp_enqueue_script( 'creativetech-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), creativetech_version, true );
}
add_action( 'customize_preview_init', 'creativetech_customize_preview_js' );