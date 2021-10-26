<?php
/*
 * Template Name: 404 Page Template
*/

	get_header();
			
	echo '<div id="right">';
	echo '<h2>';
	_e( 'We Are Sorry!', 'chatroom' ); 
	echo '</h2>';
	if ($searchbar == 'yes') {
		get_search_form();
	}
    echo '<h3>';
	_e( 'Error: 404', 'chatroom');
	echo '</h3>';
    echo '<p>';
	_e( 'Sorry, the page you requested may have been remove or deleted, 
		you may navigate the below links to go back to the home page or 
		you may contact us.', 'chatroom');
	echo '</p>';
	echo '<p>';
    echo '<ul>';
    echo '<li>';
	echo '<a href="' . esc_url(home_url()) . '">' . ( 'Back to homepage'); 
	echo '</a>';
	echo '</li>';
    echo '</ul>';
    echo '<p>';
	_e( 'Thank You!', 'chatroom'); 
	echo '<br />';
	_e( 'The Site Manager', 'chatroom'); 
	echo '</p>';
	echo '</div>';
	get_footer(); 
?>