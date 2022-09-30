<?php 

if( !function_exists( 'maglist_acb_enable_footer_featured')):
    /**
	* Active callback function of top stories post
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0
	*
	* @package Maglist WordPress Theme
	*/
    function maglist_acb_enable_footer_featured( $control ) {
        $value = $control->manager->get_setting( Maglist_Helper::with_prefix( 'enable-footer-featured-news' ) )->value();
		return $value;
    }
endif;

if( !function_exists( 'maglist_acb_enable_footer_featured_cat' ) ):
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
	function maglist_acb_enable_footer_featured_cat( $control ){
		$top_story = $control->manager->get_setting( Maglist_Helper::with_prefix( 'enable-footer-featured-news' ) )->value();
		$type = $control->manager->get_setting( Maglist_Helper::with_prefix( 'footer-featured-type' ) )->value();
		return $top_story && 'category' == $type;
	}
endif;

/**
* Blog page Footer Features options
*
* @return void
* @since 1.0
*
* @package Maglist WordPress Theme
*/

function maglist_footer_featured_options() {
    Maglist_Customizer::set(array(
		#Theme Option
        'panel'     => 'panel',
        # Theme Option > Footer Featured News Options
        'section' => array(
            'id'            => 'footer_featured_news',
            'title'         => esc_html__( 'Footer Featured News', 'maglist' ),
            'priority'   => 100,
        ),
        'fields' => array(
            array(
                'id'        => 'enable-footer-featured-news',
                'label'    => esc_html__( 'Enable', 'maglist' ),
                'default' => true,
                'type'      => 'toggle',
            ),
            array(
                'id'        => 'footer-featured-title',
                'label'     => esc_html__( 'Title', 'maglist' ),
                'default' => esc_html__( 'You Missed', 'maglist' ),
				'active_callback' =>  'acb_enable_footer_featured',
                'type'  => 'text',
                'partial' =>array(
                    'selector' => '.maglist-you-missed h2',
                ),
            ), 
			array(
				'id'	=> 'footer-featured-type',
				'label' => esc_html__( 'Featured News Type', 'maglist' ),
				'active_callback' => 'acb_enable_footer_featured',
				'type'    => 'buttonset',
				'default' => 'latest',
				'choices' => array(
                    'latest' 	=> esc_html__( 'Latest Posts', 'maglist' ),
                    'category'	=> esc_html__( 'From Category', 'maglist' ),
                ),
			),
			array(
				'id' => 'footer-featured-cat',
				'label' => esc_html__( 'Select Category', 'maglist' ),
				'default' => 1,
				'active_callback' => 'acb_enable_footer_featured_cat',
				'type' => 'maglist-category-dropdown',
            ),
        ),
    ));
}
add_action( 'init', 'maglist_footer_featured_options' );