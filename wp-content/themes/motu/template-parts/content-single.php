<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Motu
 * @since 1.0.0
 */


$motu_default = motu_get_default_theme_options();
$motu_post_layout = esc_html( get_post_meta( get_the_ID(), 'motu_post_layout', true ) );
$motu_feature_image = esc_html( get_post_meta( get_the_ID(), 'motu_ed_feature_image', true ) );

if (empty($motu_feature_image)) {
	$motu_ed_feature_image = esc_attr(get_theme_mod('ed_post_thumbnail'));
} else{
	$motu_ed_feature_image = esc_attr($motu_feature_image);
}

if( is_page() ){

	$motu_post_layout = get_post_meta(get_the_ID(), 'motu_page_layout', true);
	
}
if( $motu_post_layout == '' || $motu_post_layout == 'global-layout' ){
    
    $motu_post_layout = get_theme_mod( 'motu_single_post_layout',$motu_default['motu_single_post_layout'] );

}

	
motu_disable_post_views();
motu_disable_post_like_dislike();

$motu_ed_post_views = esc_html( get_post_meta( get_the_ID(), 'motu_ed_post_views', true ) );
$motu_ed_post_read_time = esc_html( get_post_meta( get_the_ID(), 'motu_ed_post_read_time', true ) );
$motu_ed_post_author_box = esc_html( get_post_meta( get_the_ID(), 'motu_ed_post_author_box', true ) );
$motu_ed_post_social_share = esc_html( get_post_meta( get_the_ID(), 'motu_ed_post_social_share', true ) );
$motu_ed_post_reaction = esc_html( get_post_meta( get_the_ID(), 'motu_ed_post_reaction', true ) );

if( $motu_ed_post_read_time ){ motu_disable_post_read_time(); }
if( $motu_ed_post_author_box ){ motu_disable_post_author_box(); }
if( $motu_ed_post_reaction ){ motu_disable_post_reaction(); }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

	<?php

	if( $motu_post_layout == 'layout-1' ){ ?>
		<div class="post-thumbnail mb-15">
			<?php if(has_post_thumbnail()){
 				motu_post_thumbnail();
			} else {?>
				<div class="twp-single-no-image"></div>
			<?php }?>
		
			<?php if ( is_singular() && $motu_post_layout != 'layout-2' ) { ?>
				
			<?php } ?>
			
		</div>

	<?php
	} ?>

	
	<div class="post-content-wrap">

		<?php if( is_singular() && empty( $motu_ed_post_social_share ) && class_exists( 'Booster_Extension_Class' ) && 'post' === get_post_type() ){ ?>
				
			<?php $twp_booster_extention_shocial_share = do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
			<?php if (!empty($twp_booster_extention_shocial_share)) { ?>
				<div class="post-content-share">
					<?php echo $twp_booster_extention_shocial_share; ?>
				</div>
			<?php } ?>

		<?php } ?>

		<div class="post-content">
			<?php if ( $motu_post_layout != 'layout-2') { ?>
				<header class="entry-header">
				
					<?php
					if ( 'post' === get_post_type() ) { ?>

						<div class="entry-meta entry-meta-top">

							<?php motu_entry_footer( $cats = true, $tags = false, $edits = false, $text = false, $icon = false ); ?>

						</div>

					<?php  } ?>

					<h1 class="entry-title entry-title-large">

						<?php the_title(); ?>

					</h1>
					
					<?php if ( $motu_post_layout != 'layout-2' && is_single() && 'post' === get_post_type() ) { ?>
						<div class="entry-meta">

							<?php
							motu_posted_by();
							if( !$motu_ed_post_views ){ motu_post_view_count(); }
							?>

						</div>
					<?php  } ?>
				</header>
			<?php  } ?>
			<div class="entry-content">

				<?php

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'motu' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				if( !class_exists('Booster_Extension_Class') || is_page() ):

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'motu'),
                        'after' => '</div>',
                    ));

                endif; ?>

			</div>

			<?php
			if ( is_singular() && 'post' === get_post_type() ) { ?>

				<div class="entry-footer">

                    <div class="entry-meta">
                         <?php motu_post_like_dislike(); ?>
                    </div>

                    <div class="entry-meta">
                        <?php motu_entry_footer( $cats = false, $tags = true, $edits = true ); ?>
                    </div>

				</div>

			<?php } ?>

		</div>

	</div>

</article>