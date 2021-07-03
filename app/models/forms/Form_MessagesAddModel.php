<?php
/**
 *
 */

class Form_MessagesAddModel extends Form_CommonModel
{
	public  $name,
			$email,
			$homepage,
			$body,
			$captcha;

	public static function getForm(){
		$view = new ViewModel();
		return $view->render('../views/forms/messages/add.php');
	}

	public function validate(){

		$errors = array();

		if (!isset($_SESSION['auth'])) {
			// Name validate
			if (empty($this->name)) {
				$errors['name'] = 1;
			}

			// Email validate
			if (!Validate::validateEmail($this->email)) {
				$errors['email'] = array(
					'message' => $this->error_messages['email']['incorrect_format'],
				);
			}

			// Homepage validate
			if (!empty($this->homepage) && !Validate::validateUrl($this->homepage)) {
				$errors['homepage'] = array(
					'message' => $this->error_messages['url']['incorrect_format'],
				);
			}

			// Captcha validate
			if (strtolower($this->captcha) != strtolower($_SESSION['captcha']['code'])) {
				$errors['captcha'] = array(
					'message' => $this->error_messages['captcha']['not_match'],
				);
			}
		}

		// Body validate
		if (empty($this->body)) {
			$errors['body'] = 1;
		}

		return $errors;
	}
}