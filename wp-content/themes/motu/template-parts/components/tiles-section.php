<?php
/**
 * Tiles Blocks
 *
 * @package Motu
 */
if (!function_exists('motu_tiles_block_section')):
    function motu_tiles_block_section($motu_home_section, $repeat_times)
    {
        $section_category = esc_html(isset($motu_home_section->section_category) ? $motu_home_section->section_category : '');
        $tiles_post_per_page = esc_html(isset($motu_home_section->tiles_post_per_page) ? $motu_home_section->tiles_post_per_page : 5);
        $home_section_title = isset($motu_home_section->home_section_title) ? $motu_home_section->home_section_title : '';
        $tiles_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $tiles_post_per_page, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($section_category)));
        if ($tiles_post_query->have_posts()):
            $post_ids = array();
            while ($tiles_post_query->have_posts()) {
                $tiles_post_query->the_post();
                $post_ids[] = get_the_ID();
            }
            $posts_id = array();
            if ($post_ids && count($post_ids) > 5) {
                $posts_id = array_chunk($post_ids, 5);
            } else {
                $posts_id[] = $post_ids;
            }
            if (empty($home_section_title) && $section_category) {
                $catObj = get_category_by_slug($section_category);
                if (isset($catObj->name) && $catObj->name) {
                    $home_section_title = $catObj->name;
                }
            } ?>
            <div id="theme-block-<?php echo esc_attr($repeat_times); ?>" class="theme-block theme-block-tiles">
                <div class="wrapper-inner">
                    <div class="column column-12">
                        <div class="theme-panel-body">
                            <div class="wrapper-inner wrapper-inner-small">
                            <?php if ($home_section_title || $section_category) { ?>
                                <div class="column column-12 column-sm-12">
                                    <header class="block-title-wrapper">
                                        <?php if ($home_section_title) { ?>
                                            <h2 class="block-title">
                                                <span><?php echo esc_html($home_section_title); ?></span>
                                            </h2>
                                        <?php } ?>
                                        <?php if ($section_category) {
                                            $catObj = get_category_by_slug($section_category);
                                            if (isset($catObj->name) && $catObj->name) {
                                                $cat_title = $catObj->name;
                                            }
                                            $cat_link = get_category_link($catObj->term_id); ?>
                                            <div class="theme-heading-controls">
                                                <a href="<?php echo esc_url($cat_link); ?>" class="view-all-link">
                                                    <span class="view-all-icon"><?php motu_theme_svg('plus'); ?></span>
                                                    <span class="view-all-label"><?php echo esc_html_e('View All', 'motu'); ?></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </header>
                                </div>
                            <?php } ?>
                    <?php
                    foreach ($posts_id as $post_id) {
                        $post_ids_1 = array();
                        $post_ids_2 = array();
                        if (isset($post_id[0]) && $post_id[0]) {
                            $post_ids_1[] = $post_id[0];
                        }
                        if (isset($post_id[1]) && $post_id[1]) {
                            $post_ids_2[] = $post_id[1];
                        }
                        if (isset($post_id[2]) && $post_id[2]) {
                            $post_ids_2[] = $post_id[2];
                        }
                        if (isset($post_id[3]) && $post_id[3]) {
                            $post_ids_2[] = $post_id[3];
                        }
                        if (isset($post_id[4]) && $post_id[4]) {
                            $post_ids_2[] = $post_id[4];
                        }
                        if ($post_ids_1) {
                            $tiles_query_1 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 1, 'post__not_in' => get_option("sticky_posts"), 'post__in' => $post_ids_1));
                            if ($tiles_query_1->have_posts()) {
                                while ($tiles_query_1->have_posts()) {
                                    $tiles_query_1->the_post();
                                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                    $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                                    ?>
                                    
                                    <?php
                                }
                            }
                        }
                        if ($post_ids_2) {
                            $tiles_query_2 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => get_option("sticky_posts"), 'post__in' => $post_ids_2));
                            if ($tiles_query_2->have_posts()) { ?>
                                        <?php
                                        while ($tiles_query_2->have_posts()) {
                                            $tiles_query_2->the_post();
                                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                            ?>
                                            <div class="column column-4 column-md-6 column-sm-6 column-xxs-12">
                                                <article id="theme-post-<?php the_ID(); ?>" <?php post_class('theme-news-article theme-image-overlay mb-16'); ?>>
                                                    <div class="theme-article-image theme-border-decor">
                                                        <div class="data-bg data-bg-medium"
                                                            data-background="<?php echo esc_url($featured_image[0]); ?>">
                                                            <?php
                                                            $format = get_post_format(get_the_ID()) ?: 'standard';
                                                            $icon = motu_post_format_icon($format);
                                                            if (!empty($icon)) { ?>
                                                                <span class="top-right-icon">
                                                                    <?php echo motu_svg_escape($icon); ?>
                                                                </span>
                                                            <?php } ?>
                                                            <a class="img-link" href="<?php the_permalink(); ?>" tabindex="0"></a>

                                                            <div class="entry-meta entry-meta-bottom image-entry-meta">
                                                                <?php motu_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="theme-article-detail">
                                                        
                                                        <h3 class="entry-title entry-title-medium">
                                                            <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h3>
                                                        <div class="entry-meta">
                                                            <?php motu_posted_by(); ?>
                                                            <?php motu_post_view_count(); ?>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        <?php } ?>
                                <?php
                            }
                        }
                    } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif;
    }
endif;