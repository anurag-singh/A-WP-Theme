<?php
// Get value from options table
$theme_options = get_option('front_page_settings');

// Get get values from our varriable
$youtubeVideo = $theme_options['front_page_video'];

//as_debug($youtubeVideo);

// check if we get any value in array
if(isset($youtubeVideo)) : 

    
    echo '<section class="container">';
                echo '<article class="row featurette one">';
                echo '<div class="col-md-7">';
                            echo '<h2 class="featurette-heading">' .$youtubeVideo['title']. '</span></h2>';
                            echo '<p class="lead">' .$youtubeVideo['description']. '</p>';
                            echo '<p class="lead">' .$youtubeVideo['link_text']. '</p>';
                            echo '<p class="lead">' .$youtubeVideo['link_url']. '</p>';
                echo '</div>';

                echo '<div class="col-md-5">';
                echo '<div class="embed-responsive embed-responsive-16by9">';
                echo '<iframe width="560" height="315" src="' .$youtubeVideo['youtube_video_link']. '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
                echo '</div>';
                echo '</article>';
                echo '<hr class="featurette-divider">';
    echo '</section>';
 endif; ?>