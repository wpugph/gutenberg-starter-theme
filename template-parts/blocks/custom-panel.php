<?php
/**
 * Multifunction Panels
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package ThemeWPUGPH
 */

use Carbon_Fields\Field;
use Carbon_Fields\Block;

Block::make( 'custom-panel', __( 'Panel', 'themewpugph' ) )
	->add_fields(
		array(
			Field::make( 'text', 'heading', __( 'Panel Heading', 'themewpugph' ) ),
			Field::make( 'image', 'image', __( 'Panel Image', 'themewpugph' ) ),
			Field::make( 'textarea', 'content', __( 'Panel Content', 'themewpugph' ) ),
			Field::make( 'text', 'url', __( 'Panel Link', 'themewpugph' ) ),
		)
	)
	->set_category( 'layout' )
	->set_icon( 'layout' )
	->set_description( __( 'A simple panel block.', 'themewpugph' ) )
	->set_render_callback(
		function ( $fields, $attributes, $inner_blocks ) {
			?>
				<div class="custom-panel uk-card uk-card-default">
					<div class="uk-card-media-top">
						<?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
					</div>
					<div class="uk-card-body">
						<h3 class="uk-card-title"><?php echo esc_html( $fields['heading'] ); ?></h3>
						<p><?php echo esc_html( $fields['content'] ); ?></p>
						<p><a class="uk-link-text" href=""><?php _e( 'Read more&hellip;', 'themewpugph' ); ?></a></p>
					</div>
				</div>

			<?php
		}
	);
