<?php 
/**
 *
 *  Category Grid basic
 *
* */
 ?>
 <?php 
 
	// get cat for archive
	$postId = $post->ID;
	$cat_id = get_queried_object_id();
	$category = get_the_category($postId);
			
?>
 <div class="cat-container blog-container container  <?php echo $category[0]->slug; ?>">
			
		<div class="blog-content row">

				<?php		
					global $wp_query;
					
			// get pagination for categories
			$display_count = 12;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$offset = ( $paged - 1 ) * $display_count;
			$offed = $offset + 1;
			
			
			$args = array(
					'posts_per_page' 	=>  $display_count,
					'paged' 			=> $paged,
					'offset'			=> $offed,
					'cat' 				=> $cat_id
			);
			
			
			$loop = new WP_Query($args);
			$temp_wp_query = $wp_query;
			$wp_query = null;
			$wp_query = $loop;
			
				if($loop-> have_posts() ) :  while($loop->have_posts()) : $loop->the_post(); ?>
						
								
		 
				<article  <?php post_class('post-content col-md-4 '); ?>>
					
			
					<figure class="post-thumb">
						
						<a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_post_thumbnail();?></a>
						
					</figure>
						
					<div class="blog-post">						
						
						<span class="blog-post-cat blog-post-meta <?php echo $category[0]->slug; ?>"><?php  get_category_link($category[0]->cat_ID); ?><?php the_category(', ');?></span><span class="read-time"><?php echo high_reading_time();?></span>		
						<h2 class="post-meta-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>				
						<span class="blog-post-date post-date small"><?php echo get_the_date(); ?></span>
					
					</div>		
			   

					
				</article>		


			<?php endwhile; ?>
					
			
				
			<?php endif; ?>
		
			</div>
			
			<?php $wp_query = $temp_wp_query; ?>
			<?php wp_reset_postdata(); ?>
			
			<div class="clear"></div>
			
			<nav class="page-nav container"> <?php high_posts_nav(); ?> </nav>
			
		</div>
	</div> <!-- this is the blog -->
		