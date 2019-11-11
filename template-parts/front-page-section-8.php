<?php

/**
 * Template part for displaying a section of front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

as_debug();
?>


<!--Portfolio Start-->
<section class="mt-5 #section8">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="text-center text-success py-2">Engineering & Construction Management</h2>
				<p class="text-center py-2">Fulcrum offers a variety of Engineering & Construction Management services:</p>
			</div>

			<div class="card-deck">
				<?php
				for ($i = 1; $i < 5; $i++) :
					?>
					<div class="card border-0">
						<img src="https://www.frenviro.net/wp-content/uploads/2018/08/Residential-1.jpg" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h2 class="card-title text-success">Residential Construction</h2>

						</div>
					</div>
				<?php
				endfor;
				?>

			</div>
		</div>

</section>
<!--Portfolio end-->