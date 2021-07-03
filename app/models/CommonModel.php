<?php
/**
 *
 */

class CommonModel
{
	protected function _fill($array) {
		foreach ($array as $key => $value) {
			$this->$key = $value;
		}
	}
}