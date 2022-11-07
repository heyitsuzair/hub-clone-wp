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
    <span class="date-published">
        <?php echo estimate_reading_time_in_minutes(get_the_content()); ?> Min Read
    </span>
</header>
<?php
} elseif (is_single()) {
?>
<section class="post-<?php the_ID() ?>-single-page-header single-blog-header">
    <div
        class="d-flex flex-lg-row flex-md-column flex-sm-column single-blog-inner justify-content-between align-items-lg-center align-items-md-start gap-4">
        <div class="d-flex flex-column justify-content-between gap-4 single-blog-meta">
            <span class="single-blog-category">
                <?php
                    the_category();
                    ?>
            </span>
            <h2 class="fw-bold">
                <?php the_title(); ?>
            </h2>
            <h5 class="single-blog-moto">Success Needs Hardwork</h5>
        </div>
        <div class="text-lg-end text-md-start text-sm-start post-img">
            <?php echo has_post_thumbnail() ? the_post_thumbnail('post-thumbnail img-thumbnail rounded p-0') : get_place_holder_image('attachment-post-thumbnail img-thumbnail rounded p-0'); ?>
        </div>
    </div>
    <div class="publish d-flex align-items-center flex-lg-row flex-md-row flex-sm-row justify-content-between gap-3">
        <div class="left d-flex flex-row gap-3 align-items-center">
            <span class="fw-600"><?php echo get_the_date('F j, Y'); ?></span>
            <span class="dot"></span>
            <span class="fw-600"><?php the_author(); ?></span>
        </div>
        <div class="text-dark fw-600">
            <?php echo estimate_reading_time_in_minutes(get_the_content()); ?> Min Read
        </div>
    </div>
</section>
<?php
}
?>