<?php
/**
 *
 */

class DBModel
{
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_TABLE = 'guestbook';

	private $_mysqli,
			$_query,
			$_results = array(),
			$_count = 0;

	public static $instance;

	public static function getInstance(){
		if (!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct(){
		$this->_mysqli = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_TABLE);
		if ($this->_mysqli->connect_error) {
			die($this->_mysqli->connect_error);
		}
	}

	public function query($sql){
		if ($this->_query = $this->_mysqli->query($sql)) {
			$this->_results = array();
			while ($row = $this->_query->fetch_assoc()) {
				$this->_results[] = $row;
			}
			$this->_count = $this->_query->num_rows;
		} else {
			echo "Не удалось выполнить запрос: (" . $this->_mysqli->errno . ") " . $this->_mysqli->error;
			die;
		}

		return $this;
	}

	public function insert($tableName, $values){
		$cols = array();
		foreach ($values as $key1 => $value1) {
			$cols[] = "$key1 = '" . $this->escape($value1) ."'";
		}

		$query = "INSERT INTO $tableName SET " . implode(', ', $cols);

		if (!$this->_mysqli->query($query)) {
			echo "Не удалось выполнить запрос: (" . $this->_mysqli->errno . ") " . $this->_mysqli->error;
			die;
		}

		return $this->_mysqli->insert_id;
	}

	public function update($tableName, $values, $conditions){
		$cols = array();
		foreach ($values as $key1 => $value1) {
			$cols[] = "$key1 = '" . $this->escape($value1) ."'";
		}

		$where = array();
		foreach ($conditions as $key2 => $value2) {
			$where[] = "$key2 = '" . $this->escape($value2) ."'";
		}

		$query = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE " . implode(' AND ', $where);

		if (!$this->_mysqli->query($query)) {
			echo "Не удалось выполнить запрос: (" . $this->_mysqli->errno . ") " . $this->_mysqli->error;
			die;
		}

		return true;
	}

	public function delete($tableName, $conditions){
		$where = array();
		foreach ($conditions as $key => $value) {
			$where[] = "$key = '" . $this->escape($value) ."'";
		}

		$query = "DELETE FROM $tableName WHERE " . implode(' AND ', $where);

		if (!$this->_mysqli->query($query)) {
			echo "Не удалось выполнить запрос: (" . $this->_mysqli->errno . ") " . $this->_mysqli->error;
			die;
		}

		return true;
	}

	public function results(){
		return $this->_results;
	}

	public function count(){
		return $this->_count;
	}

	public function escape($string){
		return $this->_mysqli->real_escape_string($string);
	}
}