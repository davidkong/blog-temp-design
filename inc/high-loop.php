<?php
/***
	*
	*
	*
	* Custom loop functionality for Frame-Blog theme
	*
	*
	*
***/
?>
<?php	


add_action('wp_ajax_high_filter', 'high_meta_filter'); 
add_action('wp_ajax_nopriv_high_filter', 'high_meta_filter');
function high_meta_filter(){
		
		echo '<div  class="blog-content content row row-eq-height">';
		
		global $wp_query;
			
				$display_count = 12;
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$offset = ( $paged - 1 ) * $display_count;
				
				
				$offed = $offset + 1; // offset do not duplicate featured
				
				
				
				$args = array(
						'posts_per_page' 	=>  $display_count,
						'paged' 			=> $paged,
						//'offset'			=> $offed,
						'order'				=> 'DESC',
						'meta_key' => 'high_popular',
						'meta_value_num' => '1',
					);
				
				$loop = new WP_Query($args);
				$temp_wp_query = $wp_query;
				$wp_query = null;
				$wp_query = $loop;
				
				if($loop-> have_posts() ) :  while($loop->have_posts()) : $loop->the_post(); ?>

					<?php  $category = get_the_category(); // get category of current post ?>		
				 
					<?php if ( get_post_meta( get_the_ID(), 'high_two_col', 1 )) : // get custom field value to determin width of post ?>
					
							<div  class='post-content col-sm-8'>
							
					<?php elseif ( get_post_meta( get_the_ID(), 'high_three_col', 1 ) ) : // get custom field value to determin width of post ?>
					
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
					 
				<?php endwhile; ?>

				<div class="clear"></div>
				
				<!-- customized wordpress page navigation 
				<nav class="page-nav container"> <?php high_posts_nav(); ?> </nav>-->
				
			<?php endif; // end loop ?>
			
			
			<?php $wp_query = $temp_wp_query; ?>
			<?php wp_reset_postdata(); 
	die();
}
 
 


 
add_action('wp_ajax_high_recent', 'high_recent_filter'); 
add_action('wp_ajax_nopriv_high_recent', 'high_recent_filter');
function high_recent_filter(){
		echo '<div  class="blog-content content row row-eq-height">';
		global $wp_query;
			
		
				$display_count = 12;
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$offset = ( $paged - 1 ) * $display_count;
				
				
				$offed = $offset + 1; // offset do not duplicate featured
				
				
				
				$args = array(
						'posts_per_page' 	=>  $display_count,
						'paged' 			=> $paged,
						//'offset'			=> $offed,
						'order'				=> 'DESC',
					);
				
				$loop = new WP_Query($args);
				$temp_wp_query = $wp_query;
				$wp_query = null;
				$wp_query = $loop;
				
				if($loop-> have_posts() ) :  while($loop->have_posts()) : $loop->the_post(); ?>

					<?php  $category = get_the_category(); // get category of current post ?>		
				 <?php if ( get_post_meta( get_the_ID(), 'high_two_col', 1 )) : // get custom field value to determin width of post ?>

							
							</div>	<div  class="blog-content content row row-eq-height">
							
							<div  class='post-content col-sm-8'>
							
					<?php elseif ( get_post_meta( get_the_ID(), 'high_three_col', 1 ) ) : // get custom field value to determin width of post ?>

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
					 
				<?php endwhile; ?>

				<div class="clear"></div>
				
				<!-- customized wordpress page navigation 
				<nav class="page-nav container"> <?php high_posts_nav(); ?> </nav>-->
				
			<?php endif; // end loop ?>
			
			<?php $wp_query = $temp_wp_query; ?>
			<?php wp_reset_postdata(); 
	die();
}

 