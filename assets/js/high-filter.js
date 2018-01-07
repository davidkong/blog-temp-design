jQuery(function($){
	$('#popular_posts').click(function(){
		$.ajax({
			url:highfilter.ajaxurl,
			data:{
				action: 'high_filter',
			}, 
			type: 'post' ,
			success: function(data ) {
			$('.container.home-container').html(data);
			$('.selected-posts span').removeClass('filter-background').addClass('filter-background-popular');
			$('#recent_posts').removeClass('active');
			$('#popular_posts').addClass('active');
		}
		});
		return false;
	});
	
	$('#recent_posts').click(function(){
		$.ajax({
			url:highfilter.ajaxurl,
			data:{
				action: 'high_recent',
			}, 
			type: 'post' ,
			
			success: function(data ) {
			$('.container.home-container').html(data);
			$('.selected-posts span').removeClass('filter-background-popular').addClass('filter-background');
			$('#popular_posts').removeClass('active');
			$('#recent_posts').addClass('active');
		
		}
		
		});
		return false;
	
	});
	
});