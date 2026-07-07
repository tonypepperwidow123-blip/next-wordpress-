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

		// Preloader
		$this->add_control(
			'preloader_brand',
			[
				'label'   => esc_html__( 'Preloader Brand Name', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'KAMI TECHS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'preloader_version',
			[
				'label'   => esc_html__( 'Preloader Version/Sub', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'SYSTEM INIT // v2.5.0', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'preloader_sub',
			[
				'label'   => esc_html__( 'Preloader Subheading', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ENGINEERING DEMONSTRATOR', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'preloader_title',
			[
				'label'   => esc_html__( 'Preloader Title', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'KAMI K1 // DISASSEMBLY', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'preloader_copyright',
			[
				'label'   => esc_html__( 'Preloader Copyright', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '© 2026 KAMI TECHS LABS. ALL RIGHTS RESERVED.', 'kami-k1-elementor-addon' ),
			]
		);

		// HUD Nodes
		$this->add_control(
			'hud_node_1_label',
			[
				'label'   => esc_html__( 'HUD Node 1 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ESTABLISH', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'hud_node_2_label',
			[
				'label'   => esc_html__( 'HUD Node 2 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'DISSOLVE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'hud_node_3_label',
			[
				'label'   => esc_html__( 'HUD Node 3 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'MECHANICS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'hud_node_4_label',
			[
				'label'   => esc_html__( 'HUD Node 4 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'REASSEMBLE', 'kami-k1-elementor-addon' ),
			]
		);

		// HUD Diagnostics Labels
		$this->add_control(
			'hud_diag_1_label',
			[
				'label'   => esc_html__( 'HUD Diag 1 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'DISASSEMBLY TELEMETRY', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'hud_diag_2_label',
			[
				'label'   => esc_html__( 'HUD Diag 2 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'GYRO_AXIAL', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'hud_diag_3_label',
			[
				'label'   => esc_html__( 'HUD Diag 3 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ACCELEROMETER', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'hud_diag_4_label',
			[
				'label'   => esc_html__( 'HUD Diag 4 Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'VOLTAGE', 'kami-k1-elementor-addon' ),
			]
		);

		// Narratives
		$this->add_control(
			'narrative_1_sub',
			[
				'label'   => esc_html__( 'Narrative 1 Subtitle', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'BEYOND THE ORDINARY', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_2_text',
			[
				'label'   => esc_html__( 'Narrative 2 Title', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'A DISTILLED FUSION OF ELEMENTS,', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_2_sub',
			[
				'label'   => esc_html__( 'Narrative 2 Subtitle', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ENGINEERED INTO ITS MOST EXTRAORDINARY FORM.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_3_title',
			[
				'label'   => esc_html__( 'Narrative 3 Title First Line', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'AXIAL', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_3_title_sub',
			[
				'label'   => esc_html__( 'Narrative 3 Title Second Line', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'EXPLOSION', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_3_desc',
			[
				'label'   => esc_html__( 'Narrative 3 Description', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'AS THE CHASSIS EXPANDS, THE COMPONENT GRID DISSOLVES TO REVEAL PRECISION MECHANICAL LAYERS.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_4_text',
			[
				'label'   => esc_html__( 'Narrative 4 Title', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'DOUBLE GASKET SUSPENSION MOUNTING', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_4_sub',
			[
				'label'   => esc_html__( 'Narrative 4 Subtitle', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ABSORBS SOUNDS FOR AN EXQUISITE DEEP THOCK PROFILE.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_5_title',
			[
				'label'   => esc_html__( 'Narrative 5 Title First Line', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'TACTILE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_5_title_sub',
			[
				'label'   => esc_html__( 'Narrative 5 Title Second Line', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PERFECTION', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_5_desc',
			[
				'label'   => esc_html__( 'Narrative 5 Description', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'KAILH 5-PIN HOT-SWAPPABLE SOCKETS ENGAGE GOLD-PLATED CONTACTS FOR MAX LIFESPAN.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_6_text',
			[
				'label'   => esc_html__( 'Narrative 6 Title', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ELIMINATING DELAY. POLLING RATE AT 1000HZ', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_6_sub',
			[
				'label'   => esc_html__( 'Narrative 6 Subtitle', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'DELIVERS INSTANTANEOUS GAMING RESPONSE.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_7_title',
			[
				'label'   => esc_html__( 'Narrative 7 Title First Line', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ENDLESS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_7_title_sub',
			[
				'label'   => esc_html__( 'Narrative 7 Title Second Line', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ENERGY', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_7_desc',
			[
				'label'   => esc_html__( 'Narrative 7 Description', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '4000MAH POWER CELL DELIVERS CONTINUOUS WORKSTATION RUNTIME UP TO 200 HOURS.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_8_text',
			[
				'label'   => esc_html__( 'Narrative 8 Title', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'INTEGRATED SYSTEM STATUS HUD', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_8_sub',
			[
				'label'   => esc_html__( 'Narrative 8 Subtitle', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PROJECTS REAL-TIME OPERATIONAL TELEMETRY.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'narrative_9_title',
			[
				'label'   => esc_html__( 'Narrative 9 Title First Line', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ACQUIRE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'cta_reserve_label',
			[
				'label'   => esc_html__( 'Reserve CTA Button Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'RESERVE UNIT', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'cta_specs_label',
			[
				'label'   => esc_html__( 'Specs CTA Button Label', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ENGINEERING SPECS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'scroll_helper_text',
			[
				'label'   => esc_html__( 'Scroll Helper Text', 'kami-k1-elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'SCROLL TO DISCOVER', 'kami-k1-elementor-addon' ),
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
					<p style="font-weight:bold;color:#fff;font-size:14px;margin:0;"><?php echo esc_html( $settings['preloader_brand'] ); ?></p>
					<p style="color:var(--kami-accent);margin:4px 0 0 0;animation:pulse-slow 1.5s infinite;"><?php echo esc_html( $settings['preloader_version'] ); ?></p>
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
					<?php echo esc_html( $settings['preloader_sub'] ); ?>
				</h1>
				<p style="font-size:24px;font-weight:300;letter-spacing:0.05em;color:#fff;margin:6px 0 2rem 0;">
					<?php echo esc_html( $settings['preloader_title'] ); ?>
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
					<p style="margin:0;"><?php echo esc_html( $settings['preloader_copyright'] ); ?></p>
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
										<p class="kami-k1-node-name"><?php echo esc_html( $settings['hud_node_1_label'] ); ?></p>
									</div>
								</div>
								<div class="kami-k1-hud-node" data-idx="1">
									<div class="kami-k1-node-indicator">
										<div class="kami-k1-node-dot"></div>
										<div class="kami-k1-node-line"></div>
									</div>
									<div class="kami-k1-node-text">
										<p class="kami-k1-node-num">02</p>
										<p class="kami-k1-node-name"><?php echo esc_html( $settings['hud_node_2_label'] ); ?></p>
									</div>
								</div>
								<div class="kami-k1-hud-node" data-idx="2">
									<div class="kami-k1-node-indicator">
										<div class="kami-k1-node-dot"></div>
										<div class="kami-k1-node-line"></div>
									</div>
									<div class="kami-k1-node-text">
										<p class="kami-k1-node-num">03</p>
										<p class="kami-k1-node-name"><?php echo esc_html( $settings['hud_node_3_label'] ); ?></p>
									</div>
								</div>
								<div class="kami-k1-hud-node" data-idx="3">
									<div class="kami-k1-node-indicator">
										<div class="kami-k1-node-dot"></div>
									</div>
									<div class="kami-k1-node-text">
										<p class="kami-k1-node-num">04</p>
										<p class="kami-k1-node-name"><?php echo esc_html( $settings['hud_node_4_label'] ); ?></p>
									</div>
								</div>
							</div>

							<!-- Right diagnostics -->
							<div class="kami-k1-hud-diagnostics">
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label"><?php echo esc_html( $settings['hud_diag_1_label'] ); ?></p>
									<p class="kami-k1-diag-val" style="color:var(--kami-accent);">STATE_ACTUATE: ON</p>
								</div>
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label"><?php echo esc_html( $settings['hud_diag_2_label'] ); ?></p>
									<p id="kami-hud-telemetry-angle" class="kami-k1-diag-val">0°</p>
								</div>
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label"><?php echo esc_html( $settings['hud_diag_3_label'] ); ?></p>
									<p class="kami-k1-diag-val">0.98 G</p>
								</div>
								<div class="kami-k1-diag-group">
									<p class="kami-k1-diag-label"><?php echo esc_html( $settings['hud_diag_4_label'] ); ?></p>
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
									<h2><?php echo esc_html( $settings['model_name'] ); ?><br/><span><?php echo esc_html( $settings['narrative_1_sub'] ); ?></span></h2>
								</div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									<?php echo esc_html( $settings['narrative_2_text'] ); ?>
									<span><?php echo esc_html( $settings['narrative_2_sub'] ); ?></span>
								</div>
							</div>
							<div class="kami-k1-narrative-box split-layout">
								<div class="title-part"><h2><?php echo esc_html( $settings['narrative_3_title'] ); ?><br/><span><?php echo esc_html( $settings['narrative_3_title_sub'] ); ?></span></h2></div>
								<div class="desc-part"><p><?php echo esc_html( $settings['narrative_3_desc'] ); ?></p></div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									<?php echo esc_html( $settings['narrative_4_text'] ); ?>
									<span><?php echo esc_html( $settings['narrative_4_sub'] ); ?></span>
								</div>
							</div>
							<div class="kami-k1-narrative-box split-layout">
								<div class="title-part"><h2><?php echo esc_html( $settings['narrative_5_title'] ); ?><br/><span><?php echo esc_html( $settings['narrative_5_title_sub'] ); ?></span></h2></div>
								<div class="desc-part"><p><?php echo esc_html( $settings['narrative_5_desc'] ); ?></p></div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									<?php echo esc_html( $settings['narrative_6_text'] ); ?>
									<span><?php echo esc_html( $settings['narrative_6_sub'] ); ?></span>
								</div>
							</div>
							<div class="kami-k1-narrative-box split-layout">
								<div class="title-part"><h2><?php echo esc_html( $settings['narrative_7_title'] ); ?><br/><span><?php echo esc_html( $settings['narrative_7_title_sub'] ); ?></span></h2></div>
								<div class="desc-part"><p><?php echo esc_html( $settings['narrative_7_desc'] ); ?></p></div>
							</div>
							<div class="kami-k1-narrative-box centered-mono">
								<div>
									<?php echo esc_html( $settings['narrative_8_text'] ); ?>
									<span><?php echo esc_html( $settings['narrative_8_sub'] ); ?></span>
								</div>
							</div>
							<div class="kami-k1-narrative-box centered-bold">
								<div>
									<h2><?php echo esc_html( $settings['narrative_9_title'] ); ?><br/><span><?php echo esc_html( $settings['model_name'] ); ?></span></h2>
									<div class="cta-group">
										<a href="<?php echo esc_attr( $settings['reserve_link'] ); ?>" class="cta-reserve"><?php echo esc_html( $settings['cta_reserve_label'] ); ?></a>
										<a href="<?php echo esc_attr( $settings['specs_link'] ); ?>" class="cta-specs"><?php echo esc_html( $settings['cta_specs_label'] ); ?></a>
									</div>
								</div>
							</div>
						</div>

						<!-- Scroll helper -->
						<div class="kami-k1-scroll-helper">
							<p><?php echo esc_html( $settings['scroll_helper_text'] ); ?></p>
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
