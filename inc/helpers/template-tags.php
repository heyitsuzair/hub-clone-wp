<?php
function hub_the_excerpt($trim_char_count = 0)
{
    if (!has_excerpt() || $trim_char_count === 0) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags(get_the_excerpt());

    $excerpt = substr($excerpt, 0, $trim_char_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ''));

    return $excerpt . '...';
}
function hub_numeric_posts_nav()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-angle-left"></i> Go Back'));

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link('Next <i class="fa fa-angle-right"></i>'));

    echo '</ul></div>' . "\n";
}


/**
 * Estimated reading time in minutes
 * 
 * @param $content
 * @param $words_per_minute
 * @param $with_gutenberg
 * 
 * @return int estimated time in minutes
 */

function estimate_reading_time_in_minutes($content = '', $words_per_minute = 300, $with_gutenberg = false)
{
    // In case if content is build with gutenberg parse blocks
    if ($with_gutenberg) {
        $blocks = parse_blocks($content);
        $contentHtml = '';

        foreach ($blocks as $block) {
            $contentHtml .= render_block($block);
        }

        $content = $contentHtml;
    }

    // Remove HTML tags from string
    $content = wp_strip_all_tags($content);

    // When content is empty return 0
    if (!$content) {
        return 0;
    }

    // Count words containing string
    $words_count = str_word_count($content);

    // Calculate time for read all words and round
    $minutes = ceil($words_count / $words_per_minute);

    return $minutes;
}

/**
 * Function To Get Placeholder Image
 */

function get_place_holder_image($class)
{
    $place_holder = sprintf('<img class="%1$s" src=' . HUB_WP_DIR_URI . '/assets/img/placeholder.png' . ' alt="Loading..." loading="lazy">', esc_attr($class));

    return $place_holder;
}