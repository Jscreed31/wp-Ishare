<?php

	/*---------------------------Width Layout -------------------*/
	$artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_width_layout_options','Default');
    if($artist_portfolio_theme_lay == 'Default'){
		$artist_portfolio_custom_css .='body{';
			$artist_portfolio_custom_css .='max-width: 100%;';
		$artist_portfolio_custom_css .='}';
	}else if($artist_portfolio_theme_lay == 'Container Layout'){
		$artist_portfolio_custom_css .='body{';
			$artist_portfolio_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$artist_portfolio_custom_css .='}';
	}else if($artist_portfolio_theme_lay == 'Box Layout'){
		$artist_portfolio_custom_css .='body{';
			$artist_portfolio_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$artist_portfolio_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$artist_portfolio_footer_text_align = get_theme_mod('artist_portfolio_footer_text_align');
	$artist_portfolio_custom_css .='.copyright-wrapper{';
		$artist_portfolio_custom_css .='text-align: '.esc_attr($artist_portfolio_footer_text_align).';';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_footer_text_padding = get_theme_mod('artist_portfolio_footer_text_padding');
	$artist_portfolio_custom_css .='.copyright-wrapper{';
		$artist_portfolio_custom_css .='padding-top: '.esc_attr($artist_portfolio_footer_text_padding).'px; padding-bottom: '.esc_attr($artist_portfolio_footer_text_padding).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_footer_bg_color = get_theme_mod('artist_portfolio_footer_bg_color');
	$artist_portfolio_custom_css .='.footer-wp{';
		$artist_portfolio_custom_css .='background-color: '.esc_attr($artist_portfolio_footer_bg_color).';';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_footer_bg_image = get_theme_mod('artist_portfolio_footer_bg_image');
	if($artist_portfolio_footer_bg_image != false){
		$artist_portfolio_custom_css .='.footer-wp{';
			$artist_portfolio_custom_css .='background: url('.esc_attr($artist_portfolio_footer_bg_image).');';
		$artist_portfolio_custom_css .='}';
	}

	$artist_portfolio_copyright_text_font_size = get_theme_mod('artist_portfolio_copyright_text_font_size', 15);
	$artist_portfolio_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$artist_portfolio_custom_css .='font-size: '.esc_attr($artist_portfolio_copyright_text_font_size).'px;';
	$artist_portfolio_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$artist_portfolio_back_to_top_border_radius = get_theme_mod('artist_portfolio_back_to_top_border_radius');
	$artist_portfolio_custom_css .='#scrollbutton {';
		$artist_portfolio_custom_css .='border-radius: '.esc_attr($artist_portfolio_back_to_top_border_radius).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_scroll_icon_font_size = get_theme_mod('artist_portfolio_scroll_icon_font_size', 22);
	$artist_portfolio_custom_css .='#scrollbutton {';
		$artist_portfolio_custom_css .='font-size: '.esc_attr($artist_portfolio_scroll_icon_font_size).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_top_bottom_scroll_padding = get_theme_mod('artist_portfolio_top_bottom_scroll_padding', 7);
	$artist_portfolio_custom_css .='#scrollbutton {';
		$artist_portfolio_custom_css .='padding-top: '.esc_attr($artist_portfolio_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($artist_portfolio_top_bottom_scroll_padding).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_left_right_scroll_padding = get_theme_mod('artist_portfolio_left_right_scroll_padding', 17);
	$artist_portfolio_custom_css .='#scrollbutton {';
		$artist_portfolio_custom_css .='padding-left: '.esc_attr($artist_portfolio_left_right_scroll_padding).'px; padding-right: '.esc_attr($artist_portfolio_left_right_scroll_padding).'px;';
	$artist_portfolio_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$artist_portfolio_post_button_padding_top = get_theme_mod('artist_portfolio_post_button_padding_top');
	$artist_portfolio_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$artist_portfolio_custom_css .='padding-top: '.esc_attr($artist_portfolio_post_button_padding_top).'px; padding-bottom: '.esc_attr($artist_portfolio_post_button_padding_top).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_post_button_padding_right = get_theme_mod('artist_portfolio_post_button_padding_right');
	$artist_portfolio_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$artist_portfolio_custom_css .='padding-left: '.esc_attr($artist_portfolio_post_button_padding_right).'px; padding-right: '.esc_attr($artist_portfolio_post_button_padding_right).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_post_button_border_radius = get_theme_mod('artist_portfolio_post_button_border_radius');
	$artist_portfolio_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$artist_portfolio_custom_css .='border-radius: '.esc_attr($artist_portfolio_post_button_border_radius).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_post_comment_enable = get_theme_mod('artist_portfolio_post_comment_enable',true);
	if($artist_portfolio_post_comment_enable == false){
		$artist_portfolio_custom_css .='#comments{';
			$artist_portfolio_custom_css .='display: none;';
		$artist_portfolio_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$artist_portfolio_preloader_bg_color_option = get_theme_mod('artist_portfolio_preloader_bg_color_option');
	$artist_portfolio_preloader_icon_color_option = get_theme_mod('artist_portfolio_preloader_icon_color_option');
	$artist_portfolio_custom_css .='.frame{';
		$artist_portfolio_custom_css .='background-color: '.esc_attr($artist_portfolio_preloader_bg_color_option).';';
	$artist_portfolio_custom_css .='}';
	$artist_portfolio_custom_css .='.dot-1,.dot-2,.dot-3{';
		$artist_portfolio_custom_css .='background-color: '.esc_attr($artist_portfolio_preloader_icon_color_option).';';
	$artist_portfolio_custom_css .='}';

	// preloader type
	$artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_preloader_type','First Preloader Type');
    if($artist_portfolio_theme_lay == 'First Preloader Type'){
		$artist_portfolio_custom_css .='.dot-1, .dot-2, .dot-3{';
			$artist_portfolio_custom_css .='';
		$artist_portfolio_custom_css .='}';
	}else if($artist_portfolio_theme_lay == 'Second Preloader Type'){
		$artist_portfolio_custom_css .='.dot-1, .dot-2, .dot-3{';
			$artist_portfolio_custom_css .='border-radius:0;';
		$artist_portfolio_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_background_skin','Without Background');
    if($artist_portfolio_theme_lay == 'With Background'){
		$artist_portfolio_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$artist_portfolio_custom_css .='background-color: #fff; padding:20px;';
		$artist_portfolio_custom_css .='}';
		$artist_portfolio_custom_css .='.login-box a{';
			$artist_portfolio_custom_css .='background-color: #fff;';
		$artist_portfolio_custom_css .='}';
	}else if($artist_portfolio_theme_lay == 'Without Background'){
		$artist_portfolio_custom_css .='{';
			$artist_portfolio_custom_css .='background-color: transparent;';
		$artist_portfolio_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$artist_portfolio_woocommerce_button_padding_top = get_theme_mod('artist_portfolio_woocommerce_button_padding_top',12);
	$artist_portfolio_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$artist_portfolio_custom_css .='padding-top: '.esc_attr($artist_portfolio_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($artist_portfolio_woocommerce_button_padding_top).'px;';
	$artist_portfolio_custom_css .='}';
	

	$artist_portfolio_woocommerce_button_padding_right = get_theme_mod('artist_portfolio_woocommerce_button_padding_right',15);
	$artist_portfolio_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$artist_portfolio_custom_css .='padding-left: '.esc_attr($artist_portfolio_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($artist_portfolio_woocommerce_button_padding_right).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_woocommerce_button_border_radius = get_theme_mod('artist_portfolio_woocommerce_button_border_radius',5);
	$artist_portfolio_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.added_to_cart{';
		$artist_portfolio_custom_css .='border-radius: '.esc_attr($artist_portfolio_woocommerce_button_border_radius).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_related_product_enable = get_theme_mod('artist_portfolio_related_product_enable',true);
	if($artist_portfolio_related_product_enable == false){
		$artist_portfolio_custom_css .='.related.products{';
			$artist_portfolio_custom_css .='display: none;';
		$artist_portfolio_custom_css .='}';
	}

	$artist_portfolio_woocommerce_product_border_enable = get_theme_mod('artist_portfolio_woocommerce_product_border_enable',true);
	if($artist_portfolio_woocommerce_product_border_enable == false){
		$artist_portfolio_custom_css .='.products li{';
			$artist_portfolio_custom_css .='border: none;';
		$artist_portfolio_custom_css .='}';
	}

	$artist_portfolio_woocommerce_product_padding_top = get_theme_mod('artist_portfolio_woocommerce_product_padding_top',0);
	$artist_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$artist_portfolio_custom_css .='padding-top: '.esc_attr($artist_portfolio_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($artist_portfolio_woocommerce_product_padding_top).'px !important;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_woocommerce_product_padding_right = get_theme_mod('artist_portfolio_woocommerce_product_padding_right',0);
	$artist_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$artist_portfolio_custom_css .='padding-left: '.esc_attr($artist_portfolio_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($artist_portfolio_woocommerce_product_padding_right).'px !important;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_woocommerce_product_border_radius = get_theme_mod('artist_portfolio_woocommerce_product_border_radius',3);
	$artist_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$artist_portfolio_custom_css .='border-radius: '.esc_attr($artist_portfolio_woocommerce_product_border_radius).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_woocommerce_product_box_shadow = get_theme_mod('artist_portfolio_woocommerce_product_box_shadow', 0);
	$artist_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$artist_portfolio_custom_css .='box-shadow: '.esc_attr($artist_portfolio_woocommerce_product_box_shadow).'px '.esc_attr($artist_portfolio_woocommerce_product_box_shadow).'px '.esc_attr($artist_portfolio_woocommerce_product_box_shadow).'px #ddd;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_woo_product_sale_top_bottom_padding = get_theme_mod('artist_portfolio_woo_product_sale_top_bottom_padding', 0);
	$artist_portfolio_woo_product_sale_left_right_padding = get_theme_mod('artist_portfolio_woo_product_sale_left_right_padding', 0);
	$artist_portfolio_custom_css .='.woocommerce span.onsale{';
		$artist_portfolio_custom_css .='padding-top: '.esc_attr($artist_portfolio_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($artist_portfolio_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($artist_portfolio_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($artist_portfolio_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_woo_product_sale_border_radius = get_theme_mod('artist_portfolio_woo_product_sale_border_radius',0);
	$artist_portfolio_custom_css .='.woocommerce span.onsale {';
		$artist_portfolio_custom_css .='border-radius: '.esc_attr($artist_portfolio_woo_product_sale_border_radius).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_woo_product_sale_position = get_theme_mod('artist_portfolio_woo_product_sale_position', 'Left');
	if($artist_portfolio_woo_product_sale_position == 'Right' ){
		$artist_portfolio_custom_css .='.woocommerce ul.products li.product .onsale{';
			$artist_portfolio_custom_css .=' left:auto; right:0;';
		$artist_portfolio_custom_css .='}';
	}elseif($artist_portfolio_woo_product_sale_position == 'Left' ){
		$artist_portfolio_custom_css .='.woocommerce ul.products li.product .onsale{';
			$artist_portfolio_custom_css .=' left:0; right:auto;';
		$artist_portfolio_custom_css .='}';
	}

	$artist_portfolio_wooproduct_sale_font_size = get_theme_mod('artist_portfolio_wooproduct_sale_font_size',14);
	$artist_portfolio_custom_css .='.woocommerce span.onsale{';
		$artist_portfolio_custom_css .='font-size: '.esc_attr($artist_portfolio_wooproduct_sale_font_size).'px;';
	$artist_portfolio_custom_css .='}';

	// Responsive Media
	$artist_portfolio_post_date = get_theme_mod( 'artist_portfolio_display_post_date',true);
	if($artist_portfolio_post_date == true && get_theme_mod( 'artist_portfolio_metafields_date',true) != true){
    	$artist_portfolio_custom_css .='.metabox .entry-date{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_post_date == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.metabox .entry-date{';
			$artist_portfolio_custom_css .='display:inline-block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_post_date == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.metabox .entry-date{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_post_author = get_theme_mod( 'artist_portfolio_display_post_author',true);
	if($artist_portfolio_post_author == true && get_theme_mod( 'artist_portfolio_metafields_author',true) != true){
    	$artist_portfolio_custom_css .='.metabox .entry-author{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_post_author == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.metabox .entry-author{';
			$artist_portfolio_custom_css .='display:inline-block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_post_author == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.metabox .entry-author{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_post_comment = get_theme_mod( 'artist_portfolio_display_post_comment',true);
	if($artist_portfolio_post_comment == true && get_theme_mod( 'artist_portfolio_metafields_comment',true) != true){
    	$artist_portfolio_custom_css .='.metabox .entry-comments{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_post_comment == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.metabox .entry-comments{';
			$artist_portfolio_custom_css .='display:inline-block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_post_comment == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.metabox .entry-comments{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_post_time = get_theme_mod( 'artist_portfolio_display_post_time',false);
	if($artist_portfolio_post_time == true && get_theme_mod( 'artist_portfolio_metafields_time',false) != true){
    	$artist_portfolio_custom_css .='.metabox .entry-time{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_post_time == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.metabox .entry-time{';
			$artist_portfolio_custom_css .='display:inline-block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_post_time == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.metabox .entry-time{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	if($artist_portfolio_post_date == false && $artist_portfolio_post_author == false && $artist_portfolio_post_comment == false && $artist_portfolio_post_time == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
    	$artist_portfolio_custom_css .='.metabox {';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_metafields_date = get_theme_mod( 'artist_portfolio_metafields_date',true);
	$artist_portfolio_metafields_author = get_theme_mod( 'artist_portfolio_metafields_author',true);
	$artist_portfolio_metafields_comment = get_theme_mod( 'artist_portfolio_metafields_comment',true);
	$artist_portfolio_metafields_time = get_theme_mod( 'artist_portfolio_metafields_time',true);
	if($artist_portfolio_metafields_date == false && $artist_portfolio_metafields_author == false && $artist_portfolio_metafields_comment == false && $artist_portfolio_metafields_time == false){
		$artist_portfolio_custom_css .='@media screen and (min-width:576px) {';
    	$artist_portfolio_custom_css .='.metabox {';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_slider = get_theme_mod( 'artist_portfolio_display_slider',false);
	if($artist_portfolio_slider == true && get_theme_mod( 'artist_portfolio_slider_hide', false) == false){
    	$artist_portfolio_custom_css .='.slider-circle{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_slider == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.slider-circle{';
			$artist_portfolio_custom_css .='display:block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_slider == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.slider-circle{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_sidebar = get_theme_mod( 'artist_portfolio_display_sidebar',true);
    if($artist_portfolio_sidebar == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='#sidebar{';
			$artist_portfolio_custom_css .='display:block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_sidebar == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='#sidebar{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_scroll = get_theme_mod( 'artist_portfolio_display_scrolltop',true);
	if($artist_portfolio_scroll == true && get_theme_mod( 'artist_portfolio_hide_show_scroll',true) != true){
    	$artist_portfolio_custom_css .='#scrollbutton {';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_scroll == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='#scrollbutton {';
			$artist_portfolio_custom_css .='display:block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_scroll == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='#scrollbutton {';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_preloader = get_theme_mod( 'artist_portfolio_display_preloader',false);
	if($artist_portfolio_preloader == true && get_theme_mod( 'artist_portfolio_preloader',false) == false){
		$artist_portfolio_custom_css .='@media screen and (min-width:575px) {';
    	$artist_portfolio_custom_css .='.frame{';
			$artist_portfolio_custom_css .=' visibility: hidden;';
		$artist_portfolio_custom_css .='} }';
	}
    if($artist_portfolio_preloader == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.frame{';
			$artist_portfolio_custom_css .='visibility:visible;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_preloader == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.frame{';
			$artist_portfolio_custom_css .='visibility: hidden;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_search = get_theme_mod( 'artist_portfolio_display_search_category',true);
	if($artist_portfolio_search == true && get_theme_mod( 'artist_portfolio_search_enable_disable',true) != true){
    	$artist_portfolio_custom_css .='.search-cat-box{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_search == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.search-cat-box{';
			$artist_portfolio_custom_css .='display:block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_search == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.search-cat-box{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	$artist_portfolio_myaccount = get_theme_mod( 'artist_portfolio_display_myaccount',true);
	if($artist_portfolio_myaccount == true && get_theme_mod( 'artist_portfolio_myaccount_enable_disable',true) != true){
    	$artist_portfolio_custom_css .='.login-box{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} ';
	}
    if($artist_portfolio_myaccount == true){
    	$artist_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$artist_portfolio_custom_css .='.login-box{';
			$artist_portfolio_custom_css .='display:block;';
		$artist_portfolio_custom_css .='} }';
	}else if($artist_portfolio_myaccount == false){
		$artist_portfolio_custom_css .='@media screen and (max-width:575px){';
		$artist_portfolio_custom_css .='.login-box{';
			$artist_portfolio_custom_css .='display:none;';
		$artist_portfolio_custom_css .='} }';
	}

	// menu settings
	$artist_portfolio_menu_font_size_option = get_theme_mod('artist_portfolio_menu_font_size_option');
	$artist_portfolio_custom_css .='.primary-navigation a{';
		$artist_portfolio_custom_css .='font-size: '.esc_attr($artist_portfolio_menu_font_size_option).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_menu_padding = get_theme_mod('artist_portfolio_menu_padding');
	$artist_portfolio_custom_css .='.primary-navigation a{';
		$artist_portfolio_custom_css .='padding: '.esc_attr($artist_portfolio_menu_padding).'px;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_text_tranform_menu','Uppercase');
    if($artist_portfolio_theme_lay == 'Uppercase'){
		$artist_portfolio_custom_css .='.primary-navigation a{';
			$artist_portfolio_custom_css .='';
		$artist_portfolio_custom_css .='}';
	}else if($artist_portfolio_theme_lay == 'Lowercase'){
		$artist_portfolio_custom_css .='.primary-navigation a{';
			$artist_portfolio_custom_css .='text-transform: lowercase;';
		$artist_portfolio_custom_css .='}';
	}
	else if($artist_portfolio_theme_lay == 'Capitalize'){
		$artist_portfolio_custom_css .='.primary-navigation a{';
			$artist_portfolio_custom_css .='text-transform: Capitalize;';
		$artist_portfolio_custom_css .='}';
	}

	$artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_font_weight_option_menu','');
    if($artist_portfolio_theme_lay == 'Bold'){
		$artist_portfolio_custom_css .='.primary-navigation a{';
			$artist_portfolio_custom_css .='font-weight:bold;';
		$artist_portfolio_custom_css .='}';
	}else if($artist_portfolio_theme_lay == 'Normal'){
		$artist_portfolio_custom_css .='.primary-navigation a{';
			$artist_portfolio_custom_css .='font-weight: normal;';
		$artist_portfolio_custom_css .='}';
	}

	//  comment form width
	$artist_portfolio_comment_form_width = get_theme_mod( 'artist_portfolio_comment_form_width');
	$artist_portfolio_custom_css .='#comments textarea{';
		$artist_portfolio_custom_css .='width: '.esc_attr($artist_portfolio_comment_form_width).'%;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_title_comment_form = get_theme_mod('artist_portfolio_title_comment_form', 'Leave a Reply');
	if($artist_portfolio_title_comment_form == ''){
		$artist_portfolio_custom_css .='#comments h2#reply-title {';
			$artist_portfolio_custom_css .='display: none;';
		$artist_portfolio_custom_css .='}';
	}

	$artist_portfolio_comment_form_button_content = get_theme_mod('artist_portfolio_comment_form_button_content', 'Post Comment');
	if($artist_portfolio_comment_form_button_content == ''){
		$artist_portfolio_custom_css .='#comments p.form-submit {';
			$artist_portfolio_custom_css .='display: none;';
		$artist_portfolio_custom_css .='}';
	}

	// featured image setting
	$artist_portfolio_image_border_radius = get_theme_mod('artist_portfolio_image_border_radius', 0);
	$artist_portfolio_custom_css .='.box-image img, .content_box img{';
		$artist_portfolio_custom_css .='border-radius: '.esc_attr($artist_portfolio_image_border_radius).'%;';
	$artist_portfolio_custom_css .='}';

	$artist_portfolio_image_box_shadow = get_theme_mod('artist_portfolio_image_box_shadow',0);
	$artist_portfolio_custom_css .='.box-image img, .content_box img{';
		$artist_portfolio_custom_css .='box-shadow: '.esc_attr($artist_portfolio_image_box_shadow).'px '.esc_attr($artist_portfolio_image_box_shadow).'px '.esc_attr($artist_portfolio_image_box_shadow).'px #b5b5b5;';
	$artist_portfolio_custom_css .='}';

	// Post Block
	$artist_portfolio_post_block_option = get_theme_mod( 'artist_portfolio_post_block_option','By Block');
    if($artist_portfolio_post_block_option == 'By Without Block'){
		$artist_portfolio_custom_css .='.inner-service, #blog_sec .sticky{';
			$artist_portfolio_custom_css .='border:none; margin:30px 0;';
		$artist_portfolio_custom_css .='}';
	}

	// post image 
	$artist_portfolio_post_featured_color = get_theme_mod('artist_portfolio_post_featured_color', '#5c727d');
	$artist_portfolio_post_featured_image = get_theme_mod('artist_portfolio_post_featured_image','Image');
	if($artist_portfolio_post_featured_image == 'Color'){
		$artist_portfolio_custom_css .='.post-color{';
			$artist_portfolio_custom_css .='background-color: '.esc_attr($artist_portfolio_post_featured_color).';';
		$artist_portfolio_custom_css .='}';
	}

	// featured image dimention
	$artist_portfolio_post_featured_image_dimention = get_theme_mod('artist_portfolio_post_featured_image_dimention', 'Default');
	$artist_portfolio_post_featured_image_custom_width = get_theme_mod('artist_portfolio_post_featured_image_custom_width');
	$artist_portfolio_post_featured_image_custom_height = get_theme_mod('artist_portfolio_post_featured_image_custom_height');
	if($artist_portfolio_post_featured_image_dimention == 'Custom'){
		$artist_portfolio_custom_css .='.box-image img{';
			$artist_portfolio_custom_css .='width: '.esc_attr($artist_portfolio_post_featured_image_custom_width).'px; height: '.esc_attr($artist_portfolio_post_featured_image_custom_height).'px;';
		$artist_portfolio_custom_css .='}';
	}

	// featured image dimention
	$artist_portfolio_custom_post_color_width = get_theme_mod('artist_portfolio_custom_post_color_width');
	$artist_portfolio_custom_post_color_height = get_theme_mod('artist_portfolio_custom_post_color_height');
	if($artist_portfolio_post_featured_image == 'Color'){
		$artist_portfolio_custom_css .='.post-color{';
			$artist_portfolio_custom_css .='width: '.esc_attr($artist_portfolio_custom_post_color_width).'px; height: '.esc_attr($artist_portfolio_custom_post_color_height).'px;';
		$artist_portfolio_custom_css .='}';
	}

	// site title font size
	$artist_portfolio_site_title_font_size = get_theme_mod('artist_portfolio_site_title_font_size', 25);
	$artist_portfolio_custom_css .='.logo .site-title{';
	$artist_portfolio_custom_css .='font-size: '.esc_attr($artist_portfolio_site_title_font_size).'px;';
	$artist_portfolio_custom_css .='}';

	// site tagline font size
	$artist_portfolio_site_tagline_font_size = get_theme_mod('artist_portfolio_site_tagline_font_size', 13);
	$artist_portfolio_custom_css .='p.site-description{';
	$artist_portfolio_custom_css .='font-size: '.esc_attr($artist_portfolio_site_tagline_font_size).'px;';
	$artist_portfolio_custom_css .='}';

	// woocommerce Product Navigation
	$artist_portfolio_wooproducts_nav = get_theme_mod('artist_portfolio_wooproducts_nav', 'Yes');
	if($artist_portfolio_wooproducts_nav == 'No'){
		$artist_portfolio_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$artist_portfolio_custom_css .='display: none;';
		$artist_portfolio_custom_css .='}';
	}

	// Slider Image
	$artist_portfolio_slider_bg_image = get_theme_mod('artist_portfolio_slider_bg_image');
	if($artist_portfolio_slider_bg_image != ''){
		$artist_portfolio_custom_css .='#slider {';
			$artist_portfolio_custom_css .=' background: url('.esc_attr($artist_portfolio_slider_bg_image).') no-repeat; background-size: 100% 100%;';
		$artist_portfolio_custom_css .='}';
		$artist_portfolio_custom_css .='@media screen and (max-width: 720px) {
				#slider {';
			$artist_portfolio_custom_css .=' background-size: cover;';
		$artist_portfolio_custom_css .='} }';
	}