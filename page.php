<?php
/**
 * Template Name: Full-Page
*/  

	//Header
	get_header();
			
	//echo '<div id="right">';
	echo '<div id="container">';
	
	//Main Content

	if (have_posts()) : while (have_posts()) : the_post();
		if ( !is_front_page() ){
			echo '<h1>'; 
			the_title(); 
			echo '</h1>';
		}
		echo '<p>'; 
		the_content(__('(more...)','chatroom')); 
		'</p>';
	comments_template( '', true );
	endwhile; else:
	
	echo '<p>'; 
	_e( 'Sorry, no posts matched your criteria.', 'chatroom' ); 
	echo '</p>'; 
	
	endif;
	
	//End Main Content
	echo '</div>';

	//Footer
    get_footer(); 
?>