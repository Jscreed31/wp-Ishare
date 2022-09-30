<?php
/**
 * Default Values.
 *
 * @package Motu
 */

if (!function_exists('motu_get_default_theme_options')) :

    /**
     * Get default theme options
     *
     * @return array Default theme options.
     * @since 1.0.0
     *
     */
    function motu_get_default_theme_options(){

        $motu_defaults = array();

        $motu_defaults['twp_motu_home_sections_1'] = array(
            array(
                'home_section_type' => 'banner-video-block',
                'section_ed' => 'yes',
                'home_section_video_title' => esc_html__('Live Now','motu'),
                'home_section_video_title_2' => esc_html__('Most Loved','motu'),
                'section_video_post_cat' => '',
                'section_video_post_cat_2' => '',
            ),

            array(
                'home_section_type' => 'main-banner',
                'section_ed' => 'yes',
                'home_section_title_1' => esc_html__('Column Title Two','motu'),
                'section_post_cat_1' => '',
                'ed_arrows_carousel' => 'yes',
                'ed_dots_carousel' => 'no',
                'section_category_3' => '',
            ),
            array(
                'home_section_type' => 'tiles-blocks',
                'section_ed' => 'no',
                'section_category' => '',
                'tiles_post_per_page' => 5,
            ),
            array(
                'home_section_type' => 'banner-blocks-1',
                'section_ed' => 'no',
                'section_category_1' => '',
                'section_category_2' => '',
                'ed_flip_column' => 'no',
                'ed_tab' => 'no',
                'ed_dots_carousel' => 'no',
                'ed_autoplay_carousel' => 'yes',
                'home_section_title_1' => esc_html__('Block Title One','motu'),
                'home_section_title_2' => esc_html__('Block Title Tab','motu'),
            ),
            array(
                'home_section_type' => 'latest-posts-blocks',
                'section_ed' => 'yes',
            ),
            array(
                'home_section_type' => 'advertise-blocks',
                'section_ed' => 'no',
                'advertise_image' => '',
                'advertise_link' => '',
            ),
            array(
                'home_section_type' => 'home-widget-area',
                'section_ed' => 'yes',
            ),
            array(
                'home_section_type' => 'you-may-like-blocks',
                'section_ed' => 'yes',
                'home_section_title' => '',
                'section_category' => '',
            ),
        );

        // header section
        $motu_defaults['logo_width_range']      = 200;

        // Options.
        $motu_defaults['global_sidebar_layout'] = 'right-sidebar';
        $motu_defaults['motu_archive_layout'] = 'default';
        $motu_defaults['motu_pagination_layout'] = 'numeric';
        $motu_defaults['footer_column_layout'] = 3;
        $motu_defaults['footer_copyright_text'] = esc_html__('All rights reserved.', 'motu');
        $motu_defaults['ed_header_trending_news'] = 1;
        $motu_defaults['ed_header_trending_posts_title'] = esc_html__('Trending News', 'motu');
        $motu_defaults['ed_header_ad'] = 0;
        $motu_defaults['ed_header_ticker_posts'] = 1;
        $motu_defaults['ed_ticker_bar_time'] = 1;
        $motu_defaults['ticker_date_format'] = 'F jS, Y';
        $motu_defaults['ed_header_ticker_posts_title'] = esc_html__('Breaking News', 'motu');
        $motu_defaults['ed_image_content_inverse'] = 0;
        $motu_defaults['ed_related_post'] = 1;
        $motu_defaults['related_post_title'] = esc_html__('More Stories', 'motu');
        $motu_defaults['twp_navigation_type'] = 'norma-navigation';
        $motu_defaults['motu_single_post_layout'] = 'layout-1';
        $motu_defaults['ed_post_thumbnail'] = 0;
        $motu_defaults['ed_post_date'] = 1;
        $motu_defaults['ed_post_category'] = 1;
        $motu_defaults['ed_header_overlay'] = 0;
        $motu_defaults['motu_header_bg_size'] = 1;
        $motu_defaults['ed_preloader'] = 0;
        $motu_defaults['ed_header_bg_fixed'] = 0;
        $motu_defaults['ed_header_bg_overlay'] = 1;
        $motu_defaults['post_date_format'] = 'default';
        $motu_defaults['ed_fullwidth_layout'] = 'default';
        $motu_defaults['ed_post_views'] = 0;
        $motu_defaults['ed_scroll_top_button'] = 1;

        $motu_defaults['ed_ticker_bar']                  = 1;
        $motu_defaults['ed_ticker_bar_date']             = 1;
        $motu_defaults['ed_tags_wide_layout']            = 1;
        $motu_defaults['ed_post_tags']                   = 1;
        $motu_defaults['ed_post_read_later']             = 1;

        // Pass through filter.
        $motu_defaults = apply_filters('motu_filter_default_theme_options', $motu_defaults);

        return $motu_defaults;

    }

endif;
