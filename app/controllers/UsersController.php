<?php
/**
 * Контроллер пользователей
 */

class UsersController implements IController
{

	public function authorizeAction(){
		$fc = FrontController::getInstance();
		$email = Validate::cleanStr($fc->getPost('email'));
		$password = md5(trim($fc->getPost('password')));

		if (UsersModel::authorize($email, $password)) {
			$result['status'] = 'OK';
		} else {
			$result['status'] = 'ERROR';
			$result['msg'] = 'Неверный email или пароль';
		}

		exit(json_encode($result));
	}

	public function exitAction(){
		unset($_SESSION['auth']);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
	}

	public function registrationAction(){
		$fc = FrontController::getInstance();
		$view = new ViewModel;
		$view->form = Form_RegistrationModel::getForm();
		$output = $view->render('../views/users/registration.php');

		$fc->setBody($output);
	}

	public function profileAction(){
		if (!isset($_SESSION['auth'])) {
			header('Location: /');
			exit;
		}

		$fc = FrontController::getInstance();
		$view = new ViewModel;
		$view->form = Form_UsersEditModel::getForm();
		$output = $view->render('../views/users/profile.php');

		$fc->setBody($output);
	}

	public function addAction(){
		$usersModel = new UsersModel;
		$form = new Form_RegistrationModel;

		if (!$errors = $form->validate()) {
			$usersModel->save(null, true);
		}

		if ($errors) {
			$result['errors'] = $errors;
			$result['status'] = 'ERROR';
		} else {
			$result['status'] = 'OK';
		}

		exit(json_encode($result));
	}

	public function updateAction(){
		if (!isset($_SESSION['auth'])) {
			return;
		}

		$usersModel = new UsersModel;
		$form = new Form_UsersEditModel;

		if (!$errors = $form->validate()) {
			$usersModel->save($usersModel->user_id, true);
		}

		if ($errors) {
			$result['errors'] = $errors;
			$result['status'] = 'ERROR';
		} else {
			$result['status'] = 'OK';
		}

		exit(json_encode($result));
	}
}