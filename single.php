<?php get_header(); ?>
	
	<main class="single-post-page">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		 
			<?php get_template_part( 'template/content', 'single' ); ?>
				
		<?php endwhile; // end of the loop. ?>
		
	
			
<?php get_footer(); ?>