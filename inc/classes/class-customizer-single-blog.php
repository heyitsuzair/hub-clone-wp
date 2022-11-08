<?php

/**
 * File To Register Single Blog Page Customizer Objects
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton as TraitsSingleton;
use WP_Customize_Color_Control;
use WP_Customize_Control;

class Customizer_Single_Blog
{
    use TraitsSingleton;

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
         @Hook To Register Customizer Object (Custom)
         */
        add_action('customize_register', [$this, 'register_customizer_sections_custom']);
    }
    /**
     * Sanitization ------------------------------
     */
    public function sanitize_custom_textarea($input)
    {
        return sanitize_textarea_field($input);
    }
    public function sanitize_custom_text($input)
    {
        return sanitize_text_field($input);
    }
    public function sanitize_checkbox($input)
    {
        return filter_var($input, FILTER_VALIDATE_INT);
    }
    public function sanitize_hex_color($input)
    {
        return sanitize_hex_color($input);
    }
    public function sanitize_number($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }
    /**
     * Sanitization ------------------------------
     */

    public function register_customizer_sections_custom($wp_customize)
    {
        // Initialize Section
        $this->register_post_section($wp_customize);
    }
    // Author Section,Settings And Controls
    public function register_post_section($wp_customize)
    {
        // New Panel
        $wp_customize->add_section('post-section', [
            'title' => 'Single Post',
            'priority' => 1,
            'description' => __('Customize Single Post Settings', 'wp_hub')
        ]);
        /**
         * Register Customizations
         */
        $this->register_customizations($wp_customize);
    }
    public function register_customizations($wp_customize)
    {
        $this->register_left_panel_customization($wp_customize);
        $this->register_right_panel_customization($wp_customize);
        $this->register_right_panel_text_customization($wp_customize);
        $this->register_content_color_customization($wp_customize);
        $this->register_moral_color_customization($wp_customize);
    }
    public function register_left_panel_customization($wp_customize)
    {
        // Left Panel Display Setting
        $wp_customize->add_setting('post-left-panel-setting', [
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_checkbox'],
        ]);
        // Left Panel Display Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'post-left-panel-display-control', [
            'label' => __("Show Left Panel", 'wp_hub'),
            'section' => 'post-section',
            'settings' => 'post-left-panel-setting',
            'type' => 'checkbox',
        ]));
    }
    public function register_right_panel_customization($wp_customize)
    {
        // Right Panel Display Setting
        $wp_customize->add_setting('post-right-panel-setting', [
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_checkbox'],
        ]);
        // Right Panel Display Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'post-right-panel-display-control', [
            'label' => __("Show Right Panel", 'wp_hub'),
            'section' => 'post-section',
            'settings' => 'post-right-panel-setting',
            'type' => 'checkbox',
        ]));
    }
    public function register_right_panel_text_customization($wp_customize)
    {
        // Right Panel Text Setting
        $wp_customize->add_setting('post-right-panel-text-setting', [
            'default' => __('contact@hub.com', 'wp_hub'),
            'sanitize_callback' => [$this, 'sanitize_custom_text']
        ]);

        // Right Panel Text Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'post-right-panel-text-control', [
            'label' => __("Right Panel Text", 'wp_hub'),
            'section' => 'post-section',
            'settings' => 'post-right-panel-text-setting',
            'type' => 'text',
        ]));
    }
    public function register_content_color_customization($wp_customize)
    {
        // Content Color Setting
        $wp_customize->add_setting('post-content-color-setting', [
            'default' => '#212529',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Content Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post-content-color-control',
            array(
                'label'    => __('Content Color', 'wp_hub'),
                'section'  => 'post-section',
                'settings' => 'post-content-color-setting',
            )
        ));
    }
    public function register_moral_color_customization($wp_customize)
    {
        // Moral Color Setting
        $wp_customize->add_setting('post-moral-color-setting', [
            'default' => '#737373',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Moral Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post-moral-color-control',
            array(
                'label'    => __('Moral Color', 'wp_hub'),
                'section'  => 'post-section',
                'settings' => 'post-moral-color-setting',
            )
        ));
    }
}