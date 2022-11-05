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
<section class="post-<?php the_ID() ?>-single-page-header single-blog-content">
    <div class="d-flex flex-row justify-content-between gap-4">
        <div class="d-flex flex-column justify-content-between gap-4">
            <span class="single-blog-category">
                <?php
                    the_category();
                    ?>
            </span>
            <h3 class="fw-bold w-75">
                <?php the_title(); ?>
            </h3>
            <h5 class="single-blog-moto">Success Needs Hardwork</h5>
        </div>
        <div>Hello</div>
    </div>
    <div class="publish d-flex align-items-center flex-row justify-content-between">
        <div class="left d-flex flex-row gap-3 align-items-center">
            <span class="fw-600"><?php echo get_the_date('F j, Y'); ?></span>
            <span class="dot"></span>
            <span class="fw-600">Muhammad Uzair</span>
        </div>
        <div class="text-dark fw-600">
            <?php echo estimate_reading_time_in_minutes(get_the_content()); ?> Min Read
        </div>
    </div>
</section>
<?php
}
?>