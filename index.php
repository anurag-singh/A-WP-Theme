<?php get_header(); ?>

<section class="container">
   	<div class="row">
   		<section class="col-lg-9" id="main-content">
			<?php 
				if(have_posts()) : while(have_posts()) : the_post();
					the_title();

					the_content();
				endwhile;	endif;	?>			    	
   		</section>

   		<aside class="col-lg-3" id="sidebar">
   			<?php get_sidebar(); ?>   			    	
   		</aside>
   	</div>
</section>   

<?php get_footer(); ?>
    	