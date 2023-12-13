var thim_scroll = true;
(function ($) {
	"use strict";

	if (typeof LearnPress != 'undefined') {
		if (typeof LearnPress.load_lesson == 'undefined') {
			LearnPress.load_lesson = function (a, b) {
				LearnPress.$Course && LearnPress.$Course.loadLesson(a, b);
			}
		}
	}
	$.avia_utilities = $.avia_utilities || {};
	$.avia_utilities.supported = {};
	$.avia_utilities.supports = (function () {
		var div = document.createElement('div'),
				vendors = ['Khtml', 'Ms', 'Moz', 'Webkit', 'O'];
		return function (prop, vendor_overwrite) {
			if (div.style.prop !== undefined) {
				return "";
			}
			if (vendor_overwrite !== undefined) {
				vendors = vendor_overwrite;
			}
			prop = prop.replace(/^[a-z]/, function (val) {
				return val.toUpperCase();
			});

			var len = vendors.length;
			while (len--) {
				if (div.style[vendors[len] + prop] !== undefined) {
					return "-" + vendors[len].toLowerCase() + "-";
				}
			}
			return false;
		};
	}());

	/* Smartresize */
	(function ($, sr) {
		var debounce = function (func, threshold, execAsap) {
			var timeout;
			return function debounced() {
				var obj = this, args = arguments;

				function delayed() {
					if (!execAsap)
						func.apply(obj, args);
					timeout = null;
				}

				if (timeout)
					clearTimeout(timeout);
				else if (execAsap)
					func.apply(obj, args);
				timeout = setTimeout(delayed, threshold || 100);
			};
		};
		// smartresize
		jQuery.fn[sr] = function (fn) {
			return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
		};
	})(jQuery, 'smartresize');

	//Back To top
	var back_to_top = function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 400) {
				jQuery('#back-to-top').addClass('active');
			} else {
				jQuery('#back-to-top').removeClass('active');
			}
		});
		jQuery('#back-to-top').on('click', function () {
			jQuery('html, body').animate({scrollTop: '0px'}, 800);
			return false;
		});
	};

	//// stick header
	$(document).ready(function () {
		var $header = $('#masthead.header_default');
		var $content_pusher = $('#wrapper-container .content-pusher');
		$header.imagesLoaded(function () {
			var height_sticky_header = $header.outerHeight(true);
			$content_pusher.css({"padding-top": height_sticky_header + 'px'});
			$(window).resize(function () {
				var height_sticky_header = $header.outerHeight(true);
				$content_pusher.css({"padding-top": height_sticky_header + 'px'});
			});
		});
	});

	var thim_TopHeader = function () {
		var header = $('#masthead'),
				height_sticky_header = header.outerHeight(true),
				content_pusher = $('#wrapper-container .content-pusher'),
				top_site_main = $('#wrapper-container .top_site_main');

		//header_overlay
		if (header.hasClass('header_overlay')) {
			//header overlay
			header.imagesLoaded(function () {
				top_site_main.css({"padding-top": height_sticky_header + 'px'});
				$(window).resize(function () {
					var height_sticky_header = header.outerHeight(true);
					top_site_main.css({"padding-top": height_sticky_header + 'px'});
				});
			});
		} else {
			//Header default
			header.imagesLoaded(function () {
				content_pusher.css({"padding-top": height_sticky_header + 'px'});
				$(window).resize(function () {
					var height_sticky_header = header.outerHeight(true);
					content_pusher.css({"padding-top": height_sticky_header + 'px'});
				});
			});
		}
	};

	var thim_SwitchLayout = function () {
		var cookie_name = 'course_switch',
				archive = $('#thim-course-archive');
		if (archive.length > 0) {
			//Check grid-layout
			if (!jQuery.cookie(cookie_name) || jQuery.cookie(cookie_name) == 'grid-layout') {
				if (archive.hasClass('thim-course-list')) {
					archive.removeClass('thim-course-list').addClass('thim-course-grid');
				}
				$('.thim-course-switch-layout > a.switchToGrid').addClass('switch-active');
			} else {
				if (archive.hasClass('thim-course-grid')) {
					archive.removeClass('thim-course-grid').addClass('thim-course-list');
				}
				$('.thim-course-switch-layout > a.switchToList').addClass('switch-active');
			}

			$('.thim-course-switch-layout > a').on('click', function (event) {
				var elem = $(this);

				event.preventDefault();
				if (!elem.hasClass('switch-active')) {
					if (elem.hasClass('switchToGrid')) {
						$('.thim-course-switch-layout > a').removeClass('switch-active');
						elem.addClass('switch-active');
						archive.fadeOut(300, function () {
							archive.removeClass('thim-course-list').addClass(' thim-course-grid').fadeIn(300);
							jQuery.cookie(cookie_name, 'grid-layout', {expires: 3, path: '/'});
						});
					} else {
						$('.thim-course-switch-layout > a').removeClass('switch-active');
						elem.addClass('switch-active');
						archive.fadeOut(300, function () {
							archive.removeClass('thim-course-grid').addClass('thim-course-list').fadeIn(300);
							jQuery.cookie(cookie_name, 'list-layout', {expires: 3, path: '/'});
						});
					}
				}
			});
		}

	};

	var thim_height_twitter = function () {

		var $twitter = $('.thim-twitter .tweet-item'),
			max_height = 0;
		
		$twitter.each( function () {
			if ( max_height < $(this).find('.content').height()) {
				max_height = $(this).find('.content').height();
			}
		});

		if ( max_height > 0 ) {
			$twitter.each( function () {
				$(this).find('.content').css('height', max_height);
			});
		}
	};

	var thim_Menu = function () {
		var $header = $('#masthead.header_v1'),
				off_Top = ( $('.content-pusher').length > 0 ) ? $('.content-pusher').offset().top : 0,
				menuH = $header.outerHeight(),
				latestScroll = 0;
		if ($(window).scrollTop() > 2) {
			$header.removeClass('affix-top').addClass('affix');
		}
		$(window).scroll(function () {
			var current = $(this).scrollTop();

			if (current > 2) {
				$header.removeClass('affix-top').addClass('affix');
			} else {
				$header.removeClass('affix').addClass('affix-top');
				$('#toolbar').removeClass('menu-scroll');
				$header.removeClass('menu-scroll');
			}

			if( !$('body').hasClass('thim-search-active') ) {
				if (current > latestScroll && current > menuH + off_Top) {
					if (!$header.hasClass('menu-hidden')) {
						$header.addClass('menu-hidden');
						$('#toolbar').removeClass('menu-scroll');
						$header.removeClass('menu-scroll');

					}
				} else {
					if ($header.hasClass('menu-hidden')) {
						$header.removeClass('menu-hidden');
						$('#toolbar').addClass('menu-scroll');
						$header.addClass('menu-scroll');
					}
				}
			}

			latestScroll = current;
		});

		var $header_v4 = $('#masthead.header_v4'),
				off_Top_v4 = ( $('.content-pusher').length > 0 ) ? $('.content-pusher').offset().top : 0,
				menuH_v4 = $header.outerHeight(),
				latestScroll_v4 = 0;
		if ($(window).scrollTop() > 2) {
			$header_v4.removeClass('affix-top').addClass('affix');
		}
		$(window).scroll(function () {
			var current_v4 = $(this).scrollTop();

			if (current_v4 > 2) {
				$header_v4.removeClass('affix-top').addClass('affix');
			} else {
				$header_v4.removeClass('affix').addClass('affix-top');
				$('#top-menu').removeClass('menu-scroll-v4');
				$header_v4.removeClass('menu-scroll-v4');
			}

			if( !$('body').hasClass('thim-search-active') && !$('body').hasClass('thim-popup-active')) {
				if (current_v4 > latestScroll_v4 && current_v4 > menuH_v4 + off_Top_v4) {
					if (!$header_v4.hasClass('menu-hidden-v4')) {
						if ($(window).scrollTop() > 100) {
							$header_v4.addClass('menu-hidden-v4');

						}
						$('#top-menu').removeClass('menu-scroll-v4');
						$header_v4.removeClass('menu-scroll-v4');

					}
				} else {
					if ($header_v4.hasClass('menu-hidden-v4')) {
						$header_v4.removeClass('menu-hidden-v4');
						$('#top-menu').addClass('menu-scroll-v4');
						$header_v4.addClass('menu-scroll-v4');
					}
				}
			}

			latestScroll_v4 = current_v4;
		});


		//Show submenu when hover
		$('.wrapper-container:not(.mobile-menu-open) .site-header .navbar-nav >li,.wrapper-container:not(.mobile-menu-open) .site-header .navbar-nav li,.site-header .navbar-nav li ul li').on({
			'mouseenter': function () {
				$(this).children('.sub-menu').stop(true, false).fadeIn(250);
			},
			'mouseleave': function () {
				$(this).children('.sub-menu').stop(true, false).fadeOut(250);
			}
		});

		if ($(window).width() > 768) {
			//Magic Line
			var menu_active = $('#masthead.header_v1 .navbar-nav>li.menu-item.current-menu-item,#masthead.header_v1 .navbar-nav>li.menu-item.current-menu-parent, #masthead.header_v1 .navbar-nav>li.menu-item.current-menu-ancestor');
			if (menu_active.length > 0) {
				menu_active.before('<span id="magic-line"></span>');
				var menu_active_child = menu_active.find('>a,>span.disable_link'),
					menu_left = menu_active.position().left,
					menu_child_left = parseInt(menu_active_child.css('padding-left')),
					magic = $('#magic-line');
				magic.width(menu_active_child.width()).css("left", Math.round(menu_child_left + menu_left)).data('magic-width', magic.width()).data('magic-left', magic.position().left);
			} else {
				var first_menu = $('#masthead.header_v1 .navbar-nav>li.menu-item:first-child');
				first_menu.after('<span id="magic-line"></span>');
				var magic = $('#magic-line');
				magic.data('magic-width', 0);
			}

			var nav_H = parseInt($('.site-header .navigation').outerHeight());
			magic.css('bottom', nav_H - (nav_H - 90) / 2 - 64);

			$('#masthead .navbar-nav>li.menu-item').on({
				'mouseenter': function () {
					var elem = $(this).find('>a,>span.disable_link'),
						new_width = elem.width(),
						parent_left = elem.parent().position().left,
						left = parseInt(elem.css('padding-left'));
					if (!magic.data('magic-left')) {
						magic.css('left', Math.round(parent_left + left));
						magic.data('magic-left', 'auto');
					}
					magic.stop().animate({
						left : Math.round(parent_left + left),
						width: new_width
					});
				},
				'mouseleave': function () {
					magic.stop().animate({
						left : magic.data('magic-left'),
						width: magic.data('magic-width')
					});
				}
			});
		}

		//Update position for sub-menu
		$('.header_v1 .menu-item.widget_area:not(.dropdown_full_width),.header_v1 .menu-item.multicolumn:not(.dropdown_full_width)').each(function () {
			var elem = $(this),
				elem_Left = elem.offset().left,
				sub_menu = elem.find('>.sub-menu');
			if (sub_menu.length > 0) {
				var left = ( elem.width() - sub_menu.width() ) / 2;
				if (Math.abs(left) > elem_Left) {
					sub_menu.css('left', elem_Left * Math.abs(left) / left);
				} else {
					sub_menu.css('left', left);
				}
			}
		});

	};

	/* ****** jp-jplayer  ******/
	var thim_post_audio = function () {
		$('.jp-jplayer').each(function () {
			var $this = $(this),
					url = $this.data('audio'),
					type = url.substr(url.lastIndexOf('.') + 1),
					player = '#' + $this.data('player'),
					audio = {};
			audio[type] = url;
			$this.jPlayer({
				ready              : function () {
					$this.jPlayer('setMedia', audio);
				},
				swfPath            : 'jplayer/',
				cssSelectorAncestor: player
			});
		});
	};

	var thim_post_gallery = function () {
		$('article.format-gallery .flexslider').imagesLoaded(function () {
			if($('.flexslider').length){
				$('.flexslider').flexslider({
					slideshow     : true,
					animation     : 'fade',
					pauseOnHover  : true,
					animationSpeed: 400,
					smoothHeight  : true,
					directionNav  : true,
					controlNav    : false,
					rtl: true
				});
			}
		});
	};

	/* ****** PRODUCT QUICK VIEW  ******/
	var thim_quick_view = function () {
		$('.quick-view').on('click', function (e) {
			/* add loader  */
			$('.quick-view a').css('display', 'none');
			$(this).append('<a href="javascript:;" class="loading dark"></a>');
			var product_id = $(this).attr('data-prod');
			var data = {action: 'jck_quickview', product: product_id};
			$.post(ajaxurl, data, function (response) {
				$.magnificPopup.open({
					mainClass: 'my-mfp-zoom-in',
					items    : {
						src : response,
						type: 'inline'
					}
				});
				$('.quick-view a').css('display', 'inline-block');
				$('.loading').remove();
				$('.product-card .wrapper').removeClass('animate');
				setTimeout(function () {
					if (typeof wc_add_to_cart_variation_params !== 'undefined') {
						$('.product-info .variations_form').each(function () {
							$(this).wc_variation_form().find('.variations select:eq(0)').change();
						});
					}
				}, 600);
			});
			e.preventDefault();
		});
	};

	var thim_miniCartHover = function () {
		jQuery(document).on('mouseenter', '.minicart_hover', function () {
			jQuery(this).next('.widget_shopping_cart_content').slideDown();
		}).on('mouseleave', '.minicart_hover', function () {
			jQuery(this).next('.widget_shopping_cart_content').delay(100).stop(true, false).slideUp();
		});
		jQuery(document)
				.on('mouseenter', '.widget_shopping_cart_content', function () {
					jQuery(this).stop(true, false).show();
				})
				.on('mouseleave', '.widget_shopping_cart_content', function () {
					jQuery(this).delay(100).stop(true, false).slideUp();
				});
	};

	var thim_carousel = function () {
		if (jQuery().owlCarousel) {
			$(".thim-widget-event,.thim-gallery-images,.sc-testimonials").owlCarousel({
				autoPlay   : false,
				rtl:true,
				singleItem : true,
				stopOnHover: true,
				dots : true,
				autoHeight : false
			});
			var owl = $(".gallery-img.owl-carousel");
			owl.owlCarousel({
			    loop:true,
				rtl:true,
			    autoplay:true,
			    autoplayTimeout:1000,
			    autoplayHoverPause:true
			});


			$('.thim-carousel-wrapper').each(function () {
				var item_visible = $(this).data('visible') ? parseInt($(this).data('visible')) : 4,
					item_desktopsmall = $(this).data('desktopsmall') ? parseInt($(this).data('desktopsmall')) : item_visible,
					itemsTablet = $(this).data('itemtablet') ? parseInt($(this).data('itemtablet')) : 2,
					itemsMobile = $(this).data('itemmobile') ? parseInt($(this).data('itemmobile')) : 1,
					pagination = $(this).data('pagination') ? true : false,
					navigation = $(this).data('navigation') ? true : false,
					autoplay = $(this).data('autoplay') ? parseInt($(this).data('autoplay')) : false,
					mouseDrag = $(this).data('mousedrag') && $(this).data('mousedrag') == 'no' ? false : true,
					Timeout = $(this).data('autoplaytimeout') ? $(this).data('autoplaytimeout') : 5000,
					autoplay = $(this).data('autoplay') ? true : false;
				$(this).owlCarousel({
					items            : item_visible,
					loop: true,
					rtl:true,
					autoplay: autoplay,
					autoplayTimeout: Timeout,
					autoplayHoverPause:true,
					responsive:{
						0:{
							items:itemsMobile,
						},
						480:{
							items:itemsMobile,
						},
						768:{
							items:itemsTablet,
						},
						1024:{
							items: item_desktopsmall,
						},
						1200:{
							items: item_visible,
						},
					},
					nav       : navigation,
					dots       : pagination,
					autoPlay         : autoplay,
					mouseDrag        : mouseDrag,
					navText   : [
						"<i class=\'fa fa-angle-left \'></i>",
						"<i class=\'fa fa-angle-right \'></i>"
					],
				});
			});
			
			$('.thim-progress-step-carousel').each(function () {
				var elem = $(this),
						item_visible = elem.data('visible') ? parseInt( elem.data('visible')) : 3,
						item_desktopsmall = elem.data('desktopsmall') ? parseInt( elem.data('desktopsmall')) : item_visible,
						pagination = elem.data('pagination') ? true : false,
						navigation = elem.data('navigation') ? true : false;
						var Timeout = $(this).data('autoplaytimeout') ? $(this).data('autoplaytimeout') : 5000,
							autoplay = $(this).data('autoplay') ? true : false;
				elem.owlCarousel({
					items: item_visible,
					loop: true,
					rtl:true,
					autoplay: autoplay,
					autoplayTimeout: 50000,
					autoplayHoverPause:true,
					responsive:{
						0:{
							items:1,
						},
						480:{
							items:1,
						},
						768:{
							items:2,
						},
						1024:{
							items: item_desktopsmall,
						},
						1200:{
							items: item_visible,
						},
					},
					nav       : navigation,
					dots       : pagination,
					lazyLoad         : true,
					navText   : [
						"<i class=\'fa fa-angle-left \'></i>",
						"<i class=\'fa fa-angle-right \'></i>"
					],

				});
				
				var active = elem.find(".owl-item.active");
				var last_active = active.last();
				last_active.addClass('last-active-item');
				
				
				elem.on('changed.owl.carousel', function(event) {
					var active_first = event.item.index,count,
						active_count = event.page.size,active = [],
						items = elem.find(".owl-item");
					for(count =0 ;count < active_count; count++){
						active.push(active_first+count);
					};

					var	last_active = active.pop();

					items.removeClass('active last-active-item');
					$.each( active, function( key, value ) {
							items.eq( value ).addClass('active');
					});
					items.eq(last_active).addClass('active last-active-item');

				});
			});

			$('.thim-carousel').each(function () {
				var elem = $(this),
						item_visible = elem.data('visible') ? parseInt( elem.data('visible')) : 3,
						item_desktopsmall = elem.data('desktopsmall') ? parseInt( elem.data('desktopsmall')) : item_visible,
						pagination = elem.data('pagination') ? true : false,
						navigation = elem.data('navigation') ? true : false;
						var Timeout = $(this).data('autoplaytimeout') ? $(this).data('autoplaytimeout') : 5000,
							autoplay = $(this).data('autoplay') ? true : false;
				elem.owlCarousel({
					items: item_visible,
					loop: false,
					rtl:true,
					autoplay: autoplay,
					autoplayTimeout: Timeout,
					autoplayHoverPause:true,
					responsive:{
						0:{
							items:1,
						},
						480:{
							items:1,
						},
						768:{
							items:2,
						},
						1024:{
							items: item_desktopsmall,
						},
						1200:{
							items: item_visible,
						},
					},
					nav       : navigation,
					dots       : pagination,
					lazyLoad         : true,
					navText   : [
						"<i class=\'fa fa-angle-left \'></i>",
						"<i class=\'fa fa-angle-right \'></i>"
					],

				});

			});
			
			$('.thim-testimonial-carousel').each(function () {
				var item_visible = $(this).data('visible') ? parseInt($(this).data('visible')) : 2,
						item_desktopsmall = $(this).data('desktopsmall') ? parseInt($(this).data('desktopsmall')) : item_visible,
						autoplay = $(this).data('autoplay') ? $(this).data('autoplay') : 'true',
						pagination = $(this).data('pagination') ? true : false;

				$(this).owlCarousel({
					loop: true,
					items: item_visible,
					autoplay:false,
					rtl:true,
					autoplayTimeout:2000,
					autoplayHoverPause:true,
					responsive:{
						0:{
							items:1
						},
						480:{
							items:1
						},
						768:{
							items:2
						},
						1024:{
							items: item_desktopsmall
						},
						1200:{
							items: item_visible,
							nav:false
						}
					},
					dots       : pagination,
					lazyLoad         : true
				});

			});

			$('.thim-carousel-course-categories .thim-course-slider').each(function () {
				var item_visible = $(this).data('visible') ? parseInt($(this).data('visible')) : 7,
						item_desktopsmall = $(this).data('desktopsmall') ? parseInt($(this).data('desktopsmall')) : 6,
						pagination = $(this).data('pagination') ? true : false,
						navigation = $(this).data('navigation') ? true : false;

				$(this).owlCarousel({
					items            : item_visible,
					responsive:{
						0:{
							items:1,
						},
						480:{
							items:1,
						},
						768:{
							items:2,
						},
						1024:{
							items: item_desktopsmall,
						},
						1200:{
							items: item_visible,
							nav:false,
						},
					},
					nav       : navigation,
					rtl:true,
					dots       : pagination,
					navText   : [
						"<i class=\'fa fa-angle-left \'></i>",
						"<i class=\'fa fa-angle-right \'></i>"
					],
				});
			});
		}

	};

	var thim_course_menu_landing = function () {
		if ($('.thim-course-menu-landing').length > 0) {
			var menu_landing = $('.thim-course-menu-landing'),
					tab_course = $('#course-landing .nav-tabs'),
					tab_active = tab_course.find('>li.active'),
					tab_item = tab_course.find('>li>a'),
					tab_landing = menu_landing.find('.thim-course-landing-tab'),
					tab_landing_item = tab_landing.find('>li>a'),
					landing_Top = ( $('#course-landing').length ) > 0 ? $('#course-landing').offset().top : 0,
					checkTop = ( $(window).height() > landing_Top ) ? $(window).height() : landing_Top;

			$('footer#colophon').addClass('has-thim-course-menu');
			if (tab_active.length > 0) {
				var active_href = tab_active.find('>a').attr('href'),
						landing_active = tab_landing.find('>li>a[href="' + active_href + '"]');

				if (landing_active.length > 0) {
					landing_active.parent().addClass('active');
				}
			}

			tab_landing_item.on('click', function (event) {
				event.preventDefault();
				var href = $(this).attr('href'),
						parent = $(this).parent();

				$('body, html').animate({
					scrollTop: tab_course.offset().top - 50
				}, 800);
				if (!parent.hasClass('active')) {
					tab_landing.find('li.active').removeClass('active');
					parent.addClass('active');
					tab_course.find('>li>a[href="' + href + '"]').trigger('click');
				}
			});

			tab_item.on('click', function () {
				var href = $(this).attr('href'),
						parent_landing = tab_landing.find('>li>a[href="' + href + '"]').parent();

				if (!parent_landing.hasClass('active')) {
					tab_landing.find('li.active').removeClass('active');
					parent_landing.addClass('active');
				}
			});

			$(window).scroll(function () {
				if ($(window).scrollTop() > checkTop) {
					$('body').addClass('course-landing-active');
				} else {
					$('body.course-landing-active').removeClass('course-landing-active');
				}
				;
			})
		}
	};

	var thim_LoginPopup = function () {
		if ($('#thim-popup-login .thim-login-container').length) {

			var el = $('#thim-popup-login .thim-login-container'),
					el_H = el.outerHeight(),
					win_H = $(window).height();

			if (win_H > el_H) {
				el.css('top', ( win_H - el_H ) / 2);
			}
		}
		$(document).on('click', 'body:not(".loggen-in") .thim-enroll-course-button', function (e) {
			if ($(window).width() > 767) {
				if ($('.thim-login-popup .login').length) {
					e.preventDefault();
					$('.thim-login-popup .login').trigger('click');
				}
			}
		});

		$(document).on('click', '#thim-popup-login .close-popup', function (event) {
			event.preventDefault();
			$('body').removeClass('thim-popup-active');
			$('#thim-popup-login').removeClass('active');
		});

		$(document).on('click', '.thim-login-popup .login', function (event) {
			if ($(window).width() > 767) {
				event.preventDefault();
				$('body').addClass('thim-popup-active');
				$('#thim-popup-login').addClass('active');
			}
		});

		$(document).on('click', '#thim-popup-login', function (e) {
			if ($(e.target).attr('id') == 'thim-popup-login') {
				$('body').removeClass('thim-popup-active');
				$('#thim-popup-login').removeClass('active');
			}
		});

		$('#thim-popup-login form[name=loginpopupform]').submit(function (event) {

			var elem = $('#thim-popup-login .thim-login-container'),
					input_username = elem.find('input[name=log]').val(),
					input_password = elem.find('input[name=pwd]').val();

			if (input_username === '' || input_password === '') {
				return;
			}

			elem.append('<div class="thim-loading-container"><div class="thim-loading"></div></div>');
			elem.find('.message').slideDown().remove();

			var data = {
				action  : 'thim_login_ajax',
				username: input_username,
				password: input_password,
				remember: elem.find('#rememberme').val()
			};

			$.post(ajaxurl, data, function (response) {
				try {
					var response = JSON.parse(response);
					elem.find('.thim-login').append(response.message);
					if (response.code == '1') {
						window.location = window.location;
					}
				} catch (e) {
					return false;
				}
				elem.find('.thim-loading-container').remove();
			});

			event.preventDefault();
			return false;
		});


	};

	var thim_event_archive = function () {

		var cookie_name = 'event_type',
				list_event = $('.archive-event');

		if (list_event.length > 0) {

			if (!$.cookie(cookie_name) || $.cookie(cookie_name) == '') {
				$('.archive-event > div').addClass('active');

			} else {
				$('.archive-event > div').removeClass('active');
				$('.event-archive-' + $.cookie(cookie_name)).addClass('active');
				$('.thim-archive-event-select option').filter(function () {
					return $(this).val() == $.cookie(cookie_name);
				}).attr('selected', true);
			}

			$(document).on('change', '.thim-archive-event-select', function () {
				var elem = $(this),
						value = elem.val(),
						event_visible = ( value == '' ) ? $('.archive-event > div') : $('.event-archive-' + value);

				list_event.fadeOut(300, function () {
					$('.archive-event > div').removeClass('active');
					event_visible.addClass('active');
					list_event.fadeIn(300);
					$.cookie(cookie_name, value, {expires: 3, path: '/'});
				});
			});
		}
	};

	//Widget gallery-posts
	var thim_gallery_popup = function () {
		if ($('.thim-widget-gallery-posts .wrapper-gallery-filter, .elementor-widget-thim-gallery-posts .wrapper-gallery-filter').length > 0) {
			$('.thim-widget-gallery-posts .wrapper-gallery-filter, .elementor-widget-thim-gallery-posts .wrapper-gallery-filter').isotope({filter: '*'});
		}

		$(document).on('click', '.filter-controls .filter', function (e) {
			e.preventDefault();
			var filter = $(this).data('filter'),
					filter_wraper = $(this).parents('.thim-widget-gallery-posts, .elementor-widget-thim-gallery-posts').find('.wrapper-gallery-filter');
			$('.filter-controls .filter').removeClass('active');
			$(this).addClass('active');
			filter_wraper.isotope({filter: filter});
		});

		$(document).on('click', '.thim-gallery-popup', function (e) {
			e.preventDefault();
			var elem = $(this),
					post_id = elem.attr('data-id'),
					data = {action: 'thim_gallery_popup', post_id: post_id};
			elem.addClass('loading');
			$.post(ajaxurl, data, function (response) {
				elem.removeClass('loading');
				$('.thim-gallery-show').append(response);
				$('.thim-gallery-show').magnificPopup({
					mainClass: 'my-mfp-zoom-in',
					type     : 'image',
					delegate : 'a',
					gallery  : {
						enabled: true
					},
					callbacks: {
						open: function () {
							$.magnificPopup.instance.close = function () {
								$('.thim-gallery-show').empty();
								$.magnificPopup.proto.close.call(this);
							};
						},
					}
				}).magnificPopup('open');
			});

		});
	};

	// Widget gallery-video
	var thim_gallery_video = function () {
		$(document).on('click', '.video-item .play-button .fa', function (e) {
			e.preventDefault();
			$('#bg-opacity').css('width', '100%');
			$('.sk-fading-circle').css('display', 'block');
			var elem = $(this),
				post_id = elem.data('id'),
				data = {action: 'thim_gallery_video', post_id: post_id};
			$.post(ajaxurl, data, function (response) {
				$('#bg-opacity').css('width', '0');
				$('.sk-fading-circle').css('display', 'none');
				$.magnificPopup.open({
					items: {
						src: response,
						type: 'inline'
					}
				});
			});

		});
	};

	$(function () {
		back_to_top();

		/* Waypoints magic
		 ---------------------------------------------------------- */
		if (typeof jQuery.fn.waypoint !== 'undefined') {
			jQuery('.wpb_animate_when_almost_visible').each(function(){
				jQuery('.wpb_animate_when_almost_visible:not(.wpb_start_animation)').waypoint(function () {
					jQuery(this).addClass('wpb_start_animation');
				}, {offset: '85%'});
			})	
		}
	});

	function empty(data) {
		if (typeof(data) == 'number' || typeof(data) == 'boolean') {
			return false;
		}
		if (typeof(data) == 'undefined' || data === null) {
			return true;
		}
		if (typeof(data.length) != 'undefined') {
			return data.length === 0;
		}
		var count = 0;
		for (var i in data) {
			if (Object.prototype.hasOwnProperty.call(data, i)) {
				count++;
			}
		}
		return count === 0;
	}

	var windowWidth = window.innerWidth,
			windowHeight = window.innerHeight,
			$document = $(document),
			orientation = windowWidth > windowHeight ? 'landscape' : 'portrait';
	var TitleAnimation = {
		selector   : '.article__parallax',
		initialized: false,
		animated   : false,
		initialize : function () {

			//this.update();
		},
		update     : function () {
			//return;

		}
	};
	/* ====== ON RESIZE ====== */
	$(window).on('load', function () {
		thim_height_twitter();
		thim_post_audio();
		thim_post_gallery();
		thim_TopHeader();
		thim_Menu();
		thim_quick_view();
		thim_miniCartHover();
		thim_carousel();
		//thim_contentslider();
		thim_SwitchLayout();
		thim_LoginPopup();
		thim_event_archive();
		thim_gallery_popup();
		thim_gallery_video();

		setTimeout(function () {
			TitleAnimation.initialize();
			thim_course_menu_landing();

			if( $('#preload').length > 0 ) {
				$('#preload').remove();
			}
			$('body').removeClass('thim-body-preload').removeClass('thim-body-load-overlay');

		}, 400);



	});

	$(window).on("debouncedresize", function (e) {
		windowWidth = $(window).width();
		windowHeight = $(window).height();
		TitleAnimation.initialize();
	});

	$(window).on("orientationchange", function (e) {
		setTimeout(function () {
			TitleAnimation.initialize();
		}, 300);
	});

	var latestScrollY = $('html').scrollTop() || $('body').scrollTop(),
			ticking = false;

	function updateAnimation() {
		ticking = false;
		TitleAnimation.update();
	}

	function requestScroll() {
		if (!ticking) {
			requestAnimationFrame(updateAnimation);
		}
		ticking = true;
	}

	$(window).on("scroll", function () {
		latestScrollY = $('html').scrollTop() || $('body').scrollTop();
		requestScroll();
	});


	jQuery(function ($) {
		var adminbar_height = jQuery('#wpadminbar').outerHeight();
		jQuery('.navbar-nav li a,.arrow-scroll > a').on('click', function (e) {
			if (parseInt(jQuery(window).scrollTop(), 10) < 2) {
				var height = 47;
			} else height = 0;
			var sticky_height = jQuery('#masthead').outerHeight();
			var menu_anchor = jQuery(this).attr('href');
			if (menu_anchor && menu_anchor.indexOf("#") == 0 && menu_anchor.length > 1) {
				e.preventDefault();
				$('html,body').animate({
					scrollTop: jQuery(menu_anchor).offset().top - adminbar_height - sticky_height + height
				}, 850);
			}
		});
	});

	var scrollTimer = false,
			scrollHandler = function () {
				var scrollPosition = parseInt(jQuery(window).scrollTop(), 10);
				jQuery('.navbar-nav li a[href^="#"]').each(function () {
					var thisHref = jQuery(this).attr('href');
					if (jQuery(thisHref).length) {
						var thisTruePosition = parseInt(jQuery(thisHref).offset().top, 10);
						if (jQuery("#wpadminbar").length) {
							var admin_height = jQuery("#wpadminbar").height();
						} else admin_height = 0;
						var thisPosition = thisTruePosition - (jQuery("#masthead").outerHeight() + admin_height);
						if (scrollPosition <= parseInt(jQuery(jQuery('.navbar-nav li a[href^="#"]').first().attr('href')).height(), 10)) {
							if (scrollPosition >= thisPosition) {
								jQuery('.navbar-nav li a[href^="#"]').removeClass('nav-active');
								jQuery('.navbar-nav li a[href=' + thisHref + ']').addClass('nav-active');
							}
						} else {
							if (scrollPosition >= thisPosition || scrollPosition >= thisPosition) {
								jQuery('.navbar-nav li a[href^="#"]').removeClass('nav-active');
								jQuery('.navbar-nav li a[href="' + thisHref + '"]').addClass('nav-active');
							}
						}
					}
				});
			};

	window.clearTimeout(scrollTimer);
	scrollHandler();
	jQuery(window).scroll(function () {
		window.clearTimeout(scrollTimer);
		scrollTimer = window.setTimeout(function () {
			scrollHandler();
		}, 20);
	});

	/* Menu Sidebar */
	jQuery(document).on('click', '.menu-mobile-effect', function (e) {
		e.stopPropagation();
		jQuery('.wrapper-container').toggleClass('mobile-menu-open');
	});

	jQuery(document).on('click', '.mobile-menu-open #main-content', function () {
		jQuery('.wrapper-container.mobile-menu-open').removeClass('mobile-menu-open');
	});

	function mobilecheck() {
		var check = false;
		(function (a) {
			if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))check = true
		})(navigator.userAgent || navigator.vendor || window.opera);
		return check;
	}

	if (mobilecheck()) {
		window.addEventListener('load', function () { // on page load
			var main_content = document.getElementById('main-content');
			if (main_content) {
				main_content.addEventListener("touchstart", function (e) {
					jQuery('.wrapper-container').removeClass('mobile-menu-open');
				});
			}
		}, false);
	}
	;

	/* mobile menu */
	if (jQuery(window).width() > 768) {
		jQuery('.navbar-nav>li.menu-item-has-children >a,.navbar-nav>li.menu-item-has-children >span').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');
	} else {
		jQuery('.navbar-nav>li.menu-item-has-children:not(.current-menu-parent) >a,.navbar-nav>li.menu-item-has-children:not(.current-menu-parent) >span').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');
		jQuery('.navbar-nav>li.menu-item-has-children.current-menu-parent >a,.navbar-nav>li.menu-item-has-children.current-menu-parent >span').after('<span class="icon-toggle"><i class="fa fa-angle-up"></i></span>');
	}
	jQuery('.navbar-nav>li.menu-item-has-children .icon-toggle').on('click', function () {
		if (jQuery(this).find('i').hasClass('fa-angle-down')) {
			jQuery(this).next('ul.sub-menu').slideDown(500, 'linear');
			jQuery(this).html('<i class="fa fa-angle-up"></i>');
		}
		else {
			jQuery(this).next('ul.sub-menu').slideUp(500, 'linear');
			jQuery(this).html('<i class="fa fa-angle-down"></i>');
		}
	});

})(jQuery);

