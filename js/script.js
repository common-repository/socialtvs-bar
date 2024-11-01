	var $ = jQuery;
	$(document).ready(function() {
		//console.log('test');
		$('#socialstv_player').html('').css('z-index', '-99999').css('background', '').css('height', $(window).height());
		function close_video() {
			$('#socialstv_player').html('').css('z-index', '-99999').css('background', '');
			$('body').css('overflow', 'auto');
			$('html').css('overflow-y', 'auto');
			$('.close_current_video').hide();
			
		}
		
		
		$(document).on('click', '.change_tracker_URL', function() {
			var width = $(window).width();
			var height = $(window).height()-40;
			$('#socialstv_player').html('<iframe width="100%" height="100%" src="'+$(this).data('href')+'" frameborder="0" allowfullscreen></iframe>').css('z-index', '99999').css('background', '#343434');

			$('body').css('overflow', 'hidden');
			$('html').css('overflow', 'hidden');
			$('.close_current_video').show();
			
		});
		
		$(document).on('click', '.socialtv-close, .close_current_video', function() {
			close_video();
		});
	});
