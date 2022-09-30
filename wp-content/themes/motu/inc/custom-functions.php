<?php
/**
 * Custom Functions.
 *
 * @package Motu
 */

if( !function_exists( 'motu_fonts_url' ) ) :

    //Google Fonts URL
    function motu_fonts_url(){

        $font_families = array(
            'Josefin+Sans:wght@100;200;300;400;500;600;700',
            'Playfair+Display:wght@400;500;600;700;800;900',
        );

        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($fonts_url);
    }

endif;

if( !function_exists( 'motu_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function motu_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'motu_page_lists' ) ) :

    // Page List.
    function motu_page_lists(){

        $page_lists = array();
        $page_lists[''] = esc_html__( '-- Select Page --','motu' );
        $pages = get_pages(
            array (
                'parent'  => 0, // replaces 'depth' => 1,
            )
        );
        foreach( $pages as $page ){

            $page_lists[$page->ID] = $page->post_title;

        }
        return $page_lists;
    }

endif;

if( !function_exists( 'motu_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function motu_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

if( !function_exists( 'motu_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function motu_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

/**
 * Motu SVG Icon helper functions
 *
 * @package Motu
 * @since 1.0.0
 */
if ( ! function_exists( 'motu_theme_svg' ) ):
    /**
     * Output and Get Theme SVG.
     * Output and get the SVG markup for an icon in the Motu_SVG_Icons class.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function motu_theme_svg( $svg_name, $return = false ) {

        if( $return ){

            return motu_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in motu_get_theme_svg();.

        }else{

            echo motu_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in motu_get_theme_svg();.
            
        }
    }

endif;

if ( ! function_exists( 'motu_get_theme_svg' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function motu_get_theme_svg( $svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Motu_SVG_Icons::get_svg( $svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );
        if ( ! $svg ) {
            return false;
        }
        return $svg;

    }

endif;

if ( ! function_exists( 'motu_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function motu_svg_escape( $input ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $svg ) {
            return false;
        }

        return $svg;

    }

endif;


if( ! function_exists( 'motu_iframe_escape' ) ):
    
    /** Escape Iframe **/
    function motu_iframe_escape( $input ){

        $all_tags = array(
            'iframe'=>array(
                'width'=>array(),
                'height'=>array(),
                'src'=>array(),
                'frameborder'=>array(),
                'allow'=>array(),
                'allowfullscreen'=>array(),
            ),
            'video'=>array(
                'width'=>array(),
                'height'=>array(),
                'src'=>array(),
                'style'=>array(),
                'controls'=>array(),
            )
        );

        return wp_kses($input,$all_tags);
        
    }

endif;

if( !function_exists('motu_post_format_icon') ):

    // Post Format Icon.
    function motu_post_format_icon( $format ){

        if( $format == 'video' ){
            $icon = motu_get_theme_svg( 'video' );
        }elseif( $format == 'audio' ){
            $icon = motu_get_theme_svg( 'audio' );
        }elseif( $format == 'gallery' ){
            $icon = motu_get_theme_svg( 'gallery' );
        }elseif( $format == 'quote' ){
            $icon = motu_get_theme_svg( 'quote' );
        }elseif( $format == 'image' ){
            $icon = motu_get_theme_svg( 'image' );
        }else{
            $icon = '';
        }

        return $icon;
    }

endif;

if( !function_exists( 'motu_social_menu_icon' ) ) :

    function motu_social_menu_icon( $item_output, $item, $depth, $args ) {

        // Add Icon
        if ( isset( $args->theme_location ) && 'motu-social-menu' === $args->theme_location ) {

            $svg = Motu_SVG_Icons::get_theme_svg_name( $item->url );

            if ( empty( $svg ) ) {
                $svg = motu_theme_svg( 'link',$return = true );
            }

            $item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
        }

        return $item_output;
    }
    
endif;

add_filter( 'walker_nav_menu_start_el', 'motu_social_menu_icon', 10, 4 );

if ( ! function_exists( 'motu_sub_menu_toggle_button' ) ) :

    function motu_sub_menu_toggle_button( $args, $item, $depth ) {
        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'motu-primary-menu' && isset( $args->show_toggles ) ) {
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';
            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {
                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';
                // Add the sub menu toggle
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'motu' ) . '</span>' . motu_get_theme_svg( 'chevron-down' ) . '</span></button>';
            }
            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)
        } elseif ( $args->theme_location == 'motu-primary-menu' ) {
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {
                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = motu_get_theme_svg( 'chevron-down' ) . '</div>';
            } else {
                $args->before = '';
                $args->after  = '';
            }
        }
        return $args;

    }

    add_filter( 'nav_menu_item_args', 'motu_sub_menu_toggle_button', 10, 3 );

endif;


if( !function_exists( 'motu_post_category_list' ) ) :

    // Post Category List.
    function motu_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( 'Select Category','motu' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists('motu_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function motu_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists('motu_disable_post_views') ):

    /** Disable Post Views **/
    function motu_disable_post_views() {

        add_filter('booster_extension_filter_views_ed', 'motu_disable_views_ed');

    }

endif;

if( !function_exists('motu_disable_views_ed') ):

    /** Disable Reaction **/
    function motu_disable_views_ed() {

        return false;

    }

endif;

if( !function_exists('motu_disable_post_read_time') ):

    /** Disable Read Time **/
    function motu_disable_post_read_time() {

        add_filter('booster_extension_filter_readtime_ed', 'motu_disable_read_time');

    }

endif;

if( !function_exists('motu_disable_read_time') ):

    /** Disable Reaction **/
    function motu_disable_read_time() {

        return false;

    }

endif;

if( !function_exists('motu_disable_post_like_dislike') ):

    /** Disable Like Dislike **/
    function motu_disable_post_like_dislike() {

        add_filter('booster_extension_filter_like_ed', 'motu_disable_like_ed');

    }

endif;

if( !function_exists('motu_disable_like_ed') ):

    /** Disable Reaction **/
    function motu_disable_like_ed() {

        return false;

    }

endif;

if( !function_exists('motu_disable_post_author_box') ):

    /** Disable Author Box **/
    function motu_disable_post_author_box() {

        add_filter('booster_extension_filter_ab_ed','motu_disable_ab_ed');

    }

endif;

if( !function_exists('motu_disable_ab_ed') ):

    /** Disable Reaction **/
    function motu_disable_ab_ed() {

        return false;

    }

endif;

add_filter('booster_extension_filter_ss_ed', 'motu_disable_social_share');

if( !function_exists('motu_disable_social_share') ):

    /** Disable Reaction **/
    function motu_disable_social_share() {

        return false;

    }

endif;

if( !function_exists('motu_disable_post_reaction') ):

    /** Disable Reaction **/
    function motu_disable_post_reaction() {

        add_filter('booster_extension_filter_reaction_ed', 'motu_disable_reaction_cb');

    }

endif;

if( !function_exists('motu_disable_reaction_cb') ):

    /** Disable Reaction **/
    function motu_disable_reaction_cb() {

        return false;

    }

endif;

if( !function_exists('motu_single_post_navigation') ):

    function motu_single_post_navigation(){

        $motu_default = motu_get_default_theme_options();
        $twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $motu_header_trending_page = get_theme_mod( 'motu_header_trending_page' );
        $motu_header_popular_page = get_theme_mod( 'motu_header_popular_page' );
        $motu_archive_layout = esc_attr( get_theme_mod( 'motu_archive_layout', $motu_default['motu_archive_layout'] ) );
        $current_id = '';
        $article_wrap_class = '';
        global $post;
        $current_id = $post->ID;
        if( $twp_navigation_type == '' || $twp_navigation_type == 'global-layout' ){
            $twp_navigation_type = get_theme_mod('twp_navigation_type', $motu_default['twp_navigation_type']);
        }

        if( $motu_header_trending_page != $current_id && $motu_header_popular_page != $current_id ){

            if( $twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

                if( $twp_navigation_type == 'norma-navigation' ){ ?>

                    <div class="navigation-wrapper">
                        <?php
                        // Previous/next post navigation.
                        the_post_navigation(array(
                            'prev_text' => '<span class="arrow" aria-hidden="true">' . motu_theme_svg('arrow-left',$return = true ) . '</span><span class="screen-reader-text">' . __('Previous post:', 'motu') . '</span><span class="post-title">%title</span>',
                            'next_text' => '<span class="arrow" aria-hidden="true">' . motu_theme_svg('arrow-right',$return = true ) . '</span><span class="screen-reader-text">' . __('Next post:', 'motu') . '</span><span class="post-title">%title</span>',
                        )); ?>
                    </div>
                    <?php

                }else{

                    $next_post = get_next_post();
                    if( isset( $next_post->ID ) ){

                        $next_post_id = $next_post->ID;
                        echo '<div loop-count="1" next-post="' . absint( $next_post_id ) . '" class="twp-single-infinity"></div>';

                    }
                }

            }

        }

    }

endif;

add_action( 'motu_navigation_action','motu_single_post_navigation',30 );


if( !function_exists('motu_header_banner') ):

    function motu_header_banner(){

        global $post;

        if( have_posts() ):

            while (have_posts()) :
                the_post();

                global $post;
                
            endwhile;

        endif;
        
        $motu_post_layout = '';
        $motu_default = motu_get_default_theme_options();

        if( is_singular() ){

            $motu_post_layout = esc_html( get_post_meta( $post->ID, 'motu_post_layout', true ) );
            if( $motu_post_layout == '' || $motu_post_layout == 'global-layout' ){
                
                $motu_post_layout = get_theme_mod( 'motu_single_post_layout',$motu_default['motu_archive_layout'] );
            }

        }

        if( isset( $post->ID ) ){

            $motu_page_layout = esc_html( get_post_meta( $post->ID, 'motu_page_layout', true ) );

        }

        if( $motu_post_layout == 'layout-2' && is_singular('post') ) {

            if ( have_posts() ) :

                while ( have_posts() ) :
                    the_post();

                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
                    $motu_ed_feature_image = esc_html( get_post_meta( get_the_ID(), 'motu_ed_feature_image', true ) );
                    ?>

                    <div class="single-featured-banner  <?php if( empty( $motu_ed_feature_image ) && isset( $featured_image[0] ) && $featured_image[0] ){ echo 'banner-has-image'; } ?>">

                        <div class="featured-banner-content">
                            <div class="wrapper">
                                <?php
                                if ( !is_404() && !is_home() && !is_front_page() ) {
                                    motu_breadcrumb();
                                } ?>

                                <div class="column-row">
                                    <div class="column column-12">
                                        <header class="entry-header">

                                            <div class="entry-meta">
                                                <?php
                                                motu_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false);
                                                ?>
                                            </div>

                                            <h1 class="entry-title entry-title-large">
                                                <?php the_title(); ?>
                                            </h1>
                                        </header>
                                        <div class="entry-meta">
                                            <?php
                                            motu_posted_by();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <?php if( empty( $motu_ed_feature_image ) && isset( $featured_image[0] ) && $featured_image[0] ){ ?>
                            <div class="featured-banner-media">
                                <div class="data-bg data-bg-fixed data-bg-banner" data-background="<?php echo esc_url( $featured_image[0] ); ?>"></div>
                            </div>
                        <?php } ?>

                    </div>

                <?php
                endwhile;

                wp_reset_postdata();

            endif;
               
        }

        if( is_singular('page') && $motu_page_layout == 'layout-2' ) {

            if ( have_posts() ) :

                while ( have_posts() ) :

                    the_post();

                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
                    
                    $motu_ed_feature_image = esc_html( get_post_meta( get_the_ID(), 'motu_ed_feature_image', true ) );
                    ?>

                    <div class="single-featured-banner  <?php if( empty( $motu_ed_feature_image ) && isset( $featured_image[0] ) && $featured_image[0] ){ echo 'banner-has-image'; } ?>">

                        <div class="featured-banner-content">
                            <div class="wrapper">
                                <?php
                                if ( !is_404() && !is_home() && !is_front_page() ) {
                                    motu_breadcrumb();
                                } ?>

                                <div class="column-row">
                                    <div class="column column-12">
                                        <header class="entry-header">

                                            <h1 class="entry-title entry-title-large">
                                                <?php the_title(); ?>
                                            </h1>
                                        </header>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <?php if( empty( $motu_ed_feature_image ) && isset( $featured_image[0] ) && $featured_image[0] ){ ?>
                            <div class="featured-banner-media">
                                <div class="data-bg data-bg-fixed data-bg-banner" data-background="<?php echo esc_url( $featured_image[0] ); ?>"></div>
                            </div>
                        <?php } ?>

                    </div>

                <?php
                endwhile;

                wp_reset_postdata();

            endif;
               
        }

    }

endif;

if ( ! function_exists( 'motu_header_toggle_search' ) ):

    /**
     * Header Search
     **/
    function motu_header_toggle_search() { ?>

        <div class="header-searchbar">
            <div class="header-searchbar-inner">
                <div class="wrapper">
                    <div class="header-searchbar-panel">

                        <div class="header-searchbar-area">
                            <a class="skip-link-search-top" href="javascript:void(0)"></a>
                            <?php get_search_form(); ?>
                        </div>

                        <button type="button" id="search-closer" class="close-popup">
                            <?php motu_theme_svg('cross'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'motu_before_footer_content_action','motu_header_toggle_search',10 );

if( !function_exists('motu_extra_area_render') ):

    function motu_extra_area_render( $render = true ){

        ob_start(); ?>

                
        <?php
        $html = ob_get_contents();
        ob_get_clean();

        if( $render ){

            echo $html;

        }else{

            return $html;

        }

    }

endif;

if( !function_exists('motu_content_offcanvas') ):

    // Offcanvas Contents
    function motu_content_offcanvas(){

    $responsive_content = false;
    $motu_default = motu_get_default_theme_options();
    $ed_ticker_bar_date = get_theme_mod( 'ed_ticker_bar_date', $motu_default['ed_ticker_bar_date'] );

    if( ( has_nav_menu('motu-social-menu') || $ed_ticker_bar_date ) ){

        $responsive_content = true;

    }
     ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">

                <div class="close-offcanvas-menu">

                    <a class="skip-link-off-canvas" href="javascript:void(0)"></a>

                    <div class="offcanvas-close">

                        <button type="button" class="button-offcanvas-close">

                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'motu'); ?>
                            </span>

                            <span class="bars">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </span>

                        </button>

                    </div>
                </div>

                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper">
                        <ul class="primary-menu theme-menu">

                            <?php
                            if( has_nav_menu('motu-primary-menu') ){

                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'motu-primary-menu',
                                        'show_toggles' => true,
                                        'depth' => 3,
                                    )
                                );

                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Motu_Walker_Page(),
                                        'depth' => 3,
                                    )
                                );

                            } ?>

                        </ul>
                    </nav>
                </div>

                <?php if (has_nav_menu('motu-social-menu')) { ?>

                    <div id="social-nav-offcanvas" class="offcanvas-item offcanvas-social-navigation">

                        <?php
                        wp_nav_menu(
                                array(
                                'theme_location' => 'motu-social-menu',
                                'link_before' => '<span class="screen-reader-text">',
                                'link_after' => '</span>',
                                'container' => 'div',
                                'container_class' => 'motu-social-menu',
                                'depth' => 1,
                            )
                        ); ?>

                    </div>

                <?php }

                if( $responsive_content ){ ?>
                    <div class="responsive-content-menu">

                    </div>
                <?php } ?>

                <a class="skip-link-offcanvas screen-reader-text" href="javascript:void(0)"></a>
                
            </div>
        </div>

    <?php
    }

