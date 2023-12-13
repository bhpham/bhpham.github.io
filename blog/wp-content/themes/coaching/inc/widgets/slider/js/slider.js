jQuery(function ($) {

	$(document).ready(function () {

		var carousel = $("#thim-slider");
		var timeout = carousel.attr('data-interval');
		var autoplay = (carousel.attr('data-autoplay')=='1')?true:false;
		var bullets = (carousel.attr('data-bullets')=='1')?true:false;
		var control = (carousel.attr('data-control')=='1')?true:false;
		carousel.owlCarousel({
			items : 1,
			autoplay: autoplay,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: control,
			dots: bullets,
			autoplayTimeout: timeout,
			autoplayHoverPause: false,
			loop: true,
			animateIn: 'fadeIn', // add this
			animateOut: 'fadeOut' // and this
		});
	});

});