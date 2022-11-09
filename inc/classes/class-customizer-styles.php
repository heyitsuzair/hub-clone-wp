<?php

/**
 * File To Register Customizer Styles
 *
 * @package HUB_WP
 */

namespace HUB_WP\Inc;

use HUB_WP\Inc\Traits\Singleton as TraitsSingleton;

class Customizer_Styles
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
         @Hooks
         */
        add_action('wp_head', [$this, 'register_head_styles']);
    }

    public function register_head_styles()
    {
        /**
         * Check If BGs Color Value Is Empty Set The Default Background Colors ------------------>
         */
        $prefooter_bg_color = get_theme_mod('prefooter-bg-color-setting') == '' ? '#151515' : get_theme_mod('prefooter-bg-color-setting');
        $footer_bg_color = get_theme_mod('footer-bg-color-setting') == '' ? '#151515' : get_theme_mod('footer-bg-color-setting');

        /**
         * Check If Texts Color Value Is Empty Set The Default Background Colors ------------------>
         */
        $footer_text_color = get_theme_mod('footer-text-color-setting') == '' ? 'white' : get_theme_mod('footer-text-color-setting');

        /**
         *  Check If Paddings Value Is Empty Set The Default Padding ------------------>
         */
        $prefooter_paddings = get_theme_mod('prefooter-paddings-setting') == '' ? '3rem' : get_theme_mod('prefooter-paddings-setting') . 'rem';
        $footer_paddings = get_theme_mod('footer-paddings-setting') == '' ? '2rem' : get_theme_mod('footer-paddings-setting') . 'rem';

        /**
         *  Check If Colors Value Is Empty Set The Default Colors ------------------>
         */
        $prefooter_seperators_color = get_theme_mod('prefooter-seperator-color-setting') == '' ? '#ffffff12' : get_theme_mod('prefooter-seperator-color-setting');
        $post_moral_color = get_theme_mod('post-moral-color-setting') == '' ? '#737373' : get_theme_mod('post-moral-color-setting');
        $post_content_color = get_theme_mod('post-content-color-setting') == '' ? '#212529' : get_theme_mod('post-content-color-setting');
        $header_bg_color = get_theme_mod('header-bg-color-setting') == '' ? '#f6f6f6' : get_theme_mod('header-bg-color-setting');
        $brand_color = get_theme_mod('brand-color-setting') == '' ? '#000000' : get_theme_mod('brand-color-setting');
        $brand_hover_color = get_theme_mod('brand-hover-color-setting') == '' ? '#000000' : get_theme_mod('brand-hover-color-setting');
        $hamburger_color = get_theme_mod('hamburger-color-setting') == '' ? '#000000' : get_theme_mod('hamburger-color-setting');
        $drawer_bg_color = get_theme_mod('drawer-bg-color-setting') == '' ? '#f6f6f6' : get_theme_mod('drawer-bg-color-setting');
        $drawer_menu_color = get_theme_mod('drawer-menu-color-setting') == '' ? '#000000' : get_theme_mod('drawer-menu-color-setting');
        $drawer_menu_hover_color =  get_theme_mod('drawer-menu-hover-color-setting') == '' ? '#000000' : get_theme_mod('drawer-menu-hover-color-setting');
        $primary_color = get_theme_mod('primary-color-setting') == '' ? '#ffffff' : get_theme_mod('primary-color-setting');
        $secondary_color = get_theme_mod('secondary-color-setting') == '' ? '#184341' : get_theme_mod('secondary-color-setting');
        $text_color = get_theme_mod('text-color-setting') == '' ? '#000000' : get_theme_mod('text-color-setting');
        $text_hover_color = get_theme_mod('text-hover-color-setting') == '' ? '#000000' : get_theme_mod('text-hover-color-setting');
        $heading_color = get_theme_mod('heading-color-setting') == '' ? '#184341' : get_theme_mod('heading-color-setting');
        $postcard_color = get_theme_mod('postcard-color-setting') == '' ? '#eef2f4' : get_theme_mod('postcard-color-setting');
        /**
         * Check If Left Panel Of Single Blog Is Disabled And Right Is Enabled Than Modify Right Panel CSS
         */

        // Get Left Panel Display Setting --------------------------------->
        $left_panel_display = get_theme_mod('post-left-panel-setting');
        // Get Left Panel Display Setting --------------------------------->

        // Get Right Panel Display Setting --------------------------------->
        $right_panel_display = get_theme_mod('post-right-panel-setting');
        // Get Right Panel Display Setting --------------------------------->

        $is_right_enabled = $left_panel_display == false && $right_panel_display == true ? true : false;



        // <---------------------------------------- ! ------------------------------------------->
        $prefooter_display_seperators = get_theme_mod('prefooter-seperator-display-setting');
        $prefooter_seperators_width = get_theme_mod('prefooter-seperator-width-setting');
        // <---------------------------------------- ! ------------------------------------------->

?>
<!-------------------------------------------------- Styling -------------------------------------------------->

<style>
#pre-footer {
    background-color: <?php echo $prefooter_bg_color ?>;
}

