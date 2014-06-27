//Lunardi

/*
|	Função: moveIndicador
|	Verifica o atual item com a classe "Ativo" e move o #indicador para a posição atual do "Ativo".
|
*/
function moveIndicador() {

	if ($(".menu-item").hasClass("ativo")) {
		var item, itemWidth, itemX, offset;

		item = $(".ativo");

		offset = item.offset();

		itemWidth = item.width();
		itemX = offset.left;

		$("#indicador").stop(false).animate({"width": ((itemWidth + 10) + 'px'), "left": ((itemX - 5) + 'px')}, 400);
	}
}

/*
|	Função: verificaAtivo
|	Atualiza o elemento "el" com a classe "Ativo" e promove a movimentação do #indicador
|	
*/
function verificaAtivo(el) {
	$(".menu-item").removeClass("ativo");
	el.addClass('ativo');
	moveIndicador();
}

//Controle de botões "Curtir" e "Favoritos"
$(document).on("click", ".bt-fav", function(e) {
	e.preventDefault();

	var imagem = $(this).children();

	if (imagem.attr('class') != 'press') {
		imagem.attr('class', 'press');
		imagem.attr('src', 'assets/img/bt-like-ativo.png');
	} else {
		imagem.attr('class', 'despress');
		imagem.attr('src', 'assets/img/bt-like.png');
	}
});

$(document).on("click", ".bt-curtir", function(e) {
	e.preventDefault();

	var imagem = $(this).children();

	if (imagem.attr('class') != 'press') {
		imagem.attr('class', 'press');
		imagem.attr('src', 'assets/img/bt-curtir-ativo.png');
	} else {
		imagem.attr('class', 'despress');
		imagem.attr('src', 'assets/img/bt-curtir.png');
	}
});
//Fim do controle

$(document).ready(function() {

	var irAtivo;

	moveIndicador();
	$(".ativo").addClass('preAtivo');

	$('.menu-item').hoverIntent(
		function() {
			clearTimeout(irAtivo);
			verificaAtivo($(this));
		},
		function() {
			irAtivo = setTimeout(function() {
	 				verificaAtivo($('.preAtivo'));
	 			}, 1500);
		}
	);

	// $(".menu-item").mouseover(function() {
	// 	clearTimeout(irAtivo);
	// 	verificaAtivo($(this));
	// });

	// $(".menu-item").mouseout(function() {
	// 	irAtivo = setTimeout(function() {
	// 				verificaAtivo($('.preAtivo'));
	// 			}, 1500);
	// });

	$(".group-imoveis").gridalicious({
		selector: '.imovel-detalhe',
		gutter: 20,
		animate: true,
		effect: 'fadeInOnAppear',
		width: 300
	});

});
