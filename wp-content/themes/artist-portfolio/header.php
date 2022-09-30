<?php
/**
 * The Header for our theme.
 * @package Artist Portfolio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('artist_portfolio_preloader',false) != '' || get_theme_mod( 'artist_portfolio_display_preloader',false) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner" class="header-box">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'artist-portfolio' ); ?></a>
    
    <div id="header">
      <div class="row">
        <div class="col-lg-3 col-md-3 align-self-center">
          <div class="logo text-center ms-lg-5 ps-md-5">
            <div class="row">
              <div class="<?php if( get_theme_mod( 'artist_portfolio_site_logo_inline') != '') { ?>col-lg-5 col-md-5 col-5<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                <?php if ( has_custom_logo() ) : ?>
                  <div class="site-logo"><?php the_custom_logo(); ?></div>
                <?php endif; ?>
              </div>
              <div class="<?php if( get_theme_mod( 'artist_portfolio_site_logo_inline') != '') { ?>col-lg-7 col-md-7 col-7 site-logo-inline"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if( get_theme_mod('artist_portfolio_site_title_enable',true) != ''){ ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                      <h1 class="site-title pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                  <?php }?>
                <?php endif; ?>
                <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                  <?php if( get_theme_mod('artist_portfolio_site_tagline_enable',true) != ''){ ?>
                    <p class="site-description"><?php echo esc_html($description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 ps-md-0">
          <div class="topbar pe-md-5">
            <div class="row me-lg-5">
              <div class="col-lg-3 col-md-6 align-self-center">
                <?php if ( get_theme_mod('artist_portfolio_phone_number') != '' ) {?>
                  <a href="tel:<?php echo esc_attr(get_theme_mod('artist_portfolio_phone_number')); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html('Phone:', 'artist-portfolio'); ?> <?php echo esc_html(get_theme_mod('artist_portfolio_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('artist_portfolio_phone_number')); ?></span></a>
                <?php }?>
              </div>
              <div class="col-lg-3 col-md-6 align-self-center ps-md-0">
                <?php if ( get_theme_mod('artist_portfolio_email_address') != '' ) {?>
                  <a href="mailto:<?php echo esc_attr(get_theme_mod('artist_portfolio_email_address')); ?>"><i class="fas fa-envelope me-2"></i><?php echo esc_html('Email:', 'artist-portfolio'); ?> <?php echo esc_html(get_theme_mod('artist_portfolio_email_address')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('artist_portfolio_email_address')); ?></span></a>
                <?php }?>
              </div>
              <div class="col-lg-4 col-md-6 align-self-center px-lg-0">
                <?php if ( get_theme_mod('artist_portfolio_topbar_location') != '' ) {?>
                  <span><i class="fas fa-map-marker-alt me-2"></i><?php echo esc_html('Location:', 'artist-portfolio'); ?> <?php echo esc_html(get_theme_mod('artist_portfolio_topbar_location')); ?></span>
                <?php }?>
              </div>
              <div class="col-lg-2 col-md-6 align-self-center px-lg-0">
                <div class="social-icon text-md-end text-center">
                  <?php if(get_theme_mod('artist_portfolio_facebook_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('artist_portfolio_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'artist-portfolio'); ?></span></a>
                  <?php }?>
                  <?php if(get_theme_mod('artist_portfolio_twitter_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('artist_portfolio_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'artist-portfolio'); ?></span></a>
                  <?php }?>
                  <?php if(get_theme_mod('artist_portfolio_instagram_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('artist_portfolio_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'artist-portfolio'); ?></span></a>
                  <?php }?>
                  <?php if(get_theme_mod('artist_portfolio_pinterest_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('artist_portfolio_pinterest_url')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'artist-portfolio'); ?></span></a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <div class="bottom-header pe-md-5 me-lg-5">
            <div class="row">
              <div class="<?php if(get_theme_mod('artist_portfolio_header_btn_text') != '' || get_theme_mod('artist_portfolio_header_btn_url') != ''){ ?>col-lg-9 col-md-8 <?php } else {?> col-lg-11 col-md-11 <?php }?>  col-6 align-self-center">
                <?php if(has_nav_menu('primary')){ ?>
                  <div class="toggle-menu responsive-menu">
                    <button role="tab" onclick="artist_portfolio_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_responsive_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','artist-portfolio'); ?></span>
                    </button>
                  </div>
                  <div id="navbar-header" class="menu-brand primary-nav">
                    <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'artist-portfolio' ); ?>">
                      <?php
                        wp_nav_menu( array( 
                          'theme_location' => 'primary',
                          'container_class' => 'main-menu-navigation clearfix' ,
                          'menu_class' => 'clearfix',
                          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0">%3$s</ul>',
                          'fallback_cb' => 'wp_page_menu',
                        ) ); 
                      ?>
                    </nav>
                    <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="artist_portfolio_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_responsive_menu_close_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','artist-portfolio'); ?></span></a>
                  </div>
                <?php }?>
              </div>
              <div class="col-lg-1 col-md-1 col-6 align-self-center ps-md-0">
                <div class="main-search d-inline-block">
                  <span><a href="#"><i class="fas fa-search"></i></a></span>
                </div>
                <div class="searchform_page w-100 h-100">
                  <div class="close w-100 text-end me-lg-4 me-3"><a href="#maincontent"><i class="fa fa-times"></i></a></div>
                  <div class="search_input">
                    <?php get_search_form(); ?>
                  </div>
                </div>
              </div>
              <?php if(get_theme_mod('artist_portfolio_header_btn_text') != '' || get_theme_mod('artist_portfolio_header_btn_url') != ''){ ?>
                <div class="col-lg-2 col-md-3 align-self-center text-md-end text-center mt-md-0 mt-3">
                  <a href="<?php echo esc_url(get_theme_mod('artist_portfolio_header_btn_url')); ?>" class="book-btn"><?php echo esc_html(get_theme_mod('artist_portfolio_header_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('artist_portfolio_header_btn_text')); ?></span></a>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>