window.onscroll = function() {
	scroll_counter()
}

function scroll_counter() {
	console.log("count - " + document.body.scrollTop)
	console.log("counts - " + document.documentElement.scrollTop)

	if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
		send_ajax_call()
		document.getElementById("myP").className = "test"
	} else {
		document.getElementById("myP").className = ""
	}
}

function send_ajax_call() {
	dataPayload = {
		action: "render_html_section",
		security: ajax_obj.nonce
	}

	// This does the ajax request
	$.ajax({
		type: "POST", // POST | GET | PUT
		dataType: "json", // json | html | text | xml | script | jsonp
		url: ajax_obj.ajaxurl, // ajax file path of website
		data: dataPayload, // form data

		beforeSend: function(xhr) {
			console.log("submitting")
			jQuery("#post-crud-form").html(
				'<h4 class="text-info">Submiting!</h4>'
			)
		},
		success: function(result) {
			jQuery("#post-crud-form").trigger("reset")
			str = JSON.stringify(result)
			str = JSON.stringify(result, null, 4)
			console.log("result => " + str)
			console.log("result.msg => " + result.msg)

			if (result.status == 1) {
				jQuery("#post-crud-form").html(
					'<h4 class="text-success">' + result.msg + "</h4>"
				)
			} else {
				jQuery("#post-crud-form").html(
					'<h4 class="text-warning">' + result.msg + "</h4>"
				)
			}
		},
		error: function(errorThrown) {
			console.log(errorThrown)
		}
	})
}
