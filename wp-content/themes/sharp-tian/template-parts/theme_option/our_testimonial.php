<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharp-tian
 */
global $contecustomarr;
$featuredimage_slider  = get_theme_mod( 'our_testimonial_section_content',$contecustomarr['options']['our_testimonial_section_content']);
$featured_slides = json_decode( $featuredimage_slider );
	?>
		<div class="our_testimonial_section">
			<div class="our_testimonial_info scroll-element js-scroll fade-in-bottom">
				<div class="our_testimonial_main_title">
					<div class="testimonial_title heading_main_title">
						<h2><?php echo esc_html(get_theme_mod( 'our_testimonial_main_title',$contecustomarr['options']['our_testimonial_main_title'] )); ?></h2>
						<span class="separator"></span>
					</div>
					<div class="our_testimonial_main_disc">
						<p><?php echo esc_html(get_theme_mod( 'our_testimonial_main_discription',$contecustomarr['options']['our_testimonial_main_discription']));?></p>
					</div>
				</div>
				<div class="owl-carousel owl-theme testinomial_owl_slider" id="testinomial_owl_slider">
					<?php
					foreach ( $featured_slides as $info_item ) { 
							?>
							<div class="our_testimonial_data" >
								<div class="our_testimonial_data_info">
										<div class="testimonials_image">
											<div class="image_testimonials">
												<?php
												if(!empty($info_item->image_url)){
													?>
													<img src="<?php echo esc_attr($info_item->image_url);  ?>" alt="">
													<?php
												}else{
													?>
													<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="">								
													<?php
												}
												?>
											</div>
										</div>	
									<div class="testimonials_content">
										<div class="our_testimonials_container">
											<p><?php echo esc_html($info_item->text) ?></p>
											<div class="testimonials_title">
												<h3><?php echo esc_html($info_item->title) ?></h3>
												<h4><?php echo  esc_attr($info_item->subtitle) ?></h4>
											</div>
										</div>
										
										
									</div>												
								</div>						
							</div>
							<?php
					    }
					// }
					?>
				</div>
			</div>
		</div>
	