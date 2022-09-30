<?php

/**
 * Register breadcrumb Options
 *
 * @return void
 * @since 1.0
 *
 * @package Maglist WordPress theme
 */
function maglist_color_options() {
	Maglist_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > color options
		'section' => array(
			'id'       => 'color-section',
			'title'    => esc_html__( 'Color Options', 'maglist' ),
			'priority' => 70
		),
		'fields'  => array(
			array(
				'id'      => 'primary-color',
				'label'   => esc_html__( 'Primary Color', 'maglist' ),
				'default' => '#d82926',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'body-text-color',
				'label'   => esc_html__( 'Body Text Color', 'maglist' ),
				'default' => '#565656',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'primary-menu-item-color',
				'label'   => esc_html__( 'Primary Menu Item color', 'maglist' ),
				'default' => '#fff',
				'type'    => 'color-picker',
			),
			array(
				'id'   => 'line-1',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'link-color',
				'label'   => esc_html__( 'Link Color', 'maglist' ),
				'default' => '#000',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'link-hover-color',
				'label'   => esc_html__( 'Link Hover Color', 'maglist' ),
				'default' => '#1064cc',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'link-hover-background-color',
				'label'   =>  esc_html__( 'Link Hover Background Color', 'maglist' ),
				'default' => '#aa1e1e',
				'type'    =>  'color-picker',
			),
			array(
				'id'   => 'line-2',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'sb-widget-title-color',
				'label'   => esc_html__( 'Sidebar Widget Title Color', 'maglist' ),
				'default' => '#000000',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'sb-widget-content-color',
				'label'   => esc_html__( 'Sidebar Widget Content Color', 'maglist' ),
				'default' => '#282835',
				'type'    => 'color-picker',
			),
			array(
				'id'   => 'line-3',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'footer-title-color',
				'label'   => esc_html__( 'Footer Widget Title Color', 'maglist' ),
				'default' => '#fff',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'footer-content-color',
				'label'   => esc_html__( 'Footer Widget Content Color', 'maglist' ),
				'default' => '#a8a8a8',
				'type'    => 'color-picker',
			),
			array(
				'id'   => 'line-4',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'footer-top-background-color',
				'label'   => esc_html__( 'Footer Background Color', 'maglist' ),
				'default' => '#28292a',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'footer-copyright-background-color',
				'label'   => esc_html__( 'Footer Copyright Background Color', 'maglist' ),
				'default' => '#0c0808',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'footer-copyright-text-color',
				'label'   => esc_html__( 'Footer Copyright Text Color', 'maglist' ),
				'default' => '#ffffff',
				'type'    => 'color-picker',
			),
		),
	));
}
add_action( 'init', 'maglist_color_options' );
