<?php

add_action('wp_enqueue_scripts', 'ajax_jwt_crud_enqueue');
function ajax_jwt_crud_enqueue()
{
    // Enqueue javascript on the frontend.
    wp_enqueue_script(
        'ajax-jwt-crud',
        get_template_directory_uri() . '/lib/frontend-crud-oprations-with-jwt-ajax/assets/js/frontend-crud-oprations-with-jwt-ajax.js',
        array('jquery'),
        null,
        true
    );

    // The wp_localize_script allows us to output the ajax_url path for our script to use.
    wp_localize_script(
        'ajax-jwt-crud',
        'ajax_obj',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),                       // set ajaxurl
            'nonce' => wp_create_nonce('ajax-jwt-nonce')              // set nonce
        )
    );
}

add_shortcode('wp-post-crud', 'render_post_crud_form');
function render_post_crud_form()
{
    $html = '';
    $html .= '<a class="btn btn-primary" id="getAllPosts">Get all posts</a>';
    $html .= '<a class="btn btn-primary" id="getToken">Get Token</a>';
    $html .= '<a class="btn btn-primary" id="addPost">Add a Post</a>';
    $html .= '<div class="container">';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div id="posts">';

    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';


// 
// 
// 
// 
// 
// 


    $html .= '<form id="add-new-post" style="display:none;">';
    // $html .= '<div class="row">';
    // $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="postTitle" class="col-form-label">Title:</label>';
    $html .= '<input type="text" class="form-control" id="postTitle" placeholder="Title" required>';
    $html .= '</div>';
    // $html .= '</div>';
    // $html .= '</div>';
    // $html .= '<div class="row">';
    // $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="postContent" class="col-form-label">Content:</label>';
    $html .= '<input type="text" class="form-control" id="postContent" placeholder="Content" required>';
    $html .= '</div>';
    // $html .= '</div>';
    // $html .= '</div>';
    $html .= '<button type="submit" class="btn btn-primary" id="submitPost">Submit</button>';
    $html .= '</form>';

    return $html;
}

function handler_post_crud_request()
{
    $retrieved_nonce = $_REQUEST['security'];                               // get nonce

    if (wp_verify_nonce($retrieved_nonce, 'ajax-jwt-nonce')) :              // verify nounce

        $title = $_REQUEST['title'];                                
        $content = $_REQUEST['content'];                              

        $postargs = array(
            // 'ID'            => 39,                                       // Pass post's ID to update the post data
            'post_title' => $title,
            'post_content' => $content,
            'post_status'   => 'publish',
            'post_author' => 1,
        );
        $post_id = wp_insert_post($postargs);

        if (!is_wp_error($post_id)) :                                       // Post insert successfully
            $response = array(
                'status' =>  1,
                'msg'   => 'Form submit successfully!',
                'data'  => array(
                    'ID'    => $post_id,
                    'title' => $title,
                    'content' => $content,
                )
            );
        else :                                                              // Post not inserted
            $response = array(
                'status' =>  0,
                'msg'   => $post_id->get_error_message(),
            );
        endif;

    else :                                                                  // Nonce not verified
        $response = array(
            'status' =>  0,
            'msg'   => 'Failed security check!',
        );
    endif;

    wp_send_json($response);
}

add_action('wp_ajax_handler_post_crud_request', 'handler_post_crud_request');

// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action('wp_ajax_nopriv_handler_post_crud_request', 'handler_post_crud_request');
