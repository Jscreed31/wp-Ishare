<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creativetech
 */

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>
<?php 
     $sidebar_layout = get_option('creativetech_blog_sidebar_layout'); 
  ?>
<?php 
      if ( !is_front_page() && !is_home()) {
   		 if($sidebar_layout!=3){ ?>
<div id="secondary" class="widget-area container">
    <?php dynamic_sidebar( 'blog-sidebar' ); ?>
</div>
<?php } 
	  }
 ?>