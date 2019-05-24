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

/**
 * Quote block filter
 */
function teamwpugph_quote_block_fitler( $block_content, $block ) {

	if ( 'core/quote' !== $block['blockName'] ) {
		return $block_content;
	}

	$html = new DOMDocument();
	$html->loadHTML( $block_content );
	$p = $html->getElementsByTagName( 'p' );
	$cite = $html->getElementsByTagName( 'cite' );

	$output = '<blockquote>';
	$output .= '<p class="uk-margin-small-bottom">';
	$output .= $p[0]->nodeValue;
	$output .= '</p>';
	$output .= '<footer>';
	$output .= '<cite>';
	$output .= $cite[0]->nodeValue;
	$output .= '</cite>';
	$output .= '</footer>';
	$output .= '</blockquote>';

	return $output;

}
add_filter( 'render_block', 'teamwpugph_quote_block_fitler', 10, 3 );

/**
 * List block filter
 */
function teamwpugph_list_block_fitler( $block_content, $block ) {
  if ( 'core/list' !== $block['blockName'] ) {
		return $block_content;
  }

  $doc = new DOMDocument();
	$doc->loadHTML( $block_content );
  $ul = $doc->getElementsByTagName( 'ul' );
	$ul[0]->setAttribute( 'class', 'uk-list' );

  $output = $doc->saveHTML();

  return $output;
}
add_filter( 'render_block', 'teamwpugph_list_block_fitler', 10, 3 );
