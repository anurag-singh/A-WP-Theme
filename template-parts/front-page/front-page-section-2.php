<?php

/**
 * Template part for displaying a section of front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
if( isset($_REQUEST['dev']) && (1 == $_REQUEST['dev']) ):
	show_file_path();
endif;
?>

<?php
$intro = new WP_Query(array('pagename' => 'introduction'));
if ($intro->have_posts()) :
	while ($intro->have_posts()) :
		$intro->the_post();

		$page_meta_data = get_post_meta(get_the_ID(), '', true);
		$section1 = unserialize($page_meta_data['section-1'][0]);
		?>

		<!--About Start-->
		<section id="about" class="#section-2 mt-5">
			<div class="container">
				<div class="row">
					<div class="col">
						<h2 class="py-4"><?php echo $section1['row-1']; ?></h2>
						<span class="bg-success" style="height:2px"></span>
						<h4 class="text-success"><?php echo $section1['row-2']; ?></h4>
						<p><?php echo $section1['row-3']; ?></p>
						<h2><?php echo $section1['row-4']; ?></h2>
						<p><?php echo $section1['row-5']; ?></p>
					</div>
					<div class="col">
						<?php
							$section_1_image_id = get_post_meta(get_the_ID(), 'section-1-media', true); //['image'][0];

							if (!empty($section_1_image_id)) {
								$image_url = wp_get_attachment_image_src($section_1_image_id, 'large')[0];
							} else {
								$image_url = 'https://via.placeholder.com/450x200';
							}

							echo '<img src="' . $image_url . '" alt="">';
						?>
					</div>
				</div>
			</div>
		</section>
		<!--About End-->

<?php
	endwhile;
	wp_reset_postdata();
endif;
?>