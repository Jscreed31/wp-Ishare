<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharp-tian
 */
global $contecustomarr;
$featuredimage_slider  = get_theme_mod( 'featuredimage_slider',$contecustomarr['options']['featuredimage_slider']);
if ( ! empty( $featuredimage_slider ) ) {
$featuredimage_slider = json_decode( $featuredimage_slider );
?>
	<div class="featured_slider_image">
		<div id="owl-demo" class="owl-carousel owl-theme featuredimage_slider">
			<?php	
				foreach ( $featuredimage_slider as $info_item ) {
					?>								
					<div class="item">
						<div class="hentry-inner">
							<div class="post-thumbnail">
								<?php if(!empty($info_item->image_url)){ ?>
									<img src="<?php echo $info_item->image_url;; ?>" alt="The Last of us">

								<?php }else{
									?>
									<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
									<?php
								} ?> 
							</div>				
						  	<div class="entry-container">
						  		<?php if($info_item->title){
						  			?>
						  			<header class=" featured_slider_title entry-header">					
									<h1 class="entry-title">
								  		<?php echo esc_attr($info_item->title); ?>
								  	</h1>
								</header>
						  			<?php
						  		} ?>						
							  	<div class="featured_slider_disc entry-summary"><?php echo esc_html($info_item->text); ?></div>
							  	<?php if($info_item->text2 != ''){ ?>
								  	<div class="image_btn button">
										<a href="<?php echo esc_attr($info_item->link); ?>" class="buttons"><?php echo esc_html($info_item->text2); ?></a>
									</div>
								<?php } ?>
							</div>
						</div>								
					</div>	
					<?php							
				}
		?>
		</div>
	</div>
	<?php
}