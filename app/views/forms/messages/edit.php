<form class="form-messages-edit" action="/messages/update/message_id/<?=$this->message_id?>" method="post">
	<fieldset>
		<div class="form-group required">
			<label for="body">Сообщение</label>
			<textarea id="body" class="form-control" name="body" rows="5"><?=$this->body?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Отправить</button>
	</fieldset>
</form>

<script>
	$(function(){
		$('.form-messages-edit').ajaxForm({
			//beforeSubmit:   showRequest,
			success:        showResponse,
			dataType:       'json'
		});

		function showResponse(responseText, statusText, xhr, $form) {
			//console.log(responseText);
			$form.find('.has-error').removeClass('has-error');
			if (responseText.status == 'OK') {
				$.cookie('messageUpdatedSuccess', 1, { path: '/' });
				window.history.back();
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
