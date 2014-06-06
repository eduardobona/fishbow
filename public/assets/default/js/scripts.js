/*
 * updates the countdown timer
 */
function updateTime(elem, days, hours, minutes, seconds) {
	var content = '<h1>';

	content += '<span class="days">';
	content += (days < 10) ? '0' + days : days;
	content += '</span> : <span class="hours">';
	content += (hours < 10) ? '0' + hours : hours;
	content += '</span> : <span class="minutes">';
	content += (minutes < 10) ? '0' + minutes : minutes;
	content += '</span> : <span class="seconds">';
	content += (seconds < 10) ? '0' + seconds : seconds;
	content += '</span>';

	$(elem).html(content);
}

(function($) {
	jQuery.fn.doesExist = function(){
		return jQuery(this).length > 0;
	};

	$(document).ready(function() {

		// Search field toggle in top bar
		$('#top-links li.search a').click(function(e) {
			$(this).parent().find('#top-search').toggle().focus();
			$('#top-links').toggleClass('search-open');
			e.preventDefault();
		});

		function setFooterSeparators() {
			$('.footer-col').each(function() {
				$(this).height("auto");
			});

			if (parseInt($(window).width()) < 768) 
				return;

			var max = 0;
			$('.footer-col').each(function() {
				if (parseInt($(this).height()) > max)
					max = parseInt($(this).height());
			});

			$('.footer-col').each(function() {
				$(this).height(max + "px");
			});
		}

		setFooterSeparators();

		$(window).resize(function() {
			setFooterSeparators();
		});

		// go to top link
		$("a[href='#top']").click(function() {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});

		/*
		 * event view styles
		 */
		 $(".view a[href='#grid']").click(function() {
		 	$('#upcoming-events').removeClass('list-style');
		 	$('#upcoming-events').addClass('grid-style');

		 	$(this).parent().find('a').removeClass('current');
		 	$(this).addClass('current');
		 	return false;
		 });

		 $(".view a[href='#list']").click(function() {
		 	$('#upcoming-events').addClass('list-style');
		 	$('#upcoming-events').removeClass('grid-style');

		 	$(this).parent().find('a').removeClass('current');
		 	$(this).addClass('current');
		 	return false;
		 });

		/*
		 * audio players
		 */
		 if (typeof audiojs != 'undefined') {
		 	audiojs.events.ready(function() {
		 		var as = audiojs.createAll();
		 		var playing;
		 		$('.audiojs').on('click', function () {
		 			var id = $(this).attr('id').substr(15);
		 			if (id == playing)
		 				return;
		 			for (var i = 0; i < as.length; i++) {
		 				as[i].pause();
		 			}
		 			as[id].play();
		 			playing = id;
		 		});
		 	});
		 }

		/*
		 * Contact form
		 */
		 $(".contact").submit(function() {
		 	var form = $(this);
		 	var script = $(this).attr("action");
		 	$.ajax({
			 		type : "POST",
			 		url : script,
			 		dataType : "html",
			 		data : $(this).serialize(),
			 		beforeSend : function() {
			 			form.find('.loading').remove();
			 			form.find('.dynamic').html('<div class="loading"><i class="fa fa-3x fa-spinner fa-spin"></i></div>');
					},
					success : function(response) {
						form.find(".loading").remove();
			 			form.find('.dynamic').html('<h4><span>' + response + '</span></h4>');
			 			form.each(function() {
			 				this.reset();
			 			});
					}
			});
		 	return false;
		});

		 $('.panel-title > a, .panel-title > a:after').on('click', function(){
		 	$('.panel-title > a').removeClass('open');
		 	if (!$(this).parent().parent().parent().find('.panel-collapse').hasClass('in'))
		 		$(this).addClass('open');
		 });

		 $('.toggle').find('.panel-collapse.in').parent().find('.panel-heading').hide();
		 $('.toggle .panel-title > a, .panel-title > a:after').on('click', function(){
		 	$($(this).attr('data-parent')).find('.panel-collapse.in').parent().find('.panel-heading').show();
		 	$(this).parent().parent().hide();
		 });  
		 

	});

	$(window).load(function() {
		// homepage banner
		if ($('#banner .flexslider').doesExist()) {
			$('#banner .flexslider').flexslider({
				directionNav: false,
			});
		}

		// event image gallery
		if ($('.flexslider.event-gallery').doesExist()) {
			$('.flexslider.event-gallery').flexslider({
				controlNav: false,
				prevText: '<i class="fa fa-chevron-left"></i>',
				nextText: '<i class="fa fa-chevron-right"></i>',
			});
		}

    	// blog post galleries
    	if ($('.flexslider.post-gallery').doesExist()) {
    		$('.flexslider.post-gallery').flexslider({
    			directionNav: false
    		});
    	}

    	/*
    	 * artists isotope filtering
    	 */

		// cache container
		var $artists = $('.artists');
		// initialize isotope
		if ($artists.doesExist()) 		
			$artists.isotope();

		// filter items when filter link is clicked
		$('.isotope-filters.artist-filter a').click(function() {
			var selector = $(this).attr('data-filter');
			$artists.isotope({ filter: selector });

			$('.isotope-filters.artist-filter').find('li').removeClass('current');
			$(this).parent().addClass('current');

			return false;
		});

		/*
    	 * albums isotope filtering
    	 */

		// cache container
		var $albums = $('.albums');
		// initialize isotope
		if ($albums.doesExist()) 		
			$albums.isotope();

		// filter items when filter link is clicked
		$('.isotope-filters.album-filter a').click(function() {
			var selector = $(this).attr('data-filter');
			$albums.isotope({ filter: selector });

			$('.isotope-filters.album-filter').find('li').removeClass('current');
			$(this).parent().addClass('current');

			return false;
		});

		/*
    	 * galleries isotope filtering
    	 */

		// cache container
		var $galleries = $('.galleries');
		// initialize isotope
		if ($galleries.doesExist()) 		
			$galleries.isotope();

		// filter items when filter link is clicked
		$('.isotope-filters.galleries-filter a').click(function() {
			var selector = $(this).attr('data-filter');
			$galleries.isotope({ filter: selector });

			$('.isotope-filters.galleries-filter').find('li').removeClass('current');
			$(this).parent().addClass('current');

			return false;
		});

		$('.gallery-link').on('click', function () {
			$(this).next().magnificPopup('open');
		});

		$('.gallery-images').each(function () {
			$(this).magnificPopup({
				delegate: 'li a',
				type: 'image',
				gallery: {
					enabled: true,
					navigateByImgClick: true
				},
				fixedContentPos: false
			});
		});

		/*
    	 * video isotope filtering
    	 */

		// cache container
		var $videos = $('.videos');
		// initialize isotope
		if ($videos.doesExist()) 		
			$videos.isotope();

		// filter items when filter link is clicked
		$('.isotope-filters.videos-filter a').click(function() {
			var selector = $(this).attr('data-filter');
			$videos.isotope({ filter: selector });

			$('.isotope-filters.videos-filter').find('li').removeClass('current');
			$(this).parent().addClass('current');

			return false;
		});

		if ($('.video-link').doesExist()) {
			$('.video-link').magnificPopup({
				type: 'iframe',
				iframe: {

					patterns: {
						youtube: {
	      					index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

	      					id: 'v=', // String that splits URL in a two parts, second part should be %id%
	      								// Or null - full URL will be returned
	      								// Or a function that should return %id%, for example:
	      								// id: function(url) { return 'parsed id'; } 

	      					src: 'http://www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
	      				}
	      			}
	      		}
      		});
		}


		/*
    	 * grid blog
    	 */

		// cache container
		var $blog = $('.grid-blog');
		// initialize isotope
		if ($blog.doesExist()) {
			$blog.isotope({layoutMode:'masonry'});
		}
	});

$(window).resize(function() {
	if ($('.grid-blog').doesExist())
		$('.grid-blog').isotope( 'reLayout' );
});
})(jQuery);