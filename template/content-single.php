<?php
/**
 *  Display single post content 
 */
?>

<?php
global $wp_query;
$curauth = $wp_query->get_queried_object();  // get current author
$id = $curauth->ID;
?>

	
		<div id="single-content"  class="container single-container">
			<div class="row">
			
				<article class="single-post-content">
	
					<?php $category = get_the_category(); ?>	
					
					<div class="single-wrap col">
					
						<div class="single-thumb">
							<a href="<?php echo get_permalink( $post->ID ); ?>">
								<?php the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title()));?>
							</a>
						</div>		
				
								
						<div class="entry-header">
							<div class="single-post-meta">	
								<div>
									<span class="single-post-cat <?php echo $category[0]->slug; ?>">
										<?php  get_category_link($category[0]->cat_ID); ?>
										<?php the_category(', ');?>
									</span>
									<span class="read-time">
										<?php echo high_reading_time();?>
									</span>
								</div>
								<div>
									<span class="single-post-date post-date small">
										<?php the_time( get_option( 'date_format' ) ); ?>
									</span>
								</div>
							</div>			
										
							<h1 class="post-meta-title">
								<a href="<?php echo get_permalink( $post->ID ); ?>">
									<?php the_title(); ?>
								</a>
							</h1>				
							
							<div class="author-meta">							
								<figure class="author-avatar">
									<?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
								</figure>
								<div class="author-details-align">
									<p class="author-name">
										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
											<?php echo get_the_author_meta( 'first_name') . ' ' .  get_the_author_meta( 'last_name'); ?></a>
									</p>
									<p class="author-email">
										<?php echo get_the_author_meta( 'user_email'); ?>
									</p>
								</div>
							</div>				
						</div><!-- .entry-header -->
								
					</div>
			

						<?php if ( is_search()): // Only display Excerpts for Search  and front page?>
									<div class="entry-summary">
										<?php if(get_the_post_thumbnail($post_id) != '' ) {

															echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
																		the_post_thumbnail();
															echo '</a>';
												}
											?>
							
										<?php the_excerpt(); ?>
						
									</div><!-- .entry-summary -->
					
						<?php else : ?>
					
						<?php // if nothing else display all other pages and posts normal ?>
					
					<div class="entry-content">
					
						<?php the_content( ); ?>
						
					</div><!-- .entry-content -->
		
						<?php endif;  //end the loop ?>

		
					<?php wp_link_pages(); ?> 
		 
				</article><!-- #post -->
				
				<div class="author-bio-container container">
					<div class="row">
						<div class="author-thanks col-md-8">
							<?php get_template_part( 'template/content', 'author-thanks' ); ?>
						</div>
						<div class="author-post col-md-4">
								<?php get_template_part( 'template/content', 'featured-author' ); ?>
						</div>
					</div>
				</div> 
		
				<section class="page-nav container">
					<div id="nav-below" class="post-navigation">
				
						<div class="alignleft">
						<?php previous_post_link(); ?>
						</div>
						<div class="alignright">
						<?php next_post_link(); ?>
						</div>

					</div>
				</section>
				<br class="clear" />
				
				
				<div class="single-more-container container">
					<div class="row">
						<div id='flag' class='recommended-articles-container col-12'>

						<?php get_template_part( 'template/content', 'recent-posts' ); ?>

						</div>
					</div>
				</div>
			</div>
			
			<?php comments_template( '', true ); ?>
		
		</div>
	</div>