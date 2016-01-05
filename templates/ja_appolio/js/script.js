/**
 *------------------------------------------------------------------------------
 * @package       T3 Framework for Joomla!
 *------------------------------------------------------------------------------
 * @copyright     Copyright (C) 2004-2013 JoomlArt.com. All Rights Reserved.
 * @license       GNU General Public License version 2 or later; see LICENSE.txt
 * @authors       JoomlArt, JoomlaBamboo, (contribute to this project at github
 *                & Google group to become co-author)
 * @Google group: https://groups.google.com/forum/#!forum/t3fw
 * @Link:         http://t3-framework.org
 *------------------------------------------------------------------------------
 */

(function ($) {

	//moible video helper 
	$.fn.mobileVideo = function (element) {
		return this.each(function () {

			var orgvideo = this,
				video = document.createElement('video'),
				image = document.createElement('img'),
				loaded = false,
				videoplayed = function () {
					video.play();

					if (loaded) {
						$(document).off('touchstart', videoplayed);
					}
				},
				onresize = function () {
					video.width = window.innerWidth;
					video.height = window.innerWidth * (video.videoHeight || 9) / (video.videoWidth || 16);
				};

			video.src = $(orgvideo).find('source[type="video/mp4"]').attr('src'); //mp4 is fine
			video.poster = orgvideo.poster;
			video.preload = orgvideo.preload;
			video.loop = orgvideo.loop;

			$(video).addClass('mobile-video').insertAfter(orgvideo);
			$(orgvideo).remove();

			$(image).css({
				position: 'absolute',
				top: '0',
				left: '0',
				width: window.innerWidth,
				height: (window.innerWidth * 9 / 16)
			}).attr('src', video.poster).insertAfter(video);

			$(video).on('loadeddata play', function () {
				loaded = true;

				//remove it
				$(image).remove();
			});

			//mobile device required user interaction
			$(document).on('touchstart', videoplayed);

			//autoplay if possible
			video.load();
			video.play();

			//resize when
			$(window).on('resize orientationchange', function () {
				setTimeout(onresize, 200)
			});
			onresize();
		})
	};

})(jQuery);


(function ($) {

	// browser detector
	(function () {
		var browser = '';
		if (/constructor/i.test(window.HTMLElement)) {
			browser = 'safari';
		} else if ('-ms-scroll-limit' in document.documentElement.style && '-ms-ime-align' in document.documentElement.style) {
			browser = 'ie11';
		} else if (document.documentElement.style.msTouchAction !== undefined) {
			browser = 'ie10';
		}

		browser && $('html').addClass(browser);
	})();

	$(document).ready(function ($) {
		
		// Add Placeholder form login
		if ($('.login-wrap').length > 0) {
			$('#username').attr('placeholder','Username');
			$('#password').attr('placeholder','Password');
		}
		
		// Remove "Or" text after login
		if ($('.slogin .logout-button').length > 0) {
			$('.slogin').addClass('shide');
		}
		
		if (navigator.userAgent.match(/(iPod|iPhone|iPad)/) && navigator.userAgent.match(/AppleWebKit/)) {
			$('.t3-video video').mobileVideo();
		}

		if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
			$('.section-mask img').each(function () {
				imgsrc = $(this).attr('src');
				$(this).closest('div.section-mask').css({
					'background': 'url(' + imgsrc + ') 50% 0 no-repeat fixed'
				}).parallax("50%", 0.1);
				$(this).remove();
			});
		}

		//Check div message show
		if ($("#system-message").children().length) {
			$("#system-message-container").show();
			$("#system-message a.close").click(function () {
				setTimeout(function () {
					if (!$("#system-message").children().length) $("#system-message-container").hide();
				}, 100);
			});
		} else {
			$("#system-message-container").hide();
		}

		//Add affix header
		$('#t3-header').affixmenu();

		//inview events
		$('.parallax').bind('inview', function (event, visible, visiblePartX, visiblePartY) {
			if (visible) {
				if (visiblePartY == 'bottom' || visiblePartY == 'both') {
					if(!$(this).hasClass('section-mask')){
						$(this).addClass('inview');
					}
				}
			}
		});
		

		// back to top
		$(window).scroll(function () {
			if ($(this).scrollTop() > 0) {
				if ($('html').attr('dir') == 'rtl') {
					$('#back-to-top').css('left', (($('body').width() - jQuery('.container').width()) / 2) - 100).removeClass('deactive').addClass('active');
				} else {
					$('#back-to-top').css('right', (($('body').width() - jQuery('.container').width()) / 2) - 100).removeClass('deactive').addClass('active');
				}
			} else {
				$('#back-to-top').removeClass('active').addClass('deactive');
			}
		});

		(function () {
			$('#back-to-top').on('click', function () {
				$('html, body').stop(true).animate({
					scrollTop: 0
				}, {
					duration: 800,
					easing: 'easeInOutCubic',
					complete: window.reflow
				});

				return false;
			});
		})();
	});
})(jQuery);
