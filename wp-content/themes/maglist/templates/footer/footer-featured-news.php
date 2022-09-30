<?php
/**
 * Footer featured news 
 * 
 * @return void
* @since 1.0
*
 * @package Maglist WordPress Theme
 */ 
?>
<div class ="maglist-you-missed container">
    <?php $ftr_featured_news = Maglist_Theme::get_posts_by_type( maglist_get( 'footer-featured-type' ), maglist_get( 'footer-featured-cat' ), 6 );
        if( $ftr_featured_news ){ ?>
            <div class="maglist-you-missed-title">
                <h2><?php echo esc_html(maglist_get( 'footer-featured-title' ) ); ?></h2>
            </div> 
            <div class="maglist-feature-news-inner init">  
                <?php foreach( $ftr_featured_news as $t ){ ?>
                    <div class="maglist-main-banner-trending-inner">
                        <div class="maglist-main-banner-trending-image">
                            <a href="<?php echo esc_url( get_the_permalink( $t ) ); ?>">
                                <?php Maglist_Theme::the_image_seo_friendly( $t, false, 'placeholder' );?>
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
        <?php }
    ?>
</div>
