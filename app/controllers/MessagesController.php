<?php
/**
 * Контроллер сообщений
 */

class MessagesController implements IController
{
	/**
	 * @var array $_sortingValues значения сортировки
	 */
	private $_sortingValues = array(
			'create_time' => 'Дате',
			'userName' => 'Имени',
			'userEmail' => 'Email',
	);
	/**
	 * @var array $_sortingDirections направления сортировки
	 */
	private $_sortingDirections = array(
			'desc' => 'по убыванию',
			'asc' => 'по возрастанию',
	);

	public function indexAction() {
		$this->listAction();
	}

	public function listAction() {
		$fc = FrontController::getInstance();
		$sortby = Validate::cleanStr($fc->getParam('sortby'));
		$sortdir = Validate::cleanStr($fc->getParam('sortdir'));

		$messagesModel = new MessagesModel;

		$onPage = $messagesModel->onPage;

		$messages = $messagesModel->getList();

		$view = new ViewModel;
		$view->total = $messages['total'];
		$view->messages = $messages['list'];
		$view->count = count($messages['list']);
		$view->form = Form_MessagesAddModel::getForm();
		$view->onPage = $onPage;
		$view->search = Validate::cleanStr($fc->getParam('search'));

		$view->auth = $_SESSION['auth'];

		$totalPages = ceil($view->total / $onPage);
		$paginator = new Helper_PaginatorController($totalPages);
		$view->paginator = $paginator->getLinks();

		$view->sortingValues = $this->_sortingValues;
		$view->sortingDirections = $this->_sortingDirections;

		$view->sortby = ($sortby) ? $sortby : 'create_time';
		$view->sortdir = ($sortdir) ? $sortdir : 'DESC';

		$output = $view->render('../views/messages/list.php');
		$fc->setBody($output);
	}

	public function addAction() {
		$messagesModel = new MessagesModel;
		$form = new Form_MessagesAddModel;

		if (!$errors = $form->validate()) {
			$messagesModel->save();
		}

		if ($errors) {
			$result['errors'] = $errors;
			$result['status'] = 'ERROR';
		} else {
			$result['status'] = 'OK';
		}

		exit(json_encode($result));
	}

	public function editAction() {
		$auth = $_SESSION['auth'];
		if (!$auth) {
			return;
		}

		$fc = FrontController::getInstance();
		$messageId = Validate::cleanNumber($fc->getParam('message_id'));

		$message = new MessagesModel($messageId);

		if ($auth['user_id'] != $message->user_id) {
			return;
		}

		$form = new Form_MessagesEditModel($message);
		$view = new ViewModel;
		$view->form = $form->getForm();
		$output = $view->render('../views/messages/edit.php');

		$fc->setBody($output);
	}

	public function updateAction(){
		if (!isset($_SESSION['auth'])) {
			return;
		}

		$fc = FrontController::getInstance();
		$messageId = Validate::cleanNumber($fc->getParam('message_id'));

		$message = new MessagesModel($messageId);
		$form = new Form_MessagesEditModel;

		if (!$errors = $form->validate()) {
			$message->save($messageId);
		}

		if ($errors) {
			$result['errors'] = $errors;
			$result['status'] = 'ERROR';
		} else {
			$result['status'] = 'OK';
		}

		exit(json_encode($result));
	}

	public function deleteAction() {
		$auth = $_SESSION['auth'];
		if (!$auth) {
			return;
		}

		$fc = FrontController::getInstance();
		$messageId = Validate::cleanNumber($fc->getParam('message_id'));

		$message = new MessagesModel($messageId);

		if ($auth['user_id'] != $message->user_id) {
			return;
		}

		if ($message->delete()) {
			if ($message->file_id) {
				$filesModel = new FilesModel($message->file_id);
				$filesModel->delete();
			}
			$cookieName = 'messageDeletedSuccess';
		} else {
			$cookieName = 'messageDeletedFail';
		}

		setcookie($cookieName, 1, 0, "/");

		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

}