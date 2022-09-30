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
		<div class="about_section_info">
			<div class="about_data">
				<?php
				if(!empty(get_theme_mod( 'about_main_title',$contecustomarr['options']['about_main_title']))){
					?>
					<div class="about_main_title heading_main_title">
						<h2><?php echo esc_html(get_theme_mod( 'about_main_title',$contecustomarr['options']['about_main_title'] )); ?></h2>
						<span class="separator"></span>
					</div>
					<?php
				} 
				?>	
				<div class="about_main_discription">
					<p><?php echo esc_html(get_theme_mod('about_description',$contecustomarr['options']['about_description'])); ?></p>
				</div>
				<div class="about_section_container">
					
						<div class="about_featured_image scroll-element js-scroll slide-left">
							<div class="about-deep-pink-floating-img about-deep-pink-circle-xl"> </div>
							<div class="about-deep-pink-bracket-symbol">
								<span></span>
								<span></span>
							</div>
							<span class="about-deep-pink-circle-xl"> </span>
							<?php if(get_theme_mod( 'about_section_image')){ ?>
								<img src="<?php echo esc_attr(get_theme_mod( 'about_section_image')); ?>" alt="The Last of us">

							<?php }else{
								?>
								<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
								<?php
							} ?> 
						</div>
					
					<!-- Layout1 -->
					
						<div class="about_container_data scroll-element js-scroll slide-right">
							<div class="entry-header">
								<div class="about_title">
									<h2><?php echo esc_html(get_theme_mod( 'about_layout1_title',$contecustomarr['options']['about_layout1_title'])); ?></h2>
								</div>
								<div class="about_sub_heading">
									<p><?php echo esc_html(get_theme_mod( 'about_layout1_subheading',$contecustomarr['options']['about_layout1_subheading'])); ?></p>
								</div>
								<div class="about_description">
									<p><?php echo esc_html(get_theme_mod( 'about_layout1_description',$contecustomarr['options']['about_layout1_description'])); ?></p>
								</div>
								<div class="about_btn">
									<a class="buttons" href="<?php echo esc_attr(get_theme_mod( 'about_layout1_button_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'about_layout1_button')); ?></a>
								</div>
							</div>
						</div>
					
					<!-- Layout1 -->
				</div>
			</div>
		</div>