(function ($) {
	var thim_quiz_index = function () {
		var question_index = $('.single-quiz .index-question'),
			quiz_total_text = $('.single-quiz .quiz-total .quiz-text');
		if (question_index.length > 0) {
			quiz_total_text.html(question_index.html());
		}
	};

	$(window).on('load', function () {

		$('.article__parallax').each(function (index, el) {
			$(el).parallax("50%", 0.4);
		});
		$('.images_parallax').parallax_images({
			speed: 0.5
		});
		$(window).resize(function () {
			$('.images_parallax').each(function (index, el) {
				$(el).imagesLoaded(function () {
					var parallaxHeight = $(this).find('img').height();
					$(this).height(parallaxHeight);
				});
			});
		}).trigger('resize');
	});

	jQuery(function ($) {
		$('.video-container').on('click', '.beauty-intro .btns', function () {
			var iframe = '<iframe src="' + $(this).closest(".video-container").find(".yt-player").attr('data-video') + '" height= "' + $('.parallaxslider').height() + '"></iframe>';
			$(this).closest(".video-container").find(".yt-player").replaceWith(iframe);
			//debug >HP
			$(this).closest(".video-container").find('.hideClick:first').css('display', 'none');
		});
	});

	jQuery(function ($) {

		if (!$('.add-review').length) {
			return;
		}
		var $star = $('.add-review .filled');
		var $review = $('#review-course-value');
		$star.find('li').on('mouseover',
				function () {
					$(this).nextAll().find('span').removeClass('fa-star').addClass('fa-star-o');
					$(this).prevAll().find('span').removeClass('fa-star-o').addClass('fa-star');
					$(this).find('span').removeClass('fa-star-o').addClass('fa-star');
					$review.val($(this).index() + 1);
				}
		);
	});


	jQuery(function ($) {
		$('#thim_login').attr('placeholder', thim_placeholder.login);
		$('#thim_pass').attr('placeholder', thim_placeholder.password);
	});


	jQuery(function ($) {
		if (typeof LearnPress != 'undefined') {
			LearnPress.Hook
				.addFilter('learn_press_before_next_question', _before_loading_quiz)
				.addAction('learn_press_next_question', _after_update_quiz_content)
				.addFilter('learn_press_before_prev_question', _before_loading_quiz)
				.addAction('learn_press_previous_question', _after_update_quiz_content)
				.addFilter('learn_press_before_select_question', _before_loading_quiz)
				.addFilter('learn_press_before_start_quiz', _before_loading_quiz)
				.addAction('learn_press_start_quiz', _after_start_quiz)
				.addFilter('learn_press_before_check_question', _before_loading_quiz)
				.addAction('learn_press_check_question', _after_update_quiz_content)
				.addFilter('learn_press_before_finish_quiz', _before_finish_quiz)
				.addFilter('learn_press_before_retake_quiz', _before_retake_quiz)
				.removeAction('learn_press_user_completed_lesson')
				.addAction('learn_press_user_completed_lesson', _user_complete_lesson);

			LearnPress.Hook
				.addAction('learn_press_update_question_content', function ($a, $b, $c) {
					var id = $c.model.current().get('id'),
						pos = $.inArray(id, single_quiz_params.questions)
					if (pos != -1) {
						$('.single-quiz .quiz-text .number').html((pos + 1) + '/' + single_quiz_params.questions.length);
					}
					_after_update_quiz_content();
				});


			function _after_start_quiz() {
				var $iframe = $(".thim-iframe-quiz iframe", parent.document.body);
				$iframe.css('min-height', $('body').outerHeight());
				_after_update_quiz_content();
			}

			function _user_complete_lesson(response, that) {
				if (response && response.result == 'success') {
					var $button = that.$('.complete-lesson-button'),
						$complete_text = $button.data('completed-text');
					$button.addClass('completed').prop('disabled', true).html($complete_text);
					$('.course-item-' + response.id).addClass('item-completed');
					if (response.course_result) {
						if (response.can_finish) {
							$('#learn-press-finish-course').removeClass('hide-if-js');
							LearnPress.Hook.doAction('learn_press_user_passed_course_condition', response, that);
						}
						if (response.message) {
							$(response.message).insertBefore($button);
						}
						LearnPress.$Course.updateProgress(response);
						$('.lp-course-progress .result').html(response.course_result + '%');
						_after_update_lesson();
					}
				}
			}

			function _after_update_lesson() {
				var $course_lesson = $('#learn-press-course-lesson'),
					$course_content = $('.course-content'),
					$content_height = $course_content.outerHeight(),
					$lesson_height = $course_lesson.outerHeight() + 150;
				if ($content_height < $lesson_height) {
					$course_content.addClass('loading').animate({
						height: $lesson_height
					}, 400, function () {
						var position = $course_content.parent().position() || {top: 0, left: 0};
						$course_content.find('.popup-title').css({
							'left' : position.left,
							'top'  : position.top + parseInt($('html', window.parent.document).css('margin-top')),
							'width': $course_content.innerWidth()
						});
						$course_content.removeClass('loading');
					});
				}

			}

			function _before_retake_quiz($return, that) {
				$('.mfp-wrap.mfp-auto-cursor', parent.document.body).animate({
					scrollTop: $('.mfp-wrap.mfp-auto-cursor', parent.document.body).scrollTop() / 2
				}, 400);
				LearnPress.confirm(single_quiz_localize.confirm_retake_quiz, function (confirm) {
					if (!confirm) {
						return;
					}
					_before_loading_quiz();
					that.retakeQuiz({
						complete: function (response) {
							LearnPress.Hook.doAction('learn_press_user_retaken_quiz', response, that);
						}
					});
				})
				$return = false;
				return $return;
			}

			function _before_finish_quiz($return, that) {
				$('.mfp-wrap.mfp-auto-cursor', parent.document.body).animate({
					scrollTop: $('.mfp-wrap.mfp-auto-cursor', parent.document.body).scrollTop() / 2
				}, 400);
				LearnPress.confirm(single_quiz_localize.confirm_finish_quiz, function (confirm) {
					if (!confirm) {
						return;
					}
					_before_loading_quiz();
					that.$buttons.next.prop('disabled', true);
					that.$buttons.prev.prop('disabled', true);
					that.$buttons.finish.prop('disabled', true);
					that.finishQuiz({
						data    : {
							save_id        : that.model.get('question_id'),
							question_answer: that.$('form').serialize(),
							time_remaining : that.model.get('time_remaining')
						},
						complete: function (response) {
							LearnPress.MessageBox.hide();
							LearnPress.Hook.doAction('learn_press_user_finished_quiz', response, that);
						}
					});
				});

				$return = false;
				return $return;
			}

			function _before_loading_quiz() {
				var $course_quiz = $(".course-content", parent.document.body);
				$course_quiz.prepend('<div class="thim-loading-container"><div class="thim-loading"></div></div>');
			}

			function _after_update_quiz_content() {
				var iframe = $(".thim-iframe-quiz iframe", parent.document.body),
					iframe_H = iframe.contents().find('body').height(),
					$course_content = iframe.parents('.course-content'),
					$thim_loading = $course_content.find('.thim-loading-container');
				if ($thim_loading.length > 0) {
					$thim_loading.remove();
				}
				thim_quiz_index();
				$course_content.addClass('loading').animate({
					height: iframe_H + 150
				}, 400, function () {
					var position = $course_content.parent().position() || {top: 0, left: 0};
					$course_content.find('.popup-title').css({
						'left' : position.left,
						'top'  : position.top + parseInt($('html', window.parent.document).css('margin-top')),
						'width': $course_content.innerWidth()
					});
					$course_content.removeClass('loading');
				});
			}

			function _show_popup($content) {
				$.magnificPopup.open({
					closeOnBgClick: false,
					preloader     : false,
					showCloseBtn  : false,
					items         : {
						src : $content || $('.course-content'),
						type: 'inline'
					},
					mainClass     : 'mfp-with-fade',
					removalDelay  : 300,
					callbacks     : {
						open  : function () {
							thim_scroll = false;
							if ($('.thim-course-menu-landing').length > 0) {
								$('.thim-course-menu-landing').addClass('thim-hidden');
							}

							//Cancle event close when loading
							$.magnificPopup.instance.close = function () {
								if ($('.thim-loading-container').length > 0) {
									return;
								}
								thim_scroll = true;
								$('.thim-course-menu-landing.thim-hidden').removeClass('thim-hidden');
								$.magnificPopup.proto.close.call(this);
								$('.course-content').removeClass('rendered');
							};
							this.container.css('padding-top', 0).parent().css({
								top   : $('html').css('margin-top'),
								height: 'auto',
								bottom: 0
							})

						},
						resize: function () {
							var $courseContent = $('.course-content'),
								$title = $courseContent.find('.popup-title'),
								position = $('.mfp-content').position() || {top: 0, left: 0},
								htmlPadding = parseInt($('html').css('margin-top'));
							$title.css({
								'left' : position.left,
								'top'  : position.top + htmlPadding,
								'width': $courseContent.innerWidth()
							});
						}
					}
				});
			}

			function _before_load_lesson($view) {
				LearnPress.Hook.removeFilter('learn_press_before_load_item');
				var $courseContent = $('.course-content'),
					winH = $(window).outerHeight(),
					content_H = $('.mfp-content').length > 0 ? $courseContent.outerHeight() : winH * 3 / 4;
				content_H = ( content_H > winH ) ? winH + 1 : content_H;
				_show_popup();

				if (!$view.model.get('content')) {
					$courseContent.html('<div class="thim-loading-container"><div class="thim-loading"></div></div>');
				} else {
					$courseContent.html('');
				}
				$courseContent.outerHeight(content_H);//.addClass('rendered');
				LearnPress.Hook.addFilter('learn_press_before_load_item', _before_load_lesson);
				if ($view.model.get('type') == 'lp_quiz') {
					var href = $('.course-item-' + $view.model.get('id') + ' a').prop('href'),
						quiz_index = $('.course-item-' + $view.model.get('id') + ' .index').html(),
						quiz_title = $('.course-item-' + $view.model.get('id') + ' a').html(),
						$lesson = $('<div id="learn-press-course-lesson"><div class="thim-iframe-quiz"></div></div>'),
						$main = $lesson.find('.thim-iframe-quiz'),

						$iframe = $('<iframe />').attr('src', href).appendTo($main).css({
							width       : '100%',
							height      : 'auto',
							position    : 'relative',
							'max-height': 'none',
							'min-height': '100%',
							padding     : '0',
							border      : 0,
							opacity     : 0
						});
					;
					$lesson.appendTo($courseContent);
 					$iframe.on('load', function () {
						if ($('.mfp-content').length == 0) {
							return;
						}
						$courseContent.find('.thim-loading-container').remove();
						$lesson.find('.popup-title').remove();
						$lesson.prepend('<h3 class="popup-title">' + '<span class="index"> ' + quiz_index + '</span>' + quiz_title + '<button type="button" class="mfp-close">Close</button></h3>');
						var bodyHeight = $iframe.contents().find('body').height(),
							$parent = $('.course-content');
						$iframe.contents().find('.quiz-title, .back-to-course').remove();
						$iframe.css('min-height', bodyHeight);
						//console.log('load quiz')
						$courseContent.addClass('loading').animate({
							height: bodyHeight + 150
						}, 400, function () {
							$lesson.find('.thim-iframe-quiz').find('.popup-title').remove();
							var position = $('.mfp-content').position() || {top: 0, left: 0};
							$parent.find('.popup-title').css({
								'left' : position.left,
								'top'  : position.top + parseInt($('html').css('margin-top')),
								'width': $parent.innerWidth()
							});
							$iframe.css("opacity", "");
							$courseContent.removeClass('loading');
						});

						//$view.model.set('content', $lesson);
					});
					return false;
				}
				return true;
			}

			$(document).ready(function () {
                //Set padding for demo vc RTL
                setTimeout(function () {
                    $(window).trigger('resize');
                }, 1000);
                /*
                $(window).resize(function () {
                    var get_padding1 = parseFloat($('body.rtl .vc_row-has-fill[data-vc-full-width="true"]').css('left')),
                        get_padding2 = parseFloat($('body.rtl .vc_row-no-padding[data-vc-full-width="true"]').css('left'));
                    if (get_padding1 != 'undefined') {
                        $('body.rtl .vc_row-has-fill[data-vc-full-width="true"]').css({'right': get_padding1, 'left': ''});
                    }
                    if (get_padding2 != 'undefined') {
                        $('body.rtl .vc_row-no-padding[data-vc-full-width="true"]').css({'right': get_padding2, 'left': ''});
                    }
                });
*/
				LearnPress.Hook
					.removeFilter('learn_press_before_load_item')
					.addFilter('learn_press_before_load_item', _before_load_lesson)
					.addFilter('learn_press_set_item_url', function (url, $view) {
						if ($view.model.get('type') == 'lp_quiz') {
							url = false;
						}
						return url;
					})
					.addAction('learn_press_item_content_loaded', function ($content, that) {
						if ($content) {
							var
								$courseContent = $('.course-content').append($content),
								$course_lesson = $courseContent.find('#learn-press-course-lesson-summary'),
								$title = $content.find('.popup-title'),
								$img = $courseContent.find('img'),
								$video = $('.course-content').find('video'),
								contentHeight = 0,
								htmlPadding = parseInt($('html').css('margin-top')),
								count = $img.length,
								start_resize = true,
								_resize = function () {
									contentHeight = $content.outerHeight();
									// console.log($video, contentHeight, $course_lesson.outerHeight());
									$courseContent.addClass('loading').find('.thim-loading-container').remove();
									$courseContent.animate({
										height: contentHeight + 150
									}, 400, function () {
										var position = $('.mfp-content').position() || {left: 0, top: 0};
										$title.css({
											'left' : position.left,
											'top'  : position.top + htmlPadding,
											'width': $courseContent.width() + 60
										}).find('.index').html($('.course-item-' + that.model.get('id') + ' .index').html());
										$courseContent.removeClass('loading');
									});
								};

							if( $video.length > 0 ) {
								var d = 0;
								start_resize = false;
								$video.each( function() {
									var video_id = $(this).attr('id'),
										video = document.getElementById(video_id);

									video.onloadedmetadata = function() {
										if( d == $video.length - 1 && !$(this).hasClass('loaded') ) {
											// console.log($(this).attr('class'), '112222222111');
											if( start_resize === true ) {
												_resize();
											}
											start_resize = true;
										}
										d++;
										$(this).addClass('loaded');
									};
								});
							}

							!count ? ( ( start_resize === true ) ? _resize() : start_resize = true ) : (function () {
								var c = 0;
								$img.each(function () {
									$(this).hasClass('loaded') ? ( ++c == count ? _resize() : '') : $(this).on('load',function () {
										if (++c == count) {
											if( start_resize === true ) {
												_resize();
											}
											start_resize = true;
										}
										$(this).addClass('loaded');
									});
								})
							})();



						}
					}).addAction('learn_press_course_item_load_failed', function () {
					alert();
				}).addFilter('learn_press_load_lesson_content', function (a, item, link) {
					// console.log('12345');
					return true;
					if (item) {
						if (item.get('type') == 'lp_quiz') {
							var $courseContent = $('.course-content'),
								$iframe = $('<iframe >').attr('href', link).css("opacity", 0),
								$loading = $('<div class="thim-loading-container"><div class="thim-loading"></div></div>'),
								content_H = parseInt($(window).outerHeight() * 3 / 4);
							$courseContent.outerHeight(content_H).append($iframe).append($loading);
							$iframe.on('load',function () {
								$loading.remove();
								$iframe.css("opacity", "");
							});
							return false;
						}
					}
				});
				$('.course-item.item-current a').trigger('click');
			})
		}
	});
	// Learnpress custom code js
	$(document).ready(function () {

		$(document).on('mouseenter', '.quiz-question-nav .question-hint', function () {
			$(this).parents('.quiz-question-nav').find('.quiz-hint-content').addClass('quiz-active');
		}).on('mouseleave', '.quiz-question-nav .question-hint', function () {
			$(this).parents('.quiz-question-nav').find('.quiz-hint-content').removeClass('quiz-active');
		});

		$(window).scroll(function (event) {
			if (thim_scroll && thim_scroll === false) {
				event.preventDefault();
			}
		});

		//Take this course - single course
		var payment_check = $('#learn_press_payment_form input:checked');
		if (!(payment_check.length > 0)) {
			$('.learn_press_payment_checkout').hide();
		} else {
			payment_check.parents('.learn_press_woo_payment_methods').find('.learn_press_payment_form').show();
		}
		$('.learn_press_payment_checkout').on('click', function (event) {
			event.preventDefault();
			//$(this).parents('.course-payment').find('.thim-enroll-course-button').trigger('click');
		});
		$('.learn_press_payment_close').on('click', function () {
			$(this).parent().hide();
		});
		$('#learn_press_payment_form input').on('change', function () {
			$('.learn_press_payment_checkout:hidden').show();
		});
	});


	$(window).on('load', function () {
		thim_quiz_index();
	});


	$(document).ready(function () {
		$(".course-wishlist-box [class*='course-wishlist']").on('click', function (event) {
			event.preventDefault();
			var $this = $(this);
			if ($this.hasClass('loading')) return;
			$this.addClass('loading');
			$this.toggleClass('course-wishlist');
			$this.toggleClass('course-wishlisted');
			$class = $this.attr('class');
			if ($this.hasClass('course-wishlisted')) {
				$.ajax({
					type   : "POST",
					url    : window.location.href,
					dataType: 'html',
					data   : {
						//action   : 'learn_press_toggle_course_wishlist',
						'lp-ajax': 'toggle_course_wishlist',
						course_id: $this.data('id'),
						nonce    : $this.data('nonce')
					},
					success: function () {
						$this.removeClass('loading')
					},
					error  : function () {
						$this.removeClass('loading')
					}
				});
			}
			if ($this.hasClass('course-wishlist')) {
				$.ajax({
					type   : "POST",
					url    : window.location.href,
					dataType: 'html',
					data   : {
						//action   : 'learn_press_toggle_course_wishlist',
						'lp-ajax': 'toggle_course_wishlist',
						course_id: $this.data('id'),
						nonce    : $this.data('nonce')
					},
					success: function () {
						$this.removeClass('loading')
					},
					error  : function () {
						$this.removeClass('loading')
					}
				});
			}
		});

	});

	$(document).on('click', '#course-review-load-more', function () {
		var $button = $(this);
		if (!$button.is(':visible')) return;
		$button.addClass('loading');
		var paged = parseInt($(this).attr('data-paged')) + 1;
		$.ajax({
			type    : "POST",
			dataType: 'html',
			url     : window.location.href,
			data    : {
				action: 'learn_press_load_course_review',
				paged : paged
			},
			success : function (response) {
				var $content = $(response),
						$new_review = $content.find('.course-reviews-list>li');
				$('#course-reviews .course-reviews-list').append($new_review);
				if ($content.find('#course-review-load-more').length) {
					$button.removeClass('loading').attr('data-paged', paged);
				} else {
					$button.remove();
				}
			}
		});
	});


	$(document).on('click', '.single-lp_course .course-meta .course-review .value', function () {
		var review_tab = $('.course-tabs a[href="#tab-course-review"]');
		if (review_tab.length > 0) {
			review_tab.trigger('click');
			$('body, html').animate({
				scrollTop: review_tab.offset().top - 50
			}, 800);
		}
	});

	//Widget live search course
	var search_timer = false;

	function thimlivesearch(contain) {
		var input_search = contain.find('.courses-search-input'),
				list_search = contain.find('.courses-list-search'),
				keyword = input_search.val(),
				loading = contain.find('.fa-search,.fa-times');

		if (keyword) {
			if (keyword.length < 1) {
				return;
			}
			loading.addClass('fa-spinner fa-spin');
			jQuery.ajax({
				type   : 'POST',
				data   : 'action=courses_searching&keyword=' + keyword + '&from=search',
				url    : ajaxurl,
				success: function (html) {
					var data_li = '';
					var items = jQuery.parseJSON(html);
					if (!items.error) {
						jQuery.each(items, function (index) {
							if (index == 0) {
								data_li += '<li class="ui-menu-item' + this['id'] + ' ob-selected"><a class="ui-corner-all" href="' + this['guid'] + '">' + this['title'] + '</a></li>';
							} else {
								data_li += '<li class="ui-menu-item' + this['id'] + '"><a class="ui-corner-all" href="' + this['guid'] + '">' + this['title'] + '</a></li>';
							}
						});
						list_search.html('').append(data_li);
					}
					thimsearchHover();
					loading.removeClass('fa-spinner fa-spin');
				},
				error  : function (html) {
				}
			});
		}
	}

	function thimsearchHover() {
		jQuery('.courses-list-search li').on('mouseenter', function () {
			jQuery('.courses-list-search li').removeClass('ob-selected');
			jQuery(this).addClass('ob-selected');
		});
	}

	jQuery(document).ready(function () {

		jQuery('.thim-course-search-overlay .search-toggle').on('click', function (e) {
			e.stopPropagation();
			var parent = jQuery(this).parent();
			jQuery('body').addClass('thim-search-active');
			setTimeout(function () {
				parent.find('.thim-s').focus();
			}, 500);

		});
		jQuery('.search-popup-bg').on('click', function () {
			var parent = jQuery(this).parent();
			window.clearTimeout(search_timer);
			parent.find('.courses-list-search').empty();
			parent.find('.thim-s').val('');
			jQuery('body').removeClass('thim-search-active');
		});

		jQuery('.courses-search-input').on('keyup', function (event) {
			clearTimeout(jQuery.data(this, 'search_timer'));
			var contain = jQuery(this).parents('.courses-searching'),
					list_search = contain.find('.courses-list-search'),
					item_search = list_search.find('>li');

			if (event.which == 13) {
				event.preventDefault();
				jQuery(this).stop();
			} else if (event.which == 38) {
				if (navigator.userAgent.indexOf('Chrome') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Chrome') + 7).split(' ')[0]) >= 15) {
					var selected = item_search.filter(".ob-selected");
					if (item_search.length > 1) {
						item_search.removeClass("ob-selected");
						// if there is no element before the selected one, we select the last one
						if (selected.prev().length == 0) {
							selected.siblings().last().addClass("ob-selected");
						} else { // otherwise we just select the next one
							selected.prev().addClass("ob-selected");
						}
					}
				}
			} else if (event.which == 40) {
				if (navigator.userAgent.indexOf('Chrome') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Chrome') + 7).split(' ')[0]) >= 15) {
					var selected = item_search.filter(".ob-selected");
					if (item_search.length > 1) {
						item_search.removeClass("ob-selected");

						// if there is no element before the selected one, we select the last one
						if (selected.next().length == 0) {
							selected.siblings().first().addClass("ob-selected");
						} else { // otherwise we just select the next one
							selected.next().addClass("ob-selected");
						}
					}
				}
			} else if (event.which == 27) {
				if (jQuery('body').hasClass('thim-search-active')) {
					jQuery('body').removeClass('thim-search-active');
				}
				list_search.html('');
				jQuery(this).val('');
				jQuery(this).stop();
			} else {
				var search_timer = setTimeout(function () {
					thimlivesearch(contain);
				}, 500);
				jQuery(this).data('search_timer', search_timer);
			}
		});
		jQuery('.courses-search-input').on('keypress', function (event) {
			var item_search = jQuery(this).parents('.courses-searching').find('.courses-list-search>li');

			if (event.keyCode == 13) {
				var selected = jQuery(".ob-selected");
				if (selected.length > 0) {
					var ob_href = selected.find('a').first().attr('href');
					window.location.href = ob_href;
				}
				event.preventDefault();
			}
			if (event.keyCode == 27) {
				if (jQuery('body').hasClass('thim-search-active')) {
					jQuery('body').removeClass('thim-search-active');
				}
				jQuery('.courses-list-search').html('');
				jQuery(this).val('');
				jQuery(this).stop();
			}
			if (event.keyCode == 38) {
				var selected = item_search.filter(".ob-selected");
				// if there is no element before the selected one, we select the last one
				if (item_search.length > 1) {
					item_search.removeClass("ob-selected");
					if (selected.prev().length == 0) {
						selected.siblings().last().addClass("ob-selected");
					} else { // otherwise we just select the next one
						selected.prev().addClass("ob-selected");
					}
				}
			}
			if (event.keyCode == 40) {
				var selected = item_search.filter(".ob-selected");
				if (item_search.length > 1) {
					item_search.removeClass("ob-selected");
					// if there is no element before the selected one, we select the last one
					if (selected.next().length == 0) {
						selected.siblings().first().addClass("ob-selected");
					} else { // otherwise we just select the next one
						selected.next().addClass("ob-selected");
					}
				}
			}
		});

		jQuery('.courses-list-search,.courses-search-input').on('click', function (event) {
			event.stopPropagation();
		});

		jQuery('body').on('click', function () {
			if (!jQuery('body').hasClass('course-scroll-remove')) {
				jQuery('body').addClass('course-scroll-remove');
			}
		});

		jQuery(window).scroll(function () {
			if (jQuery('body').hasClass('course-scroll-remove') && jQuery(".courses-list-search li").length > 0) {
				jQuery(".courses-searching .courses-list-search").empty();
				jQuery(".courses-searching .thim-s").val('');
			}
		});

		jQuery('.courses-search-input').on('focus', function () {
			if (jQuery('body').hasClass('course-scroll-remove')) {
				jQuery('body').removeClass('course-scroll-remove');
			}
		});


		//Widget icon box
		$(".wrapper-box-icon").each(function () {
			var $this = $(this);
			if ($this.attr("data-icon")) {
				var $color_icon = $(".boxes-icon", $this).css('color');
				var $color_icon_change = $this.attr("data-icon");
			}
			if ($this.attr("data-icon-border")) {
				var $color_icon_border = $(".boxes-icon", $this).css('border-color');
				var $color_icon_border_change = $this.attr("data-icon-border");
			}
			if ($this.attr("data-icon-bg")) {
				var $color_bg = $(".boxes-icon", $this).css('background-color');
				var $color_bg_change = $this.attr("data-icon-bg");
			}


			if ($this.attr("data-btn-bg")) {
				var $color_btn_bg = $(".smicon-read", $this).css('background-color');
				var $color_btn_border = $(".smicon-read", $this).css('border-color');
				var $color_btn_bg_text_color = $(".smicon-read", $this).css('color');

				var $color_btn_bg_change = $this.attr("data-btn-bg");
				if ($this.attr("data-text-readmore")) {
					var $color_btn_bg_text_color_change = $this.attr("data-text-readmore");
				} else {
					$color_btn_bg_text_color_change = $color_btn_bg_text_color;
				}

				$(".smicon-read", $this).on({
					'mouseenter': function () {
						if ($("#style_selector_container").length > 0) {
							if ($(".smicon-read", $this).css("background-color") != $color_btn_bg)
								$color_btn_bg = $(".smicon-read", $this).css('background-color');
						}
						$(".smicon-read", $this).css({
							'background-color': $color_btn_bg_change,
							'border-color'    : $color_btn_bg_change,
							'color'           : $color_btn_bg_text_color_change
						});
					},
					'mouseleave': function () {
						$(".smicon-read", $this).css({
							'background-color': $color_btn_bg,
							'border-color'    : $color_btn_border,
							'color'           : $color_btn_bg_text_color
						});
					}
				});

			}

			$(".boxes-icon", $this).on({
				'mouseenter': function () {
					if ($this.attr("data-icon")) {
						$(".boxes-icon", $this).css({'color': $color_icon_change});
					}
					if ($this.attr("data-icon-bg")) {
						/* for select style*/
						if ($("#style_selector_container").length > 0) {
							if ($(".boxes-icon", $this).css("background-color") != $color_bg)
								$color_bg = $(".boxes-icon", $this).css('background-color');
						}

						$(".boxes-icon", $this).css({'background-color': $color_bg_change});
					}
					if ($this.attr("data-icon-border")) {
						$(".boxes-icon", $this).css({'border-color': $color_icon_border_change});
					}
				},
				'mouseleave': function () {
					if ($this.attr("data-icon")) {
						$(".boxes-icon", $this).css({'color': $color_icon});
					}
					if ($this.attr("data-icon-bg")) {
						$(".boxes-icon", $this).css({'background-color': $color_bg});
					}
					if ($this.attr("data-icon-border")) {
						$(".boxes-icon", $this).css({'border-color': $color_icon_border});
					}
				}
			});

		});
		/* End Icon Box */

		//Background video
		$('.bg-video-play').on("click", function () {
			var elem = $(this),
					video = $(this).parents('.thim-widget-icon-box, .elementor-widget-thim-icon-box').find('.full-screen-video'),
					player = video.get(0);
			if (player.paused) {
				player.play();
				elem.addClass('bg-pause');
			} else {
				player.pause();
				elem.removeClass('bg-pause');
			}
		});


		//wpcf7-form-submit
		$(document).on('click', '.wpcf7-form-control.wpcf7-submit', function () {
			var elem = $(this),
					form = elem.parents('.wpcf7-form');
			form.addClass('thim-sending');
			$(document).on('invalid.wpcf7', function (event) {
				form.removeClass('thim-sending');
			});
			$(document).on('spam.wpcf7', function (event) {
				form.removeClass('thim-sending');
			});
			$(document).on('mailsent.wpcf7', function (event) {
				form.removeClass('thim-sending');
			});
			$(document).on('mailfailed.wpcf7', function (event) {
				form.removeClass('thim-sending');
			});
		});

	});


	//Include script plugin miniorange-login
	jQuery(window).on('load', function () {
 		// If cookie is set, scroll to the position saved in the cookie.
		if (jQuery.cookie("scroll") !== null) {
			jQuery(document).scrollTop(jQuery.cookie("scroll"));
			jQuery.cookie("scroll", null);
		}
		// When a button is clicked...
		jQuery('.custom-login-button').on("click", function () {
			// Set a cookie that holds the scroll position.
			jQuery.cookie("scroll", jQuery(document).scrollTop());
		});

		jQuery('.login-button').on("click", function () {
			// Set a cookie that holds the scroll position.
			jQuery.cookie("scroll", jQuery(document).scrollTop());

		});
	});

	//Include plugin event file events.js
	jQuery(document).ready(function () {

		// owl-carausel
		var carousels = $('.tp_event_owl_carousel');
		for (var i = 0; i < carousels.length; i++) {
			var data = $(carousels[i]).attr('data-countdown');
			var options = {
				navigation     : true, // Show next and prev buttons
				slideSpeed     : 300,
				paginationSpeed: 400,
				singleItem     : true
			};
			if (typeof data !== 'undefined') {
				data = JSON.parse(data);
				$.extend(options, data);

				$.each(options, function (k, v) {
					if (v === 'true') {
						options[k] = true;
					} else if (v === 'false') {
						options[k] = false;
					}
				});
			}

			if (typeof options.slide === 'undefined' || options.slide === true) {
				$(carousels[i]).owlCarousel(options);
			}
			else {
				$(carousels[i]).removeClass('owl-carousel');
			}
		}
	});

	// Sticky sidebar
	jQuery(document).ready(function () {
		var offsetTop = 20;
		if ($("#wpadminbar").length) {
			offsetTop += $("#wpadminbar").outerHeight();
		}
		if ($("#masthead.sticky-header").length) {
			offsetTop += $("#masthead.sticky-header").outerHeight();
		}
		if(jQuery("#sidebar.sticky-sidebar").length){
			jQuery("#sidebar.sticky-sidebar").theiaStickySidebar({
				"containerSelector"     : "",
				"additionalMarginTop"   : offsetTop,
				"additionalMarginBottom": "0",
				"updateSidebarHeight"   : false,
				"minWidth"              : "768",
				"sidebarBehavior"       : "modern"
			});
		}
	});

	// Prevent search when no content submited
	jQuery(document).ready(function () {
		$(".courses-searching form").submit(function () {
			var input_search = $(this).find("input[name='s']");
			if ($.trim(input_search.val()) === "") {
				input_search.focus();
				return false;
			}
		});

		$('form#bbp-search-form').submit(function () {
			if ($.trim($("#bbp_search").val()) === "") {
				$("#bbp_search").focus();
				return false;
			}
		});

		$("form.search-form").submit(function () {
			var input_search = $(this).find("input[name='s']");
			if ($.trim(input_search.val()) === "") {
				input_search.focus();
				return false;
			}
		});

		//Register form untispam
		$('form#registerform').submit(function (event) {
			var elem = $(this),
					input_username = elem.find('#user_login'),
					input_email = elem.find('#user_email'),
					input_captcha = $('.thim-login-captcha .captcha-result');

			if (input_captcha.length > 0) {
				var captcha_1 = parseInt(input_captcha.data('captcha1')),
						captcha_2 = parseInt(input_captcha.data('captcha2'));

				if (captcha_1 + captcha_2 != parseInt(input_captcha.val())) {
					input_captcha.addClass('invalid').val('');
					event.preventDefault();
				}
			}

			if (input_username.length > 0 && input_username.val() == '') {
				input_username.addClass('invalid');
				event.preventDefault();
			}

			if (input_email.length > 0 && input_email.val() == '') {
				input_email.addClass('invalid');
				event.preventDefault();
			}
		});

		$('#customer_login .register').submit(function (event) {
			var elem = $(this),
					input_username = elem.find('#reg_username'),
					input_email = elem.find('#reg_email'),
					input_pass = elem.find('#reg_password'),
					input_captcha = $('#customer_login .register .captcha-result');

			if (input_captcha.length > 0) {
				var captcha_1 = parseInt(input_captcha.data('captcha1')),
						captcha_2 = parseInt(input_captcha.data('captcha2'));

				if (captcha_1 + captcha_2 != parseInt(input_captcha.val())) {
					input_captcha.addClass('invalid').val('');
					event.preventDefault();
				}
			}

			if (input_pass.length > 0 && input_pass.val() == '') {
				input_pass.addClass('invalid');
				event.preventDefault();
			}

			if (input_username.length > 0 && input_username.val() == '') {
				input_username.addClass('invalid');
				event.preventDefault();
			}

			if (input_email.length > 0 && input_email.val() == '') {
				input_email.addClass('invalid');
				event.preventDefault();
			}
		});

		$('#customer_login .register, #reg_username, #reg_email, #reg_password, .thim-login-captcha .captcha-result, #registerform #user_login,#registerform #user_email').on('focus', function () {
			$(this).removeClass('invalid');
		});

		$('.thim-language').on({
			'mouseenter': function () {
				$(this).children('.list-lang').stop(true, false).fadeIn(250);
			},
			'mouseleave': function () {
				$(this).children('.list-lang').stop(true, false).fadeOut(250);
			}
		});



	});
	$(window).on('load', function () {
 		//thim_min_height_carousel($('.thim-carousel-instructors .instructor-item'));
		thim_min_height_carousel($('.thim-owl-carousel-post .image'));
		thim_min_height_carousel($('.thim-course-carousel .course-thumbnail'));
		thim_min_height_carousel($('.thim-progress-step .progress-step'));
		thim_min_height_carousel( $('.thim-timeline-slider .item .top') );
		thim_min_height_content_area();
	});

	function thim_min_height_carousel($selector) {
		var min_height = 0;
		$selector.each(function (index, val) {
			if ($(this).outerHeight() > min_height) {
				min_height = $(this).outerHeight();
			}
			if (index + 1 == $selector.length) {
				$selector.css('min-height', min_height);
			}
		});
	}

	function thim_min_height_content_area() {
		var content_area = $('#main-content .content-area'),
				footer = $('#main-content .site-footer'),
				winH = $(window).height();
		if (content_area.length > 0 && footer.length > 0) {
			content_area.css('min-height', winH - footer.height());
		}
	}


	//Widget counter box
	(function (a) {
		a.fn.countTo = function (g) {
			g = g || {};
			return a(this).each(function () {
				function e(a) {
					a = b.formatter.call(h, a, b);
					f.html(a);
				}

				var b = a.extend({}, a.fn.countTo.defaults, {
					from           : a(this).data("from"),
					to             : a(this).data("to"),
					speed          : a(this).data("speed"),
					refreshInterval: a(this).data("refresh-interval"),
					decimals       : a(this).data("decimals")
				}, g), j = Math.ceil(b.speed / b.refreshInterval), l = (b.to - b.from) / j, h = this, f = a(this), k = 0, c = b.from, d = f.data("countTo") || {};
				f.data("countTo", d);
				d.interval && clearInterval(d.interval);
				d.interval =
						setInterval(function () {
							c += l;
							k++;
							e(c);
							"function" == typeof b.onUpdate && b.onUpdate.call(h, c);
							k >= j && (f.removeData("countTo"), clearInterval(d.interval), c = b.to, "function" == typeof b.onComplete && b.onComplete.call(h, c));
						}, b.refreshInterval);
				e(c);
			});
		};
		a.fn.countTo.defaults = {
			from       : 0, to: 0, speed: 1E3, refreshInterval: 100, decimals: 0, formatter: function (a, e) {
				return a.toFixed(e.decimals);
			}, onUpdate: null, onComplete: null
		};
	})(jQuery);

	jQuery(window).on('load', function () {

		if (jQuery().waypoint) {
			jQuery('.counter-box').waypoint(function () {
				jQuery(this).find('.display-percentage').each(function () {
					var percentage = jQuery(this).data('percentage');
					jQuery(this).countTo({from: 0, to: percentage, refreshInterval: 40, speed: 1000});
				});
			}, {
				triggerOnce: true,
				offset     : 'bottom-in-view'
			});
		}

	});

	//thim-round-slider
	$('.thim-round-slider').each(function () {
		var elem = $(this),
				item_visible = 2,
				autoplay = elem.data('autoplay') ? true : false,
				mousewheel = elem.data('mousewheel') ? true : false;

		var thim_round_slider = $(this).thimContentSlider({
			items            : elem,
			itemsVisible     : item_visible,
			mouseWheel       : mousewheel,
			autoPlay         : autoplay,
			itemMaxWidth     : 400,
			itemMinWidth     : 200,
			activeItemRatio  : 1.5,
			activeItemPadding: -70,
			itemPadding      : 0,
			imageSelector    : '.image'
		});

	});

	$(document).on('click', '.thim-round-slider .image img, .thim-round-slider .image .icon', function (e) {
		e.preventDefault();
		var elem = $(this),
				data_key = elem.data('key'),
				parent = elem.parents('.thim-round-slider-container'),
				popup_content = parent.find('.round-slider-content[data-key="' + data_key + '"]');

		$.magnificPopup.open({
			items: {
				src: popup_content,
				type: 'inline'
			}
		});
	});

	$(document).on('click', '.thim-quantity .action', function () {
		var elem = $(this),
				input = elem.parent().find('input[type="number"]'),
				input_val = parseInt(input.val());
		if ($(this).hasClass('minus')) {
			if (input_val > 1) {
				input.val(input_val - 1);
			}

		} else {
			input.val(input_val + 1);
		}
	});

	$(document).on('click', '.product-quantity .thim-quantity .action', function () {
		$('#main-content .woocommerce-cart-form button[name="update_cart"]').removeAttr("disabled");
	});

	equalheight = function(container){
		var flag = 0;
		$(container).each(function() {

			var itemHeight = $(this).height();
			flag < itemHeight ? flag = itemHeight : flag;
			$(this).height(flag);
		});
	};

	jQuery(window).on('load', function () {
		setTimeout( function(){
			$('.thim-testimonial-before-after .testimonial-image').each(function(){
				var elem = $(this);
				elem.twentytwenty({default_offset_pct: 0.5})
			});
		}, 200);
	});

	$(window).resize(function(){
		equalheight('.thim-progress-step .progress-step');
	});

	$(document).ready(function() {
		$("#des-readmore-link").on('click',function () {
			$('html, body').animate({
				scrollTop: $(".woocommerce-tabs.wc-tabs-wrapper").offset().top
			}, 500);
		});

		$('#optin input').on('focus',function(){
			$('#optin').addClass('icon-focus');
		});
		$('#optin input').on('focusout',function(){
			$('#optin').removeClass('icon-focus');
		});
	});

	jQuery(document).ready(function () { 

		jQuery('.menu-right .widget.widget_search').on('click', function (e) {
			e.stopPropagation();
			jQuery('body').addClass('thim-search-active');
		});
		jQuery('.menu-right .widget.widget_search .search-popup-bg').on('click', function (e) {
			e.stopPropagation();
			jQuery('body').removeClass('thim-search-active');
		});

		if( $('.panel-grid .widget_text .the_champ_login_container').prev().length > 0 ){
			$('.panel-grid .widget_text .the_champ_login_container').prev().addClass('login-title');
		}

		//Resize window when click certificate tab on page profile
		$('.profile-tabs #user_certificates').on('click', function () {
			$(window).resize();
		});

		if (typeof LP != 'undefined') {
			LP.Hook.addAction('learn_press_receive_message', function () {
				var lesson_title = $('.course-item.item-current .course-item-title').text(),
					lesson_index = $('.course-item.item-current .index').text();
				$('#popup-header .popup-title').html('<span class="index">' + lesson_index + '</span>' + lesson_title);
			})
		}
		
	});

})(jQuery);

