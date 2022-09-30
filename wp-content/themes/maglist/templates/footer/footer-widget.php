<?php

/**
 * Content for footer widget
 *
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */
if ( !apply_filters( Maglist_Helper::fn_prefix( 'disable_footer_widget' ), false ) ) : ?>
	<footer <?php Maglist_Helper::schema_body( 'footer' ) ; ?> class="footer-top-section">
		<div class="footer-widget">
			<div class="container">
				<div class="row">					
					<?php if ( is_active_sidebar( Maglist_Helper::fn_prefix( 'footer_widget_area' ) ) ) : ?>
						<aside class="col footer-widget-wrapper py-5">
							<?php dynamic_sidebar( Maglist_Helper::fn_prefix( 'footer_widget_area' ) ); ?>
						</aside>
					<?php else: ?>
						<aside class="col footer-widget-wrapper py-5">
						    <?php Maglist_Theme::the_default_search(); ?>
						</aside>
						<aside class="col footer-widget-wrapper py-5">
						    <?php Maglist_Theme::the_default_recent_post(); ?>
						</aside>
						<aside class="col footer-widget-wrapper py-5">
						    <?php Maglist_Theme::the_default_archive(); ?>
						</aside>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
<?php endif;
