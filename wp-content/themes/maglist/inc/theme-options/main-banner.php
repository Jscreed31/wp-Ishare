<?php
if( !function_exists( 'maglist_acb_main_banner' ) ):
    /**
    * Active callback function of banner
    *
    * @static
    * @access public
    * @return boolen
    * @since 1.0
    *
    * @package Maglist WordPress Theme
    */
    function maglist_acb_main_banner( $control ) {
        $value = $control->manager->get_setting( Maglist_Helper::with_prefix( 'enable-main-banner' ) )->value();
        return $value;
    }
endif;

if( !function_exists( 'maglist_acb_main_banner_type' ) ):
    /**
    * Active callback function of top stories type
    *
    * @static
    * @access public
    * @return boolen
    * @since 1.0
    *
    * @package Maglist WordPress Theme
    */
    function maglist_acb_main_banner_type( $control ) {
        $top_story = $control->manager->get_setting( Maglist_Helper::with_prefix( 'enable-main-banner' ) )->value();
        $type = $control->manager->get_setting( Maglist_Helper::with_prefix( 'main-banner-post-type' ) )->value();
        return $top_story && 'category' == $type;
    }
endif;

/**
 * Create options for main banner
 *
 * @since 1.0
 *
 * @package Maglist WordPress theme
 */

function maglist_main_banner_options() {
    Maglist_Customizer::set(array(
        # Theme Options
        'panel' => 'panel',
        # Theme Options > Page Options > Settings
        'section' => array(
            'id' => 'main-banner-options',
            'title' => esc_html__( 'Main Banner Options', 'maglist' ),
            'priority' => 30
        ),
        'fields' => array(
            array(
                'id' => 'enable-main-banner',
                'label'   => esc_html__( 'Enable Main Banner', 'maglist' ),
                'default' => true,
                'type' => 'toggle',
            ),
            array(
                'id' => 'main-news-title',
                'type' => 'horizontal-line',
                'active_callback' => 'acb_main_banner',
                'label' => esc_html__( 'Main News Section', 'maglist' )
            ),
            array(
                'id' => 'main-banner-no-post',
                'label' => esc_html__( 'Number of posts to display', 'maglist' ),
                'active_callback' => 'acb_main_banner',
                'default' => 3,
                'type' => 'number',
            ),
            array(
                'id' => 'main-banner-post-type',
                'title' => esc_html__( 'Filter Posts By', 'maglist' ),
                'active_callback' => 'acb_main_banner',
                'type' => 'buttonset',                
                'default' => 'latest',
                'choices' => array(
                    'latest' => esc_html__( 'Latest Posts', 'maglist' ),
                    'category' => esc_html__( 'From category', 'maglist' ),
                ),
            ),
            array(
                'id'    => 'main-banner-post-cat',
                'title'  => esc_html__( 'Latest posts by category', 'maglist' ),
                'active_callback' => 'acb_main_banner_type',
                'default' => 1,                
                'type' => 'maglist-category-dropdown',
            ),
            array(
                'id' => 'trending-saperator',
                'type' => 'horizontal-line',
                'active_callback' => 'acb_main_banner',
                'label' => esc_html__( 'Trending Section', 'maglist' )
            ),
            array(
                'id' => 'trending-title',
                'title' => esc_html__( 'Trending Section Title', 'maglist' ),
                'type' => 'text',
                'default' => esc_html__( 'Trending', 'maglist' ),
                'active_callback' => 'acb_main_banner',
            ),
            array(
                'id' => 'main-banner-trending-no-post',
                'label' => esc_html__( 'Number of posts to display', 'maglist' ),
                'active_callback' => 'acb_main_banner',
                'default' => 6,
                'type' => 'number',
            ),
            array(
                'id' => 'main-banner-trending-post-type',
                'title' => esc_html__( 'Filter Posts By', 'maglist' ),
                'active_callback' => 'acb_main_banner',
                'type' => 'buttonset',                
                'default' => 'latest',
                'choices' => array(
                    'latest' => esc_html__( 'Latest Posts', 'maglist' ),
                    'category' => esc_html__( 'From category', 'maglist' ),
                ),
            ),
            array(
                'id'    => 'main-banner-trending-post-cat',
                'title'  => esc_html__( 'Latest posts by category', 'maglist' ),
                'active_callback' => 'acb_main_banner_type',
                'default' => 1,                
                'type' => 'maglist-category-dropdown',
            ),
        ),
    ));
}

add_action( 'init', 'maglist_main_banner_options' );
