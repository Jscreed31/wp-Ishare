<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharp-tian
 */
global $contecustomarr;
$featuredimage_slider  = get_theme_mod( 'our_team_section_content',$contecustomarr['options']['our_team_section_content']);
$featured_slides = json_decode( $featuredimage_slider );
	?>
		<div class="our_team_section">
			<div class="our_team_info scroll-element js-scroll fade-in-bottom">
				<div class="our_team_main_title">
					<div class="our_team_tit heading_main_title">
						<h2><?php echo esc_html(get_theme_mod( 'our_team_main_title',$contecustomarr['options']['our_team_main_title'])); ?></h2>
						<span class="separator"></span>
					</div>
					<div class="our_team_main_disc">
						<p><?php echo esc_html(get_theme_mod( 'our_team_main_discription',$contecustomarr['options']['our_team_main_discription']));?></p>
					</div>
				</div>
				<div class="our_team_data">
					<?php 
					foreach ( $featured_slides as $info_item ) {
						// echo "<pre>";
						// print_r($info_item);
						// echo "<pre>";
								
						?>
						<div class="our_team_container">							
								<div class="our_team_container_data">	
									<div class="our_team_img">
										<?php
										if(!empty( $info_item->image_url)){
											?>
											<img src="<?php echo esc_attr($info_item->image_url); ?>">
											<?php
										}else{
											?>
											<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
											<?php
										}
										?>
									</div>
								</div>
								<div class="our_team_icon_contain">
									
									<div class="our_teams_contain">
										<div class="our_team_title">
											<a href="<?php echo esc_html($info_item->link); ?>">
												<h3><?php echo esc_html($info_item->title); ?></h3>
											</a>
										</div>
										<div class="our_team_headline">
											<p><?php echo esc_html($info_item->subtitle);?></p>
										</div>
									</div>
									<div class="our_team_contain_info">
										<div class="our_team_social_icon">
											<div class="dddd">
											<?php if(!empty($info_item->twitter)){
												?>
												<a class="twitter our_social_icon" href="<?php echo esc_attr($info_item->twitter);?>" target="_blank">
													<i class="fa fa-twitter"></i>
												</a>
												<?php
											} if(!empty($info_item->facebook)){
												?>									
												<a class="facebook our_social_icon" href="<?php echo esc_attr($info_item->facebook);?>" target="_blank">
													<i class="fa fa-facebook"></i>
												</a>
											<?php } if(!empty($info_item->instagram)){
											?>
												<a class="instagram our_social_icon" href="<?php echo esc_attr($info_item->instagram);?>" target="_blank">
													<i class="fa fa-instagram"></i>
												</a>
											<?php } if(!empty($info_item->linkedin)){
											?>
											<a class="linkedin our_social_icon" href="<?php echo esc_attr($info_item->linkedin);?>" target="_blank">
												<i class="fa fa-linkedin"></i>
											</a>
											<?php } ?>
											</div>
										</div>
										
									</div>
								</div>	
							</div>
							<?php
					} 
					?>
					<?php //} ?>
				</div>
			</div>
		</div>