<?php
/**
 * Custom blocks
 *
 * @package  TeamWPUGPHTheme
 */

/**
 * Table block filter
 */
function teamwpugph_table_block_fitler( $block_content, $block ) {

	if ( 'core/table' !== $block['blockName'] ) {
		return $block_content;
	}

	$doc = new DOMDocument();
	$doc->loadHTML( $block_content );
	$table = $doc->getElementsByTagName( 'table' );
	$table[0]->setAttribute( 'class', 'uk-table' );

	$output = $doc->saveHTML();

	return $output;
}
add_filter( 'render_block', 'teamwpugph_table_block_fitler', 10, 3 );