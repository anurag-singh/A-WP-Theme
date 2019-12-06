<main class="col-lg-8">
    <?php
    while (have_posts()) : the_post();
        ?>
        <article data-template="content" id="post-<?php the_ID(); ?>" class="blog-list-item">
            <?php website_post_thumbnail(); ?>

            <header class="entry-header">
                <?php
                    website_entry_header();

                    if (is_singular()) :
                        the_title('<h1 class="entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title mt-2 mb-3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;
                    ?>
            </header>

            <div class="entry-content mb-4">
                <?php
                    the_content(sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'website'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ));

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'website'),
                        'after'  => '</div>',
                    ));
                    ?>
            </div>

            <footer class="entry-footer">
                <?php website_entry_footer(); ?>
            </footer>

        </article>
    <?php
    endwhile;
    wp_bootstrap_pagination();
    ?>
</main>

<aside class="col-lg-4">
    <?php get_sidebar(); ?>
</aside>