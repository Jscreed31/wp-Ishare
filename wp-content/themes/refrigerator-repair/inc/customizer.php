<?php
/**
 * Refrigerator Repair: Customizer
 *
 * @subpackage Refrigerator Repair
 * @since 1.0
 */

use WPTRT\Customize\Section\Refrigerator_Repair_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Refrigerator_Repair_Button::class );

	$manager->add_section(
		new Refrigerator_Repair_Button( $manager, 'refrigerator_repair_pro', [
			'title' => __( 'Refrigerator Repair Pro', 'refrigerator-repair' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'refrigerator-repair' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/refrigerator-repair-wordpress-theme/', 'refrigerator-repair')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'refrigerator-repair-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'refrigerator-repair-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function refrigerator_repair_customize_register( $wp_customize ) {

	$wp_customize->add_setting('refrigerator_repair_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('refrigerator_repair_logo_padding',array(
		'label' => __('Logo Padding','refrigerator-repair'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('refrigerator_repair_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'refrigerator_repair_sanitize_float'
	));
	$wp_customize->add_control('refrigerator_repair_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','refrigerator-repair'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('refrigerator_repair_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'refrigerator_repair_sanitize_float'
	));
	$wp_customize->add_control('refrigerator_repair_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','refrigerator-repair'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('refrigerator_repair_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'refrigerator_repair_sanitize_float'
	));
	$wp_customize->add_control('refrigerator_repair_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','refrigerator-repair'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('refrigerator_repair_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'refrigerator_repair_sanitize_float'
 	));
 	$wp_customize->add_control('refrigerator_repair_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','refrigerator-repair'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('refrigerator_repair_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'refrigerator_repair_sanitize_checkbox'
	));
	$wp_customize->add_control('refrigerator_repair_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','refrigerator-repair'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('refrigerator_repair_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'refrigerator_repair_sanitize_checkbox'
	));
	$wp_customize->add_control('refrigerator_repair_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','refrigerator-repair'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_panel( 'refrigerator_repair_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'refrigerator-repair' ),
		'description' => __( 'Description of what this panel does.', 'refrigerator-repair' ),
	) );

	$wp_customize->add_section( 'refrigerator_repair_theme_options_section', array(
    	'title'      => __( 'General Settings', 'refrigerator-repair' ),
		'priority'   => 30,
		'panel' => 'refrigerator_repair_panel_id'
	) );

	$wp_customize->add_setting('refrigerator_repair_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'refrigerator_repair_sanitize_choices'
	));
	$wp_customize->add_control('refrigerator_repair_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','refrigerator-repair'),
		'section' => 'refrigerator_repair_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','refrigerator-repair'),
		   'Right Sidebar' => __('Right Sidebar','refrigerator-repair'),
		   'One Column' => __('One Column','refrigerator-repair'),
		   'Grid Layout' => __('Grid Layout','refrigerator-repair')
		),
	));

	$wp_customize->add_setting('refrigerator_repair_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'refrigerator_repair_sanitize_choices'
	));
	$wp_customize->add_control('refrigerator_repair_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','refrigerator-repair'),
        'section' => 'refrigerator_repair_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','refrigerator-repair'),
            'Right Sidebar' => __('Right Sidebar','refrigerator-repair'),
            'One Column' => __('One Column','refrigerator-repair')
        ),
	));

	$wp_customize->add_setting('refrigerator_repair_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'refrigerator_repair_sanitize_choices'
	));
	$wp_customize->add_control('refrigerator_repair_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','refrigerator-repair'),
        'section' => 'refrigerator_repair_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','refrigerator-repair'),
            'Right Sidebar' => __('Right Sidebar','refrigerator-repair'),
            'One Column' => __('One Column','refrigerator-repair')
        ),
	));

	$wp_customize->add_setting('refrigerator_repair_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'refrigerator_repair_sanitize_choices'
	));
	$wp_customize->add_control('refrigerator_repair_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','refrigerator-repair'),
        'section' => 'refrigerator_repair_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','refrigerator-repair'),
            'Right Sidebar' => __('Right Sidebar','refrigerator-repair'),
            'One Column' => __('One Column','refrigerator-repair'),
            'Grid Layout' => __('Grid Layout','refrigerator-repair')
        ),
	));

	//Header
	$wp_customize->add_section( 'refrigerator_repair_header_section' , array(
    	'title'    => __( 'Header', 'refrigerator-repair' ),
		'priority' => null,
		'panel' => 'refrigerator_repair_panel_id'
	) );

	$wp_customize->add_setting('refrigerator_repair_phone_number',array(
    	'default' => '',
    	'sanitize_callback'	=> 'refrigerator_repair_sanitize_phone_number'
	));
	$wp_customize->add_control('refrigerator_repair_phone_number',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_header_section',
	));

	$wp_customize->add_setting('refrigerator_repair_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('refrigerator_repair_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_header_section',
	));

	$wp_customize->add_setting('refrigerator_repair_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('refrigerator_repair_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_header_section',
	));

	$wp_customize->add_setting('refrigerator_repair_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('refrigerator_repair_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_header_section',
	));

	$wp_customize->add_setting('refrigerator_repair_telegram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('refrigerator_repair_telegram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Telegram URL','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_header_section',
	));

	$wp_customize->add_setting('refrigerator_repair_header_btn_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('refrigerator_repair_header_btn_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Button Text','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_header_section',
	));

	$wp_customize->add_setting('refrigerator_repair_header_btn_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('refrigerator_repair_header_btn_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Button URL','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'refrigerator_repair_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'refrigerator-repair' ),
		'priority' => null,
		'panel' => 'refrigerator_repair_panel_id'
	) );

	$wp_customize->add_setting('refrigerator_repair_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'refrigerator_repair_sanitize_checkbox'
	));
	$wp_customize->add_control('refrigerator_repair_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','refrigerator-repair'),
	   	'section' => 'refrigerator_repair_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'refrigerator_repair_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'refrigerator_repair_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'refrigerator_repair_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'refrigerator-repair' ),
			'description'=> __('Image size (1600px x 400px)','refrigerator-repair'),
			'section' => 'refrigerator_repair_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//Features Section
	$wp_customize->add_section('refrigerator_repair_features_section',array(
		'title'	=> __('Features Section','refrigerator-repair'),
		'description'=> __('This section will appear below the slider.','refrigerator-repair'),
		'panel' => 'refrigerator_repair_panel_id',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst1[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('refrigerator_repair_features_category',array(
		'default' => 'select',
		'sanitize_callback' => 'refrigerator_repair_sanitize_choices',
	));
	$wp_customize->add_control('refrigerator_repair_features_category',array(
		'type' => 'select',
		'choices' => $cat_pst1,
		'label' => __('Select Category to display Post','refrigerator-repair'),
		'section' => 'refrigerator_repair_features_section',
	));

	$wp_customize->add_setting('refrigerator_repair_features_number',array(
		'default'	=> '4',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('refrigerator_repair_features_number',array(
		'label'	=> __('Number of posts to show in a category','refrigerator-repair'),
		'section' => 'refrigerator_repair_features_section',
		'type'	  => 'number'
	));

	$refrigerator_repair_features_number = get_theme_mod('refrigerator_repair_features_number', 4);
	for ($i=1; $i <= $refrigerator_repair_features_number; $i++) { 
	   	$wp_customize->add_setting('refrigerator_repair_feature_icon' . $i, array(
	      	'default' => 'fas fa-snowflake',
	      	'sanitize_callback' => 'sanitize_text_field'
	   	));
	   	$wp_customize->add_control(new Refrigerator_Repair_Fontawesome_Icon_Chooser($wp_customize, 'refrigerator_repair_feature_icon' . $i, array(
	      	'section' => 'refrigerator_repair_features_section',
	      	'type' => 'icon',
	      	'label' => esc_html__('Features Icon ', 'refrigerator-repair') . $i
	  	)));
	}

	//Services Section
	$wp_customize->add_section('refrigerator_repair_service_section',array(
		'title'	=> __('Service Section','refrigerator-repair'),
		'description'=> __('This section will appear below the Features Section.','refrigerator-repair'),
		'panel' => 'refrigerator_repair_panel_id',
	));

    $wp_customize->add_setting('refrigerator_repair_small_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('refrigerator_repair_small_title',array(
		'label'	=> __('Section Small Title','refrigerator-repair'),
		'section' => 'refrigerator_repair_service_section',
		'type' => 'text'
	));

    $wp_customize->add_setting('refrigerator_repair_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('refrigerator_repair_section_title',array(
		'label'	=> __('Section Title','refrigerator-repair'),
		'section' => 'refrigerator_repair_service_section',
		'type' => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('refrigerator_repair_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'refrigerator_repair_sanitize_choices',
	));
	$wp_customize->add_control('refrigerator_repair_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','refrigerator-repair'),
		'section' => 'refrigerator_repair_service_section',
	));

	$wp_customize->add_setting('refrigerator_repair_service_number',array(
		'default'	=> '3',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('refrigerator_repair_service_number',array(
		'label'	=> __('Number of posts to show in a category','refrigerator-repair'),
		'section' => 'refrigerator_repair_service_section',
		'type'	  => 'number'
	));

	$refrigerator_repair_service_number = get_theme_mod('refrigerator_repair_service_number', 3);
	for ($i=1; $i <= $refrigerator_repair_service_number; $i++) { 
	   	$wp_customize->add_setting('refrigerator_repair_service_icon' . $i, array(
	      	'default' => 'fas fa-truck',
	      	'sanitize_callback' => 'sanitize_text_field'
	   	));
	   	$wp_customize->add_control(new Refrigerator_Repair_Fontawesome_Icon_Chooser($wp_customize, 'refrigerator_repair_service_icon' . $i, array(
	      	'section' => 'refrigerator_repair_service_section',
	      	'type' => 'icon',
	      	'label' => esc_html__('Service Icon ', 'refrigerator-repair') . $i
	  	)));
	}

	//Footer
    $wp_customize->add_section( 'refrigerator_repair_footer', array(
    	'title'  => __( 'Footer Text', 'refrigerator-repair' ),
		'priority' => null,
		'panel' => 'refrigerator_repair_panel_id'
	) );

	$wp_customize->add_setting('refrigerator_repair_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'refrigerator_repair_sanitize_checkbox'
    ));
    $wp_customize->add_control('refrigerator_repair_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','refrigerator-repair'),
       'section' => 'refrigerator_repair_footer'
    ));

    $wp_customize->add_setting('refrigerator_repair_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('refrigerator_repair_footer_copy',array(
		'label'	=> __('Footer Text','refrigerator-repair'),
		'section' => 'refrigerator_repair_footer',
		'setting' => 'refrigerator_repair_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'refrigerator_repair_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'refrigerator_repair_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'refrigerator_repair_customize_register' );

function refrigerator_repair_customize_partial_blogname() {
	bloginfo( 'name' );
}

function refrigerator_repair_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class Refrigerator_Repair_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="refrigerator-repair-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="refrigerator-repair-icon-list clearfix">
	                <?php
	                $refrigerator_repair_font_awesome_icon_array = refrigerator_repair_font_awesome_icon_array();
	                foreach ($refrigerator_repair_font_awesome_icon_array as $refrigerator_repair_font_awesome_icon) {
	                   $icon_class = $this->value() == $refrigerator_repair_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($refrigerator_repair_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function refrigerator_repair_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'refrigerator_repair_customizer_script' );