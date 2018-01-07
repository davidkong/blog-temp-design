<?php 
/****
	*
	*
	*
	*  Custom Author template for Fram Blog theme
	*
	*
	*
****/
?>


<?php get_header(); ?>

	<main id="author">

		<section class="author-content">
	
			<?php get_template_part( 'template/content', 'author' ); ?>
		
		</section><!-- author content -->
		
		<section class="more-posts">
		
			<?php get_template_part( 'template/content', 'author-posts' ); ?>
			
		</section><!-- more posts -->
	
		
	
<?php get_footer(); ?>