<?php
// Get value from options table
$theme_options = get_option('front_page_settings');

// Get get values from our varriable
$features = $theme_options['front_page_features'];

//as_debug($theme_options);

// check if we get any value in array
if($features) : 

    // Set loopCounter to detect "even" and "odd"
    $loopCounter = 1;

    echo '<section class="container">';

        foreach ($features as $feature) :

            // check if its even
            if ($loopCounter % 2 == 0) :
                echo '<article class="row featurette one">';
                echo '<div class="col-md-6">';
                            echo '<h2 class="featurette-heading"><i class="fa '. $feature['icon'] .'" aria-hidden="true"></i> ' .$feature['title']. '</span></h2>';
                            echo '<p class="lead">' .$feature['description']. '</p>';
                echo '</div>';

                echo '<div class="col-md-6">';
                $image = reset($feature['image']);

                echo wp_get_attachment_image($image, 'large', "", array("class"=> "featurette-image img-fluid mx-auto"));
                echo '</div>';
                echo '</article>';
                echo '<hr class="featurette-divider">';
            else :
                echo '<article class="row featurette one">';
                echo '<div class="col-md-6">';
                $image = reset($feature['image']);

                echo wp_get_attachment_image($image, 'large', "", array("class"=> "featurette-image img-fluid mx-auto"));
                echo '</div>';

                echo '<div class="col-md-6">';
                            echo '<h2 class="featurette-heading"><i class="fa '. $feature['icon'] .'" aria-hidden="true"></i> ' .$feature['title']. '</span></h2>';
                            echo '<p class="lead">' .$feature['description']. '</p>';
                echo '</div>';
                echo '</article>';
                echo '<hr class="featurette-divider">';
            endif;
        
        $loopCounter++;
        endforeach;
    echo '</section>';
 endif; ?>