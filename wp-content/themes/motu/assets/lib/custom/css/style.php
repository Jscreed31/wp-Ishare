<?php
/**
 * Motu Dynamic Styles
 *
 * @package Motu
 */

function motu_dynamic_css()
{

    $motu_default = motu_get_default_theme_options();
    $twp_motu_home_sections_1 = get_theme_mod('twp_motu_home_sections_1', json_encode($motu_default['twp_motu_home_sections_1']));
    $twp_motu_home_sections_1 = json_decode($twp_motu_home_sections_1);
    $logo_width_range = get_theme_mod('logo_width_range', $motu_default['logo_width_range']);


    echo "<style type='text/css' media='all'>"; ?>

    <?php

    $repeat_times = 1;

    foreach ($twp_motu_home_sections_1 as $motu_home_section) {

        $section_text_color = esc_url(isset($motu_home_section->section_text_color) ? $motu_home_section->section_text_color : '');

        if ($section_text_color) { ?>

            #theme-block-<?php echo $repeat_times; ?> {
            color: <?php echo esc_url($section_text_color); ?>;
            }

            #theme-block-<?php echo $repeat_times; ?> .news-article-list{
            border-color: <?php echo motu_hex_2_rgba($section_text_color, 0.25); ?>;
            }

            <?php
        }
        $section_background_color = esc_url(isset($motu_home_section->background_color) ? $motu_home_section->background_color : '');

        if ($section_background_color) { ?>

            #theme-block-<?php echo $repeat_times; ?> {
            background-color: <?php echo esc_url($section_background_color); ?>;
            margin-bottom:0;
            }

            <?php
        }

        $repeat_times++;
    } ?>

    .site-logo .custom-logo-link{
    max-width:  <?php echo esc_attr($logo_width_range); ?>px;
    }

    <?php echo "</style>";
}

add_action('wp_head', 'motu_dynamic_css', 100);

/**
 * Sanitizing Hex color function.
 */
function motu_sanitize_hex_color($color)
{

    if ('' === $color)
        return '';
    if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color))
        return $color;

}