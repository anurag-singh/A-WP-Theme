jQuery(window).scroll(function() {
	var header = $(document).scrollTop()
	var headerHeight = $("#site-header").outerHeight()
	var firstSection = $("main section:nth-of-type(1)").outerHeight()
	if (header > firstSection) {
		$("#site-header").addClass("fixed-top")
		$("main").addClass("pt-5 mt-2")
	} else {
		$("#site-header").removeClass("fixed-top")
		$("main").removeClass("pt-5 mt-2")
	}
	if (header > firstSection) {
		$("#site-header").addClass("in-view")
	} else {
		$("#site-header").removeClass("in-view")
	}
})

// Scroll to top
jQuery(document).ready(function() {
	// Set a variable for our button element.
	const scrollToTopButton = document.getElementById("scroll-to-top")

	// Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
	const scrollFunc = () => {
		// Get the current scroll value
		let y = window.scrollY

		// If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
		if (y > 0) {
			scrollToTopButton.className = "d-block"
		} else {
			scrollToTopButton.className = "d-none"
		}
	}

	window.addEventListener("scroll", scrollFunc)

	const scrollToTop = () => {
		// Let's set a variable for the number of pixels we are from the top of the document.
		const c = document.documentElement.scrollTop || document.body.scrollTop

		// If that number is greater than 0, we'll scroll back to 0, or the top of the document.
		// We'll also animate that scroll with requestAnimationFrame:
		// https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
		if (c > 0) {
			window.requestAnimationFrame(scrollToTop)
			// ScrollTo takes an x and a y coordinate.
			// Increase the '10' value to get a smoother/slower scroll!
			window.scrollTo(0, c - c / 10)
		}
	}

	// When the button is clicked, run our ScrolltoTop function above!
	scrollToTopButton.onclick = function(e) {
		e.preventDefault()
		scrollToTop()
	}
})
