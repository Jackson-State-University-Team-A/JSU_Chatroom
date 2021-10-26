<?php

//Used to set the width of images and content. Should be equal to the width the theme
//is designed for, generally via the style.css stylesheet.
if ( ! isset( $content_width ) ) $content_width = 976;

function chatroom_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	load_theme_textdomain('chatroom');
	
	//Adding Theme Support
	add_theme_support( 'title-tag' );
	
	//Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'chatroom_setup' );

	//Custom header is an image that is chosen as the representative image in the theme top header section.
	//http://codex.wordpress.org/Custom_Headers
	$headerdefaults = array(
		'default-image'          => get_template_directory_uri() . '/images/headers/blueflower.jpg',
		'width'                  => 940, 
		'height'                 => 198,
		'flex-height'            => false,
		'flex-width'             => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,  //Header Text Modification
		'default-text-color'     => 'FFF', //Header Text Color
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		);
	add_theme_support( 'custom-header', $headerdefaults );

	set_post_thumbnail_size( $headerdefaults['width'], $headerdefaults['height'], true );
	
	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'blueflower' => array(
			'url' => '%s/images/headers/blueflower.jpg',
			'thumbnail_url' => '%s/images/headers/blueflower-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Blue Flower', 'chatroom' )
		),
		'flower' => array(
			'url' => '%s/images/headers/flower.jpg',
			'thumbnail_url' => '%s/images/headers/flower-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Flower', 'chatroom' )
		),
		'raindrops' => array(
			'url' => '%s/images/headers/raindrops.jpg',
			'thumbnail_url' => '%s/images/headers/raindrops-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Rain Drops', 'chatroom' )
		),
		'blueprints' => array(
			'url' => '%s/images/headers/blueprints.jpg',
			'thumbnail_url' => '%s/images/headers/blueprints-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Blueprints', 'chatroom' )
		),
		'bahamasresort' => array(
			'url' => '%s/images/headers/bahamasresort.jpg',
			'thumbnail_url' => '%s/images/headers/bahamasresort-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Bahamas Resort', 'chatroom' )
		),
		'atlanticsunset' => array(
			'url' => '%s/images/headers/atlanticsunset.jpg',
			'thumbnail_url' => '%s/images/headers/atlanticsunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Atlantic Sunset', 'chatroom' )
		),
		'pond' => array(
			'url' => '%s/images/headers/pond.jpg',
			'thumbnail_url' => '%s/images/headers/pond-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Pond', 'chatroom' )
		)
	) );

	//Custom Backgrounds is a theme feature that provides for customization of the background color and image. 
	//http://codex.wordpress.org/Custom_Backgrounds
	$backgrounddefaults = array(
		'default-color'          => 'F1F1F1', //Background Color
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
		);
	add_theme_support( 'custom-background', $backgrounddefaults );
	
/****************************************
 * Enqueue scripts and styles	     
 ****************************************/

function chatroom_enqueue_style() { 
		// Load our main stylesheet.
	    wp_enqueue_style( 'chatroom-style', get_stylesheet_uri() );
		wp_enqueue_style( 'chatroom-menu', esc_url( get_template_directory_uri() ) . '/css/menu.css', false );
		wp_enqueue_style( 'chatroom-advanced', esc_url( get_template_directory_uri() ) . '/css/advanced.css', false );
	}

function chatroom_enqueue_script() {
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'jquery-ui-core');
		wp_enqueue_script( 'jquery-effects-core');
		wp_enqueue_script( 'chatroom-search', esc_url( get_template_directory_uri() ) . '/js/search.js', false );	 
		wp_enqueue_script( 'chatroom-copypaste', esc_url( get_template_directory_uri() ) . '/js/copypaste.js', false );
}

