<?php

/** Custom Search Form File
 * 
 * 
 * @package HUB_WP
 */

?>

<form method="GET" id="form-search" class="d-flex align-items-center" action="<?php echo esc_url(home_url('/')); ?>"
    role="search">
    <input class="search-form-input me-2" type="search"
        placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'hub_wp') ?>" aria-label="Search"
        value="<?php the_search_query() ?>" name="s">
    <i class="fa fa-times-circle" id="close-search" aria-hidden="true"></i>
</form>