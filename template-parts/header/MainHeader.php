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
        <a href="<?php echo esc_url(home_url()); ?>" class="td-none" id="site_title">
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
                <div class="search-trigger text-center my-2">
                    <li>
                        <i class="fa fa-search" id="search-icon" aria-hidden="true"></i>
                    </li>
                </div>
                <div class="search-form">
                    <?php
                    get_search_form();
                    ?>
                </div>
            </section>
        </div>
    </div>
</div>