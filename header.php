<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <header id="site-header">
        <nav class="navbar navbar-expand-lg nav-icon border-bottom border-white shadow-sm bg-light" role="navigation">
            <div class="container">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo"><?php //the_custom_logo(); ?></div>
                <?php endif; ?>
                <?php $blog_info = get_bloginfo('name'); ?>
                <?php if (!empty($blog_info)) : ?>
                    <?php if (is_front_page() && is_home()) : ?>
                        <h1 class="navbar-brand"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <h1 class="navbar-brand"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'menu'    => 'Primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'primary-menu',
                    'menu_class'        => 'nav navbar-nav ml-auto',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </nav>


    </header>