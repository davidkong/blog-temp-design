<?php

include( get_stylesheet_directory() . '/inc/wp-bootstrap-navwalker.php' );
include( get_stylesheet_directory() . '/inc/high-customizer.php' );
include( get_stylesheet_directory() . '/inc/high-fields.php' );
include( get_stylesheet_directory() . '/inc/high-shortcodes.php' );
include( get_stylesheet_directory() . '/inc/high-loop.php' );

// temporarily remove WP admin toolbar for dev work
add_filter('show_admin_bar', '__return_false');

// Setup frame-io Theme
add_action( 'after_setup_theme', 'high_name_setup' );
function high_name_setup() {
	// theme text domain
		load_theme_textdomain('frame-blog', get_template_directory() . '/languages');
		
	//add post format
		add_theme_support( 'post-formats', array('aside','gallery','link','image','quote','status','video','audi','chat'));
		
	//adds title in head
		add_theme_support( "title-tag" );
	
	// add feed
		add_theme_support( 'automatic-feed-links' );
		
	// add thumbnail
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'feature-thumb', 800, 450 );
		
	//register  menu option
		add_action( 'init', 'basic_high_register_menus' );
		
	//add logo 
		add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 140,
			'flex-width' => true,
			'flex-height' => true,
		) );
		
	// add editor styles 
		add_editor_style();
		
	// set content width
		if ( ! isset( $content_width ) ) $content_width = 1280;
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	}

	
// display logo 
	add_action( 'high_add_logo', 'high_display_logo' );
	function high_display_logo() {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			if($image){
				
				echo '<img class="high-logo" src="' . $image[0] . '" alt="' . esc_attr(get_bloginfo('name')) .'" title="' . esc_attr(get_bloginfo('name')) .'">';
				
			}
	}
	
// add body classes
add_filter( 'body_class', 'theme_body_classes' );
function theme_body_classes( $classes ) {
	if ( is_singular() && ! is_home()  )
		$classes[] = 'single';
	return $classes;
}

//  navigation menu
function basic_high_register_menus() {
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation','frame-blog'  ),
			'top' => __( 'Top Navigation','frame-blog'  ),
			'foot' => __( 'Foot Navigation','frame-blog'  ),
		) );
}	

