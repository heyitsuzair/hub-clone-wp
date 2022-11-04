<?php

/**
 * File To Add Theme Supports
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class Theme_Support
{
    use Singleton;


    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
          @Actions
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        /**
         * Function Used To Add Theme Supports
         */
        add_theme_support('title-tag');

        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
        ]);

        add_theme_support('custom-background', [
            'default-color' => 'white',
            'default-image' => '',
            'default-repeat'  => 'no-repeat',
            'default-position-x'  => 'center',
        ]);

        add_theme_support('post-thumbnails');

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support('html5', [
            'search_form',
            'comment-form',
            'gallery',
            'caption',
            'script',
            'style'
        ]);

        add_theme_support('align-wide');

        add_image_size('featured-thumbnail', 350, 233, true);
    }
}