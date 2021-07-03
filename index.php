<?php
/**
 * Project:   GuestBook - NewContact Test Task
 * @author    Yury Dudkin yuranvlz@gmail.com
 * @version   1.0.0
 */

session_start();

/* Пути по-умолчанию для поиска файлов */
set_include_path(get_include_path()
					.PATH_SEPARATOR.'app/controllers'
					.PATH_SEPARATOR.'app/controllers/helpers'
					.PATH_SEPARATOR.'app/models'
					.PATH_SEPARATOR.'app/models/forms'
					.PATH_SEPARATOR.'app/views'
					.PATH_SEPARATOR.'lib');

/**
 * Autoloader
 */
function guestbookAutoload($class){
	require_once($class.'.php');
}
spl_autoload_register('guestbookAutoload');

/* Captcha */
if (!isset($_REQUEST['captcha']) && !isset($_SESSION['auth'])) {
	include("lib/captcha/simple-php-captcha.php");
	$_SESSION['captcha'] = simple_php_captcha(array('min_font_size' => 20, 'max_font_size' => 20));
}

/* Инициализация и запуск FrontController */
$front = FrontController::getInstance();
$front->route();

/* Шаблонизатор - пока не используется */
//require_once('lib/Smarty-3.1.21/libs/Smarty.class.php');
//$smarty = new Smarty();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css"/>
	<link rel="stylesheet" href="/css/animate.css"/>
	<link rel="stylesheet" href="/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/css/main.css"/>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
<div class="wrapper">

	<div class="header">
		<a class="logo" href="/"></a>
		<?php if (!isset($_SESSION['auth'])):?>
			<div class="text-right"><a href="/users/registration">Регистрация</a> | <button id="login" class="btn btn-primary">Войти</button></div>
		<?php else:?>
			<div class="text-right"><a href="/users/profile">Профиль</a> | <a href="/users/exit">Выйти</a></div>
		<?php endif;?>
	</div>

	<div class="content">
		<?=$front->getBody();?>
	</div>

	<?php if (!isset($_SESSION['auth'])):?>
		<?=Form_AuthModel::getForm()?>
	<?php endif;?>

	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="http://oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
	<script src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script src="/js/notifyjs/notify.min.js"></script>
	<script src="/js/notifyjs/styles/bootstrap/notify-bootstrap.js"></script>
	<script src="/js/jquery.cookie.js"></script>
	<script src="/js/tinymce/tinymce.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/messages.js"></script>
	<?php if (!isset($_SESSION['auth'])):?>
		<script src="/js/auth.js"></script>
	<?php endif;?>
</div>
</body>
</html>