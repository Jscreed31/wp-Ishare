<?php
/**
* Single Post Options.
*
* @package Motu
*/

$motu_default = motu_get_default_theme_options();

$wp_customize->add_section( 'single_post_setting',
	array(
	'title'      => esc_html__( 'Single Post Settings', 'motu' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


$wp_customize->add_setting(
    'motu_single_post_layout',
    array(
        'default'           => $motu_default['motu_single_post_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_single_post_layout'
    )
);
$wp_customize->add_control(
    new Motu_Custom_Radio_Image_Control(
        $wp_customize,
        'motu_single_post_layout',
        array(
            'settings'      => 'motu_single_post_layout',
            'section'       => 'single_post_setting',
            'label'         => esc_html__( 'Appearance Layout', 'motu' ),
            'choices'       => array(
                'layout-1'  => get_template_directory_uri() . '/assets/images/single-layout-style-1.png',
                'layout-2'  => get_template_directory_uri() . '/assets/images/single-layout-style-2.png',
            )
        )
    )
);

$wp_customize->add_setting('ed_header_overlay',
    array(
        'default' => $motu_default['ed_header_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_overlay',
    array(
        'label' => esc_html__('Enable Header Overlay', 'motu'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
        'active_callback' => 'motu_overlay_layout_ac',
    )
);

$wp_customize->add_setting('ed_related_post',
    array(
        'default' => $motu_default['ed_related_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_related_post',
    array(
        'label' => esc_html__('Enable More Stories', 'motu'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'related_post_title',
    array(
    'default'           => $motu_default['related_post_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'related_post_title',
    array(
    'label'    => esc_html__( 'More Stories Section Title', 'motu' ),
    'section'  => 'single_post_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('twp_navigation_type',
    array(
        'default' => $motu_default['twp_navigation_type'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_single_pagination_layout',
    )
);
$wp_customize->add_control('twp_navigation_type',
    array(
        'label' => esc_html__('Single Post Navigation Type', 'motu'),
        'section' => 'single_post_setting',
        'type' => 'select',
        'choices' => array(
                'no-navigation' => esc_html__('Disable Navigation','motu' ),
                'norma-navigation' => esc_html__('Next Previous Navigation','motu' ),
                'ajax-next-post-load' => esc_html__('Ajax Load Next 3 Posts Contents','motu' )
            ),
    )
);

