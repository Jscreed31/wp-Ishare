<?php
/**
 * The template for displaying 404 pages (not found)
 * @subpackage Refrigerator Repair
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><strong><?php esc_html_e( '404', 'refrigerator-repair' ); ?></strong><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'refrigerator-repair' ); ?></h1>
					<div class="home-btn">
						<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Return to home page', 'refrigerator-repair' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Return to home page', 'refrigerator-repair' ); ?></span></a>
					</div>
				</header>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'refrigerator-repair' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</main>
	</div>
</div>

<?php get_footer();