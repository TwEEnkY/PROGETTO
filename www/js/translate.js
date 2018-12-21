var translation = {
	words: {},
	loaded: false,
	language: 'pt',
	languages: {'pt': 'Português', 'es':'Español'}
}

function translateAll(){
	if(!translation.loaded){
		loadTranslation(true);
		return;
	}
	$('[data-translate]').each(function(){
		if(typeof translation.words[$(this).data('translate')] == 'undefined'){
			console.error('String não traduzida '+$(this).data('translate'));
			return;
		}
		$(this).html(translation.words[$(this).data('translate')][translation.language]);
	});
}

function loadTranslation(callTranslateAll){
	if(typeof callTranslateAll == 'undefined'){callTranslateAll = false;}
	if(typeof callIndividualTranslation == 'undefined'){callIndividualTranslation = false;}

	$.getJSON('json/translation.json?'+Math.random(), function(result) {
		translation.words = result;
		if(callTranslateAll){translateAll();}
	}, function(e1){
		alert(e1);
	});
	translation.loaded = true;

	loadLanguage();
}

function getTranslation(str){
	if(!translation.loaded){
		return false;
	}
	if(typeof translation.words[str] == 'undefined'){
		console.error('String não traduzida '+$(this).data('translate'));
		return;
	}
	return translation.words[str][translation.language];
}

function changeLanguage(lang){
	translation.language = lang;
	saveLanguage();
	translateAll();
}

function getLanguage(){
	return translation.language;
}

function loadLanguage(){
	if(localStorage.getItem("language") == null){
		localStorage.setItem("language", "pt");
	}

	translation.language = localStorage.getItem("language");
}

function saveLanguage(){
	localStorage.setItem("language", translation.language);
}