<?php
/**
 * Add Theme optiions using Carbon Fields.
 *
 * @link https://github.com/htmlburger/carbon-fields-docs/tree/master/documentation
 *
 * @package ThemeWPUGPH
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Add options used in theme.
 *
 * @return void
 */
function themewpugph_options() {
	Container::make( 'theme_options', __( 'Theme Options', 'themewpugph' ) )
		->add_fields(
			array(
				Field::make( 'text', 'themewpugph_org_name', 'Organization Name' ),
				Field::make( 'date', 'themewpugph_org_year', 'Year of Foundation' )
					->set_input_format( 'Y', 'Y' )
					->set_storage_format( 'Y' ),
			)
		);
}
add_action( 'carbon_fields_register_fields', 'themewpugph_options' );
