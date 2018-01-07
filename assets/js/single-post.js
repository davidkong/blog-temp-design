/* dk replaced all $ with jQuery in order to manage compatibility */

function FIOSinglePostHeaderAnimation() {
  handle_scroll();
  update_navbar();
}


function handle_scroll() {
  jQuery(window).on("scroll", function() {
	  
	  
    var winHeight = jQuery(window).height(),
		docHeight = jQuery(document).height(),
		suggestedArticlesHeight = jQuery("#flag").height(),
		scrollTop,
		progressBar = jQuery('#progress-bar'),
		max = 0,
		value = 0;
	
    scrollTop = jWindow.scrollTop();


    /* Set the max scrollable area */
    max = docHeight - (winHeight + suggestedArticlesHeight);
    
    progressBar.attr('max', max);

    progressBar.attr('value', scrollTop);
  });
};
