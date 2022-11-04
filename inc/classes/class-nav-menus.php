<?php

/**
 * File To Register Nav Menus
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class Nav_Menus
{
    use Singleton;


    protected function __construct()
    {

        /**
         * Setting Up Hooks
         */
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         @Hooks
         */
        add_action('init', [$this, 'register_nav_menus']);

        add_filter('walker_nav_menu_start_el', [$this, 'add_sub_menu_arrow'], 10, 4);
    }

    public function register_nav_menus()
    {
        register_nav_menus(
            [
                'bloggar_header_menu' => __('Header Menu', 'bloggar_wp'),
                'bloggar_footer_menu' => __('Footer Menu', 'bloggar_wp'),
            ]
        );
    }
    /**
     * Below Function Is Associate With "walker_nav_menu_start_el" that can insert an element if menu contains submenu
     */
    public function add_sub_menu_arrow($item_output, $item, $depth, $args)
    {
        if (in_array('menu-item-has-children', $item->classes)) {
            $arrow = ' <i class="fa fa-angle-down"></i>'; // Change the class to your font icon
            $item_output = str_replace('</a>', '</a>' . $arrow . '', $item_output);
        }
        return $item_output;
    }
}