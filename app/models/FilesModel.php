<?php
/**
 *
 */

class FilesModel extends CommonModel
{
	public  $file_id,
			$name,
			$url;

	public function __construct($id = null, $name = null, $url = null) {
		$id = (int)$id;
		if ($id) {
			$query = "SELECT *
						FROM files
						WHERE file_id = $id
							AND deleted = 0
			";
			if ($file = DBModel::getInstance()->query($query)->results()) {
				$file = $file[0];
				$this->_fill($file);
			}
		} else {
			$this->name = $name;
			$this->url = $url;
		}
	}

	public function save() {
		return DBModel::getInstance()->insert(
			'files',
			array(
				'name' => $this->name,
				'url' => $this->url,
			)
		);
	}

	public function delete() {
		if (empty($this->file_id)) {
			return;
		}

		$result = DBModel::getInstance()->delete(
			'files',
			array(
				'file_id' => $this->file_id
			)
		);

		if ($result) {
			@unlink($this->url);
		}
	}
}