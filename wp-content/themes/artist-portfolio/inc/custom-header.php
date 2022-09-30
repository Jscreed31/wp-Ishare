<?php
/**
 * @package Artist Portfolio
 * @subpackage artist-portfolio
 * @since artist-portfolio 1.0
 * Setup the WordPress core custom header feature.
 * @uses artist_portfolio_header_style()
*/

function artist_portfolio_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'artist_portfolio_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 115,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'artist_portfolio_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'artist_portfolio_custom_header_setup' );

if ( ! function_exists( 'artist_portfolio_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'artist_portfolio_header_style' );
function artist_portfolio_header_style() {
	if ( get_header_image() ) :
	$artist_portfolio_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'artist-portfolio-basic-style', $artist_portfolio_custom_css );
	endif;
}
endif;