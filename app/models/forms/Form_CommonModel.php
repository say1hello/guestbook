<?php
/**
 *
 */

class Form_CommonModel extends CommonModel
{
	protected $error_messages = array(
		'email' => array(
			'incorrect_format' => 'Некорректный формат Email',
			'already_exist' => 'Этот Email уже занят',
		),
		'url' => array(
			'incorrect_format' => 'Некорректный формат значения',
		),
		'password' => array(
			'not_match' => 'Пароли не совпадают',
		),
		'captcha' => array(
			'not_match' => 'Неверный проверочный код',
		),
	);

	public function __construct(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
			$this->_fill($_POST);
		}
	}
}