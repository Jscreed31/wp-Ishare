<?php

/**
 * Template part for displaying main banner
 *
 * @since 1.0
 * 
 * @package Maglist WordPress Theme
 */
$news = Maglist_Theme::get_posts_by_type( maglist_get( 'main-banner-post-type' ), maglist_get( 'main-banner-post-cat' ), maglist_get( 'main-banner-no-post' ) );
$trending = Maglist_Theme::get_posts_by_type( maglist_get( 'main-banner-trending-post-type' ), maglist_get( 'main-banner-trending-post-cat' ), maglist_get( 'main-banner-trending-no-post' ) );
if( $news || $trending ){ ?>
    <div class="maglist-main-banner-wrapper">
        <div class="container">   
            <div class="maglist-main-banner-inner">
                <div class="maglist-main-banner-left">
                    <?php if( $news ){ ?>
                        <div class="maglist-main-banner-news-section">
                            <?php foreach( $news as $n ){ ?>
                                <div class="maglist-main-banner-news-inner">
                                    <a href="<?php echo esc_url( get_the_permalink( $n ) ); ?>">
                                        <?php Maglist_Theme::the_image_seo_friendly( $n, false, 'image' );?>
                                    </a>
                                    <div class="maglist-main-banner-news-meta">
                                        <div class="maglist-main-banner-news-cat">                                    
                                            <?php Maglist_Helper::the_category( $n ); ?>
                                        </div>
                                        <a href="<?php echo esc_url( get_the_permalink( $n ) ); ?>">
                                            <?php echo esc_html( get_the_title( $n ) ); ?>                                        
                                        </a>
                                        <div class="maglist-main-banner-news-author">
                                            <?php
                                            Maglist_Helper::the_date( $n );
                                            Maglist_Helper::posted_by( $n );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?> 
                        </div>
                    <?php } ?>
                </div>
                <div class="maglist-main-banner-right">
                    <?php if( $trending ){ ?>
                        <?php if( '' != maglist_get( 'trending-title' ) ){ ?>
                            <h2 class="heading-line"><?php echo esc_html( maglist_get( 'trending-title' ) ) ?></h2>
                        <?php } ?>
                        <div class="maglist-main-banner-trending-section">
                            <?php foreach( $trending as $t ){ ?>
                                <div class="maglist-main-banner-trending-inner">
                                    <div class="maglist-main-banner-trending-image">
                                        <a href="<?php echo esc_url( get_the_permalink( $t ) ); ?>">
                                            <?php Maglist_Theme::the_image_seo_friendly( $t, false, 'image' );?>
                                        </a>
                                    </div>
                                    <div class="maglist-main-banner-trending-meta">
                                        <h3 class="title">
                                            <a href="<?php echo esc_url( get_the_permalink( $t ) ); ?>">
                                                <?php echo esc_html( get_the_title( $t ) ); ?>                                        
                                            </a>
                                        </h3>
                                        <div class="maglist-main-banner-trending-author">
                                            <?php Maglist_Helper::the_date( $t ); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>       
        </div>
    </div>
<?php } ?>