<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="profile" href="http://gmpg.org/xfn/11">
		 
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
			

		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>
		
		<div id="page-wrap">
		
			<?php if(is_single()){ ?>
				 <div class='single-post-header-wrapper'>
			<div class='single-post-header-container'>
			
				<div class='single-post-header'>

					<div class='top-line no-display'></div>
					<progress id='progress-bar' value='0'></progress>
				</div>
			</div>

	</div>

		<?php	} ?>
		
			<header>
		
				<div  class="top-head">
					<div class="container-fluid">
							
						<div class="top-menu row">
							<div class="container">
								<div class="top-logo-box col">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/frame-sm-white.png" alt="Frame.io"></a>
									</div>
								<nav id="top-nav" class="navbar">
								
								<div id="topNavDropdown">	

									 <?php wp_nav_menu( 
													array( 
														'menu'              => 'top',
														'theme_location'    => 'top',
														'depth'             => 2,
														'container'       => false,
														'menu_class'		  => '',
														'fallback_cb'		  => '__return_false',
														'items_wrap'		  => '<ul id="%1$s" class="navbar-nav mr-auto %2$s">%3$s</ul>',
														'walker'            => new WP_Bootstrap_Navwalker()
													)
										); ?>
										
										<div class="drop-ext-links">
										
											<div class="top-social-icon-wrap">
												<span class="top-social-icon"><a href="https://frame.io/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/frame-gray-icon.png" alt="Frame.io"></a></span>
												<span class="top-social-icon"><a href="https://twitter.com/Frame_io" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-small.png" alt="Twitter Frame"></a></span>
												<span class="top-social-icon"><a href="https://www.facebook.com/frameioapp" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-small.png" alt="Facebook Frame App"></a></span>
											</div>
											
											<div class="top-legal">
												<span class="high-copy">&copy; Frame.io, Inc.</span> 
												<span class="term-link legal"><a href="https://app.frame.io/terms" >Terms</a></span>
												<span class="privacy-link legal"><a href="https://app.frame.io/welcome">Privacy</a></span>
											</div>
										
										</div>
									</div>
								
								</div>
							</nav>
							
						</div>
						<div class="button-wrap container">	
							 <button  id="butt" class="top-slidedown navbar-toggle">
								<span class="sr-only">Frame.io</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							 </button>
							 
							<a class="navbar-brand top-slidedown" href="#">Explore Frame.io</a>
							<div class="open-top top-slidedown">X</div>
						</div>
					</div>
					<script>
					</script>
				</div> <!-- top-head -->
				
				
				<div id="main-menu" class="nav-container container">
					<div class="row justify-content-start">
						<div class="logo-box col">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php  do_action( 'high_add_logo', 10, 2 );?><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a>
						</div>
						
						<nav class="navbar">
						
									<button  class="navbar-toggle" data-toggle="collapse"  data-target="#navbarNavDropdown"  aria-controls="navbarNavDropdown" >
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												 </button>

									<div class="collapse navbar-collapse " id="navbarNavDropdown">
										
									   <?php wp_nav_menu( 
													array( 
														'theme_location'    => 'primary',
														'container'       => false,
														'menu_class'		  => '',
														'fallback_cb'		  => '__return_false',
														'items_wrap'		  => '<ul id="%1$s" class="navbar-nav top-drop-menu %2$s">%3$s</ul>',
														'walker'            => new WP_Bootstrap_Navwalker()
													)
												); 
										?>
											
										<div class="mobile-logo-wrap">
										
											<div class="sign-up">
												<input type="text" placeholder="Email Address">
												<input type="submit" value="SUBSCRIBE">
											</div>
											<div class="mobile-logo">
												<a class="mobile-brand" href="https://frame.io/" target="_blank">
													<img src="<?php echo get_template_directory_uri(); ?>/images/mobile-logo-white.png" alt="Explore Frame.io" title="Explore Frame.io"/>
												</a>
											</div>
										</div>
									
									</div> <!-- /.navbar-collapse --> 
									
						</nav>
										<div class="col-sm-1 col-md-1 pull-right search">
												<button class="btn btn-default fancybox"><img src="<?php echo get_template_directory_uri(); ?>/images/frame-search-icon.png" width="20" height="20" alt="Frame Search" /></button>
										
											<div class="hide-search"  style="display: none;">
												<div class="search-wrap" id="search-pop">
													<?php get_search_form(); ?>
												</div>
											</div>
										</div>
					</div>
					
									<script>
									</script>
				</div><!-- head container -->
				
			</header>
			