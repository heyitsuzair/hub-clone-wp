<?php

/**
 * Front Page File
 *
 * @package Bloggar_WP
 */
?>

<?php
get_header();
?>

<main class="container my-5-5">
    <?php
    if (is_home() && !is_front_page()) {
    ?>
    <div class="blog-content">
        <?php
            if (have_posts()) {
            ?>
        <div class="content my-3">
            <div class="row post-row">
                <?php
                        while (have_posts()) : the_post();
                        ?>
                <div class="col-md-6 col-sm-12 col-xs-12 col-lg-4">
                    <?php get_template_part('template-parts/content'); ?>
                </div>

                <?php
                        endwhile
                        ?>
            </div>
        </div>
        <div id="more_posts">Load More</div>

    </div>
    <?php
            } else {
                // get_template_part('template-parts/content-none');
            }
        }
?>
</main>
<?php
get_footer();
?>