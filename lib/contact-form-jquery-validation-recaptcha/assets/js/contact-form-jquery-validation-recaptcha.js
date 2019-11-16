jQuery(document).ready(function($) {

    grecaptcha.ready(function() {
        var SITE_KEY = ajax_obj.site_key;                // fetch value from ajax_obj setup with 'wp_localize_script'

        grecaptcha.execute(SITE_KEY, {action: 'contact_form'}).then(function(token) {
            
            jQuery('#hidden-field').append('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
    
            $("#contact-form").validate({

                // rules
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        phoneUS: true
                    },
                    website: {
                        url: true
                    },
                    msg: {
                        required: true,
                    }
                },             
                // rules
                
                submitHandler: function(form) {
                    event.preventDefault();

                    var nonce = ajax_obj.nonce;
                    var recaptcha = token;
                    var name = $("#name").val();

                    dataPayload = {
                        action: 'contact_form_ajax_request_handler',
                        security: nonce,
                        recaptcha: recaptcha,
                        name : name,
                        // Put here other form fields
                        // ...
                        // ...
                    }

                    $.ajax({
                        type: "POST",                                              
                        dataType: "json",                                          
                        url: ajax_obj.ajaxurl, 
                        data: dataPayload,  

                        beforeSend: function(xhr) {
                            jQuery("#contact-form").html('<h4 class="text-info">Sending!</h4>');
                        },
                        success:function(result) {
                            // str = JSON.stringify(result.data);
                            // str = JSON.stringify(result, null, 4);
                            // console.log("result => " + str);

                            if(result.status == 1) {                    // Success
                                jQuery("#contact-form").html('<h4 class="text-success">' + result.msg + '</h4>');
                                window.setTimeout(function() {          // Redirect after 5 sec    
                                    window.location.href = 'http://www.google.com';
                                }, 5000);
                            } else {                                    // Fails
                                jQuery("#contact-form").html('<h4 class="text-warning">' + result.msg + '</h4>');
                            }

                        },
                        error: function(errorThrown){
                            console.log(errorThrown);
                        }
                    });
                
                    }
            });
      
        });

    });
       
});