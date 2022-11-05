<?php

/** Content Header File
 * 
 * 
 * @package HUB_WP
 */

?>

<?php
if (is_home()) {
?>
<header class="d-flex align-items-center gap-3 entry-header post-<?php the_ID();  ?>-header">
    <span class="blog-card-badge">
        <?php
            the_category();
            ?>
    </span>
    <span>2 Years Ago</span>
</header>
<?php
}
?>