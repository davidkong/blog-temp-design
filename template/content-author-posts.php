<?php
/***
	*
	*
	* Author Posts loop to get posts by author 
	*
	*
	*
***/
?>

<?php 
global $wp_query;
$curauth = $wp_query->get_queried_object();  // get current author
?>

	<div class="author-container container">
			
		<div class="author-content row">

			<h2 class="more-author"><?php echo $curauth->first_name . '  ' . $curauth->last_name; ?></h2>
				
				
			<?php		
			
				$args = array(
						'posts_per_page' 	=>  3,
						'author' 			=> $curauth->ID
				);
				
				$loop = new WP_Query($args);
				
					if($loop-> have_posts() ) :  while($loop->have_posts()) : $loop->the_post(); 
			?>
							
			<?php  $category = get_the_category(); ?>		
		 
				<article  class="post-content col-md-4">
						
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
		
			<?php wp_reset_postdata(); ?>
			
			
			<div class="clear"></div>
		</div>
	</div><!-- author container -->