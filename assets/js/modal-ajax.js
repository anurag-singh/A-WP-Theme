jQuery(document).ready(function($) {

    $("#submitSubscription").click(function(){
        
        // We'll pass this variable to the PHP function example_ajax_request
        var subscriberName = $("#subscriberName").val();
        var subscriberEmail = $("#subscriberEmail").val();
        
        // alert("Name: " + subscriberName + " | Email: " + subscriberEmail);
        // This does the ajax request
        $.ajax({
            url: ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
            data: {
                'action': 'modal_ajax_request_handler',
                'subscriberName' : subscriberName,
                'subscriberEmail' : subscriberEmail
            },
            success:function(result) {
                // This outputs the result of the ajax request
                str = JSON.stringify(result);
                str = JSON.stringify(result, null, 4);
                console.log("result => " + str);
                console.log("result.msg => " + result.msg);

                jQuery("#subscribe-form").html(result.status);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });  
    });          
});