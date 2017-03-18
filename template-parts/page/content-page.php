<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class=" container-fluid entry-header mb-4">
		<div class="row">
			<div class="col">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php twentyseventeen_edit_link( get_the_ID() ); ?>
			</div>
		</div>
	</header><!-- .entry-header -->
	<div class="container entry-content">
		<div class="row">
			<div class="col-3 list-group">
				<h4>Pages</h4>

				<?php 
					$pageListArgs = array(
										'title_li' => false,
									);

					wp_list_pages($pageListArgs);
				?>
			</div>
			<div class="col-9">
				<?php 
					if(has_post_thumbnail()) : the_post_thumbnail('large', array("class" => "img-fluid mx-auto d-block img-thumbnail")); endif;
				 ?>
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
