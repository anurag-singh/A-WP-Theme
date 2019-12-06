<?php
$recent_posts = wp_get_recent_posts(array(
    'numberposts' => 5, // Number of recent posts thumbnails to display
    'post_status' => 'publish' // Show only the published posts
));

?>
<div class="widget bg-light">
    <h5 class="py-2 text-center">Recent Posts</h5>

    <?php
    if (!empty($recent_posts) && is_array($recent_posts)) :
        foreach ($recent_posts as $post) :
            ?>
            <div class="card mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <?php if (has_post_thumbnail($post['ID'])) :
                                    echo get_the_post_thumbnail($post['ID'], 'thumbnail');
                                else :
                                    echo '<img src="https://via.placeholder.com/136x136.png?text=Dummy+Image" alt="image" class="img-fluid card-image">';
                                endif;
                                ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="<?php echo get_permalink($post['ID']) ?>" title="Click here to read full post" data-toggle="tooltip" data-placement="top">
                                    <?php echo $post['post_title'] ?>
                                </a>
                            </h6>
                            <p class="card-text">
                                <span class="date">
                                    <?php echo get_the_date('F j, Y', $post['ID']); ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    else :
        echo '<p>No post found!</p>';
    endif;
    ?>
</div>
<?php wp_reset_query(); ?>