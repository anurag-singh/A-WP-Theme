
	<article data-template="content" id="post-<?php the_ID(); ?>" class="blog-list-item" <?php //post_class(); 
																							?>>
		<?php website_post_thumbnail(); ?>

		<div class="blog-item-content">

			<header class="entry-header">
				<?php
				if ('post' === get_post_type()) :
					?>
					<span class="category third-color tex">
						<?php website_posted_by(); ?>
					</span><!-- .entry-meta -->
					<span class="date">
						<?php website_posted_on(); ?>
					</span><!-- .entry-meta -->
				<?php endif;
				if (is_singular()) :
					the_title('<h1 class="entry-title">', '</h1>');
				else :
					the_title('<h2 class="entry-title mt-2 mb-3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;
				?>
			</header><!-- .entry-header -->

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
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php website_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

	<!--pagination-->
	<!-- <ul class="blog-pagination p-0 list-unstyled text-center text-md-left">
					<li><a href="javascript:void(0);"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
					<li><a href="javascript:void(0);">1</a></li>
					<li class="active"><a href="javascript:void(0);">2</a></li>
					<li><a href="javascript:void(0);">3</a></li>
					<li><a href="javascript:void(0);">4</a></li>
					<li><a href="javascript:void(0);">5</a></li>
					<li><a href="javascript:void(0);">..</a></li>
					<li><a href="javascript:void(0);">10</a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				</ul> -->