.pre-footer-content {
    padding: <?php echo $prefooter_paddings ?> 0;
    /*
    * First Check If The Seperators Are Enabled From Customizer Or Not, If Not Than Make Seperatos Width To 0px Else Put Its Original Width Coming From Customizer
    */
    border-top: <?php echo $prefooter_display_seperators ? $prefooter_seperators_width . 'px': '0px'?> solid <?php echo $prefooter_seperators_color ?>;
    /*
    * First Check If The Seperators Are Enabled From Customizer Or Not, If Not Than Make Seperatos Width To 0px Else Put Its Original Width Coming From Customizer
    */
    border-bottom: <?php echo $prefooter_display_seperators ? $prefooter_seperators_width . 'px': '0px'?> solid <?php echo $prefooter_seperators_color ?>;
}

#main-footer {
    background-color: <?php echo $footer_bg_color ?>;
    color: <?php echo $footer_text_color ?>;
    padding: <?php echo $footer_paddings ?> 0;
}

.single-blog .single-blog-content .content-right {
    transform: translateX(<?php echo $is_right_enabled ? 0 : ""?>rem);
}

.single-blog .single-blog-moto {
    color: <?php echo $post_moral_color ?>;
}

.single-blog .single-blog-content {
    color: <?php echo $post_content_color ?>;
}

#master-header {
    background-color: <?php echo $header_bg_color ?>;
}

#site_title {
    color: <?php echo $brand_color ?>;
}

#site_title:hover {
    color: <?php echo $brand_hover_color ?>;
}

label.hamburger>i,
label.hamburger>i::before,
label.hamburger>i::after {
    background-color: <?php echo $hamburger_color;
    ?>;
}

.drawer-list {
    background-color: <?php echo $drawer_bg_color ?>;
}

#master-header .header .header-right .header-inner .menu-item a {
    color: <?php echo $drawer_menu_color ?>;
}

#master-header .header .header-right .header-inner .menu-item a:hover {
    color: <?php echo $drawer_menu_hover_color ?>;
}

.menu-arrow {
    color: <?php echo $drawer_menu_color ?>;
}

.menu-arrow:hover {
    color: <?php echo $drawer_menu_hover_color ?>;
}

.post-row .post-card .entry-header .blog-card-badge {
    background-color: <?php echo $primary_color;
    ?>;
    color: <?php echo $text_color;
    ?>;
}

.post-row .post-card .entry-header .blog-card-badge:hover {
    color: <?php echo $text_hover_color ?>;
    background-color: <?php echo $secondary_color ?>;
}

.post-row .post-card .entry-header .blog-card-badge ul li a {
    color: <?php echo $text_color ?>;
}

.post-row .post-card .entry-header .blog-card-badge ul li a:hover {
    color: <?php echo $text_hover_color ?>;
}

.search-form .heading {
    color: <?php echo $heading_color ?>;
}

.post-row .post-card {
    background-color: <?php echo $postcard_color ?>;
}

.next-prev-links .navigation ul li.active a {
    background-color: <?php echo $primary_color ?>;
    color: <?php echo $text_hover_color ?>;
}

.next-prev-links .navigation ul li a:hover {
    background-color: <?php echo $primary_color ?>;
    color: <?php echo $text_hover_color ?>;

}



.single-blog .single-blog-header .single-blog-category .post-categories li a {
    color: <?php echo $secondary_color ?>;
}


#search-icon {
    color: <?php echo $drawer_menu_color ?>;
    cursor: pointer;
}

#search-icon:hover {
    color: <?php echo $drawer_menu_hover_color ?>;
}

#close-search {
    color: <?php echo $drawer_menu_color ?>;
    cursor: pointer;
}

#close-search:hover {
    color: <?php echo $drawer_menu_hover_color ?>;
}

.search-form {
    background-color: <?php echo $drawer_bg_color ?>;
}
</style>


<!-------------------------------------------------- Styling -------------------------------------------------->
<?php
    }
}
?>