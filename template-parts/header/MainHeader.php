<?php

/**
 * Theme Functions
 * @package HUB_WP
 */
?>

<div class="header mx-3 py-3 d-flex justify-content-between align-items-center">
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
    <div class="col-9 header-right d-flex justify-content-end">
        <div class="header-inner">


            <input id="hamburger" class="hamburger" type="checkbox" />
            <label class="hamburger" for="hamburger">
                <i></i>
            </label>
            <section class="drawer-list">
                <?php
                wp_nav_menu(['theme_location' => 'primary', 'menu_class' => 'd-flex justify-content-between list-unstyled flex-column align-items-center'])
                ?>
            </section>
            </content>

        </div>
    </div>
</div>