<?php
/**
 * Plugin Name: Kami K1 Elementor Addon
 * Description: Immersive 3D Scrollytelling, Spec Dashboard Bento Grid, and Interactive Reservation CTA widgets for Kami K1 keyboard landing page.
 * Version: 1.0.0
 * Author: Antigravity AI
 * Text Domain: kami-k1-elementor-addon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Kami_K1_Elementor_Addon {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const MINIMUM_PHP_VERSION = '7.0';

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Category
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_categories' ] );

		// Register Widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		// Enqueue Scripts & Styles
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'enqueue_editor_assets' ] );
	}

	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'kami-k1-elementor-addon' ),
			'<strong>' . esc_html__( 'Kami K1 Elementor Addon', 'kami-k1-elementor-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'kami-k1-elementor-addon' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%s</p></div>', $message );
	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'kami-k1-elementor-addon' ),
			'<strong>' . esc_html__( 'Kami K1 Elementor Addon', 'kami-k1-elementor-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'kami-k1-elementor-addon' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%s</p></div>', $message );
	}

	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'kami-k1-elementor-addon' ),
			'<strong>' . esc_html__( 'Kami K1 Elementor Addon', 'kami-k1-elementor-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'kami-k1-elementor-addon' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%s</p></div>', $message );
	}

	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'kami-k1-category',
			[
				'title' => esc_html__( 'Kami K1 Widgets', 'kami-k1-elementor-addon' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}

	public function register_widgets( $widgets_manager ) {
		require_once( __DIR__ . '/widgets/navbar.php' );
		require_once( __DIR__ . '/widgets/scrollytelling.php' );
		require_once( __DIR__ . '/widgets/bento-grid.php' );
		require_once( __DIR__ . '/widgets/reservation-cta.php' );

		$widgets_manager->register( new \Elementor_Kami_K1_Navbar_Widget() );
		$widgets_manager->register( new \Elementor_Kami_K1_Scrollytelling_Widget() );
		$widgets_manager->register( new \Elementor_Kami_K1_Bento_Grid_Widget() );
		$widgets_manager->register( new \Elementor_Kami_K1_Reservation_CTA_Widget() );
	}

	public function enqueue_assets() {
		// Enqueue custom fonts (Anton, Google Fonts, etc.)
		wp_enqueue_style( 'google-fonts-anton', 'https://fonts.googleapis.com/css2?family=Anton&family=JetBrains+Mono:wght@100;200;300;400;500;700;800&display=swap', [], null );

		// Enqueue Tailwind (optional standard fallback if theme doesn't have it, or custom tailored mini-utilities)
		// We'll bundle Tailwind core custom rules in style.css to keep it pixel-perfect without bloating.
		wp_enqueue_style( 'kami-k1-addon-style', plugins_url( 'assets/css/style.css', __FILE__ ), [], self::VERSION );

		// Enqueue widgets javascript
		wp_enqueue_script( 'kami-k1-addon-scrollytelling', plugins_url( 'assets/js/scrollytelling.js', __FILE__ ), [], self::VERSION, true );
		wp_enqueue_script( 'kami-k1-addon-bento', plugins_url( 'assets/js/bento.js', __FILE__ ), [], self::VERSION, true );
		wp_enqueue_script( 'kami-k1-addon-cta', plugins_url( 'assets/js/cta.js', __FILE__ ), [], self::VERSION, true );

		// Pass plugin assets directory url to JS (so it knows where to find preloaded frames)
		wp_localize_script( 'kami-k1-addon-scrollytelling', 'KamiK1Addon', [
			'pluginUrl' => plugins_url( '/', __FILE__ ),
			'framesUrl' => plugins_url( 'assets/frames/', __FILE__ )
		]);
	}

	public function enqueue_editor_assets() {
		wp_enqueue_style( 'kami-k1-addon-style-editor', plugins_url( 'assets/css/style.css', __FILE__ ), [], self::VERSION );
	}
}

Kami_K1_Elementor_Addon::instance();
