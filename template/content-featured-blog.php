<?php 
/**
 *
 *  Content for featured are of Blog template Page
 *
 * 
 */
?>

	<div id="blog">
		<div class="container">
			<?php // set up loop for featured post
				
				$meta_arg = array(
					'posts_per_page' 	=> 1,
					'meta_key'       => 'high_feature', 
					'orderby'		=> 'meta_value_num',
				);

				$firstloop = new WP_Query($meta_arg);
		
			if($firstloop-> have_posts()): while($firstloop->have_posts()) : $firstloop->the_post();  
			 
				$category = get_the_category(); ?>		
		
				<div class="featured-content row">
					<div class="feature-wrap col">

						<figure class="feature-thumb">
							<a href="<?php echo get_permalink( $post->ID ); ?>">
								<?php the_post_thumbnail( 'feature-thumb', array('title' => get_the_title(), 'alt' => get_the_title()));?>
							</a>
						</figure>		
				
						<div class="featured-post">						
							<span class="feature-post-cat feature-post-meta <?php echo $category[0]->slug; ?>"><?php  get_category_link($category[0]->cat_ID); ?><?php the_category(', ');?></span>	<span class="read-time"><?php echo high_reading_time();?></span>	
							<h2 class="post-meta-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>				
							<span class="featured-post-date post-date small"><?php echo get_the_date(); ?></span>
						</div>						
						
					</div>
				</div>
		<?php 
			
			endwhile;
			
			endif; 
			
			wp_reset_postdata(); ?>
		</div>