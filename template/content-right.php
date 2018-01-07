<?php
/**
* Display Page Content with Right Sidebar
**/
?>

<?php the_post() ?>
<div class="row">

	<section class="page-copy">
	
		<div class="page-content col-md-8">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- end entry-header -->
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article><!-- end page content -->
			
		</div>
			
		<?php get_sidebar('right'); //get the sidebar ?>
			
	</section> 
	
</div><!-- main page -->

