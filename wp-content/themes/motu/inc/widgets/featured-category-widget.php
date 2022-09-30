<?php
/**
 * Featured Category Widgets.
 *
 * @package Motu
 */


if (!function_exists('motu_featured_category_widgets')) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function motu_featured_category_widgets()
    {
        // Recent Post widget.
        register_widget('Motu_Sidebar_Featured_Category_Widget');

    }

endif;
add_action('widgets_init', 'motu_featured_category_widgets');

// Recent Post widget
if (!class_exists('Motu_Sidebar_Featured_Category_Widget')) :

    /**
     * Recent Post.
     *
     * @since 1.0.0
     */
    class Motu_Sidebar_Featured_Category_Widget extends Motu_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'motu_featured_category_widget',
                'description' => esc_html__('Displays categories and posts.', 'motu'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title_1' => array(
                    'label' => esc_html__('Title 1:', 'motu'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category_1' => array(
                    'label' => esc_html__('Select Category 1:', 'motu'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'motu'),
                ),
                'title_2' => array(
                    'label' => esc_html__('Title 2:', 'motu'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category_2' => array(
                    'label' => esc_html__('Select Category 2:', 'motu'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'motu'),
                ),
                'title_3' => array(
                    'label' => esc_html__('Title 3:', 'motu'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category_3' => array(
                    'label' => esc_html__('Select Category 3:', 'motu'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'motu'),
                ),
            );

            parent::__construct('motu-featured-category-layout', esc_html__('Motu: Category Call to action Widget', 'motu'), $opts, array(), $fields);
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

            echo $args['before_widget']; ?>

            <div class="theme-widgetarea theme-widgetarea-categories">
                <?php
                for ($x = 1; $x <= 3; $x++) {

                    $section_category = isset($params['post_category_' . $x]) ? $params['post_category_' . $x] : '';

                    if ($section_category) {

                        $cat_name = get_the_category_by_ID($section_category);
                        $cat_link = get_category_link($section_category);
                        $twp_term_image = get_term_meta($section_category, 'twp-term-featured-image', true); ?>

                        <div class="widget-column widget-column-4 widget-column-sm-12">
                            <?php
                            if (isset($params['title_' . $x]) && $params['title_' . $x]) {

                                $cat_name = esc_html($params['title_' . $x]);

                            } ?>

                            <div class="post-thumb-categories">
                                <div class="data-bg thumb-overlay img-hover-slide"
                                     data-background="<?php echo esc_url($twp_term_image); ?>">
                                    <a class="img-link" href="<?php echo esc_url($cat_link); ?>"
                                       tabindex="0"></a>
                                    <div class="article-content article-content-overlay">
                                        <?php
                                        if ($cat_name) { ?>

                                            <h3 class="category-title">
                                                <span><?php echo esc_html($cat_name); ?></span>
                                            </h3>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php
                    }

                } ?>
            </div>

            <?php
            echo $args['after_widget'];

        }
    }
endif;