endif;

add_action( 'motu_before_footer_content_action','motu_content_offcanvas',30 );

if( !function_exists('motu_content_trending_news_render') ):

    function motu_content_trending_news_render(){

        $motu_header_trending_cat = get_theme_mod('motu_header_trending_cat');
        $trending_news_query = new WP_Query(
            array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'post__not_in' => get_option("sticky_posts"),
                'category_name' => $motu_header_trending_cat,
            )
        );

        if( $trending_news_query->have_posts() ): ?>

            <div class="trending-news-main-wrap">
               <div class="wrapper">
                    <div class="column-row">

                        <a href="javascript:void(0)" class="motu-skip-link-start"></a>

                        <div class="column column-12">
                            <button type="button" id="trending-collapse">
                                <?php motu_theme_svg('cross'); ?>
                            </button>
                        </div>

                        <?php
                        while( $trending_news_query->have_posts() ){
                            $trending_news_query->the_post();

                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
                            $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>
                            <div class="column column-4 column-sm-6 column-xs-12">

                                <article id="theme-post-<?php the_ID(); ?>" <?php post_class('news-article mb-20'); ?>>
                                    <div class="column-row column-row-small">

                                        <?php if( $featured_image ){ ?>

                                            <div class="column column-4">

                                                <div class="data-bg data-bg-thumbnail" data-background="<?php echo esc_url($featured_image); ?>">

                                                    <?php
                                                    $format = get_post_format(get_the_ID()) ?: 'standard';
                                                    $icon = motu_post_format_icon($format);
                                                    if (!empty($icon)) { ?>
                                                        <span class="top-right-icon"><?php echo motu_svg_escape($icon); ?></span>
                                                    <?php } ?>
                                                    <a class="img-link" href="<?php the_permalink(); ?>" tabindex="0"></a>
                                        
                                                </div>


                                            </div>

                                        <?php } ?>

                                        <div class="column column-<?php if ($featured_image) { ?>8<?php } else { ?>12<?php } ?>">
                                            <div class="article-content">

                                                <h3 class="entry-title entry-title-small">
                                                    <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                </h3>

                                                <div class="entry-meta">
                                                    <?php motu_posted_on( $icon = true ); ?>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </div>
                            <?php

                        } ?>

                        <a href="javascript:void(0)" class="motu-skip-link-end"></a>

                    </div>
               </div>
            </div>

            <?php
            wp_reset_postdata();

        endif;
    }

