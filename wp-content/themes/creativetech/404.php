<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package creativetech
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found container">
        <header class="page-header">
            <h1 class="page_not_found_title page-title text-center"><?php esc_html_e( '404', 'creativetech' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content page_not_found_content text-center">
            <p class="page_not_found_desc"><?php esc_html_e( "OOPS! THAT PAGE CAN'T BE FOUND", 'creativetech' ); ?>
            </p>
			<a href="<?php echo esc_url(home_url()); ?>" class="back_to_home_btn">Back to Home</a>
        </div><!-- .page-content -->
		
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();