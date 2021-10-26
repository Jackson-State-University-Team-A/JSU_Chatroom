<?php
/** 
 * Template Name: Search Page
*/  

	//Header
	get_header();

	echo '<div id="right">';
	
	echo '<h2>';
	printf( __( 'Search Results for: %s' ,'chatroom'), '<span>' . get_search_query() . '</span>');
	echo '</h2>';
	get_search_form();
	
	if ( have_posts() ) {
		get_template_part( 'loop', 'search' );
	} else {
		echo '<h3>';
		_e( 'Nothing Found', 'chatroom' ); 
		echo '</h3>';
		echo '<p>';
		_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'chatroom' );
		echo '</p>';
		
	}
	
	//End Main Content
	echo '</div>';	

	//Footer
	get_footer();	
?>