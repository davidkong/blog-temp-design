<?php
/**
 * The template for displaying Category pages.
 *
 */
 ?>

 <?php get_header(); ?>
 
 <main class="cat-archive">

		<header class="archive-header container">
			<h5 class="cat-head">Category</h5>
			<h2 class="archive-title"><?php printf( single_cat_title( '', false ) ); ?></h2>
			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
		</header><!-- .archive-header -->

		<section class="category-grid">
			<?php get_template_part( 'template/content', 'cat' ); ?>
		</section>

<?php get_footer(); ?>