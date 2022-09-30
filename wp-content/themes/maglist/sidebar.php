<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */

if ( is_active_sidebar( 'maglist_sidebar' ) ) { ?>
    <aside id="secondary" class="widget-area">
        <?php 
            $sidebar = apply_filters( Maglist_Theme::fn_prefix( 'sidebar' ), 'maglist_sidebar' );
            dynamic_sidebar( $sidebar ); ?>
    </aside><!-- #secondary -->
<?php }else{ ?>
    <aside id="secondary" class="widget-area default">          
       <?php 
           Maglist_Theme::the_default_search();
           Maglist_Theme::the_default_recent_post();
           Maglist_Theme::the_default_archive();
       ?>
    </aside>
<?php }?>