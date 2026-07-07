<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Kami_K1_Bento_Grid_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'kami-k1-bento-grid';
	}

	public function get_title() {
		return esc_html__( 'Kami K1 Bento Grid', 'kami-k1-elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-inner-section';
	}

	public function get_categories() {
		return [ 'kami-k1-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Section Header', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label' => esc_html__( 'Section Header Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'SPECIFICATION DASHBOARD', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'section_title_1',
			[
				'label' => esc_html__( 'Section Title Line 1', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PRECISION', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'section_title_2',
			[
				'label' => esc_html__( 'Section Title Line 2', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ARCHITECTURE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label' => esc_html__( 'Section Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Every curve, gasket, and socket is meticulously engineered for peak acoustic profiles and minimal actuation latency.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'section_meta_model',
			[
				'label' => esc_html__( 'Meta Model Text', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'DESIGN MODEL: KAMI_K1_REV4', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'section_meta_patent',
			[
				'label' => esc_html__( 'Meta Patent Text', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PATENT PENDING // 2026', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card 1 (OLED HUD)
		$this->start_controls_section(
			'card_1_section',
			[
				'label' => esc_html__( 'Card 1: OLED HUD', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_1_tag',
			[
				'label' => esc_html__( 'System Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'KAMI_HUD.SYS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_1_title',
			[
				'label' => esc_html__( 'Card Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Customizable OLED Status HUD', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_1_desc',
			[
				'label' => esc_html__( 'Card Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'A gorgeous 1.2-inch customizable panel offering real-time stats, battery diagnostics, connectivity signals, and custom animations.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_1_oled_title',
			[
				'label' => esc_html__( 'OLED Simulated Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'KAMI SYSTEM', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_1_oled_status',
			[
				'label' => esc_html__( 'OLED Simulated Status', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '2.4G // 1ms // OK', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_1_oled_percentage',
			[
				'label' => esc_html__( 'OLED Simulated Percentage', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '84%', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card 2 (Response Time)
		$this->start_controls_section(
			'card_2_section',
			[
				'label' => esc_html__( 'Card 2: Response Time', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_2_tag',
			[
				'label' => esc_html__( 'System Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'SPEED_LATENCY', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_2_title',
			[
				'label' => esc_html__( 'Card Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '1ms Response Time', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_2_desc',
			[
				'label' => esc_html__( 'Card Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Ultra-low latency connection engineered with an upgraded 2.4GHz RF module, rivaling custom wired setups.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card 3 (CNC Aluminum Case)
		$this->start_controls_section(
			'card_3_section',
			[
				'label' => esc_html__( 'Card 3: Aluminum Case', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_3_tag',
			[
				'label' => esc_html__( 'System Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CHASSIS_CNC', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_3_title',
			[
				'label' => esc_html__( 'Card Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CNC Aluminum Case', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_3_desc',
			[
				'label' => esc_html__( 'Card Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Carved from solid blocks of 6063 aerospace aluminum, sandblasted and anodized to provide a massive, resonance-free base.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card 4 (Double Gasket)
		$this->start_controls_section(
			'card_4_section',
			[
				'label' => esc_html__( 'Card 4: Gasket Mount', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_4_tag',
			[
				'label' => esc_html__( 'System Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ISOLATE_ACOUSTIC', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_4_title',
			[
				'label' => esc_html__( 'Card Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Double Gasket Suspension System', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_4_desc',
			[
				'label' => esc_html__( 'Card Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Silicon gaskets sandwiched between custom Poron padding isolate the PCB plate from the metal chassis, securing a satisfyingly deep "thock" sound profile.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_4_gasket_points_val',
			[
				'label' => esc_html__( 'Gasket Points Value', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '14pt', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_4_gasket_points_lbl',
			[
				'label' => esc_html__( 'Gasket Points Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Gasket Points', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_4_foam_isolation_val',
			[
				'label' => esc_html__( 'Foam Isolation Value', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PORON', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_4_foam_isolation_lbl',
			[
				'label' => esc_html__( 'Foam Isolation Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Foam Isolation', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card 5 (Tri-Mode)
		$this->start_controls_section(
			'card_5_section',
			[
				'label' => esc_html__( 'Card 5: Tri-Mode Wireless', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_5_tag',
			[
				'label' => esc_html__( 'System Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CON_TRI_MODE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_5_title',
			[
				'label' => esc_html__( 'Card Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Tri-Mode Wireless', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_5_desc',
			[
				'label' => esc_html__( 'Card Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Seamless hot-swapping between 2.4GHz wireless, Bluetooth 5.1 (up to 3 devices), and Type-C high-speed wired connections.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card 6 (Battery)
		$this->start_controls_section(
			'card_6_section',
			[
				'label' => esc_html__( 'Card 6: Battery Cell', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_6_tag',
			[
				'label' => esc_html__( 'System Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PWR_CELL', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_6_title',
			[
				'label' => esc_html__( 'Card Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '4000mAh Battery Cell', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_6_desc',
			[
				'label' => esc_html__( 'Card Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Up to 200 hours of continuous typing with customizable sleeping states and power saving triggers.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card 7 (Hot-Swappable)
		$this->start_controls_section(
			'card_7_section',
			[
				'label' => esc_html__( 'Card 7: Hot-Swappable', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_7_tag',
			[
				'label' => esc_html__( 'System Tag', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'SOCKET_HOTSWAP', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_7_title',
			[
				'label' => esc_html__( 'Card Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '5-Pin Hot-Swappable', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'card_7_desc',
			[
				'label' => esc_html__( 'Card Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Outfitted with premium Kailh sockets, allowing rapid switch replacement without soldering. Compatible with all MX style switches.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Add section for Card style under Style tab
		$this->start_controls_section(
			'card_style_section',
			[
				'label' => esc_html__( 'Card Style Settings', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'card_border_radius',
			[
				'label' => esc_html__( 'Card Border Radius', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 8,
				],
				'selectors' => [
					'{{WRAPPER}} .kami-k1-bento-card' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Icon Container Border Radius', 'kami-k1-elementor-addon' ),
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
					'size' => 6,
				],
				'selectors' => [
					'{{WRAPPER}} .kami-k1-icon-container' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'oled_border_radius',
			[
				'label' => esc_html__( 'OLED Simulated Screen Border Radius', 'kami-k1-elementor-addon' ),
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
					'{{WRAPPER}} .kami-k1-oled-sim' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'gasket_pill_border_radius',
			[
				'label' => esc_html__( 'Gasket Pill Border Radius', 'kami-k1-elementor-addon' ),
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
					'{{WRAPPER}} .kami-k1-gasket-pill' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="kami-k1-addon-wrapper">
			<section id="specs" class="kami-k1-bento-section">
				<!-- Background grid assets -->
				<div class="hud-grid"></div>
				<div class="red-glow-spot"></div>

				<div class="kami-k1-bento-container">
					<!-- Section Header -->
					<div class="kami-k1-section-header">
						<div>
							<div class="kami-k1-header-tag">
								<span class="dot"></span>
								<span><?php echo esc_html( $settings['section_tag'] ); ?></span>
							</div>
							<h2><?php echo esc_html( $settings['section_title_1'] ); ?> <span><?php echo esc_html( $settings['section_title_2'] ); ?></span></h2>
							<p><?php echo esc_html( $settings['section_desc'] ); ?></p>
						</div>
						<div class="kami-k1-header-meta">
							<p><?php echo esc_html( $settings['section_meta_model'] ); ?></p>
							<p><?php echo esc_html( $settings['section_meta_patent'] ); ?></p>
						</div>
					</div>

					<!-- Bento Grid -->
					<div class="kami-k1-bento-grid">
						
						<!-- Card 1: OLED HUD (2 Cols) -->
						<div class="kami-k1-bento-card col-span-2">
							<div class="kami-k1-card-glow-spot"></div>
							
							<div class="kami-k1-card-top with-title">
								<div>
									<span class="kami-k1-icon-container">
										<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
											<rect x="4" y="4" width="16" height="16" rx="2" />
											<rect x="9" y="9" width="6" height="6" rx="1" />
											<path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3" />
										</svg>
									</span>
									<h3><?php echo esc_html( $settings['card_1_title'] ); ?></h3>
								</div>
								<span class="kami-k1-card-sys-tag"><?php echo esc_html( $settings['card_1_tag'] ); ?></span>
							</div>

							<div class="kami-k1-card-bottom-flex">
								<p class="card-desc">
									<?php echo esc_html( $settings['card_1_desc'] ); ?>
								</p>
								
								<!-- Simulated Screen -->
								<div class="kami-k1-oled-sim">
									<div>
										<p class="system-text"><?php echo esc_html( $settings['card_1_oled_title'] ); ?></p>
										<p class="status-text"><?php echo esc_html( $settings['card_1_oled_status'] ); ?></p>
									</div>
									<div class="perc-block">
										<p class="perc-text"><?php echo esc_html( $settings['card_1_oled_percentage'] ); ?></p>
										<div class="perc-bar-bg">
											<div class="perc-bar-fill"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Card 2: Speed (1 Col) -->
						<div class="kami-k1-bento-card">
							<div class="kami-k1-card-glow-spot"></div>
							<div class="kami-k1-card-top">
								<span class="kami-k1-icon-container">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
									</svg>
								</span>
								<span class="kami-k1-card-sys-tag"><?php echo esc_html( $settings['card_2_tag'] ); ?></span>
							</div>
							<div>
								<h3><?php echo esc_html( $settings['card_2_title'] ); ?></h3>
								<p class="card-desc">
									<?php echo esc_html( $settings['card_2_desc'] ); ?>
								</p>
							</div>
						</div>

						<!-- Card 3: CNC Aluminum (1 Col) -->
						<div class="kami-k1-bento-card">
							<div class="kami-k1-card-glow-spot"></div>
							<div class="kami-k1-card-top">
								<span class="kami-k1-icon-container">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
									</svg>
								</span>
								<span class="kami-k1-card-sys-tag"><?php echo esc_html( $settings['card_3_tag'] ); ?></span>
							</div>
							<div>
								<h3><?php echo esc_html( $settings['card_3_title'] ); ?></h3>
								<p class="card-desc">
									<?php echo esc_html( $settings['card_3_desc'] ); ?>
								</p>
							</div>
						</div>

						<!-- Card 4: Gasket Mount (2 Cols) -->
						<div class="kami-k1-bento-card col-span-2">
							<div class="kami-k1-card-glow-spot"></div>
							
							<div class="kami-k1-card-top with-title">
								<div>
									<span class="kami-k1-icon-container">
										<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
											<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
										</svg>
									</span>
									<h3><?php echo esc_html( $settings['card_4_title'] ); ?></h3>
								</div>
								<span class="kami-k1-card-sys-tag"><?php echo esc_html( $settings['card_4_tag'] ); ?></span>
							</div>

							<div class="kami-k1-card-bottom-flex">
								<p class="card-desc">
									<?php echo esc_html( $settings['card_4_desc'] ); ?>
								</p>
								
								<div class="kami-k1-gasket-specs">
									<div class="kami-k1-gasket-pill">
										<p class="spec-val"><?php echo esc_html( $settings['card_4_gasket_points_val'] ); ?></p>
										<p class="spec-lbl"><?php echo esc_html( $settings['card_4_gasket_points_lbl'] ); ?></p>
									</div>
									<div class="kami-k1-gasket-pill">
										<p class="spec-val"><?php echo esc_html( $settings['card_4_foam_isolation_val'] ); ?></p>
										<p class="spec-lbl"><?php echo esc_html( $settings['card_4_foam_isolation_lbl'] ); ?></p>
									</div>
								</div>
							</div>
						</div>

						<!-- Card 5: Tri-Mode (1 Col) -->
						<div class="kami-k1-bento-card">
							<div class="kami-k1-card-glow-spot"></div>
							<div class="kami-k1-card-top">
								<span class="kami-k1-icon-container">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path d="M4.9 19.1C1 15.2 1 8.8 4.9 4.9M19.1 4.9c3.9 3.9 3.9 10.3 0 14.2M7.8 16.2c-2.3-2.3-2.3-6.1 0-8.5M16.2 7.8c2.3 2.3 2.3 6.1 0 8.5M12 12m-1 0a1 1 0 1 0 2 0 1 1 0 1 0-2 0" />
									</svg>
								</span>
								<span class="kami-k1-card-sys-tag"><?php echo esc_html( $settings['card_5_tag'] ); ?></span>
							</div>
							<div>
								<h3><?php echo esc_html( $settings['card_5_title'] ); ?></h3>
								<p class="card-desc">
									<?php echo esc_html( $settings['card_5_desc'] ); ?>
								</p>
							</div>
						</div>

						<!-- Card 6: Battery (1 Col) -->
						<div class="kami-k1-bento-card">
							<div class="kami-k1-card-glow-spot"></div>
							<div class="kami-k1-card-top">
								<span class="kami-k1-icon-container">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<rect x="1" y="6" width="18" height="12" rx="2" ry="2" />
										<path d="M23 11v2" />
									</svg>
								</span>
								<span class="kami-k1-card-sys-tag"><?php echo esc_html( $settings['card_6_tag'] ); ?></span>
							</div>
							<div>
								<h3><?php echo esc_html( $settings['card_6_title'] ); ?></h3>
								<p class="card-desc">
									<?php echo esc_html( $settings['card_6_desc'] ); ?>
								</p>
							</div>
						</div>

						<!-- Card 7: Hot-swap (1 Col) -->
						<div class="kami-k1-bento-card">
							<div class="kami-k1-card-glow-spot"></div>
							<div class="kami-k1-card-top">
								<span class="kami-k1-icon-container">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" />
										<path d="M8 12h8M12 8v8" />
									</svg>
								</span>
								<span class="kami-k1-card-sys-tag"><?php echo esc_html( $settings['card_7_tag'] ); ?></span>
							</div>
							<div>
								<h3><?php echo esc_html( $settings['card_7_title'] ); ?></h3>
								<p class="card-desc">
									<?php echo esc_html( $settings['card_7_desc'] ); ?>
								</p>
							</div>
						</div>

					</div>
				</div>
			</section>
		</div>
		<?php
	}
}
