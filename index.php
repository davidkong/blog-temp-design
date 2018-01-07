<?php
/*
 *
 *
 * Main Index for Basic theme
 *
 *
*/
?>

<?php get_header(); ?>

	<main id="front-content">

	<?php if( is_home() && is_front_page()):
	
		get_template_part( 'template/content', 'featured-blog' ); 
	
		get_template_part( 'template/content', 'lower-blog' ); 

		else :
			get_template_part( 'template/content' );

		endif; ?>

	
<?php get_footer(); ?>