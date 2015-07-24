<?php 
/*
*
* Add bootstrap slider in any page/post
* get_template_part('content', 'YOUR_POST_CATEGORY');       // change 'YOUR_POST_CATEGORY' with the category which you want to slide
*
*/

$slider_id = 'main-slider';         // Define the slider id
$loopCounter =1;                    // iniatilize the loop counter


$args = array(
            'category_name' => 'Slider',
            'posts_per_page' => 5
        );

$slider_query = new WP_Query ($args);

if($slider_query->have_posts()) : ?>
    <section class="container" id="image-slider">
        <div class="row">
            <div class="col col-xs-12 col-md-12 col-sm-12 col-lg-12">
                <div id="<?php echo $slider_id; ?>" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php while($slider_query->have_posts()) : $slider_query->the_post(); ?>
                            <li data-target='#<?php echo $slider_id; ?>' data-slide-to='<?php echo $loopCounter; ?>' class='active'></li>;                            
                        <?php endwhile; ?>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php while ($slider_query->have_posts()) : $slider_query->the_post() ; ?>
                            <?php
                                if ($loopCounter == 1) {                // If first item of a loop is run then add active class
                                    echo "<div class='item active'>";
                                } else {
                                    echo "<div class='item'>";
                                }                                    
                            ?>
                            
                                <?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
                                    <div class="carousel-caption">
                                        <?php 
                                            the_title(); 
                                            echo $loopCounter;
                                        ?>
                                    </div>
                            </div>
                            <?php $loopCounter++; ?>
                            <?php endwhile; ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#<?php echo $slider_id; ?>" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#<?php echo $slider_id; ?>" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php
    endif;
    wp_reset_postdata();
?>
