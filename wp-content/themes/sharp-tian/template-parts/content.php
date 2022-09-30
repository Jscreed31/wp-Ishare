<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharp-tian
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php sharp_tian_post_thumbnail(); ?>
	<div class="main_container">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					sharp_tian_posted_on();
					sharp_tian_posted_by();
					sharp_tian_entry_footer();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->	

		<div class="entry-content">
			<?php

			if ( is_search() || ! is_singular() || is_front_page()){
				if(empty(get_theme_mod( 'sharp_tian_excerpt_length', 20 ))){
						the_content();
				}else{
					$content = get_the_excerpt();
					echo substr($content, 0, get_theme_mod( 'sharp_tian_excerpt_length', 20 ));
				}
				
			}else{
				the_content(
					sprintf(
						wp_kses(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sharp-tian' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sharp-tian' ),
						'after'  => '</div>',
					)
				);
			}
			?>
		</div><!-- .entry-content -->
		<?php
			if(get_theme_mod( 'sharp_tian_container_read_more_btn',true) != ''){
			?>
				<div class="read_btn">	
					<a class='read_more buttons btn btn-primary btn-like-icon' href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod( 'sharp_tian_read_more_btn','Continue reading') );?>
					</a>
				</div>
			<?php
			}
		
		?>
	</div>
	<footer class="entry-footer">
		<?php //sharp_tian_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
