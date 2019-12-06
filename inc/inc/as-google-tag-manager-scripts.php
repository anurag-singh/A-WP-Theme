<?php
// Add google tag manager (GTM) script after body opening tag
function add_GTM_after_head_tag()
{
    echo "<!-- Google Tag Manager -->ADD CODE HERE
    <!-- End Google Tag Manager -->";
}
add_action('wp_head', 'add_GTM_after_head_tag');

// Add google tag manager (GTM) script after body opening tag
function add_GTM_after_body_open_tag()
{
    echo '<!-- Google Tag Manager (noscript) -->ADD CODE HERE<!-- End Google Tag Manager (noscript) -->';
}
add_action('wp_body_open', 'add_GTM_after_body_open_tag');
