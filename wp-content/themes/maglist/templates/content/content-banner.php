<?php

/**
 * Template part for displaying inner banner in pages
 *
 * @since 1.0
 * 
 * @package Maglist WordPress Theme
 */
?>
<div class="<?php echo esc_attr( Maglist_Helper::get_inner_banner_class() ); ?>" <?php Maglist_Helper::the_header_image(); ?>>
	<div class="container">
		<?php
			Maglist_Helper::the_inner_banner();
			Maglist_Helper::the_breadcrumb();
		?>
	</div>
</div>