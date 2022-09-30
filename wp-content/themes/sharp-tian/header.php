<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sharp-tian
 */
global $contecustomarr;
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sharp-tian' ); ?></a>
			<header id="masthead" class="site-header <?php echo esc_attr(get_theme_mod( 'sharp_tian_header_layout'));?>">	
				<div class="top_bar_info">
					<?php
						sharp_tian_social_section();
					?>
				</div>
				<div class="main_site_header">
					<div class="header_info">
						<div class="menu_call_button">
							<div class="call_button_info">
								<nav id="site-navigation" class="main-navigation">
									<button class="menu-toggle" id="navbar-toggle" aria-controls="primary-menu" aria-expanded="false">
										<i class="fa fa-bars"></i>
									</button>
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										)
									);
									?>							
								</nav>
								<div class="mobile_menu main-navigation" id="mobile_primary">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										)
									);
									?>
									<button class="menu-toggle" id="mobilepop"  aria-expanded="false">
										<i class="fa fa-close"></i>
									</button>
								</div>

								
								
							</div>
						</div>
					</div>
				</div>
			</header><!-- #masthead -->	
			
	<?php echo esc_attr(sharp_tian_breadcrumb_sections()); 
	if ( is_front_page() ) {
		if (  !empty( get_theme_mod( 'sharp_tian_contact_info_number') )  || !empty( get_theme_mod( 'sharp_tian_email_info_number') ) || !empty( get_theme_mod( 'display_social_icon') ) || !empty( get_theme_mod( 'social_icon_section_content') ) || !empty( get_theme_mod( 'featuredimage_slider') ) || !empty( get_theme_mod( 'featured_section_content') ) || !empty( get_theme_mod( 'about_main_title') ) || !empty( get_theme_mod( 'our_portfolio_main_title') ) || !empty( get_theme_mod( 'our_team_main_title') ) || !empty( get_theme_mod( 'our_testimonial_main_title') ) || !empty( get_theme_mod( 'our_sponsors_main_title') )) { ?>
			<div class="theme_section_info">
				<?php 
					$sharp_tian_diseble = get_theme_mod( 'sharp_tian_diseble' );
					$sharp_tian_diseble_array =  explode(",",$sharp_tian_diseble);

					$glodly_ordring = get_theme_mod( 'globalddd_ordering' );
					$glodly_sortable =  explode(",",$glodly_ordring);

					$orderarr = array('sharp_tian_featuredimage_slider','sharp_tian_featured_section','sharp_tian_widget_section','sharp_tian_about_section','sharp_tian_our_portfolio_section','sharp_tian_our_team_section','sharp_tian_our_testimonial_section','sharp_tian_our_sponsors_section');
					$orderarr = apply_filters('sharp_tian_order_settings', $orderarr);
					$global_ordering_array = get_theme_mod( 'global_ordering',$orderarr );
					?>
					<?php
					if(is_front_page()){
						if(!empty($glodly_ordring)){
							foreach ($glodly_sortable as $glodly_sortables => $glodly_sortable_value) { 
								if(!in_array( $glodly_sortable_value, $sharp_tian_diseble_array)){
									call_user_func($glodly_sortable_value);
								}		
							}
						}elseif(!empty($global_ordering_array)){
							foreach ($global_ordering_array as $global_ordering_arraydd) { 
								if(!in_array( $global_ordering_arraydd, $sharp_tian_diseble_array)){
									call_user_func($global_ordering_arraydd);
								}		
							}
						}
									
					} 
				?>
			</div>
			<?php
		}else{
			if (current_user_can('edit_theme_options')) {
				?>
				<div class="theme_section_info">
				<?php 
					$sharp_tian_diseble = get_theme_mod( 'sharp_tian_diseble' );
					$sharp_tian_diseble_array =  explode(",",$sharp_tian_diseble);

					$glodly_ordring = get_theme_mod( 'globalddd_ordering' );
					$glodly_sortable =  explode(",",$glodly_ordring);

					$orderarr = array('sharp_tian_featuredimage_slider','sharp_tian_featured_section','sharp_tian_widget_section','sharp_tian_about_section','sharp_tian_our_portfolio_section','sharp_tian_our_team_section','sharp_tian_our_testimonial_section','sharp_tian_our_sponsors_section');
					$orderarr = apply_filters('sharp_tian_order_settings', $orderarr);
					$global_ordering_array = get_theme_mod( 'global_ordering',$orderarr );
					?>
					<?php
					if(is_front_page()){
						if(!empty($glodly_ordring)){
							foreach ($glodly_sortable as $glodly_sortables => $glodly_sortable_value) { 
								if(!in_array( $glodly_sortable_value, $sharp_tian_diseble_array)){
									call_user_func($glodly_sortable_value);
								}		
							}
						}elseif(!empty($global_ordering_array)){
							foreach ($global_ordering_array as $global_ordering_arraydd) { 
								if(!in_array( $global_ordering_arraydd, $sharp_tian_diseble_array)){
									call_user_func($global_ordering_arraydd);
								}		
							}
						}
									
					} 
				?>
			</div>
				<?php
			}
		}
	}?>
	<div class="sharp_tian_container_data">
		<?php
		if(get_post_meta(get_the_ID(),'sidebar_select',true)){
			?>
			<div class="sharp_tian_container_info <?php echo esc_attr(get_post_meta(get_the_ID(),'sidebar_select',true));?> <?php echo esc_attr(get_theme_mod( 'sharp_tian_container_blog_layout','grid_view'));?> <?php echo esc_attr(get_theme_mod( 'sharp_tian_container_page_layout','content_boxed'));?>">
				<?php
		}else{
		?>
		<div class="sharp_tian_container_info <?php echo esc_attr(get_theme_mod( 'sharp_tian_post_sidebar_select_'.get_post_type(),'right_sidebar'));?> <?php echo esc_attr(get_theme_mod( 'sharp_tian_container_blog_layout','grid_view'));?> <?php echo esc_attr(get_theme_mod( 'sharp_tian_container_page_layout','content_boxed'));?>">
<?php }
