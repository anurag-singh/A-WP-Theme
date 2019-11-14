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
        <section id="top-bar" class="bg-primary">
            <div class="container pt-2">
                <div class="row">
                    <div class="col">
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="tel:8003857105" class="text-white">
                                    <i class="fas fa-phone-alt fa-fw"></i>
                                    123-456-7890
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="mailto:email@gmail.com" class="text-white">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    email@gmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="container pt-4">
            <div class="row">
                <div class="col-9">
                    <figure>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
                    </figure>
                </div>
                <div class="col">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link btn bg-primary">
                                <i class="fab fa-fw fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn bg-primary">
                                <i class="fab fa-fw fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn bg-primary">
                                <i class="fab fa-fw fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'menu'    => 'Primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </nav>


    </header>