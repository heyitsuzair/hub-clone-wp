<?php

/**
 * File To Enqueqe CSS AND JS Files
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class Assets
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
         @Hook To Enqueue CSS
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        /**
         @Hook To Enqueue JS
         */
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        /**
         * Registering Styles So It Can Be Enqueued Below Whenever Needed
         */
        wp_register_style('bootstrap_css', HUB_WP_DIR_URI . '/assets/libraries/bootstrap.min.css', [], false, 'all');

        wp_register_style('fontawesome_css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', [], false, 'all');

        wp_register_style('index_css', HUB_WP_DIR_URI . '/assets/sass/index.css', [], false, 'all');

        /**
         * Enqueuing CSS
         */
        wp_enqueue_style('bootstrap_css');
        wp_enqueue_style('fontawesome_css');
        wp_enqueue_style('index_css');
    }
    public function register_scripts()
    {
        /**
         * Registering Styles So It Can Be Enqueued Below Whenever Needed
         */
        wp_register_script('bootstrap_js', HUB_WP_DIR_URI . '/assets/libraries/bootstrap.bundle.min.js', ['jquery'], false, true);
        wp_register_script('header_js', HUB_WP_DIR_URI . '/assets/js/header/index.js', ['jquery'], false, true);


        /**
         * Enqueuing JS
         */
        wp_enqueue_script('bootstrap_js');
        wp_enqueue_script('header_js');
    }
}