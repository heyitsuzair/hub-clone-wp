<?php

/**
 * File To Register Colors Customizer Objects
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton as TraitsSingleton;
use WP_Customize_Color_Control;

class Customizer_Colors
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
        $this->register_footer_section($wp_customize);
    }
    // Author Section,Settings And Controls
    public function register_footer_section($wp_customize)
    {
        // New Panel
        // No New Pannel Needed Because We Are Adding Settings To WordPress Core "Colors" Panel
        /**
         * Register Customizations
         */
        $this->register_customizations($wp_customize);
    }

    public function register_customizations($wp_customize)
    {
        $this->register_primary_color_customization($wp_customize);
        $this->register_secondary_color_customization($wp_customize);
        $this->register_text_color_customization($wp_customize);
        $this->register_text_hover_color_customization($wp_customize);
        $this->register_heading_color_customization($wp_customize);
        $this->register_postcard_color_customization($wp_customize);
    }

    public function register_primary_color_customization($wp_customize)
    {
        // Primary Color Setting
        $wp_customize->add_setting('primary-color-setting', [
            'default' => '#ffffff',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Primary Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'primary-color-control',
            [
                'label'    => __('Color Primary', 'wp_hub'),
                'section'  => 'colors',
                'settings' => 'primary-color-setting',
            ]
        ));
    }

    public function register_secondary_color_customization($wp_customize)
    {
        // Secondary Color Setting
        $wp_customize->add_setting('secondary-color-setting', [
            'default' => '#184341',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Secondary Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'secondary-color-control',
            [
                'label'    => __('Color Secondary', 'wp_hub'),
                'section'  => 'colors',
                'settings' => 'secondary-color-setting',
            ]
        ));
    }
    public function register_text_color_customization($wp_customize)
    {
        // Text Color Setting
        $wp_customize->add_setting('text-color-setting', [
            'default' => '#000000',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Text Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'text-color-control',
            [
                'label'    => __('Text Color', 'wp_hub'),
                'section'  => 'colors',
                'settings' => 'text-color-setting',
            ]
        ));
    }
    public function register_text_hover_color_customization($wp_customize)
    {
        // Text Hover Color Setting
        $wp_customize->add_setting('text-hover-color-setting', [
            'default' => '#ffffff',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Text Hover Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'text-hover-color-control',
            [
                'label'    => __('Text Hover Color', 'wp_hub'),
                'section'  => 'colors',
                'settings' => 'text-hover-color-setting',
            ]
        ));
    }
    public function register_heading_color_customization($wp_customize)
    {
        // Heading Color Setting
        $wp_customize->add_setting('heading-color-setting', [
            'default' => '#184341',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Heading Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'heading-color-control',
            [
                'label'    => __('Heading Color', 'wp_hub'),
                'section'  => 'colors',
                'settings' => 'heading-color-setting',
            ]
        ));
    }
    public function register_postcard_color_customization($wp_customize)
    {
        // Post Card Color Setting
        $wp_customize->add_setting('postcard-color-setting', [
            'default' => '#eef2f4',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Post Card Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'postcard-color-control',
            [
                'label'    => __('Post Card Color', 'wp_hub'),
                'section'  => 'colors',
                'settings' => 'postcard-color-setting',
            ]
        ));
    }
}