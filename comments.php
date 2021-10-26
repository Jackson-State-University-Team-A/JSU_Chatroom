<?php
	echo '<div id="comments">';
	if ( post_password_required() ) {
		echo '<p class="nopassword">';
		_e( 'This post is password protected. Enter the password to view any comments.', 'chatroom');
		echo '</p>';
		echo '</div>';
		return;
	}
	echo '</div>';
	if ( have_comments() || ! have_comments()) {
		
		echo '<h3 id="comments-title">';
		printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'chatroom' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>');
		echo '</h3>';
		
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			echo '<div>';
			echo '<div>';
			previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments','chatroom' ) );
			echo '</div>';
			echo '<div>';
			next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>','chatroom' ) );
			echo '</div>';
			echo '</div>';
		}
		echo '<ol>';
		wp_list_comments( array( 'callback' => 'chatroom_comment' ) );
		echo '</ol>';
		
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			echo '<div>';
			echo '<div>';
			previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments','chatroom') ); 
			echo '</div>';
			echo '<div>';
			next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>','chatroom') ); 
			echo '</div>';
			echo '</div>';
		} else { 
			if ( ! comments_open() ) {
				echo '<p class="nocomments">';
				_e( 'Comments are closed.', 'chatroom' );
				echo '</p>';
			}
		}
	}
	comment_form(); 
	