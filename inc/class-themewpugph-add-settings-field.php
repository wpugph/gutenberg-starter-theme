<?php
/**
 * Adds custom setting for use by the theme.
 *
 * @link https://codex.wordpress.org/Settings_API
 *
 * @package ThemeWPUGPH
 */

/**
 * Custom settings
 */
class ThemeWPUGPH_Add_Settings_Field {

	public function __construct() {

		add_action( 'admin_init', array( $this, 'add_section' ) );

	}

	/**
	 * Add Section.
	 *
	 * @return void
	 */
	public function add_section() {

		add_settings_section(
			'themewpugph_custom_settings',
			__( 'Company/Organization Details', 'themewpugph' ),
			array( $this, 'render_section' ),
			'general'
		);

		register_setting( 'general', 'themewpugph_org_name', 'sanitize_text_field' );
		add_settings_field(
			'themewpugph_org_name_id',
			'<label for="themewpugph_org_name_id">' . __( 'Organization Name', 'themewpugph' ) . '</label>',
			array( $this, 'render_org_name_field' ),
			'general',
			'themewpugph_custom_settings'
		);

		register_setting( 'general', 'themewpugph_org_year', 'sanitize_text_field' );
		add_settings_field(
			'themewpugph_org_year_id',
			'<label for="themewpugph_org_year_id">' . __( 'Year of Foundation', 'themewpugph' ) . '</label>',
			array( $this, 'render_org_year_field' ),
			'general',
			'themewpugph_custom_settings'
		);

	}

	/**
	 * Render the settings
	 *
	 * @return void
	 */
	public function render_section() {
		esc_html_e( 'Custom settings for theme use.', 'themewpugph' );
	}

	public function render_org_name_field() {

		$value = get_option( 'themewpugph_org_name', '' );
		echo '<input type="text" class="regular-text" id="themewpugph_org_name_id" name="themewpugph_org_name" value="' . esc_attr( $value ) . '" />';

	}

	public function render_org_year_field() {

		$value = get_option( 'themewpugph_org_year', '' );
		echo '<input type="number" class="regular-text" id="themewpugph_org_year_id" name="themewpugph_org_year" value="' . esc_attr( $value ) . '" />';

	}
}
new ThemeWPUGPH_Add_Settings_Field();
