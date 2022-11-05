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
<div class="post-<?php the_ID();  ?>-content entry-content my-5">
    <a href="<?php the_permalink() ?>" class="td-none">
        <h4 class="fw-bold color-primary">
            <?php the_title() ?>
        </h4>
    </a>
</div>
<?php
}
?>