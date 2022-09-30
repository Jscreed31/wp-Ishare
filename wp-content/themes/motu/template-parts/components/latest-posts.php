<?php
/**
 * Latest Posts
 *
 * @package Motu
 */
if( !function_exists('motu_latest_blocks') ):
    
    function motu_latest_blocks($motu_home_section,$repeat_times){

        global $post;
        $motu_default = motu_get_default_theme_options();
        $sidebar = esc_attr( get_theme_mod( 'global_sidebar_layout', $motu_default['global_sidebar_layout'] ) );

        $motu_archive_layout = esc_attr( get_theme_mod( 'motu_archive_layout', $motu_default['motu_archive_layout'] ) ); ?>
        <div id="theme-block-<?php echo esc_attr( $repeat_times ); ?>" class="theme-block theme-block-archive">
            <div class="column-row">
                <div id="primary" class="content-area theme-bottom-sticky">
                    <main id="main" class="site-main" role="main">

                            <?php
                            if( !is_front_page() ) {
                                motu_breadcrumb();
                            }

                            if( have_posts() ): ?>

                                <div class="article-wraper archive-layout <?php echo 'archive-layout-' . esc_attr( $motu_archive_layout ); ?>">
                                    <?php while (have_posts()) :
                                        the_post();

                                        if( !is_page() ){

                                            get_template_part( 'template-parts/content', get_post_format() );
                                            
                                        }else{
                                            get_template_part('template-parts/content', 'single');
                                        }


                                    endwhile; ?>
                                </div>

                                <?php if( !is_page() ): do_action('motu_archive_pagination'); endif;

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
    }
    
endif;
