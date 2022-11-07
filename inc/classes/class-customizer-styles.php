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
        $prefooter_bg_color = get_theme_mod('prefooter-bg-color-setting');
        $prefooter_paddings = get_theme_mod('prefooter-paddings-setting');
        $prefooter_display_seperators = get_theme_mod('prefooter-seperator-display-setting');
        $prefooter_seperators_width = get_theme_mod('prefooter-seperator-width-setting');
        $prefooter_seperators_color = get_theme_mod('prefooter-seperator-color-setting');

?>
<!--------------------------------------------------- Styling --------------------------------------------------->

<style>
#pre-footer {
    background-color: <?php echo $prefooter_bg_color==''? '#151515': $prefooter_bg_color ?>;
}

.pre-footer-content {
    padding: <?php echo $prefooter_paddings==''? '3rem': $prefooter_paddings . 'rem'?> 0;
    border-top: <?php echo $prefooter_display_seperators ? $prefooter_seperators_width . 'px': '0px'?> solid <?php echo $prefooter_seperators_color==''? '#ffffff12': $prefooter_seperators_color ?>;
    border-bottom: <?php echo $prefooter_display_seperators ? $prefooter_seperators_width . 'px': '0px'?> solid <?php echo $prefooter_seperators_color==''? '#ffffff12': $prefooter_seperators_color ?>;
}
</style>


<!--------------------------------------------------- Styling --------------------------------------------------->
<?php
    }
}
?>