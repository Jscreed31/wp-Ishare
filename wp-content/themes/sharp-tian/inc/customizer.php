<?php
/**
 * sharp-tian Theme Customizer
 *
 * @package sharp-tian
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
global $sharp_tian_fonttotal;
$sharp_tian_fonttotal = array(
        __( 'Select Font', 'sharp-tian'  ),
        __( 'Abril Fatface', 'sharp-tian'  ),
        __( 'BenchNine', 'sharp-tian' ),
        __( 'Cookie', 'sharp-tian'  ),
        __( 'Economica', 'sharp-tian'  ),
        __( 'Monda' , 'sharp-tian' ),
    );
function sharp_tian_customize_register( $wp_customize ) {

	$wp_customize->remove_control('background_color');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');


	$font_weight = array('100' => '100',
			            '200' => '200',
			            '300' => '300',
			            '400' => '400',
				    '500' => '500',
				    '600' => '600',
				    '700' => '700',
				    '800' => '800',
				    '900' => '900',
				    'bold' => 'bold',
				    'bolder' => 'bolder',
				    'inherit' => 'inherit',
				    'initial' => 'initial',
				    'normal' => 'normal',
				    'revert' => 'revert',
				    'unset' => 'unset',
			);

	$text_transform = array(
				'capitalize' => 'Capitalize',
				'inherit'	 => 'Inherit',
				'lowercase'  => 'Lowercase',
				'uppercase'  => 'Uppercase',
	);

	$image_position = array(
				    'left top' => 'Left Top',
			            'left center' => 'Left Center',
			            'left bottom' => 'Left Bottom',
			            'right top' => 'Right Top',
			            'right center' => 'Right Center',
			            'right bottom' => 'Right Bottom',
			            'center top' => 'Center Top',
			            'center center' => 'Center Center',
			            'center bottom' => 'Center Bottom',
	);

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'sharp_tian_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'sharp_tian_customize_partial_blogdescription',
			)
		);
	}

	// Documentation
		if ( method_exists( $wp_customize, 'register_section_type' ) ) {
			$wp_customize->register_section_type( 'sharp_tian_documentation_Upsell_Section' );
		}
		if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
			$wp_customize->add_section(
				new sharp_tian_documentation_Upsell_Section(
					$wp_customize,
					'sharp_tian_documentation_Upsell_Section',
					array(
						'pro_text'    => esc_html__( 'Documentation', 'sharp-tian' ),
	                			// 'pro_text' => esc_html__( 'Read More', 'sharp-tian' ),
	                			'pro_url'  => 'https://www.inverstheme.com/sharp-tian-documentation/',
						'capability' => 'edit_theme_options',
						'priority' => 0,
						'type' => 'sharp-tian-gp-upsell-section',
					)
				)
			);
		}

	// pro version button
		if ( method_exists( $wp_customize, 'register_section_type' ) ) {
			$wp_customize->register_section_type( 'pro_section_custom_control' );
		}
		if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
			$wp_customize->add_section(
				new pro_section_custom_control(
					$wp_customize,
					'pro_section_custom_control',
					array(
	                			'pro_text' => esc_html__( 'Upgrade To PRO', 'sharp-tian' ),
	                			'pro_url'  => 'https://www.inverstheme.com/theme/sharp-tian-pro/',
						'capability' => 'edit_theme_options',
						'priority' => 0,
						'type' => 'sharp_tian_pro_section',
					)
				)
			);
		}


	//color section
		//body link color
			$wp_customize->add_setting( 'sharp_tian_link_color', 
				array(
		            'default'    => '#214462', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
		        ) 
		    ); 

	        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
		        $wp_customize,'sharp_tian_link_color',array(
		            'label'      => esc_html__( 'Link Color', 'sharp-tian' ), 
		            'settings'   => 'sharp_tian_link_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 
	    //body link hover color
			$wp_customize->add_setting( 'sharp_tian_link_hover_color', 
				array(
		            'default'    => '#000000', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
		        ) 
		    ); 

	        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
		        $wp_customize,'sharp_tian_link_hover_color',array(
		            'label'      => esc_html__( 'Link Hover Color', 'sharp-tian' ), 
		            'settings'   => 'sharp_tian_link_hover_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 

	//Social Info our panels
		$wp_customize->add_panel( 'sharp_tian_social_icon', array(
			'title'          => esc_html__('Social Info', 'sharp-tian'),
			'priority'  => 1,
		) );
		// Create Contact Info Section
			$wp_customize->add_section( 'contant_info_section' , array(
				'title'             => 'Contact Info',
				'panel'             => 'sharp_tian_social_icon',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'sharp_tian_contact_info_number', 
			        array(
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharp_tian_contact_info_number', 
			        array(
			            'label'      => esc_html__( 'Contact Info Number', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_contact_info_number',
			            'section'    => 'contant_info_section',
			        ) 
		        ) ); 
		        if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
				    'sharp_tian_contact_info_number',
					array(
						'selector'        => '.contact_info',
						'render_callback' => 'custom_customize_featuredimage_slider',
					)
				);
			}
		    //Email Info Section in Email info
			    $wp_customize->add_setting( 'sharp_tian_email_info_number', 
			        array(
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharp_tian_email_info_number', 
			        array(
			            'label'      => esc_html__( 'Email ID', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_email_info_number',
			            'section'    => 'contant_info_section',
			        ) 
		        ) ); 
		        if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
				    'sharp_tian_email_info_number',
					array(
						'selector'        => '.email_info',
						'render_callback' => 'custom_customize_featuredimage_slider',
					)
				);
			}
		//Create Social Info Section
		    $wp_customize->add_section( 'social_icon_section' , array(
				'title'             => esc_html__('Social Info', 'sharp-tian' ),
				'panel'             => 'sharp_tian_social_icon',
			) );
			// Social Icon tabing
				$wp_customize->add_setting( 'social_icon_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'social_icon_tab',array(
			            'settings'   => 'social_icon_tab', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) ); 
		    //Display Social Icon
		        $wp_customize->add_setting( 'display_social_icon', array(		                
	                		// 'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_social_icon', 
			    	array(
		                'label' => esc_html__('Display Social Icon', 'sharp-tian' ),
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'social_icon_section',
		                'settings' => 'display_social_icon',
		                'active_callback' => 'sharp_tian_social_icon_general_callback',
			        )
			    )); 
			//Create Social Icon in add filed
				$wp_customize->add_setting( 'social_icon_section_content', 
					array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            // 'default' => sharp_tian_get_icon_default(),
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				);
				$wp_customize->add_control( new Customizer_Repeaterss( 
				$wp_customize, 'social_icon_section_content', array(
					'label'                             => esc_html__( 'Icon Items Content', 'sharp-tian' ),
					'section'                           => 'social_icon_section',
					'add_field_label'                   => esc_html__( 'Add new Icon', 'sharp-tian' ),
					'item_name'                         => esc_html__( 'Icon Item', 'sharp-tian' ),
					'customizer_repeater_icon_control'  => true,
					'customizer_repeater_link_control'  => true,
		            'customizer_repeater_checkbox_control' => true,
		            'active_callback' => 'sharp_tian_social_icon_general_callback',
				    ) ) );
			//Social Icon in pro version
				$wp_customize->add_setting('social_icon_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'social_icon_pro',
			    	array(
				        'settings' => 'social_icon_pro',
				        'section' => 'social_icon_section',
				        'type' => 'customizer-repeater',
				        'active_callback' => 'sharp_tian_social_icon_general_callback',
			        )
			    ));	
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'social_icon_section_content',
					array(
						'selector'        => '.header_social_icon',
						'render_callback' => 'custom_customize_featuredimage_slider',
					)
				);
			}
			//Social Icon background Color
				$wp_customize->add_setting( 'social_icon_bg_color', 
			        array(
			            'default'    => '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_bg_color', 
			        array(
			            'label'      => esc_html__( 'Icon Background Color', 'sharp-tian' ), 
			            'settings'   => 'social_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'sharp_tian_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon background Hover Color
				$wp_customize->add_setting( 'social_icon_bg_hover_color', 
			        array(
			            'default'    => '#ef7a86',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_bg_hover_color', 
			        array(
			            'label'      => esc_html__( 'Icon Background Hover Color', 'sharp-tian' ), 
			            'settings'   => 'social_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'sharp_tian_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Color
		    	$wp_customize->add_setting( 'social_icon_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_color', 
			        array(
			            'label'      => esc_html__( 'Icon Color', 'sharp-tian' ), 
			            'settings'   => 'social_icon_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'sharp_tian_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Hover Color
		    	$wp_customize->add_setting( 'social_icon_hover_color', 
			        array(
			        	'default'    => '#214462',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_hover_color', 
			        array(
			            'label'      => esc_html__( 'Icon Hover Color', 'sharp-tian' ), 
			            'settings'   => 'social_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'sharp_tian_social_icon_design_callback',
			        ) 
		        ) );
		
	    //Create top bar width
		    $wp_customize->add_section( 'top_bar_width_section' , array(
				'title'             => 'Top Bar Width',
				'panel'             => 'sharp_tian_social_icon',
			) );
			//Container Option in top bar width layout
		        $wp_customize->add_setting('sharp_tian_top_bar_width_layout', array(
			        'default'        => 'content_width',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_top_bar_width_layout',
			    	array(
				        'settings' => 'sharp_tian_top_bar_width_layout',
				        'label'   => esc_html__('Top Bar Width Layouts', 'sharp-tian' ),
				        'section' => 'top_bar_width_section',
				        'type'    => 'select',
				        'choices' => array(
				        			'full_width' => 'Full Width',
				        			'content_width' => 'Content Width',
				        ),
			        )
			    ));
			//Container Option in top bar container width
		        $wp_customize->add_setting('sharp_tian_top_bar_container_width', array(
			        'default'        => '1100',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_top_bar_container_width',
			    	array(
				        'settings' => 'sharp_tian_top_bar_container_width',
				        'description' => 'in px',
				        'label'   => esc_html__('Top Bar Content Width', 'sharp-tian' ),
				        'section' => 'top_bar_width_section',
				        'type'    => 'number',
				        'active_callback'  => 'sharp_tian_top_bar_content_width_callback',
			        )
			    ));

	//Header Option
		$wp_customize->add_panel( 'sharp_tian_header_panel', array(
			'title'     => esc_html__('Header', 'sharp-tian'),
			'priority'  => 2,
		) ); 
		// Create Header option
			$wp_customize->add_section( 'header_option_section' , array(
				'title'             => esc_html__('Header Option', 'sharp-tian' ),
				'panel'             => 'sharp_tian_header_panel',
			) );
			//select header layout	
				$wp_customize->add_setting( 'sharp_tian_header_layout', 
			        array(
			            'default'    => 'header1', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Custom_Radio_Image_Control( 
			        $wp_customize,'sharp_tian_header_layout',array(
			        	'label'      => esc_html__( 'Header Layout', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_header_layout', 
			            'priority'   => 0,
			            'section'    => 'header_option_section',
			            'type'    => 'select',
			            'choices'    => sharp_tian_header_site_layout(),
			        ) 
		        ) );
		        

		        //Header 1
		        	//Header1 top bar background color
					$wp_customize->add_setting( 'header1_top_bar_bg_color', 
				        array(
				            'default'    => '#fbe4e6', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'header1_top_bar_bg_color', 
				        array(
				            'label'      => esc_html__( 'Top Bar Background Color', 'sharp-tian' ), 
				            'settings'   => 'header1_top_bar_bg_color', 
				            'priority'   => 10,
				            'section'    => 'header_option_section', 
				            'active_callback' => 'sharp_tian_header1_callback',
						[
							[
								'setting'  => 'sharp_tian_header_layout',
								'operator' => '===',
								'value'    => 'header1',
							],
						],    
				        ) 
			        ) );
			    //top bar text color
					$wp_customize->add_setting( 'header1_top_bar_text_color', 
				        array(
				            'default'    => '#000000', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'header1_top_bar_text_color', 
				        array(
				            'label'      => esc_html__( 'Top Bar Text Color', 'sharp-tian' ), 
				            'settings'   => 'header1_top_bar_text_color', 
				            'priority'   => 10,
				            'section'    => 'header_option_section',   
				            'active_callback' => 'sharp_tian_header1_callback',  
				            	[
							[
								'setting'  => 'sharp_tian_header_layout',
								'operator' => '===',
								'value'    => 'header1',
							],
						], 
				        ) 
			        ) );
			    //top bar site title color
					$wp_customize->add_setting( 'header1_top_bar_sitetitle_color', 
				        array(
				            'default'    => '#214462', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'header1_top_bar_sitetitle_color', 
				        array(
				            'label'      => esc_html__( 'Top Bar Site title Color', 'sharp-tian' ), 
				            'settings'   => 'header1_top_bar_sitetitle_color', 
				            'priority'   => 10,
				            'section'    => 'header_option_section',   
				            'active_callback' => 'sharp_tian_header1_callback',  
				            	[
							[
								'setting'  => 'sharp_tian_header_layout',
								'operator' => '===',
								'value'    => 'header1',
							],
						], 
				        ) 
			        ) );
		        	//Header1 Background color
			        $wp_customize->add_setting( 'sharp_tian_header1_bg_color', 
				        array(
				            'default'    => '#fff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharp_tian_header1_bg_color', 
				        array(
				            'label'      => esc_html__( 'Background Color', 'sharp-tian' ), 
				            'settings'   => 'sharp_tian_header1_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'header_option_section',
				            'active_callback' => 'sharp_tian_header1_callback',
				            	[
							[
								'setting'  => 'sharp_tian_header_layout',
								'operator' => '===',
								'value'    => 'header1',
							],
						], 
				        ) 
			        ) );
			    
			    //Header1 Link Color
			        $wp_customize->add_setting( 'sharp_tian_header1_Link_color', 
				        array(
				            'default'    => '#222222', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharp_tian_header1_Link_color', 
				        array(
				            'label'      => esc_html__('Link Color', 'sharp-tian' ), 
				            'settings'   => 'sharp_tian_header1_Link_color', 
				            'priority'   => 10, 
				            'section'    => 'header_option_section',
				            'active_callback' => 'sharp_tian_header1_callback',
				            	[
							[
								'setting'  => 'sharp_tian_header_layout',
								'operator' => '===',
								'value'    => 'header1',
							],
						], 
				        ) 
			        ) );
			    //Header1 Link Hover Color
			        $wp_customize->add_setting( 'sharp_tian_header1_linkhover_color', 
				        array(
				            'default'    => '#a06224', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharp_tian_header1_linkhover_color', 
				        array(
				            'label'      => esc_html__( 'Link hover Color', 'sharp-tian' ), 
				            'settings'   => 'sharp_tian_header1_linkhover_color', 
				            'priority'   => 10, 
				            'section'    => 'header_option_section',
				            'active_callback' => 'sharp_tian_header1_callback',
				            	[
							[
								'setting'  => 'sharp_tian_header_layout',
								'operator' => '===',
								'value'    => 'header1',
							],
						], 
				        ) 
			        ) );
			    
		        

			

			//Manu Link Active Color
		        $wp_customize->add_setting( 'sharp_tian_menu_active_color', 
			        array(
			            'default'    => '#7fa7c5', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_menu_active_color',array(
			            'label'      => esc_html__( 'Menu Active Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_menu_active_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',		   							
			        ) 
		        ) ); 
			//Desktop submenu background color
			    $wp_customize->add_setting( 'sharp_tian_submenu_bg_color', 
			        array(
			            'default'    => 'rgba(0,0,0,0.6)', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_submenu_bg_color',array(
			            'label'      => esc_html__( 'Desktop Submenu Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_submenu_bg_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',		   							
			        ) 
		        ) ); 
		    //Mobile nav menu background color
		        $wp_customize->add_setting( 'sharp_tian_mobile_navmenu_bg_color', 
			        array(
			            'default'    => '#273641', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_mobile_navmenu_bg_color',array(
			            'label'      => esc_html__( 'Mobile Nav menu Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_mobile_navmenu_bg_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',		   							
			        ) 
		        ) ); 
			//mobile submenu background color
			    $wp_customize->add_setting( 'sharp_tian_mobile_submenu_bg_color', 
			        array(
			            'default'    => '#957b45', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_mobile_submenu_bg_color',array(
			            'label'      => esc_html__( 'Mobile Submenu Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_mobile_submenu_bg_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',		   							
			        ) 
		        ) ); 
		    //Mobile nav menu active background color
		        $wp_customize->add_setting( 'sharp_tian_mobile_navmenu_active_color', 
			        array(
			            'default'    => '#cb9b31', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_mobile_navmenu_active_color',array(
			            'label'      => esc_html__( 'Mobile Nav Menu Acive Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_mobile_navmenu_active_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',		   							
			        ) 
		        ) ); 
		    //mobile menu link color
		        $wp_customize->add_setting( 'sharp_tian_mobile_link_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_mobile_link_color',array(
			            'label'      => esc_html__( 'Mobile menu Link Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_mobile_link_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',		   							
			        ) 
		        ) ); 
		    

			
	    //Header width
			$wp_customize->add_section( 'header_width_section' , array(
				'title'             => 'Header Width',
				'panel'             => 'sharp_tian_header_panel',
			) );
			//Container Option in Header width layout
		        $wp_customize->add_setting('sharp_tian_header_width_layout', array(
			        'default'        => 'content_width',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_header_width_layout',
			    	array(
				        'settings' => 'sharp_tian_header_width_layout',
				        'label'   => esc_html__('Header Width Layouts', 'sharp-tian' ),
				        'section' => 'header_width_section',
				        'type'    => 'select',
				        'choices' => array(
				        			'full_width' => 'Full Width',
				        			'content_width' => 'Content Width',
				        ),
			        )
			    ));
			//Container Option in Header container width
		        $wp_customize->add_setting('sharp_tian_header_container_width', array(
			        'default'        => '1100',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_header_container_width',
			    	array(
				        'settings' => 'sharp_tian_header_container_width',
				        'description'  => 'in px',
				        'label'   => esc_html__('Header Content Width', 'sharp-tian' ),
				        'section' => 'header_width_section',
				        'type'    => 'number',
				        'active_callback'  => 'sharp_tian_header_content_width_callback',
			        )
			    ));
		

    //Global create in add 
		$wp_customize->add_panel( 'sharp_tian_global_panel', array(
			'title'     => esc_html__('Global', 'sharp-tian'),
			'priority'  => 3,
		) );
		// Create global Fonts & Typography option
			$wp_customize->add_section( 'global_body_section' , array(
				'title'  => esc_html__('Body Fonts & Typography', 'sharp-tian'),
				'panel'  => 'sharp_tian_global_panel',
			) );			
			//global option in body font family add select dropdown
				global $sharp_tian_fonttotal;
		        $wp_customize->add_setting('sharp_tian_body_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_body_fontfamily',
			    	array(
				        'settings' => 'sharp_tian_body_fontfamily',
				        'label'   => esc_html__('Body Font Family', 'sharp-tian'),
				        'section' => 'global_body_section',
				        'type'    => 'select',
				        'choices' => $sharp_tian_fonttotal,
				    )
				));
			//global otion in body font size 
				$wp_customize->add_setting('sharp_tian_body_font_size', array(
			        'default'        => 15,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_body_font_size',
			    	array(
				        'settings' => 'sharp_tian_body_font_size',
				        'label'   => esc_html__('Body Font Size', 'sharp-tian'),
				        'section' => 'global_body_section',
				        'type'  => "number",
				        'description' => 'in px',
		            	'input_attrs' => array(
						    'min' => 1,
						    'max' => 50,
						),
			        )
			    )); 
			//global option in body font weight
			    $wp_customize->add_setting('sharp_tian_body_font_weight', array(
			        'default'        => 400,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_body_font_weight',
			    	array(
				        'settings' => 'sharp_tian_body_font_weight',
				        'label'   => esc_html__('Body Font Weight', 'sharp-tian'),
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' => $font_weight,
			        )
			    ));
			//global option in body text transform
			    $wp_customize->add_setting('sharp_tian_body_text_transform', array(
			        'default'        => 'inherit',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_body_text_transform',
			    	array(
				        'settings' => 'sharp_tian_body_text_transform',
				        'label'   => esc_html__('Body Text Transform', 'sharp-tian'),
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' =>  $text_transform,
			        )
			    ));

				//mobile in font size
				    $wp_customize->add_setting( 'sharp_tian_mobile_font_size', 
				        array(
				            'default'    => '14', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharp_tian_mobile_font_size', 
				        array(
				            'label'      => esc_html__( 'Mobile Font Size', 'sharp-tian' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharp_tian_mobile_font_size', 
				            'section'    => 'global_body_section',
				            'description' => 'in px',
				            'input_attrs' => array(
							    'min' => 1,
							    'max' => 100,
							),
				        ) 
			        ) );

		// Create global Heading Fonts & Typography option
			$wp_customize->add_section( 'global_heading_section' , array(
				'title'             => 'Heading Fonts & Typography',
				'panel'             => 'sharp_tian_global_panel',
			) );
			//global option in body font family add select dropdown
				global $sharp_tian_fonttotal;
		        $wp_customize->add_setting('sharp_tian_Heading_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_Heading_fontfamily',
			    	array(
				        'settings' => 'sharp_tian_Heading_fontfamily',
				        'label'   => esc_html__('Heading Font Family', 'sharp-tian' ),
				        'section' => 'global_heading_section',
				        'type'    => 'select',
				        'choices' => $sharp_tian_fonttotal,
			        )
			    )); 

			//heading1 Title
			    $wp_customize->add_setting('Heading1_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading1_section',
			    	array(
				        'settings' => 'Heading1_section',
				        'label'   => esc_html__('Heading 1 (H1)', 'sharp-tian' ),
				        'section' => 'global_heading_section',
				        'type'     => 'sharp-tian-ast-description',
			        )
			    ));

				//global option in heading1 font family
					global $sharp_tian_fonttotal;
			        $wp_customize->add_setting('sharp_tian_Heading1_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_Heading1_fontfamily',
				    	array(
					        'settings' => 'sharp_tian_Heading1_fontfamily',
					        'label'   => esc_html__('Font Family', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $sharp_tian_fonttotal,
				        )
				    ));
				//global heading1 font size
				    $wp_customize->add_setting( 'sharp_tian_heading1_font_size', 
				        array(
				            'default'    => '35', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'sharp_tian_heading1_font_size', 
				        array(
				            'label'      => esc_html__( 'Font Size', 'sharp-tian' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharp_tian_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
							    'min' => 1,
							    'max' => 100,
							),
				        ) 
			        ) );
			    //global in heading1 font weight
				    $wp_customize->add_setting('sharp_tian_heading1_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_heading1_font_weight',
				    	array(
					        'settings' => 'sharp_tian_heading1_font_weight',
					        'label'   => esc_html__('Font Weight', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading1 text transform
				    $wp_customize->add_setting('sharp_tian_heading1_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_heading1_text_transform',
				    	array(
					        'settings' => 'sharp_tian_heading1_text_transform',
					        'label'   => esc_html__('Text Transform', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading1 font size
				    $wp_customize->add_setting( 'sharp_tian_mobile_heading1_font_size', 
				        array(
				            'default'    => '20', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharp_tian_mobile_heading1_font_size', 
				        array(
				            'label'      => esc_html__( 'Mobile Font Size', 'sharp-tian' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharp_tian_mobile_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
							    'min' => 1,
							    'max' => 100,
							),
				        ) 
			        ) );

		    //heading2 Title
			    $wp_customize->add_setting('Heading2_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading2_section',
			    	array(
				        'settings' => 'Heading2_section',
				        'label'   => esc_html__('Heading 2 (H2)', 'sharp-tian' ),
				        'section' => 'global_heading_section',
			        )
			    ));
				//global option in heading2 font family
					global $sharp_tian_fonttotal;
			        $wp_customize->add_setting('sharp_tian_Heading2_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_Heading2_fontfamily',
				    	array(
					        'settings' => 'sharp_tian_Heading2_fontfamily',
					        'label'   => esc_html__('Font Family', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $sharp_tian_fonttotal,
				        )
				    )); 
				//global heading2 font size
				    $wp_customize->add_setting( 'sharp_tian_heading2_font_size', 
				        array(
				            'default'    => '28', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharp_tian_heading2_font_size', 
				        array(
				            'label'      => esc_html__( 'Font Size', 'sharp-tian' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharp_tian_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
							    'min' => 1,
							    'max' => 100,
							),
				        ) 
			        ) );
			    //global in heading2 font weight
				    $wp_customize->add_setting('sharp_tian_heading2_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_heading2_font_weight',
				    	array(
					        'settings' => 'sharp_tian_heading2_font_weight',
					        'label'   => esc_html__('Font Weight', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('sharp_tian_heading2_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_heading2_text_transform',
				    	array(
					        'settings' => 'sharp_tian_heading2_text_transform',
					        'label'   => esc_html__('Text Transform', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'sharp_tian_mobile_heading2_font_size', 
				        array(
				            'default'    => '22', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharp_tian_mobile_heading2_font_size', 
				        array(
				            'label'      => esc_html__( 'Mobile Font Size', 'sharp-tian' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharp_tian_mobile_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
							    'min' => 1,
							    'max' => 100,
							),
				        ) 
			        ) );

		    //heading3 Title
			    $wp_customize->add_setting('Heading3_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading3_section',
			    	array(
				        'settings' => 'Heading3_section',
				        'label'   => esc_html__('Heading 3 (H3)', 'sharp-tian' ),
				        'section' => 'global_heading_section',
			        )
			    ));
				//global option in heading3 font family
					global $sharp_tian_fonttotal;
			        $wp_customize->add_setting('sharp_tian_Heading3_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_Heading3_fontfamily',
				    	array(
					        'settings' => 'sharp_tian_Heading3_fontfamily',
					        'label'   => esc_html__('Font Family', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $sharp_tian_fonttotal,
				        )
				    ));
			    //global heading3 font size
				    $wp_customize->add_setting( 'sharp_tian_heading3_font_size', 
				        array(
				            'default'    => '25', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharp_tian_heading3_font_size', 
				        array(
				            'label'      => esc_html__( 'Font Size', 'sharp-tian' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharp_tian_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
							    'min' => 1,
							    'max' => 100,
							),
				        ) 
			        ) );
			    //global in heading3 font weight
				    $wp_customize->add_setting('sharp_tian_heading3_font_weight', array(
				        'default'        => 400,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_heading3_font_weight',
				    	array(
					        'settings' => 'sharp_tian_heading3_font_weight',
					        'label'   => esc_html__('Font Weight', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('sharp_tian_heading3_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharp_tian_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_heading3_text_transform',
				    	array(
					        'settings' => 'sharp_tian_heading3_text_transform',
					        'label'   => esc_html__('Text Transform', 'sharp-tian' ),
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'sharp_tian_mobile_heading3_font_size', 
				        array(
				            'default'    => '20', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharp_tian_mobile_heading3_font_size', 
				        array(
				            'label'      => esc_html__( 'Mobile Font Size', 'sharp-tian' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharp_tian_mobile_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
							    'min' => 1,
							    'max' => 100,
							),
				        ) 
			        ) );

		// Create Container Option
			$wp_customize->add_section( 'global_container_option' , array(
				'title'  => 'Container',
				'panel'  => 'sharp_tian_global_panel',
			) );
			//Container Blog Title
				$wp_customize->add_setting( 'sharp_tian_blog_title', 
			        array(
			            'default'    => 'Blog', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharp_tian_blog_title', 
			        array(
			            'label'      => esc_html__( 'Blog Title', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_blog_title', 
			            'priority'   => 0, 
			            'type'       => 'text',
			            'section'    => 'global_container_option',
			        ) 
		        ) );
			//Container Option in Backgound Color
				$wp_customize->add_setting( 'sharp_tian_container_bg_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_container_bg_color', 
			        array(
			            'label'      => esc_html__( 'Container Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_container_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_option',
			        ) 
		        ) );	
		        //Container Option in text Color
				$wp_customize->add_setting( 'sharp_tian_container_text_color', 
			        array(
			            'default'    => '#000000', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_container_text_color', 
			        array(
			            'label'      => esc_html__( 'Container Text Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_container_text_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_option',
			        ) 
		        ) );	
			//Container Option in page layout
		        $wp_customize->add_setting('sharp_tian_container_page_layout', array(
			        'default'        => 'content_boxed',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_container_page_layout',
			    	array(
				        'settings' => 'sharp_tian_container_page_layout',
				        'label'   => esc_html__('Page Layouts', 'sharp-tian' ),
				        'section' => 'global_container_option',
				        'type'    => 'select',
				        'choices' => array(
			        			'full_layout' => 'Full Width / Contained',
			        			'boxed_layout' => 'Boxed Layout',
			        			'content_boxed' => 'Content Boxed',
				        ),
			        )
			    ));
			    //Container Option in container width
			        $wp_customize->add_setting('sharp_tian_container_width', array(
				        'default'        => '1100',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_container_width',
				    	array(
					        'settings' => 'sharp_tian_container_width',
					        'label'   => esc_html__('Container Width', 'sharp-tian' ),
					        'section' => 'global_container_option',
					        'type'    => 'text',
				        )
				    ));
			//Content Boxed background color
		        $wp_customize->add_setting( 'sharp_tian_boxed_layout_bg_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_boxed_layout_bg_color', 
			        array(
			            'label'      => esc_html__( 'Boxed Layout Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_boxed_layout_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_option',
			            'active_callback'  => 'sharp_tian_boxed_layout_callback',
	   							[
									[
										'setting'  => 'sharp_tian_container_page_layout',
										'operator' => '===',
										'value'    => 'boxed_layout',
									],
								],
			        ) 
		        ) );
			//Container Option in blog layout
		        $wp_customize->add_setting('sharp_tian_container_blog_layout', array(
			        'default'        => 'grid_view',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_container_blog_layout',
			    	array(
				        'settings' => 'sharp_tian_container_blog_layout',
				        'label'   => esc_html__('Blogs Layouts', 'sharp-tian' ),
				        'section' => 'global_container_option',
				        'type'    => 'select',
				        'choices' => array(
			        			'list_view' => 'List View',
			        			'list_view1' => 'List View1',
			        			'grid_view' => 'Grid View',
				        ),
			        )
			    ));		    
			//Content Boxed Title
			    $wp_customize->add_setting('content_boxed_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'content_boxed_section',
			    	array(
				        'settings' => 'content_boxed_section',
				        'label'   => esc_html__('Content Box Layout', 'sharp-tian' ),
				        'section' => 'global_container_option',
				        'type'     => 'sharp-tian-ast-description',
				        'active_callback'  => 'sharp_tian_content_boxed_callback',
			   							[
											[
												'setting'  => 'sharp_tian_container_page_layout',
												'operator' => '===',
												'value'    => 'content_boxed',
											],
										],
			        )
			    ));
			    //Content Boxed background color
			        $wp_customize->add_setting( 'sharp_tian_content_boxed_bg_color', 
				        array(
				            'default'    => '#eeeeee', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharp_tian_content_boxed_bg_color', 
				        array(
				            'label'      => esc_html__( 'Content Boxed Background Color', 'sharp-tian' ), 
				            'settings'   => 'sharp_tian_content_boxed_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'global_container_option',
				            'active_callback'  => 'sharp_tian_content_boxed_callback',
			   							[
											[
												'setting'  => 'sharp_tian_container_page_layout',
												'operator' => '===',
												'value'    => 'content_boxed',
											],
										],
				        ) 
			        ) );
			
			//Grid View Title
			    $wp_customize->add_setting('grid_view_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'grid_view_section',
			    	array(
				        'settings' => 'grid_view_section',
				        'label'   => esc_html__('Grid View', 'sharp-tian' ),
				        'section' => 'global_container_option',
				        'type'     => 'sharp-tian-ast-description',
				        'active_callback'  => 'sharp_tian_grid_view_callback',
			   							[
											[
												'setting'  => 'sharp_tian_container_blog_layout',
												'operator' => '===',
												'value'    => 'grid_view',
											],
										],
			        )
			    ));
				//Container Option in grid view columns
			        $wp_customize->add_setting('sharp_tian_container_grid_view_col', array(
				        'default'        => '3',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_container_grid_view_col',
				    	array(
					        'settings' => 'sharp_tian_container_grid_view_col',
					        'label'   => esc_html__('Columns', 'sharp-tian' ),
					        'section' => 'global_container_option',
					        'type'    => 'select',
					        'choices' => array(
					        			'1' => '1',
					        			'2' => '2',
					        			'3' => '3',
					        ),
					        'active_callback'  => 'sharp_tian_grid_view_callback',
			   							[
											[
												'setting'  => 'sharp_tian_container_blog_layout',
												'operator' => '===',
												'value'    => 'grid_view',
											],
										],
				        )
				    ));
				//Container Option in grid view columns gap
			        $wp_customize->add_setting('sharp_tian_container_grid_view_col_gap', array(
				        'default'        => '20',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_container_grid_view_col_gap',
				    	array(
					        'settings' => 'sharp_tian_container_grid_view_col_gap',
					        'label'   => esc_html__('Columns Gap', 'sharp-tian' ),
					        'section' => 'global_container_option',
					        'type'    => 'number',
					        'description' => 'in px',
					        'active_callback'  => 'sharp_tian_grid_view_callback',
			   							[
											[
												'setting'  => 'sharp_tian_container_blog_layout',
												'operator' => '===',
												'value'    => 'grid_view',
											],
										],
				        )
				    ));
			//Display meta and entry-content title
				$wp_customize->add_setting('display_meta_content_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'display_meta_content_section',
			    	array(
				        'settings' => 'display_meta_content_section',
				        'label'   => esc_html__('Display Container', 'sharp-tian' ),
				        'section' => 'global_container_option',
			        )
			    )); 
			//display containe
		        $wp_customize->add_setting( 'sharp_tian_container_containe', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_container_containe', 
					array(
						'label' => esc_html__('Display Blog Containe', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'global_container_option',
						'settings' => 'sharp_tian_container_containe',
						)
				));
			//display container description
		        $wp_customize->add_setting( 'sharp_tian_container_description', array(		                
					'default'   => false,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_container_description', 
					array(
						'label' => esc_html__('Display Container Description', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'global_container_option',
						'settings' => 'sharp_tian_container_description',
						)
				));
			//display container Date
		        $wp_customize->add_setting( 'sharp_tian_container_date', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_container_date', 
					array(
						'label' => esc_html__('Display Container Date', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'global_container_option',
						'settings' => 'sharp_tian_container_date',
						)
				));
			//display container Authore
		        $wp_customize->add_setting( 'sharp_tian_container_authore', array(		                
					'default'   => false,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_container_authore', 
					array(
						'label' => esc_html__('Display Container Authore', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'global_container_option',
						'settings' => 'sharp_tian_container_authore',
						)
				));
			//display container Category
		        $wp_customize->add_setting( 'sharp_tian_container_category', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_container_category', 
					array(
						'label' => esc_html__('Display Container Category', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'global_container_option',
						'settings' => 'sharp_tian_container_category',
						)
				));
			//display container comments
		        $wp_customize->add_setting( 'sharp_tian_container_comments', array(		                
					'default'   => false,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_container_comments', 
					array(
						'label' => esc_html__('Display Container Comments', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'global_container_option',
						'settings' => 'sharp_tian_container_comments',
						)
				));	

		// Create Button color and Backgound color
			$wp_customize->add_section( 'global_button_option' , array(
				'title'  => 'Buttons',
				'panel'  => 'sharp_tian_global_panel',
			) );
			//Button background color
		        $wp_customize->add_setting( 'sharp_tian_button_bg_color', 
			        array(
			            'default'    => '#273641', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_button_bg_color', 
			        array(
			            'label'      => esc_html__( 'Button Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_button_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Background Hover color
				$wp_customize->add_setting( 'sharp_tian_button_bg_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_button_bg_hover_color', 
			        array(
			            'label'      => esc_html__( 'Background Hover Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_button_bg_hover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Text color
				$wp_customize->add_setting( 'sharp_tian_button_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_button_text_color', 
			        array(
			            'label'      => esc_html__( 'Button Text Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_button_text_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Text hover color
				$wp_customize->add_setting( 'sharp_tian_button_texthover_color', 
			        array(
			            'default'    => '#214462', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_button_texthover_color', 
			        array(
			            'label'      => esc_html__( 'Button Text Hover Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_button_texthover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Border color
				$wp_customize->add_setting( 'sharp_tian_button_border_color', 
			        array(
			            'default'    => '#273641', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharp_tian_button_border_color', 
			        array(
			            'label'      => esc_html__( 'Border Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_button_border_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in button border width
		        $wp_customize->add_setting( 'sharp_tian_borderwidth', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharp_tian_borderwidth', 
			        array(
			            'label'      => esc_html__( 'Border Width', 'sharp-tian' ), 
			            'type'  => "number",
			            'settings'   => 'sharp_tian_borderwidth', 
			            'section'    => 'global_button_option',
			            'description' => 'in px',
			        ) 
		        ) ); 
		    //global option in button border radius
		        $wp_customize->add_setting( 'sharp_tian_button_border_radius', 
			        array(
			            'default'    => '3', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharp_tian_button_border_radius', 
			        array(
			            'label'      => esc_html__( 'Border Radius', 'sharp-tian' ), 
			            'type'  	 => "number",
			            'settings'   => 'sharp_tian_button_border_radius', 
			            'section'    => 'global_button_option',
			            'description'=> 'in px',
			        ) 
		        ) );
		    //global option in button padding
		        $wp_customize->add_setting( 'sharp_tian_button_padding', 
			        array(
			            'default'    => '8px 15px', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharp_tian_button_padding', 
			        array(
			            'label'      => esc_html__( 'Button Padding', 'sharp-tian' ), 
			            'type'  	 => "text",
			            'settings'   => 'sharp_tian_button_padding', 
			            'section'    => 'global_button_option',
			            'description'=> '15px 25px',
			        ) 
		        ) );  

		// Create Excerpt Options
		$wp_customize->add_section( 'global_excerpt_option' , array(
				'title'  => 'Excerpt Options',
				'panel'  => 'sharp_tian_global_panel',
			) );
			//global option in button border width
		        $wp_customize->add_setting( 'sharp_tian_excerpt_length', 
			        array(
			            'default'    => '', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharp_tian_excerpt_length', 
			        array(
			            'label'      => esc_html__( 'Excerpt Length (Words)', 'sharp-tian' ), 
			            'type'  => "number",
			            'settings'   => 'sharp_tian_excerpt_length', 
			            'section'    => 'global_excerpt_option',
			        ) 
		        ) ); 
		    //global Option in readmore button
		        $wp_customize->add_setting( 'sharp_tian_container_read_more_btn', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_container_read_more_btn', 
					array(
						'label' => esc_html__('Display Read More Button', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'global_excerpt_option',
						'settings' => 'sharp_tian_container_read_more_btn',
						)
				));
			//global option in read more text
		        $wp_customize->add_setting( 'sharp_tian_read_more_btn', 
			        array(
			            'default'    => 'Continue reading', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharp_tian_read_more_btn', 
			        array(
			            'label'      => esc_html__( 'Read More Text', 'sharp-tian' ), 
			            'type' 		 => 'text',
			            'settings'   => 'sharp_tian_read_more_btn', 
			            'section'    => 'global_excerpt_option',
			        ) 
		        ) );       

        //Create a scroll button
			$wp_customize->add_section( 'scroll_button_section' , array(
				'title'             => 'Scroll Button',
				'panel'             => 'sharp_tian_global_panel',
			) ); 
			//Scroll Button display
				$wp_customize->add_setting( 'display_scroll_button', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'display_scroll_button', 
					array(
						'label' => esc_html__('Display Scroll Button', 'sharp-tian' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'scroll_button_section',
						'settings' => 'display_scroll_button',
						)
				));
			//Scroll Button in add Background color
			    $wp_customize->add_setting( 'sharp_tian_scroll_button_bg_color', 
			        array(
			            'default'    => '#774079', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_scroll_button_bg_color', 
			        array(
			            'label'      => esc_html__( 'Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_scroll_button_bg_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'sharp_tian_scroll_callback',
			        ) 
		        ) );  
		    //Scroll Button in add color
			    $wp_customize->add_setting( 'sharp_tian_scroll_button_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_scroll_button_color', 
			        array(
			            'label'      => esc_html__( 'Scroll Icon Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_scroll_button_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'sharp_tian_scroll_callback',
			        ) 
		        ) );               

	//Sidebar create in globly
		$wp_customize->add_panel( 'sharp_tian_sidebar_panel', array(
			'title'     => __('Sidebar', 'sharp-tian'),
			'priority'  => 4,
		) ); 
		$post_types = get_post_types(array('public' => true), 'names', 'and');
		foreach ($post_types  as $post_type) {
				$wp_customize->add_section( 'sidebar_section_' .$post_type, array(
					'title'             => $post_type .' Sidebar',
					'panel'             => 'sharp_tian_sidebar_panel',
				) );
				//sidebar in add layout select dropdown
			        $wp_customize->add_setting('sharp_tian_post_sidebar_select_'.$post_type , array(
						'default'   => 'right_sidebar',
				        'type'       => 'theme_mod',
				        'capability'     => 'edit_theme_options',
				        'transport'   => 'refresh',
				        'sanitize_callback' => 'sharp_tian_sanitize_select',		  
				    ));
				    $layout_label= $post_type . ' Layout:';
				    $wp_customize->add_control( new sharp_tian_Custom_Radio_Image_Control(
				    	$wp_customize,'sharp_tian_post_sidebar_select_'.$post_type,
				    	array(
					        'settings' => 'sharp_tian_post_sidebar_select_'.$post_type,
					        'label'   => $layout_label,
					        'section' => 'sidebar_section_'.$post_type,
					        'type'    => 'select',
					        'choices' => sharp_tian_site_layout(),
				        )
				    ));

			    //sidebar in width text filed
					$wp_customize->add_setting( 'sharp_tian_post_sidebar_width_' . $post_type, 
				        array(
				            'default'    => '30', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'capability'     => 'edit_theme_options',
				            'transport'   => 'refresh',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    );
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'sharp_tian_post_sidebar_width_' . $post_type, 
				        array(
				            'label'      =>$post_type . ' Sidebar Width:', 
				            'type'  => "number",
				            'settings'   => 'sharp_tian_post_sidebar_width_' . $post_type, 
				            'section'    => 'sidebar_section_'.$post_type,
				            'description' => 'in %',
				        ) 
			        ) );
			}  
			$wp_customize->add_section( 'sharp_tian_sidebar_design', array(
				'title'             => 'Design',
				'panel'             => 'sharp_tian_sidebar_panel',
			) );
			    //sidebar heading background color
			        $wp_customize->add_setting( 'sharp_tian_sidebar_heading_bg_color', 
				        array(
				            'default'    => '#273641', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'sharp_tian_sidebar_heading_bg_color', 
				        array(
				            'label'      => esc_html__( 'Heading Background Color', 'sharp-tian' ), 
				            'settings'   => 'sharp_tian_sidebar_heading_bg_color', 
				            'priority'   => 10,
				            'section'    => 'sharp_tian_sidebar_design',
				        ) 
			        ) ); 

			    //sidebar heading color
			        $wp_customize->add_setting( 'sharp_tian_sidebar_heading_text_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'sharp_tian_sidebar_heading_text_color', 
				        array(
				            'label'      => esc_html__( 'Heading Text Color', 'sharp-tian' ), 
				            'settings'   => 'sharp_tian_sidebar_heading_text_color', 
				            'priority'   => 10,
				            'section'    => 'sharp_tian_sidebar_design',
				        ) 
			        ) ); 		    

	//Theme Option in globly
		$wp_customize->add_panel( 'sharp_tian_theme_section', array(
			'title'     => esc_html__('Theme Option', 'sharp-tian'),
			'priority'  => 5,
		) );
		
		//Breadcrumb Section			
			$wp_customize->add_section( 'global_breadcrumb_section' , array(
				'title'  => esc_html__('Breadcrumb Section', 'sharp-tian'),
				'panel'  => 'sharp_tian_theme_section',				

			) );
			//Breadcrumb Section in entire site select 
				$wp_customize->add_setting( 'sharp_tian_display_breadcrumb_section', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharp_tian_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharp_tian_display_breadcrumb_section', 
					array(
						'label' => esc_html__('Display Breadcrumb Section', 'sharp-tian'),
						'type'  => 'checkbox',
						'section' => 'global_breadcrumb_section',
						'settings' => 'sharp_tian_display_breadcrumb_section',
						)
				));	
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'sharp_tian_display_breadcrumb_section',
						array(
							'selector'        => '.breadcrumb_info',
							'render_callback' => 'sharp_tian_customize_partial_breadcrumb',
						)
					);
				}
			//Breadcrumb Section in Background color
				$wp_customize->add_setting( 'sharp_tian_breadcrumb_bg_color', 
			        array(
			            'default'    => '#c8c9cb', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_breadcrumb_bg_color', 
			        array(
			            'label'      => esc_html__( 'Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_breadcrumb_bg_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'sharp_tian_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Text color
				$wp_customize->add_setting( 'sharp_tian_breadcrumb_text_color', 
			        array(
			            'default'    => '#333333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_breadcrumb_text_color', 
			        array(
			            'label'      => esc_html__( 'Text Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_breadcrumb_text_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'sharp_tian_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Link color
				$wp_customize->add_setting( 'sharp_tian_breadcrumb_link_color', 
			        array(
			            'default'    => '#273641', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_breadcrumb_link_color', 
			        array(
			            'label'      => esc_html__( 'Link Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_breadcrumb_link_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'sharp_tian_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section background image option
		        $wp_customize->add_setting('sharp_tian_breadcrumb_bg_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sharp_tian_breadcrumb_bg_image', array(
			        'label' => esc_html__('Backgroung Image', 'sharp-tian'),
			        'section' => 'global_breadcrumb_section',
			        'settings' => 'sharp_tian_breadcrumb_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'sharp_tian_breadcrumb_call_back',
			    ))); 
			//Breadcrumb Section in image background position
			    $wp_customize->add_setting('sharp_tian_img_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_img_bg_position',
			    	array(
				        'settings' => 'sharp_tian_img_bg_position',
				        'label'   => esc_html__('Background Position', 'sharp-tian' ),
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'left top' => 'Left Top',
				        	'left center' => 'Left Center',
				        	'left bottom' => 'Left Bottom',
				            'right top' => 'Right Top',
				            'right center' => 'Right Center',
				            'right bottom' => 'Right Bottom',
				            'center top' => 'Center Top',
				            'center center' => 'Center Center',
				            'center bottom' => 'Center Bottom',
			        	),
			        	'active_callback' => 'sharp_tian_breadcrumb_call_back',
			        )
			    )); 
			//Breadcrumb Section in image background attachment
			    $wp_customize->add_setting('sharp_tian_breadcrumb_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_breadcrumb_bg_attachment',
			    	array(
				        'settings' => 'sharp_tian_breadcrumb_bg_attachment',
				        'label'   => esc_html__('Background Attachment', 'sharp-tian' ),
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'sharp_tian_breadcrumb_call_back',
			        )
			    ));
			//Breadcrumb Section in image background Size
			    $wp_customize->add_setting('sharp_tian_breadcrumb_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_breadcrumb_bg_size',
			    	array(
				        'settings' => 'sharp_tian_breadcrumb_bg_size',
				        'label'   => esc_html__('Background Size', 'sharp-tian' ),
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'sharp_tian_breadcrumb_call_back',
			        )
			    ));  		    
		
		//Featured Slider
			$wp_customize->add_section( 'inpersttion_slider_section' , array(
			'title'  => esc_html__('Featured Slider', 'sharp-tian' ),
			'panel'  => 'sharp_tian_theme_section',
			) );
			//Featured Slider in tabing
				$wp_customize->add_setting( 'featuredimage_slider_tab', 
				        array(
				            'default'    => 'general', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'custom_sanitize_select',
				        ) 
				    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'featuredimage_slider_tab',array(
			            'settings'   => 'featuredimage_slider_tab', 
			            'priority'   => 10,
			            'section'    => 'inpersttion_slider_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			    //Create slider in add filed
			        $wp_customize->add_setting( 'featuredimage_slider', 
				        array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				    ); 
				$wp_customize->add_control( new Customizer_Repeaterss( 
			        $wp_customize,'featuredimage_slider',array(
			            		'label'                             => esc_html__( 'Slider Items Content', 'sharp-tian' ),
						'section'                           => 'inpersttion_slider_section',
						'add_field_label'                   => esc_html__( 'Add new slide item', 'sharp-tian' ),
						'item_name'                         => esc_html__( 'Slide Item', 'sharp-tian' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control'  => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control'  => true,
						'customizer_repeater_checkbox_control' => true,
						'active_callback' => 'sharp_tian_featured_generalcallback',
			        ) 
			        ) );
			    //Features slider in pro version
						 $wp_customize->add_setting('featuredimage_slider_pro', array(
					        'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_text_field',
					    ));
					    $wp_customize->add_control( new Customize_Upgrade_Control(
					    	$wp_customize,'featuredimage_slider_pro',
					    	array(
						        'settings' => 'featuredimage_slider_pro',
						        'section' => 'inpersttion_slider_section',
						        'type'  => 'customizer-repeater',
						        'active_callback' => 'sharp_tian_featured_generalcallback',
					        )
					    ));	
			    	if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'featuredimage_slider_tab',
						array(
							'selector'        => '.featured_slider_image',
							'render_callback' => 'custom_customize_featuredimage_slider',
						)
					);
				}
				//Featured Slider in add text color
				    $wp_customize->add_setting( 'featured_slider_text_color', 
				        array(
				            'default'    => '#ffffff',	
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'featured_slider_text_color', 
				        array(
				            'label'      => esc_html__('Text Color' , 'sharp-tian' ),
				            'settings'   => 'featured_slider_text_color', 
				            'priority'   => 10,
				            'section'    => 'inpersttion_slider_section',
				            'active_callback' => 'sharp_tian_featured_design_callback',
				        ) 
			        ) );
			   	//Featured Slider arrow in add Text color
				    $wp_customize->add_setting( 'featured_slider_arrow_text_color', 
				        array(
				            'default'    => '#ffffff',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'featured_slider_arrow_text_color', 
				        array(
				            'label'      => esc_html__('Arrow Text Color', 'sharp-tian' ), 
				            'settings'   => 'featured_slider_arrow_text_color', 
				            'priority'   => 10,
				            'section'    => 'inpersttion_slider_section',
				            'active_callback' => 'sharp_tian_featured_design_callback',
				        ) 
			        ) );  	
			    //Featured Slider arrow in add background color
				    $wp_customize->add_setting( 'featured_slider_arrow_bg_color', 
				        array(
				            'default'    => '#273641',
				            'transport'  => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'featured_slider_arrow_bg_color', 
				        array(
				            'label'      => esc_html__('Arrow Background Color', 'sharp-tian' ), 
				            'settings'   => 'featured_slider_arrow_bg_color', 
				            'priority'   => 10,
				            'section'    => 'inpersttion_slider_section',
				            'active_callback' => 'sharp_tian_featured_design_callback',
				        ) 
			        ) );
			    //Featured Slider in arrow Text hover color
				    $wp_customize->add_setting( 'featured_slider_arrow_texthover_color', 
				        array(
				            'default'    => '#fff',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'featured_slider_arrow_texthover_color', 
				        array(
				            'label'      => esc_html__('Arrow Text Hover Color', 'sharp-tian' ), 
				            'settings'   => 'featured_slider_arrow_texthover_color', 
				            'priority'   => 10,
				            'section'    => 'inpersttion_slider_section',
				            'active_callback' => 'sharp_tian_featured_design_callback',
				        ) 
			        ) );
			    //Featured Slider in add background hover color
				    $wp_customize->add_setting( 'featured_slider_arrow_bghover_color', 
				        array(
				            'default'    => '#4f2d4f',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'featured_slider_arrow_bghover_color', 
				        array(
				            'label'      => esc_html__('Arrow Background Hover Color', 'sharp-tian' ), 
				            'settings'   => 'featured_slider_arrow_bghover_color', 
				            'priority'   => 10,
				            'section'    => 'inpersttion_slider_section',
				            'active_callback' => 'sharp_tian_featured_design_callback',
				        ) 
			        ) );
			    //Featured Slider in Autoplay True
				    $wp_customize->add_setting('sharp_tian_featured_slider_autoplay', array(
				        'default'        => 'true',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'custom_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_featured_slider_autoplay',
				    	array(
					        'settings' => 'sharp_tian_featured_slider_autoplay',
					        'label'   => esc_html__('Autoplay', 'sharp-tian' ),
					        'section' => 'inpersttion_slider_section',
					        'type'  => 'select',
					        'choices'    => array(
					        	'true' => 'True',
					        	'false' => 'False',
				        	),
				        	'active_callback' => 'sharp_tian_featured_design_callback',
				        )
				    )); 
				//Featured Slider in autoplay speed
				    $wp_customize->add_setting('sharp_tian_featured_slider_autoplay_speed', array(
				    	'default'        => '1000',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_featured_slider_autoplay_speed',
				    	array(
					        'settings' => 'sharp_tian_featured_slider_autoplay_speed',
					        'label'   => esc_html__('AutoplaySpeed', 'sharp-tian' ),
					        'section' => 'inpersttion_slider_section',
					        'type'  => 'text',
					        'active_callback' => 'sharp_tian_featured_design_callback',
				        )
				    ));  
				//Featured Slider in autoplay TimeOut
				    $wp_customize->add_setting('sharp_tian_featured_slider_autoplay_timeout', array(
				    	'default'        => '5000',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_featured_slider_autoplay_timeout',
				    	array(
					        'settings' => 'sharp_tian_featured_slider_autoplay_timeout',
					        'label'   => esc_html__('AutoplayTimeout', 'sharp-tian' ),
					        'section' => 'inpersttion_slider_section',
					        'type'  => 'text',
					        'active_callback' => 'sharp_tian_featured_design_callback',
				        )
				    ));  

		//Featured Section
			$wp_customize->add_section( 'featured_sections' , array(
				'title'  => 'Featured Section',
				'panel'  => 'sharp_tian_theme_section',
			) ); 
			// Featured Section tabing
				$wp_customize->add_setting( 'featured_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'custom_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'featured_section_tab',array(
			            'settings'   => 'featured_section_tab', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			    if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'featured_section_tab',
						array(
							'selector'        => '.featured-section_data',
							'render_callback' => 'custom_customize_featured_section',
						)
					);
				}
				 //Create Featured Section in add filed
					$wp_customize->add_setting( 'featured_section_content', 
						array(
					            'type'       => 'theme_mod',
					            'transport'   => 'refresh',
					            'capability'     => 'edit_theme_options',
					            'sanitize_callback' => 'customizer_repeater_sanitize',
					        ) 
					);
					$wp_customize->add_control( new Customizer_Repeaterss( 
					$wp_customize, 'featured_section_content', array(
						'label'                             => esc_html__( 'Info Items Content', 'sharp-tian' ),
						'section'                           => 'featured_sections',
						'add_field_label'                   => esc_html__( 'Add new info', 'sharp-tian' ),
						'item_name'                         => esc_html__( 'Info Item', 'sharp-tian' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control'  => true,
						'customizer_repeater_icon_control'  => true,
				                'customizer_repeater_checkbox_control' => true,
				                'active_callback' => 'sharp_tian_featured_section_callback',
					    ) ) );
				//Features section in pro version
					$wp_customize->add_setting('featured_section_pro', array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new Customize_Upgrade_Control(
				    	$wp_customize,'featured_section_pro',
				    	array(
					        'settings' => 'featured_section_pro',
					        'section' => 'featured_sections',
					        'type'  => 'customizer-repeater',
					        'active_callback' => 'sharp_tian_featured_section_callback',
				        )
				    ));	
			   
				//Featured Section icon size 
					$wp_customize->add_setting( 'featured_section_icon_size', array(
					'default'    => '35',
					'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'featured_section_icon_size',
				    	array(
							'type' => 'number',
							'settings'   => 'featured_section_icon_size',
							'section' => 'featured_sections', // // Add a default or your own section
							'label' => 'Icon Size',
							'description' =>'in px',
							'active_callback' => 'sharp_tian_featured_section_design_callback',
						)
					) );
			    //Featured Section backgroung Image
			    	$wp_customize->add_setting('featured_section_bg_image', array(
			    		'default'  => '',
			        	'type'       => 'theme_mod',
				        'transport'     => 'refresh',
				        'height'        => 180,
				        'width'        => 160,
				        'capability' => 'edit_theme_options',
				        'sanitize_callback' => 'esc_url_raw'
				    ));
				    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_section_bg_image', array(
				        'label' => esc_html__('Backgroung Image', 'sharp-tian' ),
				        'section' => 'featured_sections',
				        'settings' => 'featured_section_bg_image',
				        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				        'active_callback' => 'sharp_tian_featured_section_design_callback',
				    )));
				//Featured Section in Background Position
				    $wp_customize->add_setting('featured_section_bg_position', array(
				        'default'        => 'center center',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'featured_section_bg_position',
				    	array(
					        'settings' => 'featured_section_bg_position',
					        'label'   => esc_html__('Background Position', 'sharp-tian' ),
					        'section' => 'featured_sections',
					        'type'  => 'select',
					        'active_callback' => 'sharp_tian_featured_section_design_callback',
					        'choices'    => $image_position,
				        )
				    ));
				//Featured Section Section in Background Attachment
					$wp_customize->add_setting('featured_section_bg_attachment', array(
				        'default'        => 'scroll',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'featured_section_bg_attachment',
				    	array(
					        'settings' => 'featured_section_bg_attachment',
					        'label'   => esc_html__('Background Attachment', 'sharp-tian' ),
					        'section' => 'featured_sections',
					        'type'  => 'select',
					        'choices'    => array(
					        	'scroll' => 'Scroll',
					        	'fixed' => 'Fixed',
				        	),
				        	'active_callback' => 'sharp_tian_featured_section_design_callback',
				        )
				    ));
				//Featured Section Section in image background Size
				    $wp_customize->add_setting('featured_section_bg_size', array(
				        'default'        => 'cover',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'featured_section_bg_size',
				    	array(
					        'settings' => 'featured_section_bg_size',
					        'label'   => esc_html__('Background Size', 'sharp-tian' ),
					        'section' => 'featured_sections',
					        'type'  => 'select',
					        'active_callback' => 'sharp_tian_featured_section_design_callback',
					        'choices'    => array(
					        	'auto' => 'Auto',
					        	'cover' => 'Cover',
					            'contain' => 'Contain'
				        	),
				        )
				    ));   
				//Featured Section Background color
						    $wp_customize->add_setting( 'featured_section_main_bg_color', 
						        array(
						            'default'	=> '#ffffff',	
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_main_bg_color', 
						        array(
						            'label'      => esc_html__('Background Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_main_bg_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) );
					    //Featured Section text color
						    $wp_customize->add_setting( 'featured_section_main_text_color', 
						        array( 
						            'default'	=> '#333333',
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_main_text_color', 
						        array(
						            'label'      => esc_html__('Text Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_main_text_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) );
						//Featured Section Background color
						    $wp_customize->add_setting( 'featured_section_bg_color', 
						        array(
						            'default'   => '#e5d1e5',
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_bg_color', 
						        array(
						            'label'      => esc_html__('Contain Background Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_bg_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) );
					    //Featured Section Text color
						    $wp_customize->add_setting( 'featured_section_color', 
						        array(
						            'default'	=> '#273641',
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_color', 
						        array(
						            'label'      => esc_html__('Contain Text Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) ); 
					    //Featured Section Background hover color
						    $wp_customize->add_setting( 'featured_section_bg_hover_color', 
						        array(
						            'default'	=> '#c691ba',
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_bg_hover_color', 
						        array(
						            'label'      => esc_html__('Contain Background Hover Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_bg_hover_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) ); 
					    //Featured Section Text hover color
						    $wp_customize->add_setting( 'featured_section_text_hover_color', 
						        array(
						            'default'	=> '#ffffff',
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_text_hover_color', 
						        array(
						            'label'      => esc_html__('Contain Text Hover Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_text_hover_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) ); 
					    //Featured Section Icon color
						    $wp_customize->add_setting( 'featured_section_icon_color', 
						        array( 
						            'default'	=> '#273641',
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_icon_color', 
						        array(
						            'label'      => esc_html__('Icon Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_icon_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) ); 
					    //Featured Section Icon Hover color
						    $wp_customize->add_setting( 'featured_section_icon_hover_color', 
						        array(
						            'default'	=> '#134a66',
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
						        ) 
						    ); 
					        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
						        $wp_customize,'featured_section_icon_hover_color', 
						        array(
						            'label'      => esc_html__('Icon Hover Color', 'sharp-tian' ), 
						            'settings'   => 'featured_section_icon_hover_color', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) ); 
					    //Featured Section margin
					        $wp_customize->add_setting( 'featured_section_margin', 
						        array(
						            'default'    => '-100px 0px 0px 0px', //Default setting/value to save
						            'type'       => 'theme_mod',
						            'transport'   => 'refresh',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sanitize_text_field',
						        ) 
						    ); 
					        $wp_customize->add_control( new WP_Customize_Control( 
						        $wp_customize,'featured_section_margin', 
						        array(
						            'label'      => esc_html__('Margin', 'sharp-tian' ), 
						            'description'=> '0px 0px 0px 0px',
						            'settings'   => 'featured_section_margin', 
						            'priority'   => 10,
						            'section'    => 'featured_sections',
						            'active_callback' => 'sharp_tian_featured_section_design_callback',
						        ) 
					        ) );	    					

		//About Section
			$wp_customize->add_section( 'about_section' , array(
				'title'  => esc_html__('About Section', 'sharp-tian' ),
				'panel'  => 'sharp_tian_theme_section',
			) );
			//About Section title
			    $wp_customize->add_setting('about_main_title', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'about_main_title',
			    	array(
				        'settings' => 'about_main_title',
				        'label'   => esc_html__('About Title', 'sharp-tian' ),
				        'section' => 'about_section',
				        'type'  => 'text',
			        )
			    ));
			    if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'about_main_title',
						array(
							'selector'        => '.about_section_info',
							'render_callback' => 'custom_customize_about_name',
						)
					);
				}
			//About Section Description
			    $wp_customize->add_setting('about_description', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_textarea_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'about_description',
			    	array(
				        'settings' => 'about_description',
				        'label'   => esc_html__('About Description', 'sharp-tian' ),
				        'section' => 'about_section',
				        'type'  => 'text',
			        )
			    ));
			//About Section image 
				$wp_customize->add_setting('about_section_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_section_image' , array(
			        'label' =>  esc_html__('Image', 'sharp-tian' ),
			        'section' => 'about_section',
			        'settings' => 'about_section_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			    )));
			//About Section layouts
				
			//Layout1
			    //Layout1 title
				    $wp_customize->add_setting('about_layout1_title', array(
				        // 'default'        => 'Hi, I Am Samantha!',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_title',
				    	array(
					        'settings' => 'about_layout1_title',
					        'label'   => esc_html__('About Title', 'sharp-tian' ),
					        'section' => 'about_section',
					        'type'  => 'text',
					        // 'active_callback' => 'about_layout1_callback',
				        )
				    ));
				//Layout1 subheading
				    $wp_customize->add_setting('about_layout1_subheading', array(
				        // 'default'        => 'Owner/Founder, Executive Coach',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_subheading',
				    	array(
					        'settings' => 'about_layout1_subheading',
					        'label'   => esc_html__('Sub Heading', 'sharp-tian' ),
					        'section' => 'about_section',
					        'type'  => 'text',
					        //'active_callback' => 'about_layout1_callback',
				        )
				    ));
				//Layout1 description
				    $wp_customize->add_setting('about_layout1_description', array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_textarea_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_description',
				    	array(
					        'settings' => 'about_layout1_description',
					        'label'   => esc_html__('About Description', 'sharp-tian' ),
					        'section' => 'about_section',
					        'type'  => 'text',
					        //'active_callback' => 'about_layout1_callback',
				        )
				    ));
				//Layout1 button
				    $wp_customize->add_setting('about_layout1_button', array(
				        // 'default'        => 'Read More',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_button',
				    	array(
					        'settings' => 'about_layout1_button',
					        'label'   =>  esc_html__('Button', 'sharp-tian' ),
					        'section' => 'about_section',
					        'type'  => 'text',
					        //'active_callback' => 'about_layout1_callback',
				        )
				    ));
				//Layout1 button Link
				    $wp_customize->add_setting('about_layout1_button_link', array(
				        'default'        => '#',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_button_link',
				    	array(
					        'settings' => 'about_layout1_button_link',
					        'label'   => esc_html__('Button Link', 'sharp-tian' ),
					        'section' => 'about_section',
					        'type'  => 'text',
					       // 'active_callback' => 'about_layout1_callback',
				        )
				    ));

			

			//About Background Color
			    $wp_customize->add_setting( 'about_bg_color', 
			        array(
			            'default'	=> '#f2edf2',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_bg_color', 
			        array(
			            'label'      => esc_html__('Background Color', 'sharp-tian' ), 
			            'settings'   => 'about_bg_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 
		    //About title text color
		        $wp_customize->add_setting( 'about_title_text_color', 
			        array(
			            'default'	=> '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_title_text_color', 
			        array(
			            'label'      => esc_html__('Title Text Color', 'sharp-tian' ), 
			            'settings'   => 'about_title_text_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 
		    //About text color
		        $wp_customize->add_setting( 'about_text_color', 
			        array(
			            'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_text_color', 
			        array(
			            'label'      => esc_html__('Text Color', 'sharp-tian' ), 
			            'settings'   => 'about_text_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 

		//Our Portfolio
		    $wp_customize->add_section( 'our_portfolio_section' , array(
				'title'  => esc_html__('Our Portfolio', 'sharp-tian' ),
				'panel'  => 'sharp_tian_theme_section',
			) ); 
			//Our Portfolio tabing
				$wp_customize->add_setting( 'our_portfolio_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'custom_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_portfolio_section_tab',array(
			            'settings'   => 'our_portfolio_section_tab', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			    //Our Portfolio in Title
					$wp_customize->add_setting( 'our_portfolio_main_title', array(
						// 'default'    => 'Our Portfolio',
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_portfolio_main_title',
				    	array(
							'type' => 'text',
							'settings' => 'our_portfolio_main_title',
							'section' => 'our_portfolio_section', // // Add a default or your own section
							'label' => 'Our Portfolio Title',
							'active_callback' => 'sharp_tian_our_portfolio_general_callback',
						)
					) );
					if ( isset( $wp_customize->selective_refresh ) ) {
						$wp_customize->selective_refresh->add_partial(
							'our_portfolio_main_title',
							array(
								'selector'        => '.our_portfolio_info',
								'render_callback' => 'custom_customize_partial_name',
							)
						);
					}
				//Our Portfolio in Discription
					$wp_customize->add_setting( 'our_portfolio_main_discription', array(
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_portfolio_main_discription',
				    	array(
							'type' => 'text',
							'settings' => 'our_portfolio_main_discription',
							'section' => 'our_portfolio_section', // // Add a default or your own section
							'label' => 'Our Portfolio Discription',
							'active_callback' => 'sharp_tian_our_portfolio_general_callback',
						)
					) );
				//Create Our Portfolio add new filed			
					$wp_customize->add_setting( 'our_portfolio_section_content', 
						array( 
						'sanitize_callback' => 'customizer_repeater_sanitize',
					        'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
							
					) );
					$wp_customize->add_control( new Customizer_Repeaterss( 
					$wp_customize, 'our_portfolio_section_content', array(
						'label'                             => esc_html__( 'Portfolio Items Content', 'sharp-tian' ),
						'section'                           => 'our_portfolio_section',
						'add_field_label'                   => esc_html__( 'Add new Portfolio Items', 'sharp-tian' ),
						'item_name'                         => esc_html__( 'Portfolio Item', 'sharp-tian' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						// 'customizer_repeater_icon_control'  => true,
						'customizer_repeater_link_control'  => true,
				                'customizer_repeater_checkbox_control' => true,
				                'active_callback' => 'sharp_tian_our_portfolio_general_callback',
					    ) ) );
				//our_portfolioin pro version
					$wp_customize->add_setting('our_portfolioin_section_pro', array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new Customize_Upgrade_Control(
				    	$wp_customize,'our_portfolioin_section_pro',
				    	array(
					        'settings' => 'our_portfolioin_section_pro',
					        'section' => 'our_portfolio_section',
					        'type' => 'customizer-repeater',
					        'active_callback' => 'sharp_tian_our_portfolio_general_callback',
				        )
				    ));	

			//Our Portfolio in Background Title
				$wp_customize->add_setting('our_portfolio_bg_heading', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Custom_GeneratePress_Upsell_Section(
			    	$wp_customize,'our_portfolio_bg_heading',
			    	array(
				        'settings' => 'our_portfolio_bg_heading',
				        'label'   => esc_html__('Background Color', 'sharp-tian' ),
				        'section' => 'our_portfolio_section',
				        'type'     => 'sharp-tian-ast-description',
				        'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        )
			    )); 
		    //Our Portfolio Section in Background Image
		    	$wp_customize->add_setting('our_portfolio_bg_image', array(
		    		'default'  => '',
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_portfolio_bg_image', array(
			        'label'  =>  esc_html__('Background Image', 'sharp-tian' ),
			        'section' => 'our_portfolio_section',
			        'settings' => 'our_portfolio_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			    )));
			//Our Portfolio  in image background position
			    $wp_customize->add_setting('our_portfolio_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'custom_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_bg_position',
			    	array(
				        'settings' => 'our_portfolio_bg_position',
				        'label'   => esc_html__('Background Position', 'sharp-tian' ),
				        'section' => 'our_portfolio_section',
				        'type'  => 'select',
				        'choices'    => $image_position,
			        	'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        )
			    )); 
			//Our Portfolio in image background attachment
			    $wp_customize->add_setting('our_portfolio_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'custom_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_bg_attachment',
			    	array(
				        'settings' => 'our_portfolio_bg_attachment',
				        'label'   => esc_html__('Background Attachment', 'sharp-tian' ),
				        'section' => 'our_portfolio_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        )
			    ));
			//Our Portfolio  in image background Size
			    $wp_customize->add_setting('our_portfolio_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'custom_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_bg_size',
			    	array(
				        'settings' => 'our_portfolio_bg_size',
				        'label'   => esc_html__('Background Size', 'sharp-tian' ),
				        'section' => 'our_portfolio_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        )
			    ));  
			//Our Portfolio in background color
			   	$wp_customize->add_setting( 'our_portfolio_bg_color', 
			        array(
			            'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_bg_color', 
			        array(
			            'label'      => esc_html__('Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_portfolio_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        ) 
		        ) ); 
		    //Our Portfolio in title color
			   	$wp_customize->add_setting( 'our_portfolio_title_color', 
			        array(
			            'default'	=> '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_title_color', 
			        array(
			            'label'      => esc_html__('Title Color', 'sharp-tian' ), 
			            'settings'   => 'our_portfolio_title_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        ) 
		        ) ); 
		    //Our Portfolio in text color
			   	$wp_customize->add_setting( 'our_portfolio_text_color', 
			        array(
			            'default'	=> '#333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_text_color', 
			        array(
			            'label'      => esc_html__('Text Color', 'sharp-tian' ), 
			            'settings'   => 'our_portfolio_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        ) 
		        ) );    
		    //Our Portfolio in Container text color
			   	$wp_customize->add_setting( 'our_portfolio_container_text_color', 
			        array(
			            'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_container_text_color', 
			        array(
			            'label'      => esc_html__('Container Text Color', 'sharp-tian' ), 
			            'settings'   => 'our_portfolio_container_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        ) 
		        ) );  
		    //Our Portfolio in Container background color
			   	$wp_customize->add_setting( 'our_portfolio_container_bg_color', 
			        array(
			            'default'	=> 'rgb(209,136,143,0.56)',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_container_bg_color', 
			        array(
			            'label'      => esc_html__('Container Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_portfolio_container_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        ) 
		        ) );   
		    //Our Portfolio in icon background color
			   	$wp_customize->add_setting( 'our_portfolio_icon_bg_color', 
			        array(
			            'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_icon_bg_color', 
			        array(
			            'label'      => esc_html__('Icon Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_portfolio_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        ) 
		        ) );   
		    //Our Portfolio in icon color
			   	$wp_customize->add_setting( 'our_portfolio_icon_color', 
			        array(
			            'default'	=> '#214462',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_icon_color', 
			        array(
			            'label'      => esc_html__('Icon Color', 'sharp-tian' ), 
			            'settings'   => 'our_portfolio_icon_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'sharp_tian_our_portfolio_design_callback',
			        ) 
		        ) );    

		//Our Team
			$wp_customize->add_section( 'our_team_section' , array(
				'title'  => esc_html__('Our Team', 'sharp-tian' ),
				'panel'  => 'sharp_tian_theme_section',
			) );
			//Our Team tabing 
				$wp_customize->add_setting( 'our_team_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'custom_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_team_section_tab',array(
			            'settings'   => 'our_team_section_tab', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our Team in Title
				$wp_customize->add_setting( 'our_team_main_title', array(
				'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_team_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_team_main_title',
						'section' => 'our_team_section', // // Add a default or your own section
						'label' => 'Our Team Title',
						'active_callback' => 'sharp_tian_our_team_general_callback',
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_team_main_title',
						array(
							'selector'        => '.our_team_section',
							'render_callback' => 'custom_customize_partial_our_team',
						)
					);
				}
			//Our Team in Discription
				$wp_customize->add_setting( 'our_team_main_discription', array(
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_textarea_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_team_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_team_main_discription',
						'section' => 'our_team_section', // // Add a default or your own section
						'label' => 'Our Team Discription',  
						'active_callback' => 'sharp_tian_our_team_general_callback',
					)
				) );
			//Create Our Team Section in add filed
				$wp_customize->add_setting( 'our_team_section_content', 
					array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				);
				$wp_customize->add_control( new Customizer_Repeaterss( 
				$wp_customize, 'our_team_section_content', array(
					'label'                             => esc_html__( 'Team Items Content', 'sharp-tian' ),
					'section'                           => 'our_team_section',
					'add_field_label'                   => esc_html__( 'Add new Team', 'sharp-tian' ),
					'item_name'                         => esc_html__( 'Team Item', 'sharp-tian' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_subtitle_control' => true,
					'customizer_repeater_link_control'  => true,
					'customizer_repeater_twitter_control'  => true,
					'customizer_repeater_facebook_control'  => true,
					'customizer_repeater_linkedin_control'  => true,
					'customizer_repeater_instagram_control'  => true,
				        'customizer_repeater_checkbox_control' => true,
				        'active_callback' => 'sharp_tian_our_team_general_callback',
				    ) ) );
			//Our Team in pro version
				$wp_customize->add_setting('our_team_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'our_team_section_pro',
			    	array(
				        'settings' => 'our_team_section_pro',
				        'section' => 'our_team_section',
				        'type' => 'customizer-repeater',
				        'active_callback' => 'sharp_tian_our_team_general_callback',
			        )
			    ));	
		   
			//Our Team Section in Background Title
		    	$wp_customize->add_setting('our_team_background_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Custom_GeneratePress_Upsell_Section(
			    	$wp_customize,'our_team_background_section',
			    	array(
				        'settings' => 'our_team_background_section',
				        'label'   => esc_html__('Background Color Or Image', 'sharp-tian' ),
				        'section' => 'our_team_section',
				        'type'     => 'sharp-tian-ast-description',
				        'active_callback' => 'sharp_tian_our_team_design_callback',
			        )
			    ));
			    //Our Team backgroung Image
			    	$wp_customize->add_setting('our_team_bg_image', array(
			    		'default'  => '',
			        	'type'       => 'theme_mod',
				        'transport'     => 'refresh',
				        'height'        => 180,
				        'width'        => 160,
				        'capability' => 'edit_theme_options',
				        'sanitize_callback' => 'esc_url_raw'
				    ));
				    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_team_bg_image', array(
				        'label' => esc_html__('Backgroung Image', 'sharp-tian' ),
				        'section' => 'our_team_section',
				        'settings' => 'our_team_bg_image',
				        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				        'active_callback' => 'sharp_tian_our_team_design_callback',
				    )));
				//Our Team in Background Position
				    $wp_customize->add_setting('sharp_tian_our_team_bg_position', array(
				        'default'        => 'center center',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_our_team_bg_position',
				    	array(
					        'settings' => 'sharp_tian_our_team_bg_position',
					        'label'   => esc_html__('Background Position', 'sharp-tian' ),
					        'section' => 'our_team_section',
					        'type'  => 'select',
					        'active_callback' => 'sharp_tian_our_team_design_callback',
					        'choices'    => $image_position,
				        )
				    ));
				//Our Team Section in Background Attachment
					$wp_customize->add_setting('sharp_tian_our_team_bg_attachment', array(
				        'default'        => 'scroll',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_our_team_bg_attachment',
				    	array(
					        'settings' => 'sharp_tian_our_team_bg_attachment',
					        'label'   => esc_html__('Background Attachment', 'sharp-tian' ),
					        'section' => 'our_team_section',
					        'type'  => 'select',
					        'choices'    => array(
					        	'scroll' => 'Scroll',
					        	'fixed' => 'Fixed',
				        	),
				        	'active_callback' => 'sharp_tian_our_team_design_callback',
				        )
				    ));
				//Our Team Section in image background Size
				    $wp_customize->add_setting('sharp_tian_our_team_bg_size', array(
				        'default'        => 'cover',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharp_tian_our_team_bg_size',
				    	array(
					        'settings' => 'sharp_tian_our_team_bg_size',
					        'label'   => esc_html__('Background Size', 'sharp-tian' ),
					        'section' => 'our_team_section',
					        'type'  => 'select',
					        'active_callback' => 'sharp_tian_our_team_design_callback',
					        'choices'    => array(
					        	'auto' => 'Auto',
					        	'cover' => 'Cover',
					            'contain' => 'Contain'
				        	),
				        )
				    ));   
				//Our team background color
					$wp_customize->add_setting( 'our_team_bg_color', 
				        array(
				            'default'	=> '#f2edf2',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_team_bg_color', 
				        array(
				            'label'      => esc_html__('Background Color', 'sharp-tian' ), 
				            'settings'   => 'our_team_bg_color', 
				            'priority'   => 10,
				            'section'    => 'our_team_section',
				            'active_callback' => 'sharp_tian_our_team_design_callback',
				        ) 
			        ) ); 
		    //Our team text color
				$wp_customize->add_setting( 'our_team_text_color', 
			        array(
				    'default'	=> '#333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_text_color', 
			        array(
			            'label'      => esc_html__('Text Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) ); 
		    //Our team Contain Background color
				$wp_customize->add_setting( 'our_team_contain_bg_color', 
			        array(
				    'default'	=> '#fff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_contain_bg_color', 
			        array(
			            'label'      => esc_html__('Contain Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_contain_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) );  
		    //Our team  Contain text color
				$wp_customize->add_setting( 'our_team_contain_text_color', 
			        array(
			            'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_contain_text_color', 
			        array(
			            'label'      => esc_html__('Contain Text Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_contain_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',   
			            'active_callback' => 'sharp_tian_our_team_design_callback', 
			        ) 
		        ) );
		    //Our team in Contain Background hover color
				$wp_customize->add_setting( 'our_team_contain_bg_hover_color', 
			        array(
			            'default'	=> '#e0babd',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_contain_bg_hover_color', 
			        array(
			            'label'      => esc_html__('Contain Background Hover Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_contain_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',  
			            'active_callback' => 'sharp_tian_our_team_design_callback', 
			        ) 
		        ) ); 	
		    //our team Text hover color
			    	$wp_customize->add_setting( 'our_team_text_hover_color', 
			        array(
			            'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_text_hover_color', 
			        array(
			            'label'      => esc_html__('Contain Text Hover Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_text_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) ); 
		    //Our team icon color
				$wp_customize->add_setting( 'our_team_icon_color', 
			        array(
				    'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_color', 
			        array(
			            'label'      => esc_html__('Icon Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_icon_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) );  
		    //Our team icon hover color
				$wp_customize->add_setting( 'our_team_icon_hover_color', 
			        array(
				    'default'	=> '#fff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_hover_color', 
			        array(
			            'label'      => esc_html__('Icon Hover Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) );  
		    //Our team icon background color
				$wp_customize->add_setting( 'our_team_icon_background_color', 
			        array(
				    'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_background_color', 
			        array(
			            'label'      => esc_html__('Icon Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_icon_background_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) );  
		    //Our team icon background hover color
				$wp_customize->add_setting( 'our_team_icon_bg_hover_color', 
			        array(
				    'default'	=> '#d1a33a',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_bg_hover_color', 
			        array(
			            'label'      => esc_html__('Icon Background Hover Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) );  
		    //Our team Link color
				$wp_customize->add_setting( 'our_team_link_color', 
			        array(
				    'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_link_color', 
			        array(
			            'label'      => esc_html__('Link Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_link_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) );  
		    //Our team Link Hover color
				$wp_customize->add_setting( 'our_team_link_hover_color', 
			        array(
				    'default'	=> '#00846a',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_link_hover_color', 
			        array(
			            'label'      => esc_html__('Link Hover Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_link_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'sharp_tian_our_team_design_callback',
			        ) 
		        ) );  

	        //Our Testimonial
			$wp_customize->add_section( 'our_testimonial_section' , array(
				'title'  => esc_html__('Our Testimonial', 'sharp-tian' ),
				'panel'  => 'sharp_tian_theme_section',
			) );
			//Our Testimonial Tabing
			 	$wp_customize->add_setting( 'our_testimonial_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'custom_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_testimonial_section_tab',array(
			            'settings'   => 'our_testimonial_section_tab', 
			            'priority'   => 0,
			            'section'    => 'our_testimonial_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our Testimonial in Title
				$wp_customize->add_setting( 'our_testimonial_main_title', array(
					// 'default'    => 'Our Testimonial',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_testimonial_main_title',
						'section' => 'our_testimonial_section', // // Add a default or your own section
						'label' => 'Our Testimonial Title',
						'active_callback' => 'our_testimonial_general_callback',
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_testimonial_main_title',
						array(
							'selector'        => '.our_testimonial_section',
							'render_callback' => 'custom_customize_partial_testimonial',
						)
					);
				}
			//Our Testimonial in Discription
				$wp_customize->add_setting( 'our_testimonial_main_discription', array(
				'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_textarea_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_testimonial_main_discription',
						'section' => 'our_testimonial_section', // // Add a default or your own section
						'label' => 'Our Testimonial Discription',  
						'active_callback' => 'our_testimonial_general_callback',
					)
				) );
			//Create Our Portfolio add new filed			
				$wp_customize->add_setting( 'our_testimonial_section_content', array( 
					'sanitize_callback' => 'customizer_repeater_sanitize',
				) );
				$wp_customize->add_control( new Customizer_Repeaterss( 
				$wp_customize, 'our_testimonial_section_content', array(
					'label'                             => esc_html__( 'Testimonial Items Content', 'sharp-tian' ),
					'section'                           => 'our_testimonial_section',
					'add_field_label'                   => esc_html__( 'Add new Testimonial Items', 'sharp-tian' ),
					'item_name'                         => esc_html__( 'Testimonial Item', 'sharp-tian' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_subtitle_control' => true,
					'customizer_repeater_text_control' => true,
					'customizer_repeater_link_control'  => true,
		            		'active_callback' => 'our_testimonial_general_callback',
				    ) ) );		
			//our Testimonial pro version
				$wp_customize->add_setting('our_testimonial_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'our_testimonial_section_pro',
			    	array(
				        'settings' => 'our_testimonial_section_pro',
				        'section' => 'our_testimonial_section',
				        'type' => 'customizer-repeater',
				        'active_callback' => 'our_testimonial_general_callback',
			        )
			    ));	

			//Our Testimonial in background color
				$wp_customize->add_setting( 'our_team_testimonial_bg_color', 
			        array(
			            'default'	=> '#f6f6f6',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_testimonial_bg_color', 
			        array(
			            'label'      => esc_html__('Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_team_testimonial_bg_color', 
			            'priority'   => 1,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'our_testimonial_design_callback',
			        ) 
		        ) ); 
		    //Our Testimonial background image option
		        $wp_customize->add_setting('our_testimonial_background_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_testimonial_background_image', array(
			        'label' => esc_html__('Backgroung Image', 'sharp-tian' ),
			        'section' => 'our_testimonial_section',
			        'priority'   => 2,
			        'settings' => 'our_testimonial_background_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'our_testimonial_design_callback',
			    )));
			//Our Testimonial in image background position
			    $wp_customize->add_setting('our_testimonial_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_bg_position',
			    	array(
				        'settings' => 'our_testimonial_bg_position',
				        'label'   => esc_html__('Background Position', 'sharp-tian' ),
				        'priority'   => 3,
				        'section' => 'our_testimonial_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'left top' => 'Left Top',
				        	'left center' => 'Left Center',
				        	'left bottom' => 'Left Bottom',
				            'right top' => 'Right Top',
				            'right center' => 'Right Center',
				            'right bottom' => 'Right Bottom',
				            'center top' => 'Center Top',
				            'center center' => 'Center Center',
				            'center bottom' => 'Center Bottom',
			        	),
			        	'active_callback' => 'our_testimonial_design_callback',
			        )
			    )); 
			//Our Testimonial in image background attachment
			    $wp_customize->add_setting('our_testimonial_bg_attachment', array(
			        'default'        => 'fixed',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_bg_attachment',
			    	array(
				        'settings' => 'our_testimonial_bg_attachment',
				        'label'   => esc_html__('Background Attachment', 'sharp-tian' ),
				        'section' => 'our_testimonial_section',
				        'priority'   => 4,
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'our_testimonial_design_callback',
			        )
			    ));
			//Our Testimonial in image background Size
			    $wp_customize->add_setting('our_testimonial_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_bg_size',
			    	array(
				        'settings' => 'our_testimonial_bg_size',
				        'label'   => esc_html__('Background Size', 'sharp-tian' ),
				        'section' => 'our_testimonial_section',
				        'priority'   => 5,
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'our_testimonial_design_callback',
			        )
			    ));  		   
		    //Our Testimonial in Text color
				$wp_customize->add_setting( 'our_testimonial_text_color', 
			        array(
			            'default'	=> '#333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_testimonial_text_color', 
			        array(
			            'label'      => esc_html__('Text Color', 'sharp-tian' ), 
			            'settings'   => 'our_testimonial_text_color', 
			            'priority'   => 6,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'our_testimonial_design_callback',
			        ) 
		        ) );
		    //Our Testimonial in Contain background color
		        $wp_customize->add_setting(
			        'our_testimonial_alpha_color_setting',
			        array(
			            'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'capability' => 'edit_theme_options',
			            'transport'  => 'refresh',
				    'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        )
			    );	
			    $wp_customize->add_control(new sharp_tian_Customize_Transparent_Color_Control(
			            $wp_customize,'our_testimonial_alpha_color_setting',
			            array(
			                'label'        => esc_html__('Contain Background Color', 'sharp-tian' ),
			                'priority'   => 7,
			                'section'      => 'our_testimonial_section',
			                'settings'     => 'our_testimonial_alpha_color_setting',
			                'active_callback'  => 'our_testimonial_design_callback',
			            )
			        )
			    ); 
		    //Our Testimonial in Description Text color
				$wp_customize->add_setting( 'our_testimonial_desc_text_color', 
			        array(
			            'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_testimonial_desc_text_color', 
			        array(
			            'label'      => esc_html__('Description Text Color', 'sharp-tian' ), 
			            'settings'   => 'share-and-save-cart-for-woocommerce', 
			            'priority'   => 8,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'our_testimonial_design_callback',
			        ) 
		        ) ); 
		    //Our Testimonial in image background color
				// $wp_customize->add_setting( 'our_team_testimonial_image_bg_color', 
			 //        array(
			 //            'type'       => 'theme_mod',
			 //            'transport'   => 'refresh',
			 //            'capability' => 'edit_theme_options',
			 //            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			 //        ) 
			 //    ); 
		  //       $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			 //        $wp_customize,'our_team_testimonial_image_bg_color', 
			 //        array(
			 //            'label'      => 'Image Background Color', 
			 //            'settings'   => 'our_team_testimonial_image_bg_color', 
			 //            'priority'   => 10,
			 //            'section'    => 'our_testimonial_section',
			 //            'active_callback' => 'our_testimonial_design_callback',
			 //        ) 
		  //       ) );   
		    //Our Testimonial in arrow background color
				$wp_customize->add_setting( 'our_testimonial_arrow_bg_color', 
			        array(
			            'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_testimonial_arrow_bg_color', 
			        array(
			            'label'      => esc_html__('Arrow Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_testimonial_arrow_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'our_testimonial_design_callback',
			        ) 
		        ) );  
		    //Our Testimonial in arroe text color
				$wp_customize->add_setting( 'our_testimonial_arrow_text_color', 
			        array(
			            'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_testimonial_arrow_text_color', 
			        array(
			            'label'      => esc_html__('Arrow Text Color', 'sharp-tian' ), 
			            'settings'   => 'our_testimonial_arrow_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'our_testimonial_design_callback',
			        ) 
		        ) );  
		    //Our Testimonial in arrow Text hover color
				    $wp_customize->add_setting( 'our_testimonial_arrow_texthover_color', 
				        array(
				            'default'    => '#fff',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_testimonial_arrow_texthover_color', 
				        array(
				            'label'      => esc_html__('Arrow Text Hover Color', 'sharp-tian' ), 
				            'settings'   => 'our_testimonial_arrow_texthover_color', 
				            'priority'   => 10,
				            'section'    => 'our_testimonial_section',
				            'active_callback' => 'our_testimonial_design_callback',
				        ) 
			        ) );
		    //Our Testimonial in add background hover color
				    $wp_customize->add_setting( 'our_testimonial_arrow_bghover_color', 
				        array(
				            'default'    => '#5c355d',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_testimonial_arrow_bghover_color', 
				        array(
				            'label'      => esc_html__('Arrow Background Hover Color', 'sharp-tian' ), 
				            'settings'   => 'our_testimonial_arrow_bghover_color', 
				            'priority'   => 10,
				            'section'    => 'our_testimonial_section',
				            'active_callback' => 'our_testimonial_design_callback',
				        ) 
			        ) );
		    //Our Testimonial in Headline Text color
				    $wp_customize->add_setting( 'our_testimonial_headline_color', 
				        array(
				            'default'    => '#404040',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_testimonial_headline_color', 
				        array(
				            'label'      => esc_html__('Headline Text Color', 'sharp-tian' ), 
				            'settings'   => 'our_testimonial_headline_color', 
				            'priority'   => 10,
				            'section'    => 'our_testimonial_section',
				            'active_callback' => 'our_testimonial_design_callback',
				        ) 
			        ) );
		     //Our Testimonial in Subheadline Text color
				    $wp_customize->add_setting( 'our_testimonial_subheadline_color', 
				        array(
				            'default'    => '#404040',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_testimonial_subheadline_color', 
				        array(
				            'label'      => esc_html__('SubHeadline Text Color', 'sharp-tian' ), 
				            'settings'   => 'our_testimonial_subheadline_color', 
				            'priority'   => 10,
				            'section'    => 'our_testimonial_section',
				            'active_callback' => 'our_testimonial_design_callback',
				        ) 
			        ) );
		    //Our Testimonial in Autoplay True
			    $wp_customize->add_setting('sharp_tian_our_testimonial_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'custom_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_our_testimonial_slider_autoplay',
			    	array(
				        'settings' => 'sharp_tian_our_testimonial_slider_autoplay',
				        'label'   => esc_html__('Autoplay', 'sharp-tian' ),
				        'section' => 'our_testimonial_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'our_testimonial_design_callback',
			        )
			    )); 
			//Our Testimonial Slider in autoplay speed
			    $wp_customize->add_setting('sharp_tian_our_testimonial_slider_autoplay_speed', array(
			    	'default'        => '1000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_our_testimonial_slider_autoplay_speed',
			    	array(
				        'settings' => 'sharp_tian_our_testimonial_slider_autoplay_speed',
				        'label'   => esc_html__('AutoplaySpeed', 'sharp-tian' ),
				        'section' => 'our_testimonial_section',
				        'type'  => 'text', 
				        'active_callback' => 'our_testimonial_design_callback',  
			        )
			    ));    
			//Our Testimonial in autoplay TimeOut
			    $wp_customize->add_setting('sharp_tian_our_testimonial_autoplay_timeout', array(
			    	'default'        => '5000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_our_testimonial_autoplay_timeout',
			    	array(
				        'settings' => 'sharp_tian_our_testimonial_autoplay_timeout',
				        'label'   => esc_html__('AutoplayTimeout', 'sharp-tian' ),
				        'section' => 'our_testimonial_section',
				        'type'  => 'text',
				        'active_callback' => 'our_testimonial_design_callback',
			        )
			    ));

	

	        //Our Sponsors
			$wp_customize->add_section( 'our_sponsors_section' , array(
			'title'  => esc_html__('Our Sponsors', 'sharp-tian' ),
			'panel'  => 'sharp_tian_theme_section',
			) );
			//Our Sponsors in Tabing
				$wp_customize->add_setting( 'our_sponsors_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'custom_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_sponsors_tab',array(
			            'settings'   => 'our_sponsors_tab', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our Sponsors in Title
				$wp_customize->add_setting( 'our_sponsors_main_title', array(
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_sponsors_main_title',
						'section' => 'our_sponsors_section', // // Add a default or your own section
						'label' => 'Our Sponsors Title', 
						'active_callback' => 'sharp_tian_our_sponsors_general_callback',     
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_sponsors_main_title',
						array(
							'selector'        => '.our_sponsors_section',
							'render_callback' => 'custom_customize_partial_sponsors',
						)
					);
				}
			//Our Sponsors in Discription
				$wp_customize->add_setting( 'our_sponsors_main_discription', array(
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_textarea_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_sponsors_main_discription',
						'section' => 'our_sponsors_section', // // Add a default or your own section
						'label' => 'Our Sponsors Discription', 
						'active_callback' => 'sharp_tian_our_sponsors_general_callback',  
					)
				) );	
			//Create Sponsors add new filed			
				$wp_customize->add_setting( 'our_sponsors_section_content', array( 
					'sanitize_callback' => 'customizer_repeater_sanitize',
				) );
				$wp_customize->add_control( new Customizer_Repeaterss( 
				$wp_customize, 'our_sponsors_section_content', array(
					'label'                             => esc_html__( 'Sponsors Items Content', 'sharp-tian' ),
					'section'                           => 'our_sponsors_section',
					'add_field_label'                   => esc_html__( 'Add new Sponsors Items', 'sharp-tian' ),
					'item_name'                         => esc_html__( 'Sponsors Item', 'sharp-tian' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_link_control'  => true,
		            		'active_callback' => 'sharp_tian_our_sponsors_general_callback',
				    ) ) );
			//our sponsors pro version
				$wp_customize->add_setting('our_sponsors_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'our_sponsors_section_pro',
			    	array(
				        'settings' => 'our_sponsors_section_pro',
				        'section' => 'our_sponsors_section',
				        'type' => 'customizer-repeater',
				        'active_callback' => 'sharp_tian_our_sponsors_general_callback',
			        )
			    ));	
			//Our sponsors in Text color
				$wp_customize->add_setting( 'our_sponsors_text_color', 
			        array(
			            'default'	=> '#000000',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_text_color', 
			        array(
			            'label'      => esc_html__('Text Color', 'sharp-tian' ), 
			            'settings'   => 'our_sponsors_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',   
			            'active_callback' => 'sharp_tian_our_sponsors_design_callback',
			        ) 
		        ) ); 
		    //Our sponsors in background color
				$wp_customize->add_setting( 'our_sponsors_bg_color', 
			        array(
			            'default'	=> '#f2edf2',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_bg_color', 
			        array(
			            'label'      => esc_html__('Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_sponsors_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section', 
			            'active_callback' => 'sharp_tian_our_sponsors_design_callback',  
			        ) 
		        ) );  	
		    //Our sponsors in image hover background color
				$wp_customize->add_setting( 'our_sponsors_img_hover_bg_color', 
			        array(
			            'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_img_hover_bg_color', 
			        array(
			            'label'      => esc_html__('Image Hover Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_sponsors_img_hover_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'active_callback' => 'sharp_tian_our_sponsors_design_callback',   
			        ) 
		        ) );  	 	
		    //Our sponsors in arrow color
				$wp_customize->add_setting( 'our_sponsors_arrow_color', 
			        array(
			            'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_arrow_color', 
			        array(
			            'label'      => esc_html__('Arrow Color', 'sharp-tian' ), 
			            'settings'   => 'our_sponsors_arrow_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'active_callback' => 'sharp_tian_our_sponsors_design_callback',   
			        ) 
		        ) ); 
		    //Our sponsors in arrow Background color
				$wp_customize->add_setting( 'our_sponsors_arrow_bg_color', 
			        array(
			            'default'	=> '#273641',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_arrow_bg_color', 
			        array(
			            'label'      => esc_html__('Arrow Background Color', 'sharp-tian' ), 
			            'settings'   => 'our_sponsors_arrow_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'active_callback' => 'sharp_tian_our_sponsors_design_callback',   
			        ) 
		        ) ); 
		     //Our sponsors in arrow Text hover color
				    $wp_customize->add_setting( 'our_sponsors_arrow_texthover_color', 
				        array(
				            'default'    => '#fff',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_sponsors_arrow_texthover_color', 
				        array(
				            'label'      => esc_html__('Arrow Text Hover Color', 'sharp-tian' ), 
				            'settings'   => 'our_sponsors_arrow_texthover_color', 
				            'priority'   => 10,
				            'section'    => 'our_sponsors_section',
				            'active_callback' => 'sharp_tian_our_sponsors_design_callback',
				        ) 
			        ) ); 
		    //Our sponsors in arrow background hover color
				    $wp_customize->add_setting( 'our_sponsors_arrow_bghover_color', 
				        array(
				            'default'    => '#4f2d4f',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_sponsors_arrow_bghover_color', 
				        array(
				            'label'      => esc_html__('Arrow Background Hover Color', 'sharp-tian' ), 
				            'settings'   => 'our_sponsors_arrow_bghover_color', 
				            'priority'   => 10,
				            'section'    => 'our_sponsors_section',
				            'active_callback' => 'sharp_tian_our_sponsors_design_callback',
				        ) 
			        ) ); 	 	
		    //Our sponsors in Autoplay True
			    $wp_customize->add_setting('sharp_tian_our_sponsors_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'custom_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_our_sponsors_slider_autoplay',
			    	array(
				        'settings' => 'sharp_tian_our_sponsors_slider_autoplay',
				        'label'   => esc_html__('Autoplay', 'sharp-tian' ),
				        'section' => 'our_sponsors_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'sharp_tian_our_sponsors_design_callback',
			        )
			    )); 
			//Our sponsors Slider in autoplay speed
			    $wp_customize->add_setting('sharp_tian_our_sponsors_slider_autoplay_speed', array(
			    	'default'        => '1000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_our_sponsors_slider_autoplay_speed',
			    	array(
				        'settings' => 'sharp_tian_our_sponsors_slider_autoplay_speed',
				        'label'   => esc_html__('AutoplaySpeed', 'sharp-tian' ),
				        'section' => 'our_sponsors_section',
				        'type'  => 'text', 
				        'active_callback' => 'sharp_tian_our_sponsors_design_callback',  
			        )
			    ));  
			//Our sponsors in autoplay TimeOut
			    $wp_customize->add_setting('sharp_tian_our_sponsors_autoplay_timeout', array(
			    	'default'        => '5000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_our_sponsors_autoplay_timeout',
			    	array(
				        'settings' => 'sharp_tian_our_sponsors_autoplay_timeout',
				        'label'   => esc_html__('AutoplayTimeout', 'sharp-tian' ),
				        'section' => 'our_sponsors_section',
				        'type'  => 'text',
				        'active_callback' => 'sharp_tian_our_sponsors_design_callback',
			        )
			    ));   	 	

		//Ordering Section
			$wp_customize->add_section( 'global_ordering_section' , array(
				'title'  => esc_html__('Home Page Ordering Section', 'sharp-tian' ),
				'panel'  => 'sharp_tian_theme_section',	
			) );
			//add Control
				$wp_customize->add_setting('global_ordering', array(
					'default'  => array( 
							'sharp_tian_featuredimage_slider',
							'sharp_tian_featured_section',
							'sharp_tian_about_section',
							'sharp_tian_our_portfolio_section',
							'sharp_tian_our_team_section',
							'sharp_tian_our_testimonial_section',
							'sharp_tian_our_sponsors_section',
							'sharp_tian_widget_section',
						),
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new sharp_tian_custom_ordering(
			    	$wp_customize,'global_ordering',
			    	array(
				        'settings' => 'global_ordering',
				        'label'   => esc_html__('Select Section', 'sharp-tian' ),
				        'description' => 'Drag & Drop Sections to re-arrange the order',
				        'section' => 'global_ordering_section',
				        'type'    => 'sharp_tian_sortable_repeater',
				        'choices'     => array(
							'sharp_tian_featuredimage_slider' => 'Featured Slider',
							'sharp_tian_featured_section' => 'Featured Section',
							'sharp_tian_about_section'	=> 'About Section',
							'sharp_tian_our_portfolio_section'	=> 'Our Portfolio',
							'sharp_tian_our_team_section'	=> 'Our Team',
							'sharp_tian_our_testimonial_section'	=> 'Our Testimonial',	
							'sharp_tian_our_sponsors_section'	=> 'Our Sponsors',	
							'sharp_tian_widget_section'	=> 'Widget Section',
						),
				    )
				));	
			//Drag and Drop in pro option
				$wp_customize->add_setting('drag_drop_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new drag_drop_option_Control(
			    	$wp_customize,'drag_drop_section_pro',
			    	array(
				        'settings' => 'drag_drop_section_pro',
				        'section' => 'global_ordering_section',
			        )
			    ));
			    
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'globalddd_ordering',
			    	array(
				        'settings' => 'globalddd_ordering',
				        'section' => 'global_ordering_section',
				        'type'    => 'hidden',
				    )
				));	

				$wp_customize->add_setting('sharp_tian_diseble', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_diseble',
			    	array(
				        'settings' => 'sharp_tian_diseble',
				        'section' => 'global_ordering_section',
				        'type'    => 'hidden',
				    )
				));	

		//Design Section
			$wp_customize->add_section( 'global_thme_design_section' , array(
				'title'  => esc_html__('Design', 'sharp-tian' ),
				'panel'  => 'sharp_tian_theme_section',	
			) );
			//Design in Heding Underline color
				$wp_customize->add_setting( 'design_heding_underline_color', 
			        array(
			            'default'    => '#273641', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'design_heding_underline_color', 
			        array(
			            'label'      => esc_html__( 'Heding Underline Color', 'sharp-tian' ), 
			            'settings'   => 'design_heding_underline_color', 
			            'priority'   => 10,
			            'section'    => 'global_thme_design_section',     
			        ) 
		        ) );
		 
	
        //Footer create in globly
		//footer section
			$wp_customize->add_section( 'sharp_tian_footer_section' , array(
				'title'  => esc_html__('Footer', 'sharp-tian' ),
				'priority'  => 6,
			) );	
			//footer width layout
			    $wp_customize->add_setting( 'sharp_tian_footer_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharp_tian_footer_width_layout',array(
			        	'label'      => esc_html__( 'Footer Width', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_footer_width_layout', 
			            'priority'   => 0,
			            'section'    => 'sharp_tian_footer_section',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		        //Footer Section in contact width
			    $wp_customize->add_setting( 'sharp_tian_footer_container_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharp_tian_footer_container_width',array(
			        	'label'      => esc_html__( 'Footer Contact Width', 'sharp-tian' ), 
			        	'description' => 'in px',
			            'settings'   => 'sharp_tian_footer_container_width', 
			            'priority'   => 0,
			            'section'    => 'sharp_tian_footer_section',
			            'type'    => 'number',
			            'active_callback'  => 'sharp_tian_footer_content_width_callback',
			        ) 
		        ) );	
			//footer Colors title
		        $wp_customize->add_setting('footer_color_title', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'footer_color_title',
			    	array(
				        'settings' => 'footer_color_title',
				        'label'   => esc_html__('Footer Colors', 'sharp-tian' ),
				        'section' => 'sharp_tian_footer_section',
			        )
			    ));
			//footer in add Background color
			    $wp_customize->add_setting( 'sharp_tian_footer_bg_color', 
			        array(
			            'default'    => '#fbe4e6', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_footer_bg_color', 
			        array(
			            'label'      => esc_html__( 'Background Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_footer_bg_color', 
			            'priority'   => 10,
			            'section'    => 'sharp_tian_footer_section',
			        ) 
		        ) );  
		    //footer in add link color
			    $wp_customize->add_setting( 'sharp_tian_footer_link_color', 
			        array(
			            'default'    => '#273641', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_footer_link_color', 
			        array(
			            'label'      => esc_html__( 'Link Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_footer_link_color', 
			            'priority'   => 10,
			            'section'    => 'sharp_tian_footer_section',
			        ) 
		        ) );  
		    //footer in add link hover color
			    $wp_customize->add_setting( 'sharp_tian_footer_link_hover_color', 
			        array(
			            'default'    => '#afafaf', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharp_tian_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new sharp_tian_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharp_tian_footer_link_hover_color', 
			        array(
			            'label'      => esc_html__( 'Link Hover Color', 'sharp-tian' ), 
			            'settings'   => 'sharp_tian_footer_link_hover_color', 
			            'priority'   => 10,
			            'section'    => 'sharp_tian_footer_section',
			        ) 
		        ) );
		    //footer backgroung image title
		        $wp_customize->add_setting('footer_bg_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',	
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharp_tian_GeneratePress_Upsell_Section(
			    	$wp_customize,'footer_bg_section',
			    	array(
				        'settings' => 'footer_bg_section',
				        'label'   => esc_html__('Footer Background Image', 'sharp-tian' ),
				        'section' => 'sharp_tian_footer_section',
			        )
			    ));
		    //footer background image option
		        $wp_customize->add_setting('feature_product', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'feature_product', array(
			        'label' => esc_html__('Backgroung Image', 'sharp-tian'),
			        'section' => 'sharp_tian_footer_section',
			        'settings' => 'feature_product',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			    )));
			//footer in image background position
			    $wp_customize->add_setting('sharp_tian_footer_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_footer_bg_position',
			    	array(
				        'settings' => 'sharp_tian_footer_bg_position',
				        'label'   => esc_html__('Background Position', 'sharp-tian' ),
				        'section' => 'sharp_tian_footer_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'left top' => 'Left Top',
				        	'left center' => 'Left Center',
				        	'left bottom' => 'Left Bottom',
				            'right top' => 'Right Top',
				            'right center' => 'Right Center',
				            'right bottom' => 'Right Bottom',
				            'center top' => 'Center Top',
				            'center center' => 'Center Center',
				            'center bottom' => 'Center Bottom',
			        	),
			        )
			    )); 
			//footer in image background attachment
			    $wp_customize->add_setting('sharp_tian_footer_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_footer_bg_attachment',
			    	array(
				        'settings' => 'sharp_tian_footer_bg_attachment',
				        'label'   => esc_html__('Background Attachment', 'sharp-tian' ),
				        'section' => 'sharp_tian_footer_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        )
			    ));
			//footer in image background Size
			    $wp_customize->add_setting('sharp_tian_footer_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharp_tian_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharp_tian_footer_bg_size',
			    	array(
				        'settings' => 'sharp_tian_footer_bg_size',
				        'label'   => esc_html__('Background Size', 'sharp-tian' ),
				        'section' => 'sharp_tian_footer_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        )
			    ));  

	//logo option in image width title_tagline
	    $wp_customize->add_setting('sharp_tian_logo_width', array(
	    	'default'    => '150',
	        'type'       => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'transport'  => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',		  
	    ));
	    $wp_customize->add_control( new WP_Customize_Control(
	    	$wp_customize,'sharp_tian_logo_width',
	    	array(
		        'settings' => 'sharp_tian_logo_width',
		        'label'    => esc_html__('Logo Image Width', 'sharp-tian' ),
		        'section'  => 'title_tagline',
		        'type'  => "number",
		        'description' => 'in px',
	        )
	    ));
}
add_action( 'customize_register', 'sharp_tian_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sharp_tian_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sharp_tian_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sharp_tian_customize_preview_js() {
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'sharp-tian-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _SHARP_TIAN_VERSION, true );
	wp_register_script( 'sharp-tian-customize-custom-js', get_template_directory_uri() . '/assets/js/customs.js' );
	$temp = array(
    	'ajaxUrl' => admin_url( 'admin-ajax.php' )
	);
}
add_action( 'customize_preview_init', 'sharp_tian_customize_preview_js' );

function sharp_tian_customizer_css() {

    wp_enqueue_style( 'sharp-tian-customize-controls-style', get_template_directory_uri() . '/assets/css/customizer-admin.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'sharp_tian_customizer_css',0 );

if ( ! function_exists( 'sharp_tian_sanitize_select' ) ) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function sharp_tian_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }
endif;
if ( ! function_exists( 'sharp_tian_sanitize_checkbox' ) ) :

    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function sharp_tian_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }
endif;

add_action( 'wp_enqueue_scripts', 'sharp_tian_theme_scripts' );
function sharp_tian_theme_scripts() {

	
    $sharp_tian_body_fontfamily = get_theme_mod("sharp_tian_body_fontfamily",5);    
    if($sharp_tian_body_fontfamily!=''){
        global $sharp_tian_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharp_tian_fonttotal[$sharp_tian_body_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'sharp-tian-factory-lite-font', wptt_get_webfont_url($font_url), array() );
    }
    $sharp_tian_Heading_fontfamily = get_theme_mod("sharp_tian_Heading_fontfamily",5);    
    if($sharp_tian_Heading_fontfamily!=''){
        global $sharp_tian_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharp_tian_fonttotal[$sharp_tian_Heading_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'sharp-tian-factory-lite-font-a', wptt_get_webfont_url($font_url), array() );
    }
    $sharp_tian_Heading1_fontfamily = get_theme_mod("sharp_tian_Heading1_fontfamily",5);    
    if($sharp_tian_Heading1_fontfamily!=''){
        global $sharp_tian_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharp_tian_fonttotal[$sharp_tian_Heading1_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'sharp-tian-factory-lite-font-b', wptt_get_webfont_url($font_url), array() );
    }
    $sharp_tian_Heading2_fontfamily = get_theme_mod("sharp_tian_Heading2_fontfamily",5);    
    if($sharp_tian_Heading2_fontfamily!=''){
        global $sharp_tian_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharp_tian_fonttotal[$sharp_tian_Heading2_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'sharp-tian-factory-lite-font-c', wptt_get_webfont_url($font_url), array() );
    }
    $sharp_tian_Heading3_fontfamily = get_theme_mod("sharp_tian_Heading3_fontfamily",5);    
    if($sharp_tian_Heading3_fontfamily!=''){
        global $sharp_tian_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharp_tian_fonttotal[$sharp_tian_Heading3_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'sharp-tian-factory-lite-font-d', wptt_get_webfont_url($font_url), array() );
    }
}  

// function sharp_tian_call_menu_btn_callback(){
// 	$sharp_tian_call_menu_btn = get_theme_mod( 'sharp_tian_call_menu_btn');
// 	if ( true === $sharp_tian_call_menu_btn ) {
// 		return true;
// 	}
// 	return false;
// }
if ( ! function_exists( 'sharp_tian_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function sharp_tian_site_layout() {
        $sharp_tian_site_layout = array(
            'no_sidebar'  => get_template_directory_uri() . '/assets/images/full.png',
            'left_sidebar' => get_template_directory_uri() . '/assets/images/left.png',
            'right_sidebar' => get_template_directory_uri() . '/assets/images/right.png',
        );
        $output = apply_filters( 'sharp_tian_site_layout', $sharp_tian_site_layout );
        return $output;
    }
endif;
function sharp_tian_header1_callback(){
	$sharp_tian_header_layout = get_theme_mod( 'sharp_tian_header_layout','header1');
	if ( 'header1' === $sharp_tian_header_layout ) {
		return true;
	}
	return false;
}
// function sharp_tian_header2_callback(){
// 	$sharp_tian_header_layout = get_theme_mod( 'sharp_tian_header_layout','header2');
// 	if ( 'header1' === $sharp_tian_header_layout ) {
// 		return true;
// 	}
// 	return false;
// }
function sharp_tian_grid_view_callback(){
	$sharp_tian_container_blog_layout = get_theme_mod( 'sharp_tian_container_blog_layout','grid_view');
	if ( 'grid_view' === $sharp_tian_container_blog_layout ) {
		return true;
	}
	return false;
}
function sharp_tian_content_boxed_callback(){
	$sharp_tian_container_page_layout = get_theme_mod( 'sharp_tian_container_page_layout','content_boxed');
	if ( 'content_boxed' === $sharp_tian_container_page_layout ) {
		return true;
	}
	return false;
}
function sharp_tian_boxed_layout_callback(){
	$sharp_tian_container_page_layout = get_theme_mod( 'sharp_tian_container_page_layout','content_boxed');
	if ( 'boxed_layout' === $sharp_tian_container_page_layout ) {
		return true;
	}
	return false;
}

if ( ! function_exists( 'sharp_tian_header_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function sharp_tian_header_site_layout() {
        $sharp_tian_header_site_layout = array(
            'header1' => get_template_directory_uri() . '/assets/images/header-1.png',
        );

        $output = apply_filters( 'sharp_tian_header_site_layout', $sharp_tian_header_site_layout );
        return $output;
    }
endif;
function sharp_tian_customize_partial_name() {
	bloginfo( 'our_portfolio_main_title' );
}
function sharp_tian_customize_partial_our_team(){
	bloginfo( 'our_team_main_title' );
}
function sharp_tian_customize_partial_testimonial(){
	bloginfo( 'our_testimonial_main_title' );
}
function sharp_tian_customize_partial_services(){
	bloginfo( 'our_services_main_title' );
}
function sharp_tian_customize_partial_sponsors(){
	bloginfo( 'our_sponsors_main_title' );
}
function sharp_tian_customize_partial_about(){
	bloginfo( 'about_title_section' );
}
function sharp_tian_customize_partial_featured_section(){
	bloginfo( 'featured_section_number' );
}
function sharp_tian_customize_partial_featured_slider(){
	bloginfo( 'featuredimage_slider_number' );
}
function sharp_tian_customize_partial_breadcrumb(){
	bloginfo( 'sharp_tian_display_breadcrumb_section' );
}
function sharp_tian_scroll_callback(){
	$display_scroll_button = get_theme_mod( 'display_scroll_button');
	if ( true === $display_scroll_button ) {
		return true;
	}
	return false;
}

function sharp_tian_sanitize_number_range( $number, $setting ) {

    // Ensure input is an absolute integer.
    $number = absint( $number );

    // Get the input attributes associated with the setting.
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;


    // Get minimum number in the range.
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

    // Get maximum number in the range.
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

    // Get step.
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

    // If the number is within the valid range, return it; otherwise, return the default
    return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
function sharp_tian_featured_design_callback(){
	$featuredimage_slider_tab = get_theme_mod( 'featuredimage_slider_tab','general');
	if ( 'design' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_featured_generalcallback(){
	$featuredimage_slider_tab = get_theme_mod( 'featuredimage_slider_tab','general');
	if ( 'general' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_featured_section_callback(){
	$featured_section_tab = get_theme_mod( 'featured_section_tab','general');
	if ( 'general' === $featured_section_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_featured_section_design_callback(){
	$featured_section_tab = get_theme_mod( 'featured_section_tab','general');
	if ( 'design' === $featured_section_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_our_portfolio_general_callback(){
	$our_portfolio_section_tab = get_theme_mod( 'our_portfolio_section_tab','general');
	if ( 'general' === $our_portfolio_section_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_our_portfolio_design_callback(){
	$our_portfolio_section_tab = get_theme_mod( 'our_portfolio_section_tab','general');
	if ( 'design' === $our_portfolio_section_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_our_team_general_callback(){
	$our_team_section_tab = get_theme_mod( 'our_team_section_tab','general');
	if ( 'general' === $our_team_section_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_our_team_design_callback(){
	$our_team_section_tab = get_theme_mod( 'our_team_section_tab','general');
	if ( 'design' === $our_team_section_tab ) {
		return true;
	}
	return false;
}
function our_testimonial_general_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','general');
	if ( 'general' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}
function our_testimonial_design_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','design');
	if ( 'design' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}

// function sharp_tian_our_services_general_callback(){
// 	$our_services_tab = get_theme_mod( 'our_services_tab','general');
// 	if ( 'general' === $our_services_tab ) {
// 		return true;
// 	}
// 	return false;
// }
// function sharp_tian_our_services_design_callback(){
// 	$our_services_tab = get_theme_mod( 'our_services_tab','general');
// 	if ( 'design' === $our_services_tab ) {
// 		return true;
// 	}
// 	return false;
// }
function sharp_tian_our_sponsors_general_callback(){
	$our_sponsors_tab = get_theme_mod( 'our_sponsors_tab','general');
	if ( 'general' === $our_sponsors_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_our_sponsors_design_callback(){
	$our_sponsors_tab = get_theme_mod( 'our_sponsors_tab','general');
	if ( 'design' === $our_sponsors_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_breadcrumb_call_back(){
	$sharp_tian_display_breadcrumb_section = get_theme_mod( 'sharp_tian_display_breadcrumb_section',true);
	if ( true === $sharp_tian_display_breadcrumb_section ) {
		return true;
	}
	return false;
}
function sharp_tian_header_content_width_callback(){
	$sharp_tian_header_width_layout = get_theme_mod( 'sharp_tian_header_width_layout','content_width');
	if ( 'content_width' === $sharp_tian_header_width_layout ) {
		return true;
	}
	return false;
}
function sharp_tian_top_bar_content_width_callback(){
	$sharp_tian_top_bar_width_layout = get_theme_mod( 'sharp_tian_top_bar_width_layout','content_width');
	if ( 'content_width' === $sharp_tian_top_bar_width_layout ) {
		return true;
	}
	return false;
}
function sharp_tian_footer_content_width_callback(){
	$sharp_tian_footer_width_layout = get_theme_mod( 'sharp_tian_footer_width_layout','content_width');
	if ( 'content_width' === $sharp_tian_footer_width_layout ) {
		return true;
	}
	return false;
}
function sharp_tian_custom_sanitization_callback( $value ) {
	// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
	$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
	\preg_match( $pattern, $value, $matches );
	// Return the 1st match found.
	if ( isset( $matches[0] ) ) {
		if ( is_string( $matches[0] ) ) {
			return $matches[0];
		}
		if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
			return $matches[0][0];
		}
	}
	// If no match was found, return an empty string.
	return '';
}

function sharp_tian_sanitize_text( $string ) {
	$allowedtags = array(
		'a' => array(
			'href' => array (),
			'target' => array(),
			'title' => array (),
			'class' => array(),
		),
		'div' => array(
			'class' => array (),
		),
		'em' => array(),
		'i' => array(),
		'b' => array(),
		'strong' => array(),
		'p' => array(),
		'br' => array(),
		'hr' => array(),
	);

	return wp_kses( $string , $allowedtags );
}

//sanitize select
	if ( ! function_exists( 'custom_sanitize_select' ) ) :
	    function custom_sanitize_select( $input, $setting ) {

	        $input = sanitize_text_field( $input );

	        $choices = $setting->manager->get_control( $setting->id )->choices;

	        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	    }
	endif;
//sanitize checkbox
	if ( ! function_exists( 'custom_sanitize_checkbox' ) ) :
	    function custom_sanitize_checkbox( $checked ) {
	        return ( ( isset( $checked ) && true === $checked ) ? true : false );
	    }
	endif;

function sharp_tian_social_icon_general_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'general' === $social_icon_tab ) {
		return true;
	}
	return false;
}
function sharp_tian_social_icon_design_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'design' === $social_icon_tab ) {
		return true;
	}
	return false;
}