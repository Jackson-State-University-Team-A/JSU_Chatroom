<?php 
 // http://www.allpraisemedia.com
 // info@allpraisemedia.com
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php 
		/*
	 	* Always have wp_head() just before the closing </head>
	 	* tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
	 	* as styles, scripts, and meta tags.
	 	*/
		wp_head(); 
		
	?>
</head>
<body <?php body_class(); ?> >
<?php
	echo '<div id="wrapper">';
	echo '<div id="header">';
	echo '<div id="headtop" >';
    echo '<p>&nbsp;</p>';
    echo '<p class="bloginfotext">';
    ?>
	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	<?php 
	echo '</p>';
	echo '</div>';
	echo '<div id="access" >';
	echo '<div>';
    echo '<p class="bloginfotext2">';
	bloginfo( 'description' );
	echo '</p>';
	echo '</div>';
	echo '<div id="searchdiv">';
	if (get_option( 'search-option' ) == 'true' ) {
		//new addition for mobile use - JCT 1/8/2017
		if ( wp_is_mobile() ) { 
			echo '<div id="bannerright">';
			echo '<a href="javascript://" class="searchbar">';
			echo '<img src="'.esc_url( get_template_directory_uri() ) .'/images/icons/search-white.png">';
			echo '</a>';
			echo '</div>';
		} else {
			get_search_form();
			echo '<br />';
		}
	}  
	echo '</div>'; 
	wp_nav_menu( array( 'theme_location' => 'primary' , 'container_class' => 'menu-header' , 'menu' => '' ) ); 
    echo '<hr />';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '<div id="main">';
	//added change
	//if ( wp_is_mobile() ) {
	if (get_option( 'search-option' ) == 'true' ) {
		if ( wp_is_mobile() ) {
			echo '<div class="displaysearch">';
			get_search_form();
			echo '</div>';
		}
	}
	if ( is_home() || is_front_page()) {
		if ( get_header_image() ) {
			echo '<img src="';
			header_image();
			echo '" width="';
			echo get_custom_header()->width;
			echo '" height="';
			echo get_custom_header()->height;
			echo '" alt="" style="padding: 0 18px;"/>'; 
		} 
	}
?>
