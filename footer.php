<?php

/**

 * @package WordPress

 * @subpackage Big Name

 */

?> 		 
		</main> <!--end of page content-->
		<div class="clear"></div>
			
		<footer id="footer">
		
			<div class="container foot-container">
				<div id="foot-content" class="row row-eq-height">
					<div class="foot-action-main">
						<div class="footer-widget col-sm-6">
							<div class="logo-box col">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php  do_action( 'high_add_logo', 10, 2 );?><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a>
								</div>
							<?php dynamic_sidebar('lfoot_sidebar'); ?>
						</div>
						<div class="foot-action-buttons">
							<button class="foot-join-us">
								<p class="foot-join-us-text">Want to join us?</p>
							</button>
							<div class="explore-frame-align">
								<p class="explore-frame-text">Explore Frame.io</p>
								<div class="explore-frame-arrow">
									<img src="<?php echo get_template_directory_uri();?>/images/explore-frame-arrow.png"/>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-widget col-sm-offset-3 col-sm-3">
						<?php dynamic_sidebar('rfoot_sidebar'); ?>
					</div>
				</div> <!-- end foot content-->

				<div id="foot-text" class="row">
					<div class="col-sm-6 foot-text-align">
						<p class="foot-text">
							&copy; Copyright 2017 All Rights Reserved.
						</p>
						<p class="foot-text">
							Made with <span class="icon-love"></span> In New York city.
						</p>
					</div>
					
					<div class="col-sm-offset-3 col-sm-3">
						<div class="social-icon-wrap">
							<span class="social-icon"><a href="https://frame.io/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/frame-gray-icon.png" alt="Frame.io"></a></span>
							<span class="social-icon"><a href="https://twitter.com/Frame_io" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-gray-icon.png" alt="Twitter Frame"></a></span>
							<span class="social-icon"><a href="https://www.facebook.com/frameioapp" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-gray-icon.png" alt="Facebook Frame App"></a></span>
						</div>
					</div>
				</div>
			</div>
			
			<?php wp_footer(); ?>
				

<script data-cfasync="false" src="//load.sumome.com/" data-sumo-platform="wordpress" data-sumo-site-id="58f04e93827b91c9504687c4f49c5d8637a6eca6d55ba4d87c06f5c7bbc77fb6" async></script>
		</footer><!-- close footer -->
		</div> <!-- the end -->
</body>
</html>

