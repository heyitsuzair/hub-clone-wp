<?php

/**
 * Front Page File
 *
 * @package HUB_WP
 */
get_header();
?>
<div class="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="home-page-wrap">
            <!-- <?php
                    if (have_posts()) {
                    ?>
            <?php
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', 'page');
                        endwhile;
                    } else {
                        get_template_part('template-parts/content-none');
                    }
            ?> -->
        </div>
    </main>
</div>



<?php
get_footer();
?>