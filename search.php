<?php
/***
	*
	*
	* Search Results page 
	*
	*
**/
?>
<?php
global $wp_query, $query_string;

$search_query = get_search_query();

$total_results = $wp_query->found_posts;



?>

<?php get_header(); ?>

 <main id="search-results">
	
		
			
			<?php 
			
			$display_count = 12;
					
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$offset = ( $paged - 1 ) * $display_count;
					$offed = $offset + 1; // offset do not duplicate featured DK commented this out
					
					$args = array(
							'posts_per_page' 	=>  $display_count,
							's' 				=> $search_query ,
							'paged' 			=> $paged,
							'offset'			=> $offed,
							'order'				=> 'ASC' // dk changed
					);
					
					
				$searchquery = new WP_Query( $args );
					$temp_wp_query = $wp_query;
					$wp_query = null;
					$wp_query = $searchquery;
					
					if($searchquery-> have_posts() ):
						echo '<div class="container search-header-align">';
						echo '<h5 class="searchsub">Showing results for...</h5>';
						echo '<h1 class="search-heading">' . $search_query  . '</h1>'; 
						echo '</div>';
					?>
	
	
			<div class="container-fluid search-container ">
				<div class="container ">
					<div class="row search-results-align">
						
							<?php
								while($searchquery->have_posts()) : $searchquery->the_post(); 
								
								$category = get_the_category(); // get category of current post 
							?>
							
							<div  class='post-content col-sm-4'>
								<figure class="post-thumb">
												
									<a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_post_thumbnail();?></a>
									
								</figure>
									
								<div class="blog-post">						
									
									<span class="blog-post-cat blog-post-meta <?php echo $category[0]->slug; ?>"><?php  get_category_link($category[0]->cat_ID); ?><?php the_category(', ');?></span><span class="read-time"><?php echo high_reading_time();?></span>		
									<h2 class="post-meta-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>				
									<span class="blog-post-date post-date small"><?php echo get_the_date(); ?></span>
								
								</div>		
							</div>		   
							
							<?php endwhile; ?>
							
								
							<!-- customized wordpress page navigation -->
									<nav class="page-nav container"> <?php high_posts_nav(); ?> </nav>
					</div>
				</div>
			</div><!-- search container -->		
			
							<?php else: ?>
							
							<?php get_template_part( 'template/content', 'none'); ?>

							
				
				
				<?php $wp_query = $temp_wp_query; ?>
				
				<?php wp_reset_postdata(); ?>
					
				<?php endif; // end loop ?>
			
	



<?php get_footer(); ?>