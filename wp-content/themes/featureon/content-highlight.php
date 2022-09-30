<?php $format = get_post_format(); ?>

<div class="featured-item-small" id="post-<?php the_ID(); ?>">
	<a class="featured-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	
	<?php if ( has_post_thumbnail() ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featureon-medium' ); ?>
		<img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
	<?php elseif ( get_theme_mod('placeholder','on') == 'on' ): ?>
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/thumb-medium.png" alt="<?php the_title_attribute(); ?>" />
	<?php endif; ?>
	
	<div class="featured-content">
		<h3 class="featured-title"><?php the_title(); ?></h3>
		<div class="featured-date"><?php the_time( get_option('date_format') ); ?></div>
	</div>
	<?php if ( comments_open() && ( get_theme_mod( 'comment-count', 'on' ) == 'on' ) ): ?>
		<a class="post-comments" href="<?php comments_link(); ?>"><span><i class="fas fa-comments"></i><?php comments_number( '0', '1', '%' ); ?></span></a>
	<?php endif; ?>
</div>