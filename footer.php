<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

as_debug();
?>
<section class="bg-success">
    <div class="container">
        <div class="row py-4">
            <div class="col text-white">
                <p>
                    Nationwide Locations Throughout US and Canada reach out to an experienced specialists near you
                </p>
            </div>
            <div class="col-2">
                <!-- <a href="#" class="btn btn-outline-light btn-lg">Subscribe</a> -->
                <?php echo do_shortcode('[modal-subscribe-form]'); ?>
            </div>
        </div>
    </div>
</section>
<!--Footer Start-->
<section class="bg-light text-center">
    <h2 class="d-none">hidden</h2>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h4>About</h4>
                <p>
                    The advancement into the information age of today’s society is forcing many businesses to drastically change. Although professionalism and efficiency are the keys to a well-practiced business, they are not enough.
                </p>
            </div>
            <div class="col-3">
                <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                </ul>
            </div>
            <div class="col-3">
            <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                </ul>
            </div>
            <div class="col-3">
            <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                    <li>Welcome</li>
                </ul>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                
                <p class="company-about fadeIn">© 2019 .</p>
                <p class="gradient-text1"><a href="/privacy-policy"><small>Privacy Policy</small></a></p>
            </div>
        </div>
    </div>
</section>
<!--Footer End-->

<!--Scroll Top-->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
<!--Scroll Top End-->

<?php wp_footer(); ?>

</body>

</html>