<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * 
 */
?>

<main id="nada">
	<div class="container no-results-header">
		<h1 class="search-heading">No results.</h1>
	</div>

	<div class="container-fluid search-container ">
		<div class="container ">
			<div class="row">
					
			
				<h3> Read this instead</h3>
			
					<?php // set up loop for featured post
						
						$meta_arg = array(
							'posts_per_page' 	=> 1,
							'meta_key'       => 'high_feature', 
							'orderby'		=> 'meta_value_num',
						);

						$loop = new WP_Query($meta_arg);
				
					if($loop-> have_posts()): while($loop->have_posts()) : $loop->the_post();  
					 
						$category = get_the_category(); ?>		
		
				<div  class='post-content col-sm-12'>
					
					<figure class="post-thumb">
								
						<a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_post_thumbnail();?></a>
						
					</figure>
						
					<div class="blog-post">						
						
						<span class="blog-post-cat blog-post-meta <?php echo $category[0]->slug; ?>"><?php  get_category_link($category[0]->cat_ID); ?><?php the_category(', ');?></span><span class="read-time"><?php echo high_reading_time();?></span>		
						<h2 class="post-meta-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>				
						<span class="blog-post-date post-date small"><?php echo get_the_date(); ?></span>
					
					</div>		
				</div>	
			
				<?php 
					
					endwhile;
					
					endif; 
					
					wp_reset_postdata(); ?>
			
			</div>
		</div>
	</div>