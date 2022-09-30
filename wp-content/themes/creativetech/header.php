<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creativetech
 */
$GLOBALS['creativetech_theme_options']  = creativetech_get_theme_options();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
 
$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';

?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'creativetech' ); ?></a>
        <header id="masthead" class="site-header header-fixed <?php echo esc_attr( $wrapper_classes ); ?>">

            <div class="header-limiter">

                <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
                <?php else : ?>
                <a class="creativetech_site_title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                    title="<?php bloginfo( 'name' ); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
                <?php endif; ?>
                <nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'creativetech' ); ?>">
                <div class="menu-button-container">
                    <button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false">
                       <span class="dropdown-icon open"><i class="fa fa-bars"></i></span>
                       <span class="dropdown-icon close"><i class="fa fa-close"></i></span>
                    </button><!-- #primary-mobile-menu -->
                </div><!-- .menu-button-container -->
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'primary',
                        'menu_class'      => 'menu-wrapper',
                        'container_class' => 'primary-menu-container',
                        'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                        'fallback_cb'     => false,
                    )
                );
                ?>
	</nav><!-- #site-navigation -->
              
            </div>

        </header>



        
	<div class="header-fixed-placeholder"></div>