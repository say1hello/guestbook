<?php
/**
 *
 */

class Form_AuthModel extends Form_UsersModel
{
	public static function getForm(){
		$view = new ViewModel();
		return $view->render('../views/forms/users/auth.php');
	}
}