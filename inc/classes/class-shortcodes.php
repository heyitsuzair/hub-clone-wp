<?php

/**
 * File To Register Shortcodes
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class Shortcodes
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
        add_shortcode('get_post_moral', [$this, 'retrieve_post_moral']);
    }
    public function retrieve_post_moral($atts)
    {
        /**
         * @param $atts is Attributes/Paramters Of Shortcodes
         */
        $post_id = $atts['post_id'];
        $moral = get_post_meta($post_id, 'moral_of_post');
        /**
         * Returning Moral To Wherever The Function Is Called And Also Ensure That It Shouldn't Be Empty To Prevent Error
         */
        return is_array($moral) && !empty($moral) ? $moral[0] : '';
    }
}