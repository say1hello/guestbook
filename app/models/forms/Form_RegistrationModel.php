<?php
/**
 *
 */

class Form_RegistrationModel extends Form_UsersModel
{
	public static function getForm(){
		$view = new ViewModel();
		return $view->render('../views/forms/users/registration.php');
	}

	public function validate(){
		$errors = array();

		// Name validate
		if (empty($this->name)) {
			$errors['name'] = 1;
		}

		// Email validate
		if (!Validate::validateEmail($this->email)) {
			$errors['email'] = array(
				'message' => $this->error_messages['email']['incorrect_format'],
			);
		} else {
			$query = "SELECT * FROM users WHERE email = '$this->email'";

			$queryEmail = DBModel::getInstance()->query($query);

			if ($queryEmail->results()) {
				$errors['email'] = array(
					'message' => $this->error_messages['email']['already_exist'],
				);
			}
		}

		// Homepage validate
		if (!empty($this->homepage) && !Validate::validateUrl($this->homepage)) {
			$errors['homepage'] = array(
				'message' => $this->error_messages['url']['incorrect_format'],
			);
		}

		// Password validate
		if ($this->password != $this->repassword) {
			$errors['password'] = $errors['repassword'] = array(
				'message' => $this->error_messages['password']['not_match'],
			);
		}

		return $errors;
	}
}