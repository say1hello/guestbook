<?php
/**
 * Контроллер главной страницы
 */

class IndexController implements IController
{
	public function indexAction() {
		$MessagesController = new MessagesController;
		$MessagesController->indexAction();
	}
}
