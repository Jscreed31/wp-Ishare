<?php
/**
 * Common css for all devices
 *
 * @since 1.0
 * @package Maglist WordPress Theme
 */

add_action( 'init', Maglist_Helper::fn_prefix( 'custom_width' ), 99 );
add_action( 'customize_preview_init', Maglist_Helper::fn_prefix( 'custom_width' ), 150 );

/**
 * Adjust custom width
 *
 * @since 1.0
 * @package Maglist WordPress Theme
 */
function maglist_custom_width() {
	// echo maglist_get( 'container-width' );die;
	if ( 'default' == maglist_get( 'container-width' ) ) :
		# container width
		$style = array(
			array(
				'selector' => '.container',
				'props' => array(
					'max-width' => 'container-custom-width',
				)
			)
		);

		Maglist_Css::add_styles( $style, 'md' );
	endif;
}

add_action( 'init', 'maglist_all_device_css' );
/**
 * Register dynamic css
 *
 * @since 1.0
 * @package Maglist WordPress Theme
 */
function maglist_all_device_css() {
	$style = array(
		# Primary Color
		array(
			'selector' => '.maglist-navigation-n-options, span.newsline-time,  .maglist-latest-post-wrapper .maglist-latest-post-inner 
			.maglist-latest-post, .maglist-latest-post-wrapper .maglist-latest-post-inner .maglist-latest-post .maglist-latest-post-title span:before,
			.maglist-social-menu ul a:before, .widget-area .widget h2.widget-title:before,
			.comment-respond .comment-form input[type="submit"], .maglist-navigation-n-options,
			 .maglist-latest-post-wrapper .maglist-latest-post-inner .maglist-latest-post,
			.maglist-latest-post-wrapper .maglist-latest-post-inner .maglist-latest-post .maglist-latest-post-title span:before, 
			.maglist-social-menu ul a:before, .widget-area .widget h2.widget-title:before,
			.comment-respond .comment-form input[type="submit, .maglist-btns-wrapper .maglist-woocommerce-cart .cart-icon span"], 
			.maglist-main-menu > ul li ul, .maglist-main-menu div > ul li ul,
			.maglist-sticky-share ul li a, .maglist-social-sharing ul li a, .post-categories li:nth-child(1) > a, 
			.maglist-search-content .maglist-search-tags > ul li:nth-child(1) > a, 
			.maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-left .maglist-main-banner-news-inner .maglist-main-banner-news-meta .maglist-main-banner-news-cat a:nth-child(1), .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-left .maglist-main-banner-news-inner .maglist-main-banner-news-meta .maglist-main-banner-news-cat ul li:nth-child(1) a, .maglist-sticky-share h3, .pagination .nav-links > *.current, .maglist-you-missed .maglist-you-missed-title h2:before, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right h2.heading-line:before, .wp-block-tag-cloud a, .sidebar-order form .wp-block-search__inside-wrapper button, 
				.sidebar-order form .wp-block-search__inside-wrapper [type="submit"], .maglist-main-banner-news-section .maglist-arrow,
				.maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right .slick-slider .maglist-arrow',
			'props' => array(
				'background-color' => 'primary-color',
			)
		),
		array(
			'selector' => '#infinite-handle span, .maglist-main-menu > ul li a, .maglist-main-menu div > ul li a, .maglist-btns-wrapper .maglist-woocommerce-cart .cart-icon',
			'props' => array(
				'color' => 'primary-menu-item-color',
			)
		),
		array(
			'selector' => 'a.cart-icon span, .maglist-header-left .maglist-offcanvas-wrapper .offcanvas-data-trigger span',
			'props' => array(
				'background' => 'primary-menu-item-color',
			)
		),
		array(
			'selector' => Maglist_Helper::with_prefix_selector( '.product-with-slider %s-arrow svg, .product-with-slider %s-arrow svg:hover' ),
			'props' => array(
				'fill' => 'primary-color',
			)
		),
		array(
			'selector' => Maglist_Helper::with_prefix_selector( '%s-post .entry-content-stat + a:hover, %s-bottom-header-wrapper %s-header-icons %s-search-icon, .pagination .nav-links > *, ul.wc-block-grid__products li.wc-block-grid__product del span.woocommerce-Price-amount.amount, .woocommerce ul.products li.product a.woocommerce-LoopProduct-link del span.woocommerce-Price-amount.amount, ul.wc-block-grid__products li.wc-block-grid__product del, .woocommerce ul.products li.product .star-rating, ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-title a:hover, .single-product .product .entry-summary .product_meta > span a, .single-product .stars a, .single-product .star-rating span::before, .wc-block-grid__product-rating .wc-block-grid__product-rating__stars span:before, .single-product .product .entry-summary .star-rating span::before, .single-product .product .entry-summary a.woocommerce-review-link, .woocommerce .star-rating, .woocommerce del, li.wc-layered-nav-rating a, .woocommerce ul.products li.product-category.product h2 mark.count, a.cart-icon, a.cart-icon:visited, .maglist-post .maglist-comments a' ),
			'props' => array(
				'color' => 'primary-color',
			)
		),
		array(
			'selector' => Maglist_Helper::with_prefix_selector( '.pagination .nav-links > *, %s-post.sticky' ), 
			'props' => array(
				'border-color' => 'primary-color',
			)
		),
		array(
			'selector' => Maglist_Helper::with_prefix_selector( '.pagination .nav-links > *, %s-post.sticky' ), 
			'props' => array(
				'border-color' => 'primary-color',
			)
		),

		# Typography
		array(
			'selector' => '.site-branding .site-title, .site-branding .site-description, .site-title a',
			'props'    => array(
				'font-family' => 'site-info-font'
			)
		),
		array(
			'selector' => 'body',
			'props'    => array(
				'font-family' => 'body-font'
			)
		),
		array(
			'selector'  => 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
			'props'	=> array(
				'font-family' => 'heading-font',
			),
		),
		# Color Options
		array(
			'selector'  => 'body, body p, .woocommerce-Tabs-panel, div#tab-description, .woocommerce-tabs.wc-tabs-wrapper, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta .maglist-main-banner-trending-author span.posted-on > a, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta .maglist-main-banner-trending-author span.posted-on, .entry-meta .author-info .posted-on a, .entry-meta a.url, .maglist-you-missed .maglist-feature-news-inner .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta .maglist-main-banner-trending-author span.posted-on, .maglist-you-missed .maglist-feature-news-inner .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta .maglist-main-banner-trending-author span.posted-on a, .entry-meta .author-info',
			'props'		=> array(
				'color' => 'body-text-color',
			),
		),
		array(
			'selector'  => Maglist_Helper::with_prefix_selector( '%s-main-menu > ul > li > a, %s-search-icons, %s-search-icons:visited, .maglist-btns-wrapper .maglist-woocommerce-cart .cart-icon i' ),
			'props'		=> array(
				'color' => 'primary-menu-item-color',
			),
		),
		array(
			'selector'  => 'body a, .maglist-post .post-title a, 
			.maglist-latest-post-wrapper .maglist-latest-post-inner .maglist-latest-post-slider a, .maglist-latest-post-wrapper .maglist-latest-post-inner .maglist-latest-post-slider a .maglist-post-meta h2, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta h3.title a, .maglist-you-missed .maglist-feature-news-inner .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta h3.title a',
			'props'		=> array(
				'color' => 'link-color',
			),
		),
		array(
			'selector'  => 'body a:hover, .maglist-post .post-title a:hover,  .site-branding .site-title a:hover, 
			.maglist-post .maglist-comments a:hover, 
			.footer-bottom-section .credit-link a:hover, .footer-widget ul li a:hover, .footer-widget a:hover,
			.wrap-breadcrumb ul li a:hover, .wrap-breadcrumb ul li a span:hover, #secondary .widget a:hover,
			.maglist-main-menu > ul > li > a:hover,
			.maglist-main-menu > ul > li > ul li a:hover, .maglist-main-menu div > ul > li > ul li a:hover,
			#secondary .widget ul li a:hover, .maglist-latest-post-wrapper .maglist-latest-post-inner .maglist-latest-post-slider a:hover,
			.wp-block-tag-cloud a:hover, .post-navigation .nav-links > div a:hover span, body a:hover, .maglist-btns-wrapper .maglist-woocommerce-cart .cart-icon i:hover, .maglist-latest-post-wrapper .maglist-latest-post-inner .maglist-latest-post-slider a .maglist-post-meta h2:hover,
			.maglist-navigation-n-options > div .maglist-offcanvas-content .maglist-offcanvas-menu > ul > li > a, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-left .maglist-main-banner-news-inner .maglist-main-banner-news-meta > a:hover, 
			.maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-left .maglist-main-banner-news-inner .maglist-main-banner-news-meta .maglist-main-banner-news-author .posted-on a:hover, .entry-meta .author-info .posted-on a:hover, .entry-meta a.url:hover, .maglist-you-missed .maglist-feature-news-inner .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta h3.title a:hover, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta h3.title a:hover, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta .maglist-main-banner-trending-author span.posted-on > a:hover, .maglist-you-missed .maglist-feature-news-inner .maglist-main-banner-trending-inner .maglist-main-banner-trending-meta .maglist-main-banner-trending-author span.posted-on a:hover, .maglist-search-content .maglist-search-post .maglist-search-post-inner > h3 a:hover',
			'props'		=> array(
				'color' => 'link-hover-color',
			),
		),
		array(
			'selector' => '.wp-block-tag-cloud a:hover, .post-categories li > a:hover, 
			.post-content-wrap p > a:hover, .maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-left .maglist-main-banner-news-inner .maglist-main-banner-news-meta .maglist-main-banner-news-cat ul li > a:hover, 
			.maglist-main-banner-wrapper .maglist-main-banner-inner .maglist-main-banner-right .slick-slider .maglist-arrow:hover, 
			.maglist-main-banner-news-section .maglist-arrow:hover, .comment-respond .comment-form input[type="submit"]:hover, 
			.maglist-search-content .maglist-search-tags > ul li a:hover, .pagination .nav-links > a:hover, 
			.sidebar-order form .wp-block-search__inside-wrapper button:hover, 
				.sidebar-order form .wp-block-search__inside-wrapper [type="submit"]:hover',
			'props' => array(
				'background-color' => 'link-hover-background-color',  
			),
		),
		array(
			'selector'  => '#secondary .widget-title, .sidebar-order aside section h2, .wp-block-search .wp-block-search__label',
			'props'		=> array(
				'color' => 'sb-widget-title-color',
			),
		),
		array(
			'selector'  => '#secondary .widget, #secondary .widget a, #secondary .widget ul li a, .wp-block-calendar table caption, .wp-block-calendar table tbody',
			'props'		=> array(
				'color' => 'sb-widget-content-color',
			),
		),
		array(
			'selector'  => '.footer-widget .widget-title, .footer-widget .footer-widget-wrapper section .widget-title,
			.footer-widget .footer-widget-wrapper section h2',
			'props'		=> array(
				'color' => 'footer-title-color',
			),
		),
		array(
			'selector'  => '.footer-top-section',
			'props'		=> array(
				'background-color' => 'footer-top-background-color',
			),
		),
		array(
			'selector'  => '.footer-bottom-section',
			'props'		=> array(
				'background-color' => 'footer-copyright-background-color',
			),
		),
		array(
			'selector'  => '.footer-widget, .footer-widget p, .footer-widget span, .footer-widget ul li a,  
			#calendar_wrap #wp-calendar th, #calendar_wrap td, #calendar_wrap caption, #calendar_wrap td a, 
			.footer-widget ul li, .footer-widget .footer-widget-wrapper section p, .footer-top-section .wp-block-calendar table caption, .footer-top-section .wp-block-calendar table tbody',
			'props'		=> array(
				'color' => 'footer-content-color',
			),
		),
		array(
			'selector'  => '.footer-bottom-section span, .footer-bottom-section .credit-link',
			'props'		=> array(
				'color' => 'footer-copyright-text-color',
			),
		),
		# inner banner
		array(
			'selector' => Maglist_Helper::with_prefix_selector( '%s-inner-banner-wrapper:after' ),
			'props'    => array(
				'background-color' => 'ib-background-color'
			)
		),
		array(
			'selector' => Maglist_Helper::with_prefix_selector( '%s-inner-banner-wrapper %s-inner-banner .entry-title' ),
			'props'    => array(
				'color' => 'ib-title-color'
			)
		),
		# Breadcrumb
		array(
			'selector'  => '.wrap-breadcrumb ul.trail-items li a:after',
			'props'		=> array(
				'content' => 'bc-separator',
			),
		),
		array(
			'selector'  => '.wrap-breadcrumb ul li a, .wrap-breadcrumb ul li span, .taxonomy-description p',
			'props'		=> array(
				'color' => 'ib-title-color'
			),
		),
		array( 
			'selector' => '.maglist-header-wrapper, .maglist-header-wrapper .maglist-header-image-wrapper:after',
			'props' => array(
				'background' => 'header-bg-color'
			), 
		),
		array( 
			'selector' => '.maglist-topbar-wrapper',
			'props' => array(
				'background' => 'topbar-bg-color'
			), 
		),
		array(
			'selector' => '.maglist-time-wrapper .maglist-time-inner, .maglist-topbar-wrapper > div .maglist-topbar-menu ul li a',
			'props' => array(
				'color' => 'topbar-text-color'
			)
		)
	);
	Maglist_Css::add_styles( $style, 'md' );
}
