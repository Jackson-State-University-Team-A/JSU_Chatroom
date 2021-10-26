<?php

	get_header();
	
	echo '<div id="right">';
	chatroom_loop();
	echo '</div>';
	//Sidebar
	if (get_option( 'sidebar-option' ) == 'true' ) { 
		get_sidebar();
	}
	echo '</div>';
	//Footer
	get_footer(); 

?>