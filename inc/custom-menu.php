<?php

/**
 * UIKit3_Walker_Nav_Menu Class for custom UIKit navbars
 *
 * @package  TeamWPUGPHTheme
 * @access   public
 */
class UIKit3_Walker_Nav_Menu extends Walker_Nav_Menu
{
    /**
     * Starts the list before the elements are added. Note: used for children elements,
     * not called on first level.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @return void
     */
    public function start_lvl( &$output, $depth = 0, $args = array() )
    {
        if ( isset($args->item_spacing) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        $output .= $indent . '<div class="uk-navbar-dropdown">' . "\n";
        $output .= $indent . "\t" . '<ul class="uk-nav uk-navbar-dropdown-nav">' . "\n";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Depth of the item.
     * @param array  $args   An array of additional arguments.
     * @return void
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        $output .= $indent . "\t" . '</ul>' . "\n";
        $output .= $indent . '</div>' . "\n";
    }

    /**
     * Displays start of an element. E.g '<li> Item Name'
     * 
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     * @see            Walker::start_el()
     */
    // 
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';        
        $item_output = '';

        $object     = $item->object;
        $type       = $item->type;
        $title      = $item->title;
        $description = $item->description;
        $permalink  = $item->url;

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

        foreach ($classes as &$class) {
            switch ($class) {
                case 'current-menu-item':
                case 'current-page-item':
                case 'current-menu-parent':
                case 'current-menu-ancestor':
                    $classes[] = 'uk-active';
                    break;
                default:
                    break;
            }
        }

        $item_output     .= '<li class="' .  implode(' ', $classes) . '">';

        //Add SPAN if no Permalink
        if ($permalink && $permalink != '#') {
            $item_output .= '<a href="' . $permalink . '">';
        } else {
            $item_output .= '<span>';
        }
        $item_output .= $title;

        // @todo: UIKit 3 navbar subtitle, @see https://getuikit.com/docs/navbar#subtitle
        if ($description != '' && $depth == 0) {
            $item_output .= '<small class="description">' . $description . '</small>';
        }

        // Close Permalink or span
        if ($permalink && $permalink != '#') {
            $item_output .= '</a>';
        } else {
            $item_output .= '</span>';
        }

        /**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $item        Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
