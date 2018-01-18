<?php
/***
	*
	*
	*
	* gets author content to use on author.php template for Frame Blog theme
	*
	*
	*
***/
?>

<?php
global $wp_query;
$curauth = $wp_query->get_queried_object();  // get current author
$id =  get_the_author_meta( 'ID' );
?>

	<div class="container bio-thanks-container">
		<div class="row author-thanks-row">
		
			<div class="author-thanks-details container">
				<div class="row author-thanks-details-row">
			
					<div class="author-img">
									<div class="author-thanks-meta">							
										<figure class="author-avatar"><?php echo get_avatar( get_the_author_meta('ID'), 60); ?></figure><p class="author-thanks-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'first_name') . ' ' .  get_the_author_meta( 'last_name'); ?></a></p>
									</div>
					</div>

					<div class="author-thanks-profile">
						<header class="author-thanks-head">
							<h3 class="author-thanks-role">Thank you to <?php echo get_the_author_meta( 'first_name') . ' ' .  get_the_author_meta( 'last_name'); ?> for contributing to this article.</h3>
						</header>
								
						<article id="post-<?php the_ID(); ?>"  class="author-descript">
							<?php echo get_the_author_meta( 'description' ); ?>
							<div class="author-thanks-url-align">		
								<a class="author-thanks-url" href="<?php echo get_author_posts_url( $id); ?>">See more posts from <?php echo get_the_author_meta( 'first_name'); ?>
								</a>
							</div>
						</article>
					</div>

					<div class="author-thanks-info"><!-- social media -->	
						<?php 
								// get author contact info 
								$twitter =  get_user_meta($id, 'twitter', true);
								$linked =  get_user_meta($id, 'linkedin', true);
								$other =  get_user_meta($id, 'other', true);
								
						?>
						<?php if($twitter != "") :  ?>
							<span class="thanks-info-link twitter">
									<?php echo '<a href="https://twitter.com/@' . $twitter . '" target="_blank" > @' . $twitter . '</a>' ; ?>
							</span>
						<?php endif; ?>
						
						<?php if($other != "") :  ?>	
							<span class="thanks-info-link other">
									<?php echo '<a href="' . $other . '" target="_blank" > ' . $other . '</a>' ; ?>
							</span>
						<?php endif; ?>	
						
						<?php if($linked != "") :  ?>
							<span class="thanks-info-link linked">
									<?php echo '<a href="https://www.linkedin.com/in/' . $linked . '" target="_blank" > ' . $linked . '</a>' ; ?>
							</span>
						<?php endif; ?>					
					</div>
					
					<section class="contribute col-md-12">
						<article class="contribute-content">					
							<h3 class="contribute-heading col-md-4">Interested in contributing?</h3>							
							<p>This blog relies on people like to step in and add your voice. Send us an email: blog at frame.io. If you have an idea for a posr ot want to write one yourself.</p>	
						</article">
					</section>
					
				</div>	
				
			</div>
				
			
		</div>

	</div>