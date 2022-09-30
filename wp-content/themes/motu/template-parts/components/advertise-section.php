<?php
/**
 * Advertise
 *
 * @package Motu
 */

function motu_advertise_block( $motu_home_section ,$repeat_times){ 

	$advertise_image = esc_html( isset($motu_home_section->advertise_image) ? $motu_home_section->advertise_image : '');
	$advertise_link = esc_html( isset($motu_home_section->advertise_link) ? $motu_home_section->advertise_link : '');
	if( $advertise_image ){
	?>
	<div id="theme-block-<?php echo esc_attr($repeat_times); ?>" class="theme-block theme-block-ava">
		<div class="column-row">
			<div class="column column-12">
				<a href="<?php echo esc_url($advertise_link); ?>" target="_blank" class="home-lead-link">
					<img src="<?php echo esc_url($advertise_image); ?>" alt="<?php esc_attr_e('Advertise Image', 'motu'); ?>">
				</a>
			</div>
		</div>
	</div>

	<?php
	}
	
} ?>