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
			'section_title',
			[
				'label' => esc_html__( 'Section Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PRECISION ARCHITECTURE', 'kami-k1-elementor-addon' ),
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
								<span>SPECIFICATION DASHBOARD</span>
							</div>
							<h2>PRECISION <span>ARCHITECTURE</span></h2>
							<p><?php echo esc_html( $settings['section_desc'] ); ?></p>
						</div>
						<div class="kami-k1-header-meta">
							<p>DESIGN MODEL: KAMI_K1_REV4</p>
							<p>PATENT PENDING // 2026</p>
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
									<h3>Customizable OLED Status HUD</h3>
								</div>
								<span class="kami-k1-card-sys-tag">KAMI_HUD.SYS</span>
							</div>

							<div class="kami-k1-card-bottom-flex">
								<p class="card-desc">
									A gorgeous 1.2-inch customizable panel offering real-time stats, battery diagnostics, connectivity signals, and custom animations.
								</p>
								
								<!-- Simulated Screen -->
								<div class="kami-k1-oled-sim">
									<div>
										<p class="system-text">KAMI SYSTEM</p>
										<p class="status-text">2.4G // 1ms // OK</p>
									</div>
									<div class="perc-block">
										<p class="perc-text">84%</p>
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
								<span class="kami-k1-card-sys-tag">SPEED_LATENCY</span>
							</div>
							<div>
								<h3>1ms Response Time</h3>
								<p class="card-desc">
									Ultra-low latency connection engineered with an upgraded 2.4GHz RF module, rivaling custom wired setups.
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
								<span class="kami-k1-card-sys-tag">CHASSIS_CNC</span>
							</div>
							<div>
								<h3>CNC Aluminum Case</h3>
								<p class="card-desc">
									Carved from solid blocks of 6063 aerospace aluminum, sandblasted and anodized to provide a massive, resonance-free base.
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
									<h3>Double Gasket Suspension System</h3>
								</div>
								<span class="kami-k1-card-sys-tag">ISOLATE_ACOUSTIC</span>
							</div>

							<div class="kami-k1-card-bottom-flex">
								<p class="card-desc">
									Silicon gaskets sandwiched between custom Poron padding isolate the PCB plate from the metal chassis, securing a satisfyingly deep &quot;thock&quot; sound profile.
								</p>
								
								<div class="kami-k1-gasket-specs">
									<div class="kami-k1-gasket-pill">
										<p class="spec-val">14pt</p>
										<p class="spec-lbl">Gasket Points</p>
									</div>
									<div class="kami-k1-gasket-pill">
										<p class="spec-val">PORON</p>
										<p class="spec-lbl">Foam Isolation</p>
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
								<span class="kami-k1-card-sys-tag">CON_TRI_MODE</span>
							</div>
							<div>
								<h3>Tri-Mode Wireless</h3>
								<p class="card-desc">
									Seamless hot-swapping between 2.4GHz wireless, Bluetooth 5.1 (up to 3 devices), and Type-C high-speed wired connections.
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
								<span class="kami-k1-card-sys-tag">PWR_CELL</span>
							</div>
							<div>
								<h3>4000mAh Battery Cell</h3>
								<p class="card-desc">
									Up to 200 hours of continuous typing with customizable sleeping states and power saving triggers.
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
								<span class="kami-k1-card-sys-tag">SOCKET_HOTSWAP</span>
							</div>
							<div>
								<h3>5-Pin Hot-Swappable</h3>
								<p class="card-desc">
									Outfitted with premium Kailh sockets, allowing rapid switch replacement without soldering. Compatible with all MX style switches.
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
