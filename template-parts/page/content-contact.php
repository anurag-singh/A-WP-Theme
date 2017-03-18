<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class=" container-fluid entry-header mb-4">
            <div class="row">
                <div class="col">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php twentyseventeen_edit_link( get_the_ID() ); ?>
                </div>
            </div>
        </header>
        <!-- .entry-header -->
        <div class="container entry-content">
            <div class="row">
                <div class="col-7">
                	<?php the_content(); ?>
                    <style>
                    #map {
                        width: 100%;
                        height: 400px;
                        background-color: grey;
                    }
                    </style>
                    <div id="map"></div>
                    <script>
                    function initMap() {
                        var uluru = {
                            lat: -25.363,
                            lng: 131.044
                        };
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 4,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                    }
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp-uIB3ZncxVN3j1Bph-7fhFjLkhici8Q&callback=initMap">
                    </script>
                    
                </div>
                <div class="col-5">
                    <?php 
					echo do_shortcode('[contact-form-7 id="47" title="Primary Contact Form"]');
				?>
                </div>
            </div>
        </div>
        <!-- .entry-content -->
    </article>
    <!-- #post-## -->
