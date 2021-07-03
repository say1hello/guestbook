<?php
/**
 *
 */

class UsersModel extends CommonModel
{
	public  $user_id,
			$name,
			$email,
			$homepage,
			$password;

	public function __construct(){
		$auth = $_SESSION['auth'];
		if ($auth) {
			$this->_fill($auth);
		}
	}

	public static function authorize($email, $password){
		$result = false;

		if ($email && $password) {
			$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$userQuery = DBModel::getInstance()->query($query);

			if ($user = $userQuery->results()) {
				$_SESSION['auth'] = $user[0];
				$result = true;
			}
		}

		return $result;
	}

	public function save($id = null, $authorize = false) {
		$fc = FrontController::getInstance();

		$this->name = Validate::cleanStr($fc->getPost('name'));
		$this->email = trim($fc->getPost('email'));
		$this->homepage = trim($fc->getPost('homepage'));

		if ($fc->getPost('password') != '') {
			$this->password = md5(trim($fc->getPost('password')));
		}

		if ($id) {
			$result = DBModel::getInstance()->update(
				'users',
				array(
					'name' => $this->name,
					'email' => $this->email,
					'homepage' => $this->homepage,
					'password' => $this->password,
				),
				array(
					'user_id' => $id
				)
			);
		} else {
			$result = DBModel::getInstance()->insert(
				'users',
				array(
					'name' => $this->name,
					'email' => $this->email,
					'homepage' => $this->homepage,
					'password' => $this->password,
				)
			);
		}

		if ($result && $authorize) {
			self::authorize($this->email, $this->password);
		}

		return $result;
	}
}