<?php get_header(); ?>

<div id="subheader" class="group">

	<?php get_template_part('inc/page-title'); ?>
	
	<div class="image-container">
		<?php if ( has_post_thumbnail() ) {	
			the_post_thumbnail('featureon-huge'); 
			$caption = get_post(get_post_thumbnail_id())->post_excerpt;
			if ( isset($caption) && $caption ) echo '<div class="image-caption">'.$caption.'</div>';
		} ?>
	</div>
	
</div><!--/#subheader-->

<div id="page">
	<div class="container">
		<div class="main">
			<div class="main-inner group">

				<div class="content <?php if ( !has_post_thumbnail() ) { ?>no-thumbnail<?php } ?>">
					<div class="bigpad group">

						<?php while ( have_posts() ): the_post(); ?>
							<article <?php post_class(); ?>>	
								<div class="post-inner group">
									
									<h1 class="post-title ontop"><?php the_title(); ?></h1>
									<p class="post-byline"><?php echo get_avatar(get_the_author_meta('user_email'),'64'); ?><?php esc_html_e('by','featureon'); ?> <?php the_author_posts_link(); ?> &middot; <?php the_time( get_option('date_format') ); ?></p>
									
									<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>
									
									<div class="clear"></div>
									
									<div class="entry themeform">	
										<div class="entry-inner">
											<?php the_content(); ?>
											<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','featureon'),'after'=>'</div>')); ?>
										</div>
										<div class="clear"></div>
										<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','featureon').'</span> ','','</p>'); ?>
										<?php do_action( 'alx_ext_sharrre' ); ?>
										
									</div><!--/.entry-->
									
								</div><!--/.post-inner-->	
							</article><!--/.post-->				
						<?php endwhile; ?>
						
						<div class="clear"></div>

						<?php if ( ( get_theme_mod( 'author-bio', 'on' ) == 'on' ) && get_the_author_meta( 'description' ) ): ?>
							<div class="author-bio">
								<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
								<p class="bio-name"><?php esc_html_e('Written by','featureon'); ?> <?php the_author_posts_link(); ?></p>
								<p class="bio-desc"><?php the_author_meta('description'); ?></p>
								<div class="clear"></div>
							</div>
						<?php endif; ?>
						
						<?php if ( get_theme_mod( 'post-nav', 's1' ) == 'content' ) { get_template_part('inc/post-nav'); } ?>
		
						<?php if ( get_theme_mod( 'related-posts', 'categories' ) != 'disable' ) { get_template_part('inc/related-posts'); } ?>
		
						<?php if ( get_theme_mod( 'post-comments', 'on' ) == 'on' ) { comments_template('/comments.php',true); } ?>
						
					</div><!--/.bigpad-->	
				</div><!--/.content-->

				<?php get_sidebar(); ?>

			</div><!--/.main-inner-->
		</div><!--/.main-->			
	</div><!--/.container-->
</div><!--/#page-->

<?php get_footer(); ?>