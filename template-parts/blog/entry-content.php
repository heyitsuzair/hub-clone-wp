<?php

/** Content Header File
 * 
 * 
 * @package HUB_WP
 */

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];

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
                    <img class="rounded" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>"
                        alt="<?php echo get_the_author_meta('ID') ?>">
                    <span class="author-name">Muhammad Uzair</span>
                </div>
                <div class="text-start d-flex flex-column gap-4 socials <?php the_ID() ?>-socials">
                    <a class="td-none social-link fb"
                        href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u=' .  $url) ?>"
                        target="_blank">
                        <i class="fa fa-brands fa-facebook" aria-hidden="true"></i>
                        <span>Facebook</span>
                    </a>
                    <a class="td-none social-link twitter" href="<?php echo esc_url('
                            http://twitter.com/share?text=Checkout This Amazing Blog!&url=' .  $url) ?>"
                        target="_blank">
                        <i class="fa fa-brands fa-twitter" aria-hidden="true"></i>
                        <span>Twitter</span>
                    </a>
                    <a class="td-none social-link linkedin"
                        href="<?php echo esc_url('https://www.linkedin.com/sharing/share-offsite/?url=' .  $url) ?>"
                        target="_blank">
                        <i class="fa fa-brands fa-linkedin" aria-hidden="true"></i>
                        <span>Linkedin</span>
                    </a>
                </div>
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