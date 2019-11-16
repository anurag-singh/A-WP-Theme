<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <section class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <?php if (has_custom_logo()) :
                        $site_name = get_bloginfo('name');
                        $site_logo_id = get_theme_mod('custom_logo');
                        $logo_src = wp_get_attachment_image_src($site_logo_id, 'full')[0];
                        echo '<img src="' . $logo_src . '" width="50" height="50" alt="' . $site_name . '">';
                    endif; ?>
                </a>
                <!-- Logo -->

                <!-- Navigation -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'menu'    => 'Primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'navbarSupportedContent',
                    'menu_class'        => 'navbar-nav ml-auto',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>
                <!-- Navigation -->
            </section>
        </nav>

    </header>