<?php
$version;
// Enqueue javascript on the frontend.
if (isset($_REQUEST['dev'])  && $_REQUEST['dev'] == 1) {
    $version = rand(111, 999);
} else {
    $version = 1;
}

function load_scripts()
{
    global $version;
    wp_enqueue_script(
        'load-content-on-scroll',
        get_template_directory_uri() . '/lib/load-content-on-scroll/load-on-scroll.js',
        array('jquery'),
        $version,
        true
    );

    // The wp_localize_script allows us to output the ajax_url path for our script to use.
    wp_localize_script(
        'load-content-on-scroll',
        'ajax_obj',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),                       // set ajaxurl
            'nonce' => wp_create_nonce('load-content-on-scroll-nonce')              // set nonce
        )
    );
}


function render_html_section()
{
    $retrieved_nonce = $_REQUEST['security']; // get nonce

    if (wp_verify_nonce($retrieved_nonce, 'load-content-on-scroll-nonce')) : // verify nounce

        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];

        $postargs = array(
            // 'ID' => 39, // Pass post's ID to update the post data
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $post_id = wp_insert_post($postargs);

        if (!is_wp_error($post_id)) : // Post insert successfully
            $response = array(
                'status' => 1,
                'msg' => 'Form submit successfully!',
                'data' => array(
                    'ID' => $post_id,
                    'title' => $title,
                    'content' => $content,
                )
            );
        else : // Post not inserted
            $response = array(
                'status' => 0,
                'msg' => $post_id->get_error_message(),
            );
        endif;

    else : // Nonce not verified
        $response = array(
            'status' => 0,
            'msg' => 'Failed security check!',
        );
    endif;

    wp_send_json($response);
}

add_action('wp_enqueue_scripts', 'load_scripts');

add_action('wp_ajax_load_html_section', 'render_html_section');

//    If you wanted to also use the function for non-logged in users (in a theme for example)
add_action('wp_ajax_nopriv_load_html_section', 'render_html_section');
