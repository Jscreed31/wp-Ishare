<?php
/**
 * Content for header topbar
 *
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */ ?>
 <div class="maglist-topbar-wrapper">
    <div class="container">
        <div class="maglist-top-bar-left">
            <nav class="maglist-topbar-menu">
                <?php Maglist_Helper::get_menu( 'top-bar', true ); ?>
            </nav>
        </div>
        <div class="maglist-top-bar-right">            
            <div class="maglist-topbar-inner">
                <?php if( maglist_get( 'enable-time' ) ){ ?>
                    <div class="maglist-time-wrapper">
                        <div class="maglist-time-inner">
                            <time datetime="<?php echo esc_attr( date( DATE_W3C ) ); ?>">
                             <?php echo esc_html( date( get_option( 'date_format' ) ) ); ?>
                            </time>
                        </div>
                        <div class="maglist-digital-clock-wrapper">
                            <span class="maglist-time"></span>
                        </div> 
                    </div>
                <?php }
                if( maglist_get( 'enable-social-menu' ) ){ ?>
                    <div class="maglist-header-social">
                        <div class="maglist-social-link-header maglist-social-menu">
                            <?php Maglist_Helper::get_menu( 'social-menu-header', true ); ?>
                        </div>
                    </div>
                    <?php 
                    Maglist_Theme::add_darkmode_toggler();
                } ?>
            </div>
        </div>
    </div>
 </div>