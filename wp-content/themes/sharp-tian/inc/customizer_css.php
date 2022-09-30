<?php
function sharp_tian_customize_css(){
	global $sharp_tian_fonttotal;
	$sharp_tian_body_fontfamily = get_theme_mod("sharp_tian_body_fontfamily",5);
    $sharp_tian_body_fontfamily = $sharp_tian_fonttotal[$sharp_tian_body_fontfamily];

    $sharp_tian_Heading_fontfamily = get_theme_mod("sharp_tian_Heading_fontfamily",5);
    $sharp_tian_Heading_fontfamily = $sharp_tian_fonttotal[$sharp_tian_Heading_fontfamily];

    $sharp_tian_Heading1_fontfamily = get_theme_mod("sharp_tian_Heading1_fontfamily",5);
    $sharp_tian_Heading1_fontfamily = $sharp_tian_fonttotal[$sharp_tian_Heading1_fontfamily];

    $sharp_tian_Heading2_fontfamily = get_theme_mod("sharp_tian_Heading2_fontfamily",5);
    $sharp_tian_Heading2_fontfamily = $sharp_tian_fonttotal[$sharp_tian_Heading2_fontfamily];

    $sharp_tian_Heading3_fontfamily = get_theme_mod("sharp_tian_Heading3_fontfamily",5);
    $sharp_tian_Heading3_fontfamily = $sharp_tian_fonttotal[$sharp_tian_Heading3_fontfamily];

    if($sharp_tian_body_fontfamily!='Select Font'){
		?>
		<style type="text/css">
	        body{
	            font-family: <?php echo  esc_attr( $sharp_tian_body_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($sharp_tian_Heading_fontfamily!='Select Font'){
		?>
		<style type="text/css">
	        h1, h2, h3, h4, h5{
	            font-family: <?php echo esc_attr( $sharp_tian_Heading_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($sharp_tian_Heading1_fontfamily!='Select Font'){
		?>
		<style type="text/css">
	        h1{
	            font-family: <?php echo esc_attr( $sharp_tian_Heading1_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($sharp_tian_Heading2_fontfamily!='Select Font'){
		?>
		<style type="text/css">
	        h2{
	            font-family: <?php echo esc_attr( $sharp_tian_Heading2_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($sharp_tian_Heading3_fontfamily!='Select Font'){
		?>
		<style type="text/css">
	        h3 {
	            font-family: <?php echo esc_attr( $sharp_tian_Heading3_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if(get_theme_mod('feature_product')){
    	?>
		<style>	
		footer#colophon {			
    		background:url(<?php echo  esc_attr(get_theme_mod('feature_product'));?>) rgb(0 0 0 / 0.75);
    		background-position: <?php echo esc_attr(get_theme_mod('sharp_tian_footer_bg_position','center center')); ?>;
    		background-size: <?php echo esc_attr(get_theme_mod('sharp_tian_footer_bg_size','cover')); ?>;
    		background-attachment: <?php echo esc_attr(get_theme_mod('sharp_tian_footer_bg_attachment','scroll')); ?>;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }else{
    	?>
		<style>	
		footer#colophon {
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_footer_bg_color','#fbe4e6'));?>;	
		}
		</style>
		<?php
    }
    if(get_theme_mod( 'sharp_tian_container_containe',true ) == ''){
    	?>
		<style type="text/css">
	    	.blog .sharp_tian_container_data {
			    display: none;
			}
	    </style>
        <?php
    }  
    if(get_theme_mod( 'sharp_tian_container_description',false ) == ''){
    	?>
		<style type="text/css">
	    	.blog article .entry-content {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'sharp_tian_container_date',true ) == ''){
    	?>
		<style type="text/css">
	    	span.posted-on {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'sharp_tian_container_authore',false ) == ''){
    	?>
		<style type="text/css">
			span.byline {
				display: none;
			}
		 </style>
        <?php
    }
    if(get_theme_mod( 'sharp_tian_container_category',true ) == ''){
    	?>
		<style type="text/css">
			span.cat-links {
				display: none;
			}
		 </style>
        <?php
    } 
    if(get_theme_mod( 'sharp_tian_container_comments',false ) == ''){
    	?>
		<style type="text/css">
			span.comments-link {
				display: none;
			}
		 </style>
        <?php
    }   
    if(get_theme_mod( 'sharp_tian_post_sidebar_width_'.get_post_type(),'30')){
    	$secondary_width = get_theme_mod('sharp_tian_post_sidebar_width_'.get_post_type(),'30');
		$primary_width   = absint( 100 - $secondary_width );
		?>
		<style type="text/css">
			aside.widget-area{
				width: <?php echo esc_attr($secondary_width);?>%;
			}
			main#primary{
				width: <?php echo esc_attr($primary_width);?>%;
				background: #eeeeee;
			}
		</style>
		<?php
	}
	
	?>
		<style type="text/css">
			.top_bar_info{
			    background-color: <?php echo esc_attr(get_theme_mod('header1_top_bar_bg_color','#fbe4e6')); ?>;
			    color: <?php echo esc_attr(get_theme_mod('header1_top_bar_text_color','#000000')); ?>;
			}
			.top_bar_info .header_topbar_info .header_logo .site-title a {
			    color: <?php echo esc_attr(get_theme_mod('header1_top_bar_sitetitle_color','#214462')); ?>;
			}
			.main_site_header{
				background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_header1_bg_color','#fff')); ?>;
				color: <?php echo esc_attr(get_theme_mod('sharp_tian_header1_text_color','#214462')); ?>;;
			}
			.main_site_header a {
			    color: <?php echo esc_attr(get_theme_mod('sharp_tian_header1_Link_color','#222222')); ?>;
			}
			.main_site_header a:hover {
			    color: <?php echo esc_attr(get_theme_mod('sharp_tian_header1_linkhover_color','#a06224')); ?>;
			}
			.header_top_bar, .header_social_icon{
				display: block;
				padding-top: 10px;
			}
			.social_data {
			    padding: 10px 0;
			}

		</style>
		<?php
	
	if(get_theme_mod( 'sharp_tian_header_width_layout','content_width') == 'content_width'){
		?>
		<style type="text/css">
			.header_info {
				max-width: <?php echo esc_attr(get_theme_mod('sharp_tian_header_container_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'sharp_tian_top_bar_width_layout','content_width') == 'content_width'){
		?>
		<style type="text/css">
			.header_topbar_info {
				max-width: <?php echo esc_attr(get_theme_mod('sharp_tian_top_bar_container_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'sharp_tian_container_page_layout','content_boxed') == 'content_boxed'){
		?>
		<style type="text/css">
			main#primary{
			    background: <?php echo esc_attr(get_theme_mod('sharp_tian_content_boxed_bg_color','#eeeeee')); ?>;
			}
			aside#secondary .widget{
				background: <?php echo esc_attr(get_theme_mod('sharp_tian_content_boxed_bg_color','#eeeeee')); ?>;
			}
			.main_container {
			    padding: 10px;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'sharp_tian_container_page_layout','content_boxed') == 'boxed_layout'){
		?>
		<style type="text/css">
			.sharp_tian_container_info {
			    background: <?php echo esc_attr(get_theme_mod('sharp_tian_boxed_layout_bg_color','#ffffff')); ?>;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'sharp_tian_breadcrumb_bg_image')){
		?>
		<style type="text/css">
			.breadcrumb_info{
				background: url(<?php echo esc_attr(get_theme_mod('sharp_tian_breadcrumb_bg_image'))?>) rgb(0 0 0 / 0.75);
			}
		</style>
		<?php
	}else{
		?>
		<style type="text/css">
			.breadcrumb_info{
				background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_breadcrumb_bg_color','#c8c9cb'))?>;
			}
		</style>
		<?php
	}
	if(get_post_meta(get_the_ID(),'sharp_tian_breadcrumb_select',true)=='no'){
		?>
		<style>			
			.breadcrumb_info{
			    display: none;
			}	   
		</style>
		<?php
	}
	if(get_theme_mod( 'display_scroll_button',true) == ''){
		?>
		<style>			
			.scrolling-btn {
    			display: none;
			}	   
		</style>
		<?php
	}
	if(get_theme_mod('featuredimage_slider_enable','disable') == 'disable'){
		?>
		<style>			
			.featured-section_data {
			    /*margin-top: 1.25rem;*/
    		}   
		</style>
		<?php
	}		
	if(get_theme_mod('our_testimonial_background_image')){
    	?>
		<style>	
		.our_testimonial_section {			
    		background:url(<?php echo  esc_attr(get_theme_mod('our_testimonial_background_image'));?>) rgb(0 0 0 / 0.75);
    		background-position: <?php echo esc_attr(get_theme_mod('our_testimonial_bg_position','center center')); ?>;
    		background-size: <?php echo esc_attr(get_theme_mod('our_testimonial_bg_size','scroll')); ?>;
    		background-attachment: <?php echo esc_attr(get_theme_mod('our_testimonial_bg_attachment','cover')); ?>;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }else{
    	?>
		<style>	
		.our_testimonial_section {
			background: <?php echo esc_attr(get_theme_mod('our_team_testimonial_bg_color','#f6f6f6')); ?>;
		}
		</style>
		<?php
    }
    if(get_theme_mod('sharp_tian_container_page_layout','content_boxed') == 'boxed_layout'){
    	?>
		<style>	
    	.site-branding, .call_button_info, .breadcrumb_data, .sharp_tian_container_info.boxed_layout, .sharp_tian_container_info.content_boxed, .featured_section_info, .about_data, .our_portfolio_data, .our_team_info, .our_testimonial_info, .our_services_info, .our_sponsors_info, .widget_section {
		    max-width: <?php echo esc_attr(get_theme_mod('sharp_tian_container_width','1100')); ?>px;
		    margin-left: auto;
		    margin-right: auto;
		}
		</style>
		<?php
    }
    if(get_theme_mod('sharp_tian_container_page_layout','content_boxed') == 'content_boxed'){
    	?>
		<style>	
    	.site-branding,.call_button_info, .breadcrumb_data, .sharp_tian_container_info.boxed_layout, .sharp_tian_container_info.content_boxed, .featured_section_info, .about_data, .our_portfolio_data, .our_team_info, .our_testimonial_info, .our_services_info, .our_sponsors_info, .widget_section {
		    max-width: <?php echo esc_attr(get_theme_mod('sharp_tian_container_width','1100')); ?>px;
		    margin-left: auto;
		    margin-right: auto;
		}
		</style>
		<?php
    }
    if(get_theme_mod('sharp_tian_footer_width_layout','content_width')=='content_width'){
		?>
		<style>
			footer#colophon .site-info, footer#colophon .container_footer {
			    max-width: <?php echo esc_attr(get_theme_mod('sharp_tian_footer_container_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
    if(get_theme_mod('about_bg_image','')){
    	?>
		<style>	
    		.about_section_info{
    			background:url(<?php echo  esc_attr(get_theme_mod('about_bg_image'));?>) rgb(0 0 0 / 0.75);
    			background-position: <?php echo esc_attr(get_theme_mod('sharp_tian_about_bg_position','center center')); ?>;
	    		background-size: <?php echo esc_attr(get_theme_mod('sharp_tian_about_bg_size','cover')); ?>;
	    		background-attachment: <?php echo esc_attr(get_theme_mod('sharp_tian_about_bg_attachment','fixed')); ?>;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }else{
    	?>
		<style>	
    		.about_section_info{
    			background: <?php echo esc_attr(get_theme_mod('about_bg_color','#f2edf2')); ?>;
    		}
		</style>
		<?php
    }
    if(get_theme_mod('featured_section_bg_image','')){
    	?>
		<style>	
    		.featured-section_data{
    			background:url(<?php echo  esc_attr(get_theme_mod('featured_section_bg_image'));?>) rgb(0 0 0 / 0.75);
    			background-position: <?php echo esc_attr(get_theme_mod('featured_section_bg_position','center center')); ?>;
	    		background-size: <?php echo esc_attr(get_theme_mod('featured_section_bg_size','cover')); ?>;
	    		background-attachment: <?php echo esc_attr(get_theme_mod('featured_section_bg_attachment','scroll')); ?>;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }else{
    	?>
		<style>	
    		.featured-section_data{
     			background-color: <?php echo esc_attr(get_theme_mod('featured_section_main_bg_color','#ffffff')); ?>;
    		}
		</style>
		<?php
    }

    if(get_theme_mod('our_portfolio_bg_image','')){
    	?>
		<style>	
    		.our_portfolio_info{
    			background:url(<?php echo  esc_attr(get_theme_mod('our_portfolio_bg_image'));?>) rgb(0 0 0 / 0.75);
    			background-position: <?php echo esc_attr(get_theme_mod('our_portfolio_bg_position','center center')); ?>;
	    		background-size: <?php echo esc_attr(get_theme_mod('our_portfolio_bg_size','cover')); ?>;
	    		background-attachment: <?php echo esc_attr(get_theme_mod('our_portfolio_bg_attachment','scroll')); ?>;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }else{
    	?>
		<style>	
    		.our_portfolio_info{
    			background: <?php echo esc_attr(get_theme_mod('our_portfolio_bg_color','#ffffff')); ?>;
    		}
		</style>
		<?php
    }
    if(get_theme_mod('our_team_bg_image','')){
    	?>
		<style>	
    		.our_team_section{
    			background:url(<?php echo  esc_attr(get_theme_mod('our_team_bg_image'));?>) rgb(0 0 0 / 68%);
    			background-position: <?php echo esc_attr(get_theme_mod('sharp_tian_our_team_bg_position','center center')); ?>;
	    		background-size: <?php echo esc_attr(get_theme_mod('sharp_tian_our_team_bg_size','cover')); ?>;
	    		background-attachment: <?php echo esc_attr(get_theme_mod('sharp_tian_our_team_bg_attachment','scroll')); ?>;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }else{
    	?>
		<style>	
    		.our_team_section{
    			background: <?php echo esc_attr(get_theme_mod('our_team_bg_color','#f2edf2')); ?>;
    		}
		</style>
		<?php
    }
  
	?>
	<style>	

		.sharp_tian_container_info.no_sidebar main#primary{
			width: 100%;
		}
		.main-navigation .nav-menu ul.sub-menu{
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_submenu_bg_color','rgba(0,0,0,0.6)')); ?>;
		}
		.blog main.site-main.content_boxed .main_containor.grid_view article{
		    background: <?php echo esc_attr(get_theme_mod('sharp_tian_content_boxed_bg_color','#eeeeee')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('sharp_tian_content_boxed_border_radius','8')); ?>px;
		}
		.breadcrumb_info{
			color: <?php echo esc_attr(get_theme_mod('sharp_tian_breadcrumb_text_color','#333333')); ?>; 
			background-position: <?php echo esc_attr(get_theme_mod('sharp_tian_img_bg_position','center center')); ?>;
		    background-attachment: <?php echo esc_attr(get_theme_mod('sharp_tian_breadcrumb_bg_attachment','scroll'));?>;
		    background-size: <?php echo esc_attr(get_theme_mod('sharp_tian_breadcrumb_bg_size','cover'));?>;
		}
		.blog main#primary {
		    background: none;
		    border-radius: none;
		}
		body {
			font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_body_font_size','15')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharp_tian_body_font_weight','400')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharp_tian_body_text_transform','capitalize')); ?>;
		} 
		body a {
			 color: <?php echo esc_attr(get_theme_mod('sharp_tian_link_color','#214462')); ?>;
		} 
		body a:hover {
			 color: <?php echo esc_attr(get_theme_mod('sharp_tian_link_hover_color','#000000')); ?>;
		} 
		h1 {
			font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_heading1_font_size','35'));?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharp_tian_heading1_font_weight','bold')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharp_tian_heading1_text_transform','capitalize')); ?>;
		}
		h2 {
			font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_heading2_font_size','28')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharp_tian_heading2_font_weight','bold')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharp_tian_heading2_text_transform','capitalize')); ?>;
		}
		h3 {
			font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_heading3_font_size','25')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharp_tian_heading3_font_weight','400')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharp_tian_heading3_text_transform','capitalize')); ?>;
		}
		img.custom-logo{
			width: <?php echo esc_attr(get_theme_mod('sharp_tian_logo_width','150'));?>px;
		}
		.call_menu_btn{
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_callmenu_btn_bg_color','#ffffff')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('sharp_tian_callmenu_btn_color','#273641')); ?> !important;
		    border: 2px solid <?php echo esc_attr(get_theme_mod('sharp_tian_call_btn_border_color','#273641')); ?>;
		}
		.call_menu_btn:hover {
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_callmenu_btn_bghover_color','#273641')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('sharp_tian_call_btn_texthover_color','#ffffff')); ?> !important;
		}
		header#masthead .current-menu-ancestor > a, header#masthead .current-menu-item > a, header#masthead .current_page_item > a {
			color: <?php echo esc_attr(get_theme_mod('sharp_tian_menu_active_color','#7fa7c5')); ?>;
		}
		aside.widget-area section h2, aside.widget-area section h1, aside.widget-area section h3, label.wp-block-search__label {
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_sidebar_heading_bg_color','#273641')); ?>;
			color: <?php echo esc_attr(get_theme_mod('sharp_tian_sidebar_heading_text_color','#ffffff')); ?>;
			padding: 10px;
			margin: 0px;
		}			
		button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled {
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_button_bg_color','#273641')); ?> ;
			color: <?php echo esc_attr(get_theme_mod('sharp_tian_button_text_color','#ffffff')); ?> ;
			border: <?php echo esc_attr(get_theme_mod('sharp_tian_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('sharp_tian_button_border_color','#273641')); ?> ;
			border-radius: <?php echo esc_attr(get_theme_mod('sharp_tian_button_border_radius','3')); ?>px;
			padding: <?php echo esc_attr(get_theme_mod('sharp_tian_button_padding','8px 15px')); ?>;
		}
		button:hover, input[type="button"]:hover , input[type="reset"]:hover , input[type="submit"]:hover , .wp-block-search .wp-block-search__button:hover, .nav-previous a:hover, .buttons:hover, .nav-next a:hover, .woocommerce a.button:hover, .woocommerce button:hover, .woocommerce .single-product button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt.disabled:hover {			
			color: <?php echo esc_attr(get_theme_mod('sharp_tian_button_texthover_color','#214462')); ?> ;
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_button_bg_hover_color','#ffffff')); ?> ;
		}
		button::before, input[type="button"]::before, input[type="reset"]::before, input[type="submit"]::before, .wp-block-search .wp-block-search__button::before, .nav-previous a::before, .nav-next a::before,.buttons::before, .woocommerce a.button::before, .woocommerce button::before, .woocommerce .single-product button::before, .woocommerce button.button.alt::before, .woocommerce a.button.alt::before,.woocommerce button.button.alt.disabled::before {
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_button_bg_hover_color','#ffffff')); ?> ;
		}
		.entry-meta span {
		    color: <?php echo esc_attr(get_theme_mod('sharp_tian_link_color','#214462')); ?>;
		}
		.sharp_tian_container_data {
		    background: <?php echo esc_attr(get_theme_mod('sharp_tian_container_bg_color','#ffffff')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('sharp_tian_container_text_color','#000000')); ?>;
		}

		.main_containor.grid_view{
			    display: grid;
			    grid-template-columns: repeat(<?php echo esc_attr(get_theme_mod('sharp_tian_container_grid_view_col','3'));?>, 1fr);
			    grid-column-gap :<?php echo esc_attr(get_theme_mod('sharp_tian_container_grid_view_col_gap','20'));?>px;
		}
		.featured_section_info .featured_content .featured-thumbnail i {
		    font-size: <?php echo esc_attr(get_theme_mod('featured_section_icon_size','35'));?>px;
		}
		section#breadcrumb-section a {
		    color: <?php echo esc_attr(get_theme_mod('sharp_tian_breadcrumb_link_color','#273641')); ?>;
		}
		.sharp_tian_title_underline h2:before, .about_main_title h2:before, .our_portfolio_main_title h2:before, .our_team_main_title h2:before, .our_testimonial_main_title h2:before, .our_services_main_title h2:before, .our_sponsors_title h2:before{
			background-color: <?php echo esc_attr(get_theme_mod('design_heding_underline_color','#273641')); ?>;
		}
		.sharp_tian_title_underline h2:after, .about_main_title h2:after, .our_portfolio_main_title h2:after, .our_team_main_title h2:after, .our_testimonial_main_title h2:after, .our_services_main_title h2:after, .our_sponsors_title h2:after, .featured-section_title h2:after, .blog_main_title h2:after  {
			background-color: <?php echo esc_attr(get_theme_mod('design_heding_underline_color','#273641')); ?>;
		}
		/*--------------------------------------------------------------
		# Social Info
		--------------------------------------------------------------*/
		.social_icon i:hover{
			background-color: <?php echo esc_attr(get_theme_mod('social_icon_bg_hover_color','#ef7a86')); ?>;
		}
		a.social_icon{
			color: <?php echo esc_attr(get_theme_mod('social_icon_color','#ffffff')); ?>;
		}
		.social_icon i{
			background-color: <?php echo esc_attr(get_theme_mod('social_icon_bg_color','#273641')); ?>;
		}
		a.social_icon:hover {
			color: <?php echo esc_attr(get_theme_mod('social_icon_hover_color','#214462')); ?>;
		}

		/*--------------------------------------------------------------
		# featured slider
		--------------------------------------------------------------*/
		.featured_slider_disc, .featured_slider_title h1 {
			color: <?php echo esc_attr(get_theme_mod('featured_slider_text_color','#ffffff')); ?>;
		}
		.featured_slider_image .owl-nav button{
			color: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_text_color','#ffffff')); ?> !important;
		    background: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_bg_color','#273641')); ?> !important;

		}
		.featured_slider_image button.owl-prev:hover, 
		.featured_slider_image button.owl-next:hover{
		    background: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_bghover_color','#4f2d4f ')); ?> !important;
			color: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_texthover_color','#fff')); ?> !important;
		}
		.featured_slider_image .owl-nav button:before{
			content: unset !important; 
		}

		/*--------------------------------------------------------------
		# featured section #273641
		--------------------------------------------------------------*/
		.section-featured-wrep{
			background: <?php echo esc_attr(get_theme_mod('featured_section_bg_color','#e5d1e5')); ?>;	
			color: <?php echo esc_attr(get_theme_mod('featured_section_color','#273641')); ?>;	
		}
		.featured-section_data .featured_content .featured-icon{
			color:  <?php echo esc_attr(get_theme_mod('featured_section_icon_color','#273641')); ?>;
		}
		.featured-section_data .section-featured-wrep:hover i {
    		color: <?php echo esc_attr(get_theme_mod('featured_section_icon_hover_color','#134a66')); ?>; 
		}
		.featured-section_data{
			margin: <?php echo esc_attr(get_theme_mod('featured_section_margin','-100px 0px 0px 0px')); ?>;
			color: <?php echo esc_attr(get_theme_mod('featured_section_main_text_color','#333333')); ?>;	
		}
		.section-featured-wrep:hover{
			background: <?php echo esc_attr(get_theme_mod('featured_section_bg_hover_color','#c691ba')); ?>;	
			color: <?php echo esc_attr(get_theme_mod('featured_section_text_hover_color','#ffffff')); ?>;	
		}
		/*--------------------------------------------------------------
		# about section
		--------------------------------------------------------------*/
		.about_main_title h2{
			color: <?php echo esc_attr(get_theme_mod('about_title_text_color','#333333')); ?>;
		}
		.about_section_info .about_main_discription p{
			color: <?php echo esc_attr(get_theme_mod('about_text_color','#273641')); ?>;
			line-height: 160%;
		}

		/*--------------------------------------------------------------
		# our portfolio section
		--------------------------------------------------------------*/
		.our_portfolio_main_title  h2{
			color: <?php echo esc_attr(get_theme_mod('our_portfolio_title_color','#333333')); ?>;
		}
		.our_portfolio_info{
			color: <?php echo esc_attr(get_theme_mod('our_portfolio_text_color','#333')); ?>;	
		}
		.our_portfolio_info .our_portfolio_container .our_portfolio_title{
			color: <?php echo esc_attr(get_theme_mod('our_portfolio_container_text_color','#ffffff')); ?>;	
		}
		.our_portfolio_btn a i{
			color: <?php echo esc_attr(get_theme_mod('our_portfolio_icon_color','#214462')); ?>;
			background: <?php echo esc_attr(get_theme_mod('our_portfolio_icon_bg_color','#ffffff')); ?>;		
		}
		.our_port_containe{
			background: <?php echo esc_attr(get_theme_mod('our_portfolio_container_bg_color','rgb(209,136,143,0.56)'));?>;
			border: 10px solid transparent !important;
			background-clip: padding-box !important;		
		}

		/*--------------------------------------------------------------
		# our team
		--------------------------------------------------------------*/
		.our_team_data .our_team_container .our_teams_contain{
			color: <?php echo esc_attr(get_theme_mod('our_team_contain_text_color','#273641')); ?>;	
		}
		.our_team_section .our_team_data .our_team_container {
		    background-color: <?php echo esc_attr(get_theme_mod('our_team_contain_bg_color','#fff')); ?>;
		}
		.our_team_section .our_team_data .our_team_container:hover {
		    background-color: <?php echo esc_attr(get_theme_mod('our_team_contain_bg_hover_color','#e0babd')); ?>;
		}
		.our_team_container:hover .our_team_title a, .our_team_container:hover .our_team_headline p {
		    color: <?php echo esc_attr(get_theme_mod('our_team_text_hover_color','#273641')); ?>;
		}
		.our_team_icon_contain .our_team_contain_info .our_team_social_icon i{
		    background: <?php echo esc_attr(get_theme_mod('our_team_icon_background_color','#273641')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('our_team_icon_color','#ffffff')); ?>;
		}
		.our_team_icon_contain .our_team_contain_info .our_team_social_icon i:hover {
		    background: <?php echo esc_attr(get_theme_mod('our_team_icon_bg_hover_color','#d1a33a')); ?>;
		    color:  <?php echo esc_attr(get_theme_mod('our_team_icon_hover_color','#fff')); ?>;
		}
		.our_team_section .our_team_main_title{
		    color:  <?php echo esc_attr(get_theme_mod('our_team_text_color','#333')); ?>;
		}
		.our_team_icon_contain a{
		    color:  <?php echo esc_attr(get_theme_mod('our_team_link_color','#273641')); ?>;
		}
		.our_team_icon_contain .our_team_title a:hover{
		    color:  <?php echo esc_attr(get_theme_mod('our_team_link_hover_color','#00846a')); ?>;
		}

		/*--------------------------------------------------------------
		# our testimonial
		--------------------------------------------------------------*/

		.our_testimonial_section .testimonial_title h2, .our_testimonial_section .our_testimonial_main_disc p{			
			color:  <?php echo esc_attr(get_theme_mod('our_testimonial_text_color','#333')); ?>;
		}
		.our_testimonial_section .our_testimonial_data .our_testimonials_container p{
		    color: <?php echo esc_attr(get_theme_mod('share-and-save-cart-for-woocommerce','#273641')); ?>;
		    background: unset;
		    margin-top: 5px;
		}
		.our_testimonial_section .our_testimonial_info .testinomial_owl_slider .our_testimonial_data_info{
		    background: <?php echo esc_attr(get_theme_mod('our_testimonial_alpha_color_setting','#ffffff')); ?>;
		    padding: 30px;
		}
		.our_testimonial_section .testinomial_owl_slider .owl-nav button{
		    background: <?php echo esc_attr(get_theme_mod('our_testimonial_arrow_bg_color','#273641')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('our_testimonial_arrow_text_color','#ffffff')); ?>;

		}

		.our_testimonial_section button.owl-prev:hover,
		.our_testimonial_section button.owl-next:hover{			
		    background: <?php echo esc_attr(get_theme_mod('our_testimonial_arrow_bghover_color','#5c355d ')); ?> !important;
			color:  <?php echo esc_attr(get_theme_mod('our_testimonial_arrow_texthover_color','#fff')); ?> !important;
		}
		.our_testimonial_section .owl-nav button:before{
			content: unset !important; 
		}
		.our_testimonial_section .testinomial_owl_slider .testimonials_title h3{			
			color:  <?php echo esc_attr(get_theme_mod('our_testimonial_headline_color','#404040')); ?>;
			margin: 0;
    		margin-bottom: 5px;
		}
		.our_testimonial_section .testinomial_owl_slider .testimonials_title h4{			
			color:  <?php echo esc_attr(get_theme_mod('our_testimonial_subheadline_color','#404040')); ?>;
			margin: 0;
    		margin-bottom: 10px;
		}

		/*--------------------------------------------------------------
		# our services
		--------------------------------------------------------------*/
		.our_services_img i {
		    font-size: <?php echo esc_attr(get_theme_mod('our_services_icon_size','40')); ?>px !important;
		}
		.our_services_container a{
		    color:  <?php echo esc_attr(get_theme_mod('our_services_link_color','#273641')); ?>;
		}
		.our_services_container .our_services_title:hover a{
		    color:  <?php echo esc_attr(get_theme_mod('our_services_link_hover_color','#273641')); ?>;
		}
		.our_services_data{
			/*color: <?php //echo esc_attr(get_theme_mod('our_services_contain_text_color','#273641')); ?>;*/
			background-color: <?php echo esc_attr(get_theme_mod('our_services_contain_bg_color','#eeeeee')); ?>;
			border-bottom: 8px solid <?php echo esc_attr(get_theme_mod('our_services_boredr_color','#ffffff')); ?>;
		}
		.our_services_section{
			color: <?php echo esc_attr(get_theme_mod('our_services_text_color','#000000')); ?>;			
		}
		.our_services_data:hover {
		    border-color: <?php echo esc_attr(get_theme_mod('our_services_border_hover_color','#273641')); ?>;
		    background-color: <?php echo esc_attr(get_theme_mod('our_services_contain_bg_hover_color','#eeeeee'));?>;
		    color: <?php echo esc_attr(get_theme_mod('our_services_contain_text_hover_color','#273641')); ?>;
		}
		.our_services_data .our_services_container{
			color: <?php echo esc_attr(get_theme_mod('our_services_contain_text_color','#273641')); ?>;
		}
		.our_services_section .our_services_section_data .our_services_img i{
		    color: <?php echo esc_attr(get_theme_mod('our_services_icon_color','#000000')); ?>;

		}
		.our_services_section .our_services_section_data .our_services_data:hover i{
		    color: <?php echo esc_attr(get_theme_mod('our_services_icon_hover_color','#000000')); ?>;
		}
		/*--------------------------------------------------------------
		# our Sponsors
		--------------------------------------------------------------*/	
		.our_sponsors_section {
		    background: <?php echo esc_attr(get_theme_mod('our_sponsors_bg_color','#f2edf2')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('our_sponsors_text_color','#000000')); ?>;
		}
		.our_sponsors_img:hover{
			background-color: <?php echo esc_attr(get_theme_mod('our_sponsors_img_hover_bg_color','#ffffff')); ?>;
		}	
		.our_sponsors_section .our_sponsors_contain .owl-nav button{
			color: <?php echo esc_attr(get_theme_mod('our_sponsors_arrow_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('our_sponsors_arrow_bg_color','#273641')); ?>;
		}	
		.our_sponsors_section .our_sponsors_contain button.owl-prev:hover,
		.our_sponsors_section .our_sponsors_contain button.owl-next:hover{
			background-color: <?php echo esc_attr(get_theme_mod('our_sponsors_arrow_bghover_color','#4f2d4f')); ?>;
			color: <?php echo esc_attr(get_theme_mod('our_sponsors_arrow_texthover_color','#fff')); ?>;
		}
		.our_sponsors_section .owl-nav button:before{
			content: unset !important; 
		}

		/*--------------------------------------------------------------
		# footer
		--------------------------------------------------------------*/
		footer#colophon a {
		    color: <?php echo esc_attr(get_theme_mod('sharp_tian_footer_link_color','#273641')); ?>;
		}
		footer#colophon a:hover {
		    color: <?php echo esc_attr(get_theme_mod('sharp_tian_footer_link_hover_color','#afafaf')); ?>;
		}
		.scrolling-btn{
			background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_scroll_button_bg_color','#774079'));?>;
			color: <?php echo esc_attr(get_theme_mod('sharp_tian_scroll_button_color','#ffffff')); ?>;
		}

		

		@media only screen and (max-width: 768px){
			.main-navigation .sub-menu li, .main-navigation ul ul ul.toggled-on li {
			    background: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_submenu_bg_color','#957b45 ')); ?> !important;
			}
			body {
				font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_font_size','14')); ?>px;
			} 	
			h1 {
				font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_heading1_font_size','20'));?>px;				
			}
			h2 {
				font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_heading2_font_size','22')); ?>px;
			}
			h3 {
				font-size: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_heading3_font_size','20')); ?>px;
			}
			.mobile_menu {
		        background-color: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_navmenu_bg_color','#273641'));?>;
		    }
		    .mobile_menu ul#primary-menu li a {
		        color: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_link_color','#ffffff'));?>;
		    }
		    .current-menu-ancestor > a, .current-menu-item > a, .current_page_item > a {
				color: <?php echo esc_attr(get_theme_mod('sharp_tian_mobile_navmenu_active_color','#cb9b31 ')); ?> !important;
			}

		}
	</style>
	<?php
	if (!class_exists('WooCommerce'))  return;
    //if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if(is_product() || is_shop() || is_cart() || is_checkout()){
			if(empty(get_post_meta(get_the_ID(),'sidebar_select',true))){
		        ?>
		        <style> 
			        aside.widget-area{
			            display: none;
			        }
			        main#primary {
					    width: 100% !important;
					}
		        </style>
		        <?php
		    }
	    }
	//}
}
add_action( 'wp_head', 'sharp_tian_customize_css');