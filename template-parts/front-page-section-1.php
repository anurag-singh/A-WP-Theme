<?php

/**
 * Template part for displaying a section of front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Orange_Melon_Studio
 */

as_debug();

$sliders = new WP_Query(array('post_type' => 'slider'));
if ($sliders->have_posts()) :
    $total_sliders = $sliders->post_count;
    ?>
    
    <div id="primaryCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
                for ($i = 1; $i <= $total_sliders; $i++) {
                    echo '<li data-target="#primaryCarousel" data-slide-to="' . $i . '"></li>';
                }
                ?>
        </ol>
        <!-- Indicators -->

        <!-- Sliders -->
        <div class="carousel-inner">
            <?php
                $loop_counter = 1;
                while ($sliders->have_posts()) :
                    $sliders->the_post();

                    $slider_image_id = get_post_meta(get_the_ID(), 'image', true); //['image'][0];

                    if (!empty($slider_image_id)) {
                        $image_url = wp_get_attachment_image_src($slider_image_id, 'full')[0];
                    } else {
                        $image_url = 'https://via.placeholder.com/450x200';
                    }

                    ?>

                <div class="carousel-item">
                    <img src="<?php echo $image_url; ?>" class="d-block w-100" alt="...">
                    
                    <!-- Caption -->
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo get_post_meta(get_the_ID(), 'row_1', true); ?></h5>
                        <p><?php echo get_post_meta(get_the_ID(), 'row_2', true); ?></p>
                    </div>
                    <!-- Caption -->

                </div>

            <?php
                    $loop_counter++;
                endwhile;
                wp_reset_postdata();
                ?>
        </div>
        <!-- Sliders -->

        <!-- Controls -->
        <a class="carousel-control-prev" href="#primaryCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#primaryCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!-- Controls -->

    </div>
<?php
endif;
