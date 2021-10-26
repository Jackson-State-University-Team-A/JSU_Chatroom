<?php	
	echo '<div id="footer" >';
	echo '<div id="colophon" >';
	echo '<div id="bottom_nav">';
    wp_nav_menu( array('theme_location' => 'secondary' , 'container_class' => 'menu-footer' )); 
	echo '</div>';
	echo '<div id="copyright">';	
	if (get_theme_mod('facebook_link') || get_theme_mod('twitter_link') || get_theme_mod('linkedin_link') != '') {
		echo '<div id="social">';
		echo '<p>';
		_e('Follow Us', 'chatroom');
		echo '</p>';
		if( get_theme_mod( 'facebook_link' ) != '') { ?>
			<a href="<?php echo get_theme_mod('facebook_link'); ?>" >
        		<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/facebook_64.png" alt="Facebook" />
        	</a>
		<?php } 
		if( get_theme_mod( 'twitter_link' ) != '') { ?>
        	<a href="<?php echo get_theme_mod('twitter_link'); ?>" >
				<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/twitter_64.png" alt="twitter" />
            </a>
		<?php } 
		if( get_theme_mod( 'linkedin_link' ) != '') { ?>
        	<a href="<?php echo get_theme_mod('linkedin_link'); ?>" >
				<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/linkedin_64.png" alt="linkedin" />
			</a>
		<?php } 
		echo '</div>';
		}
	
	// Translators: 1 is the year, 2 is the site name.
 	printf( __( 'Copyright &#169; %1$s. %2$s. All Rights Reserved.',  'chatroom' ), date_i18n( 'Y' ), get_bloginfo( 'name' ) );  

	if (get_option( 'poweredby-option' ) == '') {
	}else {
		_e(' Powered by', 'chatroom'); 
		echo "<a href='http://www.allpraisemedia.com' title='ALL Praise Media' >";
		_e(' All Praise Media LLP', 'chatroom');
		echo "</a>";
	}
	echo '</div>';
	echo '</div>';
	
	//Menu will appear when users successfully log in
	if(is_user_logged_in()){

			if ( has_nav_menu( 'tertiary' ) ) {
			echo '<div class="usermenu" >';
			echo '<h3>';
			_e('User Menu', 'chatroom');
			echo '</h3>'; 
			wp_nav_menu( array( 'theme_location' => 'tertiary' ) );
			echo '</div>';
		}
	}
	echo '</div>';
	wp_footer();
?>
</body>
</html>
