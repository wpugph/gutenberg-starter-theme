<?php

/**
 * Facade for overriding core blocks.
 *
 * @link https://developer.wordpress.org/reference/hooks/render_block/
 *
 * @package ThemeWPUGPH
 */
class Core_Blocks {

	/**
	 * The block content about to be appended.
	 *
	 * @var string
	 */
	private static $block_content;

	/**
	 * The full block, including name and attributes.
	 *
	 * @var array
	 */
	private static $block;

	/**
	 * Filter core blocks.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'render_block', 'Core_Blocks::render', 10, 2 );
	}

	/**
	 * Filters the content of a core blocks.
	 *
	 * @param string $block_content  The block content about to be appended.
	 * @param array  $block          The full block, including name and attributes.
	 *
	 * @return string outer HTML markup
	 */
	public static function render( $block_content = '', $block = '' ) {

		self::$block_content = $block_content;
		self::$block         = $block;
		$block_html          = self::$block_content;

		switch ( $block['blockName'] ) {
			case 'core/paragraph':
				$block_html = self::render_paragraph();
				break;

			case 'core/quote':
				$block_html = self::render_quote();
				break;

			default:
				break;
		}

		return $block_html;
	}

	/**
	 * Override core/paragraph block.
	 *
	 * @return string outer HTML markup.
	 */
	private static function render_paragraph() {

		$block_html = self::$block_content;
		return $block_html;
	}

	/**
	 * Override core/quote block.
	 *
	 * @return string outer HTML markup.
	 */
	private static function render_quote() {

		$doc = new DOMDocument();
		$doc->loadHTML( self::$block_content );

		// The main quote block.
		$quote = $doc->getElementsByTagName( 'blockquote' )->item( 0 );
		$quote->removeAttribute( 'class' );
		$quote->setAttribute( 'cite', '#' );

		// Wrap cite to footer tag.
		$cite = $quote->removeChild(
			$quote->getElementsByTagName( 'cite' )->item( 0 )
		);
		$footer = $doc->createElement( 'footer', '' );
		$footer->appendChild( $cite );

		// Append new footer to main quote block.
		$quote->appendChild( $footer );

		return $doc->saveHTML();
	}
}

// Initialize core blocks override.
Core_Blocks::init();
