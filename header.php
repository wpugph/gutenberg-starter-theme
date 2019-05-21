<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeWPUGPH
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'themewpugph' ); ?></a>

<!--HEADER-->
<header class="nav uk-sticky uk-sticky-below uk-sticky-fixed uk-box-shadow-medium" data-uk-sticky="cls-active: uk-background-default; top: 100vh; animation: uk-animation-slide-top; show-on-up: true;">
	<div class="uk-container">
		<nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar>
			<div class="uk-navbar-left">
				<div class="uk-navbar-item uk-padding-remove-horizontal">
					<a class="uk-navbar-item uk-logo" href="<?php echo home_url(); ?>">
					<?php 
						if ( has_custom_logo() ) {
							echo the_custom_logo(); 
						} else {
							_e( 'Logo', 'themewpugph' );
						}
					?>
					</a>

			<?php
						wp_nav_menu(array(
				'theme_location'	=> 'primary-menu',
							'container_class'	=> '',
				'menu_class'		=> 'uk-navbar-nav',
				'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
				'walker'			=> new UIKit3_Walker_Nav_Menu(),
						));
			?>
					</div>
				</div>				
				<div class="uk-navbar-right">

					<div>
						<a class="uk-navbar-toggle" uk-search-icon href="#"></a>
						<div class="uk-drop uk-background-default uk-padding-small uk-padding-remove-vertical" uk-drop="mode: click; pos: left-center; offset: 0">
							<?php get_search_form(); ?>
						</div>
					</div>

				</div>

		</nav>
	</div>
</header>
<!--/HEADER-->

<main id="main-content" class="uk-section"><div class="uk-container">
	