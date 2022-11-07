<?php

/**
 * File To Register Sidebars
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class Register_Sidebars
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
        add_action('widgets_init', [$this, 'register_sidebars']);
    }

    /**
     * Add a sidebar.
     */
    public function register_sidebars()
    {
        /**
         * Extend The Below Variable To Add Sidebars
         */
        $sidebars = [
            [
                'name'          => __('Footer Bar 1', 'wp_hub'),
                'id'            => 'footerbar-1',
                'description'   => __('Widgets in this bar will appear in footer sidebar No. 1', 'wp_hub'),
            ],
            [
                'name'          => __('Footer Bar 2', 'wp_hub'),
                'id'            => 'footerbar-2',
                'description'   => __('Widgets in this bar will appear in footer sidebar No. 2', 'wp_hub'),
            ],
            [
                'name'          => __('Footer Bar 3', 'wp_hub'),
                'id'            => 'footerbar-3',
                'description'   => __('Widgets in this bar will appear in footer sidebar No. 3', 'wp_hub'),
            ],
            [
                'name'          => __('Footer Bar 4', 'wp_hub'),
                'id'            => 'footerbar-4',
                'description'   => __('Widgets in this bar will appear in footer sidebar No. 4', 'wp_hub'),
            ],
            [
                'name'          => __('Footer Bar 5', 'wp_hub'),
                'id'            => 'footerbar-5',
                'description'   => __('Widgets in this bar will appear in footer sidebar No. 5', 'wp_hub'),
            ],
        ];

        // Looping through $sidebars multi-dimensional array
        foreach ($sidebars as $sidebar) {
            register_sidebar([
                'name'          => __($sidebar['name'], 'wp_hub'),
                'id'            => $sidebar['id'],
                'description'   => __($sidebar['description'], 'wp_hub'),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="widgettitle">',
                'after_title'   => '</h2>',
            ]);
        }
    }
}