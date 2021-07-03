<div id="login-form" title="Авторизация">
	<p class="validateTips text-center"></p>
	<form action="/users/authorize" method="post">
		<fieldset>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email" value="" class="form-control" required/>
			</div>
			<div class="form-group">
				<label for="password">Пароль</label>
				<input type="password" name="password" id="password" value="" class="form-control" required/>
			</div>

			<!-- Allow form submission with keyboard without duplicating the dialog button -->
			<input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
		</fieldset>
	</form>
</div>