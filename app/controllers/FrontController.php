<?php
/**
 * Диспетчер запросов
 * Разбирает строку запроса на составляющие
 * Определяет контроллер, экш и параметры
 */
class FrontController
{
	/**
	 * @var string|null $_controller    контроллер
	 * @var string|null $_action        экшн
	 * @var string|null $_params        параметры
	 * @var array|null $_post           данные из переменной $_POST
	 * @var string|null $_body          тело страницы - контент
	 */
	protected   $_controller,
				$_action,
				$_params,
				$_post,
				$_body;

	/**
	 * @var object $_instance   экземпляр класса singleton
	 */
	private static $_instance;

	/**
	 * @return FrontController|object
	 */
	public static function getInstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return void
	 */
	private function __construct(){
		$request = $_SERVER['REQUEST_URI'];
		$path = parse_url($request, PHP_URL_PATH);
		$queryString = parse_url($request, PHP_URL_QUERY);
		parse_str($queryString, $params);

		$splits = explode('/', trim($path,'/'));
		$this->_controller = !empty($splits[0]) ? ucfirst($splits[0]).'Controller' : 'IndexController';
		$this->_action = !empty($splits[1]) ? $splits[1].'Action' : 'indexAction';

		if (!empty($splits[2])) {
			$keys = $values = array();

			for ($i = 2, $cnt = count($splits); $i < $cnt; $i++) {
				if ($i % 2 == 0) {
					$keys[] = $splits[$i];
				} else {
					$values[] = $splits[$i];
				}
			}

			$this->_params = array_combine($keys, $values);
		}

		if (!empty($params)) {
			$this->_params = array_merge((array)$this->_params, $params);
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->_post = $_POST;
		}
	}

	/**
	 * Роутинг
	 *
	 * @throws Exception Несуществующий контроллер
	 * @throws Exception Несуществующий экшн
	 * @throws Exception Контроллер не наследует интерфейс
	 *
	 * @return void
	 */
	public function route() {
		if (class_exists($this->getController())) {
			$rc = new ReflectionClass($this->getController());
			if ($rc->implementsInterface('IController')) {
				if ($rc->hasMethod($this->getAction())) {
					$controller = $rc->newInstance();
					$method = $rc->getMethod($this->getAction());
					$method->invoke($controller);
				} else {
					throw new Exception("Action");
				}
			} else {
				throw new Exception("Interface");
			}
		} else {
			throw new Exception("Controller");
		}
	}

	/**
	 * @return array массив параметров
	 */
	public function getParams() {
		return $this->_params;
	}

	/**
	 * @param string $name  имя параметра
	 *
	 * @return string|null  значение параметра
	 */
	public function getParam($name) {
		if (isset($this->_params[$name])) {
			return $this->_params[$name];
		}
		return null;
	}

	/**
	 * @param string|null $name     имя POST параметра
	 *
	 * @return string|null          значение POST параметра
	 */
	public function getPost($name = null) {
		if ($name == null) {
			return $this->_post;
		}
		if (isset($this->_post[$name])) {
			return $this->_post[$name];
		}
		return null;
	}

	/**
	 * @return string имя контроллера
	 */
	public function getController() {
		return $this->_controller;
	}

	/**
	 * @return string имя экшена
	 */
	public function getAction() {
		return $this->_action;
	}

	/**
	 * @return mixed контент
	 */
	public function getBody() {
		return $this->_body;
	}

	/**
	 * @param string $body контент
	 */
	public function setBody($body) {
		$this->_body = $body;
	}
}