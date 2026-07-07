<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Kami_K1_Reservation_CTA_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'kami-k1-reservation-cta';
	}

	public function get_title() {
		return esc_html__( 'Kami K1 Reservation CTA', 'kami-k1-elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-form-val';
	}

	public function get_categories() {
		return [ 'kami-k1-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'CTA Settings', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'batch_info',
			[
				'label' => esc_html__( 'Batch Text Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ACQUIRE HARDWARE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Main Title', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'JOIN THE VANGUARD', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Main Description', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Kami K1 is built in limited, serialized batches. Reserve your unit from Batch 04 now to secure launch pricing and early shipping.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="kami-k1-addon-wrapper">
			<section id="order" class="kami-k1-cta-section">
				<!-- Fine Grid Background -->
				<div class="hud-grid-fine"></div>
				<div class="gradient-glow"></div>

				<div class="kami-k1-cta-container">
					<div class="kami-k1-cta-grid">
						
						<!-- Left Specs Info Column -->
						<div class="kami-k1-cta-left">
							<div class="header-tag">
								<span class="dot"></span>
								<span><?php echo esc_html( $settings['batch_info'] ); ?></span>
							</div>
							<h2>JOIN THE <br/><span>VANGUARD</span></h2>
							<p><?php echo esc_html( $settings['desc'] ); ?></p>

							<div class="kami-k1-cta-specs-list font-mono">
								<div class="kami-k1-cta-spec-item">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
									</svg>
									<span>Batches individually certified</span>
								</div>
								<div class="kami-k1-cta-spec-item">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
									</svg>
									<span>3-Year Hardware Warranty</span>
								</div>
								<div class="kami-k1-cta-spec-item">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
									</svg>
									<span>Worldwide secure dispatch</span>
								</div>
							</div>
						</div>

						<!-- Right Form Column -->
						<div class="kami-k1-cta-right">
							<div class="kami-k1-form-card">
								
								<!-- Form Wrapper -->
								<div id="kami-k1-form-step" class="kami-k1-form-step">
									<form id="kami-k1-reservation-form">
										
										<!-- Hidden Fields for actual submittal -->
										<input type="hidden" id="kami-k1-selected-model" name="model" value="carbon">
										<input type="hidden" id="kami-k1-selected-switch" name="switch" value="tactile">

										<!-- Step 1: Model Choice -->
										<div style="margin-bottom: 1.5rem;">
											<label class="kami-k1-field-label">01 / CHOOSE MODEL EDITION</label>
											<div class="kami-k1-grid-choices">
												<button type="button" class="kami-k1-choice-btn model-choice-btn selected" data-value="carbon">
													<span>CARBON BLACK</span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
												<button type="button" class="kami-k1-choice-btn model-choice-btn" data-value="lunar">
													<span>LUNAR WHITE</span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
											</div>
										</div>

										<!-- Step 2: Switch Choice -->
										<div style="margin-bottom: 1.5rem;">
											<label class="kami-k1-field-label">02 / SELECT SWITCH TYPE</label>
											<div class="kami-k1-grid-choices">
												<button type="button" class="kami-k1-choice-btn switch-choice-btn selected" data-value="tactile">
													<span>TACTILE ORANGE</span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
												<button type="button" class="kami-k1-choice-btn switch-choice-btn" data-value="linear">
													<span>LINEAR RED</span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
											</div>
										</div>

										<!-- Step 3: Text Inputs -->
										<div class="kami-k1-text-inputs" style="margin-bottom: 1.5rem;">
											<div class="kami-k1-input-group">
												<label class="kami-k1-field-label">03 / YOUR NAME</label>
												<input type="text" id="kami-k1-input-name" required placeholder="e.g. MARCUS AURELIUS">
											</div>
											<div class="kami-k1-input-group">
												<label class="kami-k1-field-label">04 / EMAIL NODE ADDRESS</label>
												<input type="email" id="kami-k1-input-email" required placeholder="e.g. COGNITIVE@KAMI.TECH">
											</div>
										</div>

										<!-- Submit Button -->
										<button type="submit" id="kami-k1-btn-transmit" class="kami-k1-submit-btn">
											<span>TRANSMIT RESERVATION REQUEST</span>
											<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
											</svg>
										</button>
									</form>
								</div>

								<!-- Logging Terminal State -->
								<div id="kami-k1-terminal-step" class="kami-k1-terminal-state hidden font-mono">
									<div class="kami-k1-terminal-header">
										<div class="kami-k1-terminal-spinner"></div>
										<span>TRANSMITTING REQUEST DATA...</span>
									</div>
									<div id="kami-k1-terminal-lines" class="kami-k1-terminal-box">
										<!-- Injected logs via Javascript -->
									</div>
								</div>

								<!-- Success Confirmation State -->
								<div id="kami-k1-success-step" class="kami-k1-success-state hidden">
									<div class="kami-k1-success-circle">
										<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
										</svg>
									</div>
									<h3>RESERVATION <span>COMMITTED</span></h3>
									<p id="kami-k1-success-details">
										Thank you, <span id="kami-k1-success-name" class="highlight"></span>. Your reservation request for Kami K1 is secured.
									</p>
									<button id="kami-k1-success-reset" class="kami-k1-success-reset font-mono">
										SUBMIT ANOTHER NODE
									</button>
								</div>

							</div>
						</div>

					</div>
				</div>
			</section>
		</div>
		<?php
	}
}
