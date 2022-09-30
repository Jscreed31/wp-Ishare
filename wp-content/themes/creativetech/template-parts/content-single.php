<?php 
global $creativetech_theme_options;
$creativetech_blog_sidebar_layout= get_theme_mod("creativetech-blog-sidebar-option");
?>
<article id="post-<?php the_ID(); ?>" class="creativetech_blog_listing">
    <header class="entry-header">
        <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title creativetech_inner_page">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
        ?>
    </header><!-- .entry-header -->
    <?php if($creativetech_blog_sidebar_layout=='left-sidebar'){ ?>
    <div class="blog_listing container">
        <div class="creativetech-entry-content">
            <div class="blog_sidebar">
                <?php get_sidebar(); ?>
            </div>
            <div class="blog_content">
                <?php creativetech_post_thumbnail(); ?>
                <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'creativetech' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            ?>
                <footer class="entry-footer container">
                    <?php creativetech_entry_footer(); ?>
                </footer><!-- .entry-footer -->
                <?php   // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif; 
            ?>
            </div>

        </div><!-- .entry-content -->
    </div>
    <?php } elseif($creativetech_blog_sidebar_layout=='right-sidebar' || $creativetech_blog_sidebar_layout==''){ ?>
    <div class="blog_listing container">
        <div class="creativetech-entry-content">
            <div class="blog_content">
                <?php creativetech_post_thumbnail(); ?>
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'creativetech' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );

                ?>
                <footer class="entry-footer container">
                    <?php creativetech_entry_footer(); ?>
                </footer><!-- .entry-footer -->
                <?php   // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif; 
                ?>
            </div>
            <div class="blog_sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div><!-- .entry-content -->
    </div>
    <?php } else{ ?>
    <div class="blog_listing container no-sidebar-layout">
        <div class="creativetech-entry-content">
            <div class="blog_content">
                <?php creativetech_post_thumbnail(); ?>
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'creativetech' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );

                ?>
                <footer class="entry-footer container">
                    <?php creativetech_entry_footer(); ?>
                </footer><!-- .entry-footer -->
                <?php   // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif; 
                ?>
            </div>
        </div><!-- .entry-content -->
    </div>
    <?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->