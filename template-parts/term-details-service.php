<div class="row mt-lg-5">
    <div class="col-md-12">
        <?php
        $i = 0;
        $animation_classes = ['fadeInLeft', 'fadeInUp', 'fadeInRight', 'fadeInLeft', 'fadeInUp', 'fadeInRight', 'fadeInLeft', 'fadeInUp', 'fadeInRight'];

        $services = get_terms(array(
            'taxonomy' => 'service',
            'hide_empty' => false,
        ));

        if (!empty($services)) :
            echo '<div id="services_slider" class="owl-carousel">';
            foreach ($services as $service) :
                $service_name = $service->name;
                $service_description = $service->description;        

                // echo '<pre>';
                // print_r($service);
                ?>
                <div class="item wow <?php echo $animation_classes[$i]; ?>">
                    <div class="feature-box">
                        <h4 class="gradient-text1">
                            <?php //echo '0'. $i + 1 . '. ' . $service['name']; 
                                    ?>
                            <?php echo $service_name; ?>
                        </h4>
                        <p><?php echo $service_description; ?></p>
                    </div>
                </div>
        <?php
                $i++;
            endforeach;
            echo '</div>';
        endif;
        ?>

    </div>
</div>

<!--Slider Image-->
<div class="row laptop text-center">
    <div class="col-md-12">
        <div class="laptop-img wow fadeInUp">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/laptop-img.png" alt="laptop">
            <div id="laptop-slide" class="owl-carousel owl-theme">
                <?php
                foreach ($services as $service) {
                    // $service_image = get_term_meta($service->term_id, 'service_image', true);
                    // $service_image_id = $service['image'][0];
                    $service_image_id = get_term_meta($service->term_id, 'service_image', true);

                    if (!empty($service_image_id)) {
                        $image_attributes_full = wp_get_attachment_image_src($service_image_id, 'full')[0];
                    } else {
                        $image_attributes_full = get_stylesheet_directory_uri() . '/assets/images/485x305.png';
                    }
                    ?>
                    <div class="item">
                        <img src="<?php echo $image_attributes_full; ?>" alt="image">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>