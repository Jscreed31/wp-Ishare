<?php
/**
 * Register typography Options
 *
 * @return void
 * @since 1.0
 *
 * @package Maglist WordPress theme
 */
function maglist_typography_options() {
    $message = esc_html__( 'The value is in px.', 'maglist' );
    Maglist_Customizer::set(array(
        # Theme option
        'panel' => array(
            'id'       => 'panel',
            'title'    => esc_html__( 'Maglist Options', 'maglist' ),
            'priority' => 1,
        ),
        # Theme Option > Header
        'section' => array(
            'id'    => 'typography',
            'title' => esc_html__( 'Typography', 'maglist' ),
            'priority' => 60 
        ),
        # Theme Option > Header > settings
        'fields' => array(
            array(
                'id'          => 'site-info-font',
                'label'       => esc_html__( 'Site Identity Font Family', 'maglist' ),
                'description' => esc_html__( 'Font family for site title and tagline. Defaults to Poppins', 'maglist' ),
                'default'     => 'font-4',
                'type'        => 'select',
                'choices'     => Maglist_Theme::get_font_family(),
            ),
            array(
                'id'      => 'body-font',
                'label'   =>  esc_html__( 'Body Font Family.', 'maglist' ),
                'description' => esc_html__( 'Defaults to Poppins.', 'maglist' ),
                'default' => 'font-4',
                'type'    => 'select',
                'choices' => Maglist_Theme::get_font_family(),
            ),
            array(
                'id'          => 'heading-font',
                'label'       =>  esc_html__( 'Headings Font Family.', 'maglist' ),
                'description' =>  esc_html__( 'h1 to h6. Defaults to Poppins.', 'maglist' ),
                'default'     => 'font-4',
                'type'        => 'select',
                'choices'     => Maglist_Theme::get_font_family(),
            ),
            array(
                'id'          => 'body-font-size',
                'label'       => esc_html__( 'Body Font Size.', 'maglist' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 16,
                    'tablet'  => 16,
                    'mobile'  => 16,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'post-title-size',
                'label'       => esc_html__( 'Post Title Font Size', 'maglist' ),
                'description' => $message . ' ' . esc_html__( 'Defaults to 21px.', 'maglist' ),
                'default' => array(
                    'desktop' => 24,
                    'tablet'  => 24,
                    'mobile'  => 24,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 60,
                    'step'  => 1,
                ),
                'type' => 'slider',
            ),
            array(
                'id'          => 'primary-menu-font-size',
                'label'       => esc_html__( 'Primary Menu Font Size', 'maglist' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 15px.', 'maglist' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 16,
                    'tablet'  => 16,
                    'mobile'  => 16,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'widget-title-font-size',
                'label'       => esc_html__( 'Widget Title Font Size', 'maglist' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 18px.', 'maglist' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 18,
                    'tablet'  => 18,
                    'mobile'  => 18,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 60,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'widget-content-font-size',
                'label'       => esc_html__( 'Widget Content Font Size', 'maglist' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 16px.', 'maglist' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 16,
                    'tablet'  => 16,
                    'mobile'  => 16,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
        )
    ));
}
add_action( 'init', 'maglist_typography_options' );
