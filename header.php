<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Announcement Bar -->
    <?php 
    $announcement_text = get_field('announcement_bar_text') ?: "Sign up and get 20% off to your first order. Sign Up Now";
    if($announcement_text): ?>
        <section class="announcement-bar">
            <span><?php echo esc_html($announcement_text); ?></span>
        </section>
    <?php endif; ?>

    <!-- Header / Nav -->
    <header class="site-header">
        <div class="header-container">
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    SHOP.CO
                </a>
            </div>
            <div class="header-icons">
                <span class="icon-search"></span>
                <span class="icon-cart"></span>
                <span class="icon-user"></span>
            </div>
        </div>
    </header>
