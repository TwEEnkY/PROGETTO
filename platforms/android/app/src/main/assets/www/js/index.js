const TESTE = false;
const API = 'http://app.setbus.com.br';
var protocolo_maps = 'maps';
var devicePlatform;
var map, markers;
var firstShowRede = true;
var geoCenter = {lat: -14.7084544, lng: -53.4079208};
var geoZoom = 4;
var gotUserLocation = false;
var produtoSwiper, noticiaSwiper;
var firstLoad = true;
var imagens_produtos_carregadas = 0;
document.addEventListener('deviceready', startApp);

/*if(TESTE){
	$(document).ready(function(){
		
		startApp();
	});
}*/

function exibirSplash(){
	return false;
	if(TESTE){
		if($("#carregando").size() > 0){
			$("#carregando").remove();
		}
		$('<div id="carregando"><div>CARREGANDO</div></div>').appendTo('body');
	}else{
		navigator.splashscreen.show();
	}
}
function esconderSplash(){
	if(TESTE){
		$("#carregando").fadeOut(500);
	}else{
		navigator.splashscreen.hide();
	}
}

function alertar(msg){
	if(TESTE){
		alert(msg);
	}else{
		navigator.notification.alert(msg, null, "Aviso");
	}
}

function startApp(){
	window.FirebasePlugin.hasPermission(function(data){
		if(!data.isEnabled){
			window.setTimeout(function(){
				window.FirebasePlugin.grantPermission();
			},3000);
		}
	});
	window.FirebasePlugin.onTokenRefresh(function(token) {

		$.ajax({
			url: API,
			method: 'POST',
			data: {
				method: 'addPush',
				token: token
			},
			success: function(e){
			},
			error: function(e1,e2,e3){
			},
			complete: function(){
			}
		});

		window.FirebasePlugin.subscribe("valeo");

	}, function(error) {
	    alert(error);
	});
	translateAll();
	$.mobile.defaultPageTransition = 'slide';
	FastClick.attach(document.body);	


	if(!TESTE){
		devicePlatform = device.platform;
		if(devicePlatform.toLowerCase() == 'ios'){
			protocolo_maps = 'http://maps.apple.com/?q=';
		}else{
			protocolo_maps = 'geo://?q=';
		}
	}

	$("[data-role=panel]").enhanceWithin().panel();

	$(document).on("pageshow","#rede-assistencia",function(){ // When entering pagetwo
		window.setTimeout(function(){
			if(typeof map == 'undefined'){return;}
			google.maps.event.trigger(map, 'resize');
			if(firstShowRede){
				map.setCenter(geoCenter);
				if(gotUserLocation){
					map.setZoom(9);
					geoZoom = 9;
				}
				firstShowRede = false;
			}
		},500);
	});


	exibirSplash();

	console.log('carregarInfos');

	carregarInformacoes();
	console.log('carregarInfos OK');

	navigator.geolocation.getCurrentPosition(function(r){
		geoCenter = {lat: r.coords.latitude, lng: r.coords.longitude};
		gotUserLocation = true;
	}, function(){

	});


	$("#produtos select[name='categoria']").on('change', function(){
		if($(this).val() == ''){
			$("#produtos-listagem .produto").show();
		}else{
			$("#produtos-listagem .produto").hide();
			$("#produtos-listagem .produto[data-categoria='"+$(this).val()+"']").show();
		}
	});


	$("#manuais select[name='categoria']").on('change', function(){
		if($(this).val() == ''){
			$("#manuais-listagem .manual").show();
		}else{
			$("#manuais-listagem .manual").hide();
			$("#manuais-listagem .manual[data-categoria='"+$(this).val()+"']").show();
		}
	});


	$("#videos select[name='categoria']").on('change', function(){
		if($(this).val() == ''){
			$("#videos-listagem .video").show();
		}else{
			$("#videos-listagem .video").hide();
			$("#videos-listagem .video[data-categoria='"+$(this).val()+"']").show();
		}
	});


	$("#contatos select[name='categoria']").on('change', function(){
		if($(this).val() == ''){
			var nomes_adicionados = [];
			$("#contatos-listagem .contato").hide();
			$("#contatos-listagem .contato").each(function(){
				if($.inArray($(this).data('titulo'), nomes_adicionados) >= 0){
					$(this).hide();
				}else{
					nomes_adicionados.push($(this).data('titulo'));
					$(this).show();
				}
			});
		}else{
			$("#contatos-listagem .contato").hide();
			$("#contatos-listagem .contato[data-estado='"+$(this).val()+"']").show();
		}
	});


	$("#rede-detalhamento select[name='estado']").on('change', function(){
		if($(this).val() == ''){
			$("#rede-detalhamento .contato").show();
		}else{
			$("#rede-detalhamento .contato").hide();
			$("#rede-detalhamento .contato[data-estado='"+$(this).val()+"']").show();
		}
		$("#rede-detalhamento .exibirTodos").hide();
	});
	
	$("#rede-detalhamento .exibirTodos").on('click', function(){
		$("#rede-detalhamento select[name='estado']").trigger('change');
	});

	$("#rede-assistencia select[name='estado']").on('change', function(){
		if($(this).val() == ''){
			map.setCenter(geoCenter);
		}else{
			exibirSplash();
			var geo = new google.maps.Geocoder;
			geo.geocode({'address':$(this).val()},function(results, status){
				if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter({lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()});
					map.setZoom(7);
				} else {
					console.error("Geocode was not successful for the following reason: " + status);
				}
				esconderSplash();
			});
		}
	});

	$("#enviarArquivo form").on('submit', function(e){
		e.preventDefault();

		exibirSplash();

		var nome = $(this).find('input[name="nome"]').val();
		var email = $(this).find('input[name="email"]').val();
		var arquivo = $(this).find('input[name="arquivo"]').val();

		$.ajax({
			url: API,
			method: 'POST',
			data: {
				method: 'enviarArquivo',
				nome: nome,
				email: email,
				arquivo: arquivo,
				language: getLanguage()
			},
			success: function(e){
				alertar('Arquivo enviado com sucesso!');
				history.back(-1);
			},
			error: function(e1,e2,e3){
				console.error(e1,e2,e3);
				alertar('Erro ao enviar arquivo. Por favor, tente novamente mais tarde!');
			},
			complete: function(){
				esconderSplash();
			}
		});
	});


	$(document).on('click', '.mais-info', function(e){
		e.preventDefault();
		$("#rede-detalhamento select[name='estado']").val($(this).data('e')).trigger('change');
		$("#rede-detalhamento .contato").hide();
		$("#rede-detalhamento .contato[data-estado='"+$(this).data('e')+"'][data-i='"+$(this).data('i')+"']").show()
		$("#rede-detalhamento .exibirTodos").show();

		$.mobile.changePage("#rede-detalhamento");
	}).on('click', '.produto', function(e){
		e.preventDefault();
		e.stopPropagation();

		carregarProduto($(this).data('obj'));
	}).on('click', '.noticia', function(e){
		e.preventDefault();
		e.stopPropagation();

		carregarNoticia($(this).data('obj'));
	}).on('click', ".manual .email", function(e){
		e.preventDefault();
		$("#enviarArquivo input[name='arquivo']").val($(this).attr('href'));
		$.mobile.changePage("#enviarArquivo", {transition: 'slideup'});
	}).on('click', '.logo', function(){
		$.mobile.changePage("#home");
	}).on('click', '#enviarArquivo .fa-times', function(){
		history.back(-1);
	}).on('change', 'select[name="idioma"]', function(){
		exibirSplash();
		$('.language-value').html(translation.languages[$(this).val()]);
		changeLanguage($(this).val());
		carregarInformacoes();
		$('select[name="idioma"]').val(getLanguage());
	}).on('click', '.manual-download', function(e){
		e.preventDefault();

		exibirSplash();
		DocumentHandler.previewFileFromUrlOrPath(
		    function () {
			    esconderSplash();
			    }, function (error) {
			    	alertar('Erro ao abrir arquivo.');
			    if (error == 53) {
			        console.log('No app that handles this file type.');
			    }else if (error == 2){
			        console.log('Invalid link');
			    }else{console.log(error);}
			},
			$(this).attr('href'), 
			'pdf-sample'
		);
		//window.open($(this).attr('href'), '_system');
	});

	$('select[name="idioma"]').val(getLanguage());
	$('.language-value').html(translation.languages[$('select[name="idioma"]').val()]);
	changeLanguage($('select[name="idioma"]').val());

}

