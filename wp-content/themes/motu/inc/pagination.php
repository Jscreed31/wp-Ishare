<?php
/**
 *
 * Pagination Functions
 *
 * @package Motu
 */

if( !function_exists('motu_archive_pagination_x') ):

	// Archive Page Navigation
	function motu_archive_pagination_x(){

		// Global Query
	    if( is_front_page() ){

	    	$posts_per_page = absint( get_option('posts_per_page') );
	        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
	        $posts_args = array(
	            'posts_per_page'        => $posts_per_page,
	            'paged'                 => $c_paged,
	        );
	        $posts_qry = new WP_Query( $posts_args );
	        $max = $posts_qry->max_num_pages;

	    }else{
	        global $wp_query;
	        $max = $wp_query->max_num_pages;
	        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
	    }

		$motu_default = motu_get_default_theme_options();
		$motu_pagination_layout = esc_html( get_theme_mod( 'motu_pagination_layout',$motu_default['motu_pagination_layout'] ) );
		$motu_pagination_load_more = esc_html__('Load More Posts','motu');
		$motu_pagination_no_more_posts = esc_html__('No More Posts','motu');

		if( $motu_pagination_layout == 'next-prev' ){

			if( is_front_page() && is_page() ){

	            $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
	            $latest_post_query = new WP_Query( array( 'post_type'=>'post', 'paged'=>$c_paged ) );?>
	            
	            <nav class="navigation posts-navigation" role="navigation" aria-label="Posts">
	                <div class="nav-links">
	                    <div class="nav-previous">
	                    	<?php echo wp_kses_post( get_next_posts_link( __( 'Older posts', 'motu' ), $latest_post_query->max_num_pages ) ); ?>
	                    </div>
	                    <div class="nav-next"><?php echo wp_kses_post( get_previous_posts_link( __( 'Newer posts', 'motu' ) ) ); ?></div>
	                </div>

	            </nav>
	        <?php

	        }else{
	        	
	            the_posts_navigation( array(
			        'prev_text' => motu_get_theme_svg( 'arrow-left' ).esc_html__( 'Older posts', 'motu' ),
			        'next_text' => esc_html__( 'Newer posts', 'motu' ).motu_get_theme_svg( 'arrow-right' ),
			    ) );

	        }

		}elseif( $motu_pagination_layout == 'load-more' ){ ?>

			<div class="twp-ajax-post-load hide-no-js">

				<div  style="display: none;" class="twp-loaded-content"></div>
				<div style="display: none;" class="twp-loging-status"></div>

				<?php if( $max > 1 ){ ?>

					<a class="twp-loading-button twp-loading-style hide-no-js" href="javascript:void(0)"><?php echo esc_html( $motu_pagination_load_more ); ?></a>

				<?php }else{ ?>

					<a class="twp-loading-button twp-loading-style hide-no-js twp-no-posts" href="javascript:void(0)">
						<?php echo esc_html( $motu_pagination_no_more_posts ); ?>
					</a>

				<?php } ?>

			</div>

		<?php }elseif( $motu_pagination_layout == 'auto-load' ){

			if( $max > 1 ){
				echo '<div style="display: none;" class="twp-loaded-content"></div>';
				echo '<div class="motu-auto-pagination"></div>';
			}else{
				echo '<div style="display: none;" class="twp-loaded-content"></div>';
				echo '<div class="motu-auto-pagination twp-no-posts">'.esc_html( $motu_pagination_no_more_posts ).'</div>';
			}

		}else{

			the_posts_pagination();

		}
			
	}

endif;
add_action('motu_archive_pagination','motu_archive_pagination_x',20);


add_action('wp_ajax_motu_single_infinity', 'motu_single_infinity_callback');
add_action('wp_ajax_nopriv_motu_single_infinity', 'motu_single_infinity_callback');

// Recommendec Post Ajax Call Function.
function motu_single_infinity_callback() {

    if ( isset( $_POST['postid'] ) && isset( $_POST['_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), 'motu_ajax_nonce' ) ) {

        $postid = absint( wp_unslash( $_POST['postid'] ) );
        $motu_default = motu_get_default_theme_options();
        $post_single_next_posts = new WP_Query( array( 'post_type' => 'post','post_status' => 'publish','posts_per_page' => 1, 'post__in' => array( absint( $postid ) ) ) );


        if ( $post_single_next_posts->have_posts() ) :
            while ( $post_single_next_posts->have_posts() ) :
                $post_single_next_posts->the_post();
                $motu_ed_post_views = esc_html( get_post_meta( get_the_ID(), 'motu_ed_post_views', true ) );
                ob_start(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('after-load-ajax' ); ?>> 

					<div class="post-thumbnail mb-15">
                		<?php if( has_post_thumbnail() ){ ?>
							<?php motu_post_thumbnail(); ?>
							
						<?php } ?>
					</div>
					<div class="post-content-wrap">
						<?php 
						if( class_exists( 'Booster_Extension_Class' ) ){ ?>
							<?php $twp_booster_extention_shocial_share = do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
							<?php if (!empty($twp_booster_extention_shocial_share)) { ?>
								<div class="post-content-share">
									<?php echo $twp_booster_extention_shocial_share; ?>
								</div>
							<?php } ?>

						<?php } ?>
							<div class="post-content">

							<header class="entry-header">

								<?php
								if ( 'post' === get_post_type() ) { ?>

									<div class="entry-meta entry-meta-top">

										<?php motu_entry_footer( $cats = true, $tags = false, $edits = false, $text = false, $icon = false ); ?>

									</div>

								<?php  } ?>

								<h1 class="entry-title">

						            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

						        </h1>
						        <div class="entry-meta">

						        	<?php
						        	motu_posted_by();
						        	if( !$motu_ed_post_views ){ motu_post_view_count(); }
						        	?>

						        </div>

							</header>

								<div class="entry-content">

									<?php
									
									the_content( sprintf(
										/* translators: %s: Name of current post. */
										wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'motu' ), array( 'span' => array( 'class' => array() ) ) ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );


									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'motu' ),
										'after'  => '</div>',
									) ); ?>

								</div>

								<?php if ( is_singular() && 'post' === get_post_type() ) { ?>

									<div class="entry-footer">

										<?php motu_entry_footer( $cats = true, $tags = false, $edits = false, $text = false, $icon = false ); ?>

									</div>

								<?php } ?>

							</div>

						<?php
						if ( function_exists('has_block') && has_block('gallery', get_the_content()) ) {

					        echo '<div class="footer-galleries">';
					        $post_blocks = parse_blocks( get_the_content() );
					        if( $post_blocks ){
					            foreach( $post_blocks as $post_block ){

					                if( isset( $post_block['blockName'] ) && 
					                    isset( $post_block['innerHTML'] ) && 
					                    $post_block['blockName'] == 'core/gallery' ){

					                    echo wp_kses_post( $post_block['innerHTML'] );

					                }
					            }
					        }

					        echo '</div>';

					    } ?>
					</div>
				</article>

                <?php
                $next_post_id = '';
                $next_post = get_next_post();
                if( isset( $next_post->ID ) ){ 
                    $next_post_id = $next_post->ID;
                }
                $output['postid'][] = $next_post_id;
                $output['content'][] = ob_get_clean();

            endwhile;

            wp_send_json_success($output);
            wp_reset_postdata();
        endif;
    }
    wp_die();
}
