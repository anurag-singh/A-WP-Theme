<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo get_bloginfo('name'); ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <?php wp_head(); ?>
</head>

<body>
    <nav class="navbar navbar-toggleable-md navbar-light fixed-top" style="background-color: #e3f2fd;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <?php the_custom_logo(); ?>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="mr-auto"></div>
            <div class="links">
                <?php
                // Get value from options table
                $theme_options = get_option('front_page_settings');

                // Get get values from our varriable
                $headerLinks = $theme_options['header_links'];

                $contactNo = $headerLinks['contact_no'];
                $emailAddress = $headerLinks['email_address'];
                ?>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <small>
                            <strong>Contact us @</strong>                                                       
                            <a href="Tel: <?php echo $contactNo; ?>"><?php echo $contactNo; ?></a>
                        </small>
                    </li>
                    <li class="list-inline-item">|
                    </li>
                    <li class="list-inline-item">
                        <small>
                            <strong>Write us @</strong>
                            <a href="mailto: <?php echo $emailAddress; ?>"><?php echo $emailAddress; ?></a>
                        </small>
                    </li>
                </ul>
                <?php 
                    $menuArgs = array(
                                    'menu' => 'primary',
                                    'menu_class' => 'navbar-nav'
                                );
                    wp_nav_menu($menuArgs);
                ?>
            </div>
        </div>
    </nav>
    
