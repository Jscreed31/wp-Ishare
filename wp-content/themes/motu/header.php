<?php
/**
 * Header file for the Motu WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Motu
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
} ?>

<?php
$motu_default = motu_get_default_theme_options();

$ed_preloader = get_theme_mod('ed_preloader', $motu_default['ed_preloader']);
if ($ed_preloader) { ?>

    <div id="theme-site-preloader">
        <div class="preloader-wrapper">
            <div class="preloader"></div>
        </div>
    </div>

<?php } ?>

<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to the content', 'motu'); ?></a>
    <?php
    get_template_part('template-parts/header/header', 'content'); ?>

    <?php motu_header_banner(); ?>

    <div id="content" class="site-content">
        <div class="wrapper">
            <div class="wrapper-inner">
                <div class="column column-12">
                    <div class="theme-main-block">

