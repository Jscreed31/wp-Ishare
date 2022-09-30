<?php
/**
 * Widget FUnctions.
 *
 * @package Motu
 */
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function motu_widgets_init(){

    $motu_default = motu_get_default_theme_options();
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'motu'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'motu'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    $twp_motu_home_sections_1 = get_theme_mod('twp_motu_home_sections_1', json_encode($motu_default['twp_motu_home_sections_1']));
    $twp_motu_home_sections_1 = json_decode($twp_motu_home_sections_1);

    foreach( $twp_motu_home_sections_1 as $motu_home_section ){

        $home_section_type = isset( $motu_home_section->home_section_type ) ? $motu_home_section->home_section_type : '';

        switch( $home_section_type ){

            case 'home-widget-area':

                $ed_home_widget_area = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';

                if( $ed_home_widget_area == 'yes' ){

                    register_sidebar(array(
                        'name' => esc_html__('Front Page 3 Column - Col 1', 'motu'),
                        'id' => 'front-page-3-column-col-1',
                        'description' => esc_html__('Add widgets here.', 'motu'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="widget-title"><span>',
                        'after_title' => '</span></h2>',
                    ));

                    register_sidebar(array(
                        'name' => esc_html__('Front Page 3 Column - Col 2', 'motu'),
                        'id' => 'front-page-3-column-col-2',
                        'description' => esc_html__('Add widgets here.', 'motu'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="widget-title"><span>',
                        'after_title' => '</span></h2>',
                    ));

                    register_sidebar(array(
                        'name' => esc_html__('Front Page 3 Column - Col 3', 'motu'),
                        'id' => 'front-page-3-column-col-3',
                        'description' => esc_html__('Add widgets here.', 'motu'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="widget-title"><span>',
                        'after_title' => '</span></h2>',
                    ));


                    register_sidebar(array(
                        'name' => esc_html__('Front Page 2 Column - Col 1', 'motu'),
                        'id' => 'front-page-2-column-col-1',
                        'description' => esc_html__('Add widgets here.', 'motu'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="widget-title"><span>',
                        'after_title' => '</span></h2>',
                    ));

                    register_sidebar(array(
                        'name' => esc_html__('Front Page 2 Column - Col 2', 'motu'),
                        'id' => 'front-page-2-column-col-2',
                        'description' => esc_html__('Add widgets here.', 'motu'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="widget-title"><span>',
                        'after_title' => '</span></h2>',
                    ));

                }

                break;

            default:

                break;

        }

    }

    $motu_default = motu_get_default_theme_options();
    $footer_column_layout = absint(get_theme_mod('footer_column_layout', $motu_default['footer_column_layout']));

    for( $i = 0; $i < $footer_column_layout; $i++ ){

        if ($i == 0) {
            $count = esc_html__('One', 'motu');
        }
        if ($i == 1) {
            $count = esc_html__('Two', 'motu');
        }
        if ($i == 2) {
            $count = esc_html__('Three', 'motu');
        }
        if ($i == 3) {
            $count = esc_html__('Four', 'motu');
        }

        register_sidebar(array(
            'name' => esc_html__('Footer Widget ', 'motu') . $count,
            'id' => 'motu-footer-widget-' . $i,
            'description' => esc_html__('Add widgets here.', 'motu'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ));

    }

}

add_action('widgets_init', 'motu_widgets_init');
require get_template_directory() . '/inc/widgets/widget-base.php';
require get_template_directory() . '/inc/widgets/author.php';
require get_template_directory() . '/inc/widgets/widget-style-1.php';
require get_template_directory() . '/inc/widgets/widget-style-2.php';
require get_template_directory() . '/inc/widgets/social-link.php';
require get_template_directory() . '/inc/widgets/featured-category-widget.php';