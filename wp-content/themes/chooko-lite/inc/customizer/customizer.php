<?php
/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Customizer functions
 *
 */

class Chooko_Customizer {
	public static function register( $wp_customize ) {

		// Move default settings "background_color" in the same section as background image settings
		// and rename the section just "Background"
		$wp_customize->get_control( 'background_color' )->section = 'background_image';
		$wp_customize->get_section( 'background_image' )->title = __( 'Background', 'chooko-lite' );

		// Add new sections
		$wp_customize->add_section(
			'chooko_logo_settings',
			array(
				'title'      => __( 'Logo', 'chooko-lite' ),
				'priority'   => 20,
			)
		);

		$wp_customize->add_section(
			'chooko_blog_settings',
			array(
				'title'      => __( 'Blog Settings', 'chooko-lite' ),
				'priority'   => 80,
			)
		);

		$wp_customize->add_section(
			'chooko_misc_settings',
			array(
				'title'      => __( 'Misc', 'chooko-lite' ),
				'priority'   => 100,
			)
		);

		$wp_customize->add_section(
			'chooko_more',
			array(
				'title'      => __( 'More', 'chooko-lite' ),
				'priority'   => 130,
			)
		);

		// Setting and control for Logo
		$wp_customize->add_setting( 'chooko_logo',
			array(
				'default'     => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'chooko_logo',
				array(
					'label'       => __( 'Upload your logo', 'chooko-lite' ),
					'description' => __( 'If no logo is uploaded, the site title will be displayed instead.', 'chooko-lite' ),
					'section'     => 'chooko_logo_settings',
					'settings'    => 'chooko_logo',
				)
			)
		);

		// Setting and control for blog index content switch
		$wp_customize->add_setting(
			'chooko_blog_index_content',
			array(
				'default'           => 'excerpt',
				'sanitize_callback' => 'chooko_sanitize_blog_index_content',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'chooko_blog_index_content',
				array(
					'label'     => __( 'Blog Index Content', 'chooko-lite' ),
					'section'   => 'chooko_blog_settings',
					'settings'  => 'chooko_blog_index_content',
					'type'      => 'radio',
					'choices'   => array(
						'excerpt' => __( 'Excerpt', 'chooko-lite' ),
						'content' => __( 'Full content', 'chooko-lite' ),
					),
				)
			)
		);

		// Setting and control for responsive mode
		$wp_customize->add_setting( 'chooko_responsive_mode',
			array(
				'default'     => 'on',
				'sanitize_callback' => 'chooko_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control( $wp_customize, 'chooko_responsive_mode',
				array(
					'label'    => __( 'Responsive Mode', 'chooko-lite' ),
					'section'  => 'chooko_misc_settings',
					'settings' => 'chooko_responsive_mode',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'chooko-lite' ),
						'off' => __( 'Off', 'chooko-lite' ),
					),
				)
			)
		);

		// Settings and controls for header image display
		$wp_customize->add_setting( 'home_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'chooko_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control( $wp_customize, 'home_header_image',
				array(
					'label'    => __( 'Display header on Homepage', 'chooko-lite' ),
					'section'  => 'header_image',
					'settings' => 'home_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'chooko-lite' ),
						'off' => __( 'Off', 'chooko-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting( 'blog_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'chooko_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control( $wp_customize, 'blog_header_image',
				array(
					'label'    => __( 'Display header on Blog Index', 'chooko-lite' ),
					'section'  => 'header_image',
					'settings' => 'blog_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'chooko-lite' ),
						'off' => __( 'Off', 'chooko-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting( 'single_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'chooko_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control( $wp_customize, 'single_header_image',
				array(
					'label'    => __( 'Display header on Single Posts', 'chooko-lite' ),
					'section'  => 'header_image',
					'settings' => 'single_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'chooko-lite' ),
						'off' => __( 'Off', 'chooko-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting( 'pages_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'chooko_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control( $wp_customize, 'pages_header_image',
				array(
					'label'    => __( 'Display header on Pages', 'chooko-lite' ),
					'section'  => 'header_image',
					'settings' => 'pages_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'chooko-lite' ),
						'off' => __( 'Off', 'chooko-lite' ),
					),
				)
			)
		);

		// Setting and control for Chooko upgrade message
		$wp_customize->add_setting(
			'chooko_upgrade',
			array(
				'default'           => 'https://www.iceablethemes.com/shop/chooko-pro/',
				'sanitize_callback' => 'chooko_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new Chooko_Button_Customize_Control(
				$wp_customize,
				'chooko_upgrade',
				array(
					'label'       => __( 'Get Chooko Pro', 'chooko-lite' ),
					'description' => __( 'Unleash the full potential of Chooko with tons of additional settings, advanced features and premium support.', 'chooko-lite' ),
					'section'     => 'chooko_more',
					'settings'    => 'chooko_upgrade',
					'type'        => 'button',
				)
			)
		);

		// Setting and control for Chooko support forums message
		$wp_customize->add_setting(
			'chooko_support',
			array(
				'default'           => 'https://www.iceablethemes.com/forums/forum/free-support-forum/chooko-lite/',
				'sanitize_callback' => 'chooko_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new Chooko_Button_Customize_Control(
				$wp_customize,
				'chooko_support',
				array(
					'label'       => __( 'Chooko Lite support forums', 'chooko-lite' ),
					'description' => __( 'Have a question? Need help?', 'chooko-lite' ),
					'section'     => 'chooko_more',
					'settings'    => 'chooko_support',
					'type'        => 'button',
				)
			)
		);

		// Setting and control for Chooko feedback message
		$wp_customize->add_setting(
			'chooko_feedback',
			array(
				'default'           => 'https://wordpress.org/support/view/theme-reviews/chooko-lite',
				'sanitize_callback' => 'chooko_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new Chooko_Button_Customize_Control(
				$wp_customize,
				'chooko_feedback',
				array(
					'label'       => __( 'Rate Chooko Lite', 'chooko-lite' ),
					'description' => __( 'Like this theme? We\'d love to hear your feedback!', 'chooko-lite' ),
					'section'     => 'chooko_more',
					'settings'    => 'chooko_feedback',
					'type'        => 'button',
				)
			)
		);

	}

	public static function customize_controls_scripts() {
		wp_enqueue_style(
			'chooko-customizer-controls-style',
			CHOOKO_THEME_DIR_URI . '/inc/customizer/css/customizer-controls.css',
			array( 'customize-controls' )
		);

		wp_register_script(
			'chooko-customizer-section',
			CHOOKO_THEME_DIR_URI . '/inc/customizer/js/chooko-customizer-section.js',
			array( 'jquery', 'jquery-ui-core', 'jquery-ui-button', 'customize-controls' ),
			'',
			true
		);

		$chooko_customizer_section_l10n = array(
			'upgrade_pro' => __( 'Upgrade to Chooko Pro!', 'chooko-lite' ),
		);
		wp_localize_script( 'chooko-customizer-section', 'chooko_customizer_section_l10n', $chooko_customizer_section_l10n );
		wp_enqueue_script( 'chooko-customizer-section' );

	}

}
add_action( 'customize_register', array( 'Chooko_Customizer', 'register' ) );
add_action( 'customize_controls_enqueue_scripts', array( 'Chooko_Customizer', 'customize_controls_scripts' ) );

// Create custom controls for customizer
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Chooko_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'button';
		public function render_content() {
			?>
			<label>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<a class="button" href="<?php echo esc_url( $this->value() ); ?>" target="_blank"><?php echo esc_html( $this->label ); ?></a>
			</label>
			<?php
		}
	}
}

// Sanitation callback functions
function chooko_sanitize_blog_index_content( $input ) {
	$choices = array( 'excerpt', 'content' );
	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;
}

function chooko_sanitize_on_off( $input ) {
	$choices = array( 'on', 'off' );
	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;
}

function chooko_sanitize_button( $input ) {
	return '';
}
