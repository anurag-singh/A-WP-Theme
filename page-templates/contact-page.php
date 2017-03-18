<?php 
/*
* Template Name: Contact
*/
 ?>

 <?php get_header(); ?>

<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/page/content', 'contact' );

	endwhile; // End of the loop.
?>

 <?php get_footer(); ?>