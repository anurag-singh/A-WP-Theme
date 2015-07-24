<!DOCTYPE html>
<html>
<head>
	<title>Child</title>
	<?php wp_head(); ?>
</head>
<body>
	<header class="navbar navbar-default">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#vmr-main-navi">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>

					<?php if ( get_header_image() ) : ?>
					<div id="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
					</div>
					<?php endif; ?>
	            </div>
	            
	            <?php 
	            	$args = array(
	            				'theme_location' 	=> 'Primary Menu',	
	            				'menu'				=> 'Primary',
	            				'menu_class'      	=> 'nav navbar-nav navbar-right',
								'menu_id'         	=> 'primary-menu',
								'container'       	=> 'nav',
								'container_class' 	=> 'site-navigation',
	            			);
	            	wp_nav_menu( $args ); 
	            ?>           
	        </div>
	</header>
