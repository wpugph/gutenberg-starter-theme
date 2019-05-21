# Theme WPUGPH
Modern Theme using UIKit 3 with good support for Gutenberg block styling. Based on gutenbergtheme https://github.com/WordPress/gutenberg-starter-theme.

Work in progress.

## Block focused
If something isn't a block yet, this theme will not have it. As each block happens, the theme will gain that functionality.

## Styling just like Gutenberg
The idea of the default look for this theme is to as closely replicate that of the Gutenberg editor output as possible. As a result the focus is on that styling not creating a new look.. yet. As things grow, we may have styles and go further into what the theme can have... who knows.

## GNU General Public License v2
This theme, like WordPress, is licensed under the GPL. Use it to make something cool, have fun, and share what you've learned with others.

## Installation
1. Clone inside theme folder: /wp-content/themes
```git clone --recursive https://github.com/wpugph/themewpugph.git```
2. Compile stylesheet site.scss
3. Activate the theme

## Plugins and Test Data
After WordPress setup follow these steps:

1. Install plugin: [Query Monitor](https://wordpress.org/plugins/query-monitor/) by Jogn Blackbourn
2. Install test data: [WP Test](https://github.com/poststatus/wptest#installation)

## PHPCS and WordPress Coding Standards on Visual Studio Code
1. Install [vscode-phpcs](https://marketplace.visualstudio.com/items?itemName=ikappas.phpcs) extension
2. Install [wpcs](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards) via **composer** $ ```composer install-wpcs```
3. Configure Visual Studio Code, add the following
```
{
	"phpcs.enable":   true,
	"phpcs.standard": "WordPress"
}
```

## Roadmap ([See v1](https://github.com/wpugph/gutenberg-starter-theme/projects/1))
- Integrate UIKit 3
- Basic Gutenblocks for UIkit components
- WP UIkit Customizer
- A11y ready

## Philosophy
- Time is precious commodity
- Lean and DRY, minimum dependencies
- Simple but readable code
- Made for Child Theme developers and hackers
- Always take advantage of modern WordPress core