endif;

if( !function_exists('motu_footer_content_widget') ):

    function motu_footer_content_widget(){

        $motu_default = motu_get_default_theme_options();
        if (is_active_sidebar('motu-footer-widget-0') || 
            is_active_sidebar('motu-footer-widget-1') || 
            is_active_sidebar('motu-footer-widget-2')):
            $x = 1;
            $footer_sidebar = 0;
            do {
                if ($x == 4 && is_active_sidebar('motu-footer-widget-3')) {
                    $footer_sidebar++;
                }
                if ($x == 3 && is_active_sidebar('motu-footer-widget-2')) {
                    $footer_sidebar++;
                }
                if ($x == 2 && is_active_sidebar('motu-footer-widget-1')) {
                    $footer_sidebar++;
                }
                if ($x == 1 && is_active_sidebar('motu-footer-widget-0')) {
                    $footer_sidebar++;
                }
                $x++;
            } while ($x <= 4);
            if ($footer_sidebar == 1) {
                $footer_sidebar_class = 12;
            } elseif ($footer_sidebar == 2) {
                $footer_sidebar_class = 6;
            } elseif ($footer_sidebar == 3) {
                $footer_sidebar_class = 4;
            }else {
                $footer_sidebar_class = 3;
            }
            $footer_column_layout = absint(get_theme_mod('footer_column_layout', $motu_default['footer_column_layout'])); ?>

            <div class="footer-widgetarea">
                <div class="wrapper wrapper-big">
                    <div class="column-row">
                        <?php if (is_active_sidebar('motu-footer-widget-0')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?> column-sm-6 column-xs-12">
                                <?php dynamic_sidebar('motu-footer-widget-0'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('motu-footer-widget-1')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?> column-sm-6 column-xs-12">
                                <?php dynamic_sidebar('motu-footer-widget-1'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('motu-footer-widget-2')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?> column-sm-6 column-xs-12">
                                <?php dynamic_sidebar('motu-footer-widget-2'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('motu-footer-widget-3')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?> column-sm-6 column-xs-12">
                                <?php dynamic_sidebar('motu-footer-widget-3'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endif;

    }

endif;

add_action( 'motu_footer_content_action','motu_footer_content_widget',10 );

if( !function_exists('motu_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function motu_footer_content_info(){

        $motu_default = motu_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper wrapper-big">
                <div class="column-row">
                    <div class="column column-8 column-sm-12">
                        <div class="footer-copyright">
                            <?php
                            $footer_copyright_text = wp_kses_post( get_theme_mod( 'footer_copyright_text', $motu_default['footer_copyright_text'] ) );
                            echo esc_html__('Copyright ', 'motu') . '&copy ' . absint(date('Y')) . ' <a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" ><span>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '. </span></a> ' . esc_html( $footer_copyright_text );

                            echo '<br>';
                            echo esc_html__('Theme: ', 'motu') . 'Motu ' . esc_html__('By ', 'motu') . '<a href="' . esc_url('https://www.themeinwp.com/theme/motu') . '"  title="' . esc_attr__('Themeinwp', 'motu') . '" target="_blank" rel="author"><span>' . esc_html__('Themeinwp. ', 'motu') . '</span></a>';
                            echo esc_html__('Powered by ', 'motu') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'motu') . '" target="_blank"><span>' . esc_html__('WordPress.', 'motu') . '</span></a>';
                            
                            ?>
                        </div>
                    </div>


                    <?php
                    if (has_nav_menu('motu-social-menu')) { ?>
                        <div class="column column-4 column-sm-12">
                            <div class="footer-social-navigation">
                                <?php
                                wp_nav_menu(

                                    array(
                                        'theme_location' => 'motu-social-menu',
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                        'container' => 'div',
                                        'container_class' => 'motu-social-menu',
                                        'depth' => 1,
                                    )

                                ); ?>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <?php motu_footer_go_to_top(); ?>
        </div>

    <?php
    }

endif;

add_action( 'motu_footer_content_action','motu_footer_content_info',20 );


if( !function_exists('motu_footer_go_to_top') ):

    // Scroll to Top render content
    function motu_footer_go_to_top(){

        $motu_default = motu_get_default_theme_options();
        $ed_scroll_top_button = get_theme_mod( 'ed_scroll_top_button', $motu_default['ed_scroll_top_button'] );

        if( $ed_scroll_top_button ){
            
            ?>

            <div class="hide-no-js">
                <button type="button" class="scroll-up">
                    <?php motu_theme_svg('chevron-up'); ?>
                </button>
            </div>

            <?php

        }

    }

endif;


if( !function_exists( 'motu_post_view_count' ) ):

    function motu_post_view_count(){

        $motu_default = motu_get_default_theme_options();
        $ed_post_views = get_theme_mod( 'ed_post_views', $motu_default['ed_post_views'] );
        $twp_be_settings = get_option('twp_be_options_settings');
        $twp_be_enable_post_visit_tracking = isset( $twp_be_settings[ 'twp_be_enable_post_visit_tracking' ] ) ? esc_html( $twp_be_settings[ 'twp_be_enable_post_visit_tracking' ] ) : '';
        if( $twp_be_enable_post_visit_tracking && class_exists( 'Booster_Extension_Class' ) ): ?>

            <div class="entry-meta-item entry-meta-views">
                <span class="entry-meta-icon views-icon">
                    <?php motu_theme_svg('viewer'); ?>
                </span>
                <a href="<?php the_permalink(); ?>">
                    <span class="post-view-count">
                       <?php
                       echo do_shortcode('[booster-extension-visit-count count_only="count" label="'.esc_html__('Views','motu').'"]');
                       ?>
                    </span>
                 </a>
            </div>
        
        <?php
        endif;
    }
endif;

if( !function_exists( 'motu_post_like_dislike' ) ):

    function motu_post_like_dislike(){

        $motu_ed_post_like_dislike = esc_html( get_post_meta( get_the_ID(), 'motu_ed_post_like_dislike', true ) );
        if( class_exists( 'Booster_Extension_Class' ) && !$motu_ed_post_like_dislike ): ?>

            <div class="entry-meta-item entry-meta-like-dislike">
                <?php echo do_shortcode('[booster-extension-like-dislike]'); ?>
            </div>
        
        <?php
        endif;
    }
endif;


add_action('wp_ajax_motu_tab_posts_callback', 'motu_tab_posts_callback');
add_action('wp_ajax_nopriv_motu_tab_posts_callback', 'motu_tab_posts_callback');

if( !function_exists( 'motu_tab_posts_callback' ) ):
    // Masonry Post Ajax Call Function.

    function motu_tab_posts_callback() {

        if(  isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ '_wpnonce' ] ) ), 'motu_ajax_nonce' ) && isset( $_POST['category'] ) ){

            $category = sanitize_text_field( wp_unslash( $_POST['category'] ) );

            $tab_post_query = new WP_Query( 
                array( 
                    'post_type' => 'post',
                    'posts_per_page' => 7,
                    'post__not_in' => get_option("sticky_posts"),
                    'category_name' => esc_html( $category ),
                    'post_status' => 'publish'
                ) 
            );

            $tab_post_query_1 = new WP_Query( 
                array( 
                    'post_type' => 'post',
                    'posts_per_page' => 7,
                    'post__not_in' => get_option("sticky_posts"),
                    'category_name' => esc_html( $category ),
                    'post_status' => 'publish'
                ) 
            );

            if( $tab_post_query ->have_posts() ): ?>

                <div class="column-row">

                    <div class="column column-12">
                        <?php
                        $post_count = 1;
                        while ($tab_post_query_1->have_posts()) {
                            $tab_post_query_1->the_post();

                            if( $post_count != 1 && $post_count != 2 ){

                                $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
                                $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>


                                    <article id="theme-post-<?php the_ID(); ?>" <?php post_class('news-article news-article-list'); ?>>

                                        <?php if ($featured_image) { ?>
                                            <div class="data-bg thumb-overlay img-hover-slide" data-background="<?php echo esc_url($featured_image); ?>">

                                                <?php
                                                $format = get_post_format(get_the_ID()) ?: 'standard';
                                                $icon = motu_post_format_icon($format);
                                                if (!empty($icon)) { ?>
                                                    <span class="top-right-icon">
                                                                    <?php echo motu_svg_escape($icon); ?>
                                                                </span>
                                                <?php } ?>
                                                <a class="img-link" href="<?php the_permalink(); ?>" tabindex="0"></a>

                                            </div>
                                        <?php } ?>

                                        <div class="article-content">
                                            <h3 class="entry-title entry-title-small">
                                                <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="entry-meta-wrapper">
                                                <div class="entry-meta entry-meta-default">
                                                    <?php motu_posted_on( $icon = true ); ?>
                                                </div>
                                                <div class="entry-meta">
                                                    <?php motu_post_view_count(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </article>


                                <?php
                            }

                            $post_count++;

                        } ?>
                    </div>


                </div>


                <?php
                wp_reset_postdata();

            endif;
        }

        wp_die();
    }

endif;

if( !function_exists( 'motu_header_ticker_posts' ) ):

    function motu_header_ticker_posts(){

        $motu_default = motu_get_default_theme_options();
        $ed_header_ticker_posts = get_theme_mod( 'ed_header_ticker_posts',$motu_default['ed_header_ticker_posts'] );
        $ed_header_ticker_posts_title = get_theme_mod( 'ed_header_ticker_posts_title',$motu_default['ed_header_ticker_posts_title'] );
        $motu_header_ticker_cat = get_theme_mod( 'motu_header_ticker_cat' );
        
        if( is_rtl() ) {
            $rtl = 'right';
        }else{
            $rtl = 'left';
        }

        if( $ed_header_ticker_posts ){ ?>

            <div class="theme-ticker-area">
                
                <?php if( $ed_header_ticker_posts_title ){ ?>
                    <div class="theme-ticker-components theme-ticker-left">

                        <div class="theme-ticker-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 64 64"><path fill="currentColor" d="M54.014 32.004c-.035 5.582-.273 11.222.164 16.798c2.234-5.416 2.826-11.154 2.895-16.783c-.102-5.642-.662-11.371-2.895-16.802c-.401 5.577-.199 11.206-.164 16.787M62 32.02c-.131-8.449-.871-16.953-3.578-25.197c.045 8.553.551 17.099.514 25.654c-.035 8.242-.494 16.482-.514 24.72C61.139 48.963 61.869 40.463 62 32.02m-11.792-4.875l-.138-.03C49.552 13.98 46.978 4 43.883 4c-.596 0-1.171.377-1.718 1.067c-1.188 1.322-16.44 18.026-29.503 19.641c-1.529.189-2.99.346-4.346.459c-1.578.133-3.014.207-4.252.207c0 0-2.064 3.212-2.064 6.648c0 3.441 2.068 6.648 2.068 6.648c1.238 0 2.676.074 4.254.205c.575.049 1.177.109 1.787.172v13.402h8.082l7.938-7.416c8.864 5.846 16.087 13.992 16.087 13.992v-.027c.531.648 1.09 1.002 1.667 1.002c3.095 0 5.669-9.98 6.188-23.115l.138-.029c.843 0 1.528-2.176 1.528-4.855c-.001-2.682-.686-4.856-1.529-4.856M43.883 6.098c1.429 1.257 3.646 8.565 4.171 20.574l-8.242-1.809c.656-10.926 2.715-17.574 4.071-18.765M14.15 34.566c-.912 0-1.654-.883-1.654-1.968c0-1.088.742-1.97 1.654-1.97c.914 0 1.652.882 1.652 1.97c.001 1.086-.738 1.968-1.652 1.968m4.041 10.33v-4.092c.989.387 1.979.832 2.961 1.326l-2.961 2.766m0-6.222V28.241h-4.664c.17-.617.362-1.201.561-1.729c9.87-1.811 20.355-10.882 25.833-16.244c-1.417 5.133-2.323 12.959-2.323 21.732c0 8.798.911 16.644 2.337 21.777c-4.709-4.609-13.163-11.994-21.744-15.103m25.692 19.228c-1.355-1.191-3.415-7.84-4.071-18.766l8.242-1.809c-.525 12.009-2.742 19.318-4.171 20.575"/></svg>
                        </div>
                        
                        <div class="ticker-left-desc">
                            <div class="theme-ticker-title">
                                <?php echo esc_html( $ed_header_ticker_posts_title ); ?>    
                            </div>
                            <!-- date/time -->
                            <div class="header-item header-item-left">
                                <?php
                                    $motu_default = motu_get_default_theme_options();
                                    $ed_ticker_bar_date = get_theme_mod('ed_ticker_bar_date', $motu_default['ed_ticker_bar_date']);
                                    $ticker_date_format = get_theme_mod('ticker_date_format', $motu_default['ticker_date_format']);

                                    if ($ed_ticker_bar_date) {
                                    ?>
                                <div class="theme-topbar-item theme-topbar-date">
                                    <span class="theme-topbar-icon"><?php motu_theme_svg('calendar-full'); ?></span>
                                    <span
                                        class="theme-topbar-label"><?php echo esc_html(date(esc_attr($ticker_date_format))); ?></span>
                                </div>
                                <?php } ?>

                                <div class="theme-topbar-item theme-topbar-clock">
                                    <span class="theme-topbar-icon"><?php motu_theme_svg('clock'); ?></span>
                                    <span class="theme-topbar-label">
                                        <div id="twp-time-clock"></div>
                                    </span>
                                </div>
                            </div>
                            <!-- end date/time -->
                        </div>

                    </div>
                <?php } ?>

                <?php
                $ticker_posts_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($motu_header_ticker_cat)));

                if( $ticker_posts_query->have_posts() ): ?>

                    <div class="theme-ticker-component theme-ticker-right">
                        <div class="ticker-slides" data-direction="left" data-direction='<?php echo esc_attr($rtl); ?>'>
                           <div class="marquee">
                           <?php
                           $count = 1;
                            while ($ticker_posts_query->have_posts()):
                                $ticker_posts_query->the_post(); ?>
                                    <a class="ticker-slides-item" href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>">

                                    <div class="theme-ticker-index">
                                        <?php echo $count++; ?>
                                    </div>

                                    <span class="ticker-title"><?php the_title(); ?></span>
                                    </a>
                                <?php
                            endwhile; ?>
                           </div>
                        </div>
                    </div>

                    <?php
                    wp_reset_postdata();
                endif; ?>
            </div>

        <?php
        }

    }

endif;


if( class_exists('WooCommerce') ){

    remove_action('woocommerce_sidebar','woocommerce_get_sidebar');
    add_action('woocommerce_before_main_content','motu_woo_before_main_content',5);
    add_action('woocommerce_after_main_content','motu_woo_after_main_content',15);

}
if( !function_exists('motu_woo_before_main_content') ):

    function motu_woo_before_main_content(){

        echo '<div class="wrapper">';
        echo '<div class="column-row">';

    }

endif;

if( !function_exists('motu_woo_after_main_content') ):

    function motu_woo_after_main_content(){

        $motu_default = motu_get_default_theme_options();
        $sidebar = esc_attr( get_theme_mod( 'global_sidebar_layout', $motu_default['global_sidebar_layout'] ) );
        if( $sidebar != 'no-sidebar' ){

            get_sidebar();
            
        }

        echo '</div>';
        echo '</div>';

    }

endif;


if( !function_exists('motu_content_loading') ){

    function motu_content_loading(){ ?>

        <div class="content-loading-status">
            <div class="theme-ajax-loader"></div>
            <div class="screen-reader-text">
                <?php esc_html_e('Content Loading','motu'); ?>
            </div>
        </div>
    
    <?php
    }
}


function motu_hex2rgb( $colour,$opacity = 1 ) {

    if ( $colour[0] == '#' ) {
            $colour = substr( $colour, 1 );
    }
    if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
    } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
    } else {
            return false;
    }
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );
    return 'rgba('.$r.','.$g.','.$b.','.$opacity.')';

}

