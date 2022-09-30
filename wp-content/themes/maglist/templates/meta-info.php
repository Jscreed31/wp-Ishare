<?php

/**
 * Displays the meta information
 *
 * @since 1.0
 *
 * @package Guternbiz WordPress Theme
 */ ?>

<?php if ( 'post' === get_post_type() ) : ?>
	<?php $author   = maglist_get( 'post-author' );
	$date = maglist_get( 'post-date' );
	$comment = maglist_get( 'post-comment' );
	if ( $author || $date || $date ) : ?>
		<div class="entry-meta <?php echo esc_attr( is_single() ? 'single' : '' ); ?>">
			<?php Maglist_Helper::get_author_image(); ?>
			<?php if ( $author || $date || $comment ) : ?>
				<div class="author-info">
					<?php
					echo "<div class='maglist-date-author'>";
						Maglist_Helper::the_date();
						Maglist_Helper::posted_by();
					echo '</div>';
					if( !is_single() ){
						Maglist_Helper::get_comment_number();
					}
					?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
<?php endif; ?>