<?php 
/**
 *
 * Standard layout for lower section of blog template page
 *
 *  */
?>
	<div>
		<div id="filter">
				<a href="#" id="recent_posts" class="post-filter active"> Recent</a>
				  <span class="selected-posts"><span class="filter-background"></span></span> 
				 <a href="#" id="popular_posts" class="post-filter">Popular</a>
		</div>	
			
		<div id="filtered-posts">
			<div class="container home-container">
				<div  class="blog-content content row row-eq-height">
		
				
					
				<?php		
						
					
					global $wp_query;
				
					$display_count = 12;
					
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$offset = ( $paged - 1 ) * $display_count;
					//$offed = $offset + 1; // offset do not duplicate featured DK commented this out
					
					$args = array(
							'posts_per_page' 	=>  $display_count,
							'paged' 			=> $paged,
							//'offset'			=> $offed,
							//'orderby'			=> 'menu_order',
							// start dk add
							'orderby'			=> 'meta_value_num',
							'meta_key'			=> 'homepage_sort',
							// end dk add	
							'order'				=> 'ASC' // dk changed
					);
					
					$loop = new WP_Query($args);
					$temp_wp_query = $wp_query;
					$wp_query = null;
					$wp_query = $loop;
					
					if($loop-> have_posts() ) :  while($loop->have_posts()) : $loop->the_post(); 

						$category = get_the_category(); // get category of current post 
						$count_posts = count($posts); 	// get number of posts
						$counter = 0;
				?>
						
					 <?php if ( get_post_meta( get_the_ID(), 'high_two_col', 1 )) : // get custom field value to determin width of post ?>

							
							<!--</div>	<div  class="blog-content content row row-eq-height">-->
							<div  class='post-content col-sm-8'>
							
					<?php elseif ( get_post_meta( get_the_ID(), 'high_three_col', 1 ) ) : // get custom field value to determin width of post ?>

						
							<!--</div>	<div  class="blog-content content row row-eq-height">-->
							<div  class='post-content col-sm-12'>
							
					<?php else: // use default column size if custom field no value ??>
					
							
							<div  class='post-content col-sm-4'>
							
					<?php endif; ?>
						
								<figure class="post-thumb">		
									<a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_post_thumbnail();?></a>
								</figure>
								<div class="blog-post">						
									<span class="blog-post-cat blog-post-meta <?php echo $category[0]->slug; ?>"><?php  get_category_link($category[0]->cat_ID); ?><?php the_category(', ');?></span><span class="read-time"><?php echo high_reading_time();?></span>		
									<h2 class="post-meta-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>				
									<span class="blog-post-date post-date small"><?php echo get_the_date(); ?></span>
								</div>		
							</div>		   
	
					<?php // add post CTA
							 if ( get_post_meta( get_the_ID(), 'high_post_cta', 1 ) ) : // get custom field value to add post CTA 
								
								
								echo '<div id="post-cta" class="post-content post-sm-cta col-sm-4"  >';
								echo '<div class="cta-wrap">';
								echo '<span class="small cta-title">Don\'t Miss The Next Article</span>';
								echo '<h2>The best content delivered straight to your inbox</h2>';
								echo '<input type="text" />';
								echo '</div></div>';
					endif; ?>
						 
					<?php endwhile; ?>

					<div class="clear"></div>
					
					<!-- customized wordpress page navigation -->
					<nav class="page-nav container"> <?php high_posts_nav(); ?> </nav>
					
				<?php endif; // end loop ?>
				
				
				<?php $wp_query = $temp_wp_query; ?>
				
				<?php wp_reset_postdata(); ?>
				
			</div>	
				
		</div>
		</div>
	</div>
		