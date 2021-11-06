/**
 * @file
 * Custom javascript for the Axioma theme.
 */

(function($) {
  Backdrop.behaviors.axioma = {
    attach: function(context, settings) {
			var stickyTop = $('nav.header-menu').offset().top;

			$(window).scroll(function() {
				var windowTop = $(window).scrollTop();

				if (stickyTop < windowTop) {
					$('nav.header-menu').addClass('ax-sticky-enabled');
					$('body').addClass('ax-sticky-shift');
				}
				else {
					$('nav.header-menu').removeClass('ax-sticky-enabled');
					$('body').removeClass('ax-sticky-shift');
				}
			});
    }
  };
})(jQuery);
