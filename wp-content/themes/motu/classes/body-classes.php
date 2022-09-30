<?php
/**
* Body Classes.
*
* @package Motu
*/
 
 if (!function_exists('motu_body_classes')) :

    function motu_body_classes($classes) {

        $motu_default = motu_get_default_theme_options();
        global $post;

        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        } else{
            $classes[] = 'has-sidebar';

        }
        
        if ( is_active_sidebar( 'sidebar-1' ) ) {

            $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$motu_default['global_sidebar_layout'] ) );

            if( is_single() || is_page() ){

                $motu_post_sidebar = esc_html( get_post_meta( $post->ID, 'motu_post_sidebar_option', true ) );

                if( $motu_post_sidebar == 'global-sidebar' || empty( $motu_post_sidebar ) ){

                    if( class_exists('WooCommerce') && ( is_cart() || is_checkout() ) ){
                        
                        $classes[] = 'no-sidebar';

                    }else{

                        $classes[] = esc_attr( $global_sidebar_layout );

                    }

                }else{

                    if( class_exists('WooCommerce') && ( is_cart() || is_checkout() ) ){
                        
                        $classes[] = 'no-sidebar';

                    }else{

                        $classes[] = esc_attr( $motu_post_sidebar );

                    }
                }
                
            }elseif( is_404() ){

                $classes[] = 'no-sidebar';

            }else{
                
                $classes[] = esc_attr( $global_sidebar_layout );
            }

        }

        if( is_page() ){

            $motu_header_trending_page = get_theme_mod( 'motu_header_trending_page' );
            $motu_header_popular_page = get_theme_mod( 'motu_header_popular_page' );

            if( $motu_header_trending_page == $post->ID || $motu_header_popular_page == $post->ID ){

                $motu_archive_layout = get_theme_mod( 'motu_archive_layout',$motu_default['motu_archive_layout'] );
                $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$motu_default['ed_image_content_inverse'] );
                if( $motu_archive_layout == 'default' && $ed_image_content_inverse ){

                    $classes[] = 'twp-archive-alternative';

                }

                $classes[] = 'twp-archive-'.esc_attr( $motu_archive_layout );
                
            }

        }

        if( is_singular('post') ){

            $motu_post_layout = esc_html( get_post_meta( $post->ID, 'motu_post_layout', true ) );

            if( $motu_post_layout == '' || $motu_post_layout == 'global-layout' ){
                
                $motu_post_layout = get_theme_mod( 'motu_single_post_layout',$motu_default['motu_archive_layout'] );

            }

            $classes[] = 'twp-single-'.esc_attr( $motu_post_layout );

            if( $motu_post_layout == 'layout-2' ){
                
                $motu_header_overlay = esc_html( get_post_meta( $post->ID, 'motu_header_overlay', true ) );

                if( $motu_header_overlay == '' || $motu_header_overlay == 'global-layout' ){

                    $motu_post_layout2 = get_theme_mod( 'motu_single_post_layout',$motu_default['motu_archive_layout'] );

                    if( $motu_post_layout2 == 'layout-2' ){

                        $ed_header_overlay = esc_html( get_post_meta( $post->ID, 'ed_header_overlay', true ) );
                        if( $ed_header_overlay == '' || $ed_header_overlay == 'global-layout' ){
                            
                            $ed_header_overlay = get_theme_mod( 'ed_header_overlay',$motu_default['ed_header_overlay'] );
                        }

                    }else{

                        $ed_header_overlay = false;

                    }

                }else{

                    $ed_header_overlay = true;

                }
                if( $ed_header_overlay ){

                    $classes[] = 'twp-single-header-overlay';

                }

            }

        }

        if( is_singular('page') ){

            $motu_page_layout = get_post_meta( $post->ID, 'motu_page_layout', true );

            if( $motu_page_layout == ''  ){
                
                $motu_page_layout = 'layout-1';

            }

            $classes[] = 'theme-single-'.esc_attr( $motu_page_layout );

            if( $motu_page_layout == 'layout-2' ){
                
                $motu_ed_header_overlay = get_post_meta( $post->ID, 'motu_ed_header_overlay', true );
                if( $motu_ed_header_overlay ){
                    $classes[] = 'theme-single-header-overlay';
                }

            }

        }

        if( is_archive() || is_home() || is_search() ){

            $motu_archive_layout = get_theme_mod( 'motu_archive_layout',$motu_default['motu_archive_layout'] );
            $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$motu_default['ed_image_content_inverse'] );
            if( $motu_archive_layout == 'default' && $ed_image_content_inverse ){

                $classes[] = 'twp-archive-alternative';

            }

            $classes[] = 'twp-archive-'.esc_attr( $motu_archive_layout );
            
        }

        if( is_singular('post') ){

            $motu_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'motu_ed_post_reaction', true ) );
            if( $motu_ed_post_reaction ){
                $classes[] = 'hide-comment-rating';
            }

        }

        return $classes;
    }

endif;

add_filter('body_class', 'motu_body_classes');