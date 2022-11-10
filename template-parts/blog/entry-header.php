<?php

/** Content Header File
 * 
 * 
 * @package HUB_WP
 */

// Getting Username For Single Blog Page --------------------------->
global $post;
$get_AuthorId = $post->post_author;
$getUser_name = get_userdata($get_AuthorId);
$post_author = $getUser_name->user_login;
// Getting Username For Single Blog Page --------------------------->

// Get Meta Display Setting --------------------------------->
$meta_display = get_theme_mod('post-meta-display-setting');
// Get Meta Display Setting --------------------------------->

// Get Post Moral ----------------------------------->
$post_moral = do_shortcode('[get_post_moral post_id=' . get_the_ID() . ']');
// Get Post Moral ----------------------------------->
?>

<?php

if (is_home() || is_search() || is_category() || is_author()) {


?>
<header class="d-flex align-items-center justify-content-between gap-3 entry-header post-<?php the_ID();  ?>-header">
    <span class="blog-card-badge">
        <?php
            the_category();
            ?>
    </span>
    <span class="blog-card-badge">
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
            <h2 class="fw-bold heading">
                <?php the_title(); ?>
            </h2>
            <?php
                if ($post_moral !== '') :
                ?>
            <h5 class="single-blog-moto"><?php echo esc_html_e($post_moral) ?></h5>
            <?php
                endif
                ?>
        </div>
        <div class="text-lg-end text-md-start text-sm-start post-img">
            <?php echo has_post_thumbnail() ? the_post_thumbnail('post-thumbnail img-thumbnail rounded p-0') : get_place_holder_image('attachment-post-thumbnail img-thumbnail rounded p-0'); ?>
        </div>
    </div>
    <div class="publish d-flex align-items-center flex-lg-row flex-md-row flex-sm-row justify-content-between gap-3">
        <?php
            if ($meta_display) :
            ?>
        <div class="left d-flex flex-row gap-3 align-items-center">
            <span class="fw-600 text-dark"><?php echo get_the_date('F j, Y'); ?></span>
            <span class="dot"></span>
            <a href="<?php echo esc_url(get_author_posts_url($get_AuthorId)) ?>" class="td-none text-dark">
                <span class="fw-600"><?php echo $post_author ?></span>
            </a>
        </div>
        <div class="text-dark fw-600">
            <?php echo estimate_reading_time_in_minutes(get_the_content()); ?> Min Read
        </div>
        <?php
            endif;
            ?>
    </div>
</section>
<?php
} elseif (is_front_page() || is_archive() || is_singular('post')) {
    the_content();
}
?>