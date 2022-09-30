<?php
/**
* Layouts Settings.
*
* @package Motu
*/

$motu_default = motu_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'layout_setting',
	array(
	'title'      => esc_html__( 'Archive Settings', 'motu' ),
	'priority'   => 60,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


$wp_customize->add_setting( 'global_sidebar_layout',
	array(
	'default'           => $motu_default['global_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'motu_sanitize_sidebar_option',
	)
);
$wp_customize->add_control( 'global_sidebar_layout',
	array(
	'label'       => esc_html__( 'Global Sidebar Layout', 'motu' ),
	'section'     => 'layout_setting',
	'type'        => 'select',
	'choices'     => array(
		'right-sidebar' => esc_html__( 'Right Sidebar', 'motu' ),
		'left-sidebar'  => esc_html__( 'Left Sidebar', 'motu' ),
		'no-sidebar'    => esc_html__( 'No Sidebar', 'motu' ),
	    ),
	)
);