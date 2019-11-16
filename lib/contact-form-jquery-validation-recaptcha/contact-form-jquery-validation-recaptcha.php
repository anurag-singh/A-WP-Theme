<?php
$site_key = '';
$secret   = '';
// Copy the config.php.dist file to config.php and update it with your keys to run the examples
// Register reCAPTCHA v3 keys here - https://www.google.com/recaptcha/admin/create
// Ref- https://developers.google.com/recaptcha/docs/v3
if ( $site_key == '' && is_readable( __DIR__ . '/recaptcha-keys.php' ) ) {
    $config   = include __DIR__ . '/recaptcha-keys.php';
    $site_key = $config['v3']['site'];
    $secret   = $config['v3']['secret'];
}

add_action('wp_enqueue_scripts', 'add_scripts_for_contact_form_repatcha');
function add_scripts_for_contact_form_repatcha()
{
    global $site_key;
    // Enqueue javascript on the frontend.
    wp_enqueue_script(
        'jquery.validate',
        '//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js',
        array('jquery'),
        null,
        true
    );
    wp_enqueue_script(
        'additional-methods',
        '//cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js',
        array('jquery.validate'),
        null,
        true
    );
    wp_enqueue_script(
        'google-recaptcha',
        '//www.google.com/recaptcha/api.js?render=' . $site_key ,
        array('jquery'),
        null,
        true
    );
    wp_enqueue_script(
        'contact-form-validation',
        get_template_directory_uri() . '/lib/contact-form-jquery-validation-recaptcha/assets/js/contact-form-jquery-validation-recaptcha.js',
        array('jquery.validate', 'additional-methods', 'google-recaptcha'),
        null,
        true
    );

    // The wp_localize_script allows us to output the ajax_url path for our script to use.
    wp_localize_script(
        'contact-form-validation',
        'ajax_obj',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),                                               // set ajaxurl
            'nonce' => wp_create_nonce('contact-form-nonce'),                                       // set nonce
            'site_key' => $site_key                                                                 // set nonce
        )
    );
}

add_shortcode('contact-form-recaptcha', 'render_contact_form_recaptcha');
function render_contact_form_recaptcha()
{
    $html = '<form id="contact-form">';
    $html .= '<div class="form-group">';
    $html .= '<input type="text" class="form-control" name="name" id="name" placeholder="*Name" required>';
    $html .= '</div>';
    $html .= '<div class="form-group">';
    $html .= '<input type="email" class="form-control" name="email" id="email" placeholder="*Email" required>';
    $html .= '</div>';
    $html .= '<div class="form-group">';
    $html .= '<input type="tel" class="form-control" name="phone" id="phone" placeholder="*Phone" required>';
    $html .='<small id="emailHelp" class="form-text text-muted">Format: +1-541-754-3010</small>';
    $html .= '</div>';
    $html .= '<div class="form-group">';
    $html .= '<input type="url" class="form-control" name="website" id="website" placeholder="Website Url">';
    $html .= '</div>';
    $html .= '<div class="form-group">';
    $html .= '<textarea class="form-control" name="msg" id="msg" rows="5" placeholder="Your Message" required></textarea>';
    $html .= '</div>';
    $html .= '<div id="hidden-field"></div>';
    $html .= '<div class="form-group">';
    $html .= '<button type="submit" class="btn btn-danger" id="submitcontact">Send</button>';
    $html .= '</div>';
    $html .= '</form>';   

    return $html;
}

// Ajax Request Handler
function contact_form_ajax_request_handler()
{
    global $secret;                                                          // make secret key available in this function
    $retrieved_nonce = $_REQUEST['security'];                               // get nonce

    if (wp_verify_nonce($retrieved_nonce, 'contact-form-nonce')) :          // verify nounce

        $name = $_REQUEST['name'];                                          // fetch var
        $recaptcha_response = $_POST['recaptcha'];

        $recaptcha_url      = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret   = $secret;
        // Make and decode POST request:
        $recaptcha_response        = file_get_contents( $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response );
        $google_recaptcha_response = json_decode( $recaptcha_response );
        if ( ! $google_recaptcha_response->success || empty( $google_recaptcha_response->success ) ) :
            $response = array(
                'status' => 0,
                'msg'    => 'Google reCAPTCHA verification failed.',
            );
        else:
            // Do our processing here
            // .....
            // Do our processing here        

            $response = array(
                'status' =>  1,
                'msg'   => 'Form submit successfully!',
                'data'  => array(
                    'name' => $name,
                    'recaptcha' => $recaptcha_response,
                )
            );
        endif;
    else :
        $response = array(
            'status' =>  0,
            'msg'   => 'Failed security check!',
        );
    endif;

    wp_send_json($response);
}

add_action('wp_ajax_contact_form_ajax_request_handler', 'contact_form_ajax_request_handler');
add_action('wp_ajax_nopriv_contact_form_ajax_request_handler', 'contact_form_ajax_request_handler');