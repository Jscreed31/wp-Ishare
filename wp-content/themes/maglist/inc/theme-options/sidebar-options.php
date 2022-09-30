<?php
if ( !function_exists( 'maglist_acb_sticky_sidebar' ) ) :
	/**
	 * Active callback for sticky sidebar
	 *
	 * @static
	 * @access public
	 * @return boolen
	 * @since 1.0
	 *
	 * @package Maglist WordPress theme
	 */
	function maglist_acb_sticky_sidebar( $control )	{
		$value = $control->manager->get_setting( Maglist_Helper::with_prefix( 'sidebar-position' ) )->value();
		if( 'no-sidebar' == $value ){
			return false;
		}else{
			return true;
		}
	}
endif;

/**
 * Register sidebar Options
 *
 * @return void
 * @since 1.0
 *
 * @package Maglist WordPress theme
 */
function maglist_sidebar_options() {
	Maglist_Customizer::set(array(
		# Theme Options
		'panel'   => 'panel',
		'section' => array(
			'id'     => 'sidebar-options',
			'title'  => esc_html__( 'Sidebar Options', 'maglist' ),
			'priority' => 80
		),
		'fields' => array(
			array(
				'id'      => 'sidebar-position',
				'label'   => esc_html__( 'Sidebar Position', 'maglist' ),
				'type'    => 'buttonset',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar'  => esc_html__( 'Left', 'maglist' ),
					'right-sidebar' => esc_html__('Right', 'maglist' ),
					'no-sidebar'    => esc_html__( 'None', 'maglist' ),
				)
			),
			array(
			    'id' => 'sticky-sidebar',
			    'label'  => esc_html__( 'Sticky Sidebar', 'maglist' ),
			    'default' => true,
			    'type' => 'toggle',
			    'active_callback' => 'acb_sticky_sidebar'
			)
		)
	));
}
add_action( 'init', 'maglist_sidebar_options' );