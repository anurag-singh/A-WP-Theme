jQuery(document).ready(function($) {

    $("#subscription-form").submit(function(){
        // We'll pass this variable to the PHP function example_ajax_request
        dataPayload = {
            action: 'modal_ajax_request_handler',
            security: ajax_obj.nonce,
            subscriberName : $("#subscriberName").val(),
            subscriberEmail : $("#subscriberEmail").val()
        }

        // alert("Name: " + subscriberName + " | Email: " + subscriberEmail);
        // This does the ajax request
        $.ajax({
            type: "POST",                                               // POST | GET | PUT
            dataType: "json",                                           // json | html | text | xml | script | jsonp
            url: ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
            data: dataPayload,  

            beforeSend: function(xhr) {
                jQuery("#subscription-form").html('<h4 class="text-info">Submiting!</h4>');
              },
            success:function(result) {
                // This outputs the result of the ajax request
                str = JSON.stringify(result);
                str = JSON.stringify(result, null, 4);
                console.log("result => " + str);
                console.log("result.msg => " + result.msg);

                if(result.status == 1) {
                    jQuery("#subscription-form").html('<h4 class="text-success">' + result.msg + '</h4>');
                } else {
                    jQuery("#subscription-form").html('<h4 class="text-warning">There is some issues in form submission.</h4>');
                }

            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });  
    });          
});