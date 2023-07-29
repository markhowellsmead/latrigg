/**
 * The value of the 'anchorAnimateOffset' variable will be used every time the
 * scroll function is fired, so that we can dynamically watch the height
 * of e.g. a fixed toolbar.
 */

window.anchorAnimateOffset = 0;

(function ($) {
	$.extend($.fn, {
		anchorAnimate: function () {
			return this.each(function () {
				$(this).bind('click.js-hashscroll', function (e) {
					if ($(this).attr('href')) {
						var targetAnchor = $(this).attr('href').split('#');
						var destination = $('#' + targetAnchor[1]);
						if (destination && destination.length) {
							e.preventDefault();
							$(destination).scrollToMe();
						}
					}
				});
			});
		},
		scrollToMe: function () {
			var destination = $(this);
			if (destination && destination.length) {
				var destinationTop = destination.offset().top;

				destinationTop = destinationTop - window.anchorAnimateOffset;

				$(window).trigger('sh-js-hashscroll/scroll-start', window.anchorAnimateOffset, destinationTop);

				$('html:not(:animated),body:not(:animated)')
					.stop()
					.animate(
						{
							scrollTop: Math.floor(destinationTop),
						},
						600
					);
			}
			return this;
		},
	});

	$(window).on('load.js-hashscroll', function () {
		if (window.location.hash && window.location.hash !== '' && $(window.location.hash) && $(window.location.hash).length === 1) {
			setTimeout(function () {
				$(window.location.hash).scrollToMe();
			}, 200);
		}
	});

	$('a').anchorAnimate();
})(jQuery);
