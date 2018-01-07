<?php
/*
 *
 *
 * Basic page content 
 *
 *
*/
?>
	<div id="page-content"  class="container page-container">
		<div class="row ">
		
			<h1 class="title"><?php the_title(); ?></h1>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ): the_post(); ?>

				<div class="entry">
				
					<?php the_content(); ?>
					
				</div>
				
			<?php endwhile; ?>
			<?php endif; ?>


			</article>

		</div>

	</div>