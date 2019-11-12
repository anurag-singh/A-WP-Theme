<?php
// Fetch menu items and render theme as per you need

$menu_name = 'Primary';
$primary_menu_item_arr = wp_get_nav_menu_items($menu_name, $args = array());

if (!empty($primary_menu_item_arr)) :
    ?>
    <div class="collapse navbar-collapse" id="wexim">
        <div class="navbar-nav w-100 alt-font">
            <?php
                foreach ($primary_menu_item_arr as $menu_item_obj) :
                    $item_title = $menu_item_obj->title;
                    $item_link = $menu_item_obj->url;
                    echo '<a class="nav-link scroll" href="' . $item_link . '">' . $item_title . '</a>';
                endforeach;
                ?>
            <span class="menu-line"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
        </div>
    </div>
<?php
endif;
?>