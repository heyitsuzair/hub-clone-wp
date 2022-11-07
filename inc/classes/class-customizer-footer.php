<?php

/**
 * File To Register Footer Customizer Objects
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton as TraitsSingleton;
use WP_Customize_Color_Control;
use WP_Customize_Control;

class Customizer_Footer
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
        $wp_customize->add_section('footer-section', [
            'title' => 'Footer',
            'priority' => 1,
            'description' => __('Customize Footer', 'wp_hub')
        ]);
        /**
         * Register Customizations
         */
        $this->register_customizations($wp_customize);
    }
    public function register_customizations($wp_customize)
    {
        $this->register_footer_display_customization($wp_customize);
        $this->register_footer_bg_color_customization($wp_customize);
        $this->register_footer_text_color_customization($wp_customize);
        $this->register_footer_paddings_customization($wp_customize);
        $this->register_footer_leftcol_customization($wp_customize);
        $this->register_footer_rightcol_customization($wp_customize);
    }
    public function register_footer_display_customization($wp_customize)
    {
        // Display Setting
        $wp_customize->add_setting('footer-display-setting', [
            'default' => false,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_checkbox'],
        ]);
        // Display Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer-display-control', [
            'label' => __("Display Footer?", 'wp_hub'),
            'section' => 'footer-section',
            'settings' => 'footer-display-setting',
            'type' => 'checkbox',
        ]));
    }
    public function register_footer_bg_color_customization($wp_customize)
    {
        // Background Color Setting
        $wp_customize->add_setting('footer-bg-color-setting', [
            'default' => '#151515',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Background Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'footer-bg-color-control',
            array(
                'label'    => __('Background Color', 'wp_hub'),
                'section'  => 'footer-section',
                'settings' => 'footer-bg-color-setting',
            )
        ));
    }
    public function register_footer_text_color_customization($wp_customize)
    {
        // Background Color Setting
        $wp_customize->add_setting('footer-text-color-setting', [
            'default' => '#ffffff',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Background Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'footer-text-color-control',
            array(
                'label'    => __('Text Color', 'wp_hub'),
                'section'  => 'footer-section',
                'settings' => 'footer-text-color-setting',
            )
        ));
    }
    public function register_footer_paddings_customization($wp_customize)
    {
        // Paddings Setting
        $wp_customize->add_setting('footer-paddings-setting', [
            'default' => 0,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_number'],
        ]);
        // Paddings Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer-paddings-control', [
            'label' => __("Paddings Top Bottom (rem)", 'wp_hub'),
            'section' => 'footer-section',
            'settings' => 'footer-paddings-setting',
            'type' => 'number',
        ]));
    }
    public function register_footer_leftcol_customization($wp_customize)
    {
        // Left Columns Setting
        $wp_customize->add_setting('footer-leftcol-text-setting', [
            'default' => 'Copyright © 2022 Muhammad Uzair',
            'sanitize_callback' => [$this, 'sanitize_custom_textarea']
        ]);
        // Left Columns Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer-leftcol-text-control', [
            'label' => "Left Column Text",
            'section' => 'footer-section',
            'settings' => 'footer-leftcol-text-setting',
            'type' => 'textarea',
        ]));
    }
    public function register_footer_rightcol_customization($wp_customize)
    {
        // Right Columns Setting
        $wp_customize->add_setting('footer-rightcol-text-setting', [
            'default' => 'All Rights Reserved',
            'sanitize_callback' => [$this, 'sanitize_custom_textarea']
        ]);
        // Right Columns Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer-rightcol-text-control', [
            'label' => "Right Column Text",
            'section' => 'footer-section',
            'settings' => 'footer-rightcol-text-setting',
            'type' => 'textarea',
        ]));
    }
}