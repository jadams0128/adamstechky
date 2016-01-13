(function($){
	$(document).ready(function(){
		$("#gmap-holder").click(function() {
			$(this).find('iframe').css('pointer-events', 'all');
	    }).mouseleave(function(e) {
	        $(this).find('iframe').css('pointer-events', 'none');
	    });
	});
})(jQuery);