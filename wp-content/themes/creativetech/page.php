<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativetech
 */

get_header();
?>
<?php if ( !is_front_page() && !is_home() ) {
		
		$sidebar_in_pages= wp_kses_post($creativetech_theme_options['creativetech-display-sidebar-in-pages']);
		
		?>
<header class="entry-header creativetech_inner_page">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header>
<?php } ?>
<main id="primary" class="site-main ">
    <div
        class="creativetech_pages <?php if($sidebar_in_pages==''){ echo esc_attr("no_sidebar_in_page"); } else{ echo esc_attr("has_sidebar_in_page"); } ?>">
        <?php
			while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			endwhile; // End of the loop.
			
			if($sidebar_in_pages == '1'){
				get_sidebar();
		    }
	  	?>
    </div>
</main><!-- #main -->

<?php

get_footer();	