<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativetech
 */

get_header();
?>

<main id="primary" class="site-main container">
    <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$loop = new WP_Query( array( 
				'posts_per_page' => 9,
				'paged'          => $paged )
		); ?>
    <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

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

<?php wp_reset_postdata(); 

 get_footer(); ?>