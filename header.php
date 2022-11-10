<?php

/**
 * Theme Header
 * @package HUB_WP
 */

// Get Header Display Setting --------------------------------------------->
$is_header_enabled = get_theme_mod('header-display-setting');
// Get Header Display Setting --------------------------------------------->

?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>
    <div id="page">
        <?php
        if ($is_header_enabled) :
        ?>
        <header id="master-header">
            <?php get_template_part('template-parts/header/MainHeader'); ?>
        </header>
        <?php
        endif;
        ?>
        <div id="content">