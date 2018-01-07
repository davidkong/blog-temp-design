<?php


// add default header and backgrounds
function high_header() {
	
	
	// defaults for header 
		$header = array(
					'default-image'          => get_template_directory_uri() . '/images/high-header.jpg',
					'random-default'         => false,
					'height'                 => 700,
					'flex-height'            => true,
					'flex-width'             => true,
					'default-text-color'     => '#fff',
					'header-text'            => true,
					'uploads'                => true,
					'wp-head-callback'       => 'high_header_style',
				);
		add_theme_support( "custom-header", $header );
		
		// background default
		$background = array(
					'default-color'          => '',
					'default-image'          => '',
					'wp-head-callback'       => '_custom_background_cb',
					'admin-head-callback'    => '',
					'admin-preview-callback' => ''
				);
		add_theme_support( "custom-background", $background );
		
		
}
add_action( 'after_setup_theme', 'high_header' );

// set header defaults
		if (! function_exists('high_header_style')) {
			function high_header_style(){
			$header_text_color = get_header_textcolor();
			$header_image = get_header_image();

				if ( $header_image ) : ?>
					<style type="text/css">
						header{
							background-image: url( <?php echo esc_url( $header_image ); ?>);
						}
					</style>
				<?php
				endif;
			}
		}
				
				
/***** Expand WordPress Customizer  ****/

