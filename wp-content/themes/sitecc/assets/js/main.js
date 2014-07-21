$(document).ready(function() {
	$('#slider').nivoSlider({
		effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
		slices: 15,                     // For slice animations
		boxCols: 8,                     // For box animations
		boxRows: 4,                     // For box animations
		animSpeed: 500,                 // Slide transition speed
		pauseTime: 3000,                // How long each slide will show
		startSlide: 0,                  // Set starting Slide (0 index)
		directionNav: true,             // Next & Prev navigation
		controlNav: true,               // 1,2,3... navigation
		controlNavThumbs: false,        // Use thumbnails for Control Nav
		pauseOnHover: true,             // Stop animation while hovering
		manualAdvance: false,           // Force manual transitions
		prevText: 'Prev',               // Prev directionNav text
		nextText: 'Next',               // Next directionNav text
		randomStart: false,             // Start on a random slide
		beforeChange: function(){},     // Triggers before a slide transition
		afterChange: function(){},      // Triggers after a slide transition
		slideshowEnd: function(){},     // Triggers after all slides have been shown
		lastSlide: function(){},        // Triggers when last slide is shown
		afterLoad: function(){}         // Triggers when slider has loaded
	});

	$("#voltar-topo").on('click', function(e){
		e.preventDefault();

		$('html,body').animate({
			scrollTop: 0
		}, 2000);


		return false;
	});

	if ($('.docentes').length) {
		
		var paginaAtual = 1;
		var carregando = false;
		var link = document.URL;
		var terminou = false;

		if (link[link.length - 1] != '/') {
			link += "/";
		}

		$(window).on("scroll", function(e) {
			if (carregando || terminou) {
				return true;
			}

			var estaNaTela = ($(window).scrollTop() + ($(window).height()*($(window).height()*2)))  >= $("#post-nav").offset().top;

			if (estaNaTela) {
				paginaAtual += 1;
				carregando = true;

				$(".imagem-carregando").fadeIn(400);

				$.get(link + "page/" + paginaAtual).done(function(resposta, status) {
					setTimeout(function() {

					var docentes = $(resposta).find(".docente");
					
					for (var i = 0; i < docentes.length; i++) {
						$(".docentes").append(docentes[i]);
					}

					carregando = false;
					$(".imagem-carregando").fadeOut(400);
					}, 2000);
				}).fail(function() {
					$(".imagem-carregando").fadeOut(400);
					terminou = true;
					return;
				});
			}

		});
	};
});