// enqueue add custom scripts and styles if needed
add_action('wp_enqueue_scripts', 'high_scripts');
function high_scripts() {
	// styles
		
		wp_enqueue_style('fancybox-css', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.css');
		wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css');
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'high-style', get_stylesheet_uri() );
		
	// register enqueue scripts
		wp_enqueue_script( 'high-html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '3.7.3' );
		wp_script_add_data( 'high-html5', 'conditional', 'lt IE 9' );
		
			
		wp_enqueue_script('isotope',get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js',array('jquery'),null);
		wp_enqueue_script('bootstrap',get_template_directory_uri() . '/assets/js/bootstrap.min.js',array('jquery'),null, true);
		wp_enqueue_script('fancybox',get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js',array(),null,true);	
		wp_enqueue_script('high-filter',get_template_directory_uri() . '/assets/js/high-filter.js',array(),null,true);		
		wp_enqueue_script('high',get_template_directory_uri() . '/assets/js/high.js',array(),null,true);	
		
		if(is_single()){ 
			wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js'); 
			wp_enqueue_script( 'single-post', get_template_directory_uri() . '/assets/js/single-post.js', array(), false, true);
		}

		wp_enqueue_script( 'blog_cookies', get_template_directory_uri() . '/assets/js/blog_cookies.js'); 
		wp_enqueue_script( 'segment', get_template_directory_uri() . '/assets/js/segment.js'); 
		wp_enqueue_script( 'smooth', get_template_directory_uri() . '/assets/js/smooth.js', array('jquery')); 

			

			function blog_cookies() { echo '<script>
			function getCookie(name) {
			    var re = new RegExp(name + "=([^;]+)");
			    var value = re.exec(document.cookie);
			    return (value != null) ? unescape(value[1]) : null;
			  }

			// note: we started setting and incrementing this cookie in September 2017
			var viewCount = parseFloat(getCookie("viewed_article_count"));

			if (!viewCount) { viewCount = 1;
			} else { viewCount += 1; }

			document.cookie="viewed_article_count=" + viewCount + "; domain=.frame.io; expires=Thu, 18 Dec 2035 12:00:00 UTC; path=/";
				</script>'; } 
			add_action( 'wp_head', 'blog_cookies' );
	
		// fonts
		wp_add_inline_style('dashicons','.dashicons { font-size:inherit; line-height:inherit; display:inline-table; }');
		

		// add WordPress ajax
		wp_localize_script( 'high-filter', 'highfilter', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
}

// enqueue custom script for wordpress customizer
add_action( 'customize_preview_init', 'high_live_preview' );
function high_live_preview(){
	wp_enqueue_script( 
		  'live-preview',			//Give the script an ID
		  get_template_directory_uri().'/assets/js/live-preview.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);
}
	
if ( ! function_exists( 'high_user_profile' ) ) :

    function high_user_profile( $contactmethods ) {
        $contactmethods['twitter'] = __( 'Twitter (without the @)' );
        $contactmethods['linkedin'] = __( 'Linked In (user name only)' );
        $contactmethods['other'] = __( 'Other (user name only)' );

        return $contactmethods;
    }
    add_filter('user_contactmethods','high_user_profile', 10, 1);

endif;

// add sidebar and widget areas
add_action('widgets_init','high_sidebar');
function high_sidebar(){

		register_sidebar( array	(	
				'name'         => __( 'The Sidebar','frame-blog' ),		
				'id'           => 'sidebar',		
				'description'  => __( 'This is the sidebar.' ,'frame-blog'),		
				'before_widget' => '<div id="%1$s" class="widget %2$s">',		
				'after_widget'  => '</div>',		
				'before_title' => '<h3>',		
				'after_title'  => '</h3>',	
				)) ;
				
		register_sidebar( array	(	
				'name'         => __( 'The Left Sidebar','frame-blog' ),		
				'id'           => 'left_sidebar',		
				'description'  => __( 'This is the left sidebar.' ,'frame-blog'),		
				'before_widget' => '<div id="%1$s" class="widget %2$s">',		
				'after_widget'  => '</div>',		
				'before_title' => '<h3>',		
				'after_title'  => '</h3>',	
				)) ;
				
		register_sidebar( array	(	
				'name'         => __( 'The Left Foot Sidebar','frame-blog' ),		
				'id'           => 'lfoot_sidebar',		
				'description'  => __( 'This is the left sidebar for the footer.' ,'frame-blog'),		
				'before_widget' => '<div id="%1$s" class="widget %2$s">',		
				'after_widget'  => '</div>',		
				'before_title' => '<h3>',		
				'after_title'  => '</h3>',	
				)) ;
				
		register_sidebar( array	(	
				'name'         => __( 'The Right Foot Sidebar','frame-blog' ),		
				'id'           => 'rfoot_sidebar',		
				'description'  => __( 'This is the lright sidebar for the footer.' ,'frame-blog'),		
				'before_widget' => '<div id="%1$s" class="widget %2$s">',		
				'after_widget'  => '</div>',		
				'before_title' => '<h3>',		
				'after_title'  => '</h3>',	
				)) ;
}


// customize excerpts
add_filter( 'excerpt_length', 'high_excerpt_length', 999 );
function high_excerpt_length( $length ) {
	return 80;
}
	
add_filter( 'excerpt_more', 'high_more_excerpt' );
function high_more_excerpt( $more ) {
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '...read the rest of '. get_the_title('', '', false), 'frame-blog' ) . '</a>';
}

//add menu order to posts
add_action( 'admin_init', 'high_order' );

function high_order() 
{
    add_post_type_support( 'post', 'page-attributes' );
}

//  est reading time
function high_reading_time() {

    $post = get_post();
	$format = has_post_format('video');
	
	
	
	
	$video_time =  get_post_meta( get_the_ID(), 'high_video', true );
    $words = str_word_count( strip_tags( $post->post_content ) );
    $minutes = floor( $words / 120 );

	if($format){
		
		$estimated_time = $video_time . ' MIN WATCH';
		
	}else{
  
		$estimated_time = $minutes . ' MIN READ';
	}
    return $estimated_time;

}




// add page navigation  
	function high_posts_nav() {

		if( is_singular() )
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 4 ) <= $max ) {
			$links[] = $paged + 4;
			$links[] = $paged + 3;
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		elseif ( ( $paged + 3 ) <= $max ) {
			$links[] = $paged + 3;
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		
		elseif ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		echo '<div class="navigation"><ul>' . "\n";

		/**	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-long-arrow-left"></i>Previous') );


		
		/**	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) )
				echo '<li>...</li> ';
		}
		
		
		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}
		
		
		/**	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array(  - 1, $links ) )
				echo '<li>...</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ),$max );/**	Next Post Link */
		}

		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link('Next<i class="fa fa-long-arrow-right"></i>') );

		

		echo '</ul></div>' . "\n";

	}
add_filter( 'get_pagenum_link', 'user_trailingslashit' );
	
//some standard wordpress stuff for regular blog posts
function high_posted_on(){
	
	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
		);
		
	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) , 'frame-blog'),
		esc_attr( sprintf( __( 'View all posts by %s', 'frame-blog' ), get_the_author() ) ),
		get_the_author()
	);
	
	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'frame-blog' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'frame-blog' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'frame-blog' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
	
}


