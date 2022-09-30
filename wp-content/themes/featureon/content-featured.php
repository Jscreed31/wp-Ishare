<?php $format = get_post_format(); ?>

<div class="featured-item" style="background-image:url('<?php the_post_thumbnail_url('featureon-large'); ?>');">
	<a class="featured-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	<div class="featured-content">
		<div class="featured-category"><?php the_category(' '); ?></div>
		<h3 class="featured-title"><?php the_title(); ?></h3>
		<div class="featured-date"><?php the_time( get_option('date_format') ); ?></div>
	</div>
	<?php if ( comments_open() && ( get_theme_mod( 'comment-count', 'on' ) == 'on' ) ): ?>
		<a class="post-comments" href="<?php comments_link(); ?>"><span><i class="fas fa-comments"></i><?php comments_number( '0', '1', '%' ); ?></span></a>
	<?php endif; ?>	
</div>