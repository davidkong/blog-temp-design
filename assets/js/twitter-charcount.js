
window.onload = function() {
		jQuery(':input[value="tweet"]').parent().parent().find('textarea').keyup(function() {
		  var length = jQuery(this).val().length;
		  var length = 116 - length;
		 console.log(length);
		 /* jQuery('#chars').text(length); */
		});
};

