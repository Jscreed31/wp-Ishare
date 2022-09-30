<?php
/**
 * Header Layout 2
 *
 * @package Motu
 */
$motu_default = motu_get_default_theme_options();
$motu_header_bg_size = get_theme_mod( 'motu_header_bg_size', $motu_default['motu_header_bg_size'] );
$ed_header_bg_fixed = get_theme_mod( 'ed_header_bg_fixed', $motu_default['ed_header_bg_fixed'] );
$ed_header_bg_overlay = get_theme_mod( 'ed_header_bg_overlay', $motu_default['ed_header_bg_overlay'] );
$ed_ticker_bar = get_theme_mod( 'ed_ticker_bar', $motu_default['ed_ticker_bar'] );
?>
<!-- trending news -->
<?php if ($ed_ticker_bar) { ?>
<div class="header-news-ticker hidden-sm-element">
    <div class="wrapper wrapper-big">
        <div class="wrapper-inner">
            <div class="column column-12">
                <?php motu_header_ticker_posts(); ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<header id="site-header" class="theme-header <?php if ($ed_header_bg_overlay) { echo 'header-overlay-enabled'; } ?>"
    role="banner">

    <div class="header-mainbar <?php if (get_header_image()) {
                                    if ($ed_header_bg_fixed) {
                                        echo 'data-bg-fixed';
                                    } ?> data-bg header-bg-<?php echo esc_attr($motu_header_bg_size); ?> <?php } ?> "
        <?php if (get_header_image()) { ?> data-background="<?php echo esc_url(get_header_image()); ?>" <?php } ?>>


        <div class="wrapper header-wrapper wrapper-big">
            <div class="header-item header-item-left">
                <div class="header-titles">
                    <?php
                        motu_site_logo();
                        motu_site_description();
                        ?>
                </div>
            </div>

            <?php 
                $motu_default = motu_get_default_theme_options();
                $ed_header_ad = get_theme_mod( 'ed_header_ad',$motu_default['ed_header_ad'] );
                $header_ad_image = get_theme_mod( 'header_ad_image' );
                $ed_header_link = get_theme_mod( 'ed_header_link' );
                if( $ed_header_ad ){ ?>

                <div class="header-item header-item-right">
                    <a href="<?php echo esc_url($ed_header_link); ?>">
                        <img src="<?php echo esc_url($header_ad_image); ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div id="twp-header-navbar" class="header-navbar">
        <div class="wrapper header-wrapper wrapper-big">
            <div class="header-item header-item-left">

                <div class="header-navigation-wrapper">
                    <div class="site-navigation">
                        <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'motu'); ?>"
                            role="navigation">
                            <ul class="primary-menu theme-menu">
                                <?php
                                if (has_nav_menu('motu-primary-menu')) {

                                    wp_nav_menu(
                                        array(
                                            'container' => '',
                                            'items_wrap' => '%3$s',
                                            'theme_location' => 'motu-primary-menu',
                                            'walker' => new motu\Motu_Walkernav(),
                                            'depth' => 3,
                                        )
                                    );
                                } else {

                                    wp_list_pages(
                                        array(
                                            'match_menu_classes' => true,
                                            'show_sub_menu_icons' => true,
                                            'title_li' => false,
                                            'walker' => new Motu_Walker_Page(),
                                            'depth' => 3,
                                        )
                                    );
                                } ?>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>

            <div class="header-item header-item-right">
                <?php main_navigation_extras(); ?>
            </div>
        </div>
        <div class="progress-bar"></div>
        <?php motu_content_trending_news_render(); ?>
    </div>

    <?php motu_extra_area_render(); ?>
</header>