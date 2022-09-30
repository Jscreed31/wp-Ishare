<?php
/**
* Sections Repeater Options.
*
* @package Motu
*/

$motu_post_category_list = motu_post_category_list();
$motu_defaults = motu_get_default_theme_options();
$home_sections = array(
        
        'main-banner' => esc_html__('Slider With Tile Block','motu'),
        'banner-video-block' => esc_html__('Banner with Video Block','motu'),
        'banner-blocks-1' => esc_html__('Slider & Tab Block','motu'),
        'latest-posts-blocks' => esc_html__('Latest Posts Block','motu'),
        'tiles-blocks' => esc_html__('Tiles Block','motu'),
        'advertise-blocks' => esc_html__('Advertise Block','motu'),
        'home-widget-area' => esc_html__('Widgets Area Block','motu'),
        'you-may-like-blocks' => esc_html__('You May Like Block','motu'),

    );

// Slider Section.
$wp_customize->add_section( 'home_sections_repeater',
	array(
	'title'      => esc_html__( 'Homepage Sections', 'motu' ),
	'priority'   => 150,
	'capability' => 'edit_theme_options',
	)
);


// Recommended Posts Enable Disable.
$wp_customize->add_setting( 'twp_motu_home_sections_1', array(
    'sanitize_callback' => 'motu_sanitize_repeater',
    'default' => json_encode( $motu_defaults['twp_motu_home_sections_1'] ),
    // 'transport'           => 'postMessage',
));

$wp_customize->add_control(  new Motu_Repeater_Controler( $wp_customize, 'twp_motu_home_sections_1', 
    array(
        'section' => 'home_sections_repeater',
        'settings' => 'twp_motu_home_sections_1',
        'motu_box_label' => esc_html__('New Section','motu'),
        'motu_box_add_control' => esc_html__('Add New Section','motu'),
        'motu_box_add_button' => false,
    ),
        array(
            'section_ed' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Section', 'motu' ),
                'class'       => 'home-section-ed'
            ),
            'home_section_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Section Type', 'motu' ),
                'options'     => $home_sections,
                'class'       => 'home-section-type'
            ),

            'home_section_column_3' => array(
                 'type'        => 'seperator',
                 'seperator_text'       => esc_html__( 'Video Slider Section', 'motu' ),
                 'class'       => 'home-repeater-fields-hs banner-video-block-fields'
             ),
            'home_section_video_title' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-video-block-fields'
            ),
            'section_video_post_cat' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Select Post Category', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-video-block-fields'
            ),
            'home_section_column_4' => array(
                 'type'        => 'seperator',
                 'seperator_text'       => esc_html__( 'Slider with List Section', 'motu' ),
                 'class'       => 'home-repeater-fields-hs banner-video-block-fields'
             ),
            'home_section_video_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-video-block-fields'
            ),
            'section_video_post_cat_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Select Post Category', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-video-block-fields'
            ),
            'home_section_title' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title', 'motu' ),
                'class'       => 'home-repeater-fields-hs tiles-blocks-fields you-may-like-blocks-fields'
            ),
            'section_slide_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Post Category', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs'
            ),
            'section_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs tiles-blocks-fields you-may-like-blocks-fields'
            ),
             'tiles_post_per_page' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Posts Per Page', 'motu' ),
                'options'     => array( 
                    '5' => 5,
                    '10' => 10,
                ),
                'class'       => 'home-repeater-fields-hs tiles-blocks-fields'
            ),
              'home_section_column_2' => array(
                   'type'        => 'seperator',
                   'seperator_text'       => esc_html__( 'Slider Section', 'motu' ),
                   'class'       => 'home-repeater-fields-hs main-banner-fields'
               ),
             'home_section_title_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Slider Area Title', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'section_post_slide_cat' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Post Category', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'ed_arrows_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Arrows', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'ed_dots_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Dot', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields main-banner-fields'
            ),
            'home_section_column_1' => array(
                 'type'        => 'seperator',
                 'seperator_text'       => esc_html__( 'Grid Style', 'motu' ),
                 'class'       => 'home-repeater-fields-hs main-banner-fields'
             ),
             'section_post_cat_1' => array(
                 'type'        => 'select',
                 'label'       => esc_html__( 'Select Category', 'motu' ),
                 'options'     => $motu_post_category_list,
                 'class'       => 'home-repeater-fields-hs main-banner-fields'
             ),

            'advertise_image' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Advertise Image', 'motu' ),
                'description' => esc_html__( 'Recommended Image Size is 970x250 PX.', 'motu' ),
                'class'       => 'home-repeater-fields-hs advertise-blocks-fields'
            ),
            'advertise_link' => array(
                'type'        => 'link',
                'label'       => esc_html__( 'Advertise Image Link', 'motu' ),
                'class'       => 'home-repeater-fields-hs advertise-blocks-fields'
            ),
            'ed_autoplay_carousel' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Autoplay', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'home_section_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Tab Area Title', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'ed_tab' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Tab', 'motu' ),
                'class'       => 'home-repeater-fields-hs ed-tabs-ac banner-blocks-1-fields'
            ),
            'cat_title_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title One', 'motu' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category One', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'cat_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title Two', 'motu' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Two', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'cat_title_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title Three', 'motu' ),
                'class'       => 'home-repeater-fields-hs '
            ),
            'section_category_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Three', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'section_category_4' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category Four', 'motu' ),
                'options'     => $motu_post_category_list,
                'class'       => 'home-repeater-fields-hs banner-block-1-tab-ac banner-blocks-1-fields'
            ),
            'ed_flip_column' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Flip Column Right to Left', 'motu' ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields'
            ),
            'background_color' => array(
                'type'        => 'colorpicker',
                'label'       => esc_html__( 'Background Color', 'motu' ),
                'class'       => 'home-repeater-fields-hs main-banner-fields banner-blocks-1-fields latest-posts-blocks-fields tiles-blocks-fields advertise-blocks-fields you-may-like-blocks-fields banner-video-block-fields'
            ),
            'section_text_color' => array(
                'type'        => 'colorpicker',
                'label'       => esc_html__( 'Text Color', 'motu' ),
                'class'       => 'home-repeater-fields-hs main-banner-fields banner-blocks-1-fields latest-posts-blocks-fields tiles-blocks-fields advertise-blocks-fields you-may-like-blocks-fields banner-video-block-fields'
            ),
            'bg_image_size' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Background Image Size', 'motu' ),
                'options'     => array( 
                    'auto' => esc_html('Original','motu'),
                    'contain' => esc_html('Fit to Screen','motu'),
                    'cover' => esc_html('Fill Screen','motu'),
                ),
                'class'       => 'home-repeater-fields-hs banner-blocks-1-fields tiles-blocks-fields you-may-like-blocks-fields'
            ),
    )
));

// Info.
$wp_customize->add_setting(
    'motu_notiece_info',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Motu_Info_Notiece_Control( 
        $wp_customize,
        'motu_notiece_info',
        array(
            'settings' => 'motu_notiece_info',
            'section'       => 'home_sections_repeater',
            'label'         => esc_html__( 'Info', 'motu' ),
        )
    )
);

$wp_customize->add_setting(
    'motu_premium_notiece',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Motu_Premium_Notiece_Control( 
        $wp_customize,
        'motu_premium_notiece',
        array(
            'label'      => esc_html__( 'Home Page Blocks', 'motu' ),
            'settings' => 'motu_premium_notiece',
            'section'       => 'home_sections_repeater',
        )
    )
);