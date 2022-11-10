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
<div class="post-<?php the_ID();  ?>-content d-flex entry-footer gap-3 align-items-center my-3">
    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"
        class="author-url td-none author-pic">

        <img class="rounded-circle" src="<?php echo get_avatar_url(get_the_author()); ?>" alt="<?php the_author() ?>">

        <div class="author-name">
            <?php the_author(); ?>
        </div>
    </a>
</div>
<?php
}
?>