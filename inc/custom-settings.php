<?php
/**
 * Adds custom setting for use by the theme.
 *
 * @link https://codex.wordpress.org/Settings_API
 *
 * @package TeamWPUGPHTheme
 */
class TeamWPUGPH_Add_Settings_Field 
{

    public function __construct() {

        add_action( 'admin_init', array( $this, 'addSection' ) );

    }

    /**
     * Add Section.
     *
     * @return void
     */
    public function addSection() {

        add_settings_section( 
            'teamwpugph_custom_settings',
            __( 'Company/Organization Details', 'teamwpugph' ),
            array( $this, 'render_section' ),
            'general'
        );

        register_setting( 'general', 'teamwpugph_org_name', 'sanitize_text_field' );
		add_settings_field(
			'teamwpugph_org_name_id',
			'<label for="teamwpugph_org_name_id">' . __( 'Organization Name' , 'teamwpugph' ) . '</label>',
			array( $this, 'render_org_name_field' ),
            'general',
            'teamwpugph_custom_settings'
        );
        
        register_setting( 'general', 'teamwpugph_org_year', 'sanitize_text_field' );
		add_settings_field(
			'teamwpugph_org_year_id',
			'<label for="teamwpugph_org_year_id">' . __( 'Year of Foundation' , 'teamwpugph' ) . '</label>',
			array( $this, 'render_org_year_field' ),
            'general',
            'teamwpugph_custom_settings'
		);

    }

    /**
     * Render the settings
     *
     * @return void
     */
    public function render_section() {
        esc_html_e( 'Custom settings for theme use.', 'teamwpugph' );
    }

    public function render_org_name_field() {

        $value = get_option( 'teamwpugph_org_name', '' );
        echo '<input type="text" class="regular-text" id="teamwpugph_org_name_id" name="teamwpugph_org_name" value="' . esc_attr( $value ) . '" />';
        
    }

    public function render_org_year_field() {

        $value = get_option( 'teamwpugph_org_year', '' );
        echo '<input type="number" class="regular-text" id="teamwpugph_org_year_id" name="teamwpugph_org_year" value="' . esc_attr( $value ) . '" />';
        
    }
}
new TeamWPUGPH_Add_Settings_Field();