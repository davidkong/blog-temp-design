<?php 
/**
  *
  *
  * Shotcodes for Frame-Blog theme
  *
  *
**/

?>
<?php


// add small cta box to single posts
add_shortcode( 'small_cta', 'small_cta' );
function small_cta() {

	$output = '';
	$output .= '<div class="post-single-cta" >';
	$output .= '<div class="single-cta-wrap">';
	$output .= '<span class="small cta-title">Don\'t Miss The Next Article</span>';
	$output .= '<h2>The best content delivered straight to your inbox</h2>';
	$output .=  '<input type="text" />';
	$output .= '</div></div>';
	
	return $output;
}




// add full width cta box to single posts
add_shortcode( 'full_cta', 'full_cta' );
function full_cta() {
	
	$output =  '';
	$output .= '</div></div></article></div><div class="container-fluid">';
	$output .= '<div id="cta" class="cat-wrap clear"></div>';
	$output .= '</div><div id="single-content"  class="container single-container"><div class="row">';
	$output .= '<article class="single-post-content" >';
	$output .= '<div class="entry-content">';
	
	return $output;
}

function info_box( $atts, $content = null ) {
		$output = '';
		$output .= '<div class="info-box large">';
		$output .= '<h4 class="box-opener">Collapse</h4>';
		$output .=  '<div class="info">' . $content . '</div>';
		$output .= '</div>';
		
		return $output;
}
add_shortcode( 'info_box', 'info_box' );