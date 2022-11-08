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
         *  Check If Seperators Color Value Is Empty Set The Default Seperator Color ------------------>
         */
        $prefooter_seperators_color = get_theme_mod('prefooter-seperator-color-setting') == '' ? '#ffffff12' : get_theme_mod('prefooter-seperator-color-setting');

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
</style>


<!-------------------------------------------------- Styling -------------------------------------------------->
<?php
    }
}
?>