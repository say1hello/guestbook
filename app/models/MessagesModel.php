<?php
/**
 *
 */

class MessagesModel extends CommonModel
{
	public  $message_id,
			$body,
			$userName,
			$userEmail,
			$userSite,
			$userIp,
			$userAgent,
			$user_id,
			$file_id;

	private $_allowedTags = array(
		'<p>',
		'<a>',
		'<strong>',
		'<code>',
		'<i>',
		'<em>',
		'<strike>',
		'<span>',
	);

	public $onPage = 25;

	public function __construct($id = null) {
		$id = (int)$id;
		if ($id) {
			$query = "SELECT *
						FROM messages
						LEFT JOIN users_has_messages USING(message_id)
						LEFT JOIN messages_has_files USING(message_id)
						WHERE message_id = $id
							AND deleted = 0
			";
			if ($message = DBModel::getInstance()->query($query)->results()) {
				$message = $message[0];
				$this->_fill($message);
			}
		}
	}

	public function getList() {
		$fc = FrontController::getInstance();
		$sortby = Validate::cleanStr($fc->getParam('sortby'));
		$sortdir = Validate::cleanStr($fc->getParam('sortdir'));
		$page = Validate::cleanNumber($fc->getParam('page'));
		$search = Validate::cleanStr($fc->getParam('search'));

		$where = ' WHERE m.deleted = 0';

		if ($search) {
			$where .= " AND (m.body LIKE '%{$search}%' OR m.userName LIKE '%{$search}%' OR m.userEmail LIKE '%{$search}%')";
		}

		$query = "SELECT COUNT(*) cnt FROM messages m $where";

		$total = DBModel::getInstance()->query($query)->results();
		$total = $total[0]['cnt'];

		$totalPages = ceil($total / $this->onPage);

		if ($page > $totalPages) {
			$page = $totalPages;
		}

		if ($sortby) {
			$orderby = "$sortby $sortdir";
		} else {
			$orderby = 'create_time DESC';
		}

		$limit = $this->onPage;

		if ($page > 1) {
			$limitStart = $this->onPage * ($page - 1);
			$limit = "$limitStart, $this->onPage";
		}

		$query = "
			SELECT
				m.message_id, m.body, m.userName, m.userEmail, m.userSite, m.create_time,
				u_h_m.user_id,
				f.name file_name, f.url file_url
				FROM messages m
				LEFT JOIN users_has_messages u_h_m USING(message_id)
				LEFT JOIN messages_has_files m_h_f USING(message_id)
				LEFT JOIN files f USING(file_id)
				$where
				ORDER BY $orderby
				LIMIT $limit
		";

		$messages = DBModel::getInstance()->query($query);

		return array(
			'list' => $messages->results(),
			'total' => $total,
		);
	}

	public function save($id = null) {
		$fc = FrontController::getInstance();

		if (isset($_SESSION['auth'])) {
			$this->userName = $_SESSION['auth']['name'];
			$this->userEmail = $_SESSION['auth']['email'];
			$this->userSite = $_SESSION['auth']['homepage'];
		} else {
			$this->userName = $fc->getPost('name');
			$this->userEmail = trim($fc->getPost('email'));
			$this->userSite = trim($fc->getPost('site'));
		}

		$this->userName = Validate::cleanStr($this->userName);

		$this->body = $fc->getPost('body');
		$this->_filterBody();

		$this->userIp = ip2long($_SERVER['REMOTE_ADDR']);
		$this->userAgent = $_SERVER['HTTP_USER_AGENT'];

		if ($id) {
			$newMessageId = DBModel::getInstance()->update(
				'messages',
				array(
					'body' => $this->body,
				),
				array(
					'message_id' => $id
				)
			);
		} else {
			$newMessageId = DBModel::getInstance()->insert(
				'messages',
				array(
					'body' => $this->body,
					'userName' => $this->userName,
					'userEmail' => $this->userEmail,
					'userSite' => $this->userSite,
					'userIp' => $this->userIp,
					'userAgent' => $this->userAgent,
				)
			);

			$auth = $_SESSION['auth'];
			if ($auth) {
				DBModel::getInstance()->insert(
					'users_has_messages',
					array(
						'user_id' => $auth['user_id'],
						'message_id' => $newMessageId,
					)
				);
			}

			$this->_saveAttach($newMessageId);
		}

		return $newMessageId;
	}

	public function delete() {
		return DBModel::getInstance()->delete(
			'messages',
			array(
				'message_id' => $this->message_id
			)
		);
	}

	private function _filterBody() {
		$this->body = Validate::stripTags($this->body, implode('', $this->_allowedTags));
	}

	private function _saveAttach($messageId) {
		$attach = $_FILES["attach"];

		if (isset($attach)) {
			$fileExt = pathinfo($attach["name"], PATHINFO_EXTENSION);

			if (
				$fileExt == 'jpg' ||
				$fileExt == 'jpeg' ||
				$fileExt == 'png' ||
				$fileExt == 'gif'
			) {
				$image = new ImageResize($attach["tmp_name"]);
				$image->resizeToWidth(320);
				$image->save($attach["tmp_name"]);
			}

			$upload = new UploadFile($attach);
			$upload->allowed_extensions(array("png", "jpg", "jpeg", "gif", "txt"));
			$upload->allowed_types(array("image/png", "image/jpeg", "text/plain"));
			$upload->path("upload");
			$fileName = $filename = time()."_".rand(1, 10000);
			$upload->new_name($fileName);

			if ($fileExt == 'txt') {
				$upload->max_size(0.1);
			}

			if (!$upload->check()) {
				$errors['attach'] = $upload->error();
			} else {
				$upload->upload();

				$fileUrl = $upload->get_path($upload->get_name());
				$filesModel = new FilesModel(null, $fileName, $fileUrl);
				$newFileId = $filesModel->save();
				DBModel::getInstance()->insert(
					'messages_has_files',
					array(
						'message_id' => $messageId,
						'file_id' => $newFileId,
					)
				);
			}
		}
	}

}