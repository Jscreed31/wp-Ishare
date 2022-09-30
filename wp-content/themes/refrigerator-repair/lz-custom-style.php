<?php 

	$refrigerator_repair_custom_style = '';

	// Logo Size
	$refrigerator_repair_logo_top_padding = get_theme_mod('refrigerator_repair_logo_top_padding');
	$refrigerator_repair_logo_bottom_padding = get_theme_mod('refrigerator_repair_logo_bottom_padding');
	$refrigerator_repair_logo_left_padding = get_theme_mod('refrigerator_repair_logo_left_padding');
	$refrigerator_repair_logo_right_padding = get_theme_mod('refrigerator_repair_logo_right_padding');

	if( $refrigerator_repair_logo_top_padding != '' || $refrigerator_repair_logo_bottom_padding != '' || $refrigerator_repair_logo_left_padding != '' || $refrigerator_repair_logo_right_padding != ''){
		$refrigerator_repair_custom_style .=' .logo {';
			$refrigerator_repair_custom_style .=' padding-top: '.esc_attr($refrigerator_repair_logo_top_padding).'px; padding-bottom: '.esc_attr($refrigerator_repair_logo_bottom_padding).'px; padding-left: '.esc_attr($refrigerator_repair_logo_left_padding).'px; padding-right: '.esc_attr($refrigerator_repair_logo_right_padding).'px;';
		$refrigerator_repair_custom_style .=' }';
	}

	// Site Title Font Size
	$refrigerator_repair_slider_hide_show = get_theme_mod('refrigerator_repair_slider_hide_show',false);
	if( $refrigerator_repair_slider_hide_show == false){
		$refrigerator_repair_custom_style .=' .page-template-custom-home-page #header {';
			$refrigerator_repair_custom_style .=' border-bottom: 1px solid #008aff;';
		$refrigerator_repair_custom_style .=' }';
	}

	// Header Image
	$header_image_url = refrigerator_repair_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$refrigerator_repair_custom_style .=' #inner-pages-header {';
			$refrigerator_repair_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$refrigerator_repair_custom_style .=' }';
	} else {
		$refrigerator_repair_custom_style .=' #inner-pages-header {';
			$refrigerator_repair_custom_style .=' background: linear-gradient(0deg,#000000f0,#000000f0 80%) no-repeat; ';
		$refrigerator_repair_custom_style .=' }';
	}

	$refrigerator_repair_slider_hide_show = get_theme_mod('refrigerator_repair_slider_hide_show',false);
	if( $refrigerator_repair_slider_hide_show == true){
		$refrigerator_repair_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$refrigerator_repair_custom_style .=' display:none;';
		$refrigerator_repair_custom_style .=' }';
	} else {
		$refrigerator_repair_custom_style .=' #features-section {';
			$refrigerator_repair_custom_style .=' position: static; margin: 20px 0';
		$refrigerator_repair_custom_style .=' }';
	}