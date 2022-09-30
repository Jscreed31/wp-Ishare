<?php

/**
 * Template part for displaying page content in index.php and archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 1.0
 * @package Maglist WordPress Theme
 */
?>
<article <?php Maglist_Helper::schema_body( 'article' ); ?> id="post-<?php the_ID(); ?>" <?php post_class( Maglist_Helper::with_prefix( 'post' ) ); ?>>
	<div class="maglist-post-inner-box">
		<div class="maglist-post-image"> 
			<a href="<?php the_permalink() ?>">
				<?php Maglist_Theme::the_image_seo_friendly( get_the_ID(), false, 'placeholder' );?>
				<?php Maglist_Helper::post_format_icon() ?>
			</a>
		</div>
		<div class="post-content-wrap">
			<?php

			$order = maglist_get( 'meta-sections-order' );

			if ( '' != $order ) {
				$order = json_decode( $order );
				foreach ( $order as $o ) {
					if ( 'title' == $o ) {
						Maglist_Helper::get_title();
					} elseif ( 'meta' == $o ) {
						get_template_part( 'templates/meta', 'info' );
					} elseif ( 'excerpt' == $o ) {
						the_excerpt();
					} elseif ( 'category' == $o ) {
						$category = maglist_get( 'post-category' );
						if ( 'post' === get_post_type() && $category ) {
							echo Maglist_Helper::the_category();
						}
					}
				}
			}
			?>
		</div>
	</div>
</article>