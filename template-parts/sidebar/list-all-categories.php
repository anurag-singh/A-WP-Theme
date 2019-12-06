<?php
$categories = get_categories(array(
    'orderby' => 'name',
    'parent'  => 0
));
?>
<div class="widget bg-light">
    <h5 class="py-2  text-center">Category</h5>
    <?php
    if (!empty($categories) && is_array($categories)) :

        echo '<ul class="list-unstyled blog-category p-2">';
        foreach ($categories as $category) :
            echo '<li><a href="/category/' . $category->slug . '/" title="View all posts ' . $category->name . ' category" data-toggle="tooltip" data-placement="top">' . $category->name . '<span class="float-right">' . $category->category_count . '</span></a></li>';
        endforeach;
        echo '</ul>';

    else :
        echo '<p>No category found!</p>';
    endif;
    ?>
</div>