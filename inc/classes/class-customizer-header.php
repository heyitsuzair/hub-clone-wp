<?php

/**
 * File To Register Prefooter Customizer Objects
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton as TraitsSingleton;
use WP_Customize_Color_Control;
use WP_Customize_Control;

class Customizer_Header
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
    public function sanitize_custom_option($input)
    {
        return ($input == 'No') ? 'No' : 'Yes';
    }
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
    /**
     * Sanitization ------------------------------
     */

    public function register_customizer_sections_custom($wp_customize)
    {
        // Initialize Section
        $this->register_prefooter_section($wp_customize);
    }
    // Author Section,Settings And Controls
    public function register_prefooter_section($wp_customize)
    {
        // New Panel
        $wp_customize->add_section('prefooter-section', [
            'title' => 'Prefooter',
            'priority' => 1,
            'description' => __('Customize Prefooter', 'wp_hub')
        ]);
        /**
         * Register Customizations
         */
        $this->register_customizations($wp_customize);
    }
    public function register_customizations($wp_customize)
    {
        $this->register_prefooter_display_customization($wp_customize);
        $this->register_prefooter_bg_color_customization($wp_customize);
    }
    public function register_prefooter_display_customization($wp_customize)
    {
        // Display Setting
        $wp_customize->add_setting('prefooter-display-setting', [
            'default' => false,
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_checkbox'],
        ]);
        // Display Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'prefooter-display-control', [
            'label' => __("Display Prefooter Footer?", 'wp_hub'),
            'section' => 'prefooter-section',
            'settings' => 'prefooter-display-setting',
            'type' => 'checkbox',
        ]));
    }
    public function register_prefooter_bg_color_customization($wp_customize)
    {
        // Background Color Setting
        $wp_customize->add_setting('prefooter-bg-color-setting', [
            'default' => '#151515',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Background Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'prefooter-bg-color-control',
            array(
                'label'    => __('Background Color', 'wp_hub'),
                'section'  => 'prefooter-section',
                'settings' => 'prefooter-bg-color-setting',
            )
        ));
    }
}