<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_Kami_K1_Scrollytelling_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'kami-k1-scrollytelling';
	}

	public function get_title() {
		return esc_html__( 'Kami K1 3D Scrollytelling', 'kami-k1-elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-animation';
	}

	public function get_categories() {
		return [ 'kami-k1-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Narratives & HUD Settings', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'model_name',
			[
				'label'   => esc_html__( 'Model Name Text', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'KAMI K1', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'reserve_link',
			[
				'label'   => esc_html__( 'Reserve Link Anchor', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '#order',
			]
		);

		$this->add_control(
			'specs_link',
			[
				'label'   => esc_html__( 'Specs Link Anchor', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '#specs',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<?php /* =========================================================
		   PRELOADER — Must be OUTSIDE any overflow:hidden container
		   position:fixed breaks when parent has overflow:hidden/overflow-x:hidden
		   ========================================================= */ ?>
		<div id="kami-k1-preloader" class="kami-k1-preloader hud-grid-fine screen-effect">
			<div class="kami-k1-preloader-top">
				<div>
					<p style="font-weight:bold;color:#fff;font-size:14px;margin:0;">KAMI TECHS</p>
					<p style="color:var(--kami-accent);margin:4px 0 0 0;animation:pulse-slow 1.5s infinite;">SYSTEM INIT // v2.5.0</p>
				</div>
				<div style="text-align:right;">
					<p style="margin:0;">WORKSPACE: DESKTOP-3D-WEST</p>
					<p style="margin:4px 0 0 0;">IP: 127.0.0.1 // LOCALHOST</p>
				</div>
			</div>

			<div class="kami-k1-preloader-center">
				<div class="kami-k1-logo-box">
					<div class="inner-grid">
						<div></div><div></div><div></div>
						<div class="active-key"></div>
					</div>
					<div class="bottom-notch"></div>
				</div>
				<h1 style="font-size:10px;letter-spacing:0.3em;color:#a3a3a3;text-transform:uppercase;margin:0;">
					ENGINEERING DEMONSTRATOR
				</h1>
				<p style="font-size:24px;font-weight:300;letter-spacing:0.05em;color:#fff;margin:6px 0 2rem 0;">
					KAMI K1 // DISASSEMBLY
				</p>
				<div id="kami-k1-preloader-percent" class="kami-k1-preloader-percentage">
					0%<span>ok</span>
				</div>
				<div class="kami-k1-progress-container">
					<div id="kami-k1-preloader-bar" class="kami-k1-progress-bar"></div>
				</div>
				<div id="kami-k1-preloader-phrase" class="kami-k1-preloader-phrase">
					DECODING HARDWARE GEOMETRY...
				</div>
			</div>

			<div class="kami-k1-preloader-bottom">
				<div style="display:flex;gap:1.5rem;margin-bottom:0.5rem;">
					<p style="margin:0;">DECODED: <span id="kami-k1-preloader-decoded" style="color:#a3a3a3;">0 / 192 FRAMES</span></p>
					<p style="margin:0;">CACHE: <span style="color:#a3a3a3;">SESSION_STORAGE</span></p>
				</div>
				<div>
					<p style="margin:0;">© 2026 KAMI TECHS LABS. ALL RIGHTS RESERVED.</p>
				</div>
			</div>
		</div>

		<?php /* =========================================================
		   STICKY CONTAINER & CANVAS LAYER
		   Matches the Next.js structure: sticky container inside 400vh spacer
		   ========================================================= */ ?>
		<div id="scrollytelling" class="kami-k1-scrollytelling-container">
			<div class="kami-k1-sticky-container">
				<div id="kami-k1-canvas-layer" class="kami-k1-canvas-layer">
					<canvas id="kami-k1-canvas"></canvas>
					<div class="kami-k1-vignette-vertical"></div>
					<div class="kami-k1-vignette-radial"></div>

					<!-- CAD Target Markings -->
					<div class="kami-k1-cad-corner top-left"></div>
					<div class="kami-k1-cad-corner top-right"></div>
					<div class="kami-k1-cad-corner bottom-left"></div>
					<div class="kami-k1-cad-corner bottom-right"></div>
					<div class="kami-k1-crosshair-h"></div>
					<div class="kami-k1-crosshair-v"></div>

					<!-- HUD Overlay -->
					<div class="kami-k1-hud-overlay">
						<div style="height:5rem;"></div>

						<div class="kami-k1-hud-middle">
							<!-- Left progress dots -->
							<div class="kami-k1-hud-progress">
								<div class="kami-k1-hud-node active" data-idx="0">
									<div class="kami-k1-node-indicator">
										<div class="kami-k1-node-dot"></div>
										<div class="kami-k1-node-line"></div>
									</div>
									<div class="kami-k1-node-text">
										<p class="kami-k1-node-num">01</p>
										<p class="kami-k1-node-name">ESTABLISH</p>
									</div>
								</div>
								<div class="kami-k1-hud-node" data-idx="1">
									<div class="kami-k1-node-indicator">
										<div class="kami-k1-node-dot"></div>
										<div class="kami-k1-node-line"></div>
									</div>
									<div class="kami-k1-node-text">
										<p class="kami-k1-node-num">02</p>
										<p class="kami-k1-node-name">DISSOLVE</p>
									</div>
								</div>
								<div class="kami-k1-hud-node" data-idx="2">
									<div class="kami-k1-node-indicator">
										<div class="kami-k1-node-dot"></div>
										<div class="kami-k1-node-line"></div>
									</div>
									<div class="kami-k1-node-text">
										<p class="kami-k1-node-num">03</p>
										<p class="kami-k1-node-name">MECHANICS</p>
									</div>
								</div>
								<div class="kami-k1-hud-node" data-idx="3">
									<div class="kami-k1-node-indicator">
										<div class="kami-k1-node-dot"></div>
									</div>
									<div class="kami-k1-node-text">
										<p class="kami-k1-node-num">04</p>
										<p class="kami-k1-node-name">REASSEMBLE</p>
									</div>
								</div>
							</div>

							<!-- Right diagnostics -->
							<div class="kami-k1-hud-diagnostics">
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label">DISASSEMBLY TELEMETRY</p>
									<p class="kami-k1-diag-val" style="color:var(--kami-accent);">STATE_ACTUATE: ON</p>
								</div>
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label">GYRO_AXIAL</p>
									<p id="kami-hud-telemetry-angle" class="kami-k1-diag-val">0°</p>
								</div>
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label">ACCELEROMETER</p>
									<p class="kami-k1-diag-val">0.98 G</p>
								</div>
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label">VOLTAGE</p>
									<p class="kami-k1-diag-val">3.72V // LI-ION</p>
								</div>
							</div>
						</div>

						<!-- Bottom status bar -->
						<div class="kami-k1-hud-bottom">
							<div class="kami-k1-hud-bottom-left">
								<p style="margin:0;">FRAME_INDEX: <span id="kami-hud-frame-num">000</span> / 191</p>
								<p style="margin:0;">TELEMETRY: <span id="kami-hud-telemetry-percent">0%</span></p>
							</div>
							<div class="kami-k1-hud-bottom-right">
								<p style="margin:0;">STATUS: <span id="kami-hud-status-state" style="font-weight:bold;color:#737373;">SYS_STABLE / ASSEMBLED</span></p>
								<p style="margin:0;">REFRESH_RATE: <span style="font-weight:bold;color:#10b981;">60.0 FPS</span></p>
							</div>
						</div>
					</div>

					<!-- Narrative overlay -->
					<div class="kami-k1-narrative-overlay">
						<div style="height:3rem;"></div>

						<div class="kami-k1-narrative-middle">
							<div class="kami-k1-narrative-box centered-bold visible">
								<div>
									<h2><?php echo esc_html( $settings['model_name'] ); ?><br/><span>BEYOND THE ORDINARY</span></h2>
								</div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									A DISTILLED FUSION OF ELEMENTS,
									<span>ENGINEERED INTO ITS MOST EXTRAORDINARY FORM.</span>
								</div>
							</div>
							<div class="kami-k1-narrative-box split-layout">
								<div class="title-part"><h2>AXIAL<br/><span>EXPLOSION</span></h2></div>
								<div class="desc-part"><p>AS THE CHASSIS EXPANDS, THE COMPONENT GRID DISSOLVES TO REVEAL PRECISION MECHANICAL LAYERS.</p></div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									DOUBLE GASKET SUSPENSION MOUNTING
									<span>ABSORBS SOUNDS FOR AN EXQUISITE DEEP THOCK PROFILE.</span>
								</div>
							</div>
							<div class="kami-k1-narrative-box split-layout">
								<div class="title-part"><h2>TACTILE<br/><span>PERFECTION</span></h2></div>
								<div class="desc-part"><p>KAILH 5-PIN HOT-SWAPPABLE SOCKETS ENGAGE GOLD-PLATED CONTACTS FOR MAX LIFESPAN.</p></div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									ELIMINATING DELAY. POLLING RATE AT 1000HZ
									<span>DELIVERS INSTANTANEOUS GAMING RESPONSE.</span>
								</div>
							</div>
							<div class="kami-k1-narrative-box split-layout">
								<div class="title-part"><h2>ENDLESS<br/><span>ENERGY</span></h2></div>
								<div class="desc-part"><p>4000MAH POWER CELL DELIVERS CONTINUOUS WORKSTATION RUNTIME UP TO 200 HOURS.</p></div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									INTEGRATED SYSTEM STATUS HUD
									<span>PROJECTS REAL-TIME OPERATIONAL TELEMETRY.</span>
								</div>
							</div>
							<div class="kami-k1-narrative-box centered-bold">
								<div>
									<h2>ACQUIRE<br/><span><?php echo esc_html( $settings['model_name'] ); ?></span></h2>
									<div class="cta-group">
										<a href="<?php echo esc_attr( $settings['reserve_link'] ); ?>" class="cta-reserve">RESERVE UNIT</a>
										<a href="<?php echo esc_attr( $settings['specs_link'] ); ?>" class="cta-specs">ENGINEERING SPECS</a>
									</div>
								</div>
							</div>
						</div>

						<!-- Scroll helper -->
						<div class="kami-k1-scroll-helper">
							<p>SCROLL TO DISCOVER</p>
							<div class="kami-k1-mouse-icon">
								<div class="kami-k1-mouse-wheel"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}
}
