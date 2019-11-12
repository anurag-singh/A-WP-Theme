<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
?>

	<section id="primary" class="container">
		<main id="main" class="row">
            
            <div class="col">              
                <div class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' ); ?></h1>
                    </header>
                    
                    <div class="page-content">
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentynineteen' ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>

		</main>
	</section>

<?php
get_footer();
