<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharp-tian
 */

if(get_theme_mod('sharp_tian_display_breadcrumb_section',true) != ''){
	sharp_tian_breadcrumb_slider();
}elseif(get_post_type()){	
	if(get_post_meta(get_the_ID(),'sharp_tian_breadcrumb_select',true) == 'yes'){
		sharp_tian_breadcrumb_slider();
	}
}