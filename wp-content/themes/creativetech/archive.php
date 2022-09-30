<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativetech
 */

get_header();
?>
<header class="page-header container creativetech_inner_page">
    <?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
</header><!-- .page-header -->
<main id="primary" class="site-main container">
    <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$loop = new WP_Query( array( 
				'posts_per_page' => 9,
				'paged'          => $paged )
		); ?>
    <?php if ( have_posts() ) : ?>



    <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; 

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->
<nav class="creativetech_pagination container">
    <?php creativetech_pagination_bar( $loop ); ?>
</nav>
<?php wp_reset_postdata(); 

get_sidebar();
get_footer();