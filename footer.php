<footer class="bg-light mt-5">

    <div class="container">
        <div class="row py-3">
            <div class="col">
                <div class="site-info">
                    <?php $blog_info = get_bloginfo('name'); ?>
                    <?php if (!empty($blog_info)) : ?>

                        <ul class="list-inline mb-0" id="foot-print">
                            <li class="list-inline-item">
                                &copy;
                            </li>
                            <li class="list-inline-item">
                                <?php echo date("Y"); ?>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                            </li>
                            <li class="list-inline-item">
                                &#124;
                            </li>
                            <li class="list-inline-item">
                                All Rights Reserved
                            </li>
                        </ul>
                    <?php endif; ?>
                    <?php
                    if (function_exists('the_privacy_policy_link')) {
                        the_privacy_policy_link('', '<span role="separator" aria-hidden="true"></span>');
                    }
                    ?>
                    <?php if (has_nav_menu('footer')) : ?>
                        <nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'twentynineteen'); ?>">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer',
                                        'menu_class'     => 'footer-menu',
                                        'depth'          => 1,
                                    )
                                );
                                ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">

                <a id="scroll-to-top" href="javascript:void(0);">
                    <span class="fa-stack fa-fw">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fa fa-angle-up fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/footer/models'); ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>