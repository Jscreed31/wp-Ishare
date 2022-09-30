<?php
/**
 * Pagination Settings
 *
 * @package Motu
 */

$motu_default = motu_get_default_theme_options();

// Pagination Section.
$wp_customize->add_section( 'motu_pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'motu' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'theme_option_panel',
	)
);

// Pagination Layout Settings
$wp_customize->add_setting( 'motu_pagination_layout',
	array(
	'default'           => $motu_default['motu_pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'motu_pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Method', 'motu' ),
	'section'     => 'motu_pagination_section',
	'type'        => 'select',
	'choices'     => array(
		'next-prev' => esc_html__('Next/Previous Method','motu'),
		'numeric' => esc_html__('Numeric Method','motu'),
		'load-more' => esc_html__('Ajax Load More Button','motu'),
		'auto-load' => esc_html__('Ajax Auto Load','motu'),
	),
	)
);