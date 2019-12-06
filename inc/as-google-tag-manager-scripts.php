<?php
// Add google tag manager (GTM) script after body opening tag
function add_GTM_after_head_tag()
{
    echo "<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W8MQD4V');</script>
    <!-- End Google Tag Manager -->";
}
add_action('wp_head', 'add_GTM_after_head_tag');

// Add google tag manager (GTM) script after body opening tag
function add_GTM_after_body_open_tag()
{
    echo '<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8MQD4V"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->';
}
add_action('wp_body_open', 'add_GTM_after_body_open_tag');
