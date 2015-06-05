(function($) {
	$(document).ready(function() {
		mobile_menu();
	});
	
	
	function mobile_menu() {
		$("#mobile-menu-wrapper .mobile-menu-icon").on("click", function(e) {
			e.preventDefault();
			$("#mobile-menu-wrapper .mobile-menu").slideToggle(300);
		});
	}
})(jQuery);
