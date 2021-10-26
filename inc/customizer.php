<?php
/****************************************
 * Theme Customizer	     
 ****************************************/

//Adds the individual sections, settings, and controls to the theme customizer
function chatroom_customize_register( $wp_customize ) {
	
	//Search Option
    // Add settings for output description
    $wp_customize->add_setting( 'search-option', array(
        'default'    		=> '',
        'type'       		=> 'option',
		'sanitize_callback' => 'chatroom_sanitize_checkbox',
    	) 
	);

    // Add control and output for select field
    $wp_customize->add_control( 'search-option', array(
        'label'      => __( 'Search Option', 'chatroom' ),
        'section'    => 'title_tagline',
        'settings'   => 'search-option',
        'type'       => 'checkbox',
    	) 
	);	
	
	//Powered By
    // Add settings for output description
    $wp_customize->add_setting( 'poweredby-option', array(
        'default'    		=> 'true',
        'type'       		=> 'option',
		'sanitize_callback' => 'chatroom_sanitize_checkbox',
    	) 
	);

    // Add control and output for select field
    $wp_customize->add_control( 'poweredby-option', array(
        'label'      => __( 'Display Powered by?', 'chatroom' ),
        'section'    => 'title_tagline',
        'settings'   => 'poweredby-option',
        'type'       => 'checkbox',
    	) 
	);	
	
	//Widgets Bar
    // Add settings for output description
    $wp_customize->add_setting( 'sidebar-option', array(
        'default'    		=> '',
        'type'       		=> 'option',
		'sanitize_callback' => 'chatroom_sanitize_checkbox',
    	) 
	);

    // Add control and output for select field
    $wp_customize->add_control( 'sidebar-option', array(
        'label'      => __( 'Add sidebar to posts pages?', 'chatroom' ),
        'section'    => 'title_tagline',
        'settings'   => 'sidebar-option',
        'type'       => 'checkbox',
    	) 
	);	
	
	//Foreground Color Customizer
	$wp_customize->add_setting(
    	'foreground-color',
    	array(
        	'default' 			=> '#0101ff',
			'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control(
        	$wp_customize,
        	'foreground-color',
        	array(
            	'label'    => __('Foreground Color', 'chatroom'),
            	'section'  => 'colors',
            	'settings' => 'foreground-color'
        	)
   		)
	);
	
	//Border Color Customizer
	$wp_customize->add_setting(
    	'border-color',
    	array(
        	'default'           => '#FF8000',
			'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control(
        	$wp_customize,
        	'border-color',
        	array(
            	'label'    => __('Border Color', 'chatroom'),
            	'section'  => 'colors',
            	'settings' => 'border-color'
        	)
   		)
	);
	
	//Menu Font Color Customizer
	$wp_customize->add_setting(
    	'headerfont-color',
    	array(
        	'default'           => '#ff0000',
			'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control(
        	$wp_customize,
        	'headerfont-color',
        	array(
            	'label'    => __('Menu Font Color', 'chatroom'),
            	'section'  => 'colors',
            	'settings' => 'headerfont-color'
        	)
   		)
	);
	
	//Body Background Color
	$wp_customize->add_setting(
    	'bodybackground-color',
    	array(
        	'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control(
        	$wp_customize,
        	'bodybackground-color',
        	array(
            	'label'    => __('Body Background Color', 'chatroom'),
            	'section'  => 'colors',
            	'settings' => 'bodybackground-color'
        	)
   		)
	);
		
	//Follow US Customizer
    $wp_customize->add_section(
		'followus_settings', 
		array(
			'title' => __('Follow Us Settings', 'chatroom'),
        	'description' => __('Enter in the URL for the corresponding social media sites. Blank entries will not be displayed.','chatroom'),
        	'priority'    => 55,
        )
    );
	
	$wp_customize->add_setting(
		'facebook_link', 
		array(
        	'default' 			=> '',
			'sanitize_callback' => 'chatroom_sanitize_text',
    	)
	);
	
	$wp_customize->add_control(
		'facebook_link', 
		array(
        	'label' => __('Facebook Fan Page URL','chatroom'),
        	'section' => 'followus_settings',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
		'twitter_link', 
		array(
        	'default' 			=> '',
			'sanitize_callback' => 'chatroom_sanitize_text',
    	)
	);
	
	$wp_customize->add_control(
		'twitter_link', 
		array(
        	'label' => __('Twitter Page URL','chatroom'),
        	'section' => 'followus_settings',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
		'linkedin_link', 
		array(
        	'default' 			=> '',
			'sanitize_callback' => 'chatroom_sanitize_text',
    	)
	);
	
	$wp_customize->add_control(
		'linkedin_link', 
		array(
        	'label' => __('LinkedIn Page URL','chatroom'),
        	'section' => 'followus_settings',
        	'type' => 'text',
    	)
	);	
}
add_action( 'customize_register', 'chatroom_customize_register' );

/****************************************
 * Sanitization Functions
 ****************************************/
function chatroom_sanitize_checkbox( $input ) {
    if ( $input == 'true' ) {
        return 'true';
    } else {
        return '';
    }
}

function chatroom_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/****************************************
 * Customizer CSS
 ****************************************/
function chatroom_customize_css(){
?>
	<style type="text/css">
		#title, #bannerright, .continue a:link, #reply-title, .widget-title,
		.widgettitle, .displaysearch {
			background-color: <?php if (get_theme_mod('border-color') == ''){
				echo ('#FF8000');
			}else{
				echo esc_html(get_theme_mod('border-color')); 
			}?>;
		}
		.continue a:link, #reply-title {
			border: 2px solid <?php if (get_theme_mod('border-color') == ''){
				echo ('#FF8000');
			}else{
				echo esc_html(get_theme_mod('border-color')); 
			}?>;;
			box-shadow: 1px 1px 3px <?php if (get_theme_mod('border-color') == ''){
				echo ('#FF8000');
			}else{
				echo esc_html(get_theme_mod('border-color')); 
			}?>;
		}
		#access .menu a:active, #access .menu a:visited, #access .menu a:link,
    	.menu-header a:active, .menu-header a:visited, .menu-header a:link, 
		hr, #access {
			color:<?php if (get_theme_mod('headerfont-color') == '') {
				echo ('#ff0000');
			} else {		
    			echo esc_html(get_theme_mod('headerfont-color'));
			} ?>;
		}
        hr  {
			background-color:<?php if (get_theme_mod('headerfont-color') == '') {
				echo ('#ff0000');
			} else { 
    			echo esc_html(get_theme_mod('headerfont-color'));
			}?>
		}	
		.bloginfotext {
			text-shadow:2px 2px 2px <?php if (get_theme_mod('headerfont-color') == '') { 
				echo ('#ff0000');
			} else {
				echo esc_html(get_theme_mod('headerfont-color'));
			} ?>
		}
		.usermenu, #colophon, #header {
			background-color:<?php if (get_theme_mod('foreground-color') == '') {
				echo ('#0101ff');
			} else {
				echo esc_html(get_theme_mod('foreground-color'));
			} ?>;
		}
		#headtop a:link, #headtop a:visited, #headtop a:active {
			color:#<?php echo header_textcolor() ?>;
		}	
		#access, #main {
			background-color:<?php if (get_theme_mod('bodybackground-color') == ''){
				echo ('#fff');
			}else{
				echo esc_html(get_theme_mod('bodybackground-color')); 
			}?>;
		}
		<?php if (get_option( 'sidebar-option' ) == 'true') {?>
			#content {
				width: 60%; 
				float:left;
			}
		<?php } ?>
		<?php 	if ( ! is_front_page() && get_option( 'sidebar-option' ) == 'true') { ?>
			#right {
				width: 60%; 
				float:left;
			}
		<?php } ?>
		<?php if (display_header_text() == '') {?>
			.bloginfotext {
				text-indent: -9999px;
			}
		<?php } ?>				
	</style>
<?php
}
add_action( 'wp_head', 'chatroom_customize_css');
 

