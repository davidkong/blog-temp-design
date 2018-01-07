window.onload = function() {

  if ( jQuery( "#side-nav-ul" ).length ) {

    	// build the nav based on the h1s on the page
    	jQuery('h1').each(function (index) {

    		if (!jQuery(this).attr("id")) { // add an ID if there isn't one
    			jQuery(this).attr("id", "waypoint-id-" + index);
    		}
    		jQuery("#side-nav-ul").append("<li> <a id='side-nav-a-" + index + "'' class='side-nav-a' href='#" + jQuery(this).attr('id') + "'>" + jQuery(this).text() + "</a></li>");
    	});


        // different waypoints with different offsets are needed because the triggers
        // are different when scrolling up vs scrolling down
        var navNames = [];
        var h1s = jQuery('h1');
        var navs = jQuery('#side-nav-ul li a');
        for (var x = 0; x < navs.length; x++) {
          	navNames.push('#' + navs[x].id);
        }

        // build all of the down header waypoints
        for (var i = 0;  i < h1s.length; i++) {

          var waypoint = new Waypoint({
            element: h1s[i],
            handler: function(n) { return function(direction) {
              if (direction == "down") {
                if (jQuery(window).width() > 550) {
                  // uncomment the next line for the sidebar to show "location" instead of "progress"
                  jQuery(navNames[n - 1]).animate({'opacity': 0.4});
                  jQuery(navNames[n]).animate({'opacity': 1});
                }
              }
              }}(i), // closure - a copy of i is passed, not a reference to the outer i
              offset: '40%'
            });
        }

        // build all of the up header waypoints
        for (i = 1;  i < h1s.length; i++) {
          var waypoint = new Waypoint({
            element: h1s[i],
            handler: function(n) { return function(direction) {
              if (direction == "up") {                  
                if (jQuery(window).width() > 550) {
                  jQuery(navNames[n]).animate({'opacity': 0.4});
                  jQuery(navNames[n - 1]).animate({'opacity': 1});
                }          
              }
              }}(i), // closure - i is passed by value, not reference, so each waypoint gets its a unique value 
              offset: '40%'
            });
        }

        // hide when you scroll up to the header 
        var waypoint = new Waypoint({
            element: jQuery('.single-post-content-container')[0],
            handler: function(n) { return function(direction) {
              if (direction == "up") {                  
                if (jQuery(window).width() > 550) {
                  jQuery('.side-nav-wrapper').animate({'opacity': 0.0});
                }          
              }
              }}(i), // closure - i is passed by value, not reference, so each waypoint gets its a unique value 
              offset: '40%'
            });

        // show when you scroll back down 
        var waypoint = new Waypoint({
            element: jQuery('.single-post-content-container')[0],
            handler: function(n) { return function(direction) {
              if (direction == "down") {                  
                if (jQuery(window).width() > 550) {
                  jQuery('.side-nav-wrapper').animate({'opacity': 1.0});
                }          
              }
              }}(i), // closure - i is passed by value, not reference, so each waypoint gets its a unique value 
              offset: '40%'
            });


        // hide when you reach the bottom
        var waypoint = new Waypoint({
            element: jQuery('.post-author-description-container')[0],
            handler: function(n) { return function(direction) {
              if (direction == "down") {                  
                if (jQuery(window).width() > 550) {
                  jQuery('.side-nav-wrapper').animate({'opacity': 0.0});
                }          
              }
              }}(i), // closure - i is passed by value, not reference, so each waypoint gets its a unique value 
              offset: '40%'
            });

        // show when you scroll back up 
        var waypoint = new Waypoint({
            element: jQuery('.post-author-description-container')[0],
            handler: function(n) { return function(direction) {
              if (direction == "up") {                  
                if (jQuery(window).width() > 550) {
                  jQuery('.side-nav-wrapper').animate({'opacity': 1.0});
                }          
              }
              }}(i), // closure - i is passed by value, not reference, so each waypoint gets its a unique value 
              offset: '40%'
            });


        // for smooth scrolling
        var $root = jQuery('html, body');
        jQuery('a').click(function() {
          $root.animate({
            scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top
          }, 500);
          return false;
        });

  }

}



