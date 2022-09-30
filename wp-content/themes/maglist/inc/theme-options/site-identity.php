<?php
/**
 * Register font size and choice to display logo or title.
 *
 * @since 1.0
 *
 * @package Maglist WordPress theme
 */

/**
* Register Site Identity Options
*
* @return void
* @since 1.0
*
* @package Maglist WordPress theme
*/
function maglist_site_identity() {
	Maglist_Customizer::set(array(
		# Site Identity > title size || title or logo
		'section' => array(
			'id' => 'title_tagline',
			'prefix' => false,
		),
		'fields'  => array(
			array(
				'id'	  	  => 'title-size',
				'label'   	  => esc_html__( 'Title Size', 'maglist' ),
				'description' => esc_html__( 'The value is in px.' , 'maglist' ),
				'default' => array(
					'desktop' => 60,
					'tablet'  => 60,
					'mobile'  => 60,
				),
				'input_attrs' =>  array(
					'min'   => 1,
					'max'   => 60,
					'step'  => 1,
				),
				'type'    => 'slider',
			),
			array(
				'id'	  	  => 'tagline-size',
				'label'   	  => esc_html__( 'Tagline Size', 'maglist' ),
				'description' => esc_html__( 'The value is in px.' , 'maglist' ),
				'default' => array(
					'desktop' => 20,
					'tablet'  => 20,
					'mobile'  => 20,
				),
				'input_attrs' =>  array(
					'min'   => 1, 
					'max'   => 35,
					'step'  => 1,
				),
				'type'    => 'slider',
			),
			array(
				'id'	  	  => 'logo-size',
				'label'   	  => esc_html__( 'Logo Size', 'maglist' ),
				'description' => esc_html__( 'The value is in px.' , 'maglist' ),
				'default' => array(
					'desktop' => 200,
					'tablet'  => 200,
					'mobile'  => 200,
				),
				'input_attrs' =>  array(
					'min'   => 1,
					'max'   => 500,
					'step'  => 1,
				),
				'type'    => 'slider',
			)
		)	
	));
}
add_action( 'init', 'maglist_site_identity' );