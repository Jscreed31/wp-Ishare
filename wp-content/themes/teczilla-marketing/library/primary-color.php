<?php 
function teczilla_marketing_inline_css(){
	
$teczilla_theme_color_scheme = get_theme_mod('teczilla_theme_color_scheme','#252628');
$teczilla_custom_css      = '';           
$teczilla_color_scheme = get_theme_mod( 'teczilla_color_scheme', '#1b1b1b' );

$teczilla_custom_css      .= '.tec-footer{background-color: ' . esc_attr( $teczilla_color_scheme) . ';}';

$teczilla_footer_widgets_title_color = get_theme_mod( 'teczilla_footer_widgets_title_color','#fff' );

$teczilla_custom_css      .= '.tec-footer .footer-content .widget-title,.footer-widget.widget_block h2{color: ' . esc_attr( $teczilla_footer_widgets_title_color) . ';}';

$teczilla_footer_widgets_text_color = get_theme_mod( 'teczilla_footer_widgets_text_color','#fff' );

$teczilla_custom_css      .= '.tec-footer a,.tec-footer.widget_categories li,.tec-footer.widget_meta li a,.tec-footer.widget_calendar td,.tec-footer.widget_nav_menu div li a, .tec-footer.widget_pages li a,.tec-footer .recentcomments,.tec-footer .recentcomments a,.tec-footer .textwidget p,.readon.banner-style:hover,.footer-widget.widget_block p{color: ' . esc_attr( $teczilla_footer_widgets_text_color) . ';}';



$teczilla_breadcrumb_title_color = get_theme_mod('teczilla_breadcrumb_title_color','#fff');

$teczilla_custom_css      .= '.tec-breadcrumbs .inner-title h2{color: ' . esc_attr( $teczilla_breadcrumb_title_color) . ';}';

$teczilla_header_bg_color = get_theme_mod('teczilla_header_bg_color','#000');

$teczilla_custom_css      .= '.tec-breadcrumbs:before{background: ' . esc_attr( $teczilla_header_bg_color) . ';}';


$teczilla_theme_color_scheme = get_theme_mod('teczilla_theme_color_scheme','#C69C6D');               

$teczilla_custom_css      .= '.home-slider .container .slider-caption:after,.sec-title .sub-title.primary:after,.readon,.tec-services.style2 .service-wrap .image-part i,.bg21,.tec-portfolio.style3 .portfolio-item .content-part .middle .categories a,.tec-carousel.dot-style1 .owl-dots .owl-dot,.tec-team.inner .team-item .text-bottom .team-social ul li,#scrollUp i,#scrollUp i:hover,.tec-footer .footer-content .widget-title:before,.comment-respond .form-submit input,.widget_tag_cloud .tagcloud a:hover,.main-header-area .main-menu-area nav ul li ul > li:hover, .main-header-area .main-menu-area nav ul li ul > li .active,.sidebar-grid .sidebar-title .title:after,.sidebar-grid ul::before,.main-slider-three .owl-carousel .owl-nav .owl-next:hover,.comment-respond .form-submit input:hover,.widget_tag_cloud .tagcloud a:hover,.srvc .bg-darker,.project-area.project-call,.header-search .input-search:focus,.sub-modals,.dialog-content #save-dialog,.error-content .btn,.readon:hover,.main-navigation ul li:hover > ul, .main-navigation ul li.focus > ul,.widget_tag_cloud .wp-block-tag-cloud a,.tec-footer .footer-bottom,.carousel-control-next-icon:before,.carousel-control-prev-icon:before,.tec-team.inner .team-item .text-bottom,.full-width-header .toolbar-area .toolbar-sl-share ul li a
       {background-color: ' . esc_attr( $teczilla_theme_color_scheme) . ';}';



$teczilla_custom_css      .= '.blog-wrap,.comment-respond .comment-form-comment textarea,
.comment-respond .comment-form-author input,.comment-respond .comment-form-email input,
.comment-respond .comment-form-url input
       {
        border-bottom: 1px solid '. esc_attr( $teczilla_theme_color_scheme) . ' !important}';

$teczilla_custom_css      .= '.nav-links .page-numbers,.social li
       {
        background-color: transparent;
        border: 1px solid '. esc_attr( $teczilla_theme_color_scheme) . '}';

$teczilla_custom_css      .= 'blockquote
       {
        border-left: 5px solid '. esc_attr( $teczilla_theme_color_scheme) . '}';

$teczilla_custom_css      .= '.comment-respond .form-submit input{border-color: ' . esc_attr( $teczilla_theme_color_scheme) . ';}';

$teczilla_custom_css      .= '
       .sec-title .sub-title.primary,.tec-testimonial.style1 .testi-item .content-part .icon-part i,.tec-blog.style1 .blog-wrap .content-part .blog-meta .user-data i,.tec-blog.style1 .blog-wrap .content-part .blog-meta .date i,.tec-blog.inner .blog-wrap .content-part .blog-meta li i,.sidebar-widget.widget_archive li:before, .sidebar-widget.widget_categories li:before, .sidebar-widget.widget_meta li:before,.trail-begin a,.breadcrumb-item a,.tec-services.style2 .service-wrap .image-part i,.tec-services.style2 .service-wrap .content-part .title a:hover{
                     color: ' . esc_attr( $teczilla_theme_color_scheme) . '!important; ;
                }';


$teczilla_custom_css      .= '.btn-read-more-fill{border-bottom: 1px solid ' . esc_attr( $teczilla_theme_color_scheme) . ' !important;}';


$teczilla_custom_css      .= ' .nav-links .page-numbers:hover{background-color:  #fff;
                     border-bottom: 1px solid ' . esc_attr( $teczilla_theme_color_scheme) . ' !important;
                     color:' . esc_attr( $teczilla_theme_color_scheme) . ' !important;}';


