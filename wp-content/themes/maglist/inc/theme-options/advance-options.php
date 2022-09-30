<?php
if ( !function_exists( 'maglist_acb_custom_header_one' ) ) :
	/**
	 * Active callback function of header top bar
	 *
	 * @static
	 * @access public
	 * @return boolen
	 * @since 1.0
	 *
	 * @package Maglist WordPress theme
	 */
	function maglist_acb_custom_header_one( $control )	{
		$value = $control->manager->get_setting( Maglist_Helper::with_prefix( 'container-width' ) )->value();
		return 'default' == $value;
	}
endif;

/**
 * Register Advanced Options
 *
 * @return void
 * @since 1.0
 *
 * @package Maglist WordPress theme
 */
function maglist_advanced_options() {
	Maglist_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
			'id'    => 'advance-options',
			'title' => esc_html__( 'Advanced Options', 'maglist' ),
			'priority' => 120
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id'	=> 'pre-loader',
				'label' => esc_html__( 'Show Preloader', 'maglist' ),
				'default' => false,
				'type'  => 'toggle',
			),
			array(
				'id'      =>  'container-width',
				'label'   => esc_html__( 'Site Layout', 'maglist' ),
				'type'    => 'buttonset',
				'default' => 'default',
				'choices' => array(
					'default' => esc_html__( 'Default', 'maglist' ),
					'box'	  => esc_html__( 'Boxed', 'maglist' ),
				)
			),
			array(
				'id'          	  => 'container-custom-width',
				'label'   	  	  => esc_html__( 'Container Width', 'maglist' ),
				'active_callback' => 'acb_custom_header_one',
				'type'        	  => 'range',
				'default'     	  => '1300',
				'input_attrs' 	  =>  array(
					'min'   => 400,
					'max'   => 2000,
					'step'  => 5,
				),
			),
			array(
				'id' => 'single-related-post',
				'type' => 'text',
				'label' => esc_html__( 'Change Related Post Title', 'maglist' ),
				'default' => esc_html__( 'Related Post', 'maglist' )
			),
		),
	));
}
add_action( 'init', 'maglist_advanced_options' );
