<?php
function modal_ajax_enqueue()
{
    // Enqueue javascript on the frontend.
    wp_enqueue_script(
        'modal-ajax-script',
        get_template_directory_uri() . '/assets/js/modal-ajax.js',
        array('jquery')
    );

    // The wp_localize_script allows us to output the ajax_url path for our script to use.
    wp_localize_script(
        'modal-ajax-script',
        'ajax_obj',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce( 'subscribe-form-nonce' )
        )
    );
}
add_action('wp_enqueue_scripts', 'modal_ajax_enqueue');

add_shortcode('modal-subscribe-form', 'render_modal_subscription_form');

function render_modal_subscription_form()
{
    //  Model - Button
    $html = '<button type="button" class="btn btn-outline-light btn-lg" data-toggle="modal" data-target="#subscribeModal">Subscribe</button>';
    // $html = '<a class="btn btn-outline-light btn-lg" id="subscribeModal">Subscribse</a>';
    //  Model - Button

    //  Model - Body 
    $html .= '<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">';
    $html .= '<div class="modal-dialog" role="document">';
    $html .= '<div class="modal-content">';
    $html .= '<div class="modal-header">';
    $html .= '<h5 class="modal-title" id="subscribeModalLabel">Subscribe Our Newsletter</h5>';
    $html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    $html .= '<span aria-hidden="true">&times;</span>';
    $html .= '</button>';
    $html .= '</div>';
    $html .= '<div class="modal-body">';
    $html .= '<form id="subscribe-form">';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="subscriberName" class="col-form-label">Full Name:</label>';
    $html .= '<input type="text" class="form-control" id="subscriberName">';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="subscriberEmail" class="col-form-label">Email:</label>';
    $html .= '<input type="text" class="form-control" id="subscriberEmail">';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    $html .= '<div class="modal-footer">';
    $html .= '<button type="button" class="btn btn-primary" id="submitSubscription">Subscribe</button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    //  Model - Body

    return $html;
}

// Ajax Request Handler
function modal_ajax_request_handler() {
    check_ajax_referer( 'subscribe-form-nonce', 'security' );

    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
     
        $name = $_REQUEST['subscriberName'];
        $email = $_REQUEST['subscriberEmail'];
         
        // Let's take the data that was sent and do something with it
        // if ( $fruit == 'Banana' ) {
        //     $fruit = 'Apple';
        // }

        $response = array(
            'status'=>  1, 
            'msg'   => 'Form submit successfully!',
            'data'  => array(
                'name' => $name,
                'email' => $email,
            )
        );
     
        // Now we willll return it to the javascript function
        // Anything outputted will be returned in the response
        echo json_encode($response);
        exit;
        // wp_send_json($response);
         
        // If you're debugging, it might be useful to see what was sent in the $_REQUEST
        // print_r($_REQUEST);
     
    }
     
    // Always die in functions echoing ajax content
   die();
}
 
add_action( 'wp_ajax_modal_ajax_request_handler', 'modal_ajax_request_handler' );
 
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_modal_ajax_request_handler', 'modal_ajax_request_handler' );

// Ajax Request Handler
?>

<?php
add_shortcode('modal-contact-form', 'render_modal_contact_form');

function render_modal_contact_form()
{
    //  Model - Button
    $html = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactModal">Request a Quote</button>';
    //  Model - Button

    //  Model - Body 
    $html .= '<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">';
    $html .= '<div class="modal-dialog" role="document">';
    $html .= '<div class="modal-content">';
    $html .= '<div class="modal-header">';
    $html .= '<h5 class="modal-title" id="contactModalLabel">Get in touch with us</h5>';
    $html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    $html .= '<span aria-hidden="true">&times;</span>';
    $html .= '</button>';
    $html .= '</div>';
    $html .= '<div class="modal-body">';
    $html .= '<form>';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="first-name" class="col-form-label">First Name:</label>';
    $html .= '<input type="text" class="form-control" id="first-name">';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="last-name" class="col-form-label">Last Name:</label>';
    $html .= '<input type="text" class="form-control" id="last-name">';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="email" class="col-form-label">Email:</label>';
    $html .= '<input type="text" class="form-control" id="email">';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="reason">Services You are Interested in*</label>';
    $html .= '<select id="reason" class="form-control">';
    $html .= '<option selected>Choose...</option>';
    $html .= '<option>...</option>';
    $html .= '</select>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="message" class="col-form-label">Message:</label>';
    $html .= '<textarea class="form-control" id="message"></textarea>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    $html .= '<div class="modal-footer">';
    $html .= '<button type="button" class="btn btn-primary">Subscribe</button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    //  Model - Body

    return $html;
}
?>