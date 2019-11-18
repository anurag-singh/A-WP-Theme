<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<section class="bg-light">
    <div class="container">
        <div class="row py-4">
            
            <div class="col">
                <!-- <a href="#" class="btn btn-outline-light btn-lg">Subscribe</a> -->
                <?php echo do_shortcode('[wp-post-crud]'); ?>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

</body>

</html>