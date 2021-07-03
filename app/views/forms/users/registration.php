<form class="form-registration" action="/users/add" method="post" enctype="multipart/form-data">
	<fieldset>
		<div class="form-group required">
			<label for="name">Ваше имя</label>
			<input id="name" type="text" class="form-control" name="name" value="" required/>
		</div>
		<div class="form-group required">
			<label for="email">E-mail</label>
			<input id="email" type="email" class="form-control" name="email" value="" required/>
		</div>
		<div class="form-group">
			<label for="homepage">Домашняя страничка</label>
			<input id="homepage" type="text" class="form-control" name="homepage" value=""/>
		</div>
		<div class="form-group required">
			<label for="password">Пароль</label>
			<input id="password" type="password" class="form-control" name="password" required/>
		</div>
		<div class="form-group required">
			<label for="repassword">Повторите пароль</label>
			<input id="repassword" type="password" class="form-control" name="repassword" required/>
		</div>
		<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
	</fieldset>
</form>

<script>
	$(function(){
		$('.form-registration').ajaxForm({
			//beforeSubmit:   showRequest,
			success:        showResponse,
			dataType:       'json'
		});

		function showResponse(responseText, statusText, xhr, $form) {
			//console.log(responseText);
			$form.find('.has-error').removeClass('has-error');
			if (responseText.status == 'OK') {
				$.cookie('registrationSuccess', 1, { path: '/' });
				window.location.assign('/');
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