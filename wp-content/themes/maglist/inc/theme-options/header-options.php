<?php
if( !function_exists( 'maglist_acb_banner_image' ) ):
	/**
	* Active callback function of banner image
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0
	*
	* @package Maglist WordPress Theme
	*/
	function maglist_acb_banner_image( $control ) {
		$value = $control->manager->get_setting( Maglist_Helper::with_prefix( 'banner' ) )->value();
		return $value;
	}
endif;
function maglist_header_options() {
    $args = array(
        array(
            'id'    => 'header-background-image',
            'label' => esc_html__( 'Header Background Image',  'maglist'),
            'type' => 'image',
        ),
        array(
            'id' => 'header-bg-color',
            'label' => esc_html__( 'Background Color', 'maglist' ),
            'default' => 'rgba(255,255,255,0.60)',
            'type' => 'color-picker'
        ),
        array(
            'id' => 'advertisement-image',
            'label' => esc_html__( 'Advertisement Image', 'maglist' ),
            'type' => 'image'
        ),
        array(
            'id' => 'advertisement-url',
            'label' => esc_html__( 'Advertisement url', 'maglist' ),
            'type' => 'text'
        ),
        array(
            'id'    => 'enable-offcanvas',
            'label' => esc_html__( 'Enable Offcanvas Menu',  'maglist'),
            'default' => false,
            'type' => 'toggle',
        ),
    );

    if( Maglist_Theme::is_active_plugin( 'woocommerce' ) ){
        $args[] = array(
            'id'    => 'enable-cart',
            'label' => esc_html__( 'Enable Cart',  'maglist'),
            'default' => true,
            'type' => 'toggle', 
       );
    }

    Maglist_Customizer::set(array(
        #Theme option
        'panel'     => 'panel',
        #Theme Option > Banner Image
        'section'   => array(
            'id'         => 'header-options',
            'title'      => esc_html__(  'Header Options', 'maglist' ),
            'priority' => 10
        ),
        'fields' => $args
    ));
}

add_action ( 'init', 'maglist_header_options');