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
						
							<article <?php post_class('group'); ?>>
								
								<div class="entry themeform">
									<?php the_content(); ?>
									<div class="clear"></div>
								</div><!--/.entry-->
								
							</article>
							
							<?php if ( get_theme_mod( 'page-comments', 'off' ) == 'on' ) { comments_template('/comments.php',true); } ?>
							
						<?php endwhile; ?>
						
					</div><!--/.bigpad-->
				</div><!--/.content-->

				<?php get_sidebar(); ?>

			</div><!--/.main-inner-->
		</div><!--/.main-->			
	</div><!--/.container-->
</div><!--/#page-->


<?php get_footer(); ?>