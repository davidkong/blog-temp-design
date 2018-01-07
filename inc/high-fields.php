<?php
/***
	*
	*
	*
	* Add meta box checkboxes to posts to determin column 
	*
	*
	*
* * */
?>
<?php

// activate plugin
	if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/cmb2/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/CMB2/init.php';
	}


	 
add_action( 'cmb2_admin_init', 'high_post_col' );
function high_post_col() {
	
	$high_cmb = new_cmb2_box( array(
			'id'           => 'blog_col',
			'title'        => 'Blog Columns',
			'object_types' => array( 'post' ), // post type
			'context'      => 'normal', //  'normal', 'advanced', or 'side'
			'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
			'show_names'   => true, // Show field names on the left
		) );	

	$high_cmb->add_field( array(
		'name' => 'Two Columns',
		'desc' => 'Span two columns on blog page',
		'id'   => 'high_two_col',
		'type' => 'checkbox',
	) );

	$high_cmb->add_field( array(
		'name' => 'Three Columns',
		'desc' => 'Span all columns on blog page',
		'id'   => 'high_three_col',
		'type' => 'checkbox',
	) );

}


// adds selection for featured and/or popular posts
add_action( 'cmb2_admin_init', 'high_post_type' );
function high_post_type() {
	
	$high_post = new_cmb2_box( array(
			'id'           => 'post_att',
			'title'        => 'Post Placement',
			'object_types' => array( 'post' ), // post type
			'context'      => 'side', //  'normal', 'advanced', or 'side'
			'priority'     => 'default',  //  'high', 'core', 'default' or 'low'
			'show_names'   => true, // Show field names on the left
		) );	
	
	
	$high_post->add_field( array(
		'name' 		=> 'Feature Post',
		'desc' 		=> 'Check if you want this to be featured',
		'id'   		=> 'high_feature',
		'type' 		=> 'checkbox',
	) );
	
	
	$high_post->add_field( array(
		'name' 		=> 'Popular Post',
		'desc' 		=> 'Check if this is a popular post',
		'id'   		=> 'high_popular',
		'type' 		=> 'checkbox',
	) );

	$high_post->add_field( array(
		'name' 		=> 'Video Length',
		'desc' 		=> 'Enter Video time (in minutes)',
		'id'   		=> 'high_video',
		'type' 		=> 'text',
	) );

	$high_post->add_field( array(
		'name' 		=> 'Author\'s Feature Post',
		'desc' 		=> 'Check if you want show as featured post on author\'s profile',
		'id'   		=> 'high_f_author',
		'type' 		=> 'checkbox',
	) );
}

add_action( 'cmb2_admin_init', 'high_cta' );
function high_cta() {
	
	$high_cta  = new_cmb2_box( array(
			'id'           => 'high_cta',
			'title'        => 'Add Call To Action',
			'object_types' => array( 'post' ), 
			'context'      => 'side', 
			'priority'     => 'default',
			'show_names'   => true,
		) );	
	
	
	$high_cta->add_field( array(
		'name' 		=> 'Post CTA',
		'desc' 		=> 'Adds small CTA along side of post',
		'id'   		=> 'high_post_cta',
		'type' 		=> 'checkbox',
	) );
	
	

}