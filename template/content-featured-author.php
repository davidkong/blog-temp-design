<?php 
/**
 *
 *  Content for featured are of Blog template Page
 *
 * 
 */
?>

			<?php // set up loop for featured post

				$author_id = get_the_author_meta( 'ID' ) ;
				$meta_arg = array(
					'posts_per_page' 	=> 1,
					'author'		=> $author_id,
					'meta_key'       => 'high_f_author', 
					'orderby'		=> 'meta_value_num',
				);

				$f_author = new WP_Query($meta_arg);
		
			if($f_author-> have_posts()): while($f_author->have_posts()) : $f_author->the_post();  
			 
				$category = get_the_category(); ?>		
		
				<div class="fauthor-content row">
					<div class="fauthorwrap col">
				
						<figure class="post-thumb">
									
							<a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_post_thumbnail();?></a>
							
						</figure>
							
						<div class="blog-post">						
							
							<span class="blog-post-cat blog-post-meta <?php echo $category[0]->slug; ?>"><?php  get_category_link($category[0]->cat_ID); ?><?php the_category(', ');?></span><span class="read-time"><?php echo high_reading_time();?></span>		
							<h2 class="post-meta-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>				
							<span class="blog-post-date post-date small"><?php echo get_the_date(); ?></span>
						
						</div>				
						
					</div>
				</div>
		<?php 
			
			endwhile;
			
			endif; 
			
			wp_reset_postdata(); ?>