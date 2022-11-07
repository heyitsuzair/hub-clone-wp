<?php

/**
 * Main Footer For the Theme.
 *
 * @package HUB_WP
 */

$leftCol = get_theme_mod('footer-leftcol-text-setting') == '' ? 'Copyright © 2022 Muhammad Uzair' : get_theme_mod('footer-leftcol-text-setting');
$rightCol = get_theme_mod('footer-rightcol-text-setting') == '' ? 'All Rights Reserved' : get_theme_mod('footer-rightcol-text-setting');

?>

<footer id="main-footer" class="mAIN-footer-hub">
    <div class="container footer-content d-flex justify-content-between">
        <span class="left-col"><?php echo $leftCol ?></span>
        <span class="right-col"><?php echo $rightCol ?></span>
    </div>
</footer>