function carregarInformacoes(){
	$.ajax({
		url: API,
		data: {method: 'appInicio', language: getLanguage(), cache: '2'},
		method: 'GET',
		dataType: 'json',
		success: function(e){
			console.log('carregarInfos COMPLETED');

			carregarNoticias(e.novidades);
			carregarProdutos(e.produtos);
			carregarManuais(e.manuais);
			carregarVideos(e.videos);
			carregarContatos(e.contatos);
			carregarRepresentantes(e.representantes);

			translateAll();
			esconderSplash();
		},
		error: function(e1,e2,e3){
			console.error(e1,e2,e3);
			alertar('Você parece estar sem internet!');
		}
	});
}

function carregarNoticias(noticias){
	$("#noticias-listagem, #noticia-principal").html('');
	var first = true;
	for(var i in noticias){
		var n = noticias[i];
		var d = $('<div class="noticia"><a href="#noticia" class="clearfix"><span class="imagem"></span><span class="texto"><span class="data"></span><span class="titulo"></span></span></a></div>');
		if(typeof n.foto != 'undefined' && n.foto.length > 0){
			$(d).find('.imagem').css('background-image', 'url('+n.foto+')');
		}else{
			$(d).find('.imagem').remove();
			$(d).addClass('sem-imagem');
		}
		$(d).find('.titulo').html(n.titulo);
		$(d).find('.data').html(n.data);

		$(d).appendTo('#noticias-listagem');
		$(d).data('obj', n);

		if(first){
			$(d).clone().data('obj', n).appendTo("#noticia-principal");
			first = false;
		}
	}
}

