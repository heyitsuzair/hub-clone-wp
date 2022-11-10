<?php

/** Content Header File
 * 
 * 
 * @package HUB_WP
 */



?>

<?php
if (is_home() || is_search() || is_category() || is_author()) {
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
} elseif (is_single()) {


?>
<div class="container mt-5">
    <?php comment_form([
            'class_container' => 'comment-container',
            'class_form' => 'comment-form row',
            'label_submit' => __('Submit', 'wp_hub'),
            'title_reply' => 'Leave A Comment',
        ]); ?>
</div>
<?php
}
?>