if( class_exists( 'Booster_Extension_Class' ) ){

    add_filter('booster_extemsion_content_after_filter','motu_after_content_pagination');

}

if( !function_exists('motu_after_content_pagination') ):

    function motu_after_content_pagination($after_content){

        $pagination_single = wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'motu' ),
                    'after'  => '</div>',
                    'echo' => false
                ) );

        $after_content =  $pagination_single.$after_content;

        return $after_content;

    }

endif;

if( ! function_exists( 'motu_post_permalink' ) ):
    
    function motu_post_permalink(){
        ?><div class="entry-read-more"><a href="<?php the_permalink(); ?>" class="theme-button theme-button-filled theme-button-small"><?php esc_html_e('Read More','motu'); ?></a></div><?php
    }

endif;

if( !function_exists('main_navigation_extras') ):

    function main_navigation_extras(){

        $motu_default = motu_get_default_theme_options();
        if (class_exists('Booster_Extension_Class') ):

            if( function_exists('booster_extension_get_read_letter_page_id') ){
                $page_id = booster_extension_get_read_letter_page_id();
                if ($page_id) {
                    $page_link = get_page_link($page_id);
                    ?>
                    <div class="theme-topbar-item theme-topbar-bookmark">
                        <a href="<?php echo esc_url($page_link); ?>">
                            <span class="theme-topbar-icon"><?php motu_theme_svg('bookmark'); ?></span>
                            <span class="theme-topbar-label"><?php esc_html_e('Favourites', 'motu'); ?></span>
                        </a>
                    </div>
                <?php

                }
            }
        endif;
        $ed_header_trending_news = get_theme_mod('ed_header_trending_news', $motu_default['ed_header_trending_news']); ?>
        <div class="navbar-controls hide-no-js">

            <button type="button" class="navbar-control navbar-control-search">
                <span class="navbar-control-trigger" tabindex="-1"><?php motu_theme_svg('search'); ?></span>
            </button>

            <button type="button" class="navbar-control navbar-control-offcanvas">
                <span class="navbar-control-trigger" tabindex="-1"><?php motu_theme_svg('menu'); ?></span>
            </button>

        </div>
        <?php
        if ($ed_header_trending_news) {
            $ed_header_trending_posts_title = get_theme_mod('ed_header_trending_posts_title', $motu_default['ed_header_trending_posts_title']); ?>
            <button type="button" class="navbar-control navbar-control-trending-news">
                <span class="navbar-control-trigger" tabindex="-1">
                    <span class="navbar-controller">
                        <span class="navbar-control-icon">
                            <?php motu_theme_svg('blaze'); ?>
                        </span>
                        <span class="navbar-control-label">
                            <?php echo esc_html($ed_header_trending_posts_title); ?>
                        </span>
                    </span>
                </span>
            </button>
        <?php } ?>
    <?php
    }

