<?php
add_action('wp_enqueue_scripts', 'modal_ajax_enqueue');
function modal_ajax_enqueue()
{
    // Enqueue javascript on the frontend.
    if (isset($_REQUEST['dev'])  && $_REQUEST['dev'] == 1) {
        wp_enqueue_script(
            'modal-ajax-script',
            get_template_directory_uri() . '/assets/js/modal-ajax.js',
            array('jquery'),
            filemtime(get_stylesheet_directory() . '/assets/js/modal-ajax.js'),
            true
        );
    } else {
        wp_enqueue_script(
            'modal-ajax-script',
            get_template_directory_uri() . '/assets/js/modal-ajax.js',
            array('jquery'),
            null,
            true
        );
    }

    // The wp_localize_script allows us to output the ajax_url path for our script to use.
    wp_localize_script(
        'modal-ajax-script',
        'ajax_obj',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),                       // set ajaxurl
            'nonce' => wp_create_nonce('subscribe-form-nonce')              // set nonce
        )
    );
}

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
    $html .= '<form id="subscription-form">';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="subscriberName" class="col-form-label">Full Name:</label>';
    $html .= '<input type="text" class="form-control" id="subscriberName" placeholder="First Last" required>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<label for="subscriberEmail" class="col-form-label">Email:</label>';
    $html .= '<input type="email" class="form-control" id="subscriberEmail" placeholder="Email" required>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="row">';
    $html .= '<div class="col">';
    $html .= '<div class="form-group">';
    $html .= '<div class="form-check">';
    $html .= '<input type="checkbox" class="form-check-input" id="invalidCheck" required>';
    $html .= '<label for="invalidCheck" class="form-check-label">Agree to terms and conditions <a href="#" target="_blank">Here</a></label>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="modal-footer">';
    $html .= '<button type="submit" class="btn btn-primary" id="submitSubscription">Subscribe</button>';
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    //  Model - Body

    return $html;
}

// Ajax Request Handler
function modal_ajax_request_handler()
{
    $retrieved_nonce = $_REQUEST['security'];                               // get nonce

    if (!wp_verify_nonce($retrieved_nonce, 'subscribe-form-noncee')) :        // verify nounce

        $name = $_REQUEST['subscriberName'];                                // fetch var
        $email = $_REQUEST['subscriberEmail'];                              // fetch var

        // Let's take the data that was sent and do something with it

        $response = array(
            'status' =>  1,
            'msg'   => 'Form submit successfully!',
            'data'  => array(
                'name' => $name,
            )
        );
    else :
        $response = array(
            'status' =>  0,
            'msg'   => 'Failed security check!',
        );
    endif;

    wp_send_json($response);
}

add_action('wp_ajax_modal_ajax_request_handler', 'modal_ajax_request_handler');

// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action('wp_ajax_nopriv_modal_ajax_request_handler', 'modal_ajax_request_handler');

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