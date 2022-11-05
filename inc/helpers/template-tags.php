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