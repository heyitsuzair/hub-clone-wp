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

// Getting Username For Single Blog Page --------------------------->
global $post;
$get_AuthorId = $post->post_author;
$getUser_name = get_userdata($get_AuthorId);
$post_author = $getUser_name->user_login;
// Getting Username For Single Blog Page --------------------------->

// Get Left Panel Display Setting --------------------------------->
$left_panel_display = get_theme_mod('post-left-panel-setting');
// Get Left Panel Display Setting --------------------------------->

// Get Right Panel Display Setting --------------------------------->
$right_panel_display = get_theme_mod('post-right-panel-setting');
// Get Right Panel Display Setting --------------------------------->

// Get Right Panel Text Setting --------------------------------->
$right_panel_text = get_theme_mod('post-right-panel-text-setting') == '' ? 'contact@hub.com' : get_theme_mod('post-right-panel-text-setting');
// Get Right Panel Text Setting --------------------------------->

// Check If The Left And Right Panel Is Enabled Or Not, If Enabled Than Set $full_width_column Accordingly
$full_width_column = '12';
if ($left_panel_display == true || $right_panel_display == true)
    $full_width_column = '10';
if ($left_panel_display == true && $right_panel_display == true)
    $full_width_column = '8';
// Check If The Left And Right Panel Is Enabled Or Not, If Enabled Than Set $full_width_column Accordingly

// Get Post Moral ----------------------------------->
$post_moral = do_shortcode('[get_post_moral post_id=' . get_the_ID() . ']');
// Get Post Moral ----------------------------------->

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
        <?php
            if ($left_panel_display) :
            ?>
        <div class="col-lg-2 d-sm-none d-md-none d-lg-block content-left single-<?php the_ID() ?>-content-left">
            <div class="d-flex flex-column content-left-author text-center gap-5 mx-5 pt-5">
                <div class="author-info">
                    <img class="rounded" src="<?php echo get_avatar_url($post_author); ?>"
                        alt="<?php echo $post_author ?>">

                    <div class="author-name">
                        <span><?php echo $post_author ?></span>
                    </div>
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
        <?php endif; ?>
        <div class="col-lg-<?php echo $full_width_column ?> col-sm-12 col-md-12 px-5 text-center">
            <?php
                if ($post_moral !== '') :
                ?>
            <h4 class="text-start my-5 single-blog-moto fst-italic"><?php echo esc_html_e($post_moral) ?></h4>
            <?php
                endif
                ?>
            <div class="single-blog-content"><?php the_content(); ?></div>
        </div>
        <?php
            if ($right_panel_display) :
            ?>
        <div class="col-lg-2 d-sm-none d-md-none d-lg-block content-right single-<?php the_ID() ?>-content-right">
            <div class="d-flex flex-column content-right-author text-center gap-5 mx-5 pt-5">
                <div class="contact">
                    <span><?php echo $right_panel_text; ?></span>
                </div>
            </div>
        </div>
        <?php
            endif;
            ?>
    </div>

</section>
<?php
}
?>