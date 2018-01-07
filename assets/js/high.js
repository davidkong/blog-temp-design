/****
	*
	*
	*
	* Custom Scripts for Frame-blog theme
	*
	*
	*
****/


	jQuery(function($){
	
		var posts = $(".post-content"),
			single   = $('.col-sm-4'),
			dbl   = $('.col-sm-8'),
			full  = $('.col-sm-12'),
			row   = $('.blog-content'),
			num   = 0,
			total   = 0,
			rowCount = total/3;
		
		
		// $(posts).each(function(i){
			
			// $(this).css('order', i);
		// });
		
		
		$(single).each(function(){
				$(this).attr('data-count', 1);
			});
			
		$(dbl).each(function(){
				$(this).attr('data-count', 2);
			});
			
		$(full).each(function(){
				$(this).attr('data-count', 3);
			});
			
				  
	});
	
	
	// top menu slidedown
	jQuery(function($) {
						  var openBtn = $('.top-slidedown'),
						  slideMenu = $('.top-menu'), 
						  layer = $(slideMenu).addClass('layer');
						  openBtn.on("click", function() {
							if (slideMenu.is(':hidden')) {
							  slideMenu.slideDown(300); 
							  
							  $('.navbar-brand, #butt').css('display', 'none');
							  $('.open-top').css('display', 'block');
							  
							} else {
							  slideMenu.slideUp(300);
							  
							  
							  $('.navbar-brand, #butt').css('display', 'inline-block');
							  $('.open-top').css('display', 'none');
							}
							});
						});
	
	
	// search form overlay
	 jQuery('.fancybox').click(function () {
			jQuery.fancybox([
				{ 
					href : '#search-pop',
					fitToView	: false,
					autoSize	: false,
					autoResize	: true,
					autoCenter	: true,
					width		: '90%',
					height 		: '90%',
					autoSize	: false,
					closeClick	: false,
					openEffect	: 'none',
					closeEffect	: 'none',	
				
				 helpers : {
							overlay : {
								css : {
										'background' : 'rgba(255, 255, 255, 0.7)'
									}
					}
				}
				}
			]);
		});
	
	
	// prgress bar for single scroll
	jQuery(window).on("scroll", function() {
	  
	  
    var winHeight = jQuery(window).height(),
		docHeight = jQuery(document).height(),
		suggestedArticlesHeight = jQuery("#flag").height(),
		scrollTop,
		progressBar = jQuery('#progress-bar'),
		max = 0,
		value = 0;
	
    scrollTop = jQuery(window).scrollTop();


    /* Set the max scrollable area */
    max = docHeight - (winHeight + suggestedArticlesHeight);
    
    progressBar.attr('max', max);

    progressBar.attr('value', scrollTop);
  });
  
  
  // add class for large image captions singles
  jQuery('.entry-content img').filter(function () {return jQuery(this).hasClass('size-full')}).each(function(){jQuery(this).addClass('small-cap');});
	
  // singles info box
		
		jQuery( ".box-opener" ).click(function() {
		  jQuery( ".info" ).slideToggle( "slow", function(){
				
				jQuery( ".box-opener" ).text((jQuery( ".box-opener" ).text() == 'Collapse') ? 'Open' : 'Collapse');
			  });
		});
	