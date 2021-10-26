<?php 
 
/* If there are no posts to display, such as an empty archive page */ 
	if ( ! have_posts() ) {
		echo '<div>';
		echo '<h1>' ;
		_e( 'Not Found', 'chatroom' );
		echo '</h1>';
		echo '<div>';
		echo '<p>';
		_e( 'Apologies, but no results were found for the requested archive.', 'chatroom' ); 
		echo '</p>';
		get_search_form();
		echo '</div>';
		echo '</div>';
	}
	
	while ( have_posts() ) { 
		the_post();
		if ( in_category( _x('gallery', 'gallery category slug','chatroom') ) ) {
			echo '<h2><a href="';
			the_permalink();
			echo '" title="' . printf( esc_attr__( 'Permalink to %s' ,'chatroom'), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">';
			the_title(); 
			echo '</a></h2>';
			
			chatroom_postinfo();
			
			}elseif ( in_category( _x('asides', 'asides category slug','chatroom') ) ) {
				echo '<div id="post'; 
				the_ID(); 
				echo '"';
				post_class();
				echo '>';
				
				if ( is_archive() || is_search() ) {
					the_excerpt(); 
					}else {
					the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>','chatroom') ); 
				}
				chatroom_postinfo(); 
			} else {
			
				echo '<div class="post">';
				echo '<h3>'; 
				the_title();
				echo '</h3>';
				   
				chatroom_postinfo();
				
				$get_custom_options =  wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id', true), '_wp_attachment_metadata', true);
				$image_url = $get_custom_options[0];
				
				echo '<a href="' .  esc_url($image_url) . '" class="thumb" rel="portfolio">' . the_post_thumbnail('blog_post_image') .'</a>';
	
				if ( is_archive() || is_search() ) {
					the_excerpt();
					} else {
						the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>','chatroom') ); 
						wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:','chatroom'), 'after' => '</div>' ) ); 
					} 
				//This template tag displays a link to the tag or tags a post belongs to. 
				//If no tags are associated with the current entry, nothing is displayed.
				// http://codex.wordpress.org/Function_Reference/the_tags
				the_tags( 'Tags: ', ', ', '<br />');
				echo '<p class="continue"><a href="';
				the_permalink(); 
				echo '">';
				_e('Continue Reading', 'chatroom');
				echo '</a></p>';
				
				echo '</div>';
				comments_template( '', true );
			}
		}
		if (  $wp_query->max_num_pages > 1 ) {
			echo '<div>';
			echo '<div>' . next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts','chatroom' ) ) . '</div>';
			echo '<div>' . previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>','chatroom') ) . '</div>';
			echo '</div>';
		}
?>