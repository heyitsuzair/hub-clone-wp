<?php

/**
 * Bootstraps the Theme.
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class HUB_WP
{
    use Singleton;


    protected function __construct()
    {

        /**
         @get_instance(): To Load Classes
         */
        Assets::get_instance();
        Nav_Menus::get_instance();
        Theme_Support::get_instance();
    }
}