add_action( 'customize_register', 'high_customize_register' );
function high_customize_register( $wp_customize ) {
	
	
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	
/** sections ****/
	
	
	// menu section
	$wp_customize->add_section( 'high_menu' , array(
		'title' => __( 'Menu Colors', 'frame-blog')
	) );
	
	// footer section
	$wp_customize->add_section( 'high_foot' , array(
		'title' => __( 'Footer', 'frame-blog')
	) );
	
	
/*** Settings ***/


	/*** site global color ****/
	// site title
	$textcolors[] = array(
		'slug' => 'high_site_title',
		'default' => '#2A273D',
		'label' => __( 'Site title', 'frame-blog' )
	);
	
	// site description
	$textcolors[] = array(
		'slug' => 'high_site_descript',
		'default' => '#2A273D',
		'label' => __( 'Site Description', 'frame-blog' )
	);
		
	//  text color
	$textcolors[] = array(
		'slug' => 'high_color1',
		'default' => '#2A273D',
		'label' => __( 'Basic Text Color', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	
	// secondary color 
	$textcolors[] = array(
		'slug' => 'high_color2',
		'default' => '#2A273D',
		'label' => __( 'Links', 'frame-blog' ),
		'transport'=>'postMessage' 
	);

	// post-page titles
	$textcolors[] = array(
		'slug' => 'high_color3',
		'default' => '#2A273D',
		'label' => __( 'Post and Page Titles', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	
	
	
	
	/**** Footer Colors ****/
	
	
	// footer text color
	$footcolors[] = array(
		'slug' => 'high_footer',
		'default' => '#000',
		'label' => __( 'Footer text color', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	

	// bg for footer
	$footcolors[] = array(
		'slug' => 'high_foot_bg',
		'default' => '#f6f6f6',
		'label' => __( 'Background Color for footer', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	
	
	/*** Menu Colors ***/
	
	
	//main nav background
	$menucolors[] = array(
		'slug' => 'high_menu_bg',
		'default' => '#fff',
		'label' => __( 'Main Nav Background', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	
	//main nav dropdown background
	$menucolors[] = array(
		'slug' => 'high_menu_sub_items',
		'default' => '#fff',
		'label' => __( 'Dropdown menu links', 'frame-blog' ),
		'transport'=>'postMessage' 
	);

	
	// color for nav links
	$menucolors[] = array(
		'slug' => 'high_menu_links',
		'default' => '#2A273D',
		'label' => __( 'Menu Items color', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	
	// nav hover 
	$menucolors[] = array(
		'slug' => 'high_menu_hover',
		'default' => '#2A273D',
		'label' => __( 'Menu Items Hover color', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	
		// nav hover 
	$menucolors[] = array(
		'slug' => 'high_menu_current',
		'default' => '#2A273D',
		'label' => __( 'Menu Items Current Item', 'frame-blog' ),
		'transport'=>'postMessage' 
	);
	

/**** Controls ****/
	
	
	// add color pickers
	
	/** main body text **/
	foreach ( $textcolors as $textcolor ) {
		
		// settings
		$wp_customize->add_setting(
			$textcolor[ 'slug' ], array (
				'default' => $textcolor[ 'default' ],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		// controls
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			$textcolor[ 'slug' ],
			array (
				'label' => $textcolor[ 'label' ],
				'section' => 'colors',
				'settings' => $textcolor[ 'slug' ]
			)
		));
	} // endforeach color
	
	
	// add settings and controls for menu
	foreach ( $menucolors as $menucolor ) {
		
		// settings
		$wp_customize->add_setting(
			$menucolor[ 'slug' ], array (
				'default' => $menucolor[ 'default' ],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		// controls
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			$menucolor[ 'slug' ],
			array (
				'label' => $menucolor[ 'label' ],
				'section' => 'high_menu',
				'settings' => $menucolor[ 'slug' ]
			)
		));
	} //endforeach menu
	
	
	// add settings and controls for footer
	foreach ( $footcolors as $footcolor ) {
		
		// settings
		$wp_customize->add_setting(
			$footcolor[ 'slug' ], array (
				'default' => $footcolor[ 'default' ],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		// controls
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			$footcolor[ 'slug' ],
			array (
				'label' => $footcolor[ 'label' ],
				'section' => 'high_foot',
				'settings' => $footcolor[ 'slug' ]
			)
		));
	} //endforeach menu
	
	
}  

// add color function to add styles to head
add_action( 'wp_head', 'high_add_color_scheme' );
function high_add_color_scheme() {
	$site_title			= get_option('high_site_title');
	$site_descrip		= get_option('high_site_descript');
	$color_scheme1 		= get_option( 'high_color1' );
	$color_scheme2 		= get_option( 'high_color2' );
	$color_scheme3 		= get_option( 'high_color3' );
	$foot_bg_color 		= get_option ( 'high_foot_bg' );
	$foot_text 			= get_option( 'high_footer' );
	$menu_color 		= get_option ( 'high_menu_links' );
	$menu_color2 		= get_option ( 'high_menu_hover' );
	$current_menu_item 	= get_option ( 'high_menu_current' );
	$menu_bg 			= get_option ( 'high_menu_bg' );
	$dropdown 			= get_option('high_menu_dropdown_bg');
	$dropdown_links 	= get_option('high_menu_sub_items');
	?>
	<style>
	/* links color */
		a:link,
		a:visited,
		.sidebar a:link,
		.sidebar a:visited {
			color: <?php echo $color_scheme2; ?>;
		}

	/* links hover color */
		.entry-content a:hover,
		.entry-content a:active,
		a:hover,
		a:active,
		.sidebar a:hover,
		.sidebar a:active {
			color: <?php echo $color_scheme2; ?>;
		}
	
		
	/* default body color */
		
		body,
		p{ color: <?php echo $color_scheme1; ?>; }
		
	/* headings */
		h1,
		h2,
		h2.page-title,
		h2.post-title,
		h3,
		h4,
		h5,
		h6{
			color: <?php echo $color_scheme3; ?>;
		}
		/* site title */
		.site-title a{
			color: <?php echo $site_title; ?>;
		}
		.site-description{
			color: <?php echo $site_descrip; ?>;
		}	
	
	/* Main Nav Color */	
		.nav-container{
			background-color: <?php echo $menu_bg; ?>;
		}
	
	/* navbar top links */
		ul.navbar-nav li a{
			color: <?php echo $menu_color; ?>
		}
		
		ul.navbar-nav li a:hover{
			color: <?php echo $menu_color2; ?>
		}
		
		ul.navbar-nav li.current-menu-item a,
		ul.navbar-nav li.current-menu-parent>a,
		ul.navbar-nav li.current-menu-ancestor>a{
			color: <?php echo $current_menu_item; ?>;
		}
		
	/** Dropdown menu **/
		.dropdown-menu{
			background-color: <?php echo $dropdown; ?>;
		}
		
		ul.dropdown-menu>li>a,
		ul.dropdown-menu>li>a:focus, 
		ul.dropdown-menu>li>a:hover{
			color: <?php echo $dropdown_links; ?>;
		}
		
		
	
	/* footer colors */
		footer#footer{
			background-color: <?php echo $foot_bg_color; ?>;
		}
		
		footer .foot-text{color: <?php echo $foot_text; ?>; }

	</style>
<?php }
