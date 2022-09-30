<?php
/**
 * Creates option for footer
 *
 * Register footer Options
 *
 * @return void
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */

function maglist_footer_options() {
	Maglist_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Footer Options
		'section' => array(
			'id'    => 'footer',
			'title' => esc_html__( 'Footer Options', 'maglist' ),
			'priority' => 110
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id'      => 'disable-widget-area',
				'label'   => esc_html__( 'Disable Widget Area', 'maglist' ),
				'default' => false,
				'type'    => 'toggle',
			),
			array(
				'id'      => 'footer-copyright-text',
				'label'   => esc_html__( 'Copyright Text', 'maglist' ),
				'default' => esc_html__( 'Copyright &copy; All right reserved', 'maglist' ),
				'type'    => 'textarea',
				'partial' =>	array(
					'selector'	=>	'span#maglist-copyright'
				)
			),
			array(
				'id'      => 'footer-social-menu',
				'label'   => esc_html__( 'Show Social Menu', 'maglist' ),
				'description' => esc_html__( 'Please add Social menus for enabling Social menus. Go to Menus for setting up', 'maglist' ),
				'default' => true,
				'type'    => 'toggle',
			)
		)
	));
}
# use widgets_init hook as we need default value of layout-footer while registering sidebar.
# init hook is too late
add_action( 'widgets_init', 'maglist_footer_options' );
