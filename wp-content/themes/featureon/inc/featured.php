<?php
// Query featured entries
$featured = new WP_Query(
	array(
		'no_found_rows'				=> false,
		'update_post_meta_cache'	=> false,
		'update_post_term_cache'	=> false,
		'ignore_sticky_posts'		=> 1,
		'posts_per_page'			=> absint( get_theme_mod('featured-posts-count','5') ),
		'cat'						=> absint( get_theme_mod('featured-category','') )
	)
);
?>

<?php if ( is_home() && !is_paged() && ( get_theme_mod('featured-posts-count','5') !='0') && $featured->have_posts() ): ?>
	
	<div class="featured-posts-inner <?php 
		if ( get_theme_mod('featured-posts-count', '5') =='1') { echo 'featured-count-1'; } 
		if ( get_theme_mod('featured-posts-count', '5') =='2') { echo 'featured-count-2'; } 
		if ( get_theme_mod('featured-posts-count', '5') =='3') { echo 'featured-count-3'; } 
		if ( get_theme_mod('featured-posts-count', '5') =='4') { echo 'featured-count-4'; } 
		if ( get_theme_mod('featured-posts-count', '5') =='5') { echo 'featured-count-5'; } 
	?>">
	<?php while ( $featured->have_posts() ): $featured->the_post(); ?>
		<?php get_template_part('content-featured'); ?>
	<?php endwhile; ?>	
	</div>
	
<?php endif; ?>

<?php wp_reset_postdata(); ?>