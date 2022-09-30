<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */
get_header();
do_action( Maglist_Helper::fn_prefix( 'before-content' ) );?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( Maglist_Theme::is_sidebar_active() ? 'col-lg-8' : 'col-lg-12' ); ?> content-order">
				<div id="primary" class="content-area">
					<main id="main" class="post-main-content" role="main">
						<?php
						# Loop Start
						while ( have_posts() ) :
							the_post();
						?>
							<article <?php Maglist_Helper::schema_body( 'article' ); ?> class="maglist-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content">
									<?php
										the_content();

										Maglist_Helper::post_content_navigation();

										get_template_part ('templates/meta', 'info' );

									?>								
								</div>
							</article>
							<?php if( wp_count_posts()->publish > 1 ){ ?>
								<div class="maglist-sidebar-inner-box">
									<?php Maglist_Helper::single_post_navigation(); ?>
								</div>
							<?php } ?>
							<div class="maglist-sidebar-inner-box">						
								<?php if ( comments_open() || get_comments_number() ) {
									comments_template();
								} ?>
							</div>
						<?php endwhile; ?>
					</main>					
					<?php Maglist_Theme::sharing_on_single(); ?>
				</div> 
			</div>
			<?php Maglist_Theme::the_sidebar(); ?>
		</div>
		<?php Maglist_Theme::the_cats_related_post(); ?>	
	</div>
</div>
<?php 
do_action( Maglist_Helper::fn_prefix( 'after-content' ) );
get_footer(); ?>