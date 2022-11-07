<?php

/**
 * File To Customize Comment Form
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton;

class Comment_Form
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
        add_filter('comment_form_default_fields', [$this, 'custom_fields']);
    }
    // Add custom meta (ratings) fields to the default comment form
    // Default comment form includes name, email address and website URL
    // Default comment form elements are hidden when user is logged in


    function custom_fields($fields)
    {

        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ($req ? " aria-required='true'" : ’);

        $fields['author'] = '<p class="comment-form-author col-lg-4 d-flex flex-column">' .
            // '<label for="author">' . __('Name') . '</label>' .
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
            '" size="30" tabindex="1"' . $aria_req . ' placeholder=' . __('Name') . ' /></p>';

        $fields['email'] = '<p class="comment-form-email col-lg-4 d-flex flex-column">' .
            // '<label for="email">' . __('Email') . '</label>' .
            '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
            '" size="30"  tabindex="2"' . $aria_req . ' placeholder=' . __('Email') . ' /></p>';

        $fields['url'] = '<p class="comment-form-url col-lg-4 d-flex flex-column">' .
            // '<label for="url">' . __('Website') . '</label>' .
            '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
            '" size="30"  tabindex="3" placeholder=' . __('Website') . ' /></p>';

        return $fields;
    }
}