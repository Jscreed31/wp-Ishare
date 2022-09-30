<?php
/**
 * Create options for posts.
 *
 * @since 1.0
 *
 * @package Maglist WordPress theme
 */

function maglist_post_options() {
    Maglist_Customizer::set(array(
        # Theme Options
        'panel' => 'panel',
        # Theme Options > Page Options > Settings
        'section' => array(
            'id' => 'post-options',
            'title' => esc_html__( 'Post Options', 'maglist' ),
            'priority' => 90
        ),
        'fields' => array(
            array(
                'id' => 'post-category',
                'label'   =>  esc_html__( 'Show Categories', 'maglist' ),
                'default' => 1,
                'type' => 'toggle',
            ),
            array(
                'id' => 'post-date',
                'label'  => esc_html__( 'Show Date', 'maglist' ),
                'default' => 1,
                'type' => 'toggle',
            ),
            array(
                'id' => 'post-author',
                'label' =>  esc_html__( 'Show Author', 'maglist' ),
                'default' => 1,
                'type' => 'toggle',
            ),
            array(
                'id' => 'post-comment',
                'label' =>  esc_html__( 'Show Comment', 'maglist' ),
                'default' => 1,
                'type' => 'toggle',
            ),
            array(
                'id' => 'content-placeholder-position',
                'label' => esc_html__( 'Alternative Image And Content', 'maglist' ),
                'type' => 'toggle',
                'default' => true
            ),
            array(
                'id' => 'social-sharing',
                'label' =>  esc_html__( 'Social Media Sharing On Single Post', 'maglist' ),
                'default' => true,
                'type' => 'toggle',
            ),
            array(
                'id' => 'excerpt_length',
                'label' => esc_html__( 'Excerpt Length', 'maglist' ),
                'default' => 16,
                'type' => 'number',
            ),
            array(
                'id' => 'read-more-text',
                'label' => esc_html__( 'Read More Text', 'maglist' ),
                'default' => esc_html__( 'Know More', 'maglist' ),
                'type' => 'text'
            ),
            array(
                'id' => 'post-per-row',
                'label' => esc_html__( 'Post Per Row', 'maglist' ),
                'type' => 'buttonset',
                'default' => '1',
                'choices' => array(
                    '1' => esc_html__( '1', 'maglist' ),
                    '2' => esc_html__( '2', 'maglist' ),
                    '3' => esc_html__( '3', 'maglist' ),
                    '4' => esc_html__( '4', 'maglist' )
                )
            ),
            array(
                'id' => 'pagination-pagination',
                'label' => esc_html__( 'Padding on Pagination', 'maglist' ),
                'type' => 'dimensions',
                'default' => array(
                    'desktop' => array(
                        'top'    => 10,
                        'right'  => 20,
                        'bottom' => 10,
                        'left'   => 20,
                    ),
                    'tablet' => array(
                        'top'    => 10,
                        'right'  => 20,
                        'bottom' => 10,
                        'left'   => 20,
                    ),
                    'mobile' => array(
                        'top'    => 8,
                        'right'  => 15,
                        'bottom' => 8,
                        'left'   => 15,
                    )
                ),
                'dimension' => array(
                    'top',
                    'right',
                    'bottom',
                    'left'
                ),
            ),
            array(
                'id'    => 'meta-sections-order',
                'label' => esc_html__('Archive Meta Order', 'maglist'),
                'description' => esc_html__('Please make sure that you have enabled all sections under "Post Options"', 'maglist'),
                'type'  => 'maglist-section-order',
                'default' => json_encode(array(
                    'meta', 'title', 'category', 'excerpt',
                )),
                'choices' => array(
                    'title' => esc_html__('Title', 'maglist'),
                    'meta' => esc_html__('Meta', 'maglist'),
                    'category' => esc_html('Category', 'maglist'),
                    'excerpt' => esc_html__('Excerpt', 'maglist'),
                ),
                'transport'   => 'refresh'
            ),
        ),
    ));
}

add_action( 'init', 'maglist_post_options' );
