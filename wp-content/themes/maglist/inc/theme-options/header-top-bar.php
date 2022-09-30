<?php
if( !function_exists( 'maglist_acb_topbar' ) ):
    /**
    * Active callback function of topbar
    *
    * @static
    * @access public
    * @return boolen
    * @since 1.0
    *
    * @package Maglist WordPress Theme
    */
    function maglist_acb_topbar( $control ) {
        $value = $control->manager->get_setting( Maglist_Helper::with_prefix( 'enable-top-bar' ) )->value();
        return $value;
    }
endif;

function maglist_header_top_bar() {
    Maglist_Customizer::set(array(
        #Theme option
        'panel'     => 'panel',
        #Theme Option > Banner Image
        'section'   => array(
            'id'         => 'header-top-bar',
            'title'      => esc_html__(  'Header Top Bar', 'maglist' ),
            'priority' => 1
        ),
        'fields' => array(
            array(
                'id'      => 'enable-top-bar',
                'label'   => esc_html__( 'Enable', 'maglist' ),
                'default' => true,
                'type'    => 'toggle',
            ),
            array(
                'id'      => 'enable-time',
                'label'   => esc_html__( 'Enable Time/Date', 'maglist' ),
                'default' => true,
                'type'    => 'toggle',
                'active_callback' => 'acb_topbar'
            ),
            array(
                'id'      => 'enable-social-menu',
                'label'   => esc_html__( 'Enable Social Menu', 'maglist' ),
                'description' => esc_html__( 'Please create menu and addign to header social menu', 'maglist' ),
                'default' => true,
                'type'    => 'toggle',
                'active_callback' => 'acb_topbar'
            ),
            array(
                'id'      => 'topbar-bg-color',
                'label'   => esc_html__( 'Top Bar Background Color', 'maglist' ),
                'default' => '#000000',
                'type'    => 'color-picker',
                'active_callback' => 'acb_topbar'
            ),
            array(
                'id'      => 'topbar-text-color',
                'label'   => esc_html__( 'Top Bar Text Color', 'maglist' ),
                'default' => '#ffffff',
                'type'    => 'color-picker',
                'active_callback' => 'acb_topbar'
            ),
        ),
    ));
}

add_action ( 'init', 'maglist_header_top_bar');