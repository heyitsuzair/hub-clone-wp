<?php

/**
 * Pre Footer For the Theme.
 *
 * @package HUB_WP
 */
?>

<footer id="pre-footer" class="pre-footer-hub">
    <div class="pre-footer-content container d-flex flex-lg-row gap-3 justify-content-around align-items-center">

        <!--------------------- Check If Any Sidebar Is Active --------------------->

        <?php
        if (!is_active_sidebar('footerbar-1') && !is_active_sidebar('footerbar-2') && !is_active_sidebar('footerbar-3') && !is_active_sidebar('footerbar-4') && !is_active_sidebar('footerbar-5')) {
            echo __('Please Add Widgets In Footer Bars To See Content Here!', 'wp_hub');
        } else {
        ?>

        <!--------------------- Check If Any Sidebar Is Active --------------------->

        <!----------------------- Footerbar 1 ---------------------->
        <?php if (is_active_sidebar('footerbar-1')) {
            ?>
        <div class="footerbar-1">
            <ul id="footerbar-1">
                <?php dynamic_sidebar('footerbar-1'); ?>
            </ul>
        </div>
        <?php
            } ?>
        <!----------------------- Footerbar 1 ---------------------->

        <!----------------------- Footerbar 2 ---------------------->
        <?php if (is_active_sidebar('footerbar-2')) {
            ?>
        <div class="footerbar-2">
            <ul id="footerbar-2">
                <?php dynamic_sidebar('footerbar-2'); ?>
            </ul>
        </div>
        <?php
            } ?>
        <!----------------------- Footerbar 2 ---------------------->

        <!----------------------- Footerbar 3 ---------------------->
        <?php if (is_active_sidebar('footerbar-3')) {
            ?>
        <div class="footerbar-3">
            <ul id="footerbar-3">
                <?php dynamic_sidebar('footerbar-3'); ?>
            </ul>
        </div>
        <?php
            } ?>
        <!----------------------- Footerbar 3 ---------------------->

        <!----------------------- Footerbar 4 ---------------------->
        <?php if (is_active_sidebar('footerbar-4')) {
            ?>
        <div class="footerbar-4">
            <ul id="footerbar-4">
                <?php dynamic_sidebar('footerbar-4'); ?>
            </ul>
        </div>
        <?php
            } ?>
        <!----------------------- Footerbar 4 ---------------------->

        <!----------------------- Footerbar 5 ---------------------->
        <?php if (is_active_sidebar('footerbar-5')) {
            ?>
        <div class="footerbar-5">
            <ul id="footerbar-5">
                <?php dynamic_sidebar('footerbar-5'); ?>
            </ul>
        </div>
        <?php
            } ?>
        <!----------------------- Footerbar 5 ---------------------->
        <?php
        }
        ?>
    </div>
</footer>