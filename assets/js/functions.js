jQuery(document).ready(function() {
	// Add same class in each li
    jQuery('#menu-primary li a').each(function() {
        jQuery(this).attr("class", "nav-link");
    });

    jQuery('.list-inline li').each(function() {
    	jQuery(this).attr("class", "list-inline-item");
    });

    // Add "active" class in first element
    jQuery('#carouselTestimonials .carousel-inner div:first').addClass("active");
    jQuery("#carouselTestimonials .carousel-indicators li:first").addClass('active');
	
	jQuery('#carouselSliders .carousel-inner div:first').addClass("active");
    jQuery("#carouselSliders .carousel-indicators li:first").addClass('active');

    // 
	//    jQuery('#carouselSliders').carousel({
	//   interval: 3000
	// })

	// jQuery('#carouselTestimonials').carousel({
	//   interval: 500
	// })

});





