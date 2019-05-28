<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeWPUGPH
 */

$org_name = carbon_get_theme_option( 'themewpugph_org_name', '' );
$org_year = carbon_get_theme_option( 'themewpugph_org_year', '' );
?>
		</div>
	</main>
<!-- #main-content -->

<footer id="colophon" class="site-footer uk-section uk-section-default uk-section-small">
	<div class="uk-container">
		<p class="uk-text-small uk-text-center">			
			<?php
				/* translators: %s: Year founded, i.e. 1999; %s: current year; %s: name of organisation */
				printf( esc_html__( 'Copyright &copy; %1$s&ndash;%2$s %3$s', 'themewpugph' ), esc_html( $org_year ), esc_html( date( 'Y' ) ), esc_html( $org_name ) );
			?>
			&emsp;
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_s' ) ); ?>">
			<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'themewpugph' ), 'WordPress' );
			?>
			</a>
			<span class="sep">&emsp;|&emsp;</span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme by %s', 'themewpugph' ), '<a href="' . esc_attr( THEMEWPUGPH_HOMEPAGE ) . '">' . esc_html( THEMEWPUGPH_TEAMNAME ) . '</a>' );
			?>
		</p>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>
