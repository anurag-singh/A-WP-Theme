<?php 
$testimonialsArgs = array(
                        'post_type' => 'testimonial'
                        ,'posts_per_page' => 5
                    );
$testimonialArr = new WP_Query($testimonialsArgs);

//as_debug($testimonialArr);



if($testimonialArr->have_posts()) : ?>
<div id="carouselTestimonials" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <?php while($testimonialArr->have_posts()) : $testimonialArr->the_post(); ?>
        <div class="carousel-item">
            <!-- <div class="container"> -->
            <div class="align-self-center">
<?php // if(has_post_thumbnail()) : the_post_thumbnail('thumbnail', array("class" => "mx-auto d-block img-fluid")); endif; ?>

                
                
                <!-- <div class="row"> -->
                <div class="carousel-caption d-none d-md-block">
                    <?php if(has_post_thumbnail()) : the_post_thumbnail('thumbnail', array("class" => "mx-auto d-block img-fluid")); endif; ?>

                    <?php the_title('<h3>', '</h3>'); ?>
                    <?php the_content(); ?>
                </div>
                <!-- </div> -->
            </div>
            <!-- </div> -->
        </div>
        <?php endwhile; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php endif; ?>
