<?php

/**
 * Enqueue scripts and styles.
 */
function website_scripts()
{
    if (!is_admin()) { // Load jQuery script from CDN
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//code.jquery.com/jquery-3.4.1.min.js', true);
        wp_enqueue_script('jquery');
    }

    // Register Stylesheets
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', false, null);
    wp_register_style('floating-form-labels', get_stylesheet_directory_uri() . '/assets/css/floating-form-labels.css', false, null);
    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', false, null);
    wp_register_style('style', get_stylesheet_uri(), false, null);

    // Register javascripts
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, null, true);
    wp_register_script('bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js", array('jquery'), null, true);
    wp_register_script('typewriter', get_template_directory_uri() . '/assets/js/core.js', array('jquery'), null, true);
    wp_register_script('script-frontpage', get_template_directory_uri() . '/assets/js/script-frontpage.js', array('jquery'), null, true);
    wp_register_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);

    // Add scripts in website
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('floating-form-labels');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('style');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('typewriter');

    if (is_front_page()) {
        wp_enqueue_script('script-frontpage');
    } else {
        wp_enqueue_script('script');
    }

    // NOTICE - Following scripts will ONLY called in Devlopment Environment
    // Will load uncache version of scripts
    if ($_COOKIE['dev'] == 1) {
        wp_register_style('style-dev', get_stylesheet_uri(), false, filemtime(get_stylesheet_directory() . '/style.css'));
        wp_register_script('script-dev', get_template_directory_uri() . '/assets/js/script.js', false, filemtime(get_stylesheet_directory() . '/assets/js/script.js'), true);
        wp_register_script('script-frontpage-dev', get_template_directory_uri() . '/assets/js/script-frontpage.js', false, filemtime(get_stylesheet_directory() . '/assets/js/script.js'), true);

        // Deregister scripts
        wp_deregister_style('style');
        wp_deregister_script('script-frontpage');
        wp_deregister_script('script');

        // Register devleopment scripts
        wp_enqueue_style('style-dev');
        wp_enqueue_script('script-frontpage-dev');
        wp_enqueue_script('script-dev');
    }
    // NOTICE - Above scripts will ONLY called in Devlopment Environment
}
add_action('wp_enqueue_scripts', 'website_scripts');
