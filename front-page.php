<?php get_header(); ?>
<?php get_template_part( 'template-parts/page/front-page', 'carousel' ); ?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="marketing">
        <hr class="featurette-divider">
        <?php //get_template_part( 'template-parts/page/front-page', '3col-services' ); ?>
        <hr class="featurette-divider">
        <?php get_template_part( 'template-parts/page/front-page', 'half-image-half-text' ); ?>
        <?php get_template_part( 'template-parts/page/front-page', 'youtube-video' ); ?>
        <?php get_template_part( 'template-parts/page/front-page', 'client-testimonials' ); ?>
    </div>
    <?php get_footer(); ?>
