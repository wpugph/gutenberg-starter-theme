<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TeamWPUGPHTheme
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

<a class="uk-invisible" href="#main-content" aria-hidden="false"><?php esc_html_e( 'Skip to content', 'teamwpugph' ); ?></a>

<!--HEADER-->
<header data-uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
	<div class="uk-container">
		<nav class="uk-navbar-container uk-navbar-transparent" data-uk-navbar>
			<div class="uk-navbar-left">
				<a class="uk-navbar-item uk-logo" href="<?php echo home_url(); ?>">
					<?php echo the_custom_logo(); ?>
				</a>
			</div>
			<?php
			wp_nav_menu( array(
				'container_class'	=> 'uk-navbar-center',
				'menu_class'		=> 'uk-navbar-nav',
				'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
				'walker'			=> new UIKit3_Walker_Nav_Menu(),
			) );
			?>
			<div class="uk-navbar-right">
				<ul class="uk-navbar-nav">
					<li>
						<a href="#" data-uk-icon="icon:user"></a>
						<div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-left">
							<ul class="uk-nav uk-navbar-dropdown-nav">
								<li class="uk-nav-header uk-text-small uk-text-primary">YOUR ACCOUNT</li>
								<li><a href="#"><span data-uk-icon="icon: info"></span> Summary</a></li>
								<li><a href="#"><span data-uk-icon="icon: refresh"></span> Edit</a></li>
								<li><a href="#"><span data-uk-icon="icon: settings"></span> Configuration</a></li>
								<li class="uk-nav-divider"></li>
								<li><a href="#"><span data-uk-icon="icon: image"></span> Your Pictures</a></li>
								<li class="uk-nav-divider"></li>
								<li><a href="#"><span data-uk-icon="icon: sign-out"></span> Logout</a></li>
								
							</ul>
						</div>
					</li>
					<li class="uk-hidden@m"><a class="uk-navbar-toggle" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a></li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!--/HEADER-->

<main id="main-content">
	