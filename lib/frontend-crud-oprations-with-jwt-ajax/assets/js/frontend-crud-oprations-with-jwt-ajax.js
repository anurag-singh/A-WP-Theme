jQuery(document).ready(function($) {
    // Get all posts
    $("#getAllPosts").click(function(){
        
        $.ajax({
            type: "GET",                                               // POST | GET | PUT
            dataType: "json",                                           // json | html | text | xml | script | jsonp
            url: 'http://localhost/wp/02/wp-json/wp/v2/posts/',       // ajax file path of website

            beforeSend: function(xhr) {
                jQuery("#posts").html('<h4 class="text-info">Processing!</h4>');
              },
            success:function(result) {
                // str = JSON.stringify(result);
                // str = JSON.stringify(result, null, 4);
                // console.log("result => " + str);
                // console.log("result.msg => " + result.msg);

                if(result) {
                    $("#posts").html('<ul id="posts-list"></ul>');
                    for(i in result){
                        var id = result[i].id;
                        var title = result[i].title.rendered;
                        var guid = result[i].guid.rendered;
    
                        $("#posts-list").append('<li><a href="' + guid + '">' + title + '</li>');
                    }
                }
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        }); 
    });

    // Get Token
    $("#getToken").click(function(){
        dataPayload = {
            username: 'admin',
            password: 'admin',
        }

        $.ajax({
            type: "POST",                                               // POST | GET | PUT
            dataType: "json",                                           // json | html | text | xml | script | jsonp
            url: 'http://a-wp-theme.com/wp-json/jwt-auth/v1/token/',       // ajax file path of website
            data: dataPayload,

            beforeSend: function(xhr) {
                jQuery("#posts").html('<h4 class="text-info">Processing!</h4>');
              },
            success:function(result) {
                // str = JSON.stringify(result);
                // str = JSON.stringify(result, null, 4);
                // console.log("result => " + str);

                if(result) {
                    document.cookie = 'jwtToken=' + result.token;                       // set JWT Token in cookie
                    if( result.token ) {
                        jQuery("#posts").html('<h4 class="text-info">Token fetched and set to cookie!</h4>');
                    } else {
                        jQuery("#posts").html('<h4 class="text-danger">Token not generated!</h4>');
                    }
                }

                setTimeout(function(){
                    jQuery('#posts').fadeOut('slow');
                }, 1000);
            },
            error: function(errorThrown){
                // console.log(errorThrown);
                // console.log('statusText - ' + errorThrown.statusText);
                console.log('message -> ' + errorThrown.responseJSON.message);

            }
        }); 
    });

    // Show post form
    $("#addPost").click(function(){
        $("#add-new-post").show();
    });
    
    // Add post
    $("#add-new-post").submit(function(){
        event.preventDefault();
        
        cookieName = 'jwtToken';
        var tokenArr = document.cookie.match('(^|;) ?' + cookieName + '=([^;]*)(;|$)');                 // Fetch JWT token from cookie 
        var token = tokenArr[2];                                                                      
                    
        dataPayload = {
            title: jQuery("#postTitle").val(),
            content: $("#postContent").val(),
        }

        $.ajax({
            type: "POST",                                               // POST | GET | PUT
            dataType: "json",                                           // json | html | text | xml | script | jsonp
            url: 'http://a-wp-theme.com/wp-json/wp/v2/posts/',       // ajax file path of website
            data: dataPayload,
            headers: {
                'Authorization': `Bearer ${token}`,
            },

            beforeSend: function(xhr) {
                jQuery("#posts").html('<h4 class="text-info">Posting!</h4>');
            },
            
            success:function(result) {
                // str = JSON.stringify(result);
                // str = JSON.stringify(result, null, 4);
                // console.log("result => " + str);
                // console.log("result.msg => " + result.msg);
                
                if(result.id) {
                    jQuery("#posts").html('<h4 class="text-success">Post created successfully!</h4>');
                    document.getElementById("add-new-post").reset();
                    setTimeout(function(){
                        jQuery('#posts').fadeOut('slow');
                    }, 5000);
                } else {
                    jQuery("#posts").html('<h4 class="text-danger">Post not created.</h4>');
                }

            },
            error: function(errorThrown){
                jQuery("#posts").html('<h4 class="text-danger">' + errorThrown.responseJSON.message + '</h4>');
                console.log('statusText - ' + errorThrown.statusText);
                console.log('readyState - ' + errorThrown.readyState);
                console.log('status - ' + errorThrown.status);
                console.log('code - ' + errorThrown.responseJSON.code);
                console.log('message - ' + errorThrown.responseJSON.message);                
            }
        }); 
    });

});