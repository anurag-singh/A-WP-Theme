<footer class="container-fluid">
    <div class="row pt-2">
        <div class="col-12">
            <?php 
            $menuArgs = array(
                        'menu' => 'footer',
                        'menu_class' => 'list-inline'
                        );
            wp_nav_menu($menuArgs);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
            </div>
        </div>
        <div class="col-4">
            <?php 
            $menuArgs = array(
                        'menu' => 'social',
                        'menu_class' => 'list-inline'
                        );
            wp_nav_menu($menuArgs);
            ?>
            <!-- <ul class="list-inline">
                <li class="list-inline-item"><a href="">a</a></li>
                <li class="list-inline-item"><a href="">b</a></li>
                <li class="list-inline-item">c</li>
                <li class="list-inline-item">d</li>
            </ul> -->
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-12">
            <p class="text-center">&copy; 2017 Company Name &middot;</p>
        </div>
        <div class="col-12">
            <p class="text-center">Developed by <a href="#">Developer Name</a></p>
        </div>
        <div class="col-12">
            <?php 
            $menuArgs = array(
                        'menu' => 'privacy',
                        'menu_class' => 'list-inline'
                        );
            wp_nav_menu($menuArgs);
            ?>
            <p class="float-right"><a href="#">Back to top</a></p>
        </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