endif;

add_filter('comment_form_defaults','motu_comment_title_callback');

if( !function_exists('motu_comment_title_callback') ):


    function motu_comment_title_callback($defaults){

        $defaults['title_reply_before'] = '<header class="block-title-wrapper"><h3 class="block-title">';
        $defaults['title_reply_after'] = '</h3></header>';
        return $defaults;

    }

endif;


if( class_exists('Booster_Extension_Class') ):

    add_filter('booster_extension_ed_content','motu_read_letter_content_false');

    if( !function_exists('motu_read_letter_content_false') ):

        function motu_read_letter_content_false(){

            return false;

        }

    endif;

    add_action('booster_extension_read_later_post_content','motu_readletter_content',20);

    if( !function_exists('motu_readletter_content') ):

        function motu_readletter_content(){

            return get_template_part( 'template-parts/content', get_post_format() );

        }

    endif;
    
endif;

if( !function_exists('motu_social_menu') ):

    function motu_social_menu(){

        $motu_default = motu_get_default_theme_options(); ?>
            <div class="topbar-social-navigation">
                <?php
                wp_nav_menu(

                    array(
                        'theme_location' => 'motu-social-menu',
                        'link_before' => '<span class="screen-reader-text">',
                        'link_after' => '</span>',
                        'container' => 'div',
                        'container_class' => 'motu-social-menu',
                        'depth' => 1,
                    )

                ); ?>
            </div>
           

    <?php }

endif;

function motu_hex_2_rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function motu_custom_excerpt_length( $length ) {
    if ( is_admin() ) {
        return ;
    }
    return 20;
}
add_filter( 'excerpt_length', 'motu_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function motu_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }
    return ' ';
}
add_filter( 'excerpt_more', 'motu_excerpt_more' );