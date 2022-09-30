<?php get_header(); ?>

<div id="subheader" class="group">	
	<?php get_template_part('inc/page-title'); ?>
</div><!--/#subheader-->

<div id="page">
	<div class="container">
		<div class="main">
			<div class="main-inner group">

				<div class="content">
					<div class="pad group">		
						
						<div class="notebox">
							<?php get_search_form(); ?>
						</div><!--/.notebox-->
						
						<div class="entry">
							<p><?php esc_html_e( 'The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'featureon' ); ?></p>
						</div><!--/.entry-->
						
					</div><!--/.pad-->	
				</div><!--/.content-->

				<?php get_sidebar(); ?>

			</div><!--/.main-inner-->
		</div><!--/.main-->			
	</div><!--/.container-->
</div><!--/#page-->


<?php get_footer(); ?>