<h1>single</h1>
<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section class="container">
	   	<div class="row">
	   		<section class="col-xs-12 col-md-12 col-sm-12 col-lg-12">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;

					// Previous/next post navigation.
					// the_post_navigation( array(
					// 	'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
					// 		'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					// 		'<span class="post-title">%title</span>',
					// 	'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					// 		'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					// 		'<span class="post-title">%title</span>',
					// ) );

				endwhile; ?>
			</section>
	   	</div>
	</section>   

<?php get_footer(); ?>
