<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

if (!function_exists('website_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function website_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Posted on %s', 'post date', 'website'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if (!function_exists('website_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function website_posted_by()
	{
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'website'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if (!function_exists('website_entry_header')) :
	/**
	 * Prints HTML with meta information for the categories, date.
	 */
	function website_entry_header()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			$categories_list = get_the_category_list(esc_html__(', ', 'website'));

			if (is_singular()) :
				if ($categories_list) :
					printf('<span class="cat-links category third-color">' . esc_html__('%1$s', 'website') . '</span>', $categories_list); // WPCS: XSS OK.
				endif;

				echo ' - <span class="date">' . get_the_date('F j, Y', get_the_ID()) . '</span>';

			else :
				/* translators: used between list items, there is a space after the comma */
				if ($categories_list) {
					/* translators: 1: list of categories. */
					printf('Posted in <span class="cat-links category third-color tex">' . esc_html__('%1$s', 'website') . '</span>', $categories_list); // WPCS: XSS OK.
				}

				echo ' - <span class="date">' . get_the_date('F j, Y', get_the_ID()) . '</span>';

			endif;
		}
	}
endif;

if (!function_exists('website_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function website_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'website'));

			if (is_singular()) :
				?>

				<div class="blog-detail-tag">
					<?php if ($tags_list) :
										printf('<span class="tags-links btn btn-small btn-transparent-gray">' . esc_html__('%1$s', 'website') . '</span>', $tags_list); // WPCS: XSS OK.
									endif;
									?>

				</div>
<?php

			else :
				/* translators: used between list items, there is a space after the comma */
				if ($categories_list) {
					/* translators: 1: list of categories. */
					printf('<span class="cat-links category third-color tex">' . esc_html__('Posted in %1$s', 'website') . '</span>', $categories_list); // WPCS: XSS OK.
				}

				/* translators: used between list items, there is a space after the comma */
				if ($tags_list) {
					/* translators: 1: list of tags. */
					printf('<span class="tags-links date">' . esc_html__('Tagged %1$s', 'website') . '</span>', $tags_list); // WPCS: XSS OK.
				}
			endif;
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'website'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;

if (!function_exists('website_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function website_post_thumbnail()
	{
		if (post_password_required() || is_attachment()) {
			return;
		}

		$img_class = 'rounded mx-auto d-block img-fluid';
		// get images size from DB
		$thumbnail_img_h =  get_option('thumbnail_size_h');
		$thumbnail_img_w =  get_option('thumbnail_size_w');
		$medium_img_h =  get_option('medium_size_h');
		$medium_img_w =  get_option('medium_size_w');
		$large_img_h =  get_option('large_size_h');
		$large_img_w =  get_option('large_size_w');
		$image_size = $thumbnail_img_w . 'x' . $thumbnail_img_h;	// define default image size

		if (is_singular()) {
			$image_size = $large_img_w . 'x' . $large_img_h;
		} elseif (is_archive() || is_author() || is_category() || is_home() || is_tag() && 'post' == get_post_type()) {
			$image_size = $medium_img_w . 'x' . $medium_img_h;
		}

		if (!has_post_thumbnail()) :
			echo '<div class="post-thumbnail pb-3">';
			echo '<img src="https://via.placeholder.com/' . $image_size . '.png?text=' . get_the_title() . '" alt="' . get_the_title() . '" class="' . $img_class . '">';
			echo '</div>';
		elseif (is_singular()) :
			echo '<div class="post-thumbnail pb-3">';
			the_post_thumbnail('post-thumbnail', array(
				'alt' => the_title_attribute(array(
					'echo' => false,
				)),
				'class' => $img_class				// Thumbnail class
			));
			echo '</div>';
		else :
			echo '<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">';
			the_post_thumbnail('post-thumbnail', array(
				'alt' => the_title_attribute(array(
					'echo' => false,
				)),
				'class' => 'blog-item-img mb-5 hover-effect img-fluid'				// Thumbnail class
			));
			echo '</a>';
		endif;
	}
endif;


if (!function_exists('wp_bootstrap_pagination')) :
	// ref - https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
	function wp_bootstrap_pagination(\WP_Query $wp_query = null, $echo = true)
	{
		if (null === $wp_query) {
			global $wp_query;
		}
		$pages = paginate_links(
			[
				'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
				'format'       => '?paged=%#%',
				'current'      => max(1, get_query_var('paged')),
				'total'        => $wp_query->max_num_pages,
				'type'         => 'array',
				'show_all'     => false,
				'end_size'     => 3,
				'mid_size'     => 1,
				'prev_next'    => true,
				'prev_text'    => __('« Prev'),
				'next_text'    => __('Next »'),
				'add_args'     => false,
				'add_fragment' => ''
			]
		);
		if (is_array($pages)) {
			//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
			$pagination = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';
			foreach ($pages as $page) {
				$pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
			}
			$pagination .= '</ul></nav>';
			if ($echo) {
				echo $pagination;
			} else {
				return $pagination;
			}
		}
		return null;
	}

endif;

if (!function_exists('wp_bootstrap_breadcrumb')) :
	function wp_bootstrap_breadcrumb()
	{
		echo '<ol class="breadcrumb bg-transparent">';
		if (!is_front_page() || is_home()) {
			echo '<li class="breadcrumb-item">You are here</li>';
			echo '<li class="breadcrumb-item"><a href="';
			echo get_option('home');
			echo '">';
			echo 'Home';
			echo "</a></li>";
			echo '<li class="breadcrumb-item"><a href="';
			echo get_option('home') . '/blog/';
			echo '">';
			echo 'Blog';
			echo "</a></li>";
			if (is_category() || is_single()) {
				echo '<li class="breadcrumb-item">';
				the_category(' </li><li class="breadcrumb-item"> ');
				if (is_single()) {
					echo "</li><li class='breadcrumb-item active'>";
					the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				echo '<li class="breadcrumb-item">';
				echo the_title();
				echo '</li>';
			}
		} elseif (is_tag()) {
			single_tag_title();
		} elseif (is_day()) {
			echo "<li class='breadcrumb-item'>Archive for ";
			the_time('F jS, Y');
			echo '</li>';
		} elseif (is_month()) {
			echo "<li class='breadcrumb-item'>Archive for ";
			the_time('F, Y');
			echo '</li>';
		} elseif (is_year()) {
			echo "<li class='breadcrumb-item'>Archive for ";
			the_time('Y');
			echo '</li>';
		} elseif (is_author()) {
			echo "<li class='breadcrumb-item'>Author Archive";
			echo '</li>';
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			echo "<li>Blog Archives";
			echo '</li>';
		} elseif (is_search()) {
			echo "<li class='breadcrumb-item'>Search Results";
			echo '</li>';
		}
		echo '</ol>';
	}
endif;