function carregarNoticia(p){
	$("#noticia .titulo").html(p.titulo);
	$("#noticia .texto").html(p.texto);
	$("#noticia .topo-noticia").html(p.topo);

	if(typeof noticiaSwiper != 'undefined'){
		noticiaSwiper.removeAllSlides();
		if(p.fotos.length > 0){
			for(var i in p.fotos){
				noticiaSwiper.appendSlide('<div class="swiper-slide"><img src="'+p.fotos[i]+'"/></div>');
			}
		}
	}else{
		$("#noticia-fotos").html('<div class="swiper-wrapper"></div><div class="swiper-pagination"></div>');
		if(p.fotos.length > 0){
			for(var i in p.fotos){
				$("#noticia-fotos .swiper-wrapper").append('<div class="swiper-slide"><img src="'+p.fotos[i]+'"/></div>');
			}

			noticiaSwiper = new Swiper ("#noticia-fotos", {
				pagination: '.swiper-pagination',
				spaceBetween: 20,
				autoHeight: true
			});
		}
	}

	$.mobile.changePage("#noticia");
}

function carregarProdutos(categorias){
	$("#produtos-listagem").html('');
	$("#produtos select[name='categoria']").html('<option value="" data-translate="todasCategorias"></option>');
	for(var i in categorias){
		var c = categorias[i];

		$("#produtos select[name='categoria']").append('<option value="'+i+'">'+c.categoria+'</option>');

		for(var p in c.produtos){
			var n = c.produtos[p];
			var d = $('<div class="produto" data-categoria="'+i+'"><a href="#produto"><span class="imagem"></span><span class="titulo"></span></a></div>');
			if(typeof n.foto != 'undefined'){
				$(d).find('.imagem').css('background-image', 'url('+n.foto+')');
			}
			$(d).find('.titulo').html(n.titulo);
			$(d).data('obj', n);

			$(d).appendTo('#produtos-listagem');
		}
	}

}

function carregarProduto(p){
	exibirSplash();
	$("#produto .titulo").html(p.titulo);
	$("#produto .categoria").html(p.categoria);
	$("#produto .texto").html(p.texto);
	$("#produto #downloads").hide();
	$("#produto #downloads .downloads, #produto #secoes").html('');




	if(typeof produtoSwiper != 'undefined'){
		produtoSwiper.removeAllSlides();
		if(p.fotos.length > 0){
			for(var i in p.fotos){
				produtoSwiper.appendSlide('<div class="swiper-slide"><img src="'+p.fotos[i]+'"/></div>');
			}
		}
	}else{
		$("#produto-fotos").html('<div class="swiper-wrapper"></div><div class="swiper-pagination"></div>');
		if(p.fotos.length > 0){
			for(var i in p.fotos){
				$("#produto-fotos .swiper-wrapper").append('<div class="swiper-slide"><img src="'+p.fotos[i]+'"/></div>');
			}

			produtoSwiper = new Swiper ("#produto-fotos", {
				pagination: '.swiper-pagination',
				spaceBetween: 20,
				autoHeight: true
			});
		}
	}

	var secoes = JSON.parse(p.secoes);
	
	for(var i in secoes){
		var s = $("<div class='secao'></div>");
		$('<div class="titulo-fundo-azul"></div>').html(secoes[i].titulo).appendTo(s);
		$('<div class="wrapper"><div class="texto-padrao">'+secoes[i].texto+'</div></div>').appendTo(s);
		$("#produto #secoes").append(s);
	}

	var downloads = p.downloads;
	if(downloads.length > 0){
		$("#produto #downloads").show();
	}

	for(var i in downloads){
		var n = downloads[i];
		var d = $('<div class="manual"><div class="acoes"><a href="'+n.arquivo+'" class="manual-download" target="_blank" rel="external"><img src="img/download.png" alt="Download"></a> &nbsp; <a href="'+n.arquivo+'" class="email" data-transition="slideup"><img src="img/email.png" alt="Download"></a></div><div class="arquivo"></div></div>');
		$(d).find('.arquivo').html(n.titulo);

		$(d).appendTo('#produto #downloads .downloads');
	}

	var total_imagens = $("#produto img").size();
	imagens_produtos_carregadas = 0;
	onImgLoad('#produto img', function(){
		imagens_produtos_carregadas++;
		if(imagens_produtos_carregadas >= total_imagens){
			esconderSplash();
			produtoSwiper.update();
		}
	});
	$.mobile.changePage("#produto");
}



