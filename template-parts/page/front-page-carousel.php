<?php 
$sliderArgs = array(
                        'post_type' => 'slider'
                        ,'posts_per_page' => 5
                    );
$sliderArr = new WP_Query($sliderArgs);

//as_debug($sliderArr);

if($sliderArr->have_posts()) : ?>
<div id="carouselSliders" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $loopCounter = 0; ?>
        <?php while($sliderArr->have_posts()) : $sliderArr->the_post(); ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $loopCounter; ?>"></li>
        <?php $loopCounter++; endwhile; ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php while($sliderArr->have_posts()) : $sliderArr->the_post(); ?>
        <div class="carousel-item">
            <?php if(has_post_thumbnail()) : the_post_thumbnail('full', array("class" => "d-block img-fluid")); endif; ?>
            <div class="carousel-caption d-none d-md-block">
                <?php the_title('<h3>', '</h3>'); ?>
                <?php the_content(); ?>
            </div>
            
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
