<?php
/**
 * Advertise
 *
 * @package Motu
 */
if (!function_exists('motu_main_banner')):
    function motu_main_banner($motu_home_section, $repeat_times)
    {
        $section_post_slide_cat = esc_html(isset($motu_home_section->section_post_slide_cat) ? $motu_home_section->section_post_slide_cat : '');
        $section_post_cat_1 = esc_html(isset($motu_home_section->section_post_cat_1) ? $motu_home_section->section_post_cat_1 : '');
        $slider_arrows = esc_html(isset($motu_home_section->ed_arrows_carousel) ? $motu_home_section->ed_arrows_carousel : '');
        $slider_dots = esc_html(isset($motu_home_section->ed_dots_carousel) ? $motu_home_section->ed_dots_carousel : '');
        $slider_autoplay = esc_html(isset($motu_home_section->ed_autoplay_carousel) ? $motu_home_section->ed_autoplay_carousel : '');
        $home_section_title_1 = isset($motu_home_section->home_section_title_1) ? $motu_home_section->home_section_title_1 : '';
        if ($slider_arrows == 'yes' || $slider_arrows == '') {
            $arrow = 'true';
        } else {
            $arrow = 'false';
        }
        if ($slider_autoplay == 'yes' || $slider_autoplay == '') {
            $autoplay = 'true';
        } else {
            $autoplay = 'false';
        }
        if ($slider_dots == 'yes') {
            $dots = 'true';
        } else {
            $dots = 'false';
        }
        if (is_rtl()) {
            $rtl = 'true';
        } else {
            $rtl = 'false';
        }
        $banner_query_1 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($section_post_cat_1), 'offset' => 0));
        $banner_query_3 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($section_post_slide_cat)));?>
        <div id="theme-block-<?php echo esc_attr($repeat_times); ?>" class="theme-list-grid list-grid-one theme-block">
            <div class="wrapper-inner">
                <div class="column column-12">
                    <div class="theme-panel-header">
                        <div class="block-title-wrapper">
                            <?php if ($home_section_title_1) { ?>
                            <h2 class="block-title">
                                <span><?php echo esc_html($home_section_title_1); ?></span>
                            </h2>
                            <?php } ?>
                        </div>
                    </div> 

                    <div class="theme-panel-body">
                    <div class="wrapper-inner wrapper-inner-small">

                        <div class="column column-6 column-sm-12">
                            <?php if ($banner_query_3->have_posts()): ?>
                                <div class="main-slider-container theme-slider-container mb-16">
                                    <div class="theme-main-slider-block" data-slick='{"arrows": <?php echo esc_attr($arrow); ?>, "autoplay": <?php echo esc_attr($autoplay); ?>, "dots": <?php echo esc_attr($dots); ?>, "rtl": <?php echo esc_attr($rtl); ?>}'>
                                    <?php
                                    while ($banner_query_3->have_posts()) {
                                        $banner_query_3->the_post();
                                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                                        <div class="theme-slider-item">
                                            <article class="theme-news-article">
                                                    <div class="data-bg data-bg-big thumb-overlay" data-background="<?php echo esc_url($featured_image); ?>">
                                                    <a href="<?php the_permalink();?>" class="img-link"></a>
                                                    
                                                    <div class="article-content article-content-overlay">
                                                        <div class="entry-meta">
                                                            <?php motu_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="theme-article-detail">
                                            <header class="theme-article-header">
                                            <h3 class="entry-title entry-title-large line-clamp-2">
                                            <a href="<?php the_permalink();?>">
                                            <?php the_title(); ?>
                                            </a>
                                            </h3>
                                            </header>

                                            <div class="theme-article-content">
                                            </div>
                                            </div>
                                            </article>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="theme-heading-controls">
                                    <button type="button" class="slide-btn slide-btn-small slide-prev-lead btn-position-center">
                                        <?php motu_theme_svg('chevron-left'); ?>
                                    </button>
                                    <button type="button" class="slide-btn slide-btn-small slide-next-lead btn-position-center">
                                        <?php motu_theme_svg('chevron-right'); ?>
                                    </button>
                                </div>
                                </div>
                            <?php wp_reset_postdata();
                            endif; ?>
                        </div>

                        <div class="column column-6 column-sm-12">
                            <div class="wrapper-inner wrapper-inner-small">
                                <?php if ($banner_query_1->have_posts()):
                            while ($banner_query_1->have_posts()) {
                                $banner_query_1->the_post();
                                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                                <div class="column column-6 column-sm-12">
                                    <article class="theme-news-article article-detail-position theme-image-overlay mb-16">
                                        <div class="data-bg data-bg-medium" data-background="<?php echo esc_url($featured_image); ?>" >
                                            <a href="<?php the_permalink(); ?>" class="img-link"></a>
                                        </div>

                                        <div class="theme-article-detail">
                                            <header class="theme-article-header">
                                            <h3 class="entry-title entry-title-medium line-clamp-xxs-2">
                                            <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                            </a>
                                            </h3>

                                            <div class="entry-meta-bottom">
                                            <?php motu_posted_on( $icon = true ); ?>
                                            </div>
                                            </header>
                                        </div>
                                    </article>
                                </div>
                            <?php  } ?>
                            <?php wp_reset_postdata();
                            endif; ?>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
endif; ?>