add_action( 'wp_enqueue_scripts', 'chatroom_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'chatroom_enqueue_script' );

/****************************************
 * Includes	     
 ****************************************/
require get_template_directory() . '/inc/customizer.php';

/****************************************
 * Wordpress Title	     
 ****************************************/

function chatroom_wp_title( $title )
{
  	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    	return ( bloginfo('name') );
  	} else {
	  	return ( bloginfo('name') . ' | ' . get_the_title() ); 
  	}
  	return $title;
}
add_filter( 'wp_title', 'chatroom_wp_title' );

/****************************************
 * Wordpress Search	     
 ****************************************/
 if ( ! function_exists( 'chatroom_postinfo' ) ) :

function chatroom_postinfo() {	
	
	echo '<p>';
	// Translators: 1 is the post author, 2 is the post date.
 	printf( __( 'Written by %1$s on %2$s', 'chatroom' ), get_the_author(),
 	get_the_date() );
	echo '</p>';

}
endif;
 
/****************************************
 * Wordpress Comments    
 ****************************************/
 
if ( ! function_exists( 'chatroom_comment' ) ) {
	function chatroom_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) {
		case '' :
			
			echo '<li '; 
			comment_class(); 
			echo ' id="li-comment-';
			comment_ID();
			echo '">';
           
			echo '<div class="comment-author vcard">';
			echo get_avatar( $comment, 40 ); 
			printf( __( '%s <span class="says">says:</span>' , 'chatroom'), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );
			echo '</div>';
			if ( $comment->comment_approved == '0' ) { 
				echo '<em>';
				_e( 'Your comment is awaiting moderation.', 'chatroom'); 
				echo '</em>';
				echo '<br />';
			}
			
			echo '<div class="comment-meta commentmetadata"><a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">';
			printf( __( '%1$s at %2$s', 'chatroom' ), get_comment_date(),  get_comment_time() ); 
			echo '</a>';
			edit_comment_link( __( '(Edit)','chatroom' ), ' ' );
			
			echo '</div>';
		
			echo '<div class="comment-body">';
			comment_text(); 
			echo '</div>';
		
			echo '<div class="reply">';
			comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 
			echo '</div>';
			
			break;
			
		case 'pingback'  :
		case 'trackback' :

			echo '<li class="post pingback">';
			echo '<p>';
			_e( 'Pingback:', 'chatroom' );
			comment_author_link();
			edit_comment_link( __('(Edit)','chatroom'), ' ' ); 
			echo '</p>';
	
		break;
		}
	}
}

/****************************************
 * Wordpress Single Post   
 ****************************************/
 
if ( ! function_exists( 'chatroom_loop' ) ) :
	function chatroom_loop() {	
 		echo '<h3>';
		the_title();
		echo '</h3>';
		echo '<p>';
		// Translators: 1 is the post author, 2 is the post date.
 		printf( __( 'Written by %1$s on %2$s', 'chatroom' ), get_the_author(),
 		get_the_date() );

		echo '</p>';	
		
		while ( have_posts() ) {
			the_post();	
			if ( is_archive() || is_search() ) {
				the_excerpt(); 
			} else { 
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>','chatroom') ); 
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:','chatroom'), 'after' => '</div>' ) ); 
			} 

		comments_template( '', true );
	}
}
endif;

/****************************************
 * Wordpress Sidebar  
 ****************************************/

function chatroom_widgets_init() {
	//Primary sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget', 'chatroom' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'chatroom' ),
	) ); 
 	//Second sidebar
 	register_sidebar( array(
		'name' => __( 'Secondary Widget', 'chatroom' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'Optional secondary widget that displays below the primary widget in sidebar.', 'chatroom' ),
	) );
}
add_action( 'widgets_init', 'chatroom_widgets_init' );

/****************************************
 * Theme Menu		     
 ****************************************/

function chatroom_setup_menu() { 
add_theme_support( 'menus' );

	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'chatroom' ),
		'secondary' => __( 'Secondary in footer', 'chatroom' ),
		'tertiary'  => __( 'Tertiary for logged in users', 'chatroom' ),
	) );
}
add_action( 'after_setup_theme', 'chatroom_setup_menu' );
?>