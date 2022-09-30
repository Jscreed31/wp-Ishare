<?php
/**
 * Artist Portfolio Theme Customizer
 * @package Artist Portfolio
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function artist_portfolio_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'artist_portfolio_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','artist-portfolio' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('artist_portfolio_site_title_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
	));
	$wp_customize->add_control('artist_portfolio_site_title_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Site Title','artist-portfolio'),
		'section' => 'title_tagline'
	));

 	$wp_customize->add_setting('artist_portfolio_site_title_font_size',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','artist-portfolio' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

   $wp_customize->add_setting('artist_portfolio_site_tagline_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
   ));
   $wp_customize->add_control('artist_portfolio_site_tagline_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable Site Tagline','artist-portfolio'),
      'section' => 'title_tagline'
   ));

   $wp_customize->add_setting('artist_portfolio_site_tagline_font_size',array(
		'default'=> 13,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','artist-portfolio' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

    $wp_customize->add_setting('artist_portfolio_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','artist-portfolio'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('artist_portfolio_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','artist-portfolio'),
        'description' => __('Here you can add the background skin along with the background image.','artist-portfolio'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','artist-portfolio'),
            'Without Background' => __('Without Background Skin','artist-portfolio'),
        ),
	) );

	//add home page setting pannel
	$wp_customize->add_panel( 'artist_portfolio_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'artist-portfolio' ),
	    'description' => __( 'Description of what this panel does.', 'artist-portfolio' ),
	) );

	$artist_portfolio_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One', 
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower', 
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit', 
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two', 
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda', 
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli', 
		'Marck Script'           => 'Marck Script', 
		'Noto Serif'             => 'Noto Serif', 
		'Open Sans'              => 'Open Sans', 
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen', 
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display', 
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik', 
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo', 
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two', 
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn', 
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('artist_portfolio_typography', array(
		'title'    => __('Typography', 'artist-portfolio'),
		'panel'    => 'artist_portfolio_panel_id',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('artist_portfolio_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_paragraph_color', array(
		'label'    => __('Paragraph Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control(	'artist_portfolio_paragraph_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('Paragraph Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	$wp_customize->add_setting('artist_portfolio_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('artist_portfolio_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'artist-portfolio'),
		'section' => 'artist_portfolio_typography',
		'setting' => 'artist_portfolio_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('artist_portfolio_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_atag_color', array(
		'label'    => __('"a" Tag Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control(	'artist_portfolio_atag_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('"a" Tag Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('artist_portfolio_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_li_color', array(
		'label'    => __('"li" Tag Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control(	'artist_portfolio_li_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('"li" Tag Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('artist_portfolio_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_h1_color', array(
		'label'    => __('H1 Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('artist_portfolio_h1_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('H1 Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('artist_portfolio_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('artist_portfolio_h1_font_size', array(
		'label'   => __('H1 Font Size', 'artist-portfolio'),
		'section' => 'artist_portfolio_typography',
		'setting' => 'artist_portfolio_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('artist_portfolio_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_h2_color', array(
		'label'    => __('h2 Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control(
	'artist_portfolio_h2_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('h2 Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('artist_portfolio_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('artist_portfolio_h2_font_size', array(
		'label'   => __('H2 Font Size', 'artist-portfolio'),
		'section' => 'artist_portfolio_typography',
		'setting' => 'artist_portfolio_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('artist_portfolio_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_h3_color', array(
		'label'    => __('H3 Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control(
	'artist_portfolio_h3_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('H3 Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('artist_portfolio_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('artist_portfolio_h3_font_size', array(
		'label'   => __('H3 Font Size', 'artist-portfolio'),
		'section' => 'artist_portfolio_typography',
		'setting' => 'artist_portfolio_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('artist_portfolio_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_h4_color', array(
		'label'    => __('H4 Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('artist_portfolio_h4_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('H4 Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('artist_portfolio_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('artist_portfolio_h4_font_size', array(
		'label'   => __('H4 Font Size', 'artist-portfolio'),
		'section' => 'artist_portfolio_typography',
		'setting' => 'artist_portfolio_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('artist_portfolio_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_h5_color', array(
		'label'    => __('H5 Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('artist_portfolio_h5_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('H5 Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('artist_portfolio_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('artist_portfolio_h5_font_size', array(
		'label'   => __('H5 Font Size', 'artist-portfolio'),
		'section' => 'artist_portfolio_typography',
		'setting' => 'artist_portfolio_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('artist_portfolio_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_h6_color', array(
		'label'    => __('H6 Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_typography',
		'settings' => 'artist_portfolio_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('artist_portfolio_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('artist_portfolio_h6_font_family', array(
		'section' => 'artist_portfolio_typography',
		'label'   => __('H6 Fonts', 'artist-portfolio'),
		'type'    => 'select',
		'choices' => $artist_portfolio_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('artist_portfolio_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('artist_portfolio_h6_font_size', array(
		'label'   => __('H6 Font Size', 'artist-portfolio'),
		'section' => 'artist_portfolio_typography',
		'setting' => 'artist_portfolio_h6_font_size',
		'type'    => 'text',
	));

	//layout setting
	$wp_customize->add_section( 'artist_portfolio_option', array(
    	'title'      => __( 'Layout Settings', 'artist-portfolio' ),
    	'panel'    => 'artist_portfolio_panel_id',
	) );

	$wp_customize->add_setting('artist_portfolio_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','artist-portfolio'),
       'section' => 'artist_portfolio_option'
    ));

   $wp_customize->add_setting('artist_portfolio_preloader_type',array(
     	'default' => 'First Preloader Type',
     	'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_preloader_type',array(
      'type' => 'radio',
      'label' => __('Preloader Types','artist-portfolio'),
      'section' => 'artist_portfolio_option',
      'choices' => array(
         'First Preloader Type' => __('First Preloader Type','artist-portfolio'),
         'Second Preloader Type' => __('Second Preloader Type','artist-portfolio'),
      ),
	) );

	$wp_customize->add_setting('artist_portfolio_preloader_bg_color_option', array(
		'default'           => '#FFAB01',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_option',
	)));

	$wp_customize->add_setting('artist_portfolio_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_option',
	)));

	$wp_customize->add_setting('artist_portfolio_width_layout_options',array(
		'default' => 'Default',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_width_layout_options',array(
		'type' => 'radio',
		'label' => __('Container Box','artist-portfolio'),
		'description' => __('Here you can change the Width layout. ','artist-portfolio'),
		'section' => 'artist_portfolio_option',
		'choices' => array(
		   'Default' => __('Default','artist-portfolio'),
		   'Container Layout' => __('Container Layout','artist-portfolio'),
		   'Box Layout' => __('Box Layout','artist-portfolio'),
		),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('artist_portfolio_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	) );
	$wp_customize->add_control('artist_portfolio_layout_options', array(
        'type' => 'select',
        'label' => __('Select different post sidebar layout','artist-portfolio'),
        'section' => 'artist_portfolio_option',
        'choices' => array(
            'One Column' => __('One Column','artist-portfolio'),
            'Grid Layout' => __('Grid Layout','artist-portfolio'),
            'Left Sidebar' => __('Left Sidebar','artist-portfolio'),
            'Right Sidebar' => __('Right Sidebar','artist-portfolio')
        ),
	)   );

	$wp_customize->add_setting('artist_portfolio_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','artist-portfolio'),
        'section' => 'artist_portfolio_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','artist-portfolio'),
            'Sidebar 1/4' => __('Sidebar 1/4','artist-portfolio'),
        ),
	) );

	$wp_customize->add_setting( 'artist_portfolio_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize,  'artist_portfolio_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','artist-portfolio' ),
		'section'     => 'artist_portfolio_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'artist_portfolio_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize,  'artist_portfolio_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','artist-portfolio' ),
		'section' => 'artist_portfolio_option',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	//Blog Post Settings
	$wp_customize->add_section('artist_portfolio_post_settings', array(
		'title'    => __('Post General Settings', 'artist-portfolio'),
		'panel'    => 'artist_portfolio_panel_id',
	));

	$wp_customize->add_setting('artist_portfolio_post_layouts',array(
     'default' => 'Layout 2',
     'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_post_layouts', array(
		'type' => 'select',
		'label' => __('Post Layouts','artist-portfolio'),
		'description' => __('Here you can change the 3 different layouts of post','artist-portfolio'),
		'section' => 'artist_portfolio_post_settings',
		'choices' => array(
		   'Layout 1' => __('Layouts 1','artist-portfolio'),
		   'Layout 2' => __('Layouts 2','artist-portfolio'),
		   'Layout 3' => __('Layouts 3','artist-portfolio'),
	)));

	$wp_customize->add_setting('artist_portfolio_metafields_date',array(
		'default' => true,
		'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
	));
	$wp_customize->add_control('artist_portfolio_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','artist-portfolio'),
		'section' => 'artist_portfolio_post_settings'
	));

	$wp_customize->add_setting('artist_portfolio_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_post_date_icon',array(
		'label'	=> __('Post Date Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('artist_portfolio_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','artist-portfolio'),
       'section' => 'artist_portfolio_post_settings'
    ));

    $wp_customize->add_setting('artist_portfolio_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_post_author_icon',array(
		'label'	=> __('Post Author Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('artist_portfolio_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','artist-portfolio'),
       'section' => 'artist_portfolio_post_settings'
    ));

    $wp_customize->add_setting('artist_portfolio_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('artist_portfolio_metafields_time',array(
       'default' => false,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','artist-portfolio'),
       'section' => 'artist_portfolio_post_settings'
    ));

    $wp_customize->add_setting('artist_portfolio_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_post_time_icon',array(
		'label'	=> __('Post Time Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('artist_portfolio_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'artist_portfolio_sanitize_choices'
    ));
    $wp_customize->add_control('artist_portfolio_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','artist-portfolio'),
       'choices' => array(
            'Image' => __('Image','artist-portfolio'),
            'Color' => __('Color','artist-portfolio'),
            'None' => __('None','artist-portfolio'),
        ),
      	'section'	=> 'artist_portfolio_post_settings',
    ));

    $wp_customize->add_setting('artist_portfolio_post_featured_color', array(
		'default'           => '#5c727d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_post_featured_color', array(
		'label'    => __('Post Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_post_settings',
		'settings' => 'artist_portfolio_post_featured_color',
		'active_callback' => 'artist_portfolio_post_color_enabled'
	)));

	$wp_customize->add_setting( 'artist_portfolio_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','artist-portfolio' ),
		'section' => 'artist_portfolio_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'artist_portfolio_show_post_color'
	)));

	$wp_customize->add_setting( 'artist_portfolio_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','artist-portfolio' ),
		'section' => 'artist_portfolio_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'artist_portfolio_show_post_color'
	)));

	$wp_customize->add_setting('artist_portfolio_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'artist_portfolio_sanitize_choices'
    ));
    $wp_customize->add_control('artist_portfolio_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','artist-portfolio'),
       'choices' => array(
            'Default' => __('Default','artist-portfolio'),
            'Custom' => __('Custom','artist-portfolio'),
        ),
      	'section'	=> 'artist_portfolio_post_settings',
      	'active_callback' => 'artist_portfolio_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'artist_portfolio_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','artist-portfolio' ),
		'section' => 'artist_portfolio_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'artist_portfolio_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'artist_portfolio_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','artist-portfolio' ),
		'section' => 'artist_portfolio_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'artist_portfolio_enable_post_image_custom_dimention'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'artist_portfolio_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'artist_portfolio_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','artist-portfolio' ),
		'section'     => 'artist_portfolio_post_settings',
		'type'        => 'number',
		'settings'    => 'artist_portfolio_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('artist_portfolio_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','artist-portfolio'),
        'section' => 'artist_portfolio_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','artist-portfolio'),
            'Content' => __('Content','artist-portfolio'),
        ),
	) );

	$wp_customize->add_setting( 'artist_portfolio_post_discription_suffix', array(
		'default'   => __('[...]','artist-portfolio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'artist_portfolio_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','artist-portfolio' ),
		'section'     => 'artist_portfolio_post_settings',
		'type'        => 'text',
		'settings'    => 'artist_portfolio_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'artist_portfolio_blog_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'artist_portfolio_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box','artist-portfolio' ),
		'section'     => 'artist_portfolio_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','artist-portfolio'),
		'type'        => 'text',
		'settings'    => 'artist_portfolio_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('artist_portfolio_button_text',array(
		'default'=> __('View More','artist-portfolio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_button_text',array(
		'label'	=> __('Add Button Text','artist-portfolio'),
		'section'=> 'artist_portfolio_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'artist_portfolio_post_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_post_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_post_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('artist_portfolio_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','artist-portfolio'),
       'section' => 'artist_portfolio_post_settings'
    ));

    $wp_customize->add_setting( 'artist_portfolio_post_pagination_position', array(
        'default'			=>  'Bottom', 
        'sanitize_callback'	=> 'artist_portfolio_sanitize_choices'
    ));
    $wp_customize->add_control( 'artist_portfolio_post_pagination_position', array(
        'section' => 'artist_portfolio_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'artist-portfolio' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'artist-portfolio' ),
            'Bottom' => __( 'Bottom', 'artist-portfolio' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'artist-portfolio' ),
    )));

	$wp_customize->add_setting( 'artist_portfolio_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'artist_portfolio_sanitize_choices'
    ));
    $wp_customize->add_control( 'artist_portfolio_pagination_settings', array(
        'section' => 'artist_portfolio_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'artist-portfolio' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'artist-portfolio' ),
            'next-prev' => __( 'Next / Previous', 'artist-portfolio' ),
    )));

    $wp_customize->add_setting('artist_portfolio_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','artist-portfolio'),
        'section' => 'artist_portfolio_post_settings',
        'choices' => array(
            'By Block' => __('By Block','artist-portfolio'),
            'By Without Block' => __('By Without Block','artist-portfolio'),
        ),
	) );

    //Single Post Settings
	$wp_customize->add_section('artist_portfolio_single_post_settings', array(
		'title'    => __('Single Post Settings', 'artist-portfolio'),
		'panel'    => 'artist_portfolio_panel_id',
	));

	$wp_customize->add_setting('artist_portfolio_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings'
    ));

    $wp_customize->add_setting('artist_portfolio_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('artist_portfolio_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings'
    ));

   $wp_customize->add_setting('artist_portfolio_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
      $wp_customize,'artist_portfolio_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('artist_portfolio_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
	));
	$wp_customize->add_control('artist_portfolio_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','artist-portfolio'),
		'section' => 'artist_portfolio_single_post_settings'
	));

 	$wp_customize->add_setting('artist_portfolio_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer( $wp_customize, 'artist_portfolio_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('artist_portfolio_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings'
    ));

    $wp_customize->add_setting('artist_portfolio_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings',
    ));

    $wp_customize->add_setting('artist_portfolio_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('artist_portfolio_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings',
    ));

	$wp_customize->add_setting('artist_portfolio_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings',
    ));

	$wp_customize->add_setting('artist_portfolio_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	) );
	$wp_customize->add_control('artist_portfolio_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','artist-portfolio'),
        'section' => 'artist_portfolio_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','artist-portfolio'),
            'Left Sidebar' => __('Left Sidebar','artist-portfolio'),
            'Right Sidebar' => __('Right Sidebar','artist-portfolio')
        ),
	)   );

	$wp_customize->add_setting( 'artist_portfolio_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'artist_portfolio_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','artist-portfolio' ),
		'section'     => 'artist_portfolio_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','artist-portfolio'),
		'type'        => 'text',
		'settings'    => 'artist_portfolio_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'artist_portfolio_comment_form_width',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','artist-portfolio' ),
		'section' => 'artist_portfolio_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('artist_portfolio_title_comment_form',array(
       'default' => __('Leave a Reply','artist-portfolio'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('artist_portfolio_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings'
    ));

    $wp_customize->add_setting('artist_portfolio_comment_form_button_content',array(
       'default' => __('Post Comment','artist-portfolio'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('artist_portfolio_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings'
    ));

	$wp_customize->add_setting('artist_portfolio_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','artist-portfolio'),
       'section' => 'artist_portfolio_single_post_settings'
    ));

	//Related Post Settings
	$wp_customize->add_section('artist_portfolio_related_settings', array(
		'title'    => __('Related Post Settings', 'artist-portfolio'),
		'panel'    => 'artist_portfolio_panel_id',
	));

	$wp_customize->add_setting( 'artist_portfolio_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ) );
    $wp_customize->add_control('artist_portfolio_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','artist-portfolio' ),
        'section' => 'artist_portfolio_related_settings'
    ));

    $wp_customize->add_setting('artist_portfolio_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_related_title',array(
		'label'	=> __('Add Section Title','artist-portfolio'),
		'section'	=> 'artist_portfolio_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'artist_portfolio_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'artist_portfolio_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','artist-portfolio' ),
		'section'     => 'artist_portfolio_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('artist_portfolio_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','artist-portfolio'),
        'section' => 'artist_portfolio_related_settings',
        'choices' => array(
            'categories' => __('Categories','artist-portfolio'),
            'tags' => __('Tags','artist-portfolio'),
        ),
	) );

	$wp_customize->add_setting( 'artist_portfolio_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','artist-portfolio' ),
		'section' => 'artist_portfolio_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Header Section
	$wp_customize->add_section('artist_portfolio_header',array(
		'title'	=> __('Header','artist-portfolio'),
		'description'	=> __('Add header content here','artist-portfolio'),
		'priority'	=> null,
		'panel' => 'artist_portfolio_panel_id',
	));

	$wp_customize->add_setting('artist_portfolio_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'artist_portfolio_sanitize_phone_number'
 	));
 	$wp_customize->add_control('artist_portfolio_phone_number',array(
		'type' => 'text',
		'label' => __('Add Phone Number','artist-portfolio'),
		'section' => 'artist_portfolio_header',
	) );

	$wp_customize->add_setting('artist_portfolio_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
 	));
 	$wp_customize->add_control('artist_portfolio_email_address',array(
		'type' => 'text',
		'label' => __('Add Email Address','artist-portfolio'),
		'section' => 'artist_portfolio_header',
	) );

	$wp_customize->add_setting('artist_portfolio_topbar_location',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('artist_portfolio_topbar_location',array(
		'type' => 'text',
		'label' => __('Add Location','artist-portfolio'),
		'section' => 'artist_portfolio_header',
	) );

	$wp_customize->add_setting('artist_portfolio_header_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('artist_portfolio_header_btn_text',array(
		'type' => 'text',
		'label' => __('Add Button Text','artist-portfolio'),
		'section' => 'artist_portfolio_header',
	) );

	$wp_customize->add_setting('artist_portfolio_header_btn_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
 	));
 	$wp_customize->add_control('artist_portfolio_header_btn_url',array(
		'type' => 'text',
		'label' => __('Add Button URL','artist-portfolio'),
		'section' => 'artist_portfolio_header',
	) );

	$wp_customize->add_setting('artist_portfolio_menu_font_size_option',array(
		'default'=> 12,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize,'artist_portfolio_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','artist-portfolio'),
		'section'=> 'artist_portfolio_header',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('artist_portfolio_menu_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize,'artist_portfolio_menu_padding',array(
		'label'	=> __('Main Menu Padding','artist-portfolio'),
		'section'=> 'artist_portfolio_header',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('artist_portfolio_text_tranform_menu',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices'
 	));
 	$wp_customize->add_control('artist_portfolio_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','artist-portfolio'),
		'section' => 'artist_portfolio_header',
		'choices' => array(
		   'Uppercase' => __('Uppercase','artist-portfolio'),
		   'Lowercase' => __('Lowercase','artist-portfolio'),
		   'Capitalize' => __('Capitalize','artist-portfolio'),
		),
	) );

	$wp_customize->add_setting('artist_portfolio_font_weight_option_menu',array(
		'default' => '',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices'
 	));
 	$wp_customize->add_control('artist_portfolio_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','artist-portfolio'),
		'section' => 'artist_portfolio_header',
		'choices' => array(
		   'Bold' => __('Bold','artist-portfolio'),
		   'Normal' => __('Normal','artist-portfolio'),
		),
	) );

	$wp_customize->add_setting('artist_portfolio_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('artist_portfolio_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_header',
		'type'		=> 'icon'
	)));

	//Header Section
	$wp_customize->add_section('artist_portfolio_social_icons',array(
		'title'	=> __('Social Icons','artist-portfolio'),
		'priority'	=> null,
		'panel' => 'artist_portfolio_panel_id',
	));

	$wp_customize->add_setting('artist_portfolio_facebook_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('artist_portfolio_facebook_url',array(
		'type' => 'url',
		'label' => __('Add Facebook URL','artist-portfolio'),
		'section' => 'artist_portfolio_social_icons',
	));

	$wp_customize->add_setting('artist_portfolio_twitter_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('artist_portfolio_twitter_url',array(
		'type' => 'url',
		'label' => __('Add Twitter URL','artist-portfolio'),
		'section' => 'artist_portfolio_social_icons',
	));

	$wp_customize->add_setting('artist_portfolio_instagram_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('artist_portfolio_instagram_url',array(
		'type' => 'url',
		'label' => __('Add Instagram URL','artist-portfolio'),
		'section' => 'artist_portfolio_social_icons',
	));

	$wp_customize->add_setting('artist_portfolio_pinterest_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('artist_portfolio_pinterest_url',array(
		'type' => 'url',
		'label' => __('Add Pinterest URL','artist-portfolio'),
		'section' => 'artist_portfolio_social_icons',
	));

	//Slider Section
	$wp_customize->add_section( 'artist_portfolio_slider_section' , array(
    	'title'      => __( 'Slider Section', 'artist-portfolio' ),
		'priority'   => null,
		'panel' => 'artist_portfolio_panel_id'
	) );

	$wp_customize->add_setting('artist_portfolio_slider_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
	));
	$wp_customize->add_control('artist_portfolio_slider_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable slider','artist-portfolio'),
		'section' => 'artist_portfolio_slider_section',
	));

	$wp_customize->add_setting('artist_portfolio_slider_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'artist_portfolio_slider_bg_image',array(
		'label' => __('Slider Background Image','artist-portfolio'),
		'description' => __('Image Size (1400px x 550px)','artist-portfolio'),
		'section' => 'artist_portfolio_slider_section'
	)));

	$wp_customize->add_setting('artist_portfolio_slider_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_slider_title',array(
		'type' => 'text',
		'label' => __('Add Title','artist-portfolio'),
		'section' => 'artist_portfolio_slider_section'
	));

	$wp_customize->add_setting('artist_portfolio_slider_btn_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_slider_btn_text',array(
		'type' => 'text',
		'label' => __('Add Button Text','artist-portfolio'),
		'section' => 'artist_portfolio_slider_section'
	));

	$wp_customize->add_setting('artist_portfolio_slider_btn_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('artist_portfolio_slider_btn_url',array(
		'type' => 'url',
		'label' => __('Add Button Link','artist-portfolio'),
		'section' => 'artist_portfolio_slider_section'
	));

	$wp_customize->add_setting('artist_portfolio_arts_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_arts_title',array(
		'type' => 'text',
		'label' => __('Add Arts Title','artist-portfolio'),
		'section' => 'artist_portfolio_slider_section'
	));

	$categories = get_categories( );
 	$cats1 = array();
 	$i = 0;
 	foreach($categories as $category){
     	if($i==0){
         $default = $category->slug;
         $i++;
     	} 
     $cats1[$category->slug] = $category->name;
 	}
 	$wp_customize->add_setting('artist_portfolio_slider_category',array(
     	'sanitize_callback' => 'artist_portfolio_sanitize_choices',
 	));
	$wp_customize->add_control('artist_portfolio_slider_category',array(
		'type'    => 'select',
		'choices' => $cats1,
		'label' => __('Select Slider Category','artist-portfolio'),
		'description' => __('Image Size (170px x 200px)','artist-portfolio'),
		'section' => 'artist_portfolio_slider_section',
 	));

	//Our Services
  	$wp_customize->add_section('artist_portfolio_events_section',array(
		'title' => __('Events Section','artist-portfolio'),
		'description' => '',
		'priority'  => null,
		'panel' => 'artist_portfolio_panel_id',
	));

	$wp_customize->add_setting('artist_portfolio_product_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
	));
	$wp_customize->add_control('artist_portfolio_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Events Section','artist-portfolio'),
		'section' => 'artist_portfolio_events_section'
	));

	$wp_customize->add_setting('artist_portfolio_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_section_title',array(
		'type' => 'text',
		'label' => __('Section Title','artist-portfolio'),
		'section' => 'artist_portfolio_events_section'
	));

	$wp_customize->add_setting('artist_portfolio_section_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_section_text',array(
		'type' => 'text',
		'label' => __('Section Text','artist-portfolio'),
		'section' => 'artist_portfolio_events_section'
	));

 	$categories = get_categories( );
 	$cats = array();
 	$i = 0;
 	foreach($categories as $category){
     	if($i==0){
         $default = $category->slug;
         $i++;
     	} 
     $cats[$category->slug] = $category->name;
 	}
 	$wp_customize->add_setting('artist_portfolio_events_category',array(
     	'sanitize_callback' => 'artist_portfolio_sanitize_choices',
 	));
	$wp_customize->add_control('artist_portfolio_events_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Events Category','artist-portfolio'),
		'section' => 'artist_portfolio_events_section',
 	));

	//footer text
	$wp_customize->add_section('artist_portfolio_footer_section',array(
		'title'	=> __('Footer Text','artist-portfolio'),
		'panel' => 'artist_portfolio_panel_id'
	));

	$wp_customize->add_setting('artist_portfolio_footer_bg_color', array(
		'default'           => '#0d0d0f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'artist_portfolio_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'artist-portfolio'),
		'section'  => 'artist_portfolio_footer_section',
	)));

	$wp_customize->add_setting('artist_portfolio_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'artist_portfolio_footer_bg_image',array(
		'label' => __('Footer Background Image','artist-portfolio'),
		'section' => 'artist_portfolio_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('footer_widget_areas',array(
		'type'        => 'radio',
		'label'       => __('Footer widget area', 'artist-portfolio'),
		'section'     => 'artist_portfolio_footer_section',
		'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'artist-portfolio'),
		'choices' => array(
		   '1'     => __('One', 'artist-portfolio'),
		   '2'     => __('Two', 'artist-portfolio'),
		   '3'     => __('Three', 'artist-portfolio'),
		   '4'     => __('Four', 'artist-portfolio')
		),
	));

	$wp_customize->add_setting('artist_portfolio_hide_show_scroll',array(
		'default' => true,
		'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
	));
	$wp_customize->add_control('artist_portfolio_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','artist-portfolio'),
      	'section' => 'artist_portfolio_footer_section',
	));

	$wp_customize->add_setting('artist_portfolio_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new artist_portfolio_Icon_Changer(
        $wp_customize,'artist_portfolio_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','artist-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'artist_portfolio_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('artist_portfolio_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','artist-portfolio'),
		'section'=> 'artist_portfolio_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('artist_portfolio_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','artist-portfolio'),
        'section' => 'artist_portfolio_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','artist-portfolio'),
            'Right align' => __('Right Align','artist-portfolio'),
            'Center align' => __('Center Align','artist-portfolio'),
        ),
	) );

	$wp_customize->add_setting( 'artist_portfolio_top_bottom_scroll_padding',array(
		'default' => 7,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));
	
	$wp_customize->add_setting('artist_portfolio_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('artist_portfolio_footer_copy',array(
		'label'	=> __('Copyright Text','artist-portfolio'),
		'section'	=> 'artist_portfolio_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','artist-portfolio'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('artist_portfolio_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','artist-portfolio'),
        'section' => 'artist_portfolio_footer_section',
        'choices' => array(
            'left' => __('Left Align','artist-portfolio'),
            'right' => __('Right Align','artist-portfolio'),
            'center' => __('Center Align','artist-portfolio'),
        ),
	) );

	$wp_customize->add_setting('artist_portfolio_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','artist-portfolio' ),
		'section'=> 'artist_portfolio_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'artist_portfolio_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Responsive Media Settings
	$wp_customize->add_section('artist_portfolio_responsive_media',array(
		'title'	=> __('Responsive Media','artist-portfolio'),
		'panel' => 'artist_portfolio_panel_id',
	));

	$wp_customize->add_setting('artist_portfolio_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','artist-portfolio'),
       'section' => 'artist_portfolio_responsive_media'
    ));

    $wp_customize->add_setting('artist_portfolio_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','artist-portfolio'),
       'section' => 'artist_portfolio_responsive_media'
    ));

    $wp_customize->add_setting('artist_portfolio_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','artist-portfolio'),
       'section' => 'artist_portfolio_responsive_media'
    ));

    $wp_customize->add_setting('artist_portfolio_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','artist-portfolio'),
       'section' => 'artist_portfolio_responsive_media'
    ));

	$wp_customize->add_setting('artist_portfolio_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','artist-portfolio'),
       'section' => 'artist_portfolio_responsive_media'
    ));

    $wp_customize->add_setting('artist_portfolio_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','artist-portfolio'),
       'section' => 'artist_portfolio_responsive_media'
    ));

    $wp_customize->add_setting('artist_portfolio_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','artist-portfolio'),
       'section' => 'artist_portfolio_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('artist_portfolio_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','artist-portfolio'),
		'panel' => 'artist_portfolio_panel_id',
	));	

	$wp_customize->add_setting('artist_portfolio_page_not_found_heading',array(
		'default'=> __('404 Not Found','artist-portfolio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_page_not_found_heading',array(
		'label'	=> __('404 Heading','artist-portfolio'),
		'section'=> 'artist_portfolio_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('artist_portfolio_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','artist-portfolio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_page_not_found_text',array(
		'label'	=> __('404 Content','artist-portfolio'),
		'section'=> 'artist_portfolio_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('artist_portfolio_page_not_found_button',array(
		'default'=>  __('Back to Home Page','artist-portfolio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_page_not_found_button',array(
		'label'	=> __('404 Button','artist-portfolio'),
		'section'=> 'artist_portfolio_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('artist_portfolio_no_search_result_heading',array(
		'default'=> __('Nothing Found','artist-portfolio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','artist-portfolio'),
		'description'=>__('The search page heading display when no results are found.','artist-portfolio'),
		'section'=> 'artist_portfolio_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('artist_portfolio_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','artist-portfolio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('artist_portfolio_no_search_result_text',array(
		'label'	=> __('No Search Results Text','artist-portfolio'),
		'description'=>__('The search page text display when no results are found.','artist-portfolio'),
		'section'=> 'artist_portfolio_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'artist_portfolio_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'artist-portfolio' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','artist-portfolio'),
		'priority'   => null,
		'panel' => 'artist_portfolio_panel_id'
	) );

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'artist_portfolio_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'artist_portfolio_per_columns', array(
		'label'    => __( 'Product per columns', 'artist-portfolio' ),
		'section'  => 'artist_portfolio_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('artist_portfolio_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('artist_portfolio_product_per_page',array(
		'label'	=> __('Product per page','artist-portfolio'),
		'section'	=> 'artist_portfolio_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('artist_portfolio_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','artist-portfolio'),
       'section' => 'artist_portfolio_woocommerce_section',
    ));

    $wp_customize->add_setting('artist_portfolio_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','artist-portfolio'),
       'section' => 'artist_portfolio_woocommerce_section',
    ));

    $wp_customize->add_setting('artist_portfolio_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
    ));
    $wp_customize->add_control('artist_portfolio_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','artist-portfolio'),
       'section' => 'artist_portfolio_woocommerce_section',
    ));

    $wp_customize->add_setting( 'artist_portfolio_woo_product_sale_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','artist-portfolio'),
        'section'  => 'artist_portfolio_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('artist_portfolio_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','artist-portfolio'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'artist_portfolio_woocommerce_section',
	)));

    $wp_customize->add_setting('artist_portfolio_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','artist-portfolio'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'artist_portfolio_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('artist_portfolio_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','artist-portfolio'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'artist_portfolio_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('artist_portfolio_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'artist_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('artist_portfolio_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','artist-portfolio'),
        'section' => 'artist_portfolio_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','artist-portfolio'),
            'Left' => __('Left','artist-portfolio'),
        ),
	));

	$wp_customize->add_setting( 'artist_portfolio_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_woocommerce_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

   $wp_customize->add_setting('artist_portfolio_woocommerce_product_border_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'artist_portfolio_sanitize_checkbox'
   ));
   $wp_customize->add_control('artist_portfolio_woocommerce_product_border_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable product border','artist-portfolio'),
      'section' => 'artist_portfolio_woocommerce_section',
   ));

	$wp_customize->add_setting( 'artist_portfolio_woocommerce_product_padding_top',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_woocommerce_product_padding_right',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_woocommerce_product_border_radius',array(
		'default' => 3,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'artist_portfolio_woocommerce_product_box_shadow',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'artist_portfolio_sanitize_integer'
	));
	$wp_customize->add_control( new artist_portfolio_Custom_Control( $wp_customize, 'artist_portfolio_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','artist-portfolio' ),
		'section' => 'artist_portfolio_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('artist_portfolio_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'artist_portfolio_sanitize_choices'
    ));
    $wp_customize->add_control('artist_portfolio_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','artist-portfolio'),
       'choices' => array(
            'Yes' => __('Yes','artist-portfolio'),
            'No' => __('No','artist-portfolio'),
        ),
       'section' => 'artist_portfolio_woocommerce_section',
    ));
	
}
add_action( 'customize_register', 'artist_portfolio_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class artist_portfolio_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'artist_portfolio_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new artist_portfolio_Customize_Section_Pro(
				$manager,
				'artist_portfolio_example_1',
				array(
					'title'   =>  esc_html__( 'Artist Portfolio Pro', 'artist-portfolio' ),
					'pro_text' => esc_html__( 'Go Pro', 'artist-portfolio' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/artist-portfolio-wordpress-theme/' ),
					'priority'   => 9
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'artist-portfolio-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'artist-portfolio-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function artist_portfolio_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'artist-portfolio'),
	        '2'     => __('Two', 'artist-portfolio'),
	        '3'     => __('Three', 'artist-portfolio'),
	        '4'     => __('Four', 'artist-portfolio')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
artist_portfolio_Customize::get_instance();