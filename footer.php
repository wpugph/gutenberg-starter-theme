<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TeamWPUGPHTheme
 */

$org_name = get_option('teamwpugph_org_name', '');
$org_year = get_option('teamwpugph_org_year', '');

?>
</main>
<!-- #main-content -->

<footer id="colophon" class="site-footer uk-section uk-section-default uk-section-small">
	<div class="uk-container">
		<p class="uk-text-small uk-text-center">			
			<?php printf( esc_html__('Copyright &copy; %s&ndash;%s %s', 'teamwpugph' ), esc_html__( $org_year, 'teamwpugph' ), date( "Y" ), esc_html__( $org_name, 'teamwpugph' ) ); ?>
			&emsp;
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_s' ) ); ?>">
			<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'teamwpugph' ), 'WordPress' );
			?></a>
			<span class="sep">&emsp;|&emsp;</span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %s', 'teamwpugph' ), '<a href="' . TEAMWPUGPH_HOMEPAGE . '">' . TEAMWPUGPH_TEAMNAME . '</a>' );
			?>			
		</p>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>