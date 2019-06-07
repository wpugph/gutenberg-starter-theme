<?php
/**
 * Setup and load custom block containers, replacing core blocks to output HTML for UIKit 3
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package ThemeWPUGPH
 */

// Limit allowed block types.
add_filter(
	'allowed_block_types',
	function ( $allowed_blocks ) {
		return array(
			'core/shortcode',
			'core/paragraph',
			'core/heading',
			'core/subhead',
			'core/table',
			'core/list',
			'core/columns',
			'carbon-fields/custom-panel',
		);
	}
);

require get_template_directory() . '/template-parts/blocks/class-core-blocks.php';
require get_template_directory() . '/template-parts/blocks/custom-panel.php';
