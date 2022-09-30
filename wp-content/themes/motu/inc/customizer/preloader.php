<?php
/**
* Footer Settings.
*
* @package Motu
*/

$motu_default = motu_get_default_theme_options();


$wp_customize->add_section( 'preloader_section',
	array(
	'title'      => esc_html__( 'Preloader Setting', 'motu' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	'priority'   => 5,
	)
);

$wp_customize->add_setting('ed_preloader',
    array(
        'default' => $motu_default['ed_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_checkbox',
    )
);

$wp_customize->add_control('ed_preloader',
    array(
        'label' => esc_html__('Enable Preloader', 'motu'),
        'section' => 'preloader_section',
        'type' => 'checkbox',
    )
);