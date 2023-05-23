<?php
/*
Plugin Name: Forgotten Studios Elementor Widgets
Description: Custom widgets for Elementor by Forgotten Studios.
Version: 1.0.0
Author: Forgotten Studios - Gerald Bullard Jr
Author URI: https://geraldbullardjr.com
*/

// Enqueue the main scripts/styling files
function fs_elementor_widgets_enqueue_scripts() {
    // Enqueue JavaScript
    wp_enqueue_script( 'fs-elementor-widgets-js', plugins_url( '/js/fs-elementor-widgets.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
    // Enqueue CSS
    wp_enqueue_style( 'fs-elementor-widgets-css', plugins_url( '/css/fs-elementor-widgets.css', __FILE__ ), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'fs_elementor_widgets_enqueue_scripts' );

class Fs_Elementor_Widgets {
	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
        // Require 2 Col Img Left Widget files
		require_once( 'widgets/2_col_img_left.php' );
        wp_register_script( 'fs-elementor-2-col-img-left-widget-js', plugins_url( '/js/fs-elementor-2-col-img-left-widget.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
        wp_register_style( 'fs-elementor-2-col-img-left-widget-css', plugins_url( '/css/fs-elementor-2-col-img-left-widget.css', __FILE__ ), array(), '1.0.0' );wp_enqueue_script( 'fs-elementor-widgets-js', plugins_url( '/js/fs-elementor-widgets.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'fs-elementor-2-col-img-left-widget-js', plugins_url( '/js/fs-elementor-2-col-img-left-widget.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
        wp_enqueue_style( 'fs-elementor-2-col-img-left-widget-css', plugins_url( '/css/fs-elementor-2-col-img-left-widget.css', __FILE__ ), array(), '1.0.0' );
        
        // Call the Widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
        // Register the 2 Col Img Left Widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Fs_Elementor_2_Col_Img_Left_Widget() );
	}
}

function fs_elementor_widgets_init() {
	Fs_Elementor_Widgets::get_instance();
}
add_action( 'init', 'fs_elementor_widgets_init' );

function add_custom_elementor_widget_category($elements_manager) {
    $elements_manager->add_category(
        'fs-elementor-widgets',
        [
            'title' => 'Forgotten Studios',
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'add_custom_elementor_widget_category');