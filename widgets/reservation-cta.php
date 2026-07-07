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
			'title_first',
			[
				'label' => esc_html__( 'Title First Line', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'JOIN THE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'title_second',
			[
				'label' => esc_html__( 'Title Second Line', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'VANGUARD', 'kami-k1-elementor-addon' ),
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

		$this->add_control(
			'spec_item_1',
			[
				'label' => esc_html__( 'Spec List Item 1', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Batches individually certified', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'spec_item_2',
			[
				'label' => esc_html__( 'Spec List Item 2', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '3-Year Hardware Warranty', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'spec_item_3',
			[
				'label' => esc_html__( 'Spec List Item 3', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Worldwide secure dispatch', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_1_label',
			[
				'label' => esc_html__( 'Field 1 Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '01 / CHOOSE MODEL EDITION', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_1_opt_1',
			[
				'label' => esc_html__( 'Model Option 1', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CARBON BLACK', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_1_opt_2',
			[
				'label' => esc_html__( 'Model Option 2', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'LUNAR WHITE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_2_label',
			[
				'label' => esc_html__( 'Field 2 Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '02 / SELECT SWITCH TYPE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_2_opt_1',
			[
				'label' => esc_html__( 'Switch Option 1', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'TACTILE ORANGE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_2_opt_2',
			[
				'label' => esc_html__( 'Switch Option 2', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'LINEAR RED', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_3_label',
			[
				'label' => esc_html__( 'Field 3 Label (Name)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '03 / YOUR NAME', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_3_placeholder',
			[
				'label' => esc_html__( 'Name Field Placeholder', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'e.g. MARCUS AURELIUS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_4_label',
			[
				'label' => esc_html__( 'Field 4 Label (Email)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '04 / EMAIL NODE ADDRESS', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'field_4_placeholder',
			[
				'label' => esc_html__( 'Email Field Placeholder', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'e.g. COGNITIVE@KAMI.TECH', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'submit_label',
			[
				'label' => esc_html__( 'Submit Button Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'TRANSMIT RESERVATION REQUEST', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_title_first',
			[
				'label' => esc_html__( 'Success Title First Word', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'RESERVATION', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_title_second',
			[
				'label' => esc_html__( 'Success Title Second Word', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'COMMITTED', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_reset_label',
			[
				'label' => esc_html__( 'Success Reset Button Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'SUBMIT ANOTHER NODE', 'kami-k1-elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Content Section for messages and terminal logging
		$this->start_controls_section(
			'messages_section',
			[
				'label' => esc_html__( 'Logging & Success Messages', 'kami-k1-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'transmitting_label',
			[
				'label' => esc_html__( 'Transmitting Label', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'TRANSMITTING REQUEST DATA...', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_msg_1',
			[
				'label' => esc_html__( 'Success Message Part 1 (Prefix)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Thank you, ', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_msg_2',
			[
				'label' => esc_html__( 'Success Message Part 2 (Before Edition)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '. Your reservation request for Kami K1 (', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_msg_3',
			[
				'label' => esc_html__( 'Success Message Part 3 (Before Switches)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( ' Edition / ', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_msg_4',
			[
				'label' => esc_html__( 'Success Message Part 4 (Before Email)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( ' switches) is secured. An encrypted receipt has been sent to ', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'success_msg_5',
			[
				'label' => esc_html__( 'Success Message Part 5 (Suffix)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '.', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'terminal_step_1',
			[
				'label' => esc_html__( 'Terminal Log Step 1', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PINGING SECURE STORAGE RELAY...', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'terminal_step_2',
			[
				'label' => esc_html__( 'Terminal Log Step 2', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'HANDSHAKE ACCEPTED // RESOLVING KAMI_K1_RESERVE...', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'terminal_step_3',
			[
				'label' => esc_html__( 'Terminal Log Step 3', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'TRANSMITTING USER DATA NODE...', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'terminal_step_4',
			[
				'label' => esc_html__( 'Terminal Log Step 4 (Prefix)', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ALLOCATING SERIAL: KM-K1-OLED-', 'kami-k1-elementor-addon' ),
			]
		);

		$this->add_control(
			'terminal_step_5',
			[
				'label' => esc_html__( 'Terminal Log Step 5', 'kami-k1-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'COMMIT TRANSACTION OK // RESERVATION SECURED.', 'kami-k1-elementor-addon' ),
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
			'form_card_border_radius',
			[
				'label' => esc_html__( 'Form Card Border Radius', 'kami-k1-elementor-addon' ),
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
					'size' => 8,
				],
				'selectors' => [
					'{{WRAPPER}} .kami-k1-form-card' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'choice_btn_border_radius',
			[
				'label' => esc_html__( 'Choice Buttons Border Radius', 'kami-k1-elementor-addon' ),
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
					'{{WRAPPER}} .kami-k1-choice-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'input_border_radius',
			[
				'label' => esc_html__( 'Input Fields Border Radius', 'kami-k1-elementor-addon' ),
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
					'{{WRAPPER}} .kami-k1-text-inputs input' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'submit_btn_border_radius',
			[
				'label' => esc_html__( 'Submit Button Border Radius', 'kami-k1-elementor-addon' ),
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
					'{{WRAPPER}} .kami-k1-submit-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'success_circle_border_radius',
			[
				'label' => esc_html__( 'Success Circle Border Radius', 'kami-k1-elementor-addon' ),
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
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .kami-k1-success-circle' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'success_reset_border_radius',
			[
				'label' => esc_html__( 'Success Reset Button Border Radius', 'kami-k1-elementor-addon' ),
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
					'{{WRAPPER}} .kami-k1-success-reset' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="kami-k1-addon-wrapper"
			data-transmitting-text="<?php echo esc_attr( $settings['transmitting_label'] ); ?>"
			data-success-msg-1="<?php echo esc_attr( $settings['success_msg_1'] ); ?>"
			data-success-msg-2="<?php echo esc_attr( $settings['success_msg_2'] ); ?>"
			data-success-msg-3="<?php echo esc_attr( $settings['success_msg_3'] ); ?>"
			data-success-msg-4="<?php echo esc_attr( $settings['success_msg_4'] ); ?>"
			data-success-msg-5="<?php echo esc_attr( $settings['success_msg_5'] ); ?>"
			data-terminal-step-1="<?php echo esc_attr( $settings['terminal_step_1'] ); ?>"
			data-terminal-step-2="<?php echo esc_attr( $settings['terminal_step_2'] ); ?>"
			data-terminal-step-3="<?php echo esc_attr( $settings['terminal_step_3'] ); ?>"
			data-terminal-step-4="<?php echo esc_attr( $settings['terminal_step_4'] ); ?>"
			data-terminal-step-5="<?php echo esc_attr( $settings['terminal_step_5'] ); ?>"
		>
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
							<h2><?php echo esc_html( $settings['title_first'] ); ?> <br/><span><?php echo esc_html( $settings['title_second'] ); ?></span></h2>
							<p><?php echo esc_html( $settings['desc'] ); ?></p>

							<div class="kami-k1-cta-specs-list font-mono">
								<div class="kami-k1-cta-spec-item">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
									</svg>
									<span><?php echo esc_html( $settings['spec_item_1'] ); ?></span>
								</div>
								<div class="kami-k1-cta-spec-item">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
									</svg>
									<span><?php echo esc_html( $settings['spec_item_2'] ); ?></span>
								</div>
								<div class="kami-k1-cta-spec-item">
									<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
									</svg>
									<span><?php echo esc_html( $settings['spec_item_3'] ); ?></span>
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
											<label class="kami-k1-field-label"><?php echo esc_html( $settings['field_1_label'] ); ?></label>
											<div class="kami-k1-grid-choices">
												<button type="button" class="kami-k1-choice-btn model-choice-btn selected" data-value="carbon">
													<span><?php echo esc_html( $settings['field_1_opt_1'] ); ?></span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
												<button type="button" class="kami-k1-choice-btn model-choice-btn" data-value="lunar">
													<span><?php echo esc_html( $settings['field_1_opt_2'] ); ?></span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
											</div>
										</div>

										<!-- Step 2: Switch Choice -->
										<div style="margin-bottom: 1.5rem;">
											<label class="kami-k1-field-label"><?php echo esc_html( $settings['field_2_label'] ); ?></label>
											<div class="kami-k1-grid-choices">
												<button type="button" class="kami-k1-choice-btn switch-choice-btn selected" data-value="tactile">
													<span><?php echo esc_html( $settings['field_2_opt_1'] ); ?></span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
												<button type="button" class="kami-k1-choice-btn switch-choice-btn" data-value="linear">
													<span><?php echo esc_html( $settings['field_2_opt_2'] ); ?></span>
													<svg viewBox="0 0 20 20" fill="currentColor">
														<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
													</svg>
												</button>
											</div>
										</div>

										<!-- Step 3: Text Inputs -->
										<div class="kami-k1-text-inputs" style="margin-bottom: 1.5rem;">
											<div class="kami-k1-input-group">
												<label class="kami-k1-field-label"><?php echo esc_html( $settings['field_3_label'] ); ?></label>
												<input type="text" id="kami-k1-input-name" required placeholder="<?php echo esc_attr( $settings['field_3_placeholder'] ); ?>">
											</div>
											<div class="kami-k1-input-group">
												<label class="kami-k1-field-label"><?php echo esc_html( $settings['field_4_label'] ); ?></label>
												<input type="email" id="kami-k1-input-email" required placeholder="<?php echo esc_attr( $settings['field_4_placeholder'] ); ?>">
											</div>
										</div>

										<!-- Submit Button -->
										<button type="submit" id="kami-k1-btn-transmit" class="kami-k1-submit-btn">
											<span><?php echo esc_html( $settings['submit_label'] ); ?></span>
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
										<span><?php echo esc_html( $settings['transmitting_label'] ); ?></span>
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
									<h3><?php echo esc_html( $settings['success_title_first'] ); ?> <span><?php echo esc_html( $settings['success_title_second'] ); ?></span></h3>
									<p id="kami-k1-success-details">
										<?php echo esc_html( $settings['success_msg_1'] ); ?><span id="kami-k1-success-name" class="highlight"></span><?php echo esc_html( $settings['success_msg_2'] ); ?>
									</p>
									<button id="kami-k1-success-reset" class="kami-k1-success-reset font-mono">
										<?php echo esc_html( $settings['success_reset_label'] ); ?>
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
