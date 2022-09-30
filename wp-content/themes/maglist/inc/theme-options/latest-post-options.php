<?php 
if( !function_exists( 'maglist_acb_top_stories' ) ):
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
	function maglist_acb_top_stories( $control ) {
		$value = $control->manager->get_setting( Maglist_Helper::with_prefix( 'latest-post-status' ) )->value();
		return $value;
	}
endif;

if( !function_exists( 'maglist_acb_top_stories_type' ) ):
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
	function maglist_acb_top_stories_type( $control ) {
		$top_story = $control->manager->get_setting( Maglist_Helper::with_prefix( 'latest-post-status' ) )->value();
		$type = $control->manager->get_setting( Maglist_Helper::with_prefix( 'latest-post-type' ) )->value();
		return $top_story && 'category' == $type;
	}
endif;
function maglist_latest_post() {
    Maglist_Customizer::set(array(
        //Add theme options to panel
        'panel' => 'panel', 
        //Add section 
        'section' => array(
            'id' => 'latest-post',
            'title' => esc_html__( 'Breaking News Options', 'maglist' ),
            'priority' => 20,
        ),
        'fields' => array(
            array(
                'id' => 'latest-post-status',
                'label' => esc_html__( 'Enable', 'maglist' ),
                'default' => true,
                'type' => 'toggle',
            ),
            array(
                'id'        => 'latest-post-title',
                'label'     => esc_html__( 'Add title', 'maglist' ),
                'default' => esc_html__( 'Breaking News', 'maglist' ),
                'active_callback' => 'acb_top_stories',
                'type' => 'text',
            ),
            array(
                'id' => 'latest-post-excerpt-length',
                'label' => esc_html__( 'Description Length', 'maglist' ),
                'default' => 7,
                'active_callback' => 'acb_top_stories',
                'type' => 'number',
            ),
            array(
                'id' => 'latest-no-post',
                'label' => esc_html__( 'Number of posts to display', 'maglist' ),
                'active_callback' => 'acb_top_stories',
                'default' => 5,
                'type' => 'number',
            ),
            array(
                'id' => 'latest-post-type',
                'title' => esc_html__( 'Latest Posts Type', 'maglist' ),
                'active_callback' => 'acb_top_stories',
                'type' => 'buttonset',                
                'default' => 'latest',
                'choices' => array(
                    'latest' => esc_html__( 'Latest Posts', 'maglist' ),
                    'category' => esc_html__( 'From category', 'maglist' ),
                ),
            ),
            array(
                'id'    => 'latest-post-cat',
                'title'  => esc_html__( 'Latest posts by category', 'maglist' ),
                'active_callback' => 'acb_top_stories_type',
                'default' => 1,                
                'type' => 'maglist-category-dropdown',
            ),
        ),
    ));
}

add_action( 'init', 'maglist_latest_post' );
