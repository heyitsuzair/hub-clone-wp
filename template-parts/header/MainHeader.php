<?php

/**
 * Theme Functions
 * @package HUB_WP
 */
?>

<div class="header d-flex justify-content-between">
    <div class="col-3 header-left">
        <?php
        if (has_custom_logo()) {
        ?>
        <?php
            the_custom_logo();
            ?>
        <?php
        } else {
        ?>
        <a href="<?php echo esc_attr(home_url()); ?>" class="td-none text-black">
            <h4> <?php echo get_bloginfo('name'); ?> </h4>
        </a>
        <?php
        }
        ?>
    </div>
    <div class="col-9 header-right">
        <div class="header-desktop">
            <?php wp_nav_menu(); ?>
        </div>
    </div>
</div>