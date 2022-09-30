<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Motu
 */

get_header();
?>
    <div class="singular-main-block">
        <div class="theme-block error-block error-block-heading">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'motu'); ?></h1>
            </header><!-- .page-header -->
        </div>
        <div class="theme-block error-block error-block-search">
            <div class="column-row">
                <div class="column column-8 column-sm-12">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>

        <div class="theme-block error-block error-block-top">
            <div class="column-row">
                <div class="column column-12">
                    <h2><?php esc_html_e('Maybe it’s out there, somewhere...', 'motu'); ?></h2>
                    <p><?php esc_html_e('You can always find insightful stories on our', 'motu'); ?>
                    <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('Homepage','motu'); ?></a></p>
                </div>
            </div>
        </div>

    </div>

<?php
get_footer();
