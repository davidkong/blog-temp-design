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
$id = $curauth->ID;
?>

	<div class="container page-container">
		<div class="row author-row">
				
			<div class="author-profile col-sm-9">
				
				<header class="author-head">
					<h3 class="author-role">Contributing Author</h3>
					<h1 class="author-name"><?php echo $curauth->first_name . '  ' . $curauth->last_name; ?></h1>
				</header>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('author-descript'); ?>>
					
					<p class="large">
						<?php echo $curauth->description; ?>
					</p>
				</article>
				
			</div>
			<div class="author-img col-sm-3">
			
				<figure class="author-avatar">
					<?php echo get_avatar($id, 208); ?>
				</figure>
				
				
				
			</div>
			<div class="author-info col-sm-3">
				
				<?php 
						// get author contact info 
						$twitter =  get_user_meta($id, 'twitter', true);
						$linked =  get_user_meta($id, 'linkedin', true);
						$other =  get_user_meta($id, 'linkedin', true);
						
				?>
				<?php if($twitter != "") :  ?>
					<span class="info-link twitter">
							<?php echo '<a href="https://twitter.com/@' . $twitter . '" target="_blank" > @' . $twitter . '</a>' ; ?>
					</span>
				<?php endif; ?>
				
				<?php if($other != "") :  ?>	
					<span class="info-link other">
							<?php echo '<a href="' . $other . '" target="_blank" > ' . $other . '</a>' ; ?>
					</span>
				<?php endif; ?>	
				
				<?php if($linked != "") :  ?>
					<span class="info-link linked">
							<?php echo '<a href="https://www.linkedin.com/in/' . $linked . '" target="_blank" > ' . $linked . '</a>' ; ?>
					</span>
				<?php endif; ?>
					
				</div>

		</div>

	</div>