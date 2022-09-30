<?php
/**
 *
 * Front Page
 *
 * @package Motu
 */

get_header();


    $motu_default = motu_get_default_theme_options();
    $sidebar = esc_attr( get_theme_mod( 'global_sidebar_layout', $motu_default['global_sidebar_layout'] ) );
    

    if( is_single() || is_page() ){

        $motu_post_sidebar = esc_attr( get_post_meta( $post->ID, 'motu_post_sidebar_option', true ) );
        if( $motu_post_sidebar == 'global-sidebar' || empty( $motu_post_sidebar ) ){

            $sidebar = $sidebar;
        }else{
            $sidebar = $motu_post_sidebar;
        }

    }
    $twp_motu_home_sections_1 = get_theme_mod( 'twp_motu_home_sections_1', json_encode( $motu_default['twp_motu_home_sections_1'] ) );
    $repeat_times = 1;
    $paged_active = false;

    if ( !is_paged() ) {
        $paged_active = true;
    }

    $twp_motu_home_sections_1 = json_decode( $twp_motu_home_sections_1 );

    if( $twp_motu_home_sections_1 ){ ?>

        <?php
        foreach ( $twp_motu_home_sections_1 as $motu_home_section ) {

            $home_section_type = isset( $motu_home_section->home_section_type ) ? $motu_home_section->home_section_type : '';

            switch ($home_section_type) {

                case 'banner-video-block':

                    $ed_slider_blocks = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_slider_blocks == 'yes' && $paged_active ) {
                        motu_banner_video_block( $motu_home_section , $repeat_times);
                    }

                break;

                case 'main-banner':

                    $ed_slider_blocks = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_slider_blocks == 'yes' && $paged_active ) {
                        motu_main_banner( $motu_home_section , $repeat_times);
                    }

                break;

                case 'latest-posts-blocks':

                    $ed_latest_posts_blocks = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_latest_posts_blocks == 'yes' ) {
                        motu_latest_blocks( $motu_home_section  , $repeat_times);
                    }

                break;

                case 'tiles-blocks':

                    $ed_tiles_block = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_tiles_block == 'yes' && $paged_active ) {
                        motu_tiles_block_section( $motu_home_section , $repeat_times);
                    }

                break;

                case 'banner-blocks-1':

                    $ed_banner_blocks_1 = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_banner_blocks_1 == 'yes' && $paged_active ) {
                        motu_banner_block_1_section( $motu_home_section , $repeat_times);
                    }

                break;

                case 'advertise-blocks':

                    $ed_advertise_blocks = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_advertise_blocks == 'yes' && $paged_active ) {
                        motu_advertise_block( $motu_home_section , $repeat_times);
                    }
                    
                break;

                case 'home-widget-area':

                    $ed_home_widget_area = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_home_widget_area == 'yes' && $paged_active ) {
                        motu_case_home_widget_area_block( $motu_home_section , $repeat_times);
                    }
                    
                break;

                case 'you-may-like-blocks':

                    $ed_you_may_like_area = isset( $motu_home_section->section_ed ) ? $motu_home_section->section_ed : '';
                    if ( $ed_you_may_like_area == 'yes' && $paged_active ) {
                        motu_you_may_like_block_section( $motu_home_section , $repeat_times);
                    }
                    
                break;

                default:

                break;

            }

        $repeat_times++;
        } 
        ?>

    <?php
    }

get_footer();
