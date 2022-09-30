<?php

/**
 *
 * A Custom control for post dropdown
 *
 * @since 1.0
 *
 * @package Maglist WordPress theme
 *
 * @uses  Class WP_Customize_Control
 * 
 */
if (class_exists('WP_Customize_Control')) :

	class Maglist_Horizontal_Line extends WP_Customize_Control	{
		public $type = 'horizontal-line';

		/**
		 *    
		 * Adds the horizontal line
		 * @since  1.0
		 * @access public
		 * @return void   
		 *  
		 * @package Maglist WordPress Theme
		 */
		public function render_content() { ?>
			<style>
				hr {
					border-top: 7px solid #c1c1c1;
					border-bottom: 0;
				}
				.horizontal-line span.customize-control-title{
					margin-top: 5px;
					font-weight: 500;
					background: #2271b1;
					color: #ffffff;
					text-align: center;
				}

			</style>
			<div class="horizontal-line">
				<span class="customize-control-title"><?php echo esc_html( $this->label ) ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ) ?></span>
				<hr>
			</div>
<?php }
	}

endif;

Maglist_Customizer::add_custom_control(array(
	'type'     => 'horizontal-line',
	'class'    => 'Maglist_Horizontal_Line',
	'sanitize' => false,
	'register_control_type' => false
));
