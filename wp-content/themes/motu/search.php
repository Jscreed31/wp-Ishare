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
 * @package Motu
 * @since 1.0.0
 */
get_header();

    $motu_default = motu_get_default_theme_options();
    $sidebar = esc_attr( get_theme_mod( 'global_sidebar_layout', $motu_default['global_sidebar_layout'] ) );
    $motu_archive_layout = esc_attr( get_theme_mod( 'motu_archive_layout', $motu_default['motu_archive_layout'] ) ); ?>

    <div class="theme-block theme-block-archive">
        <div class="column-row">

            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    
                    <?php
                    if( have_posts() ): ?>

                        <div class="article-wraper archive-layout <?php echo 'archive-layout-' . esc_attr( $motu_archive_layout ); ?>">

                            <?php while( have_posts() ):
                                the_post();

                                get_template_part( 'template-parts/content', '' );

                            endwhile; ?>

                        </div>

                        <?php the_posts_pagination();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </main><!-- #main -->
            </div>

            <?php if( $sidebar != 'no-sidebar' ){

                get_sidebar();
                
            } ?>

        </div>
    </div>

<?php
get_footer();
