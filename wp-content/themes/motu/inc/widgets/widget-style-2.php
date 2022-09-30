<?php
/**
 * Article Widget Layout 1
 *
 * @package Motu
 */
if (!function_exists('motu_widgets_style_2')) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function motu_widgets_style_2()
    {
        register_widget('Motu_widget_Style_2');
    }
endif;
add_action('widgets_init', 'motu_widgets_style_2');
// Article Widget Layout 1
if (!class_exists('Motu_widget_Style_2')) :
    /**
     * Article Widget Layout 1
     *
     * @since 1.0.0
     */
    class Motu_widget_Style_2 extends Motu_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'motu_widget_style_2',
                'description' => esc_html__('Displays post form selected category in different styles', 'motu'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Section Title:', 'motu'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => esc_html__('Select Category:', 'motu'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'motu'),
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of Posts:', 'motu'),
                    'type' => 'number',
                    'default' => 4,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 9,
                ),
                'display_orientation' => array(
                    'label' => esc_html__('Display Orientation:', 'motu'),
                    'type' => 'select',
                    'default' => 'vertical',
                    'options' => array(
                        'vertical' => esc_html__('Vertical', 'motu'),
                        'horizontal' => esc_html__('Horizontal', 'motu'),
                    ),
                ),
                'content_overlay' => array(
                    'label' => esc_html__('Content Overlay:', 'motu'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'enable_meta' => array(
                    'label' => esc_html__('Enable Categories:', 'motu'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'enable_meta_1' => array(
                    'label' => esc_html__('Enable Date & Author:', 'motu'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'enable_feature_image' => array(
                    'label' => esc_html__('Enable Featured Image:', 'motu'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'feature_image_size' => array(
                    'label' => esc_html__('Featured Image Size:', 'motu'),
                    'default' => 'medium',
                    'type' => 'radio',
                    'css' => 'display:block;',
                    'options' => array(
                        'medium' => esc_html__('Medium', 'motu'),
                        'big' => esc_html__('Big', 'motu'),
                        'large' => esc_html__('Large', 'motu'),
                    ),
                ),
                'enable_description' => array(
                    'label' => esc_html__('Enable Description:', 'motu'),
                    'type' => 'checkbox',
                    'default' => false,
                ),
            );
            parent::__construct('motu-widget-style-2', esc_html__('Motu: Post Widget 2', 'motu'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         * @since 1.0.0
         *
         */
        function widget($args, $instance)
        {
            $params = $this->get_params($instance);
            echo $args['before_widget'];
            if (!empty($params['title'])) {
                echo $args['before_title'] . esc_html($params['title']) . $args['after_title'];
            }

            $post_number = isset($params['post_number']) ? $params['post_number'] : '';
            $qargs = array(
                'post_type' => 'post',
                'posts_per_page' => absint($post_number),
                'post__not_in' => get_option("sticky_posts"),
            );
            if (absint($params['post_category']) > 0) {
                $qargs['cat'] = absint($params['post_category']);
            }
            $overlay_class = '';
            if ($params['content_overlay'] == 1) {
                $overlay_class = 'news-article-panel';
                $overlay_class_1 = 'article-content-overlay';
            }
            $display_orientation = esc_attr($params['display_orientation']);
            if ($display_orientation == 'vertical') {
                $div_class = 'column-12';
            } elseif ($display_orientation == 'horizontal') {
                $div_class = 'column-6';
            }
            $style_1_posts_query = new WP_Query($qargs);
            if ($style_1_posts_query->have_posts()) : ?>
                <div class="column-row column-row-small">
                    <?php
                    while ($style_1_posts_query->have_posts()) :
                        $style_1_posts_query->the_post(); ?>
                        <div class="column <?php echo $div_class; ?> column-sm-6 column-xs-12">
                            <article id="theme-post-<?php the_ID(); ?>" <?php post_class('news-article widget-news-article ' . $overlay_class); ?>>

                                <?php if (has_post_thumbnail() && ($params['enable_feature_image'] == 'yes')) { ?>
                                    <?php $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                    $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                                    <div class="data-bg data-bg-<?php echo esc_attr($params['feature_image_size']); ?> thumb-overlay img-hover-slide"
                                         data-background="<?php echo esc_url($featured_image); ?>">
                                        <?php
                                        $format = get_post_format(get_the_ID()) ?: 'standard';
                                        $icon = motu_post_format_icon($format);
                                        if (!empty($icon)) { ?>
                                            <span class="top-right-icon"><?php echo motu_svg_escape($icon); ?></span>
                                        <?php } ?>
                                        <a class="img-link" href="<?php the_permalink(); ?>" tabindex="0"></a>
                                    </div>

                                <?php } ?>

                                <div class="article-content widget-article-content <?php if(has_post_thumbnail()){ echo $overlay_class_1; }?>">
                                    <?php if (($params['enable_meta']) == 1) { ?>
                                        <div class="entry-meta">
                                            <?php motu_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false); ?>
                                        </div>
                                    <?php } ?>


                                <h3 class="entry-title entry-title-medium">
                                    <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                    <?php if (($params['enable_meta_1']) == 1) { ?>
                                        <div class="entry-meta">
                                            <?php motu_posted_by(); ?>
                                        </div>
                                    <?php } ?>

                                <?php if (($params['enable_description']) == 'yes') { ?>
                                    <div class="entry-content hidden-xs-element entry-content-muted">
                                        <?php
                                        if (has_excerpt()) {
                                            the_excerpt();
                                        } else {
                                            echo '<p>';
                                            echo esc_html(wp_trim_words(get_the_content(), 20, '...'));
                                            echo '</p>';
                                        } ?>
                                    </div>
                                <?php } ?>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata();
            endif;
            echo $args['after_widget'];
        }
    }
endif;