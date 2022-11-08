<?php

/**
 * File To Register Header Customizer Objects
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
        $wp_customize->add_section('header-section', [
            'title' => 'Header',
            'priority' => 4,
            'description' => __('Customize header', 'wp_hub')
        ]);
        /**
         * Register Customizations
         */
        $this->register_customizations($wp_customize);
    }
    public function register_customizations($wp_customize)
    {
        $this->register_header_display_customization($wp_customize);
        $this->register_header_color_customization($wp_customize);
        $this->register_title_color_customization($wp_customize);
        $this->register_title_hover_color_customization($wp_customize);
        $this->register_hamburger_color_customization($wp_customize);
        $this->register_drawer_bg_color_customization($wp_customize);
    }
    public function register_header_display_customization($wp_customize)
    {
        // Display Setting
        $wp_customize->add_setting('header-display-setting', [
            'default' => 0,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_checkbox'],
        ]);
        // Display Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header-display-control', [
            'label' => __("Display Header?", 'wp_hub'),
            'section' => 'header-section',
            'settings' => 'header-display-setting',
            'type' => 'checkbox',
        ]));
    }
    public function register_header_color_customization($wp_customize)
    {
        // Background Color Setting
        $wp_customize->add_setting('header-bg-color-setting', [
            'default' => '#f6f6f6',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Background Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'header-bg-color-control',
            array(
                'label'    => __('Background Color', 'wp_hub'),
                'section'  => 'header-section',
                'settings' => 'header-bg-color-setting',
            )
        ));
    }
    public function register_title_color_customization($wp_customize)
    {
        // Title Color Setting
        $wp_customize->add_setting('brand-color-setting', [
            'default' => '#000000',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Title Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'brand-color-control',
            array(
                'label'    => __('Title Color', 'wp_hub'),
                'section'  => 'header-section',
                'settings' => 'brand-color-setting',
            )
        ));
    }
    public function register_title_hover_color_customization($wp_customize)
    {
        // Title Hover Color Setting
        $wp_customize->add_setting('brand-hover-color-setting', [
            'default' => '#000000',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Title Hover Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'brand-hover-color-control',
            array(
                'label'    => __('Title Color On Hover', 'wp_hub'),
                'section'  => 'header-section',
                'settings' => 'brand-hover-color-setting',
            )
        ));
    }
    public function register_hamburger_color_customization($wp_customize)
    {
        // Hamburger Color Setting
        $wp_customize->add_setting('hamburger-color-setting', [
            'default' => '#000000',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Hamburger Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'hamburger-color-control',
            array(
                'label'    => __('Hamburger Color', 'wp_hub'),
                'section'  => 'header-section',
                'settings' => 'hamburger-color-setting',
            )
        ));
    }
    public function register_drawer_bg_color_customization($wp_customize)
    {
        // Drawer BG Color Setting
        $wp_customize->add_setting('drawer-bg-color-setting', [
            'default' => '#f6f6f6',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_hex_color'],
        ]);
        // Drawer BG Color Control
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'drawer-bg-color-control',
            array(
                'label'    => __('Drawer Background Color', 'wp_hub'),
                'section'  => 'header-section',
                'settings' => 'drawer-bg-color-setting',
            )
        ));
    }
}