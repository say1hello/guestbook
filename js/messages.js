$(function(){
	$('.form-messages-add').ajaxForm({
		beforeSubmit:   validate,
		success:        handleResponse,
		dataType:       'json'
	});

	// Валидация данных
	function validate(arr, $form, options) {
		var $files = $('#file')[0].files;
		// Проверка на поддержку браузером File API
		if (window.File && window.FileReader && window.FileList && window.Blob && $files.length > 0) {
			var fsize = $files[0].size;
			var ftype =$files[0].type;

			// Проверка типа файла
			switch(ftype) {
				case 'image/png':
				case 'image/gif':
				case 'image/jpeg':
				case 'text/plain':
					break;
				default:
					alert("Неподдерживаемый тип файла!");
					return false;
			}

			// Текстовый файл не должен превышать 100кб
			if (ftype == 'text/plain' && fsize > 100000) {
				alert("<b>" + fsize +"</b> Слишком большой файл! <br />Размер файла не должен превышать 100кб.");
				return false;
			}
		}
	}

	// Обработка ответа
	function handleResponse(responseText, statusText, xhr, $form) {
		//console.log(responseText);
		$form.find('.has-error').removeClass('has-error');
		if (responseText.status == 'OK') {
			$.cookie('messageAddedSuccess', 1);
			window.location.assign('');
		} else {
			var message,
				input;
			for (var inputName in responseText.errors) {
				message = responseText.errors[inputName].message || 'Заполните поле';
				input = $form.find('[name=' + inputName + ']');
				input.parent('.form-group').addClass('has-error');

				if (input.is("textarea")) {
					input.parent('.form-group').notify(message, {position: "right"});
				} else {
					input.notify(message, {position: "right"});
				}
			}
		}
	}

	// Сортировка
	$('.form-sort select').on('change', function(){
		var
			form = $(this).parents('form'),
			sortByInput = form.find('[name=sortby]'),
			sortDirInput = form.find('[name=sortdir]'),
			sortParams = $(this).val().split(" "),
			sortBy = sortParams[0],
			sortDir = sortParams[1],

			searchParam = getURLParameterByName('search'),
			pageParam = getURLParameterByName('page')
			;

		sortByInput.val(sortBy);
		sortDirInput.val(sortDir);

		if (searchParam) {
			$('<input>').attr({
				type: 'hidden',
				name: 'search',
				value: searchParam
			}).appendTo(form);
		}
		if (pageParam) {
			$('<input>').attr({
				type: 'hidden',
				name: 'page',
				value: pageParam
			}).appendTo(form);
		}

		form.submit();
	});

	// Удаление сообщения
	$('.messages-list .actions [data-action=delete]').click(function(){
		var href = $(this).attr('href');
		noty({
			layout: 'center',
			type: 'confirm',
			text: 'Вы уверены?',
			modal: true,
			animation: {
				open: 'animated flipInX',
				close: 'animated flipOutX'
			},
			buttons: [
				{addClass: 'btn btn-primary', text: 'Да', onClick: function($noty) {
					$noty.close();
					window.location.replace(href);
				}
				},
				{addClass: 'btn btn-danger', text: 'Отмена', onClick: function($noty) {
					$noty.close();
				}
				}
			]
		});

		return false;
	});

});