<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharp-tian
 */
global $contecustomarr;
?>
<div class="header_topbar_info">
	<div class="header_top_bar">
	<?php if(get_theme_mod( 'sharp_tian_contact_info_number',$contecustomarr['options']['sharp_tian_contact_info_number'] ) || get_theme_mod( 'sharp_tian_email_info_number',$contecustomarr['options']['sharp_tian_email_info_number'] )){ ?>
	
		<?php if(!empty(get_theme_mod( 'sharp_tian_contact_info_number',$contecustomarr['options']['sharp_tian_contact_info_number']))){ ?>
				<div class="contact_data">
					<div class="contact_icon">
						<i class="fa fa-phone"></i>
					</div>
					<div class="contact_info">
						<p><?php echo esc_html(get_theme_mod( 'sharp_tian_contact_info_number',$contecustomarr['options']['sharp_tian_contact_info_number'] )); ?></p>
					</div>
				</div>
				
		<?php } 
		if(!empty(get_theme_mod( 'sharp_tian_email_info_number',$contecustomarr['options']['sharp_tian_email_info_number'] ))){ ?>
			<div class="email_data">
				<div class="email_icon">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="email_info">
					<p><?php echo esc_html(get_theme_mod( 'sharp_tian_email_info_number',$contecustomarr['options']['sharp_tian_email_info_number'] )); ?></p>
				</div>
			</div>
		<?php } 
	}?>
	</div>
	<div class="header_data">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
			<div class="header_logo">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				endif;
				$sharp_tian_description = get_bloginfo( 'description', 'display' );
				if ( $sharp_tian_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo esc_html($sharp_tian_description); ?></p>
				<?php endif; ?>
			</div>
		</div><!-- .site-branding -->
	</div>
	<div class="header_social_icon">
	<?php 
	if(get_theme_mod( 'display_social_icon') != ''){ 
		?>
			<div class="social_icon_info">
				<div class="social_data">
					<?php 
					$social_icon_section_content  = get_theme_mod( 'social_icon_section_content',$contecustomarr['options']['social_icon_section_content']);
					if ( ! empty( $social_icon_section_content ) ) {
						$social_icon_section_content = json_decode( $social_icon_section_content );
						foreach ( $social_icon_section_content as $info_item ) {
							if(get_theme_mod( 'social_icon_section_content',$contecustomarr['options']['social_icon_section_content']) != ''){
								?>
								<a class="social_icon" href="<?php echo esc_attr($info_item->link);?>" target="_blank">
									<i class="fa <?php echo esc_attr($info_item->icon_value);?>"></i>
								</a>
								<?php
							}
						}
					} ?>
				</div>
			</div>
		
		<?php 
	}
	?>
	</div>
</div>