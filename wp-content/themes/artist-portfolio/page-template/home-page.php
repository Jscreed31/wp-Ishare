<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); 

$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d');
?>

<main role="main" id="skip_content">

  <?php do_action( 'artist_portfolio_above_slider' ); ?>

  <?php if( get_theme_mod('artist_portfolio_slider_hide', false) != '' || get_theme_mod( 'artist_portfolio_display_slider',false) != ''){ ?>
    <section id="slider">
      <div class="slider-content text-md-end text-center">
        <?php if( get_theme_mod('artist_portfolio_slider_title') != '' ){ ?>
          <h1><?php echo esc_html(get_theme_mod('artist_portfolio_slider_title')); ?></h1>
        <?php }?>
        <?php if( get_theme_mod('artist_portfolio_slider_btn_text') != '' || get_theme_mod('artist_portfolio_slider_btn_url') != '' ) {?>
          <a href="<?php echo esc_url(get_theme_mod('artist_portfolio_slider_btn_url')); ?>" class="slider-btn"><?php echo esc_html(get_theme_mod('artist_portfolio_slider_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('artist_portfolio_slider_btn_text')); ?></span></a>
        <?php }?>
        <?php if( get_theme_mod('artist_portfolio_arts_title') != '' ){ ?>
          <h2 class="text-md-start text-center"><?php echo esc_html(get_theme_mod('artist_portfolio_arts_title')); ?></h2>
        <?php }?>
        <div class="owl-carousel">
          <?php if ( get_theme_mod('artist_portfolio_slider_category') != '' ) {
            $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('artist_portfolio_slider_category')))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="slider-box">
                <?php the_post_thumbnail(); ?>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php }?>
  
  <?php do_action( 'artist_portfolio_below_slider' ); ?>

  <?php if( get_theme_mod( 'artist_portfolio_product_enable',false) != false) { ?>
    <section id="events-section" class="py-5">
      <div class="events-head">
        <div class="container">
          <?php if(get_theme_mod('artist_portfolio_section_title') != '') {?>
            <h3 class="text-center"><?php echo esc_html(get_theme_mod('artist_portfolio_section_title')); ?></h3>
          <?php }?>
          <?php if(get_theme_mod('artist_portfolio_section_text') != '') {?>
            <p class="text-center"><?php echo esc_html(get_theme_mod('artist_portfolio_section_text')); ?></p>
          <?php }?>
        </div>
      </div>
      <div class="events-bg">
        <div class="container">
          <div class="owl-carousel">
            <?php if ( get_theme_mod('artist_portfolio_events_category') != '' ) {
              $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('artist_portfolio_events_category')))); ?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="events-box">
                  <?php the_post_thumbnail(); ?>
                  <div class="events-content">
                    <h4><?php the_title(); ?></h4>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( artist_portfolio_string_limit_words( $excerpt, 12)); ?></p>
                    <a href="<?php the_permalink(); ?>" class="more-btn"><?php echo esc_html('Know More', 'artist-portfolio'); ?><span class="screen-reader-text"><?php echo esc_html('Know More', 'artist-portfolio'); ?></span></a>
                  </div>
                </div>
              <?php endwhile; wp_reset_query(); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?> 

  <div class="container front-page-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="new-text"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>