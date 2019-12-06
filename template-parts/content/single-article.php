<?php
while (have_posts()) : the_post();
    ?>
    <article class="col-sm-12" id="page-content">
        <div class="row">
            <div class="col-sm-12 mb-5 hover-effect blog-detail-img">
                <?php website_post_thumbnail(); ?>
            </div>
            <div class="col-lg-8 mb-lg-0 mb-5 mb-xs-5">
                <!--blog contetn-->
                <div class="blog-item-content">
                    <div class="content-text">
                        <?php website_entry_header(); ?>
                        <h4 class="mt-2 mb-4">
                            <a href="<?php esc_url(get_permalink()) ?>" rel="bookmark">
                                <?php the_title() ?>
                            </a>
                        </h4>
                        <div class="mb-4">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <div class="blog-detail-nav">
                        <?php
                            previous_post_link('%link', __('Previous Article ', 'website'), true);
                            next_post_link('%link', __('Next Article ', 'website'), true);
                            ?>
                    </div>

                    <?php website_entry_footer(); ?>

                </div>
            </div>

            <aside class="col-lg-4">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </article>
<?php
endwhile;
?>