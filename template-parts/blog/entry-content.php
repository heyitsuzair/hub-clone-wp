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
} elseif (is_single()) {
?>
<section class="single-blog-content single-<?php the_ID() ?>-content">
    <div class="row">
        <div class="col-lg-2 d-sm-none d-md-none d-lg-block content-left single-<?php the_ID() ?>-content-left">
            <div class="d-flex flex-column content-left-author text-center gap-5 mx-5 pt-5">
                <div class="d-flex align-items-center text-center justify-content-end gap-2 author-info">
                    <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>"
                        alt="<?php echo get_the_author_meta('ID') ?>">
                    <span class="author-name">Muhammad Uzair</span>
                </div>
                <div>Hello</div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12 col-md-12 px-5 text-center">
            <h4 class="text-start my-5 single-blog-moto fst-italic">Success Needs Hardwork</h4>
            <p><?php the_content(); ?></p>
        </div>
        <div class="col-lg-2 d-sm-none d-md-none d-lg-block content-right single-<?php the_ID() ?>-content-right">
            <div class="d-flex flex-column content-right-author text-center gap-5 mx-5 pt-5">
                <div class="contact">
                    <span>contact@hub.com</span>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>