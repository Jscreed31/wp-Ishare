<?php

/**
 * Inner banner options in customizer
 *
 * @return void
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */

function maglist_inner_banner_options() {
	Maglist_Customizer::set(array(
		# Theme Option > color options
		'section' => array(
			'id'       => 'header_image',
			'priority' => 40,
			'prefix' => false,
		),
		'fields'  => array(
			array(
				'id'      	  => 'ib-blog-title',
				'label'   	  => esc_html__( 'Title', 'maglist' ),
				'description' => esc_html__( 'It is displayed when home page is latest posts.', 'maglist' ),
				'default' 	  => esc_html__( 'Latest Blog', 'maglist'),
				'type'	  	  => 'text',
				'priority'    => 10,
			),
			array(
				'id'	  	  => 'ib-title-size',
				'label'   	  => esc_html__( 'Font Size', 'maglist' ),
				'description' => esc_html__( 'The value is in px. Defaults to 40px.', 'maglist' ),
				'default' => array(
					'desktop' => 40,
					'tablet'  => 32,
					'mobile'  => 32,
				),
				'input_attrs' =>  array(
					'min'   => 1,
					'max'   => 60,
					'step'  => 1,
				),
				'type' => 'slider',
				'priority' => 20
			),
			array(
				'id'      => 'ib-title-color',
				'label'   => esc_html__( 'Text Color', 'maglist' ),
				'type'    => 'color-picker',
				'default' => '#ffffff',
				'priority' => 30
			),
			array(
				'id' 	   => 'ib-background-color',
				'label'    => esc_html__( 'Overlay Color', 'maglist' ),
				'default'  => 'rgba(0, 0, 0, 0.49)',
				'type' 	   => 'color-picker',
				'priority' => 40,
			),
			array(
				'id'      => 'ib-text-align',
				'label'   => esc_html__( 'Alignment', 'maglist' ),
				'type'    => 'buttonset',
				'default' => 'banner-content-center',
				'choices' => array(
					'banner-content-left'   => esc_html__( 'Left', 'maglist' ),
					'banner-content-center' => esc_html__( 'Center', 'maglist' ),
					'banner-content-right'  => esc_html__( 'Right', 'maglist' ),
				),
				'priority' => 50
			),
			array(
				'id'      => 'ib-image-attachment',
				'label'   => esc_html__( 'Image Attachment', 'maglist' ),
				'type'    => 'buttonset',
				'default' => 'banner-background-scroll',
				'choices' => array(
					'banner-background-scroll'           => esc_html__( 'Scroll', 'maglist' ),
					'banner-background-attachment-fixed' => esc_html__( 'Fixed', 'maglist' ),
				),
				'priority' => 60
			),
			array(
				'id'      	=> 'ib-height',
				'label'   	=> esc_html__( 'Height (px)', 'maglist' ),
				'type'    	=> 'slider',
				'description' => esc_html__( 'The value is in px. Defaults to 420px.', 'maglist' ),
				'default' => array(
					'desktop' => 300,
					'tablet'  => 300,
					'mobile'  => 300,
				),
				'input_attrs' =>  array(
					'min'   => 1,
					'max'   => 1000,
					'step'  => 1,
				),
			),
			'priority' => 70
		),
	));
}
add_action( 'init', 'maglist_inner_banner_options' );
