# Theme WPUGPH
Modern Theme using UIKit 3 with good support for Gutenberg block styling. Based on gutenbergtheme https://github.com/WordPress/gutenberg-starter-theme.

Work in progress.

## Block focused
If something isn't a block yet, this theme will not have it. As each block happens, the theme will gain that functionality.

## Styling just like Gutenberg
The idea of the default look for this theme is to as closely replicate that of the Gutenberg editor output as possible. As a result the focus is on that styling not creating a new look.. yet. As things grow, we may have styles and go further into what the theme can have... who knows.

## GNU General Public License v2
This theme, like WordPress, is licensed under the GPL. Use it to make something cool, have fun, and share what you've learned with others.

## Plugins and Test Data
After WordPress setup follow these steps:

1. Install plugin: [Query Monitor](https://wordpress.org/plugins/query-monitor/) by Jogn Blackbourn
2. Install test data: [WP Test](https://github.com/poststatus/wptest#installation)

## Theme Installation and Setup
1. Clone inside theme folder: /wp-content/themes
```git clone --recursive https://github.com/wpugph/themewpugph.git```
2. Install dependencies
```composer install```
3. Compile stylesheet site.scss
4. Activate the theme

## Dependecies
- [UIKit 3](https://github.com/uikit/uikit) - A lightweight and modular front-end framework for developing fast and powerful web interfaces
- [Carbon Fields ](https://github.com/htmlburger/carbon-fields) - A developer-oriented library for WordPress custom fields for all types of WordPress content.

## Roadmap ([See v1](https://github.com/wpugph/gutenberg-starter-theme/projects/1))
- Integrate UIKit 3
- Basic Gutenblocks for UIKit 3 components
- WP UIkit Customizer
- A11y ready

## Philosophy
- Time is precious commodity
- Lean and DRY, minimum dependencies
- Simple but readable code
- Made for Child Theme developers and hackers
- Always take advantage of modern WordPress core
