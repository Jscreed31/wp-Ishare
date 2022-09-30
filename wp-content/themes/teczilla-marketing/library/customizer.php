<?php
function teczilla_marketing_sections_settings( $wp_customize ) {
    $wp_customize->remove_setting( 'teczilla_menubar_bg_color' );
     $wp_customize->remove_setting( 'teczilla_menu_item_color' );
      $wp_customize->remove_setting( 'teczilla_menu_item_hover_color' );
       $wp_customize->remove_setting( 'teczilla_menu_link_bg_color' );
       $wp_customize->remove_setting( 'teczilla_submnubg_scheme' );
        $wp_customize->remove_setting( 'teczilla_submnu_link' );
          $wp_customize->remove_section( 'teczilla_top_header' );
            $wp_customize->remove_control('blogdescription');



        $wp_customize->add_setting('teczilla_theme_color_scheme',array(
        'default' => esc_html__('#C69C6D','teczilla-marketing'),
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,'teczilla_theme_color_scheme',array(
            'label' => esc_html__('Theme Color','teczilla-marketing'),           
            'description' => esc_html__('Change Theme Color','teczilla-marketing'),
            'section' => 'colors',
            'settings' => 'teczilla_theme_color_scheme'
        ))
    ); 


    // Navigation Button



    $wp_customize->add_section('teczilla_main_top_header',array(
            'title' => esc_html__('Top Header','teczilla-marketing'),
            'panel' => 'section_settings',
            'priority'       => 7,
            ));

    $wp_customize->add_setting('teczilla_top_header_enable',
        array(
            'sanitize_callback' => 'teczilla_sanitize_checkbox',
            'default'           => 0,
        )
    );
    $wp_customize->add_control('teczilla_top_header_enable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Enable Top Header Section?', 'teczilla-marketing'),
            'section'     => 'teczilla_main_top_header',
            'description' => esc_html__('Check this box to Enable Top Header section.', 'teczilla-marketing'),
        )
    );

    $wp_customize->add_setting('teczilla_header_mail',   
        array(
            'sanitize_callback' => 'teczilla_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_mail',
        array(
            'label'       => esc_html__('Header Email', 'teczilla-marketing'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting('teczilla_header_address',   
        array(
            'sanitize_callback' => 'teczilla_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_address',
        array(
            'label'       => esc_html__('Header Address', 'teczilla-marketing'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'text',
        )
    );
    $wp_customize->add_setting('teczilla_header_phone',   
        array(
            'sanitize_callback' => 'teczilla_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_phone',
        array(
            'label'       => esc_html__('Header Contact', 'teczilla-marketing'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'text',
        )
    );

    for( $i = 1; $i <=4; $i++ ){


        $wp_customize->add_setting(
            'teczilla_service_page_icon'.$i,
            array(
                'default'           => '',
                'sanitize_callback' => 'teczilla_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Avadanta_Fontawesome_Icon_Chooser(
                $wp_customize,
                'teczilla_service_page_icon'.$i,
                array(
                    'settings'      => 'teczilla_service_page_icon'.$i,
                    'section'       => 'teczilla_main_top_header',
                    'type'          => 'icon',
                    'label'         => esc_html__( 'Social Media Icon', 'teczilla-marketing' )
                )
            )
        );

          $wp_customize->add_setting(
            'teczilla_service_page_url'.$i,
            array(
                'default'           => '',
                'sanitize_callback' => 'teczilla_sanitize_text'
            )
        );

        $wp_customize->add_control(
                'teczilla_service_page_url'.$i,
                array(
                    'settings'      => 'teczilla_service_page_url'.$i,
                    'section'       => 'teczilla_main_top_header',
                    'type'          => 'url',
                    'label'         => esc_html__( 'Social Media Icon url', 'teczilla-marketing' )
                
            )
        );
    }



    $wp_customize->add_setting('teczilla_header_button_address',   
        array(
            'sanitize_callback' => 'teczilla_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_button_address',
        array(
            'label'       => esc_html__('Header Button', 'teczilla-marketing'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'text',
        )
    );

            $wp_customize->add_setting('teczilla_header_button_url',   
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_button_url',
        array(
            'label'       => esc_html__('Header Button Url', 'teczilla-marketing'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'url',
        )
    );


            $wp_customize->add_setting('braedcrumb_height',
            array(
                'default'           => '180',
                'sanitize_callback' => 'teczilla_sanitize_float_theme'
            )
        );
        $wp_customize->add_control('braedcrumb_height',
            array(
                'label'    => __('Breadcrumb Header Height', 'teczilla-marketing'),
                'section'  => 'teczilla_breadcrumb_settings',
                'type'     => 'number',
                'input_attrs' => array(
                    'min' => '20', 'step' => '', 'max' => '100',
                  ),
                'priority' => 10,

            )
        );
        $wp_customize->add_setting( 'header_title_color', array(
            'default'           => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

      $wp_customize->add_control(
            new WP_Customize_Color_Control($wp_customize,'header_title_color',array(
                'label' => esc_html__('Header Text Color','teczilla-marketing'),           
                'description' => esc_html__('Header Text Title Color','teczilla-marketing'),
                'section' => 'colors',
            ))
        ); 

}
add_action( 'customize_register', 'teczilla_marketing_sections_settings', 30);