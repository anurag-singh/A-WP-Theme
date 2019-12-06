<?php get_header(); ?>

<!-- Page Header -->
<main role="main">
	<section class="bg-transparent" id="page-head">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header class="entry-header text-primary pt-5">
						<?php
						if (is_singular()) :
							the_title('<h1 class="entry-title">', '</h1>');
						elseif (is_home()) :
							single_post_title('<h1 class="entry-title">', '</h1>');
						else :
							the_archive_title('<h1 class="entry-title">', '</h1>');
						endif;
						?>
					</header>
					<div class="page_nav">
						<?php wp_bootstrap_breadcrumb(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page Header End-->

	<!--Page Content-->
	<section class="container mt-4 shadow-sm py-3">
		<div class="row">
			<?php
			if (have_posts()) :
				if (is_singular()) :
					get_template_part('template-parts/content/single', 'article');
				else :
					get_template_part('template-parts/blog/list', 'posts');
				endif;
			else :
				get_template_part('template-parts/content', 'none');
			endif;
			?>
		</div>
	</section>
	<!--Page Content End-->
</main>
<?php
get_footer();
