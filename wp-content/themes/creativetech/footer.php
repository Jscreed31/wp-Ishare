<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creativetech
 */
global $creativetech_theme_options;
$creativetech_copyright= wp_kses_post($creativetech_theme_options['creativetech-footer-copyright']);
$creativetech_back_to_top= wp_kses_post($creativetech_theme_options['creativetech-back-to-top-option']);
$creativetech_footer_col_layout= get_theme_mod("creativetech_footer_col_layout"); 
?>
<footer id="colophon" class="site-footer creativetech_footer">
    <div class="footer_layout footer-<?php echo esc_attr($creativetech_footer_col_layout); ?>-column-layout">
        <?php if ( is_active_sidebar( 'footer-widget-first-column' ) ) { ?>
        <div id="footer-widget-first-column" class="widget-area container">
            <?php dynamic_sidebar( 'footer-widget-first-column' ); ?>
        </div><!-- #first -->
        <?php } ?>
        <?php if ( is_active_sidebar( 'footer-widget-second-column' ) ) { ?>
        <div id="footer-widget-second-column" class="widget-area container">
            <?php dynamic_sidebar( 'footer-widget-second-column' ); ?>
        </div><!-- #second -->
        <?php } ?>
        <?php if ( is_active_sidebar( 'footer-widget-third-column' ) ) { ?>
        <div id="footer-widget-third-column" class="widget-area container">
            <?php dynamic_sidebar( 'footer-widget-third-column' ); ?>
        </div><!-- #third -->
        <?php } ?>
        <?php if ( is_active_sidebar( 'footer-widget-fourth-column' ) ) { ?>
        <div id="footer-widget-fourth-column" class="widget-area container">
            <?php dynamic_sidebar( 'footer-widget-fourth-column' ); ?>
        </div><!-- #foruth -->
        <?php } ?>
    </div><!-- .site-info -->
</footer>
<?php 
 if($creativetech_back_to_top==1){ ?>
    <div class="go-top">
        <p class="go-top-text">
            <svg xmlns="http://www.w3.org/2000/svg" class="back-to-top-icon" fill="none" viewBox="0 0 24 24" stroke="#fff">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
            </svg>
        </p>
    </div>
<?php } ?>
<?php if($creativetech_copyright !='') { ?>
<div class="creativetech_footer_copyright">
   <span class="copyright_text"><?php echo $creativetech_copyright; ?></span>
</div>
<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>