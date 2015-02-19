	$(document).ready function(){
		$( ".cross" ).hide();
		$( ".menu-main-menu-container" ).hide();
		$( ".hamburger" ).click(function() {
			$( ".menu-main-menu-container" ).slideToggle( "slow", function() {
				$( ".hamburger" ).hide();
				$( ".cross" ).show();
				});
		});

		$( ".cross" ).click(function() {
			$( ".menu-main-menu-container" ).slideToggle( "slow", function() {
				$( ".cross" ).hide();
				$( ".hamburger" ).show();
				});
			});

	}