<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Kami_K1_Navbar_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'kami-k1-navbar';
	}

	public function get_title() {
		return esc_html__( 'Kami K1 Navbar', 'kami-k1-elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-navigation-horizontal';
	}

	public function get_categories() {
		return [ 'kami-k1-category' ];
	}

	protected function register_controls() {
		// Content Tab
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'brand_logo_main',
			[
				'label' => esc_html__( 'Brand Logo First Word', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'KAMI', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'brand_logo_sub',
			[
				'label' => esc_html__( 'Brand Logo Second Word', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'TECHS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'link_1_label',
			[
				'label' => esc_html__( 'Link 1 Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '01 / Scrollytelling', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'link_1_url',
			[
				'label' => esc_html__( 'Link 1 URL/Anchor', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#scrollytelling',
			]
		);

		$this->add_control(
			'link_2_label',
			[
				'label' => esc_html__( 'Link 2 Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '02 / Engineering Specs', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'link_2_url',
			[
				'label' => esc_html__( 'Link 2 URL/Anchor', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#specs',
			]
		);

		$this->add_control(
			'link_3_label',
			[
				'label' => esc_html__( 'Link 3 Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '03 / Acquire', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'link_3_url',
			[
				'label' => esc_html__( 'Link 3 URL/Anchor', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#order',
			]
		);

		$this->add_control(
			'cta_label',
			[
				'label' => esc_html__( 'CTA Button Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ACQUIRE K1', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label' => esc_html__( 'CTA Link Anchor/URL', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#order',
			]
		);

		$this->end_controls_section();

		// Style Section for border-radius customization
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style Settings', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'brand_icon_border_radius',
			[
				'label' => esc_html__( 'Brand Icon Border Radius', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .kami-k1-brand-icon' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'cta_btn_border_radius',
			[
				'label' => esc_html__( 'CTA Button Border Radius', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .kami-k1-navbar-cta a' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mobile_cta_btn_border_radius',
			[
				'label' => esc_html__( 'Mobile CTA Button Border Radius', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .kami-k1-mobile-drawer a.mobile-cta' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="kami-k1-addon-wrapper">
			<header id="kami-k1-header-nav" class="kami-k1-navbar">
				<div class="kami-k1-navbar-container">
					<!-- Brand Logo -->
					<a href="#" class="kami-k1-brand">
						<div class="kami-k1-brand-icon">
							<svg viewBox="0 0 24 24">
								<rect x="4" y="4" width="16" height="16" rx="2" />
								<rect x="9" y="9" width="6" height="6" rx="1" />
								<path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3" />
							</svg>
						</div>
						<span class="kami-k1-brand-text">
							<?php echo esc_html( $settings['brand_logo_main'] ); ?><span><?php echo esc_html( $settings['brand_logo_sub'] ); ?></span>
						</span>
					</a>

					<!-- Desktop Nav Links -->
					<nav class="kami-k1-nav-links">
						<a href="<?php echo esc_attr( $settings['link_1_url'] ); ?>"><?php echo esc_html( $settings['link_1_label'] ); ?></a>
						<a href="<?php echo esc_attr( $settings['link_2_url'] ); ?>"><?php echo esc_html( $settings['link_2_label'] ); ?></a>
						<a href="<?php echo esc_attr( $settings['link_3_url'] ); ?>"><?php echo esc_html( $settings['link_3_label'] ); ?></a>
					</nav>

					<!-- Desktop CTA -->
					<div class="kami-k1-navbar-cta">
						<a href="<?php echo esc_attr( $settings['cta_link'] ); ?>">
							<span><?php echo esc_html( $settings['cta_label'] ); ?></span>
							<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
						</a>
					</div>

					<!-- Mobile Toggle -->
					<button class="kami-k1-mobile-toggle" aria-label="Toggle menu" onclick="document.getElementById('kami-k1-mobile-drawer').classList.toggle('open')">
						<svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
						</svg>
					</button>
				</div>

				<!-- Mobile Drawer -->
				<div id="kami-k1-mobile-drawer" class="kami-k1-mobile-drawer">
					<a href="<?php echo esc_attr( $settings['link_1_url'] ); ?>" onclick="document.getElementById('kami-k1-mobile-drawer').classList.remove('open')"><?php echo esc_html( $settings['link_1_label'] ); ?></a>
					<a href="<?php echo esc_attr( $settings['link_2_url'] ); ?>" onclick="document.getElementById('kami-k1-mobile-drawer').classList.remove('open')"><?php echo esc_html( $settings['link_2_label'] ); ?></a>
					<a href="<?php echo esc_attr( $settings['link_3_url'] ); ?>" onclick="document.getElementById('kami-k1-mobile-drawer').classList.remove('open')"><?php echo esc_html( $settings['link_3_label'] ); ?></a>
					<a href="<?php echo esc_attr( $settings['cta_link'] ); ?>" class="mobile-cta" onclick="document.getElementById('kami-k1-mobile-drawer').classList.remove('open')">
						<?php echo esc_html( $settings['cta_label'] ); ?>
					</a>
				</div>
			</header>
		</div>

		<script>
			// Shrink navbar on scroll
			document.addEventListener("DOMContentLoaded", () => {
				const header = document.getElementById("kami-k1-header-nav");
				if (header) {
					window.addEventListener("scroll", () => {
						if (window.scrollY > 50) {
							header.classList.add("scrolled");
						} else {
							header.classList.remove("scrolled");
						}
					});
				}
			});
		</script>
		<?php
	}
}
