<?php

/** Content File
 * 
 * 
 * @package HUB_WP
 */

?>


<article id="post-<?php the_ID(); ?>"
    <?php post_class(is_home() || is_search() ? ['post-card', 'rounded', 'py-4', 'px-4', 'my-2'] : ''); ?>>
    <?php
    get_template_part('template-parts/blog/entry-header');
    // get_template_part('template-parts/components/blog/entry-meta');
    get_template_part('template-parts/blog/entry-content');
    get_template_part('template-parts/blog/entry-footer');
    ?>
</article>