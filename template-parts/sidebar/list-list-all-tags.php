<?php
    $tags = get_tags(array('get'=>'all'));

    // echo '<pre>';
    // print_r($tags);
?>
<div class="widget bg-light">
                    <h5 class="mb-4">Tags</h5>
                    <?php
                        if(! empty($tags) && is_array($tags) ):
                            echo '<ul class="list-unstyled blog-tags m-0">';
                        foreach($tags as $tag) :
                                    echo '<li><a href="/tag/' . $tag->slug . '/">' . $tag->name . '</a></li>';
                        endforeach;
                    echo '</ul>';
                        else :
                            echo '<p>No tag found!</p>';
                        endif;
                    ?>
				</div>