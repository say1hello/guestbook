<form class="form-messages-add" action="/messages/add" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Добавить сообщение:</legend>
		<p>Поля, отмеченные * - обязательны для заполнения.</p>
		<?php if (!isset($_SESSION['auth'])):?>
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
			<input id="homepage" type="text" class="form-control" name="homepage"/>
		</div>
		<?php endif;?>
		<div class="form-group required">
			<label for="body">Сообщение</label>
			<textarea id="body" class="form-control" name="body" rows="5"></textarea>
		</div>
		<div class="form-group">
			<label for="file">Файл</label>
			<input type="file" id="file" name="attach">
			<p class="help-block">
				Вы можете добавить изображение (JPG,GIF,PNG 320х240px)
				<br>или текстовый файл (TXT 100кб).
			</p>
		</div>
		<?php if (!isset($_SESSION['auth'])):?>
		<div class="form-group required">
			<label for="captcha">Код безопасности</label><br>
			<img src="<?=$_SESSION['captcha']['image_src'];?>" alt="CAPTCHA code"><br>
			<input id="captcha" type="text" class="form-control" name="captcha" required autocomplete="off"/>
		</div>
		<?php endif;?>
		<button type="submit" class="btn btn-primary">Отправить</button>
	</fieldset>
</form>
