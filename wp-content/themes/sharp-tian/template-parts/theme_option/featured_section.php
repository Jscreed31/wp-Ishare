<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharp-tian
 */

global $contecustomarr;
$featuredimage_slider  = get_theme_mod( 'featured_section_content',$contecustomarr['options']['featured_section_content']);

$featured_slides = json_decode( $featuredimage_slider );
?>
	<div class="featured-section_data">
		<div class="featured_section_info">
			    <div id="featured-section" class="featured-section section scroll-element js-scroll fade-in-bottom">
					<div class="card-container featured_content">
					<?php 
						foreach ( $featured_slides as $info_item ) {
							?>
							<div class="section-featured-wrep">
								<div class="featured-thumbnail"> 
									<div class="featured-icon">
										<i class="fa <?php echo esc_attr($info_item->icon_value)?>"></i>
									</div>
									<div class="featured_content_inner">
										<div class="featured-title"> 
											<h4>
												<?php echo esc_attr($info_item->title); ?>
											</h4>
										</div>
										<div class="featured-description">
											<p><?php echo esc_html($info_item->text); ?></p>
										</div>
									</div>
								</div>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		</div>
