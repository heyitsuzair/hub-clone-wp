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
<header class="d-flex align-items-center justify-content-between gap-3 entry-header post-<?php the_ID();  ?>-header">
    <span class="blog-card-badge">
        <?php
            the_category();
            ?>
    </span>
    <span class="date-published"><?php echo get_the_date('Y-m-d'); ?></span>
</header>
<?php
}
?>