<?php 

function add_front_page_menu_item()
{
	add_menu_page("Front Page", "Front Page", "manage_options", "front-page", "front_page_settings_page", null, 99);
}

add_action("admin_menu", "add_front_page_menu_item");


function front_page_settings_page(){
	?>
	    <div class="wrap">
	    <h1>Front Page Options</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}


 ?>