function carregarManuais(categorias){
	$("#manuais-listagem").html('');
	$("#manuais select[name='categoria']").html('<option value="" data-translate="todasCategorias"></option>');
	for(var i in categorias){
		var c = categorias[i];

		$("#manuais select[name='categoria']").append('<option value="'+i+'">'+c.categoria+'</option>');

		for(var p in c.downloads){
			var n = c.downloads[p];
			var d = $('<div class="manual"><div class="acoes"><a href="'+API+n.arquivo+'" class="manual-download" target="_blank" rel="external"><img src="img/download.png" alt="Download"></a> &nbsp; <a href="'+n.arquivo+'" class="email" data-transition="slideup"><img src="img/email.png" alt="Download"></a></div><div class="arquivo"></div></div>');
			$(d).find('.arquivo').html(n.titulo);

			$(d).appendTo('#manuais-listagem');
		}
	}

}

function carregarVideos(categorias){
	$("#videos-listagem").html('');
	$("#videos select[name='categoria']").html('<option value="" data-translate="todasCategorias"></option>');
	for(var i in categorias){
		var c = categorias[i];

		$("#videos select[name='categoria']").append('<option value="'+i+'">'+c.categoria+'</option>');

		for(var p in c.videos){
			var n = c.videos[p];
			var d = $('<div class="video" data-categoria="'+i+'"><div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/'+n.video+'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div><span class="titulo"></span></div>');
			$(d).find('.titulo').html(n.titulo);

			$(d).appendTo('#videos-listagem');
		}
	}

}

function carregarContatos(contatos){
	$("#contatos-listagem").html('');
	$("#contatos select[name='categoria']").html('<option value="" data-translate="toqueEstado"></option>');
	var estados_adicionados = [];
	var nomes_adicionados = [];
	for(var i in contatos){
		var n = contatos[i];
		var d = $('<div class="contato" data-estado="'+n.estado+'" data-titulo="'+n.nome+'"><div class="dados"><span class="nome"></span><br/>Telefone: <span class="telefone"></span><br/>E-mail: <span class="email"></span></div><a href="tel:'+n.telefone+'" class="ligar" data-translate="ligarContato"></a></div>');
		$(d).find('.nome').html(n.nome);
		$(d).find('.telefone').html(n.telefone);
		$(d).find('.email').html(n.email);

		$(d).appendTo('#contatos-listagem');

		if($.inArray(n.nome,nomes_adicionados) >= 0){
			$(d).hide();
		}else{
			nomes_adicionados.push(n.nome);
		}

		if($.inArray(n.estado, estados_adicionados) < 0){
			estados_adicionados.push(n.estado);
		}
	}
	estados_adicionados.sort();

	var estados_brasileiros = $('<optgroup label="Brasil"></optgroup>');
	var paises = $('<optgroup label="Outros países"></optgroup>');

	for(var i in estados_adicionados){
		if(estados_adicionados[i].replace("Brasil, ", "") != estados_adicionados[i]){
			$(estados_brasileiros).append('<option value="'+estados_adicionados[i]+'">'+estados_adicionados[i].replace("Brasil, ", "")+'</option>');
		}else{
			$(paises).append('<option value="'+estados_adicionados[i]+'">'+estados_adicionados[i]+'</option>');
		}
	}

	$("#contatos select[name='categoria']").append(estados_brasileiros);
	$("#contatos select[name='categoria']").append(paises);
}

function limparMapa(){
	for(var i in markers){
		markers[i].setMap(null);
	}
}

