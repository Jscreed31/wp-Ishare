<?php
/**
* Header Options.
*
* @package Motu
*/

$motu_default = motu_get_default_theme_options();
$motu_post_category_list = motu_post_category_list();
$wp_customize->add_section( 'breaking_news_setting',
    array(
    'title'      => esc_html__( 'Top Header Settings', 'motu' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);


$wp_customize->add_setting('ed_ticker_bar',
    array(
        'default' => $motu_default['ed_ticker_bar'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_ticker_bar',
    array(
        'label' => esc_html__('Enable Top Bar', 'motu'),
        'section' => 'breaking_news_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_ticker_bar_date',
    array(
        'default' => $motu_default['ed_ticker_bar_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_ticker_bar_date',
    array(
        'label' => esc_html__('Enable Current Date', 'motu'),
        'section' => 'breaking_news_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'ticker_date_format',
    array(
    'default'           => $motu_default['ticker_date_format'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ticker_date_format',
    array(
    'label'       => esc_html__( 'Ticker Date Format', 'motu' ),
    'section'     => 'breaking_news_setting',
    'type'        => 'text',
    )
);


$wp_customize->add_setting('ed_ticker_bar_time',
    array(
        'default' => $motu_default['ed_ticker_bar_time'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_ticker_bar_time',
    array(
        'label' => esc_html__('Enable Current Time', 'motu'),
        'section' => 'breaking_news_setting',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('ed_header_ticker_posts',
    array(
        'default' => $motu_default['ed_header_ticker_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'motu_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_ticker_posts',
    array(
        'label' => esc_html__('Enable Ticker Posts', 'motu'),
        'section' => 'breaking_news_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'ed_header_ticker_posts_title',
    array(
    'default'           => $motu_default['ed_header_ticker_posts_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ed_header_ticker_posts_title',
    array(
    'label'       => esc_html__( 'Ticker Section Title', 'motu' ),
    'section'     => 'breaking_news_setting',
    'type'        => 'text',
    )
);


$wp_customize->add_setting( 'motu_header_ticker_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'motu_sanitize_select',
    )
);
$wp_customize->add_control( 'motu_header_ticker_cat',
    array(
    'label'       => esc_html__( 'Ticker Posts Category', 'motu' ),
    'section'     => 'breaking_news_setting',
    'type'        => 'select',
    'choices'     => $motu_post_category_list,
    )
);
