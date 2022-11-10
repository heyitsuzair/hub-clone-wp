<?php

/**
 * Search Result Page File
 *
 * @package Bloggar_WP
 */
global $wp_query;
?>

<?php
get_header();
?>

<main class="container my-5">
    <?php
    if (is_search() && !is_front_page()) {
    ?>
    <div class="blog-content">
        <?php
            // If No Post Found Hide This Area
            if ($wp_query->found_posts !== 0) :
            ?>
        <header class="my-5">
            <h3 class="page-title"> <?php echo $wp_query->found_posts; ?>
                <?php _e('Search Results Found For', 'locale'); ?>: "<?php the_search_query(); ?>"
            </h3>
        </header>
        <?php
            endif
            ?>
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
        <div class="next-prev-links my-5 py-5">
            <?php hub_numeric_posts_nav(); ?>
        </div>

    </div>
    <?php
            } else {
                get_template_part('template-parts/content-none');
            }
        }
?>
</main>
<?php
get_footer();
?>