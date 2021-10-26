<?php

	//Header
	get_header(); 
	
	//Main Content
	echo '<div id="container">';
	echo '<div id="content">';
	get_template_part( 'loop', 'index' );
	echo '</div>';
	
	//Sidebar
	if (get_option( 'sidebar-option' ) == 'true') {
		get_sidebar();
	}
	
	//End Main Content
	echo '</div>';
	
	//Footer
	get_footer(); 
 ?>
