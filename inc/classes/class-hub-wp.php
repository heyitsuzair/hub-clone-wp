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
        Comment_Form::get_instance();
        Register_Sidebars::get_instance();
        Customizer_Prefooter::get_instance();
        Customizer_Styles::get_instance();
        Customizer_Footer::get_instance();
        Customizer_Single_Blog::get_instance();
        Customizer_Header::get_instance();
        Register_Metaboxes::get_instance();
        Shortcodes::get_instance();
    }
}