function carregarRepresentantes(estados){
	limparMapa();
	$("#rede-detalhamento-listagem").html('');
	$("#rede-assistencia select[name='estado'], #rede-detalhamento select[name='estado']").html('<option value="" data-translate="toqueEstado"></option>');
	var estados_adicionados = []

	for(var e in estados){
		for(var i in estados[e]){
			var r = estados[e][i];
			var endereco = r.endereco+" - "+r.cidade+" - "+r.estado;
			if(!isNaN(parseFloat(r.x))){
				addMarker(r.nome, endereco, e, i, parseFloat(r.x), parseFloat(r.y));
			}

			var n = r;
			var d = $('<div class="contato" data-estado="'+n.estado+'" data-i="'+i+'"><div class="dados"><span class="nome"></span><br/><span class="endereco"></span><br/><span class="cidade"></span><br/>Telefone: <span class="telefone"></span><br/>Site: <span class="site"></span></div><a href="tel:'+n.telefone+'" class="ligar" data-translate="ligarAssistencia"></a><a href="javascript: void(0);" onclick="window.open(\''+protocolo_maps+endereco+'\', \'_system\')" target="_blank" class="rota" data-translate="rotaAssistencia"></a></div>');
			$(d).find('.nome').html(n.nome);
			$(d).find('.telefone').html(n.telefone);
			$(d).find('.site').html(n.site);
			$(d).find('.cidade').html(n.cidade+" - "+n.estado);
			$(d).find('.endereco').html(n.endereco);

			$(d).appendTo('#rede-detalhamento-listagem');

			
			
			if($.inArray(r.estado, estados_adicionados) < 0){
				estados_adicionados.push(r.estado);
			}
		}
	}
	estados_adicionados.sort();

	var estados_brasileiros = $('<optgroup label="Brasil"></optgroup>');
	var paises = $('<optgroup label="Outros países"></optgroup>');

	for(var i in estados_adicionados){
		if(estados_adicionados[i].replace("Brasil, ", "") != estados_adicionados[i]){
			$(estados_brasileiros).append('<option value="'+estados_adicionados[i]+'">'+estados_adicionados[i].replace("Brasil, ", "")+'</option>');
		}else{
			$(paises).append('<option value="'+estados_adicionados[i]+'">'+estados_adicionados[i]+'</option>');
		}
	}

	$("#rede-assistencia select[name='estado'], #rede-detalhamento select[name='estado']").append(estados_brasileiros);
	$("#rede-assistencia select[name='estado'], #rede-detalhamento select[name='estado']").append(paises);

}

function addMarker(nome, address, e, i,x,y){
	var marker = new google.maps.Marker({
		position: {lat: x, lng: y},
		map: map
	});


	var contentString = '<div class="titulo-modal">'+nome+'</div><div class="endereco-modal">'+address+'</div><a href="#rede-detalhamento" data-e="'+e+'" data-i="'+i+'" class="mais-info">'+getTranslation('verMaisInformacoes')+'</a>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});

  }

function initMap(){
	map = new google.maps.Map(
		document.getElementById('mapa'), 
		{
	    	center: geoCenter,
			zoom: geoZoom,
			streetViewControl: false
		}
	);
	return;

	// if (navigator.geolocation) {
	// 	navigator.geolocation.getCurrentPosition(function(position) {
	// 		map.setCenter({
	// 			lat: position.coords.latitude,
	// 			lng: position.coords.longitude
	// 		});
	// 		geoCenter = {
	// 			lat: position.coords.latitude,
	// 			lng: position.coords.longitude
	// 		};
	// 	}, function(e1,e2,e3) {
	// 		console.error(e1,e2,e3);
	// 	});
	// }
}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }


var estadosSiglas = {
    'AC': 'Acre',
    'AL': 'Alagoas',
    'AP': 'Amapá',
    'AM': 'Amazonas',
    'BA': 'Bahia',
    'CE': 'Ceará',
    'DF': 'Distrito Federal',
    'ES': 'Espírito Santo',
    'GO': 'Goiás',
    'MA': 'Maranhão',
    'MT': 'Mato Grosso',
    'MS': 'Mato Grosso do Sul',
    'MG': 'Minas Gerais',
    'PA': 'Pará',
    'PB': 'Paraíba',
    'PR': 'Paraná',
    'PE': 'Pernambuco',
    'PI': 'Piauí',
    'RJ': 'Rio de Janeiro',
    'RN': 'Rio Grande do Norte',
    'RS': 'Rio Grande do Sul',
    'RO': 'Rondônia',
    'RR': 'Roraima',
    'SC': 'Santa Catarina',
    'SP': 'São Paulo',
    'SE': 'Sergipe',
    'TO': 'Tocantins'
}

var onImgLoad = function(selector, callback){
    $(selector).each(function(){
        if (this.complete || /*for IE 10-*/ $(this).height() > 0) {
            callback.apply(this);
        }
        else {
            $(this).one('load', function(){
                callback.apply(this);
            });
        }
    });
};