$teczilla_custom_css      .= '.contact-banner-area .color-theme, .projects-2-featured-area .featuredContainer .featured-box:hover .overlay,.sidebar-title:before{background-color: ' . esc_attr( $teczilla_theme_color_scheme) . ';opacity:0.8;}';

$teczilla_custom_css      .= '.bg-primary,.slick-dots li.slick-active,.post-full .post-date,.preloader.preloader-dalas:before,
.preloader.preloader-dalas:after,.back-to-top{background-color: ' . esc_attr( $teczilla_theme_color_scheme) . ' !important;}';

$teczilla_custom_css .='.blog-wrap a{color: #000 !important;}';


$teczilla_brdcrmb_opacity_section = get_theme_mod('teczilla_brdcrmb_opacity_section','0.75');

$teczilla_custom_css      .= '.tec-breadcrumbs:before{opacity: ' . esc_attr( $teczilla_brdcrmb_opacity_section) . ';}';


$teczilla_footer_opacity = get_theme_mod('teczilla_footer_opacity_section','0.0');

$teczilla_custom_css      .= '.tc-light.footer-s1::after{opacity: ' . esc_attr( $teczilla_footer_opacity) . ';}';


$braedcrumb_height = get_theme_mod('braedcrumb_height','180');

$teczilla_custom_css      .= '.tec-breadcrumbs{height: ' . esc_attr( $braedcrumb_height) . 'px;}';


wp_add_inline_style( 'teczilla-style', $teczilla_custom_css );

}

add_action( 'wp_enqueue_scripts', 'teczilla_marketing_inline_css',20 );


if( !function_exists('teczilla_breadcrumbs') ): function teczilla_breadcrumbs() {
$image = get_header_image();
  ?>
            <div class="tec-breadcrumbs bg-1">
                <div class="container">
                    <div class="inner-title text-left">
                  <?php if(is_home()): ?>
                            <h2 class="banner-heading" ><?php the_title(); ?></h2>
                            <?php else: ?>
                              <h2 class="banner-heading">
                                <?php if ( is_archive() ) {
                                  the_archive_title( '<h2 class="banner-heading">', '</h2>' );
                                }
                                 elseif(is_search()){

                                  echo  esc_html__('Search Results For ', 'teczilla-marketing') . ' " ' . get_search_query() . ' "';

                                 }elseif ( is_404() ) {
                                  echo  esc_html__('Nothing Found ', 'teczilla-marketing');
                                 }
                                 else{
                                  
                                    echo esc_html( get_the_title() );
                                    
                                  } 
                                 ?>
                              </h2>
                            <?php endif; 
                            if(!is_singular()) {
                            ?>
                           <?php teczilla_breadcrumb_trail(); ?>
                         <?php } ?>

                </div>
              </div>
               
            </div>
         
      <div id="content"></div>
<?php } endif;

