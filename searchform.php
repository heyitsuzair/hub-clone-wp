<?php

/** Custom Search Form File
 * 
 * 
 * @package HUB_WP
 */

?>

<form method="GET" action="<?php echo esc_url(home_url('/')); ?>" class="d-flex" role="search">
    <input class="form-control me-2" type="search"
        placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'aquila') ?>" aria-label="Search"
        value="<?php the_search_query() ?>" name="s">
    <button class="btn btn-outline-success"
        type="submit"><?php echo esc_attr_x('Search', 'submit button', 'aquila') ?></button>
</form>