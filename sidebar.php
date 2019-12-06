<!--right side-->
<!--search-->
<div class="widget d-flex bg-light p-2 mb-2">
    <input class="search" placeholder="Search.." type="text">
    <a href="javascript:void(0);" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
</div>

<!--recent post-->
<?php
get_template_part('template-parts/sidebar/list', 'recent-posts');
?>


<!--category-->
<?php
get_template_part('template-parts/sidebar/list', 'all-categories');
?>
<!--tags-->
<?php
get_template_part('template-parts/sidebar/list', 'all-tags');
?>