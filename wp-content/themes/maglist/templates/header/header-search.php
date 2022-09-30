<div class="<?php echo Maglist_Helper::with_prefix( 'header-search' ); ?>">
	<button class="circular-focus screen-reader-text" data-goto=".maglist-header-search .maglist-toggle-search">
		<span class="screen-reader-text"> <?php esc_html__( 'Search', 'maglist' ); ?> </span>
		<?php esc_html_e( 'Circular focus', 'maglist' ); ?>
	</button>
	<div class="maglist-search-form">		
		<?php get_search_form(); ?>
		<button type="button" class="close <?php echo Maglist_Helper::with_prefix( 'toggle-search' ); ?>">
			<i class="fa fa-times" aria-hidden="true"></i>
		</button>
	</div>
	<div class="maglist-search-content">		
		<?php 
		$tags = get_tags(array(
	  		'hide_empty' => false,
	  		'number' => 5
		));

		$rand_post = get_posts( array(
			'numberposts' => 2,
			'orderby' => 'rand'
		));
		if( $tags ){?>		
			<div class="maglist-search-tags">
				<h2><?php esc_html_e( 'Tags', 'maglist' ); ?></h2>
				<ul>				
					<?php foreach ( $tags as $tag ) {
					  echo '<li><a href="'. get_tag_link( $tag ) .'">' . $tag->name . '</a></li>';
					}?>
				</ul>
			</div>
		<?php }
		if( $rand_post ){ ?>
			<div class="maglist-search-post">
				<h2><?php esc_html_e( 'Popular', 'maglist' ); ?></h2>
				<?php foreach ( $rand_post as $rp ) { ?>
					<div class="maglist-search-post-inner">
						<?php Maglist_Theme::the_image_seo_friendly( $rp->ID, false, 'placeholder' );?>
						<h3>							
							<a href="<?php echo esc_url( get_the_permalink( $rp->ID ) ) ?>">
								<?php echo esc_html( get_the_title( $rp->ID ) ); ?>
							</a>													
						</h3>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
	<button class="circular-focus screen-reader-text" data-goto=".maglist-header-search .search-field">
		<?php esc_html_e( 'Circular focus', 'maglist' ); ?>
	</button>
</div>