// add Full width CTA to loop


add_action('wp_ajax_high_cta', 'full_width_cta'); 
add_action('wp_ajax_nopriv_high_cta', 'full_width_cta');

function full_width_cta(){
	
	echo '</div></div>';
	echo '<div class="container-fluid"><div id="cta" class="cat-wrap clear"></div></div>';
	echo '<div class="container home-container"><div class="content row row-eq-height" style="margin-top: 3em;"><!-- open new row -->';
} 

// start david added
/* 
function resort_homepage_posts() {

	$args = array('post_status' => 'publish',
					'numberposts' => 9999); // todo should this be -1?
	$posts_array = get_posts($args);

	$thisRowSize = 0;
	$sortIndex = 0;

	$debug = 0; 
	$debugArray = array();
	$debugSorted = array();


	while (count($posts_array)) { 

		if ($thisRowSize == 3) { $thisRowSize = 0; } // reset if we're starting a new row
		if ($thisRowSize > 3) { die(var_dump("Error: row greater than 3!"));} // debug 

		$foundNextPost = false;
		$j = 0;
		while (!$foundNextPost) {
			if ($posts_array[$j] == NULL) { 
				$j++; 
				continue;
			} // we may have unset that post

			$postSize = get_post_size($posts_array[$j]);	

			if ($postSize <= 3 - $thisRowSize // it fits
				|| count($posts_array) < 4) { // we're at the end, where precise sorting doesn't matter

				$debug++;
				// if ($debug == 9) { die(var_dump($posts_array[$j]->post_title)); }

				// give it the next sort ID and remove it from the list of posts
				update_post_meta($posts_array[$j]->ID, 'homepage_sort', $sortIndex);
				array_push($debugSorted, $posts_array[$j]->post_title);
				$sortIndex += 1;
				unset($posts_array[$j]);
				$thisRowSize += $postSize;
				$foundNextPost = true; 

			}
			$j++;
		}	
	}
}
add_action( 'save_post', 'resort_homepage_posts' );

// helper function used by resort_homepage_posts
function get_post_size($post) {
	$postSize = 1;	
	if (get_post_meta( $post->ID, 'high_two_col', true)) {
		$postSize = 2;
	}
	if (get_post_meta( $post->ID, 'high_three_col', true)) {
		$postSize = 3;
	}
	if (get_post_meta( $post->ID, 'high_post_cta')) {
		$postSize += 1;
	}
	if ($postSize > 3) { $postSize = 3; }
	// todo: we need to figure out what to do if a 3-wide post has a CTA attached... maybe just disable that case.



	return $postSize;
} */

/* 
// change the args array in content-lower-blog.php to the following:
$args = array(
		'posts_per_page' 	=>  $display_count,
		'paged' 			=> $paged,
		'offset'			=> $offed,
		//'orderby'			=> 'menu_order',
		// start dk add
		'orderby'			=> 'meta_value_num',
		'meta_key'			=> 'homepage_sort',
		// end dk add	
		'order'				=> 'ASC' // dk changed
);
*/


				