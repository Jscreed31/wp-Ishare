<?php
/**
* Register Go to pro button
*
* @since 1.3
*
* @package Maglist WordPress Theme
*/
function maglist_go_to_pro(){
	Maglist_Customizer::set(array(
		'section' => array(
			'id'       => 'go-to-pro', 
			'type'     => 'anchor',
			'title'    => esc_html__( 'Maglist Pro', 'maglist' ),
			'url'      => esc_url( 'https://wpactivethemes.com/download/maglist-pro/' ),
			'priority' => 0
		)
	));
}
add_action( 'init', 'maglist_go_to_pro' );