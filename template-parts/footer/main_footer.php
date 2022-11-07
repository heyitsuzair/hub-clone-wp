<?php

/**
 * Main Footer For the Theme.
 *
 * @package HUB_WP
 */

// Left Column Content ------------------------------------->
$left_col = get_theme_mod('footer-leftcol-text-setting') == '' ? 'Copyright © 2022 Muhammad Uzair' : get_theme_mod('footer-leftcol-text-setting');
// Left Column Content ------------------------------------->

// Right Column Content ------------------------------------->
$right_col = get_theme_mod('footer-rightcol-text-setting') == '' ? 'All Rights Reserved' : get_theme_mod('footer-rightcol-text-setting');
// Right Column Content ------------------------------------->

// Check Whether The Left Column Is Enabled Or Not ------------------------------------->
$left_col_display = get_theme_mod('footer-leftcol-display-setting');
// Check Whether The Left Column Is Enabled Or Not ------------------------------------->

// Check Whether The Right Column Is Enabled Or Not ------------------------------------->
$right_col_display = get_theme_mod('footer-rightcol-display-setting');
// Check Whether The Right Column Is Enabled Or Not ------------------------------------->
?>

<footer id="main-footer" class="main-footer-hub">
    <div
        class="container footer-content d-flex <?php echo $left_col_display == false || $right_col_display == false ? 'justify-content-center' : 'justify-content-between' ?>">
        <?php echo $left_col_display  ? '<span class=' . esc_attr('left-col') . '>' . __($left_col, 'wp_hub') . '</span>' : "" ?>
        <?php echo $right_col_display  ? '<span class=' . esc_attr('right-col') . '>' . __($right_col, 'wp_hub') . '</span>' : "" ?>
    </div>
</footer>