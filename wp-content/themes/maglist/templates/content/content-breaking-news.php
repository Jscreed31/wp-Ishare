<?php
/**
 * Content for latest post
 *
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */ 

?>
<section class = "maglist-latest-post-wrapper">
    <div class="container">
        <div class="maglist-latest-post-inner">
            <div class="maglist-latest-post">
                <h2 class="maglist-latest-post-title">
                    <?php echo esc_html__( maglist_get( 'latest-post-title' ) ); ?>
                    <span></span>
                </h2>
            </div>
            <div class="maglist-latest-post-slider">
            <?php $latest_posts = Maglist_Theme::get_posts_by_type( maglist_get( 'latest-post-type' ), maglist_get( 'latest-post-cat' ), maglist_get( 'latest-no-post' ) ); 
                if( $latest_posts ) : ?>
                    <?php foreach ( $latest_posts as $lp ) : ?>
                        <a href="<?php echo esc_url( get_the_permalink( $lp ) ); ?>">
                            <?php Maglist_Theme::the_image_seo_friendly( $lp, false, 'placeholder' );?>
                            <div class="maglist-post-meta">                                
                                <h2 class="title"><?php echo esc_html( get_the_title( $lp ) ); ?></h2>
                                <?php echo maglist_excerpt( maglist_get( 'latest-post-excerpt-length' ), false, '...', $lp ); ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>		
            </div>
        </div>
    </div>
</section>