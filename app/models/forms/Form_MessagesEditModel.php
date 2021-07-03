<?php
/**
 *
 */

class Form_MessagesEditModel extends Form_CommonModel
{
	public  $message_id,
			$body;

	public function __construct($data = null){
		if ($data) {
			$this->_fill($data);
		} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
			$this->_fill($_POST);
		}
	}

	public function getForm(){
		$view = new ViewModel();
		$view->message_id = $this->message_id;
		$view->body = $this->body;
		return $view->render('../views/forms/messages/edit.php');
	}

	public function validate(){
		$errors = array();

		if (empty($this->body)) {
			$errors['body'] = 1;
		}

		return $errors;
	}
}