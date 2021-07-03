<form class="form-users-edit" action="/users/update" method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="form-group required">
			<label for="name">Ваше имя</label>
			<input id="name" type="text" class="form-control" name="name" value="<?=$this->auth['name']?>" required/>
		</div>
		<div class="form-group required">
			<label for="email">E-mail</label>
			<input id="email" type="email" class="form-control" name="email" value="<?=$this->auth['email']?>" required/>
		</div>
		<div class="form-group">
			<label for="homepage">Домашняя страничка</label>
			<input id="homepage" type="text" class="form-control" name="homepage" value="<?=$this->auth['homepage']?>"/>
		</div>
		<div class="form-group">
			<label for="password">Новый пароль</label>
			<input id="password" type="password" class="form-control" name="password"/>
		</div>
		<div class="form-group">
			<label for="repassword">Повторите новый пароль</label>
			<input id="repassword" type="password" class="form-control" name="repassword"/>
		</div>
		<button type="submit" class="btn btn-primary">Сохранить</button>
	</fieldset>
</form>

<script>
	$(function(){
		if ($.cookie("dataSaved")) {
			var n = noty({type: 'success', timeout: 3000, text: 'Данные успешно обновлены!'});
			$.removeCookie('dataSaved');
		}

		$('.form-users-edit').ajaxForm({
			//beforeSubmit:   showRequest,
			success:        showResponse,
			dataType:       'json'
		});

		function showResponse(responseText, statusText, xhr, $form) {
			//console.log(responseText);
			$form.find('.has-error').removeClass('has-error');
			if (responseText.status == 'OK') {
				$.cookie('dataSaved', 1);
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
	});
</script>