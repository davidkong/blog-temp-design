<?php //The template for displaying front page content ?>

	<div id="content" class="front-content page-content">
		<div class="post">
		
			<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>

			<div class="entry">

				<?php the_content(); ?>			
			</div>
				<?php endwhile; ?>
				<?php endif; ?>
		</div> <!-- end of posts -->
		
	</div> <!-- end of front page content -->
	<?php get_sidebar(); ?>