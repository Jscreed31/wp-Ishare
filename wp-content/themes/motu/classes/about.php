<?php

/**
 * Motu About Page
 * @package Motu
 *
*/

if( !class_exists('Motu_About_page') ):

	class Motu_About_page{

		function __construct(){

			add_action('admin_menu', array($this, 'motu_backend_menu'),999);

		}

		// Add Backend Menu
        function motu_backend_menu(){

            add_theme_page(esc_html__( 'Motu Options','motu' ), esc_html__( 'Motu Options','motu' ), 'activate_plugins', 'motu-about', array($this, 'motu_main_page'));

        }

        // Settings Form
        function motu_main_page(){

            require get_template_directory() . '/classes/about-render.php';

        }

	}

	new Motu_About_page();

endif;