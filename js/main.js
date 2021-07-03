$(function(){
	if ($.cookie("registrationSuccess")) {
		var u1 = noty({type: 'success', timeout: 5000, text: 'Регистрация прошла успешно! Вы вошли в систему автоматически.'});
		$.removeCookie('registrationSuccess');
	}
	if ($.cookie("authorizationSuccess")) {
		var u2 = noty({type: 'success', timeout: 5000, text: 'Авторизация прошла успешно! Вы вошли в систему.'});
		$.removeCookie('authorizationSuccess');
	}

	if ($.cookie("messageAddedSuccess")) {
		var m1 = noty({type: 'success', timeout: 3000, text: 'Ваше сообщение успешно добавлено!'});
		$.removeCookie('messageAddedSuccess');
	}
	if ($.cookie("messageUpdatedSuccess")) {
		var m2 = noty({type: 'success', timeout: 3000, text: 'Данные успешно обновлены!'});
		$.removeCookie('messageUpdatedSuccess', { path: '/' });
	}

	if ($.cookie('messageDeletedSuccess')) {
		var m3 = noty({type: 'success', timeout: 3000, text: 'Сообщение было успешно удалено.'});
		$.removeCookie('messageDeletedSuccess', { path: '/' });
	}
	if ($.cookie("messageDeletedFail")) {
		var m4 = noty({type: 'error', timeout: 3000, text: 'При удалении сообщения возникла ошибка.'});
		$.removeCookie('messageDeletedFail', { path: '/' });
	}
});

tinymce.init({
	language : 'ru',
	selector: "textarea",
	menubar : false,
	plugins: [
		"autolink link preview anchor",
		"visualblocks visualchars code"
	],
	toolbar: "link code italic strikethrough bold | preview",
	setup : function(ed) {
		ed.on('change', function(e) {
			tinymce.triggerSave();
		});
	}
});

function getURLParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function getUrlVars() {
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for (var i = 0; i < hashes.length; i++) {
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}

function getUrlParams() {
	var queries = {};
	$.each(document.location.search.substr(1).split('&'),function(c,q){
		var i = q.split('=');
		queries[i[0].toString()] = i[1].toString();
	});
	return queries;
}