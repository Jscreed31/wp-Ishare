<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'refrigerator_repair_above_slider' ); ?>

	<div class="slider-feature position-relative">
		<?php if( get_theme_mod('refrigerator_repair_slider_hide_show') != ''){ ?>
			<section id="slider">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				    <?php $refrigerator_repair_slider_pages = array();
				    for ( $count = 1; $count <= 4; $count++ ) {
				        $mod = intval( get_theme_mod( 'refrigerator_repair_slider'. $count ));
				        if ( 'page-none-selected' != $mod ) {
				          $refrigerator_repair_slider_pages[] = $mod;
				        }
				    }
			      	if( !empty($refrigerator_repair_slider_pages) ) :
				        $args = array(
				          	'post_type' => 'page',
				          	'post__in' => $refrigerator_repair_slider_pages,
				          	'orderby' => 'post__in'
				        );
			        	$query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          	$i = 1;
			    	?>     
					    <div class="carousel-inner" role="listbox">
					      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
						        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
				        			<div class="sliderimg">
			            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
								    </div>
				        			<div class="carousel-caption">
							            <div class="inner-carousel">
							              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							              	<p><?php $refrigerator_repair_excerpt = get_the_excerpt(); echo esc_html( refrigerator_repair_string_limit_words( $refrigerator_repair_excerpt,15 ) ); ?></p>
							              	<a href="<?php the_permalink(); ?>" class="read-btn"><span><?php echo esc_html('Read More','refrigerator-repair'); ?></span><span class="screen-reader-text"><?php echo esc_html('Read More','refrigerator-repair'); ?></span></a>
					            		</div>
					            	</div>
						        </div>
					      	<?php $i++; endwhile; 
					      	wp_reset_postdata();?>
					    </div>
				    <?php else : ?>
				    	<div class="no-postfound"></div>
		      		<?php endif;
				    endif;?>
				    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
				      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','refrigerator-repair' );?></span>
				    </a>
				    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
				      	<span class="screen-reader-text"><?php esc_html_e( 'Next','refrigerator-repair' );?></span>
				    </a>
				</div>
			  	<div class="clearfix"></div>
			</section>
		<?php }?>
		
		<?php do_action('refrigerator_repair_below_slider'); ?>

		<?php if(get_theme_mod('refrigerator_repair_features_category') != ''){ ?>
			<section id="features-section">
				<div class="container">
					<div class="feature-content">
						<?php $refrigerator_repair_catData1 =  get_theme_mod('refrigerator_repair_features_category');
						if($refrigerator_repair_catData1){ 
							$args = array(
								'post_type' => 'post',
								'category_name' => esc_html($refrigerator_repair_catData1 ,'refrigerator-repair'),
								'posts_per_page' => get_theme_mod('refrigerator_repair_features_number',4)
					        ); 
					        $i=1; ?>
					        <div class="row m-0">
				        		<?php $query = new WP_Query( $args );
					          	if ( $query->have_posts() ) :
					        		while( $query->have_posts() ) : $query->the_post(); ?>
					          			<div class="col-lg-3 col-md-3 features-box align-self-center">
					          				<div class="features-content">
			          							<div class="features-icon">
			          								<i class="<?php echo esc_attr(get_theme_mod('refrigerator_repair_feature_icon' . $i, 'fas fa-snowflake')); ?>"></i>
			          							</div>
					            				<h3><a href="<?php the_permalink(); ?>" class="feature-title"><?php the_title(); ?></a></h3>
					            			</div>
									    </div>
					          		<?php $i++; endwhile; 
					          		wp_reset_postdata(); ?>
					          	<?php else : ?>
					              	<div class="no-postfound"></div>
					            <?php endif; ?>
			          		</div>
			      		<?php }?>
			      	</div>
				</div>
			</section>
		<?php }?>
	</div>

	<?php do_action('refrigerator_repair_below_features_section'); ?>

	<?php if(get_theme_mod('refrigerator_repair_section_title') != '' || get_theme_mod('refrigerator_repair_small_title') != '' || get_theme_mod('refrigerator_repair_category_setting') != ''){ ?>
		<section id="service-section" class="py-5">
			<div class="container">
				<div class="service-head text-center mb-5">
					<?php if(get_theme_mod('refrigerator_repair_small_title') != ''){?>
						<strong class="small-title"><?php echo esc_html(get_theme_mod('refrigerator_repair_small_title')); ?></strong>
					<?php }?>
					<?php if(get_theme_mod('refrigerator_repair_section_title') != ''){?>
						<h3><?php echo esc_html(get_theme_mod('refrigerator_repair_section_title')); ?></h3>
					<?php }?>
				</div>
				<?php $refrigerator_repair_catData1 =  get_theme_mod('refrigerator_repair_category_setting');
				if($refrigerator_repair_catData1){ 
					$args = array(
						'post_type' => 'post',
						'category_name' => esc_html($refrigerator_repair_catData1 ,'refrigerator-repair'),
						'posts_per_page' => get_theme_mod('refrigerator_repair_service_number',3)
			        );
			        $i = 1; ?>
			        <div class="row">
		        		<?php $query = new WP_Query( $args );
			          	if ( $query->have_posts() ) :
			        		while( $query->have_posts() ) : $query->the_post(); ?>
			          			<div class="col-lg-4 col-md-6">
			          				<div class="service-box">
	          							<div class="service-image position-relative">
	          								<?php the_post_thumbnail(); ?>
	          								<div class="ovrly"></div>
	          							</div>
	          							<div class="service-icon">
	          								<i class="<?php echo esc_attr(get_theme_mod('refrigerator_repair_service_icon' . $i, 'fas fa-truck')); ?>"></i>
	          							</div>
          								<div class="service-content mt-2">
				            				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							              	<p><?php $refrigerator_repair_excerpt = get_the_excerpt(); echo esc_html( refrigerator_repair_string_limit_words( $refrigerator_repair_excerpt,12 ) ); ?></p>
							              	<a href="<?php the_permalink(); ?>" class="see-btn"><span><?php echo esc_html('See More','refrigerator-repair'); ?></span><span class="screen-reader-text"><?php echo esc_html('See More','refrigerator-repair'); ?></span></a>
			            				</div>
			          				</div>
							    </div>
			          		<?php $i++; endwhile; 
			          		wp_reset_postdata(); ?>
			          	<?php else : ?>
			              	<div class="no-postfound"></div>
			            <?php endif; ?>
	          		</div>
	      		<?php }?>
			</div>
		</section>
	<?php }?>

	<?php do_action('refrigerator_repair_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>