jQuery(document).ready(function() {
	$(function() {
		// Enable tooltip on page
		$('[data-toggle="tooltip"]').tooltip()
	})

	// Typewriter effect
	//  ref - https://github.com/tameemsafi/typewriterjs
	const typewriter = new Typewriter("#typewriter", {
		// strings: ['A Full Stack Web Developer', 'Always tried to make things that make a difference.', 'In-short, I can convert your great business Idea into reality.'],
		autoStart: true,
		loop: true
	})

	typewriter
		.typeString("Full Stack Web Developer")
		.pauseFor(2500)
		.deleteAll()
		.typeString("Expertise as Frontend developer.")
		.pauseFor(1500)
		// .deleteChars(7)
		// deleteAll()
		.typeString(" HTML5 ")
		.pauseFor(2500)
		.typeString("| CSS3 ")
		.pauseFor(2500)
		.typeString("| Javascript ")
		.pauseFor(2500)
		.typeString("| JQuery ")
		.deleteAll()
		.typeString("Expertise as Backend developer.")
		.pauseFor(1500)
		.typeString(" PHP ")
		.pauseFor(2500)
		.typeString("| MySql ")
		.pauseFor(2500)
		.typeString("| Wordpress ")
		.pauseFor(2500)
		// .typeString('<strong>Wordpress Developer</strong>')
		// .pauseFor(2500)
		.start()

	// // Home page
	// jQuery(".carousel-indicators li:first").addClass("active") // add active in first child

	// jQuery(".carousel-inner div:first").addClass("active") // add active in first child
})
