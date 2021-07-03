<?php
/**
 *
 */

class Form_UsersEditModel extends Form_UsersModel
{
	public static function getForm(){
		$view = new ViewModel();
		$view->auth = $_SESSION['auth'];
		return $view->render('../views/forms/users/edit.php');
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
		} elseif ($this->email != $_SESSION['auth']['email']) {
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
		if (
			(!empty($this->password) || !empty($this->repassword)) &&
			$this->password != $this->repassword
		) {
			$errors['password'] = $errors['repassword'] = array(
				'message' => $this->error_messages['password']['not_match'],
			);
		}

		return $errors;
	}
}