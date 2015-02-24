	jQuery.noConflict();
jQuery(document).ready(function($){
		$( ".cross" ).hide();
		$( ".menu" ).hide();
		$( ".hamburger" ).click(function() {
			$( ".menu" ).slideToggle( "slow", function() {
				$( ".hamburger" ).hide();
				$( ".cross" ).show();
				});
		});

		$( ".cross" ).click(function() {
			$( ".menu" ).slideToggle( "slow", function() {
				$( ".cross" ).hide();
				$( ".hamburger" ).show();
				});
			});


$(window).resize(function(){
  if(w > 600 && menu.is(':hidden')) {
    menu.removeAttr('style');}
});



})
