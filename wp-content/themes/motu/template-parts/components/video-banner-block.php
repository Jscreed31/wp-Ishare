<?php
/**
 * Banner Video Block
 *
 * @package Motu
 */
if (!function_exists('motu_banner_video_block')):
    function motu_banner_video_block($motu_home_section, $repeat_times)
    {
      $section_video_post_cat = esc_html( isset($motu_home_section->section_video_post_cat) ? $motu_home_section->section_video_post_cat : '');
      $section_video_post_cat_2 = esc_html( isset($motu_home_section->section_video_post_cat_2) ? $motu_home_section->section_video_post_cat_2 : '');
      $home_section_video_title = isset($motu_home_section->home_section_video_title) ? $motu_home_section->home_section_video_title : '';
      $home_section_video_title_2 = isset($motu_home_section->home_section_video_title_2) ? $motu_home_section->home_section_video_title_2 : '';
      $home_video_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => '4','post__not_in' => get_option("sticky_posts"),'category_name' => esc_html( $section_video_post_cat ) ) );
      $home_video_query_2 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => '6','post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $section_video_post_cat_2 ) ) );
      ?>
      <div id="theme-block-<?php echo esc_attr($repeat_times); ?>" class="theme-grid-video theme-grid-video-one theme-block" >
          <div class="wrapper-inner wrapper-inner-small">
            <?php if( $home_video_query ->have_posts() ): ?>
              <div class="column column-8 column-sm-12">
                  <?php if (!empty($home_section_video_title)) { ?>
                    <div class="theme-panel-header">
                        <div class="block-title-wrapper">
                            <h2 class="block-title">
                                <span>
                                      <?php echo esc_html($home_section_video_title);?>
                                </span>
                            </h2>
                        </div>
                    </div>
                  <?php } ?>

                  <div class="theme-panel-body">
                    <div class="grid-video-slider theme-slider-container">
                      <div class="video-slider-container">
                        <?php while( $home_video_query ->have_posts() ){
                          $home_video_query ->the_post(); ?>
                          <div class="video-slider-item">
                            <article class="theme-news-article mb-16">
                    
                              <div class="theme-article-video">
                                <?php 
                                motu_disable_post_views();
                                motu_disable_post_like_dislike();
                                $content = apply_filters('the_content', get_the_content());
                                $video = false;
                                // Only get video from the content if a playlist isn't present.
                                if (false === strpos($content, 'wp-playlist-script')) {
                                    $video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
                                }
                                if (!empty($video)) {
                                  foreach ($video as $video_html) { 
                                    echo motu_iframe_escape($video_html);
                                    break;
                                  } ?>
                                <?php } else {
                                  the_post_thumbnail('full');
                                } ?>
                              </div>   
                              
                              <div class="theme-article-detail">
                              <div class="entry-meta">
                                  <?php motu_entry_footer($cats = true, $tags = false, $edits = false, $text = false, $icon = false); ?>
                              </div>
                                <h3 class="entry-title entry-title-large">
                                  <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                  </a>
                                </h3>
        
                                <div class="entry-meta-bottom">
                                  <?php motu_posted_on( $icon = true ); ?>
                                  <div class="entry-meta-separator"></div>
                                  <?php motu_posted_by_name_only(); ?>
                                </div>
        
                              </div>
        
                            </article>
                          </div>
                        <?php  } ?>
                      </div>

                      <div class="video-slider-button">
                        <button type="button" class="slide-btn slide-btn-small slide-prev-lead btn-position-center" style="">
                            <svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path></svg>
                        </button>

                        <button type="button" class="slide-btn slide-btn-small slide-next-lead btn-position-center" style="">
                          <svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path></svg>                                            
                        </button>

                      </div>
                    </div>
                  </div> 
              </div>
            <?php endif; ?>
            <?php if( $home_video_query_2 ->have_posts() ): ?>
              <div class="column column-4 column-sm-12">
                  <?php
                  $count = 1;
                    while( $home_video_query_2 ->have_posts() ){
                    $home_video_query_2 ->the_post(); ?>
                      <?php 
                      $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                      $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                      <?php if ($count <= 3 ) { 
                        $content = apply_filters('the_content', get_the_content());
                        $video = false;
                        // Only get video from the content if a playlist isn't present.
                        if (false === strpos($content, 'wp-playlist-script')) {
                            $video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
                        }?>
                        <?php if ($count==1) { ?>
                          <div class = 'grid-slider2-contanier'>
                            <?php if (!empty($home_section_video_title_2)) { ?>
                              <div class="theme-panel-header">
                                  <div class="block-title-wrapper">
                                      <h2 class="block-title">
                                          <span>
                                                <?php echo esc_html($home_section_video_title_2);?>
                                          </span>
                                      </h2>
                                  </div>
                              </div>
                            <?php } ?>
                            
                          <div class="theme-panel-body">
                          <div class = 'grid-video-slider2'>
                          <?php } ?>
                            <article class="theme-news-article">
                                <div
                                  class="data-bg data-bg-medium theme-border-decor"
                                  data-background="<?php echo esc_url($featured_image); ?>">
                                  <a href="<?php the_permalink(); ?>" class="img-link theme-video-modal"></a>
                                  <div class="video-overlay-icon">
                                      <?php if (!empty($video)) { ?>
                                      <?php echo motu_theme_svg( 'play-circle', $return = true ) ?>
                                      <?php } ?>
                                    </div>

                                  <div class="entry-meta-bottom image-entry-meta">
                                    <?php motu_posted_on( $icon = true ); ?>
                                    <div class="entry-meta-separator"></div>
                                    <?php motu_posted_by_name_only(); ?>
                                  </div>
                                </div>

                                <div class="theme-article-detail">
                                  <header class="theme-article-header">
                                    <h3 class="entry-title entry-title-medium">
                                      <a href="<?php the_permalink(); ?>">
                                        <?php the_title();?>
                                      </a>
                                    </h3>
                                  </header>
                                </div>
                            </article>
                          <?php if (($count == 3 )|| $home_video_query_2->current_post +1 == $home_video_query_2->post_count) { ?>
                            </div>
                                <div class="modal-container hide">
                                  <div class="overlay"></div>

                                  <div class="modal hide">
                                    <div class="modal-content">
                                      <div class="modal-close">&times;</div>
                                      <?php 
                                        if (!empty($video)) {
                                          foreach ($video as $video_html) { 
                                            echo motu_iframe_escape($video_html);
                                            break;
                                          } ?>
                                        <?php } else {
                                          the_post_thumbnail('full');
                                        } ?>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            </div>
                          <?php } ?>
                      <?php $count++; } else { 
                        $content = apply_filters('the_content', get_the_content());
                        $video = false;
                        // Only get video from the content if a playlist isn't present.
                        if (false === strpos($content, 'wp-playlist-script')) {
                            $video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
                        }
                        ?>
                      <article class="theme-news-article layout-2">
                        <div class="wrapper-inner wrapper-inner-small wrapper-inner-center">
                          <div class="column column-4">
                            <div
                              class="data-bg data-bg-thumbnail theme-border-decor"
                              data-background="<?php echo esc_url($featured_image); ?>">
                              <a href="<?php the_permalink(); ?>" class="img-link theme-video-modal"></a>
                              <div class="video-overlay-icon">
                                <?php if (!empty($video)) { ?>
                                <?php echo motu_theme_svg( 'play-circle', $return = true ) ?>
                                <?php } ?>
                              </div>
                            </div>
                          </div>

                          <div class="column column-8">
                            <div class="theme-article-detail">
                              <header class="theme-article-header">
                                <h3 class="entry-title entry-title-medium">
                                  <a href="<?php the_permalink(); ?>">
                                    <?php the_title();?>
                                  </a>
                                </h3>
                                
                                <div class="entry-meta-bottom">
                                  <?php motu_posted_on( $icon = false ); ?>
                                  <div class="entry-meta-separator"></div>
                                  <?php motu_posted_by_name_only(); ?>
                                </div>
                              </header>
                            </div>
  
                            <div class="modal-container hide">
                              <div class="overlay"></div>
  
                              <div class="modal hide">
                                <div class="modal-content">
                                  <div class="modal-close">&times;</div>
                                  <?php 
                                    if (!empty($video)) {
                                      foreach ($video as $video_html) { 
                                        echo motu_iframe_escape($video_html);
                                        break;
                                      } ?>
                                    <?php } else {
                                      the_post_thumbnail('full');
                                    } ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </article>
                    <?php } ?>
                  <?php } ?>
              </div>
            <?php endif; ?>
        </div>
      </div>
      <?php wp_reset_postdata();
    }
endif;